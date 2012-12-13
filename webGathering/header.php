<title>Please verify/update Contacts and Locations | NextLevel Internet</title>  
<link rel="stylesheet" id="theme-my-login-css" href="includes/theme-my-login.css" type="text/css" media="all">
<link rel="stylesheet" id="toc-screen-css" href="includes/screen.css" type="text/css" media="all">
<link rel="stylesheet" id="graphene-stylesheet-css" href="includes/style.css" type="text/css" media="screen">
<link rel="stylesheet" id="graphene-light-header-css" href="includes/style-light.css" type="text/css" media="all">
<link rel="stylesheet" id="graphene-print-css" href="includes/print.css" type="text/css" media="print">
<script type="text/javascript" async="" src="includes/quant.js"></script><script src="includes/ga.js" async="" type="text/javascript"></script><script type="text/javascript" src="includes/jquery_003.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var tocplus = {"visibility_show":"show","visibility_hide":"hide","width":"275px"};
/* ]]> */
</script> 
<script type="text/javascript" src="includes/front.js"></script>
<script type="text/javascript" src="includes/jquery.js"></script>  
<link rel="stylesheet" href="styles/style.css" type="text/css">
		<link rel="icon" href="<?php echo $siteURL; ?>/images/favicon.ico" type="image/x-icon">
		<!--[if lte IE 8]>
      <style type="text/css" media="screen">
      	#footer, div.sidebar-wrap, .block-button, .featured_slider, #slider_root, #comments li.bypostauthor, #nav li ul, .pie{behavior: url(<?php echo $siteURL; ?>);}
        .featured_slider{margin-top:0 !important;}
      </style>
    <![endif]-->   
<script type="text/javascript" src="jquery-1.4.1.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
 <?php  
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();
 
		     if( isset($_REQUEST['record']) and $_REQUEST['record'] != '' )
			 {
			       $record = $_REQUEST['record']; 
			 }
			 else
			 { 
			       $record = "";  
                        ?>
				   <script language="Javascript"> 
				       window.location = 'http://nextlevelinternet.com/';
                                   </script>
		<?php    exit;
			 }	 
			 $case = "";
			
			if($record != '')
			{                 
			       $case = "edit";  
				   $result = $soapclient->get_entry($session_id, 'Contacts', $record); 
                   
				   $getMainPrimaryTechnical = $soapclient->get_entry_list($session_id,'Contacts', "contactid_c = '".$record."' and mainprimarytechnical_c = 'Yes'", 'first_name,last_name','','',20, 0); 	
 				   
				   if( isset($getMainPrimaryTechnical->entry_list) and is_array($getMainPrimaryTechnical->entry_list) and !empty($getMainPrimaryTechnical->entry_list) )
				   {
				        $getMainPrimaryTechnicalData = $getMainPrimaryTechnical->entry_list[0]->name_value_list;
				   }
				   else
				   {
				        $getMainPrimaryTechnicalData = '';
				   }
                     				   
				    
				   $prePopulatedData = $result->entry_list[0]->name_value_list;  
				   if(isset($prePopulatedData[0]->name) and $prePopulatedData[0]->name == "warning")
				   { ?>
					   <script language="Javascript"> 
							  window.location = '<?php echo $siteURL; ?>/error/error.php?warning=1';
					   </script>
		           <?php    exit;
				   
				   } 
				  
				   $required_fields = array('salutation', 'first_name', 'last_name', 'phone_work','email1','title','phone_mobile','department','phone_fax','description','primary_address_street','alt_address_street', 'primarycontacts_c', 'contact_id_c');
				   
				   $other_fields = array('created_by','assigned_user_id','account_name','account_id');
				   
				   $billing_address_required_fields = array('billing_address_street', 'billing_address_city', 'billing_address_state', 'billing_address_country','billing_address_postalcode');
				   
				   $totalValues = array();  // Primary Contact ID contact_id_c
				   $otherValues = array();
				   $billingAddressValues = array();
				   $primaryTechnicalValues = array();
				   $ServiceAddressOtherValues = array();
				   
				   foreach($prePopulatedData as $key=>$val) 
				   {
				         if(in_array($val->name, $required_fields))
						 {
					          $totalValues[$val->name] = $val->value;
						 }
				   } 
				 
                  if( $getMainPrimaryTechnicalData == "" )
				  {			
                         $primaryTechnicalValues = array();				  
				  }
				  else
                  {				  
					   foreach($getMainPrimaryTechnicalData as $key=>$val) 
					   {
							 if(in_array($val->name, $required_fields))
							 {
								  $primaryTechnicalValues[$val->name] = $val->value;
							 }
					   } 
				  }
				  
				   foreach($prePopulatedData as $key=>$val) 
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
				   $user_assigned = $otherValues['created_by']; 
                                   $contactRelatedAccountId   = $otherValues['account_id']; 
                                   $contactRelatedAccountName = $otherValues['account_name']; 
                                   
                                   $fetchAcctBillAddress  = $soapclient->get_entry($session_id, 'Accounts', $contactRelatedAccountId); 
				   $fetchAcctBillAddress2 = $fetchAcctBillAddress->entry_list[0]->name_value_list;                                   
				   foreach($fetchAcctBillAddress2 as $key=>$val) 
				   {
				         if(in_array($val->name, $billing_address_required_fields))
						 {
					             $billingAddressValues[$val->name] = $val->value;
						 }
				   }
                                   
                                   $emailListsA = array_unique($otherValues2); 
				   $comma_separated_emails = implode(",", $emailListsA); 
				   $addressVal = implode(" ", $billingAddressValues);  
				   
				   
				   // Start of Service Addresses fetch details....
				   $set_entry_params =  array( 
				                    array('name'=>'contact_id_c','value'=>$record),
                                    array('name'=>'account_id_c','value'=>$contactRelatedAccountId), 
                                    ); 
                   $fetchPrimaryServiceAddress = $soapclient->get_entry_list($session_id,'nli_ServiceAddresses', "contact_id_c = '".$record."' and account_id_c = '".$contactRelatedAccountId."'", '','','',20, 0); 	
				   $name_valSAother_fields = array('name','service_address_street','service_address_city','service_address_state', 'service_address_postalcode', 'service_address_country', 'is_private_residence');
				   
				   if( isset($fetchPrimaryServiceAddress->entry_list) and is_array($fetchPrimaryServiceAddress->entry_list) and !empty($fetchPrimaryServiceAddress->entry_list) )
				   {
					   $name_val_fetchPrimaryServiceAddress = $fetchPrimaryServiceAddress->entry_list[0]->name_value_list;
					   foreach($name_val_fetchPrimaryServiceAddress as $key=>$val) 
					   {
							 if(in_array($val->name, $name_valSAother_fields))
							 {
								  $ServiceAddressOtherValues[$val->name] = $val->value;
							 }
					   } 
				   }
				  else
				   {
				       $ServiceAddressOtherValues = array();
				   }				   
				  // End of Service Addresses fetch details.... 
			} 
			else
			{
			      $case = "add";
			      $totalValues = array();	
				  $primaryTechnicalValues = array();
                              $billingAddressValues = array();
  				  $comma_separated_emails = "";  
				  $addressVal = ""; 
				  $user_assigned = "";
				  $ServiceAddressOtherValues = array();
                                  $contactRelatedAccountId   = ""; 
                                  $contactRelatedAccountName = ""; 
			}  
		 ?>   
