<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.api.feature.controller' shared service.

$this->services['prestashop.core.api.feature.controller'] = $instance = new \PrestaShopBundle\Controller\Api\FeatureController();

$instance->featureAttributeRepository = ${($_ = isset($this->services['prestashop.core.api.feature_attribute.repository']) ? $this->services['prestashop.core.api.feature_attribute.repository'] : $this->load('getPrestashop_Core_Api_FeatureAttribute_RepositoryService.php')) && false ?: '_'};
$instance->setLogger(${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->getLoggerService()) && false ?: '_'});
$instance->setContainer($this);

return $instance;
