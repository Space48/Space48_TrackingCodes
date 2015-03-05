<?php
/**
 * Created by PhpStorm.
 * User: george
 * Date: 16/12/13
 * Time: 09:47
 */

class Space48_TrackingCodes_Helper_Data extends Mage_Core_Helper_Abstract
{

    const CRITEO_CLIENTID = 's48trackingcodes/criteo/accountid';
    const CRITEO_ENABLED = 's48trackingcodes/criteo/enabled';
    const CRITEO_EMAIL = 's48trackingcodes/criteo/email';

    const BING_SETTINGS = 's48trackingcodes/bing/';
    const GADWORDS_SETTINGS = 's48trackingcodes/gadwords/';
    const GREMARKETING_SETTINGS = 's48trackingcodes/gremarketing/';

    public function getCriteoClientId()
    {
        return Mage::getStoreConfig(
            self::CRITEO_CLIENTID,
            Mage::app()->getStore()->getStoreId()
        );
    }

    public function getCriteoIsEnabled()
    {
        return Mage::getStoreConfig(
            self::CRITEO_ENABLED,
            Mage::app()->getStore()->getStoreId()
        );
    }

    public function getSiteEmail() {
        return Mage::getStoreConfig(
            self::CRITEO_EMAIL,
            Mage::app()->getStore()->getStoreId()
        );
    }

    public function getCriteoEmail() {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if($customer) {
            return $customer->getEmail();
        } else {
            return '';
        }
    }

    public function getBingConfig($setting = 'enabled')
    {
        return Mage::getStoreConfig(self::BING_SETTINGS . $setting);
    }

    public function getAdwordsConfig($settings = 'enabled')
    {
        return Mage::getStoreConfig(self::GADWORDS_SETTINGS . $settings);
    }

    public function getRemarketingConfig($settings = 'enabled')
    {
        return Mage::getStoreConfig(self::GREMARKETING_SETTINGS . $settings);
    }



    public function getBingTrackingCode()
    {
        if ($this->getBingConfig('enabled')) {
            return $this->getBingConfig('jscode');
        }
    }

    public function getCurrentProductId()
    {
        if (
            Mage::app()->getRequest()->getControllerName() == 'product' &&
            Mage::registry('current_product')
        ) {
            $product = Mage::registry('current_product');
            if ($product->getTypeId()=='configurable') {
                $simpleInStock = Mage::getModel('space48_trackingcodes/remarketing')->getFirstInStockSimple($product);
                return $simpleInStock['sku'];
            } else {
                return $product->getSku();
            }
        }
    }

    public function getCurrentProductPrice()
    {
        if (
            Mage::app()->getRequest()->getControllerName() == 'product' &&
            Mage::registry('current_product')
        ) {
            $product = Mage::registry('current_product');
            if ($product->getTypeId()=='configurable') {
                $simpleInStock = Mage::getModel('space48_trackingcodes/remarketing')->getFirstInStockSimple($product);
                return $simpleInStock['price'];
            } else {
                return Mage::registry('current_product')->getFinalPrice();
            }
        }
    }

    public function getClientId()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            return $customerData->getId();
        } else {
            return false;
        }
    }

    public function getCurrentCategoryName()
    {
        if(Mage::registry('current_category')) {
            return Mage::registry('current_category')->getName();
        }

        return false;
    }

    public function isCategoryListingPage()
    {
        if (Mage::app()->getRequest()->getRouteName() == 'catalogsearch') {
            return false;
        } else {
            return Mage::registry('current_category')->getIsLandingPage();
        }
    }

}