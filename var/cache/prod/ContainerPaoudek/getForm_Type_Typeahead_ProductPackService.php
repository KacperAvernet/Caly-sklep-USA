<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'form.type.typeahead.product_pack' shared service.

return $this->services['form.type.typeahead.product_pack'] = new \PrestaShopBundle\Form\Admin\Type\TypeaheadProductPackCollectionType(${($_ = isset($this->services['prestashop.adapter.data_provider.product']) ? $this->services['prestashop.adapter.data_provider.product'] : $this->services['prestashop.adapter.data_provider.product'] = new \PrestaShop\PrestaShop\Adapter\Product\ProductDataProvider()) && false ?: '_'});
