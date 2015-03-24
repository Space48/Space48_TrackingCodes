<?php

class Space48_TrackingCodes_Block_Criteo_Product extends Space48_TrackingCodes_Block_Criteo_Abstract
{
	public function getCurrentProductId()
	{
		if ($product = Mage::registry('current_product')) {
            if ($product->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_CONFIGURABLE) {
                $simpleInStock = $this->getProductHelper()->getFirstInStockSimple($product);
                return $simpleInStock['sku'];
            } else {
                return $product->getSku();
            }
        }
	}	
}