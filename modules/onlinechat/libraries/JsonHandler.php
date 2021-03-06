<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2018 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_OCHAT_DATA_DIR_')) {
    define('_OCHAT_DATA_DIR_', str_replace('libraries', '', dirname(__FILE__).'data/'));
}

class JsonHandler
{
    /**
     * Create and test if have rights to CRUD
     * @return int
     */
    public static function init()
    {
        $flag = true;
        $flag = $flag && file_put_contents(_OCHAT_DATA_DIR_.'test.json', json_encode(
          array('date_message' => null, 'date_last_message' => null)
        ));
        $flag = $flag && unlink(_OCHAT_DATA_DIR_.'test.json');
        return (int)$flag;
    }

    /**
     * Check if the thread file exists if it does return the filename
     * @param $thread
     * @return null|string
     */
    public static function isThreadExists($thread)
    {
        if (is_file(_OCHAT_DATA_DIR_.basename('thread_'.$thread.'.json'))) {
            return _OCHAT_DATA_DIR_.basename('thread_'.$thread.'.json');
        }
        return null;
    }

    /**
     * Generate the json thread file
     * @param $id_lang
     * @param $id_shop
     * @param $id_customer
     * @param $id_guest
     * @param $id_employee
     * @param $customer_name
     * @param int $number_limit defines the number of times maximum when the function can call itself
     * @return int|null
     */
    public static function createThread($id_lang,
      $id_shop,
      $id_customer = null,
      $id_guest = null,
      $id_employee = null,
      $customer_name = null,
      $number_limit = 5
    )
    {
        $thread = rand(1, 999);

        if ($number_limit == 0) {
            return null;
        }
        if (self::isThreadExists($thread)) {
            // Pseudo recursif LOL
            self::createThread($id_lang,
              $id_shop,
              $id_customer,
              $id_guest,
              $id_employee,
              $customer_name,
              $number_limit - 1
            );
        } else {
            $name = null;
            $file_name = _OCHAT_DATA_DIR_.'thread_'.(int)$thread.'.json';

            if (isset($customer_name)) {
                $name = $customer_name;
            }

            $data = array(
                "thread" => $thread,
                "id_shop" => $id_shop,
                "create_date" => @date("Y-m-d H:i:s"),
                "id_customer" => $id_customer,
                "id_guest" => $id_guest,
                "id_employee" => $id_employee,
                "id_lang" => $id_lang,
                "customer_name" => $name,
                "message_list" => array(),
            );
            if (file_put_contents($file_name, json_encode($data)) !== false) {
                return json_encode(array('thread' => $thread));
            }
            return null;
        }
    }

    /**
     * Delete thread json file
     * @param $thread
     * @return bool
     */
    public static function deleteThread($thread)
    {
        if (file_exists(_OCHAT_DATA_DIR_.'thread_'.(int)$thread.'.json')) {
            return unlink(_OCHAT_DATA_DIR_.'thread_'.(int)$thread.'.json');
        }
        return false;
    }

    /**
     * Return the content of the thread file decoded
     * @param $thread
     * @return mixed|null
     */
    public static function getThread($thread)
    {
        $file_name = self::isThreadExists($thread);
        if (!$file_name) {
            return null;
        }
        return json_decode(file_get_contents($file_name));
    }

    /**
     * Open thread then return the data
     * @param $thread
     * @param $send_data
     * @return mixed|null
     */
    public static function openThread($thread, $send_data = false)
    {
        $closed_file_name = self::isThreadExists($thread.'_closed');
        if (!$closed_file_name) {
            return null;
        } else {
            $new_name = str_replace('_closed', '', $closed_file_name);
            $return_rename = rename($closed_file_name, $new_name);

            if ($return_rename) {
                if ($send_data) {
                    return json_decode(file_get_contents($new_name));
                }
                return $return_rename;
            }
            return null;
        }
    }

    /**
     * Mark the thread as closed
     * @param $thread
     * @return bool|null
     */
    public static function closeThread($thread)
    {
        $file_name = self::isThreadExists($thread);
        if (!$file_name) {
            return null;
        }
        $thread = "thread_".$thread;
        $new_name = str_replace($thread, $thread.'_closed', $file_name);
        return rename($file_name, $new_name);
    }

    /**
     * Search last messages from customer
     * @param $thread
     * @param $last_message_key exemple : [0|1|3...] position in the json file
     * @return array|null
     */
    public static function getCustomerLastMessages($thread, $last_message_key)
    {
        $data = self::getThread($thread);
        $message_list = array();
        $found_from_customer = false;

        if (!$data) {
            return null;
        } else {
            for ($i = $last_message_key + 1; isset($data->message_list[$i]); $i++) {
                // If found from customer but found employee message return message list
                if ($found_from_customer == true &&
                  (!isset($data->message_list[$i]->id_customer) || !isset($data->message_list[$i]->id_guest))
                ) {
                    return json_encode(array('message_list' => $message_list));
                }

                if (isset($data->message_list[$i]->id_customer) || isset($data->message_list[$i]->id_guest)) {
                    $message_list[] = $data->message_list[$i];
                    $found_from_customer = true;
                }
            }
            return json_encode(array('message_list' => $message_list));
        }
    }

