<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="stylesheet" id="graphene-stylesheet-css" href="includes/style.css" type="text/css" media="screen">
<script type="text/javascript" src="includes/innerfunctions.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Slingshot Example</title>
<link rel="stylesheet" href="styles/style.css" type="text/css">
</head>
<body style="background-color: #ffffff;"> 

<?php ob_start(); require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php';
if(isset($_REQUEST['recordEditCont']) and $_REQUEST['recordEditCont'] != '')
{
     $recordEditCont = urldecode($_REQUEST['recordEditCont']);
}
else
{
     $recordEditCont = "";
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
if(isset($_REQUEST['data']) and $_REQUEST['data'] != '')
{
     $data = urldecode($_REQUEST['data']);
}
else
{
     $data = "";
}

 $dataArray = explode(";", $data); 
 
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();

   $set_entry_params =  array(
							array('name'=>'id','value'=>$recordEditCont),
							array('name'=>'name','value'=>$dataArray[0]),
							array('name'=>'service_address_street','value'=>$dataArray[1]),
							array('name'=>'service_address_city','value'=>$dataArray[2]), 
							array('name'=>'service_address_state', 'value'=>$dataArray[3]),
							array('name'=>'service_address_postalcode', 'value'=>$dataArray[4]),
							array('name'=>'service_address_country', 'value'=>$dataArray[6]),   
							array('name'=>'is_private_residence', 'value'=> $dataArray[5]), 
							array('name'=>'service_address', 'value'=> $dataArray[7]),
						 ); 
   $result = $soapclient->set_entry($session_id, 'nli_ServiceAddresses', $set_entry_params);
ob_end_clean();
header("Location: ".$siteURL."/".$filename."?record=".$record);   
?> 
 </body>
</html>