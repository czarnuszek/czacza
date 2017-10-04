<?php

/**
 * Class Paul_ProductSubscription_IndexController
 */
class Paul_ProductSubscription_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     * Render Layout
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Save user that is logged in
     */
    public function saveUserAction()
    {

        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            $productId = (int)$this->getRequest()->getParam('product');
            $email = $customer->getEmail();
            $userId = $customer->getId();

            $data = array(
                'email' => $email,
                'product_id' => $productId,
                'user_id' => $userId
            );

            $model = Mage::getModel('productsubscription/subscriber');
            $model->setData($data)
                ->save();

            $this->_redirectReferer();
        }
    }

    /**
     * Check if given combination of productID and email already exists in table
     */
    public function checkIfSubscriptionExistsAction()
    {
        $productId = (int)$this->getRequest()->getParam('product');
        $email = Mage::app()->getRequest()->getPost('email');

        $collection = Mage::getModel('productsubscription/subscriber')
            ->getCollection()
            ->addFieldToSelect('*')
            ->addFieldToFilter('email', $email)
            ->addFieldToFilter('product_id', $productId);

        if ($collection->getSize() !== 0) {
            $this->_redirect('catalog/product/view/id/', array('id' => $productId, 'email' => $email));
            return;
        }
        $this->saveAnonymousAction($data = array(
            'email' => $email,
            'product_id' => $productId
        ));
        $this->_redirect('catalog/product/view/id/', array('id' => $productId, 'email' => $email));
        return;

    }

    /**
     * Save user that is not logged in
     */
    public
    function saveAnonymousAction($data)
    {
        $model = Mage::getModel('productsubscription/subscriber');
        $model->setData($data)
            ->save();
    }

}