    /**
     * Search last messages from employee
     * @param $thread
     * @param $last_message_key exemple : [0|1|3...] position in the json file
     * @param $id_customer
     * @param $id_guest
     * @return array|null
     */
    public static function getEmployeeLastMessages($thread, $last_message_key, $id_customer, $id_guest)
    {
        $data = self::getThread($thread);
        $message_list = array();
        $found_from_employee = false;

        if (!$data) {
            return null;
        } elseif ($data->id_customer != $id_customer && $data->id_guest != $id_guest) {
            return null;
        } else {
            for ($i = $last_message_key + 1; isset($data->message_list[$i]); $i++) {
                if ($found_from_employee === true && !isset($data->message_list[$i]->id_employee)) {
                    return json_encode(array('message_list' => $message_list));
                }

                if (isset($data->message_list[$i]->id_employee)) {
                    $message_list[] = $data->message_list[$i];
                    $found_from_employee = true;
                }
            }
            return json_encode(array('message_list' => $message_list));
        }
    }

    /**
     * @param $text
     * @return mixed
     */
    public static function tagLink($text)
    {
        $reg_exUrl = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';

        if (preg_match($reg_exUrl, $text, $url)) {
            return preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">Link</a>', $text);
        } else {
            return $text;
        }
    }

    /**
     * Post a message in the thread
     * @param $thread
     * @param $message array("message_content" => "","id_employee" => id|"id_customer" => id|"id_guest" => id)
     * @return int|null last_key_message the key of your message
     */
    public static function postMessage($thread, $message)
    {
        $data = self::getThread($thread);
        if (!$data) {
            if (!$data = self::openThread($thread, true)) {
                return null;
            }
        }

        if ($data->id_customer == 0 && isset($message['id_customer'])) {
            $data->id_customer = (int)$message['id_customer'];
        }

        $message["message_date"] = @date("Y-m-d H:i:s");
        $message["message_content"] = self::tagLink(htmlspecialchars($message["message_content"]));
        $last_key_message = count($data->message_list);
        array_push($data->message_list, $message);
        if (file_put_contents(_OCHAT_DATA_DIR_.'thread_'.(int)$thread.'.json', json_encode($data)) !== false) {
            return json_encode(array('position' => $last_key_message, 'date' => $message["message_date"]));
        }
        return null;
    }

    /**
     * Count number of thread
     * @return mixed
     */
    public static function getNbOpenThread()
    {
        return count(preg_grep("/^thread_[0-9]+.json$/", Tools::scandir(_OCHAT_DATA_DIR_.'/', 'json')));
    }


    /**
     * Sort the file list regarding modifications dates
     * @return array|null
     */
    public static function scan_dir()
    {
        $files = $list = array();
        $ignored = array('.', '..', 'index.php');

        $list = scandir(_OCHAT_DATA_DIR_.'/');
        foreach ($list as $file) {
            if (in_array($file, $ignored)) {
                continue;
            } elseif (strstr($file, '.json') === false) {
                continue;
            }
            $files[$file] = filemtime(_OCHAT_DATA_DIR_ . '/' . $file);
        }
        arsort($files);
        $files = array_keys($files);
        return ($files) ? $files : null;
    }


    /**
     * Get all thread
     * @return string
     */
    public static function getAllThread()
    {
        $list = $list_sort = array();
        $i = 0;
        $is_client = 0;

        $files = self::scan_dir();

        if ($files) {
            foreach ($files as $f) {
                if (strstr($f, '_closed')) {
                    $temp = json_decode(file_get_contents(_OCHAT_DATA_DIR_.$f));
                    $list['closed'][$temp->thread] = $temp;
                    $list_sort['closed'][$i++] = $temp->thread;
                } elseif (strstr($f, 'thread')) {
                    $temp = json_decode(file_get_contents(_OCHAT_DATA_DIR_.$f));
                    $list['open'][$temp->thread] = $temp;
                    $last_message = count($temp->message_list) - 1;
                    if (!isset($temp->message_list[$last_message]->id_employee)) {
                        $is_client = 1;
                    }
                    $list_sort['open'][$i++] = $temp->thread;
                }
            }
        }
        return json_encode(array($list, $list_sort, $is_client));
    }

