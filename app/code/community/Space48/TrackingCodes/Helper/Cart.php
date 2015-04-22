<?php

class Space48_TrackingCodes_Helper_Cart extends Mage_Core_Helper_Abstract
{

    /**
     * get current cart
     *
     * @return Mage_Checkout_Model_Cart
     */        
    public function getCart()
    {
        return Mage::getModel('checkout/cart');
    }


    /**
     * get cart total
     *
     * @return float
     */
    public function getCartTotal()
    {
        return $this->getQuote()->getGrandTotal();
    }

    /**
     * get current quote
     *
     * @return Mage_Sales_Model_Quote
     */
    public function getQuote()
    {
        return $this->getCart()->getQuote();
    }
}
