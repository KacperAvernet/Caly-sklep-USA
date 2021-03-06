<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.translation.translations_factory' shared service.

$this->services['prestashop.translation.translations_factory'] = $instance = new \PrestaShopBundle\Translation\Factory\TranslationsFactory();

$instance->addProvider(${($_ = isset($this->services['prestashop.translation.backoffice_provider']) ? $this->services['prestashop.translation.backoffice_provider'] : $this->load('getPrestashop_Translation_BackofficeProviderService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.frontoffice_provider']) ? $this->services['prestashop.translation.frontoffice_provider'] : $this->load('getPrestashop_Translation_FrontofficeProviderService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.mails']) ? $this->services['prestashop.translation.mails'] : $this->load('getPrestashop_Translation_MailsService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.others_provider']) ? $this->services['prestashop.translation.others_provider'] : $this->load('getPrestashop_Translation_OthersProviderService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.modules_provider']) ? $this->services['prestashop.translation.modules_provider'] : $this->load('getPrestashop_Translation_ModulesProviderService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.module_provider']) ? $this->services['prestashop.translation.module_provider'] : $this->load('getPrestashop_Translation_ModuleProviderService.php')) && false ?: '_'});
$instance->addProvider(${($_ = isset($this->services['prestashop.translation.search_provider']) ? $this->services['prestashop.translation.search_provider'] : $this->load('getPrestashop_Translation_SearchProviderService.php')) && false ?: '_'});

return $instance;