<script type="text/javascript" src="includes/myFunctions.js"></script>
 
<script language="javascript" type="text/javascript">
<!-- 
var NumOfRow=1;
var AddRow=0;

var totalBilling   = 0;
var totalTechnical = 0;

var NumOfRow2=1;
var AddRow2=0;

var TotalfieldLastValofBillingContactsJS = "";

var tabIndexCtr = -1;

function Button2_onclick()
{
 tabIndexCtr = tabIndexCtr + 1;
NumOfRow2++;
AddRow2++;
totalTechnical++;
// get the refference of the main Div
var mainDiv=document.getElementById('mainContentAreaofTechContacts'); 
 
// create new div that will work as a container
var tableTag=document.createElement('table'); 
tableTag.setAttribute('id','TechnicalContactsTableID'+MulServiceNumOfRow);  
tableTag.setAttribute('style','float: right;');
tableTag.setAttribute('cellpadding','0');
tableTag.setAttribute('cellspacing','0');
tableTag.setAttribute('border','0');
tableTag.setAttribute('width','100%'); 
// Add Table First Row with colspan = 4
var tr2Tag=document.createElement('tr');
var tr2tdTag=document.createElement('td'); 
tr2tdTag.setAttribute('id','TechnicalinnerDiv'+NumOfRow2);
tr2tdTag.setAttribute('colspan','4');
var h2Tag=document.createElement('h2');
h2Tag.setAttribute('style','border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;');
h2Tag.innerHTML = "Additional "+AddRow2+" Technical Contact &nbsp;&nbsp;&nbsp;";

tableTag.appendChild(tr2Tag);
tr2Tag.appendChild(tr2tdTag);
tr2tdTag.appendChild(h2Tag); 


// Add Table Second Row with 4 columns
var trTag=document.createElement('tr');
var tdTag=document.createElement('td');
tdTag.setAttribute('width','25%');
tdTag.setAttribute('valign','top');
tdTag.setAttribute('scope','row');
tdTag.setAttribute('id','first_name_label');

var tr2FinalTechDivTag=document.createElement('div');   
tr2FinalTechDivTag.setAttribute('style','float: right;');

//create span to contain the text Salutation:
var newSpan = "Salutation:";
tr2FinalTechDivTag.innerHTML = newSpan;


var tdTag2=document.createElement('td');
tdTag2.setAttribute('width','25%');
tdTag2.setAttribute('valign','top');
// create new textbox for email entry
var td2SelectBox=document.createElement('select');
td2SelectBox.setAttribute('tabindex','1000'+tabIndexCtr);
td2SelectBox.setAttribute('id','billing_salutation'+NumOfRow2);
td2SelectBox.setAttribute('name','billing_salutation'+NumOfRow2);
var td2SelectOption1Box=document.createElement('option');
td2SelectOption1Box.setAttribute('value','');
td2SelectOption1Box.setAttribute('label','');
td2SelectOption1Box.innerHTML = "";
var td2SelectOption2Box=document.createElement('option');
td2SelectOption2Box.setAttribute('value','Mr.');
td2SelectOption2Box.setAttribute('label','Mr.');
td2SelectOption2Box.innerHTML = "Mr.";
var td2SelectOption3Box=document.createElement('option');
td2SelectOption3Box.setAttribute('value','Ms.');
td2SelectOption3Box.setAttribute('label','Ms.');
td2SelectOption3Box.innerHTML = "Ms.";
var td2SelectOption4Box=document.createElement('option');
td2SelectOption4Box.setAttribute('value','Mrs.');
td2SelectOption4Box.setAttribute('label','Mrs.');
td2SelectOption4Box.innerHTML = "Mrs.";
var td2SelectOption5Box=document.createElement('option');
td2SelectOption5Box.setAttribute('value','Dr.');
td2SelectOption5Box.setAttribute('label','Dr.');
td2SelectOption5Box.innerHTML = "Dr.";
var td2SelectOption6Box=document.createElement('option');
td2SelectOption6Box.setAttribute('value','Prof.');
td2SelectOption6Box.setAttribute('label','Prof.');
td2SelectOption6Box.innerHTML = "Prof.";
td2SelectBox.appendChild(td2SelectOption1Box);
td2SelectBox.appendChild(td2SelectOption2Box);
td2SelectBox.appendChild(td2SelectOption3Box);
td2SelectBox.appendChild(td2SelectOption4Box);
td2SelectBox.appendChild(td2SelectOption5Box);
td2SelectBox.appendChild(td2SelectOption6Box);

// create remove button for each email adress
var tdTag3=document.createElement('td');
tdTag3.setAttribute('width','25%');
tdTag3.setAttribute('valign','top');  

var tr2td3FinalTechDivTag=document.createElement('div');   
tr2td3FinalTechDivTag.setAttribute('style','float: right;');

var newSpan2 = "Contact Type: &nbsp;";
tr2td3FinalTechDivTag.innerHTML = newSpan2;


var tdTag4=document.createElement('td');
tdTag4.setAttribute('width','25%');
tdTag4.setAttribute('valign','top');  
var td4SelectBox=document.createElement('select');
td4SelectBox.setAttribute('tabindex','1000'+tabIndexCtr);
td4SelectBox.setAttribute('title','');
td4SelectBox.setAttribute('id','billing_contacttype_c'+NumOfRow2);
td4SelectBox.setAttribute('name','billing_contacttype_c'+NumOfRow2);
td4SelectBox.setAttribute('onchange','check4DynamicTechnical(this);');
var td4SelectOption1Box=document.createElement('option');
td4SelectOption1Box.setAttribute('value','PrimaryBilling');
td4SelectOption1Box.setAttribute('label','PrimaryBilling'); 
td4SelectOption1Box.innerHTML = "PrimaryBilling";
var td4SelectOption2Box=document.createElement('option');
td4SelectOption2Box.setAttribute('value','AdditionalBilling');
td4SelectOption2Box.setAttribute('label','Additional Billing');  
td4SelectOption2Box.innerHTML = "Additional Billing"; 
var td4SelectOption3Box=document.createElement('option');
td4SelectOption3Box.setAttribute('value','PrimaryTechnical');
td4SelectOption3Box.setAttribute('label','Primary Technical');   
td4SelectOption3Box.innerHTML = "Primary Technical";
var td4SelectOption4Box=document.createElement('option');
td4SelectOption4Box.setAttribute('value','AdditionalTechnical');
td4SelectOption4Box.setAttribute('label','Additional Technical');  
td4SelectOption4Box.setAttribute('selected','selected');
td4SelectOption4Box.innerHTML = "Additional Technical";
td4SelectBox.appendChild(td4SelectOption1Box);
td4SelectBox.appendChild(td4SelectOption2Box);
td4SelectBox.appendChild(td4SelectOption3Box);
td4SelectBox.appendChild(td4SelectOption4Box);

tableTag.appendChild(trTag); 
tdTag.appendChild(tr2FinalTechDivTag);
trTag.appendChild(tdTag);
trTag.appendChild(tdTag2); 
tdTag3.appendChild(tr2td3FinalTechDivTag);
trTag.appendChild(tdTag3);
trTag.appendChild(tdTag4); 
tdTag2.appendChild(td2SelectBox); 
tdTag4.appendChild(td4SelectBox);


// Add Table Third Row with 2 columns with colspan = 2
var tr3Tag=document.createElement('tr');
var tr3td1Tag=document.createElement('td'); 
tr3td1Tag.setAttribute('id','first_name_label'+NumOfRow2);
tr3td1Tag.setAttribute('width','53%');
tr3td1Tag.setAttribute('valign','top');
tr3td1Tag.setAttribute('scope','row');

var tr3td1FinalTechDivTag=document.createElement('div');   
tr3td1FinalTechDivTag.setAttribute('style','float: right;');

tr3td1FinalTechDivTag.innerHTML = "First Name:";

var tr3td2Tag=document.createElement('td');
tr3td2Tag.setAttribute('width','47%');
tr3td2Tag.setAttribute('valign','top');
tr3td2Tag.setAttribute('colspan','3'); 
 
var tr3td2inputTag=document.createElement('input');
tr3td2inputTag.type='text';
tr3td2inputTag.setAttribute('value', '');
tr3td2inputTag.setAttribute('maxlength', '25');
tr3td2inputTag.setAttribute('size', '25');
tr3td2inputTag.setAttribute('id', 'billing_first_name'+NumOfRow2);
tr3td2inputTag.setAttribute('name', 'billing_first_name'+NumOfRow2);
tr3td2inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);

