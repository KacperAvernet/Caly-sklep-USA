<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.preferences.form_handler' shared service.

return $this->services['prestashop.adapter.preferences.form_handler'] = new \PrestaShop\PrestaShop\Core\Form\FormHandler(${($_ = isset($this->services['form.factory']) ? $this->services['form.factory'] : $this->load('getForm_FactoryService.php')) && false ?: '_'}->createBuilder(), ${($_ = isset($this->services['prestashop.hook.dispatcher']) ? $this->services['prestashop.hook.dispatcher'] : $this->getPrestashop_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.preferences.form_provider']) ? $this->services['prestashop.adapter.preferences.form_provider'] : $this->load('getPrestashop_Adapter_Preferences_FormProviderService.php')) && false ?: '_'}, array('general' => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General\\PreferencesType'), 'GeneralPage');
