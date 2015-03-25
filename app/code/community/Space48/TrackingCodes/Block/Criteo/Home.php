<?php

class Space48_TrackingCodes_Block_Criteo_Home extends Space48_TrackingCodes_Block_Criteo_Abstract
{
    /**
     * get event data
     *
     * @return array
     */
    protected function _getEventData()
    {
        // set account
        $this->_eventData['viewHome'] = array(
            'event' => 'viewHome',
        );
        
        return parent::_getEventData();
    }
}
