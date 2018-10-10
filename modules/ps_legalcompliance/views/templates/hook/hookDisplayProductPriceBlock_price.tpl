{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 *  @author 	PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2016 PrestaShop SA
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 *}

{if isset($smartyVars)}
    {* "Shipping CMS content" Price Hook templating *}
    {if isset($smartyVars.ship) && isset($smartyVars.ship.link_ship_pay) &&
    isset($smartyVars.ship.ship_str_i18n)}
        <span class="aeuc_shipping_label">
            <a href="{$smartyVars.ship.link_ship_pay}" class="iframe">
                {$smartyVars.ship.ship_str_i18n|escape:'htmlall'}
            </a>
        </span>
    {/if}
{/if}
