<?php

class Space48_TrackingCodes_Block_Criteo_Cart extends Space48_TrackingCodes_Block_Criteo_Abstract
{
	public function getCartParams()
	{
		$trackingLines = array();
        if ($cart = Mage::helper('checkout/cart')->getCart()) {
            foreach ($cart->getItems() as $item) {
                if (!$item->getParentItem()) {
                    $trackingLines[] = '{ id: "'.$item->getSku().'", price: '.number_format($item->getData('price_incl_tax'), '2', '.', '.').', quantity: '.(int)$item->getQty().' }';
                }
            }
        }
        return join(", \r\n", $trackingLines);
	}	
}