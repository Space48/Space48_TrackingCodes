<?php

class Space48_TrackingCodes_Block_Remarketing_Success extends Space48_TrackingCodes_Block_Remarketing_Abstract
{

    /**
     * must be declared in child classes
     *
     * @var array
     */
    protected $_pageType = 'purchase';


    public function getTotalValue()
    {
        return $this->getCheckoutHelper()->getLastOrder()->getGrandTotal();
    }

}
