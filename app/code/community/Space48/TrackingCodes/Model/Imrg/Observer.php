<?php

class Space48_TrackingCodes_Model_Imrg_Observer
{
    public function trackAddToCart($observer)
    {
        if(Mage::getStoreConfig('s48trackingcodes/imrg/enabled')) {
            $product = $observer->getEvent()->getQuoteItem()->getProduct();    
            Mage::getModel('core/session')->setShowImrgAddToCart(true);
            Mage::getModel('core/session')->setImrgAddToCartProductPrice(Mage::helper('tax')->getPrice($product, $product->getFinalPrice()));    
        }
        
    }
}