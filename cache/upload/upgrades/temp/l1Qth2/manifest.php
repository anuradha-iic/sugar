<?php
/*************************************
Project: Logic Hooks for updating Opportunity MRC, NRC, and Total each time Quote is updated.
Original Dev: Shekhar Verma, August 2012
@2011-2012 Shekhar Verma
shekhar.impinge[at]gmail.com

Desc: Manifest file for installing logic hook
*************************************/

global $sugar_config;

$upload_dir = $sugar_config['upload_dir'];
$manifest = array(
'acceptable_sugar_versions' => array(
'regex_matches' => array(
0 => '6\.*'
),
),
'acceptable_sugar_flavors' => array(
0 => 'CE',
1 => 'PRO',
2 => 'ENT',
), 
'name' => 'Add new Logic Hook for Quotes Module',
'description' => 'Add new Logic Hook for Quotes Module installation package.',
'is_uninstallable' => true,
'author' => 'Shekhar Verma',
'published_date' => 'August 02, 2012',
'version' => '1.0.0',
'type' => 'module',
);
$installdefs = array(
'id' => 'CG_LogicHook',
'mkdir' => array(
array('path' => 'custom/modules/Quotes'),
), 
'copy' => array(
array(
'from' => '<basepath>/file/file.php',
'to'   => 'custom/modules/Quotes/file.php',
),
),
'logic_hooks' => array(
array(
'module' => 'Quotes',
'hook' => 'after_save',
'order' => 96,
'description' => 'Add new Logic Hook for Quotes Module',
'file' => 'custom/modules/Quotes/file.php',
'class' => 'UpdateOpportQuotesClass',
'function' => 'UpdateOpportunitiesQuotesMethod',
),
),
);
?>
