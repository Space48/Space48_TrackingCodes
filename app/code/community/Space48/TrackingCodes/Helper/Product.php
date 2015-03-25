<?php

class Space48_TrackingCodes_Helper_Product extends Mage_Core_Helper_Abstract
{
    public function getFirstInStockSimple(Mage_Catalog_Model_Product $product)
    {
        $fallBack = array();
        $simpleCollectionIds = $product->getTypeInstance()->getUsedProductIds();
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
