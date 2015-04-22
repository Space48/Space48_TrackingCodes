<?php

class Space48_TrackingCodes_Block_Reevoo_Confirmation extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * holds order
     *
     * @var Mage_Sales_Model_Order
     */
    protected $_order;

    /**
     * config name
     *
     * @var string
     */
    protected $_configName = 'reevoo';
    
    /**
     * Set the template for the protocol
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (Mage::app()->getStore()->isCurrentlySecure()) {
            $this->setTemplate('space48/trackingcodes/reevoo/confirmationsecure.phtml');
        } else {
            $this->setTemplate('space48/trackingcodes/reevoo/confirmationinsecure.phtml');
        }

        return parent::_toHtml();
    }

    /**
     * Can the Tracking Code be set in the source
     *
     * @return bool
     */
    protected function getCanShow()
    {
        // is enabled
        if ( ! parent::isEnabled() ) {
            return false;
        }
        
        // has order
        if ( ! $this->getOrder()->getId() ) {
            return false;
        }
        
        // has tracking reference
        if ( ! $this->getTrackingReference() ) {
            return false;
        }
        
        return true;
    }

    /**
     * Get the last order
     *
     * @return Mage_Sales_Model_Order
     */
    protected function getOrder()
    {
        return $this->getCheckoutHelper()->getLastOrder();
    }

    /**
     * Get the itemRef list
     * 
     * @return string
     */
    protected function getItemSkus()
    {
        $trackingLines = array();
        
        foreach ($this->getOrder()->getItemsCollection() as $item) {
            $trackingLines[] = '"'.$item->getSku().'"';
        }

        return implode (",", $trackingLines);
    }

    /**
     * Get the order total value
     *
     * @return int
     */
    protected function getOrderTotal()
    {
        return $this->getOrder()->getGrandTotal();
    }

    /**
     * Get the Reevoo Tracking Code Reference
     *
     * @return string
     */
    protected function getTrackingReference()
    {
        return $this->getConfigValue('trkref');  
    }
}