    /**
     * Check if the client has already a conversation
     * @param $id_customer
     * @param $id_guest
     * @return bool
     */
    public static function hasOpenThread($id_customer, $id_guest)
    {
        $flag = false;
        $files = self::scan_dir();

        if (!$files) {
            return false;
        }

        foreach ($files as $f) {
            if (strstr($f, '_closed') === false) {
                $temp = json_decode(file_get_contents(_OCHAT_DATA_DIR_.$f));
                if (((int)$temp->id_customer == $id_customer && $id_customer != null)
                    || ((int)$temp->id_guest == $id_guest && $id_guest != null)) {
                    return true;
                }
            }
        }
        return $flag;
    }

    /**
     * Save the entire thread in the database
     * Do not launch this function when you are not using ajax call :} ... please
     * @return bool|null
     */
    public static function dumpDb()
    {
        $flag = true;
        $files = scandir(_OCHAT_DATA_DIR_.'/');
        foreach ($files as $f) {
            if (strstr($f, '_closed')) {
                $data = json_decode(file_get_contents(_OCHAT_DATA_DIR_.$f));

                if (!$data) {
                    return null;
                } else {
                    $id_thread = null;

                    // If conversation history exists
                    $query = 'SELECT ot.id_thread
                        FROM `'._DB_PREFIX_.'ochat_thread` as ot
                        RIGHT JOIN `'._DB_PREFIX_.'ochat_message` as om ON ot.id_thread = om.id_thread WHERE ';
                    if ((int)$data->id_customer > 0) {
                        $query .= ' om.id_customer = '.(int)$data->id_customer;
                    } else {
                        $query .= ' om.id_guest = '.(int)$data->id_guest;
                    }
                    $query .= ' AND ot.id_shop = '.(int)$data->id_shop;

                    if (!$id_thread = Db::getInstance()->getValue($query)) {
                        $query = 'INSERT INTO `'._DB_PREFIX_.'ochat_thread` (`id_shop`, `create_date`, `id_lang`)
                            VALUES('.(int)$data->id_shop.',"'.pSQL($data->create_date).'",'.(int)$data->id_lang.')';
                        if (Db::getInstance()->Execute($query)) {
                            $id_thread = Db::getInstance()->Insert_ID();
                        } else {
                            return null;
                        }
                    }
                    foreach ($data->message_list as $message) {
                        $id_customer = (isset($message->id_customer)) ? (int)$message->id_customer : "NULL";
                        $id_guest = (isset($message->id_guest)) ? (int)$message->id_guest : "NULL";
                        $id_employee = (isset($message->id_employee)) ? (int)$message->id_employee : "NULL";

                        $query = 'INSERT INTO `'._DB_PREFIX_.'ochat_message`
                        (`message_content`, `message_date`, `id_thread`, `id_employee`, `id_customer`, `id_guest`)
                        VALUES("'.pSQL($message->message_content).'","'.pSQL($message->message_date).'",'
                            .(int)$id_thread.','.$id_employee.','.$id_customer.','.$id_guest.')';
                        if (!Db::getInstance()->Execute($query)) {
                            return null;
                        }
                    }
                    $flag = $flag && unlink(_OCHAT_DATA_DIR_.$f);
                }
            }
        }
        return $flag;
    }
}

if (isset($_POST['action']) && isset($_POST['params'])) {
    $params = (array)$_POST['params'];
    $action = (string)$_POST['action'];

    switch ($action) {
        case 'createThread':
            if (isset($params['id_lang']) && isset($params['id_shop'])) {
                echo JsonHandler::createThread((int)$params['id_lang'],
                  (int)$params['id_shop'],
                  (int)$params['id_customer'],
                  (int)$params['id_guest'],
                  (int)$params['id_employee'],
                  $params['customer_name']
                );
            } else {
                echo -1;
            }
            break;

        case 'postMessage':
            if (isset($params['thread']) && isset($params['message'])) {
                echo JsonHandler::postMessage((int)$params['thread'], (array)$params['message']);
            } else {
                echo -1;
            }
            break;

        case 'getEmployeeLastMessages':
            if (isset($params['thread']) &&
              isset($params['message_key']) && isset($params['id_customer']) && isset($params['id_guest'])
            ) {
                echo JsonHandler::getEmployeeLastMessages((int)$params['thread'],
                  (int)$params['message_key'],
                  (int)$params['id_customer'],
                  (int)$params['id_guest']
                );
            } else {
                echo -1;
            }
            break;

        case 'getAllThread':
            echo JsonHandler::getAllThread();
            break;

        case 'getCustomerLastMessages':
            if (isset($params['thread']) && isset($params['message_key'])) {
                echo JsonHandler::getCustomerLastMessages((int)$params['thread'], (int)$params['message_key']);
            } else {
                echo -1;
            }
            break;

        case 'openThread':
            if (isset($params['thread'])) {
                echo JsonHandler::openThread((int)$params['thread']);
            } else {
                echo -1;
            }
            break;

        case 'closeThread':
            if (isset($params['thread'])) {
                echo JsonHandler::closeThread((int)$params['thread']);
            } else {
                echo -1;
            }
            break;
    }
}
