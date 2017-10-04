<?php

$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE `{$installer->getTable('productsubscription/subscriber')}` (
`subscribe_id` int(11) NOT NULL auto_increment,
`user_id` int(11),
`product_id` int(11) NOT NULL,
`email` text,
`date` datetime default NULL,
`timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
PRIMARY KEY  (`subscribe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup();