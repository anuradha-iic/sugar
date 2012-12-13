<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future.  after_save
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(96, 'Add new Logic Hook for AOS_Quotes Module', 'custom/modules/AOS_Quotes/file.php','UpdateOpportQuotesClass', 'UpdateOpportunitiesQuotesMethod'); 

$hook_array['before_save'][] = Array(96, 'Add new Logic Hook for AOS_Quotes Module', 'custom/modules/AOS_Quotes/file.php','UpdateOpportQuotesClass', 'UpdateOpportunitiesQuotesMethodBeforeSave'); 

?>