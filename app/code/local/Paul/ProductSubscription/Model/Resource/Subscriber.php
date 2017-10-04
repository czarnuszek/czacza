<?php

/**
 * Class Paul_ProductSubscription_Model_Resource_Subscriber
 */
class Paul_ProductSubscription_Model_Resource_Subscriber extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('productsubscription/subscriber', 'subscribe_id');
    }
}