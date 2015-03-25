<?php

abstract class Space48_TrackingCodes_Block_Remarketing_Abstract extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * config name
     *
     * @var string
     */
    protected $_configName = 'remarketing';
    
    /**
     * must be declared in child classes
     *
     * @var array
     */
    protected $_pageType = null;

    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        
        // set the default template, this can
        // be overidden in the layout xml
        $this->setTemplate('space48/trackingcodes/remarketing/default.phtml');
    }
    
    /**
     * get account it
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->getConfigValue('accountid');  
    }
    
    /**
     * get event data
     *
     * @return array
     */
    protected function _getEventData()
    {
        // set account
        $this->_eventData['setAccount'] = array(
            'event'   => 'setAccount',
            'account' => $this->getAccountId(),
        );
        
        // set site type
        $this->_eventData['setSiteType'] = array(
            'event' => 'setSiteType',
            'type'  => $this->getSiteType(),
        );
        
        // set email
        $this->_eventData['setEmail'] = array(
            'event' => 'setEmail',
            'email' => $this->getEmail(),
        );
        
        return $this->_eventData;
    }

    /**
     * is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        if ( ! parent::isEnabled() ) {
            return false;
        }
        
        if ( ! $this->getAccountId() ) {
            return false;
        }
        
        if ( ! $this->getPageType() ) {
            return false;
        }
        
        return true;
    }
    
    /**
     * get event data js
     *
     * @return string
     */
    public function getEventDataJs()
    {
        $js = array();
        
        foreach ( $this->_getEventData() as $data ) {
            $js[] = json_encode($data);
        }
        
        return implode(',', $js);
    }

    /**
     * get page type
     *
     * @return string
     */
    protected function getPageType()
    {
        return $this->_pageType;
    }

    /**
     * get total value
     *
     * @return string
     */
    public function getTotalValue()
    {
        return '';
    }

    /**
     * get product type
     *
     * @return string
     */
    public function getProductId()
    {
        return '';
    }
}
