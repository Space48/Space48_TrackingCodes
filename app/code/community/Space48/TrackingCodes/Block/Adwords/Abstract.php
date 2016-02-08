<?php

abstract class Space48_TrackingCodes_Block_Adwords_Abstract extends Space48_TrackingCodes_Block_Abstract
{
    /**
     * config name
     *
     * @var string
     */
    protected $_configName = 'adwords';
    
    
    /**
     * constructor
     */
    public function _construct()
    {
        parent::_construct();
        
        // set the default template, this can
        // be overidden in the layout xml
        $this->setTemplate('space48/trackingcodes/adwords/default.phtml');
    }

    public function getConversionId()
    {
        return $this->getConfigValue('conversionid');
    }

    public function getFieldValue($field)
    {
        return $this->getConfigValue($field);
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
        
        if ( ! $this->getConversionId() ) {
            return false;
        }
        
        return true;
    }
}
