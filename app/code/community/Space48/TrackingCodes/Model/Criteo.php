<?php

class Space48_TrackingCodes_Model_Criteo
{
    public function getBasketParams()
    {
        $tracking_lines = array();
        if ($cart = Mage::helper('checkout/cart')->getCart()) {
            foreach ($cart->getItems() as $item) {
                if (!$item->getParentItem()) {
                    $tracking_lines[] = '{ id: "'.$item->getSku().'", price: '.number_format($item->getData('price_incl_tax'), '2', '.', '.').', quantity: '.(int)$item->getQty().' }';
                }
            }
        }
        return join(", \r\n", $tracking_lines);
    }

    public function getConfirmationParams()
    {
        $tracking_lines = array();
        if ($lastOrder = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId())) {
            foreach ($lastOrder->getAllVisibleItems() as $item) {
                if (!$item->getParentItem()) {
                    $tracking_lines[] = '{ id: "'.$item->getSku().'", price: '.number_format($item->getData('price_incl_tax'), '2', '.', '.').', quantity: '.(int)$item->getQtyOrdered().' }';
                }
            }
        }
        return join(", \r\n", $tracking_lines);
    }
}