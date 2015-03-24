<?php

abstract class Space48_TrackingCodes_Block_Abstract extends Mage_Core_Block_Abstract
{

	protected $_configName = null;

	public function isEnabled() 
	{
		if (is_null($this->_configName)) {
			return false;
		}
		return Mage::getStoreConfig('s48trackingcodes/' . $this->_configName . '/enabled');
	}

	public function getConfigValue($field)
	{
		return Mage::getStoreConfig('s48trackingcodes/' . $this->_configName . '/' . $field);	
	}

	protected function _toHtml()
	{
		if ( ! $this->isEnabled()) {
			return false;
		}
		return parent::_toHtml();
	}

	public function getProductHelper()
	{
		return Mage::helper('space48_trackingcodes/product');
	}

}