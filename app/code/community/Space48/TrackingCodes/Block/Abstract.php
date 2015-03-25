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
     * get cart
     *
     * @return Mage_Checkout_Model_Cart
     */
    public function getCart()
    {
        return Mage::getSingleton('checkout/cart');
    }
    
    /**
     * get cart items
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract|array
     */
    public function getCartItems()
    {
        return $this->getCart()->getItems();
    }
    
    /**
     * get quote Mage_Sales_Model_Quote
     *
     * @return Mage_Sales_Model_Quote
     */
    public function getQuote()
    {
        return $this->getCart()->getQuote();
    }
    
    /**
     * get last order id
     *
     * @return int|null
     */
    public function getLastOrderId()
    {
        return Mage::getSingleton('checkout/session')->getLastRealOrderId();
    }
    
    /**
     * get last order
     *
     * @return Mage_Sales_Model_Order
     */
    public function getLastOrder()
    {
        if ( ! $this->getData('last_order') ) {
            // get order model
            $order = Mage::getModel('sales/order');
            
            // if we have the id then load order
            if ( $id = $this->getLastOrderId(); ) {
                $order->loadByIncrementId($id)
            }
            
            $this->setData('last_order', $order);
        }
        
        return $this->getData('last_order');
    }
    
    /**
     * get current product
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getCurrentProduct()
    {
        // try obtain from registry
        $product = Mage::registry('current_product');
        
        // load empty product model if
        // we have not got one loaded
        if ( ! ( $product instanceof Mage_Catalog_Model_Product ) ) {
            $product = Mage::getModel('catalog/product');
        }
        
        return $product;
    }
    
    /**
     * get current product id
     *
     * @return int|null
     */
    public function getCurrentProductId()
    {
        return $this->getCurrentProduct()->getId();
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
