<?php

class Space48_TrackingCodes_Block_Criteo_List extends Space48_TrackingCodes_Block_Criteo_Abstract
{
    public function getTopSkus($limit = 3)
    {
        $productsCount = 0;
        $productSkus = array();
        foreach ($this->getLoadedProductCollection() as $product) {
            $productSkus[] = '"' . $product->getSku() . '"';
            $productsCount++;
            if ($productsCount >= (int)$limit) {
                break;
            }
        }
        return join (',', $productSkus);
    }
    
    public function getSearchTerms()
    {
       if (Mage::app()->getRequest()->getRouteName() == 'catalogsearch') {
            return Mage::app()->getRequest()->getParam('q');
       } else {
            return '';
       }
    }
}