<?php

/**
 * Class Paul_ProductSubscription_Model_Resource_Subscriber_Collection
 */
Class Paul_ProductSubscription_Model_Resource_Subscriber_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('productsubscription/subscriber');
    }
}