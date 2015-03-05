<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 18/12/13
 * Time: 15:38
 */


class Space48_TrackingCodes_Block_Catalog_Listing extends Mage_Catalog_Block_Product_List
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