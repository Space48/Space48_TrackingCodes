<?php

class Space48_TrackingCodes_Block_Imrg_Success extends Space48_TrackingCodes_Block_Imrg_Abstract
{
    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('space48/trackingcodes/imrg/success.phtml');
    }

    public function getTotalValue()
    {
        return $this->getCheckoutHelper()->getLastOrder()->getGrandTotal();
    }
}