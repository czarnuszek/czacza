<?php

class Paul_Sub_Model_Resource_Subscriber extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('sub/subscriber', 'subscribe_id');
    }
}