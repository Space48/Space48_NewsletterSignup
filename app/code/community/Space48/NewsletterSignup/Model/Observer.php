<?php

class Space48_Newslettersignup_Model_Observer {

    protected function _subscribeCheckout($email, $observer)
    {
        $subscriber = Mage::getModel('newsletter/subscriber')->loadByEmail($email);
        if (Mage::getSingleton('customer/session')->getIsSubscribed() == "opt-in") {

            if (!$subscriber->getId() ||
                $subscriber->getStatus() == Mage_Newsletter_Model_Subscriber::STATUS_UNSUBSCRIBED ||
                $subscriber->getStatus() == Mage_Newsletter_Model_Subscriber::STATUS_NOT_ACTIVE) {
                Mage::getModel('newsletter/subscriber')->subscribe($email);
            }
        }
    }

    public function updateSubscription($observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $customer = $quote->getCustomer();

        switch ($quote->getCheckoutMethod()) {
            case "guest":
                $this->_subscribeCheckout($quote->getBillingAddress()->getEmail(),$observer);
                break;
            default:
                $this->_subscribeCheckout($customer->getEmail(),$observer);
                break;
        }
    }

}

?>