<?php

class Space48_TrackingCodes_Model_Bing
{
    public function getBingCode()
    {
        if ($lastOrder = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId())) {
            $code = Mage::helper('space48_trackingcodes')->getBingTrackingCode();
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
}