tableTag.appendChild(tr3Tag);  
tr3td1Tag.appendChild(tr3td1FinalTechDivTag);
tr3Tag.appendChild(tr3td1Tag);
tr3Tag.appendChild(tr3td2Tag);
tr3td2Tag.appendChild(tr3td2inputTag); 



// Add Table Fourth Row with 4 columns
var tr4Tag=document.createElement('tr');
var tr4td1Tag=document.createElement('td');
tr4td1Tag.setAttribute('width','25%');
tr4td1Tag.setAttribute('valign','top');
tr4td1Tag.setAttribute('scope','row');
tr4td1Tag.setAttribute('id','last_name_label');

var tr4td1FinalTechDivTag=document.createElement('div');   
tr4td1FinalTechDivTag.setAttribute('style','float: right;');

//create span to contain the text Salutation:
var newSpan = "Last Name: ";
tr4td1FinalTechDivTag.innerHTML = newSpan;


var tr4td2Tag=document.createElement('td');
tr4td2Tag.setAttribute('width','25%');
tr4td2Tag.setAttribute('valign','top');
var tr4td2inputTag=document.createElement('input');
tr4td2inputTag.type='text';
tr4td2inputTag.setAttribute('value', '');
tr4td2inputTag.setAttribute('title', '');
tr4td2inputTag.setAttribute('maxlength', '100');
tr4td2inputTag.setAttribute('size', '30');
tr4td2inputTag.setAttribute('id', 'billing_last_name'+NumOfRow2);
tr4td2inputTag.setAttribute('name', 'billing_last_name'+NumOfRow2);
tr4td2inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);

// create remove button for each email adress
var tr4td3Tag=document.createElement('td');
tr4td3Tag.setAttribute('width','25%');
tr4td3Tag.setAttribute('valign','top'); 
tr4td3Tag.setAttribute('scope','row');
tr4td3Tag.setAttribute('id','phone_work_label');  

var tr4td3FinalTechDivTag=document.createElement('div');   
tr4td3FinalTechDivTag.setAttribute('style','float: right;');

tr4td3FinalTechDivTag.innerHTML = "Office Phone: ";


