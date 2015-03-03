<?php

class Space48_NewsletterSignup_Block_Signup extends Mage_Checkout_Block_Onepage_Abstract
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('newslettersignup/signupcheckbox.phtml');
    }

    public function notSubscribed()
    {
        if ($this->isCustomerLoggedIn()) {
            $customer = $this->getCustomer();
            $subscriber = Mage::getModel('newsletter/subscriber')->loadByEmail($customer->getEmail());

            if ($subscriber->getId() && $subscriber->getStatus() == Mage_Newsletter_Model_Subscriber::STATUS_SUBSCRIBED) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

}