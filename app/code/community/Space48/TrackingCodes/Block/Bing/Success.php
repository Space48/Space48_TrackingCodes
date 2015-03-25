<?php
class Space48_TrackingCodes_Block_Bing_Success extends Space48_TrackingCodes_Block_Bing_Abstract
{

    /**
     * get code
     *
     * @return string
     */
    public function getCode()
    {
        if ($lastOrder = $this->getCheckoutHelper()->getLastOrder()) {
            $code = $this->getConfigValue('jscode');
            $orderTotal = $lastOrder->getGrandTotal() - $lastOrder->getShippingAmount();
            $code = str_replace(
                '{$SALE_AMOUNT}',
                number_format($orderTotal, '2', '.', '.'),
                $code
            );
            return $code;
        }
        return false;
    }

   /**
     * is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        if ( ! parent::isEnabled() ) {
            return false;
        }
        
        if ( ! $this->getJsCode() ) {
            return false;
        }
        
        return true;
    }
}