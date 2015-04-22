<?php

class Space48_TrackingCodes_Helper_Checkout extends Mage_Core_Helper_Abstract
{
        
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
     * get last order id
     *
     * @return Mage_Sales_Model_Order
     */
    public function getLastOrder()
    {
        return Mage::getModel('sales/order')->loadByIncrementId($this->getLastOrderId());
    }
}