var tr4td4Tag=document.createElement('td');
tr4td4Tag.setAttribute('width','25%');
tr4td4Tag.setAttribute('valign','top');  
var tr4td4inputTag=document.createElement('input');
tr4td4inputTag.type='text';
tr4td4inputTag.setAttribute('value', '<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('phone_work', $totalValues)) { echo $totalValues['phone_work']; } } ?>');
tr4td4inputTag.setAttribute('class', 'phone');
tr4td4inputTag.setAttribute('title', '');
tr4td4inputTag.setAttribute('maxlength', '100');
tr4td4inputTag.setAttribute('size', '30');
tr4td4inputTag.setAttribute('id', 'billing_phone_work'+NumOfRow2);
tr4td4inputTag.setAttribute('name', 'billing_phone_work'+NumOfRow2);
tr4td4inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);
 

tableTag.appendChild(tr4Tag); 
tr4td1Tag.appendChild(tr4td1FinalTechDivTag);
tr4Tag.appendChild(tr4td1Tag);
tr4Tag.appendChild(tr4td2Tag); 
tr4td3Tag.appendChild(tr4td3FinalTechDivTag);
tr4Tag.appendChild(tr4td3Tag);
tr4Tag.appendChild(tr4td4Tag); 
tr4td2Tag.appendChild(tr4td2inputTag); 
tr4td4Tag.appendChild(tr4td4inputTag);


// Add Table Fifth Row with 2 columns with colspan = 2
var tr5Tag=document.createElement('tr');
var tr5td1Tag=document.createElement('td'); 
tr5td1Tag.setAttribute('id','description_label'+NumOfRow2);
tr5td1Tag.setAttribute('width','53%');
tr5td1Tag.setAttribute('valign','top');
tr5td1Tag.setAttribute('scope','row');

var tr5td1FinalTechDivTag=document.createElement('div');   
tr5td1FinalTechDivTag.setAttribute('style','float: right;');

tr5td1FinalTechDivTag.innerHTML = "Email: ";

var tr5td2Tag=document.createElement('td');
tr5td2Tag.setAttribute('width','47%');
tr5td2Tag.setAttribute('valign','top');
tr5td2Tag.setAttribute('colspan','3'); 
 
var tr5td2inputTag=document.createElement('input');
tr5td2inputTag.type='text';
tr5td2inputTag.setAttribute('value', '');
tr5td2inputTag.setAttribute('class', 'email');
tr5td2inputTag.setAttribute('title', '');
tr5td2inputTag.setAttribute('maxlength', '100');
tr5td2inputTag.setAttribute('size', '30');
tr5td2inputTag.setAttribute('id', 'billing_email1'+NumOfRow2);
tr5td2inputTag.setAttribute('name', 'billing_email1'+NumOfRow2);
tr5td2inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);

tableTag.appendChild(tr5Tag); 
tr5td1Tag.appendChild(tr5td1FinalTechDivTag);
tr5Tag.appendChild(tr5td1Tag);
tr5Tag.appendChild(tr5td2Tag);
tr5td2Tag.appendChild(tr5td2inputTag); 



// Add Table Sixth Row with 4 columns
var tr6Tag=document.createElement('tr');
var tr6td1Tag=document.createElement('td');
tr6td1Tag.setAttribute('width','25%');
tr6td1Tag.setAttribute('valign','top');
tr6td1Tag.setAttribute('scope','row');
tr6td1Tag.setAttribute('id','title_label');

var tr6td1FinalTechDivTag=document.createElement('div');   
tr6td1FinalTechDivTag.setAttribute('style','float: right;');

//create span to contain the text Salutation:
var newSpan = "Title:";
tr6td1FinalTechDivTag.innerHTML = newSpan;


var tr6td2Tag=document.createElement('td');
tr6td2Tag.setAttribute('width','25%');
tr6td2Tag.setAttribute('valign','top');
var tr6td2inputTag=document.createElement('input');
tr6td2inputTag.type='text';
tr6td2inputTag.setAttribute('value', '');
tr6td2inputTag.setAttribute('title', '');
tr6td2inputTag.setAttribute('maxlength', '100');
tr6td2inputTag.setAttribute('size', '30');
tr6td2inputTag.setAttribute('id', 'billing_title'+NumOfRow2);
tr6td2inputTag.setAttribute('name', 'billing_title'+NumOfRow2);
tr6td2inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);

// create remove button for each email adress
var tr6td3Tag=document.createElement('td');
tr6td3Tag.setAttribute('width','25%');
tr6td3Tag.setAttribute('valign','top'); 
tr6td3Tag.setAttribute('scope','row');
tr6td3Tag.setAttribute('id','phone_mobile_label');  

var tr6td3FinalTechDivTag=document.createElement('div');   
tr6td3FinalTechDivTag.setAttribute('style','float: right;');

tr6td3FinalTechDivTag.innerHTML = "Mobile: ";


var tr6td4Tag=document.createElement('td');
tr6td4Tag.setAttribute('width','25%');
tr6td4Tag.setAttribute('valign','top');  
var tr6td4inputTag=document.createElement('input');
tr6td4inputTag.type='text';
tr6td4inputTag.setAttribute('value', '');
tr6td4inputTag.setAttribute('class', 'phone');
tr6td4inputTag.setAttribute('title', '');
tr6td4inputTag.setAttribute('maxlength', '100');
tr6td4inputTag.setAttribute('size', '30');
tr6td4inputTag.setAttribute('id', 'billing_phone_mobile'+NumOfRow2);
tr6td4inputTag.setAttribute('name', 'billing_phone_mobile'+NumOfRow2);
tr6td4inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);
 

tableTag.appendChild(tr6Tag); 
tr6td1Tag.appendChild(tr6td1FinalTechDivTag);
tr6Tag.appendChild(tr6td1Tag);
tr6Tag.appendChild(tr6td2Tag); 
tr6td3Tag.appendChild(tr6td3FinalTechDivTag);
tr6Tag.appendChild(tr6td3Tag);
tr6Tag.appendChild(tr6td4Tag); 
tr6td2Tag.appendChild(tr6td2inputTag); 
tr6td4Tag.appendChild(tr6td4inputTag);



// Add Table Seventh Row with 4 columns
var tr7Tag=document.createElement('tr');
var tr7td1Tag=document.createElement('td');
tr7td1Tag.setAttribute('width','25%');
tr7td1Tag.setAttribute('valign','top');
tr7td1Tag.setAttribute('scope','row');
tr7td1Tag.setAttribute('id','department_label'); 

