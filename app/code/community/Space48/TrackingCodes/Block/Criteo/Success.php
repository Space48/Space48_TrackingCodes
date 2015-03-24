<?php

class Space48_TrackingCodes_Block_Criteo_Success extends Space48_TrackingCodes_Block_Criteo_Abstract
{
    /**
     * get confirmation params
     * 
     * @return string
     */
    public function getConfirmationParams()
    {
        $trackingLines = array();
        
        if ( $order = $this->getLastOrder() ) {
            foreach ( $order->getAllVisibleItems() as $item ) {
                if ( ! $item->getParentItem() ) {
                    $trackingLines[] = array(
                        'id'       => $item->getSku(),
                        'price'    => number_format($item->getData('price_incl_tax'), '2', '.', '.'),
                        'quantity' => $item->getQtyOrdered() * 1,
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
        $this->_eventData['trackTransaction'] = array(
            'event' => 'trackTransaction',
            'id'    => $this->getLastOrderId(),
            'item'  => $this->getConfirmationParams(),
        );
        
        return parent::_getEventData();
    }
}
