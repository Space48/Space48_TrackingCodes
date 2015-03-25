<?php

class Space48_TrackingCodes_Block_Remarketing_Product extends Space48_TrackingCodes_Block_Remarketing_Abstract
{

    /**
     * page type
     *
     * @var array
     */
    protected $_pageType = 'product';

    public function getTotalValue()
    {
        return $this->getProductHelper()->getCurrentProduct()->getFinalPrice();
    }

    public function getProductId()
    {
        return $this->getProductHelper()->getCurrentProduct()->getId();
    }

}
