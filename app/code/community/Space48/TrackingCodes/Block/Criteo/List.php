<?php

class Space48_TrackingCodes_Block_Criteo_List extends Space48_TrackingCodes_Block_Criteo_Abstract
{
    /**
     * get top skus
     * 
     * @param int $limit
     *
     * @return string
     */
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
        
        return $productSkus;
    }
    
    /**
     * get search terms
     *
     * @return string
     */
    public function getSearchTerms()
    {
       if (Mage::app()->getRequest()->getRouteName() == 'catalogsearch') {
            return Mage::app()->getRequest()->getParam('q');
       } else {
            return '';
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
        $this->_eventData['viewList'] = array(
            'event'    => 'viewList',
            'item'     => $this->getTopSkus(),
            'keywords' => $this->getSearchTerms(),
        );
        
        return parent::_getEventData();
    }
}
