<?php

abstract class Space48_TrackingCodes_Block_Abstract extends Mage_Core_Block_Template
{
    /**
     * must be defined in child classes
     *
     * @var null
     */
    protected $_configName = null;
    
    /**
     * is enabled
     *
     * @return bool
     */
    public function isEnabled() 
    {
        if (is_null($this->_configName)) {
            return false;
        }
        return Mage::getStoreConfig('s48trackingcodes/' . $this->getConfigName() . '/enabled');
    }
    
    /**
     * get config name
     *
     * @return string
     */
    public function getConfigName()
    {
        return $this->_configName;
    }
    
    /**
     * get config value
     *
     * @param  string $field
     *
     * @return string|null
     */
    public function getConfigValue($field)
    {
        return Mage::getStoreConfig('s48trackingcodes/' . $this->getConfigName() . '/' . $field);   
    }
        
    /**
     * get product helper
     *
     * @return Space48_TrackingCodes_Helper_Product
     */
    public function getProductHelper()
    {
        return Mage::helper('space48_trackingcodes/product');
    }

    /**
     * get checkout helper
     *
     * @return Space48_TrackingCodes_Helper_Checkout
     */
    public function getCheckoutHelper()
    {
        return Mage::helper('space48_trackingcodes/checkout');
    }

    /**
     * get checkout helper
     *
     * @return Space48_TrackingCodes_Helper_Checkout
     */
    public function getCartHelper()
    {
        return Mage::helper('space48_trackingcodes/cart');
    }
    
    /**
     * to html
     *
     * @return string
     */
    protected function _toHtml()
    {
        if ( ! $this->isEnabled()) {
            return false;
        }
        
        return parent::_toHtml();
    }
}
