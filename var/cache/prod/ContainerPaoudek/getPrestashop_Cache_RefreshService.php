<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.cache.refresh' shared service.

$this->services['prestashop.cache.refresh'] = $instance = new \PrestaShopBundle\Service\Cache\Refresh(${($_ = isset($this->services['kernel']) ? $this->services['kernel'] : $this->get('kernel')) && false ?: '_'});

$instance->addCacheClear();

return $instance;