var tr7td1FinalTechDivTag=document.createElement('div');   
tr7td1FinalTechDivTag.setAttribute('style','float: right;');

var newSpan = "Department:";
tr7td1FinalTechDivTag.innerHTML = newSpan;


var tr7td2Tag=document.createElement('td');
tr7td2Tag.setAttribute('width','25%');
tr7td2Tag.setAttribute('valign','top');
var tr7td2inputTag=document.createElement('input');
tr7td2inputTag.type='text';
tr7td2inputTag.setAttribute('value', '');
tr7td2inputTag.setAttribute('title', '');
tr7td2inputTag.setAttribute('maxlength', '255');
tr7td2inputTag.setAttribute('size', '30');
tr7td2inputTag.setAttribute('id', 'billing_department'+NumOfRow2);
tr7td2inputTag.setAttribute('name', 'billing_department'+NumOfRow2);
tr7td2inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);

 
var tr7td3Tag=document.createElement('td');
tr7td3Tag.setAttribute('width','25%');
tr7td3Tag.setAttribute('valign','top'); 
tr7td3Tag.setAttribute('scope','row');
tr7td3Tag.setAttribute('id','phone_fax_label'); 

var tr7td3FinalTechDivTag=document.createElement('div');   
tr7td3FinalTechDivTag.setAttribute('style','float: right;');

tr7td3FinalTechDivTag.innerHTML = "Fax: ";


var tr7td4Tag=document.createElement('td');
tr7td4Tag.setAttribute('width','25%');
tr7td4Tag.setAttribute('valign','top');  
var tr7td4inputTag=document.createElement('input');
tr7td4inputTag.type='text';
tr7td4inputTag.setAttribute('value', '');
tr7td4inputTag.setAttribute('class', 'phone');
tr7td4inputTag.setAttribute('title', '');
tr7td4inputTag.setAttribute('maxlength', '100');
tr7td4inputTag.setAttribute('size', '30');
tr7td4inputTag.setAttribute('id', 'billing_phone_fax'+NumOfRow2);
tr7td4inputTag.setAttribute('name', 'billing_phone_fax'+NumOfRow2);
tr7td4inputTag.setAttribute('tabindex', '1000'+tabIndexCtr);
 

tableTag.appendChild(tr7Tag); 
tr7td1Tag.appendChild(tr7td1FinalTechDivTag);
tr7Tag.appendChild(tr7td1Tag);
tr7Tag.appendChild(tr7td2Tag); 
tr7td3Tag.appendChild(tr7td3FinalTechDivTag);
tr7Tag.appendChild(tr7td3Tag);
tr7Tag.appendChild(tr7td4Tag); 
tr7td2Tag.appendChild(tr7td2inputTag); 
tr7td4Tag.appendChild(tr7td4inputTag);


// Final Eight Row for Remove Button
var tr8Tag=document.createElement('tr');
var tr8tdTag=document.createElement('td'); 
tr8tdTag.setAttribute('id','TechnicalinnerDiv2'+NumOfRow2);
tr8tdTag.setAttribute('colspan','4');

var tr8FinalTechDivTag=document.createElement('div'); 
tr8FinalTechDivTag.setAttribute('id','TechContactDivsID'+MulServiceNumOfRow);  
tr8FinalTechDivTag.setAttribute('style','float: right;');

var newButton = document.createElement('input');
newButton.type='button';
newButton.value='Remove Technical Contact';
newButton.id='technicalbtn'+NumOfRow2;

newButton.onclick=function RemoveEntry() 
{   
   totalTechnical = totalTechnical - 1;
   var mainDiv=document.getElementById('mainContentAreaofTechContacts');
   mainDiv.removeChild(tableTag); 
} 
tr8FinalTechDivTag.appendChild(newButton);
tr8tdTag.appendChild(tr8FinalTechDivTag); 
tr8Tag.appendChild(tr8tdTag);  
tableTag.appendChild(tr8Tag);
// finally append the new div to the main div
mainDiv.appendChild(tableTag);  
}

