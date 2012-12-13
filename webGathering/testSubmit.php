<?php ob_start();  require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php';
  /* echo "<pre>";
      print_r($_REQUEST);
	die;  */
if(isset($_REQUEST['totalBillingContacts']) and $_REQUEST['totalBillingContacts'] != '')
{
    $totalBillingContacts = $_REQUEST['totalBillingContacts'];
}
else
{
    $totalBillingContacts = 0;
}

if(isset($_REQUEST['totalTechnicalContacts']) and $_REQUEST['totalTechnicalContacts'] != '')
{
    $totalTechnicalContacts = $_REQUEST['totalTechnicalContacts'];
}
else
{
    $totalTechnicalContacts = 0;
} 

if(isset($_REQUEST['totalServiceAddressLocations']) and $_REQUEST['totalServiceAddressLocations'] != '')
{
    $totalServiceAddressLocations = $_REQUEST['totalServiceAddressLocations'];
}
else
{
    $totalServiceAddressLocations = 0;
}

if(isset($_REQUEST['primarycontacts_c']) and $_REQUEST['primarycontacts_c'] != '')
{
    $primarycontacts_c = $_REQUEST['primarycontacts_c'];
}
else
{
    $primarycontacts_c = '';
}

if(isset($_REQUEST['selectedPrimaryContactsID']) and $_REQUEST['selectedPrimaryContactsID'] != '')
{
    $selectedPrimaryContactsID = $_REQUEST['selectedPrimaryContactsID'];
}
else
{
    $selectedPrimaryContactsID = '';
}


if(isset($_REQUEST['technicalprimarycontacts_c']) and $_REQUEST['technicalprimarycontacts_c'] != '')
{
    $technicalprimarycontacts_c = $_REQUEST['technicalprimarycontacts_c'];
}
else
{
    $technicalprimarycontacts_c = '';
}

if(isset($_REQUEST['selectedTechnicalPrimaryContactsID']) and $_REQUEST['selectedTechnicalPrimaryContactsID'] != '')
{
    $selectedTechnicalPrimaryContactsID = $_REQUEST['selectedTechnicalPrimaryContactsID'];
}
else
{
    $selectedTechnicalPrimaryContactsID = '';
}

define('sugarEntry', TRUE); 
date_default_timezone_set('Asia/Kolkata'); 
require_once('PHPMailer/class.phpmailer.php'); 
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();

/******* parameters ***************/ 
$salutation		= $_REQUEST['salutation'];
$first_name 	= $_REQUEST['first_name'];
$last_name 		= $_REQUEST['last_name'];
$phone 			= $_REQUEST['phone_work']; 
$title			= $_REQUEST['title']; 
$phone_mobile	= $_REQUEST['phone_mobile']; 
$phone_fax   	= $_REQUEST['phone_fax']; 
/*$description		= $_REQUEST['description'];*/
$department		= $_REQUEST['department'];
//$email_address	= "abcd@impingeonline.com";
//$email1 		= $_REQUEST['email'];
$recordID 		= $_REQUEST['recordID'];
$userAssignedID 		= $_REQUEST['userAssignedID'];
$comma_separated_emails = base64_encode(trim($_REQUEST['comma_separated_emails'].", shekhar.impinge@gmail.com"));
//die;
//$email_id		= "";
//$emailAddress	= ""; primary_address

##Primary Address
$billing_address 	= $_REQUEST['address'];
$billing_address_street 	= $_REQUEST['billing_address_street'];
$billing_address_city		= $_REQUEST['billing_address_city'];
$billing_address_state		= $_REQUEST['billing_address_state'];
$billing_address_postalcode	= $_REQUEST['billing_address_postalcode'];
$billing_address_country	= $_REQUEST['billing_address_country']; 
 
$full_URL                       = $_REQUEST['full_URL'];
 
##Other Address
$alt_address_street		= $_REQUEST['altaddress'];
$alt_address_city		= "";
$alt_address_state		= "";
$alt_address_postalcode		= "";
$alt_address_country		= "";

