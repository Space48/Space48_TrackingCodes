<?php

class Space48_TrackingCodes_Model_Remarketing
{
    public function getBasketParams()
    {
        $tracking_lines = array();
        $cart_total = 0;

        if ($cart = Mage::helper('checkout/cart')->getCart()) {
            foreach ($cart->getItems() as $item) {
                if (!$item->getParentItem()) {
                    $tracking_lines[] = "'" . $item->getSku() . "'";
                    $cart_total += $item->getData('price_incl_tax') * (int)$item->getQty();
                }
            }
        }

        return array(
            'cart_items' => join(",", $tracking_lines),
            'cart_total' => number_format($cart_total, 2, '.', ''),
        );
    }

    public function getLastOrderDetails()
    {
        if ($lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId()) {
            $order = Mage::getModel('sales/order')->load($lastOrderId);
            return array(
                'grand_total' => $order->getGrandTotal(),
            );
        }
    }

    public function getFirstInStockSimple($configProduct)
    {
        $fallBack = array();
        $simpleCollectionIds = $configProduct->getTypeInstance()->getUsedProductIds();
        $simpleBluePrint = Mage::getModel('catalog/product');
        foreach ($simpleCollectionIds as $productId) {
            $product = $simpleBluePrint->load($productId);
            $fallBack[] = array(
                'sku'   => $product->getSku(),
                'price' => $product->getFinalPrice(),
            );
            if ($product->getIsInStock()) {
                $fallBack[] = array(
                    'sku'   => $product->getSku(),
                    'price' => $product->getFinalPrice(),
                );
                return end($fallBack);
            }
        }
        return reset($fallBack);
    }

}