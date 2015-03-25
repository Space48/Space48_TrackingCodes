<?php

class Space48_TrackingCodes_Block_Remarketing_Cart extends Space48_TrackingCodes_Block_Remarketing_Abstract
{

    /**
     * must be declared in child classes
     *
     * @var array
     */
    protected $_pageType = 'basket';


    public function getTotalValue()
    {
        return $this->getCheckoutHelper()->getLastOrder()->getGrandTotal();
    }
}
