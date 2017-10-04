<?php

class Paul_Sub_Block_Product extends Mage_Catalog_Block_Product_View_Type_Simple
{
    public function getFormAnonymousAction()
    {
        return Mage::getUrl('sub/index/checkIfSubscriptionExists', array(
            'product' => $this->getProduct()->getEntityId()
        ));
    }

    public function getFormUserAction()
    {
        return Mage::getUrl('sub/index/saveUser', array(
            'product' => $this->getProduct()->getEntityId()
        ));
    }

    /**
     * @return mixed
     * Check by given combination of produc id and email if subscription exist
     */
    public function checkIfSubscriptionExists()
    {
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $productId = (int)$this->getProduct()->getEntityId();
            $email = $customer->getEmail();

            $collection = Mage::getModel('sub/subscriber')
                ->getCollection()
                ->addFieldToSelect('*')
                ->addFieldToFilter('email', $email)
                ->addFieldToFilter('product_id', $productId);

            return $collection->getSize();
        }
    }

}