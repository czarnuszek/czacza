<?php

/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 10/4/17
 * Time: 2:00 PM
 */
class Paul_Sub_Adminhtml_SubscriptionController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Customers'))->_title($this->__('Observed Products'));
        $this->loadLayout();
        $this->_setActiveMenu('customers/customers');
        $this->_addContent($this->getLayout()->createBlock('sub/adminhtml_customer_subscription'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('sub/adminhtml_customer_subscription_grid')->toHtml()
        );
    }

    public function exportInchooCsvAction()
    {
        $fileName = 'paul_sub.csv';
        $grid = $this->getLayout()->createBlock('sub/adminhtml_customer_subscription_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    public function exportInchooExcelAction()
    {
        $fileName = 'paul_sub.xml';
        $grid = $this->getLayout()->createBlock('sub/adminhtml_customer_subscription_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}