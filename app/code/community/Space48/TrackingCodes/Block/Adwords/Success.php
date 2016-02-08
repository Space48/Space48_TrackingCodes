<?php
class Space48_TrackingCodes_Block_Adwords_Success extends Space48_TrackingCodes_Block_Adwords_Abstract
{
    public function getTotalValue()
    {
        if(!$this->getFieldValue('conversionvalue')) {
            return $this->getCheckoutHelper()->getLastOrder()->getGrandTotal();
        } else {
            return $this->getFieldValue('conversionvalue');
        }
    }
}