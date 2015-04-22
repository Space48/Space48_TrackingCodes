<?php

class Space48_TrackingCodes_Block_Imrg_Checkout extends Space48_TrackingCodes_Block_Imrg_Abstract
{

    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('space48/trackingcodes/imrg/checkout.phtml');
    }

    public function getCartTotal()
    {
    	return $this->getCartHelper()->getCartTotal();
    }

}