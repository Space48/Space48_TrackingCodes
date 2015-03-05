<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 18/12/13
 * Time: 15:07
 */

class Space48_TrackingCodes_Model_Observer
{

    public function catalogCategoryCollectionLoadAfter(Varien_Event_Observer $observer)
    {
        $productCount = 0;
        $productSkus = array();
        $collection = $observer->getEvent()->getCategoryCollection();
        foreach ($collection as $product) {
            $productSkus[] = $product->getId();
            $productCount++;
            if ($productCount >= 3) {
                break;
            }
        }
        //Mage::log($productSkus, null, "system.log", true);

    }

}