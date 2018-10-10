<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.module.tab.register' shared service.

return $this->services['prestashop.adapter.module.tab.register'] = new \PrestaShop\PrestaShop\Adapter\Module\Tab\ModuleTabRegister(${($_ = isset($this->services['prestashop.core.admin.tab.repository']) ? $this->services['prestashop.core.admin.tab.repository'] : $this->load('getPrestashop_Core_Admin_Tab_RepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.core.admin.lang.repository']) ? $this->services['prestashop.core.admin.lang.repository'] : $this->load('getPrestashop_Core_Admin_Lang_RepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'}, ${($_ = isset($this->services['translator.default']) ? $this->services['translator.default'] : $this->getTranslator_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->services['prestashop.adapter.legacy.context'] = new \PrestaShop\PrestaShop\Adapter\LegacyContext()) && false ?: '_'}->getLanguages());
