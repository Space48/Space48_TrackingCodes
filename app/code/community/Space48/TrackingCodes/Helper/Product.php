<?php

class Space48_TrackingCodes_Helper_Product extends Mage_Core_Helper_Abstract
{
    /**
     * returns an array with the first product that is in stock, if any
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getFirstInStockSimple()
    {
        if( ! $product->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_CONFIGURABLE) {
            return false;
        }
        $fallBack = array();
        $simpleCollectionIds = $product->getTypeInstance()
            ->getUsedProductCollection()
            ->addAttributeToSelect('sku')
            ->addAttributeToSelect('price');
        
        if(count($simpleCollection) == 0) {
            return false;
        }

        foreach ($simpleCollection as $product) {
            if ($product->getIsInStock()) {
                return $product;
            }
        }
        return $simpleCollection->getFirstItem();
    }


    /**
     * get current product
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getCurrentProduct()
    {
        return Mage::registry('current_product');
    }

}
