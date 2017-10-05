<?php

class Paul_ProductSubscription_Block_Adminhtml_Customer_Subscription_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('paul_productsubscription_grid');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('productsubscription/subscriber')
            ->getCollection()
            ->addFieldToSelect('*');

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('paul_productsubscription');

        $this->addColumn('product_id', array(
            'header' => $helper->__('Product ID'),
            'index' => 'product_id',
            'filter_index' => 'product_id'
        ));

        $this->addColumn('user_id', array(
            'header' => $helper->__('User ID'),
            'index' => 'user_id',
            'filter_index' => 'user_id'
        ));

        $this->addColumn('email', array(
            'header' => $helper->__('Email'),
            'index' => 'email',
            'filter_index' => 'email'
        ));

        $link = array(
            'base' => '*/*/remove/');

        $this->addColumn('remove', array(
            'getter' => 'getSubscribeId',
            'header' => 'Action',
            'width' => 15,
            'sortable' => false,
            'filter' => false,
            'type' => 'action',
            'actions' => array(
                array(
                    'url' => $link,
                    'caption' => 'Remove',
                    'field' => 'subscribe_id'
                ),
            )
        ));

        $this->addExportType('*/*/exportPaulCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportPaulExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}