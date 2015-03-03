<?php

class Space48_NewsletterSignup_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function checkboxEnabled() {
        return Mage::getStoreConfigFlag('newsletter/space48_newslettersignup/enabled');
    }

    public function checkedByDefault() {
        return Mage::getStoreConfigFlag('newsletter/space48_newslettersignup/checked');
    }

}