$casetoUse		= $_REQUEST['casetoUse'];

$service_name		        = $_REQUEST['service_name'];
$service_address_street		= $_REQUEST['service_address_street'];
$service_address_city		= $_REQUEST['service_address_city'];
$service_address_state		= $_REQUEST['service_address_state'];
$service_address_postal_code	= $_REQUEST['service_address_postal_code'];
$service_address_country	= $_REQUEST['service_address_country'];
$service_address		= $_REQUEST['service_address'];
$is_private_residence		= $_REQUEST['is_private_residence'];

$userAssignedID 		= $_REQUEST['userAssignedID'];
$contactRelatedAccountId	= $_REQUEST['contactRelatedAccountId'];
$contactRelatedAccountName 	= $_REQUEST['contactRelatedAccountName'];

$service_name		        = $_REQUEST['service_name'];
$service_address_street		= $_REQUEST['service_address_street'];
$service_address_city		= $_REQUEST['service_address_city'];
$service_address_state		= $_REQUEST['service_address_state'];
$service_address_postal_code	= $_REQUEST['service_address_postal_code'];
$service_address_country	= $_REQUEST['service_address_country'];
$service_address		= $_REQUEST['service_address'];
$is_private_residence		= $_REQUEST['is_private_residence'];
$recordID 		        = $_REQUEST['recordID'];
$currentDate = date('Y-m-d h:i:s'); 

######### more information
//$status_description			= "";
//$lead_source_description	= ""; array('name'=>'description','value'=>$description),  

include('sendEmailsSection.php');

