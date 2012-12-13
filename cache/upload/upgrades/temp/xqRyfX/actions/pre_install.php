<?php


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $db;


$db->query("CREATE TABLE IF NOT EXISTS ".$db_name.".`asol_config` (
	  `id` CHAR(36) NOT NULL, 
	  `name` VARCHAR(255) NOT NULL, 
	  `date_entered` DATETIME NULL DEFAULT NULL, 
	  `date_modified` DATETIME NULL DEFAULT NULL, 
	  `modified_user_id` CHAR(36) NULL DEFAULT NULL, 
	  `created_by` CHAR(36) NULL DEFAULT NULL, 
	  `deleted` TINYINT(1) NULL DEFAULT '0', 
	  `config` VARCHAR(255) NOT NULL DEFAULT '1|15|landscape|1|120|7|localhost/sugarcrm', 
	  PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	  
$db->query("INSERT IGNORE INTO `asol_config` 
(`id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `deleted`, `config`) 
VALUES ('1', 'admin', '2010-01-01 00:00:00', '2010-01-01 00:00:00', '1', '1', 0, '1|15|landscape|1|120|7|');");

$GLOBALS['log']->debug("ASOL ------------------------------------------------------- Tablas creadas");


?>