<?php

abstract class Space48_TrackingCodes_Block_Criteo_Abstract extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * config name
     *
     * @var string
     */
	protected $_configName = 'criteo';
    
    /**
     * holds event data
     *
     * @var array
     */
    protected $_eventData = array();
	
    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        
        // set the default template, this can
        // be overidden in the layout xml
        $this->setTemplate('space48/trackingcodes/criteo/default.phtml');
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
        
        if ( ! $this->getSiteType() ) {
            return false;
        }
        
        if ( ! $this->getEmail() ) {
            return false;
        }
        
        return true;
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
     * get site type
     * 
     * @todo should this be in config?
     * 
     * @return string
     */
    public function getSiteType()
    {
        return 'd';
    }
    
    /**
     * get email
     *
     * @return string
     */
	public function getEmail()
	{
		return $this->getConfigValue('email');	
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
}
