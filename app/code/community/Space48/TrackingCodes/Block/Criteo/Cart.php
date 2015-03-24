<?php

class Space48_TrackingCodes_Block_Criteo_Cart extends Space48_TrackingCodes_Block_Criteo_Abstract
{
    /**
     * get cart params
     * 
     * @return string
     */
    public function getCartParams()
    {
        $trackingLines = array();
        
        if ( $cart = $this->getCart() ) {
            foreach ( $cart->getItems() as $item ) {
                if ( ! $item->getParentItem() ) {
                    $trackingLines[] = array(
                        'id'       => $item->getSku(),
                        'price'    => number_format($item->getData('price_incl_tax'), '2', '.', '.'),
                        'quantity' => $item->getQty() * 1,
                    );
                }
            }
        }
        
        return $trackingLines;
    }
    
    /**
     * get event data
     *
     * @return array
     */
    protected function _getEventData()
    {
        // set account
        $this->_eventData['viewBasket'] = array(
            'event' => 'viewBasket',
            'item'  => $this->getCartParams(),
        );
        
        return parent::_getEventData();
    }
}
