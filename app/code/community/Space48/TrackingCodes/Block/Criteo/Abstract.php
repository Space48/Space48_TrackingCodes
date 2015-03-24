<?php

abstract class Space48_TrackingCodes_Block_Criteo_Abstract extends Space48_TrackingCodes_Block_Abstract
{
	protected $_configName = 'criteo';
	
	public function getAccountId()
	{
		return $this->getConfigValue('accountid');	
	}

	public function getEmail()
	{
		return $this->getConfigValue('email');	
	}
}