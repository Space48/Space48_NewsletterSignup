<?php

class Space48_Newslettersignup_Model_Checkout_Type_Onepage extends Mage_Checkout_Model_Type_Onepage {

    public function saveBilling($data, $customerAddressId) {
        if (isset($data['newslettersignup'])) {
            if (!empty($data['newslettersignup'])) {
                $this->getCustomerSession()->setIsSubscribed("opt-in");
            } else {
                $this->getCustomerSession()->setIsSubscribed("opt-out");
            }
        }
        return parent::saveBilling($data, $customerAddressId);
    }

}