function Button1_onclick()
{
  tabIndexCtr = tabIndexCtr + 1;
NumOfRow++;
AddRow++;
totalBilling++;
// get the refference of the main Div
var mainDiv=document.getElementById('mainContentArea2'); 
 
// create new div that will work as a container
var tableTag=document.createElement('table'); 
tableTag.setAttribute('id','BillingContactsTableID'+MulServiceNumOfRow);  
tableTag.setAttribute('style','float: right;');
tableTag.setAttribute('cellpadding','0');
tableTag.setAttribute('cellspacing','0');
tableTag.setAttribute('border','0');
tableTag.setAttribute('width','100%');
// Add Table First Row with colspan = 4
var tr2Tag=document.createElement('tr');
var tr2tdTag=document.createElement('td'); 
tr2tdTag.setAttribute('id','innerDiv'+NumOfRow);
tr2tdTag.setAttribute('colspan','4');
var h2Tag=document.createElement('h2');
h2Tag.setAttribute('style','border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;'); 
h2Tag.innerHTML = "Additional "+AddRow+" Billing Contact &nbsp;&nbsp;&nbsp;";

tableTag.appendChild(tr2Tag);
tr2Tag.appendChild(tr2tdTag);
tr2tdTag.appendChild(h2Tag);  

// Add Table Second Row with 4 columns
var trTag=document.createElement('tr');
var tdTag=document.createElement('td');
tdTag.setAttribute('width','25%');
tdTag.setAttribute('valign','top');
tdTag.setAttribute('scope','row');
tdTag.setAttribute('id','salutation_label');

var tr1td1FinalDivTag=document.createElement('div');  
tr1td1FinalDivTag.setAttribute('style','float: right;');

//create span to contain the text Salutation:
var newSpan = "Salutation:";
tr1td1FinalDivTag.innerHTML = newSpan;


var tdTag2=document.createElement('td');
tdTag2.setAttribute('width','25%');
tdTag2.setAttribute('valign','top');
// create new textbox for email entry
var td2SelectBox=document.createElement('select');
td2SelectBox.setAttribute('tabindex','2000'+tabIndexCtr);
td2SelectBox.setAttribute('id','salutation'+NumOfRow);
td2SelectBox.setAttribute('name','salutation'+NumOfRow);
var td2SelectOption1Box=document.createElement('option');
td2SelectOption1Box.setAttribute('value','');
td2SelectOption1Box.setAttribute('label','');
td2SelectOption1Box.innerHTML = "";
var td2SelectOption2Box=document.createElement('option');
td2SelectOption2Box.setAttribute('value','Mr.');
td2SelectOption2Box.setAttribute('label','Mr.');
td2SelectOption2Box.innerHTML = "Mr.";
var td2SelectOption3Box=document.createElement('option');
td2SelectOption3Box.setAttribute('value','Ms.');
td2SelectOption3Box.setAttribute('label','Ms.');
td2SelectOption3Box.innerHTML = "Ms.";
var td2SelectOption4Box=document.createElement('option');
td2SelectOption4Box.setAttribute('value','Mrs.');
td2SelectOption4Box.setAttribute('label','Mrs.');
td2SelectOption4Box.innerHTML = "Mrs.";
var td2SelectOption5Box=document.createElement('option');
td2SelectOption5Box.setAttribute('value','Dr.');
td2SelectOption5Box.setAttribute('label','Dr.');
td2SelectOption5Box.innerHTML = "Dr.";
var td2SelectOption6Box=document.createElement('option');
td2SelectOption6Box.setAttribute('value','Prof.');
td2SelectOption6Box.setAttribute('label','Prof.');
td2SelectOption6Box.innerHTML = "Prof.";
td2SelectBox.appendChild(td2SelectOption1Box);
td2SelectBox.appendChild(td2SelectOption2Box);
td2SelectBox.appendChild(td2SelectOption3Box);
td2SelectBox.appendChild(td2SelectOption4Box);
td2SelectBox.appendChild(td2SelectOption5Box);
td2SelectBox.appendChild(td2SelectOption6Box);

// create remove button for each email adress
var tdTag3=document.createElement('td');
tdTag3.setAttribute('width','25%');
tdTag3.setAttribute('valign','top');  

var tr1td2FinalDivTag=document.createElement('div');  
tr1td2FinalDivTag.setAttribute('style','float: right;');

var newSpan2 = "Contact Type: &nbsp;";
tr1td2FinalDivTag.innerHTML = newSpan2;


var tdTag4=document.createElement('td');
tdTag4.setAttribute('width','25%');
tdTag4.setAttribute('valign','top');  
var td4SelectBox=document.createElement('select'); 
td4SelectBox.setAttribute('tabindex','2000'+tabIndexCtr);
td4SelectBox.setAttribute('title','');
td4SelectBox.setAttribute('id','contacttype_c'+NumOfRow);
td4SelectBox.setAttribute('name','contacttype_c'+NumOfRow);
td4SelectBox.setAttribute('onchange','check4DynamicPrimary(this);');
var td4SelectOption1Box=document.createElement('option');
td4SelectOption1Box.setAttribute('value','PrimaryBilling');
td4SelectOption1Box.setAttribute('label','PrimaryBilling'); 
td4SelectOption1Box.innerHTML = "PrimaryBilling";
var td4SelectOption2Box=document.createElement('option');
td4SelectOption2Box.setAttribute('value','AdditionalBilling');
td4SelectOption2Box.setAttribute('label','Additional Billing');
td4SelectOption2Box.setAttribute('selected','selected');   
td4SelectOption2Box.innerHTML = "Additional Billing"; 
var td4SelectOption3Box=document.createElement('option');
td4SelectOption3Box.setAttribute('value','PrimaryTechnical');
td4SelectOption3Box.setAttribute('label','Primary Technical');  
td4SelectOption3Box.innerHTML = "Primary Technical";
var td4SelectOption4Box=document.createElement('option');
td4SelectOption4Box.setAttribute('value','AdditionalTechnical');
td4SelectOption4Box.setAttribute('label','Additional Technical');  
td4SelectOption4Box.innerHTML = "Additional Technical";
td4SelectBox.appendChild(td4SelectOption1Box);
td4SelectBox.appendChild(td4SelectOption2Box);
td4SelectBox.appendChild(td4SelectOption3Box);
td4SelectBox.appendChild(td4SelectOption4Box);

tableTag.appendChild(trTag); 
tdTag.appendChild(tr1td1FinalDivTag);
trTag.appendChild(tdTag);
trTag.appendChild(tdTag2); 
tdTag3.appendChild(tr1td2FinalDivTag);
trTag.appendChild(tdTag3);
trTag.appendChild(tdTag4); 
tdTag2.appendChild(td2SelectBox); 
tdTag4.appendChild(td4SelectBox);


// Add Table Third Row with 2 columns with colspan = 2
var tr3Tag=document.createElement('tr');
var tr3td1Tag=document.createElement('td'); 
tr3td1Tag.setAttribute('id','first_name_label'+NumOfRow);
tr3td1Tag.setAttribute('width','53%');
tr3td1Tag.setAttribute('valign','top');
tr3td1Tag.setAttribute('scope','row');

var tr3td1FinalDivTag=document.createElement('div');  
tr3td1FinalDivTag.setAttribute('style','float: right;');

tr3td1FinalDivTag.innerHTML = "First Name: ";

var tr3td2Tag=document.createElement('td');
tr3td2Tag.setAttribute('width','47%');
tr3td2Tag.setAttribute('valign','top');
tr3td2Tag.setAttribute('colspan','3'); 
 
var tr3td2inputTag=document.createElement('input');
tr3td2inputTag.type='text';
tr3td2inputTag.setAttribute('value', '');
tr3td2inputTag.setAttribute('maxlength', '25');
tr3td2inputTag.setAttribute('size', '25');
tr3td2inputTag.setAttribute('id', 'first_name'+NumOfRow);
tr3td2inputTag.setAttribute('name', 'first_name'+NumOfRow);
tr3td2inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);