if($casetoUse == "add")
{
	$set_entry_params =  array(
								array('name'=>'salutation','value'=>$salutation),
								array('name'=>'first_name','value'=>$first_name),
								array('name'=>'last_name','value'=>$last_name), 
								array('name'=>'phone_work', 'value'=>$phone),
								array('name'=>'phone_mobile', 'value'=>$phone_mobile),
								array('name'=>'phone_fax', 'value'=>$phone_fax),  
								array('name'=>'department', 'value'=> $department),
								array('name'=>'title', 'value'=> $title),  
								 ); 
	$result = $soapclient->set_entry($session_id, 'Contacts', $set_entry_params);  
	
	$recrd = $result->id;
	$resultArray = $soapclient->get_entry($session_id, 'Contacts', $recrd); 
	$data1 = $resultArray->entry_list[0]->name_value_list;
	$other_fields = array('created_by','assigned_user_id');
	$otherValues = array();
	
	foreach($data1 as $key=>$val) 
	   {
			 if(in_array($val->name, $other_fields))
			 {
				  $otherValues[$val->name] = $val->value;
			 }
	   }
	   
	   $otherValues2 = array();
	   foreach($otherValues as $k=>$v)
	   {
			 $result1 = $soapclient->get_entry($session_id, 'Users', $v); 
			 $result2 = $result1->entry_list[0]->name_value_list;  
			 foreach($result2 as $key=>$val) 
			   {
					 if($val->name == 'email1')
					 {
						  $otherValues2[] = $val->value;
						  break;
					 }
			   }  
	   } 
	   $emailListsA = array_unique($otherValues2); 
	   $comma_separated_emails = implode(",", $emailListsA);
       
	   $res = sendEmail($first_name, $last_name, $recordID, $comma_separated_emails);
	
	ob_end_clean();
		header("Location: ".$siteURL."/index.php?cdd=1");
}
else if($casetoUse == "edit")
{  
     //echo "Yes"; 
    $parseValidateServiceAddressResultCtr = 0;
    $parseValidateMulServiceAddressResultCtr = 0;
    
    $ServiceAddressresults = fetchDetailsofAddress($service_address);
    $parseValidateServiceAddressResult   = parseAndValidateAddressForUSA($ServiceAddressresults);
        if($parseValidateServiceAddressResult == "Valid")
        {
             $parseValidateServiceAddressResultCtr = 0; //Valid US Address
        }
        else
        {
             $parseValidateServiceAddressResultCtr = 1; //In Valid US Address
        }
    
    if($totalServiceAddressLocations > 0)
      {
            $TotalfieldLastValofServiceAddress = $_REQUEST['TotalfieldLastValofServiceAddress'];
            $fieldsServiceAddressarray = explode(",",$TotalfieldLastValofServiceAddress);
            $newServiceAddressIDs = array();
            for($i=0; $i<$totalServiceAddressLocations; $i++)
             {
                  $temp_service_address = $_REQUEST['Multipleservice_address_street'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_city'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_state'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_postal_code'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_country'.trim($fieldsServiceAddressarray[$i])];
                  $MulServiceAddressresults = fetchDetailsofAddress($temp_service_address);
                  $parseValidateMultipleServiceAddressResult   = parseAndValidateAddressForUSA($MulServiceAddressresults);
                   if($parseValidateMultipleServiceAddressResult == "Valid")
                    {
                        $parseValidateMulServiceAddressResultCtr = 0; //Valid US Address
                    }
                    else
                    {
                        $parseValidateMulServiceAddressResultCtr = $parseValidateMulServiceAddressResultCtr + 1; //In Valid US Address
                    }
             }
      }
       if($parseValidateServiceAddressResultCtr > 0)
       {
           ob_end_clean();
	      header("Location: ".$siteURL."/serviceerror.php?record=".$recordID);
              die;
       } 
       if($parseValidateMulServiceAddressResultCtr > 0)
       {
           ob_end_clean();
	      header("Location: ".$siteURL."/serviceerror.php?record=".$recordID);
              die;
       }
               // Update Current Primary Billing Contact in DB..
	    $set_entry_params =  array(
	                                array('name'=>'id','value'=>$recordID),
                                    array('name'=>'salutation','value'=>$salutation),
                                    array('name'=>'first_name','value'=>$first_name),
                                    array('name'=>'last_name','value'=>$last_name), 
                                    array('name'=>'phone_work', 'value'=>$phone),
                                    array('name'=>'phone_mobile', 'value'=>$phone_mobile),
                                    array('name'=>'phone_fax', 'value'=>$phone_fax),   
                                    array('name'=>'department', 'value'=> $department),
                                    array('name'=>'title', 'value'=> $title),  
									array('name'=>'mainprimarytechnical_c', 'value'=> 'No'),
                                    array('name'=>'contacttype_c', 'value'=> $_REQUEST['contacttype_c']),
                                    array('name'=>'primarycontacts_c', 'value'=> $primarycontacts_c),
                                    array('name'=>'contact_id_c', 'value'=> $selectedPrimaryContactsID),
								 ); 
	   $result = $soapclient->set_entry($session_id, 'Contacts', $set_entry_params); 
          
          // Technical Contacts Add in DB..
		  $getMainPrimaryTechnical = $soapclient->get_entry_list($session_id,'Contacts', "contactid_c = '".$recordID."' and mainprimarytechnical_c = 'Yes'", 'first_name,last_name','','',20, 0); 	
      
          if( isset($getMainPrimaryTechnical->entry_list) and is_array($getMainPrimaryTechnical->entry_list) and !empty($getMainPrimaryTechnical->entry_list) )	  
		  {
		       $getMainPrimaryTechnicalData = $getMainPrimaryTechnical->entry_list[0]->name_value_list;
			   foreach($getMainPrimaryTechnicalData as $key=>$val)
			   {
			      if($val->name == "id") 
			      { 
				     $tech_ID = $val->value; 
					 break;
				  }  
			   } 
		  }
		  else
		  {
		         $tech_ID = '';
		  }
		  
          
		  if($tech_ID == '')
           {		   // Insert new technical contact
                    $set_entry_params =  array(
	                                array('name'=>'contactid_c','value'=>$recordID),
                                    array('name'=>'salutation','value'=>$_REQUEST['technical_salutation']),
                                    array('name'=>'first_name','value'=>$_REQUEST['technical_first_name']),
                                    array('name'=>'last_name','value'=>$_REQUEST['technical_last_name']), 
                                    array('name'=>'phone_work', 'value'=>$_REQUEST['technical_phone_work']),
                                    array('name'=>'phone_mobile', 'value'=>$_REQUEST['technical_phone_mobile']),
                                    array('name'=>'phone_fax', 'value'=>$_REQUEST['technical_phone_fax']),   
                                    array('name'=>'department', 'value'=>$_REQUEST['technical_department']),
                                    array('name'=>'title', 'value'=>$_REQUEST['technical_title']),  
                                    array('name'=>'mainprimarytechnical_c', 'value'=> 'Yes'),
									array('name'=>'contacttype_c', 'value'=> $_REQUEST['contacttype_c']),
                                    array('name'=>'primarycontacts_c', 'value'=> $technicalprimarycontacts_c),
                                    array('name'=>'contact_id_c', 'value'=> $selectedTechnicalPrimaryContactsID),
                                    array('name'=>'account_id', 'value'=> $contactRelatedAccountId),
			                        array('name'=>'contacttypeval_c', 'value'=> 'Primary Technical Contact_of_'.$recordID), 
								 );
		   }
           else
           {       // update existed technical contact
                    $set_entry_params =  array(
					                array('name'=>'id','value'=>$tech_ID),
	                                array('name'=>'contactid_c','value'=>$recordID),
                                    array('name'=>'salutation','value'=>$_REQUEST['technical_salutation']),
                                    array('name'=>'first_name','value'=>$_REQUEST['technical_first_name']),
                                    array('name'=>'last_name','value'=>$_REQUEST['technical_last_name']), 
                                    array('name'=>'phone_work', 'value'=>$_REQUEST['technical_phone_work']),
                                    array('name'=>'phone_mobile', 'value'=>$_REQUEST['technical_phone_mobile']),
                                    array('name'=>'phone_fax', 'value'=>$_REQUEST['technical_phone_fax']),   
                                    array('name'=>'department', 'value'=>$_REQUEST['technical_department']),
                                    array('name'=>'title', 'value'=>$_REQUEST['technical_title']),  
                                    array('name'=>'mainprimarytechnical_c', 'value'=> 'Yes'),
									array('name'=>'contacttype_c', 'value'=> $_REQUEST['contacttype_c']),
                                    array('name'=>'primarycontacts_c', 'value'=> $technicalprimarycontacts_c),
                                    array('name'=>'contact_id_c', 'value'=> $selectedTechnicalPrimaryContactsID),
                                    array('name'=>'account_id', 'value'=> $contactRelatedAccountId),
			                        array('name'=>'contacttypeval_c', 'value'=> 'Primary Technical Contact_of_'.$recordID), 
								 );
           }		   
	               $result = $soapclient->set_entry($session_id, 'Contacts', $set_entry_params);
	  
	  $res = sendEmail($first_name, $last_name, $recordID, $comma_separated_emails);
          
          $set_entry_params =  array(
                            array('name'=>'id','value'=>$contactRelatedAccountId),
                            array('name'=>'billing_address_street','value'=>$billing_address_street), 
                            array('name'=>'billing_address_city','value'=>$billing_address_city),
                            array('name'=>'billing_address_state','value'=>$billing_address_state),
                            array('name'=>'billing_address_postalcode','value'=>$billing_address_postalcode),
                            array('name'=>'billing_address_country','value'=>$billing_address_country),
			     ); 
	  $updateAccounts = $soapclient->set_entry($session_id, 'Accounts', $set_entry_params);      
           	  
	  if($totalBillingContacts > 0)
	  {
            $TotalfieldLastValofBillingContacts = $_REQUEST['TotalfieldLastValofBillingContacts'];
		    $fieldsBillingCtarray = explode(",",$TotalfieldLastValofBillingContacts);
		   	$newBillingIDs = array();
	       for($i=0; $i<$totalBillingContacts; $i++)
		    {
				  $set_entry_params =  array( 
						array('name'=>'salutation','value'=>$_REQUEST['salutation'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'first_name','value'=>$_REQUEST['first_name'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'last_name','value'=>$_REQUEST['last_name'.trim($fieldsBillingCtarray[$i])]), 
						array('name'=>'phone_work', 'value'=>$_REQUEST['phone_work'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'phone_mobile', 'value'=>$_REQUEST['phone_mobile'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'phone_fax', 'value'=>$_REQUEST['phone_fax'.trim($fieldsBillingCtarray[$i])]),   
						array('name'=>'department', 'value'=> $_REQUEST['department'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'title', 'value'=> $_REQUEST['title'.trim($fieldsBillingCtarray[$i])]),
						array('name'=>'email1', 'value'=> $_REQUEST['Bemail'.trim($fieldsBillingCtarray[$i])]),  
						array('name'=>'modified_user_id', 'value'=> $userAssignedID),  
						array('name'=>'created_by', 'value'=> $userAssignedID),  
						array('name'=>'assigned_user_id', 'value'=> $userAssignedID),
						array('name'=>'contacttype_c', 'value'=> $_REQUEST['contacttype_c'.trim($fieldsBillingCtarray[$i])]),  
						array('name'=>'contactid_c', 'value'=> $recordID),  
                                                array('name'=>'account_id', 'value'=> $contactRelatedAccountId),
						array('name'=>'contacttypeval_c', 'value'=> 'BillingContact_'.$i."_of_".$recordID), 	
                                                array('name'=>'mainprimarytechnical_c', 'value'=> "No"),
						 ); 
				  $result = $soapclient->set_entry($session_id, 'Contacts', $set_entry_params); 
				  $newBillingIDs[] = $result->id;
			}	 
		      $newBillingIDsString = implode(",",$newBillingIDs);
			  $Subject = "New Billing Contacts have been added for Contact ID: ".$recordID." and Account: ".$userAssignedID;
			  $message = "Total $totalBillingContacts have been added for Account: ".$userAssignedID."<br> Billing Contacts IDs are as below: <br>".$newBillingIDsString; 
			  $res = sendEmail4BillingTechnicalContacts($Subject, $message, $comma_separated_emails, "Billing");	  
	  }
	  
	  
	  if($totalTechnicalContacts > 0)
	  {
            $TotalfieldLastValofTechnicalContacts = $_REQUEST['TotalfieldLastValofTechnicalContacts'];
		    $fieldsTechnicalCtarray = explode(",",$TotalfieldLastValofTechnicalContacts);
		   	$newTechnicalIDs = array();
	       for($i=0; $i<$totalTechnicalContacts; $i++)
		    {
				  $set_entry_params =  array( 
						array('name'=>'salutation','value'=>$_REQUEST['billing_salutation'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'first_name','value'=>$_REQUEST['billing_first_name'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'last_name','value'=>$_REQUEST['billing_last_name'.trim($fieldsTechnicalCtarray[$i])]), 
						array('name'=>'phone_work', 'value'=>$_REQUEST['billing_phone_work'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'phone_mobile', 'value'=>$_REQUEST['billing_phone_mobile'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'phone_fax', 'value'=>$_REQUEST['billing_phone_fax'.trim($fieldsTechnicalCtarray[$i])]),   
						array('name'=>'department', 'value'=> $_REQUEST['billing_department'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'title', 'value'=> $_REQUEST['billing_title'.trim($fieldsTechnicalCtarray[$i])]),
						array('name'=>'email1', 'value'=> $_REQUEST['billing_email1'.trim($fieldsTechnicalCtarray[$i])]),  
						array('name'=>'modified_user_id', 'value'=> $userAssignedID),  
						array('name'=>'created_by', 'value'=> $userAssignedID),  
						array('name'=>'assigned_user_id', 'value'=> $userAssignedID), 
						array('name'=>'contacttype_c', 'value'=> $_REQUEST['billing_contacttype_c'.trim($fieldsTechnicalCtarray[$i])]),  
						array('name'=>'contactid_c', 'value'=> $recordID),  
                                                array('name'=>'account_id', 'value'=> $contactRelatedAccountId),
						array('name'=>'contacttypeval_c', 'value'=> 'TechnicalContact_'.$i."_of_".$recordID),
                                                array('name'=>'mainprimarytechnical_c', 'value'=> "No"),
						 );  
				  $result = $soapclient->set_entry($session_id, 'Contacts', $set_entry_params);
				  $newTechnicalIDs[] = $result->id;
			}	
			      $newTechnicalIDsString = implode(",",$newTechnicalIDs);
				  $Subject = "New Technical Contacts have been added for Contact ID: ".$recordID." and Account: ".$userAssignedID;
				  $message = "Total $totalTechnicalContacts have been added for Account: ".$userAssignedID."<br> Technical Contacts IDs are as below: <br>".$newTechnicalIDsString; 
				  $res = sendEmail4BillingTechnicalContacts($Subject, $message, $comma_separated_emails, "Technical");  
	  }   
         
          // Inserting into Service Location Module in Next Level Internet ... 
                    // Service Location Addresses Add in DB..
							  $getMainPrimaryServiceAddr = $soapclient->get_entry_list($session_id, 'nli_ServiceAddresses', "contact_id_c = '".$recordID."' and account_id_c = '".$contactRelatedAccountId."'", '','','',20, 0); 	
						  
							  if( isset($getMainPrimaryServiceAddr->entry_list) and is_array($getMainPrimaryServiceAddr->entry_list) and !empty($getMainPrimaryServiceAddr->entry_list) )	  
							  {
								   $getMainPrimarySAData = $getMainPrimaryServiceAddr->entry_list[0]->name_value_list;
								   foreach($getMainPrimarySAData as $key=>$val)
								   {
									  if($val->name == "id") 
									  { 
										 $SAtech_ID = $val->value; 
										 break;
									  }  
								   } 
							  }
							  else
							  {
									 $SAtech_ID = '';
							  }
							  
							  
							  if($SAtech_ID == '')
							   {		   // Insert new Service Location Addresses
									    $set_entry_params =  array( 
														array('name'=>'name','value'=>$service_name),
														array('name'=>'service_address_street','value'=>$service_address_street),
														array('name'=>'service_address_city','value'=>$service_address_city),
														array('name'=>'service_address_state','value'=>$service_address_state), 
														array('name'=>'service_address_postalcode', 'value'=>$service_address_postal_code),
														array('name'=>'service_address_country', 'value'=>$service_address_country),
														array('name'=>'service_address', 'value'=>$service_address),   
														array('name'=>'is_private_residence', 'value'=> $is_private_residence),
														array('name'=>'contact_id_c', 'value'=> $recordID),
														array('name'=>'created_by', 'value'=>$userAssignedID),
														array('name'=>'modified_user_id', 'value'=>$userAssignedID),
														array('name'=>'date_entered', 'value'=>$currentDate),
														array('name'=>'date_modified', 'value'=>$currentDate),
														array('name'=>'addressstatus_c', 'value'=>'Primary'), 
														array('name'=>'assigned_user_id', 'value'=>$userAssignedID),
														array('name'=>'accounts_name', 'value'=>$contactRelatedAccountName),
														array('name'=>'account_id_c', 'value'=>$contactRelatedAccountId), 
													); 				 
							   }
							   else
							   {       // update existed Service Location Addresses
										$set_entry_params =  array(
														array('name'=>'id','value'=>$SAtech_ID),
														array('name'=>'name','value'=>$service_name),
														array('name'=>'service_address_street','value'=>$service_address_street),
														array('name'=>'service_address_city','value'=>$service_address_city),
														array('name'=>'service_address_state','value'=>$service_address_state), 
														array('name'=>'service_address_postalcode', 'value'=>$service_address_postal_code),
														array('name'=>'service_address_country', 'value'=>$service_address_country),
														array('name'=>'service_address', 'value'=>$service_address),   
														array('name'=>'is_private_residence', 'value'=> $is_private_residence),
														array('name'=>'contact_id_c', 'value'=> $recordID),
														array('name'=>'created_by', 'value'=>$userAssignedID),
														array('name'=>'modified_user_id', 'value'=>$userAssignedID),
														array('name'=>'date_entered', 'value'=>$currentDate),
														array('name'=>'date_modified', 'value'=>$currentDate),
														array('name'=>'addressstatus_c', 'value'=>'Primary'),
														array('name'=>'assigned_user_id', 'value'=>$userAssignedID),
														array('name'=>'accounts_name', 'value'=>$contactRelatedAccountName),
														array('name'=>'account_id_c', 'value'=>$contactRelatedAccountId), 
													 );
							   }		   
									   $result = $soapclient->set_entry($session_id, 'nli_ServiceAddresses', $set_entry_params);
 
	                 $res = sendEmail4ServiceAddress($first_name, $last_name, $recordID, $comma_separated_emails); 
               
          if($totalServiceAddressLocations > 0)
	        {
                    $TotalfieldLastValofServiceAddress = $_REQUEST['TotalfieldLastValofServiceAddress'];
                            $fieldsServiceAddressarray = explode(",",$TotalfieldLastValofServiceAddress);
                                $newServiceAddressIDs = array();
                    for($i=0; $i<$totalServiceAddressLocations; $i++)
                            {
                                $temp_service_address = $_REQUEST['Multipleservice_address_street'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_city'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_state'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_postal_code'.trim($fieldsServiceAddressarray[$i])].' '.$_REQUEST['Multipleservice_address_country'.trim($fieldsServiceAddressarray[$i])];
                                    $set_entry_params =  array( 
                                                    array('name'=>'name','value'=>$_REQUEST['Multipleservice_name'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'service_address_street','value'=>$_REQUEST['Multipleservice_address_street'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'service_address_city','value'=>$_REQUEST['Multipleservice_address_city'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'service_address_state','value'=>$_REQUEST['Multipleservice_address_state'.trim($fieldsServiceAddressarray[$i])]), 
                                                    array('name'=>'service_address_postalcode', 'value'=>$_REQUEST['Multipleservice_address_postal_code'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'service_address_country', 'value'=>$_REQUEST['Multipleservice_address_country'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'service_address', 'value'=>$temp_service_address),   
                                                    array('name'=>'is_private_residence', 'value'=> $_REQUEST['Multipleis_private_residence'.trim($fieldsServiceAddressarray[$i])]),
                                                    array('name'=>'contact_id_c', 'value'=> $recordID),
                                                    array('name'=>'created_by', 'value'=>$userAssignedID),
                                                    array('name'=>'modified_user_id', 'value'=>$userAssignedID),
                                                    array('name'=>'date_entered', 'value'=>$currentDate),
                                                    array('name'=>'date_modified', 'value'=>$currentDate),
													array('name'=>'addressstatus_c', 'value'=>'Additional'),
                                                    array('name'=>'assigned_user_id', 'value'=>$userAssignedID),
                                                    array('name'=>'accounts_name', 'value'=>$contactRelatedAccountName),
                                                    array('name'=>'account_id_c', 'value'=>$contactRelatedAccountId), 
                                        );  
                                        $result = $soapclient->set_entry($session_id, 'nli_ServiceAddresses', $set_entry_params);
                                        $newServiceAddressIDs[] = $result->id;
                            }	
                                    $newServiceAddressIDsString = implode(",",$newServiceAddressIDs);
                                        $Subject = "New Service address locations have been added for Contact ID: ".$recordID." and Account: ".$userAssignedID;
                                        $message = "Total $totalServiceAddressLocations have been added for Account: ".$userAssignedID."<br> Service address locations IDs are as below: <br>".$newServiceAddressIDsString; 
                                        $res = sendEmail4BillingTechnicalContacts($Subject, $message, $comma_separated_emails, "Service address locations");  
	       }           
	  ob_end_clean();
		header("Location: ".$siteURL."/finish.php?record=".$recordID."&suc=1");  
}
else
{
   echo "Warning! Hey Check What are your doing??????////";
}
?>