<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('CallWebServiceSugarSoap.php'); require_once('modules/Emails/Email.php');

function getallContacts()
{
    global $db;
	if ( ! isset($db) ) { 
		   $db = DBManagerFactory::getInstance(); 
	 }   
	$fetchAdminCheckQuery = "SELECT count(*) as total FROM contacts WHERE deleted = 0";
	$resultAdCheck = $db->query($fetchAdminCheckQuery); 
	while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {  
			$total   = $row2['total'];  
	 }      
 
    $finalArray = array();
	$totalValues = array();
	
     $soapclientObj = new CallWebServiceSugarSoap();
	 $soapclient = $soapclientObj->getsoapclientObj(); 
	 $soapclientObj->loginInsugar(); 
	 $session_id = $soapclientObj->getsessionID();
	 $user_guid = $soapclientObj->getuser_guid();
 
     $result = $soapclient->get_entry_list($session_id, 'Contacts', "", "", '','', 500, 0); 
	 
	 $required_fields = array('id', 'salutation', 'first_name', 'last_name', 'email1','email2');
	 $prePopulatedData = $result->entry_list;
	  
	 foreach($prePopulatedData as $key=>$val) 
	   {
	      $tmpcount = count($val->name_value_list);
			  for($i=0; $i<$tmpcount; $i++)
				 {
					 if(in_array($val->name_value_list[$i]->name, $required_fields))
					 {
						  $totalValues[$val->name_value_list[$i]->name] = $val->name_value_list[$i]->value;
					 }
				 }	 
				 $finalArray[] = $totalValues;  
	   }  
	   
    return $finalArray;		 
}

function sendEmail($emailTo, $record, $nameFL)
{
    $url = "http://sugarcrm-dev.nextlevelinternet.com/webGathering/index.php?record=".$record;
     if($emailTo == "")
	 {
	     return "<span style='color: red; font-size: 12px; text-align: center;'>This contact doesn't have any email associated. So please try the another contact...</span><br>";
	 }
	 else
	 {
	     $emailArrays = explode(',',$emailTo);
		 $total = count($emailArrays);
		 $emailcheck = 0; 
		 $nameFLArrays = explode(',',$nameFL);
		 $finalToArray = array();
		 
		  for($i=0; $i<$total; $i++)
		   {
		        if($emailArrays[$i] != '')
				{
				   $emailcheck = $emailcheck + 1;
				} 
		   }  
		   
		   if($emailcheck > 0)
		   {
		           for($i=0; $i<$total; $i++)
				   {
					   if($emailArrays[$i] != '')
						{
						   $finalToArray[] = $emailArrays[$i];
						}
				   }
					//$totalIDs = count($finalToArray);
					//$finalToArray[$totalIDs] = "shekhar.impinge@gmail.com"; 
					$totalfinalEmailIDs = count($finalToArray);
					
		            $mail = new SugarPHPMailer(); 
					$mail->setMailer($mail);
					for($i=0; $i<$totalfinalEmailIDs; $i++)
					{
					    $mail->AddAddress($finalToArray[$i], $nameFLArrays[0]." ".$nameFLArrays[1]); 
					} 
					$mail->FromName = "Info Next level Internet"; 
					$mail->Sender = "info@nextlevelinternet.com";
					//$mail->SMTPDebug    = true;
					$mail->ContentType = "text/html";
					$mail->Subject = "Update you Contacts and Locations";
					$mail->Body = "You can update your contacts/locations with the below URL: <br> <a href='".$url."'>$url</a>"; 
					$GLOBALS['log']->debug('Email sending ... '); 
					$mail->prepForOutbound(); 
					
					if($mail->Send())
					{
					   // echo ' ... sent successful';
					  // $GLOBALS['log']->debug(' ... sent successful');
					   return "<span style='color: blue; font-size: 12px; text-align: center;'>Mail is successfully sent to Contact Email ID.</span><br>";
					}
					else
					{
					    //echo 'Error emailing:';
					    // $GLOBALS['log']->debug("Error emailing:".$mail->ErrorInfo); 
						 //echo "<pre>"; print_r($mail->ErrorInfo);
						return "<span style='color: blue; font-size: 12px; text-align: center;'>There is an error in sending mail to Contact Email ID. It may be some issue with the email address.</span><br>";  
					} 	  
		   }
		   else
		   {
		           return "<span style='color: red; font-size: 12px; text-align: center;'>This contact doesn't have any email associated. So please try the another contact...</span><br>";
		   } 
	 }
}

?>