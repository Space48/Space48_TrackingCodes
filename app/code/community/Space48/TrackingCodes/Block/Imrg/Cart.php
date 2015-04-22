<?php

class Space48_TrackingCodes_Block_Imrg_Cart extends Space48_TrackingCodes_Block_Imrg_Abstract
{

    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('space48/trackingcodes/imrg/cart.phtml');
    }

	public function isEnabled()
    {
        if ( ! parent::isEnabled() ) {
            return false;
        }
        
        if ( ! $this->getShowAddToCart() ) {
            return false;
        }

        return true;
    }

    public function getShowAddToCart()
    {
    	return Mage::getModel('core/session')->getShowImrgAddToCart();
    }

    public function getAddToCartPrice()
    {
    	return Mage::getModel('core/session')->getImrgAddToCartProductPrice();
    }

    protected function _afterToHtml($html)
    {
    	Mage::getModel('core/session')->unsShowImrgAddToCart();
    	Mage::getModel('core/session')->unsImrgAddToCartProductPrice();
    	return parent::_afterToHtml($html);
    }
    
}