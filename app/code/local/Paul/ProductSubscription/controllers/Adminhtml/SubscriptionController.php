<?php

/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 10/4/17
 * Time: 2:00 PM
 */

/**
 * Class Paul_ProductSubscription_Adminhtml_SubscriptionController
 */
class Paul_ProductSubscription_Adminhtml_SubscriptionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Customers'))->_title($this->__('Observed Products'));
        $this->loadLayout();
        $this->_setActiveMenu('customers/customers');
        $this->_addContent($this->getLayout()->createBlock('productsubscription/adminhtml_customer_subscription'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('productsubscription/adminhtml_customer_subscription_grid')->toHtml()
        );
    }

    public function exportPaulCsvAction()
    {
        $fileName = 'paul_productsubscription.csv';
        $grid = $this->getLayout()->createBlock('productsubscription/adminhtml_customer_subscription_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportPaulExcelAction()
    {
        $fileName = 'paul_productsubscription.xml';
        $grid = $this->getLayout()->createBlock('productsubscription/adminhtml_customer_subscription_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

    /**
     * Remove subscription from Customers admin panel
     */
    public function removeAction()
    {
        $id = $this->getRequest()->getParam('id');

        Mage::getModel('productsubscription/subscriber')->load($id, 'id')->delete();
        $this->_redirectReferer();
    }
}