tableTag.appendChild(tr3Tag); 
tr3td1Tag.appendChild(tr3td1FinalDivTag);
tr3Tag.appendChild(tr3td1Tag);
tr3Tag.appendChild(tr3td2Tag);
tr3td2Tag.appendChild(tr3td2inputTag); 



// Add Table Fourth Row with 4 columns
var tr4Tag=document.createElement('tr');
var tr4td1Tag=document.createElement('td');
tr4td1Tag.setAttribute('width','25%');
tr4td1Tag.setAttribute('valign','top');
tr4td1Tag.setAttribute('scope','row');
tr4td1Tag.setAttribute('id','last_name_label');

var tr4td1FinalDivTag=document.createElement('div');  
tr4td1FinalDivTag.setAttribute('style','float: right;');
//create span to contain the text Salutation:
var newSpan = "Last Name: ";
tr4td1FinalDivTag.innerHTML = newSpan;


var tr4td2Tag=document.createElement('td');
tr4td2Tag.setAttribute('width','25%');
tr4td2Tag.setAttribute('valign','top');
var tr4td2inputTag=document.createElement('input');
tr4td2inputTag.type='text';
tr4td2inputTag.setAttribute('value', '');
tr4td2inputTag.setAttribute('title', '');
tr4td2inputTag.setAttribute('maxlength', '100');
tr4td2inputTag.setAttribute('size', '30');
tr4td2inputTag.setAttribute('id', 'last_name'+NumOfRow);
tr4td2inputTag.setAttribute('name', 'last_name'+NumOfRow);
tr4td2inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);

// create remove button for each email adress
var tr4td3Tag=document.createElement('td');
tr4td3Tag.setAttribute('width','25%');
tr4td3Tag.setAttribute('valign','top'); 
tr4td3Tag.setAttribute('scope','row');
tr4td3Tag.setAttribute('id','phone_work_label');  

var tr4td3FinalDivTag=document.createElement('div');  
tr4td3FinalDivTag.setAttribute('style','float: right;');

tr4td3FinalDivTag.innerHTML = "Office Phone: ";


var tr4td4Tag=document.createElement('td');
tr4td4Tag.setAttribute('width','25%');
tr4td4Tag.setAttribute('valign','top');  
var tr4td4inputTag=document.createElement('input');
tr4td4inputTag.type='text';
tr4td4inputTag.setAttribute('value', '<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('phone_work', $totalValues)) { echo $totalValues['phone_work']; } } ?>');
tr4td4inputTag.setAttribute('class', 'phone');
tr4td4inputTag.setAttribute('title', '');
tr4td4inputTag.setAttribute('maxlength', '100');
tr4td4inputTag.setAttribute('size', '30');
tr4td4inputTag.setAttribute('id', 'phone_work'+NumOfRow);
tr4td4inputTag.setAttribute('name', 'phone_work'+NumOfRow);
tr4td4inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);
 

tableTag.appendChild(tr4Tag);
tr4td1Tag.appendChild(tr4td1FinalDivTag);
tr4Tag.appendChild(tr4td1Tag);
tr4Tag.appendChild(tr4td2Tag); 
tr4td3Tag.appendChild(tr4td3FinalDivTag);
tr4Tag.appendChild(tr4td3Tag);
tr4Tag.appendChild(tr4td4Tag); 
tr4td2Tag.appendChild(tr4td2inputTag); 
tr4td4Tag.appendChild(tr4td4inputTag);


// Add Table Fifth Row with 2 columns with colspan = 2
var tr5Tag=document.createElement('tr');
var tr5td1Tag=document.createElement('td'); 
tr5td1Tag.setAttribute('id','description_label'+NumOfRow);
tr5td1Tag.setAttribute('width','53%');
tr5td1Tag.setAttribute('valign','top');
tr5td1Tag.setAttribute('scope','row');

var tr5td1FinalDivTag=document.createElement('div');  
tr5td1FinalDivTag.setAttribute('style','float: right;');

tr5td1FinalDivTag.innerHTML = "Email: ";

var tr5td2Tag=document.createElement('td');
tr5td2Tag.setAttribute('width','47%');
tr5td2Tag.setAttribute('valign','top');
tr5td2Tag.setAttribute('colspan','3'); 
 
var tr5td2inputTag=document.createElement('input');
tr5td2inputTag.type='text';
tr5td2inputTag.setAttribute('value', '');
tr5td2inputTag.setAttribute('class', 'email');
tr5td2inputTag.setAttribute('title', '');
tr5td2inputTag.setAttribute('maxlength', '100');
tr5td2inputTag.setAttribute('size', '30');
tr5td2inputTag.setAttribute('id', 'Bemail'+NumOfRow);
tr5td2inputTag.setAttribute('name', 'Bemail'+NumOfRow);
tr5td2inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);

tableTag.appendChild(tr5Tag); 
tr5td1Tag.appendChild(tr5td1FinalDivTag);
tr5Tag.appendChild(tr5td1Tag);
tr5Tag.appendChild(tr5td2Tag);
tr5td2Tag.appendChild(tr5td2inputTag); 



// Add Table Sixth Row with 4 columns
var tr6Tag=document.createElement('tr');
var tr6td1Tag=document.createElement('td');
tr6td1Tag.setAttribute('width','25%');
tr6td1Tag.setAttribute('valign','top');
tr6td1Tag.setAttribute('scope','row');
tr6td1Tag.setAttribute('id','title_label');

var tr6td1FinalDivTag=document.createElement('div');  
tr6td1FinalDivTag.setAttribute('style','float: right;');

//create span to contain the text Salutation:
var newSpan = "Title:";
tr6td1FinalDivTag.innerHTML = newSpan;


var tr6td2Tag=document.createElement('td');
tr6td2Tag.setAttribute('width','25%');
tr6td2Tag.setAttribute('valign','top');
var tr6td2inputTag=document.createElement('input');
tr6td2inputTag.type='text';
tr6td2inputTag.setAttribute('value', '');
tr6td2inputTag.setAttribute('title', '');
tr6td2inputTag.setAttribute('maxlength', '100');
tr6td2inputTag.setAttribute('size', '30');
tr6td2inputTag.setAttribute('id', 'title'+NumOfRow);
tr6td2inputTag.setAttribute('name', 'title'+NumOfRow);
tr6td2inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);

