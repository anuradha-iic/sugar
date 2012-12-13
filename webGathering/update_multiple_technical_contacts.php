<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link rel="stylesheet" id="graphene-stylesheet-css" href="includes/style.css" type="text/css" media="screen">
<script type="text/javascript" src="includes/innerfunctions.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Slingshot Example</title>
<link rel="stylesheet" href="styles/style.css" type="text/css">
<?php
if(isset($_REQUEST['record']) and $_REQUEST['record'] != '')
{
    $record = $_REQUEST['record'];
}
else
{
    $record = '';
}
?>
</head> 
<body style="background-color: #ffffff;"> 
<?php  require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php'; 
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();
 
 $fetchmultipleBC = $soapclient->get_entry_list($session_id, 'Contacts', "contactid_c = '".$record."' and contacttype_c = 'AdditionalTechnical'", '','','','', 0); 
 $totaladditionalBillingContacts = count($fetchmultipleBC->entry_list);  
      $data = $fetchmultipleBC->entry_list;

$required_fields = array('id', 'salutation', 'first_name', 'last_name', 'phone_work','email1','title','phone_mobile','department','phone_fax','description','primary_address_street','alt_address_street', 'primarycontacts_c', 'contact_id_c', 'contacttype_c', 'deleted');
$finaltotalValues = array();

