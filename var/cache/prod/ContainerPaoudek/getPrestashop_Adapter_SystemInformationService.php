<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.system_information' shared service.

return $this->services['prestashop.adapter.system_information'] = new \PrestaShop\PrestaShop\Adapter\System\SystemInformation(${($_ = isset($this->services['prestashop.adapter.hosting_information']) ? $this->services['prestashop.adapter.hosting_information'] : $this->services['prestashop.adapter.hosting_information'] = new \PrestaShop\PrestaShop\Adapter\Hosting\HostingInformation()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.mailing_information']) ? $this->services['prestashop.adapter.mailing_information'] : $this->services['prestashop.adapter.mailing_information'] = new \PrestaShop\PrestaShop\Adapter\Mail\MailingInformation()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.shop_information']) ? $this->services['prestashop.adapter.shop_information'] : $this->load('getPrestashop_Adapter_ShopInformationService.php')) && false ?: '_'});
