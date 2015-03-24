<?php

class Space48_TrackingCodes_Block_Criteo_Success extends Space48_TrackingCodes_Block_Criteo_Abstract
{
	public function getLastOrderId()
	{
		return Mage::getSingleton('checkout/session')->getLastRealOrderId();
	}

	public function getConfirmationParams()
	{
		$trackingLines = array();
        if ($lastOrder = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId())) {
            foreach ($lastOrder->getAllVisibleItems() as $item) {
                if (!$item->getParentItem()) {
                    $trackingLines[] = '{ id: "'.$item->getSku().'", price: '.number_format($item->getData('price_incl_tax'), '2', '.', '.').', quantity: '.(int)$item->getQtyOrdered().' }';
                }
            }
        }
        return join(", \r\n", $trackingLines);
	}
}