foreach($data as $key=>$val)
{
    foreach($val->name_value_list as $key2=>$val2) 
	   {
			 if(in_array($val2->name, $required_fields))
			 {
				  $totalValues[$val2->name] = $val2->value;
			 }
	   }
	 $finaltotalValues[] = $totalValues;  
}  
   
  $i = 1;
       foreach($finaltotalValues as $key=>$val)
	   {  
	   ?>  
 <form name="manageform<?php echo $i; ?>" id="manageform<?php echo $i; ?>" method="post" action="">
          <input type="hidden" value="<?php echo $val['id']; ?>" id="AddTechContactID<?php echo $i; ?>" name="AddTechContactID<?php echo $i; ?>">
		  
 <table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit" id="manageTableform<?php echo $i; ?>"> 
			<tr>
				<td colspan="4">
					   <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">  
							   Additional <?php echo $i; ?> Technical Contact 
					   </h2>
				</td>
			</tr>   	
			<tr>
				<td width="25%" valign="top" scope="row" id="first_name_label">
					 <div style="float: right"> Salutation: </div>
				</td>
				<td width="25%" valign="top">
					<select id="updateMultipleTechnicalsalutation<?php echo $i; ?>" name="updateMultipleTechnicalsalutation<?php echo $i; ?>" tabindex="100<?php echo $i; ?>">   
						<option value="" <?php if($val['salutation'] == "") { ?> selected="selected" <?php } ?> label=""></option>
						<option value="Mr." <?php if($val['salutation'] == "Mr.") { ?> selected="selected" <?php } ?> label="Mr.">Mr.</option>
						<option value="Ms." <?php if($val['salutation'] == "Ms.") { ?> selected="selected" <?php } ?> label="Ms.">Ms.</option>
						<option value="Mrs." <?php if($val['salutation'] == "Mrs.") { ?> selected="selected" <?php } ?> label="Mrs.">Mrs.</option>
						<option value="Dr." <?php if($val['salutation'] == "Dr.") { ?> selected="selected" <?php } ?> label="Dr.">Dr.</option>
						<option value="Prof." <?php if($val['salutation'] == "Prof.") { ?> selected="selected" <?php } ?> label="Prof.">Prof.</option>
					</select>
				</td>
				<td width="25%" valign="top">
					<div style="float: right"> Contact Type: &nbsp; </div>
				</td>
				<td width="25%" valign="top">
					   Additional Billing
					   <input type="hidden" value="<?php echo $val['contacttype_c']; ?>" maxlength="25" size="25" id="updateMultipleTechnicalcontacttype_c<?php echo $i; ?>" name="updateMultipleTechnicalcontacttype_c<?php echo $i; ?>" tabindex="100<?php echo $i; ?>">
				</td>	
			</tr>
			<tr>
				<td width="53%" valign="top" scope="row" id="first_name_label">
					 <div style="float: right"> First Name: &nbsp; </div>
				</td>
				<td width="47%" valign="top" colspan="3">
					 <input type="text" value="<?php echo $val['first_name']; ?>" maxlength="25" size="25" id="updateMultipleTechnicalfirst_name<?php echo $i; ?>" name="updateMultipleTechnicalfirst_name<?php echo $i; ?>" tabindex="100<?php echo $i; ?>">
				</td>
			</tr>
			<tr>
				<td width="25%" valign="top" scope="row" id="last_name_label">
					 <div style="float: right"> Last Name:  </div>
				</td>
				<td width="25%" valign="top">
					 <input type="text" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['last_name']; ?>" maxlength="100" size="30" id="updateMultipleTechnicallast_name<?php echo $i; ?>" name="updateMultipleTechnicallast_name<?php echo $i; ?>"> 
				</td>
				<td width="25%" valign="top" scope="row" id="phone_work_label">
						<div style="float: right"> Office Phone: </div>
				</td>
				<td width="25%" valign="top">
					 <input type="text" class="phone" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['phone_work']; ?>" maxlength="100" size="30" id="updateMultipleTechnicalphone_work<?php echo $i; ?>" name="updateMultipleTechnicalphone_work<?php echo $i; ?>">
				</td>
            </tr>
			<tr>
				<td width="25%" valign="top" scope="row" id="title_label">
					<div style="float: right"> Title: </div>
				</td>
				<td width="25%" valign="top">
					<input type="text" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['title']; ?>" maxlength="100" size="30" id="updateMultipleTechnicaltitle<?php echo $i; ?>" name="updateMultipleTechnicaltitle<?php echo $i; ?>"> 
				</td>
				<td width="25%" valign="top" scope="row" id="phone_mobile_label">
					<div style="float: right"> Mobile: </div>
				</td>
				<td width="25%" valign="top">
					<input type="text" class="phone" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['phone_mobile']; ?>" maxlength="100" size="30" id="updateMultipleTechnicalphone_mobile<?php echo $i; ?>" name="updateMultipleTechnicalphone_mobile<?php echo $i; ?>">
				</td>
            </tr>
			<tr>
				<td width="25%" valign="top" scope="row" id="department_label">
					<div style="float: right"> Department: </div>
				</td>
				<td width="25%" valign="top">
					<input type="text" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['department']; ?>" maxlength="255" size="30" id="updateMultipleTechnicaldepartment<?php echo $i; ?>" name="updateMultipleTechnicaldepartment<?php echo $i; ?>"> 
				</td>
				<td width="25%" valign="top" scope="row" id="phone_fax_label">
					<div style="float: right"> Fax: </div>
				</td>
				<td width="25%" valign="top">
					<input type="text" class="phone" tabindex="100<?php echo $i; ?>" title="" value="<?php echo $val['phone_fax']; ?>" maxlength="100" size="30" id="updateMultipleTechnicalphone_fax<?php echo $i; ?>" name="updateMultipleTechnicalphone_fax<?php echo $i; ?>">
				</td>
            </tr>
            <tr>
				<td colspan="4">
				  <div style="float: right;">
					<input type="button" name="update" id="update" value="Update" onclick="checkEditTechform(<?php echo $i; ?>, 'AddTechContactID', '<?php echo $record; ?>', 'update_multiple_technical_contacts.php');" /> &nbsp;
					<input type="button" name="delete" id="delete" value="Delete" onclick="javascript: deleteCont(<?php echo $i; ?>, '<?php echo $record; ?>', 'update_multiple_technical_contacts.php', 'AddTechContactID');" />
				  </div>	
				</td>
			</tr> 			
		    <?php 
	        $i++; ?>
 </table>
</form> 
	<?php }
?> 
 </body>
</html>