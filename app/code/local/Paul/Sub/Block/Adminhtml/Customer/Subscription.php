<?php

/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 10/4/17
 * Time: 2:07 PM
 */
class Paul_Sub_Block_Adminhtml_Customer_Subscription extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'sub';
        $this->_controller = 'adminhtml_customer_subscription';
        $this->_headerText = Mage::helper('paul_sub')->__('Observed Products');

        parent::__construct();
        $this->_removeButton('add');
    }
}