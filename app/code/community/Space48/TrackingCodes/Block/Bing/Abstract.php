<?php

abstract class Space48_TrackingCodes_Block_Bing_Abstract extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * config name
     *
     * @var string
     */
    protected $_configName = 'bing';
    
    
    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        
        // set the default template, this can
        // be overidden in the layout xml
        $this->setTemplate('space48/trackingcodes/bing/default.phtml');
    }

    /**
     * get jscode
     *
     * @var string
     */
    public function getJsCode()
    {
        return $this->getConfigValue('jscode');
    }
}
