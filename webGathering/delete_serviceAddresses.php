<?php ob_start(); require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php';
if(isset($_REQUEST['delid']) and $_REQUEST['delid'] != '')
{
     $delID = urldecode($_REQUEST['delid']);
}
else
{
     $delID = "";
}
if(isset($_REQUEST['record']) and $_REQUEST['record'] != '')
{
     $record = urldecode($_REQUEST['record']);
}
else
{
     $record = "";
}
if(isset($_REQUEST['filename']) and $_REQUEST['filename'] != '')
{
     $filename = urldecode($_REQUEST['filename']);
}
else
{
     $filename = "";
}
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();
 
    $set_entry_params =  array(
						  array('name'=>'id','value'=>$delID),
						  array('name'=>'deleted','value'=>1),  
								 ); 
	$result = $soapclient->set_entry($session_id, 'nli_ServiceAddresses', $set_entry_params); 
ob_end_clean();
header("Location: ".$siteURL."/".$filename."?record=".$record); 
?> 