<?php

/**
 * Criteo Tracking Code
 */

class Space48_TrackingCodes_Model_Container extends Enterprise_PageCache_Model_Container_Abstract
{


    protected function _getCacheId()
    {
        //Mage::log('CRITEO' . md5($this->_placeholder->getAttribute('cache_id')));
        return 'CRITEO' . md5(date('c'));
    }


    protected function _renderBlock()
    {
        $blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');

        //Mage::log($blockClass);
        //Mage::log($template);

        $block = new $blockClass;
        $block->setTemplate($template);

        return $block->toHtml();
    }

    protected function _saveCache($data, $id, $tags = array(), $lifetime = null) { return false; }

}
