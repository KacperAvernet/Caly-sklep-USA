<?php

namespace Proxies\__CG__\PrestaShopBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class StockMvt extends \PrestaShopBundle\Entity\StockMvt implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStockMvt', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStock', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idOrder', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idSupplyOrder', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStockMvtReason', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idEmployee', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'employeeLastname', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'employeeFirstname', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'physicalQuantity', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'dateAdd', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'sign', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'priceTe', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'lastWa', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'currentWa', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'referer');
        }

        return array('__isInitialized__', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStockMvt', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStock', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idOrder', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idSupplyOrder', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idStockMvtReason', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'idEmployee', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'employeeLastname', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'employeeFirstname', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'physicalQuantity', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'dateAdd', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'sign', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'priceTe', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'lastWa', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'currentWa', '' . "\0" . 'PrestaShopBundle\\Entity\\StockMvt' . "\0" . 'referer');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (StockMvt $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdStockMvt()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getIdStockMvt();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdStockMvt', array());

        return parent::getIdStockMvt();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdStock($idStock)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdStock', array($idStock));

        return parent::setIdStock($idStock);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdStock()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdStock', array());

        return parent::getIdStock();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdOrder($idOrder)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdOrder', array($idOrder));

        return parent::setIdOrder($idOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdOrder()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdOrder', array());

        return parent::getIdOrder();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdSupplyOrder($idSupplyOrder)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdSupplyOrder', array($idSupplyOrder));

        return parent::setIdSupplyOrder($idSupplyOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdSupplyOrder()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdSupplyOrder', array());

        return parent::getIdSupplyOrder();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdStockMvtReason($idStockMvtReason)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdStockMvtReason', array($idStockMvtReason));

        return parent::setIdStockMvtReason($idStockMvtReason);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdStockMvtReason()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdStockMvtReason', array());

        return parent::getIdStockMvtReason();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdEmployee($idEmployee)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdEmployee', array($idEmployee));

        return parent::setIdEmployee($idEmployee);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdEmployee()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdEmployee', array());

        return parent::getIdEmployee();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmployeeLastname($employeeLastname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmployeeLastname', array($employeeLastname));

        return parent::setEmployeeLastname($employeeLastname);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmployeeLastname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmployeeLastname', array());

        return parent::getEmployeeLastname();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmployeeFirstname($employeeFirstname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmployeeFirstname', array($employeeFirstname));

        return parent::setEmployeeFirstname($employeeFirstname);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmployeeFirstname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmployeeFirstname', array());

        return parent::getEmployeeFirstname();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhysicalQuantity($physicalQuantity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhysicalQuantity', array($physicalQuantity));

        return parent::setPhysicalQuantity($physicalQuantity);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhysicalQuantity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhysicalQuantity', array());

        return parent::getPhysicalQuantity();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateAdd($dateAdd)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateAdd', array($dateAdd));

        return parent::setDateAdd($dateAdd);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateAdd()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateAdd', array());

        return parent::getDateAdd();
    }

    /**
     * {@inheritDoc}
     */
    public function setSign($sign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSign', array($sign));

        return parent::setSign($sign);
    }

    /**
     * {@inheritDoc}
     */
    public function getSign()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSign', array());

        return parent::getSign();
    }

    /**
     * {@inheritDoc}
     */
    public function setPriceTe($priceTe)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPriceTe', array($priceTe));

        return parent::setPriceTe($priceTe);
    }

    /**
     * {@inheritDoc}
     */
    public function getPriceTe()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPriceTe', array());

        return parent::getPriceTe();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastWa($lastWa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastWa', array($lastWa));

        return parent::setLastWa($lastWa);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastWa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastWa', array());

        return parent::getLastWa();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentWa($currentWa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentWa', array($currentWa));

        return parent::setCurrentWa($currentWa);
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentWa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentWa', array());

        return parent::getCurrentWa();
    }

    /**
     * {@inheritDoc}
     */
    public function setReferer($referer)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReferer', array($referer));

        return parent::setReferer($referer);
    }

    /**
     * {@inheritDoc}
     */
    public function getReferer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReferer', array());

        return parent::getReferer();
    }

}
