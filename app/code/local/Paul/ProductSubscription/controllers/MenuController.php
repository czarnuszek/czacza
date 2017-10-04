<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 10/3/17
 * Time: 11:23 PM
 */

/**
 * Class Paul_ProductSubscription_MenuController
 */
class Paul_ProductSubscription_MenuController extends Mage_Core_Controller_Front_Action
{

    /**
     * View of OBSERVE PRODUCTS dashboard
     */
    public function indexAction()
    {
        $customer = Mage::getSingleton('customer/session');
        if (!$customer->isLoggedIn()):
            $this->_redirect('customer/account/login');
            return;
        endif;

        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Subscription removal from OBSERVE PRODUCTS dashboard view
     */
    public function removeAction()
    {
        $id = $this->getRequest()->getParam('id');

        Mage::getModel('productsubscription/subscriber')->load($id, 'subscribe_id')->delete();
        $this->_redirect('productsubscription/menu/index');

    }
}

