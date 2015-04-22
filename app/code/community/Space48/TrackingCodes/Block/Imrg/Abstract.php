<?php

abstract class Space48_TrackingCodes_Block_Imrg_Abstract extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * config name
     *
     * @var string
     */
    protected $_configName = 'imrg';

    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        
        // set the default template, this can
        // be overidden in the layout xml
        $this->setTemplate('space48/trackingcodes/imrg/default.phtml');
    }
    
    /**
     * get account it
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->getConfigValue('apikey');  
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
        
        if ( ! $this->getApiKey() ) {
            return false;
        }
        
        return true;
    }
    
}
