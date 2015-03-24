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
    
    /**
     * get event data
     *
     * @return array
     */
    protected function _getEventData()
    {
        // set account
        $this->_eventData['viewItem'] = array(
            'event' => 'viewItem',
            'item'  => $this->getCurrentProductId(),
        );
        
        return parent::_getEventData();
    }
}
