<?php

/**
 * Class Paul_ProductSubscription_Block_Subsmenu
 */
class Paul_ProductSubscription_Block_Subsmenu extends Mage_Catalog_Block_Product_View_Type_Simple
{

    /**
     * Create collection of subscriptions by user ID
     * @return mixed
     */
    public function loadDataByUserId()
    {
        $customer = Mage::getSingleton('customer/session');
        $userId = $customer->getId();

        $collection = Mage::getModel('productsubscription/subscriber')
            ->getCollection()
            ->addFieldToSelect('*')
            ->addFieldToFilter('user_id', $userId);

        return $collection;
    }

    /**
     * Find name of product by its id and return it
     * @param $productID
     * @return string
     */
    public function loadProductNameById($productID)
    {
        return $productName = Mage::getModel('catalog/product')->load($productID)->getName();
    }

    /**
     * @param $id
     * @return string
     */
    public function removeButtonAction($id)
    {
        return Mage::getUrl('productsubscription/menu/remove', array(
            'id' => $id
        ));
    }
}