// create remove button for each email adress
var tr6td3Tag=document.createElement('td');
tr6td3Tag.setAttribute('width','25%');
tr6td3Tag.setAttribute('valign','top'); 
tr6td3Tag.setAttribute('scope','row');
tr6td3Tag.setAttribute('id','phone_mobile_label'); 

var tr6td3FinalDivTag=document.createElement('div');  
tr6td3FinalDivTag.setAttribute('style','float: right;');

tr6td3FinalDivTag.innerHTML = "Mobile: ";


var tr6td4Tag=document.createElement('td');
tr6td4Tag.setAttribute('width','25%');
tr6td4Tag.setAttribute('valign','top');  
var tr6td4inputTag=document.createElement('input');
tr6td4inputTag.type='text';
tr6td4inputTag.setAttribute('value', '');
tr6td4inputTag.setAttribute('class', 'phone');
tr6td4inputTag.setAttribute('title', '');
tr6td4inputTag.setAttribute('maxlength', '100');
tr6td4inputTag.setAttribute('size', '30');
tr6td4inputTag.setAttribute('id', 'phone_mobile'+NumOfRow);
tr6td4inputTag.setAttribute('name', 'phone_mobile'+NumOfRow);
tr6td4inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);
 

tableTag.appendChild(tr6Tag); 
tr6td1Tag.appendChild(tr6td1FinalDivTag);
tr6Tag.appendChild(tr6td1Tag);
tr6Tag.appendChild(tr6td2Tag); 
tr6td3Tag.appendChild(tr6td3FinalDivTag);
tr6Tag.appendChild(tr6td3Tag);
tr6Tag.appendChild(tr6td4Tag); 
tr6td2Tag.appendChild(tr6td2inputTag); 
tr6td4Tag.appendChild(tr6td4inputTag);



// Add Table Seventh Row with 4 columns
var tr7Tag=document.createElement('tr');
var tr7td1Tag=document.createElement('td');
tr7td1Tag.setAttribute('width','25%');
tr7td1Tag.setAttribute('valign','top');
tr7td1Tag.setAttribute('scope','row');
tr7td1Tag.setAttribute('id','department_label'); 

var tr7td1FinalDivTag=document.createElement('div');  
tr7td1FinalDivTag.setAttribute('style','float: right;');

var newSpan = "Department:";
tr7td1FinalDivTag.innerHTML = newSpan;


var tr7td2Tag=document.createElement('td');
tr7td2Tag.setAttribute('width','25%');
tr7td2Tag.setAttribute('valign','top');
var tr7td2inputTag=document.createElement('input');
tr7td2inputTag.type='text';
tr7td2inputTag.setAttribute('value', '');
tr7td2inputTag.setAttribute('title', '');
tr7td2inputTag.setAttribute('maxlength', '255');
tr7td2inputTag.setAttribute('size', '30');
tr7td2inputTag.setAttribute('id', 'department'+NumOfRow);
tr7td2inputTag.setAttribute('name', 'department'+NumOfRow);
tr7td2inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);

 
var tr7td3Tag=document.createElement('td');
tr7td3Tag.setAttribute('width','25%');
tr7td3Tag.setAttribute('valign','top'); 
tr7td3Tag.setAttribute('scope','row');
tr7td3Tag.setAttribute('id','phone_fax_label');  

var tr7td3FinalDivTag=document.createElement('div');  
tr7td3FinalDivTag.setAttribute('style','float: right;');

tr7td3FinalDivTag.innerHTML = "Fax: ";


var tr7td4Tag=document.createElement('td');
tr7td4Tag.setAttribute('width','25%');
tr7td4Tag.setAttribute('valign','top');  
var tr7td4inputTag=document.createElement('input');
tr7td4inputTag.type='text';
tr7td4inputTag.setAttribute('value', '');
tr7td4inputTag.setAttribute('class', 'phone');
tr7td4inputTag.setAttribute('title', '');
tr7td4inputTag.setAttribute('maxlength', '100');
tr7td4inputTag.setAttribute('size', '30');
tr7td4inputTag.setAttribute('id', 'phone_fax'+NumOfRow);
tr7td4inputTag.setAttribute('name', 'phone_fax'+NumOfRow);
tr7td4inputTag.setAttribute('tabindex', '2000'+tabIndexCtr);
 

tableTag.appendChild(tr7Tag); 
tr7td1Tag.appendChild(tr7td1FinalDivTag);
tr7Tag.appendChild(tr7td1Tag);
tr7Tag.appendChild(tr7td2Tag); 
tr7td3Tag.appendChild(tr7td3FinalDivTag);
tr7Tag.appendChild(tr7td3Tag);
tr7Tag.appendChild(tr7td4Tag); 
tr7td2Tag.appendChild(tr7td2inputTag); 
tr7td4Tag.appendChild(tr7td4inputTag);


// Final Eight Row for Remove Button
var tr8Tag=document.createElement('tr');
var tr8tdTag=document.createElement('td'); 

var tr8FinalDivTag=document.createElement('div'); 
tr8FinalDivTag.setAttribute('id','BiilingContactDivsID'+MulServiceNumOfRow);  
tr8FinalDivTag.setAttribute('style','float: right;');

tr8tdTag.setAttribute('id','innerDiv2'+NumOfRow);
tr8tdTag.setAttribute('colspan','4');
var newButton = document.createElement('input');
newButton.type='button';
newButton.value='Remove Billing Contact';
newButton.id='btn'+NumOfRow;  

newButton.onclick=function RemoveEntry() 
{    
   totalBilling = totalBilling - 1;  
   var mainDiv=document.getElementById('mainContentArea2');
   mainDiv.removeChild(tableTag); 
}

tr8FinalDivTag.appendChild(newButton);
tr8tdTag.appendChild(tr8FinalDivTag);
tr8Tag.appendChild(tr8tdTag);  
tableTag.appendChild(tr8Tag);
// finally append the new div to the main div
mainDiv.appendChild(tableTag); 
}
// -->
</script>


