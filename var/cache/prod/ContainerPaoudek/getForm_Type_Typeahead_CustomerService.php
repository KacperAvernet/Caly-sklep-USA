<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'form.type.typeahead.customer' shared service.

return $this->services['form.type.typeahead.customer'] = new \PrestaShopBundle\Form\Admin\Type\TypeaheadCustomerCollectionType(${($_ = isset($this->services['prestashop.adapter.data_provider.customer']) ? $this->services['prestashop.adapter.data_provider.customer'] : $this->services['prestashop.adapter.data_provider.customer'] = new \PrestaShop\PrestaShop\Adapter\Customer\CustomerDataProvider()) && false ?: '_'});
