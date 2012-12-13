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
<?php  require_once 'config.php'; require_once 'UpdateEasyGoogleMap.class.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php'; 
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();
 
 $fetchmultipleBC = $soapclient->get_entry_list($session_id, 'nli_ServiceAddresses', "contact_id_c = '".$record."' and addressstatus_c = 'Additional'", '','','','', 0); 
 $totaladditionalBillingContacts = count($fetchmultipleBC->entry_list);  
      $data = $fetchmultipleBC->entry_list;

$required_fields = array('id', 'name','service_address_street','service_address_city','service_address_state', 'service_address_postalcode', 'service_address_country', 'is_private_residence');
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
 <form name="manageSLAform<?php echo $i; ?>" id="manageSLAform<?php echo $i; ?>" method="post" action="">
          <input type="hidden" value="<?php echo $val['id']; ?>" id="AddSLAContactID<?php echo $i; ?>" name="AddSLAContactID<?php echo $i; ?>">
		  <?php $serviceAddress = $val['service_address_street'].' '.$val['service_address_city'].' '.$val['service_address_state'].' '.$val['service_address_postalcode'].' '.$val['service_address_country']; ?>
 <table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit" id="manageTableSLAform<?php echo $i; ?>"> 
			<tr>
				<td colspan="4">
					   <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">  
							   Additional <?php echo $i; ?> Service Location Address 
					   </h2>
				</td>
			</tr>   	 
			<tr>
				<td width="36%" valign="top" scope="row" id="description_label2">
					   <div style="float: right"> Name of Service Location: &nbsp;&nbsp;  </div>
				</td>
				<td width="64%" valign="top" colspan="3">  
					  <input type="text" value="<?php echo $val['name']; ?>" name="updateMultipleSLAservice_name<?php echo $i; ?>" id="updateMultipleSLAservice_name<?php echo $i; ?>" size="60">  
				</td> 
			</tr> 
			<tr>
				<td colspan="4">
						<fieldset id="SERVICE_address_fieldset" style="border: 1px solid; min-height: 180px;">
							 <legend>Service Address</legend>
									 <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
											<tr>
												<td width="36%" valign="top" scope="row">
													  <div style="float: right"> Street: &nbsp;&nbsp;  </div>
												</td>
												<td width="64%" valign="top" colspan="3">  
													  <input type="text" value="<?php echo $val['service_address_street']; ?>" name="updateMultipleSLAservice_address_street<?php echo $i; ?>" id="updateMultipleSLAservice_address_street<?php echo $i; ?>" size="60" maxlength="100">  
												</td> 
											</tr>
											<tr>
												<td width="36%" valign="top" scope="row">
													  <div style="float: right"> City: &nbsp;&nbsp;  </div>
												</td>
												<td width="64%" valign="top" colspan="3">  
													  <input type="text" value="<?php echo $val['service_address_city']; ?>" name="updateMultipleSLAservice_address_city<?php echo $i; ?>" id="updateMultipleSLAservice_address_city<?php echo $i; ?>" size="60" maxlength="100">  
												</td> 
											</tr>
											<tr>
												<td width="36%" valign="top" scope="row">
													  <div style="float: right"> State: &nbsp;&nbsp;  </div>
												</td>
												<td width="64%" valign="top" colspan="3">  
													  <input type="text" value="<?php echo $val['service_address_state']; ?>" name="updateMultipleSLAservice_address_state<?php echo $i; ?>" id="updateMultipleSLAservice_address_state<?php echo $i; ?>" size="60" maxlength="100">  
												</td> 
											</tr>
											<tr>
												<td width="36%" valign="top" scope="row">
													  <div style="float: right"> Postal Code: &nbsp;&nbsp;  </div>
												</td>
												<td width="64%" valign="top" colspan="3">  
													  <input type="text" value="<?php echo $val['service_address_postalcode']; ?>" name="updateMultipleSLAservice_address_postal_code<?php echo $i; ?>" id="updateMultipleSLAservice_address_postal_code<?php echo $i; ?>" size="20" maxlength="20">  
												</td> 
											</tr>
											<tr>
													<td width="36%" valign="top" scope="row" id="description_label2">
														<div style="float: right"> Is Private Residence ?: &nbsp;&nbsp; </div>
													</td>
													<td width="64%" valign="top" colspan="3">  
														<select tabindex="104" title="" id="updateMultipleSLAis_private_residence<?php echo $i; ?>" name="updateMultipleSLAis_private_residence<?php echo $i; ?>">
															<option value="" label="" <?php if($val['is_private_residence'] == "") {?>selected="selected"<?php } ?> ></option>
															<option value="Yes" label="Yes" <?php if($val['is_private_residence'] == "Yes") {?>selected="selected"<?php } ?> >Yes</option>
															<option value="No" label="No" <?php if($val['is_private_residence'] == "No") {?>selected="selected"<?php } ?> >No</option>
														</select>
													</td> 
											</tr> 
											<tr>
												<td width="36%" valign="top" scope="row">
													  <div style="float: right"> Country: &nbsp;&nbsp;  </div>
												</td>
												<td width="64%" valign="top" colspan="3">  
												   USA &nbsp; <input type="hidden" value="<?php echo $val['service_address_country']; ?>" name="updateMultipleSLAservice_address_country<?php echo $i; ?>" id="updateMultipleSLAservice_address_country<?php echo $i; ?>" size="60" maxlength="100">  
												</td> 
											</tr> 
											<tr>
												 <td colspan="4">
															<?php 
																$gm = new EasyGoogleMap($googleAPIKey); 
																$gm->SetMarkerIconStyle(); 
																$gm->SetMapZoom(16);
																$gm->SetAddress($serviceAddress);
																$gm->SetInfoWindowText($serviceAddress); 
																echo $gm->GmapsKey(); ?>
															<div id="updatemap<?php echo $i; ?>" style="width: 407px; height: 300px; float: right" height="300" width="407"></div>	
															<?php echo $gm->InitJs($i); ?> 
															<?php echo $gm->UnloadMap(); ?> 
												 </td>
											</tr>
											<tr>
												<td colspan="4">
												  <div style="float: right;">
													<input type="button" name="update" id="update" value="Update Service Address" onclick="checkEditSLAform(<?php echo $i; ?>, 'AddSLAContactID', '<?php echo $record; ?>', 'update_multiple_service_addresses.php');" /> &nbsp;
													<input type="button" name="delete" id="delete" value="Delete Service Address" onclick="javascript: deleteSLA(<?php echo $i; ?>, '<?php echo $record; ?>', 'update_multiple_service_addresses.php', 'AddSLAContactID');" />
												  </div>	
												</td>
											</tr>
									 </table>
						</fieldset> 
						<input type="hidden" value="<?php echo $serviceAddress; ?>" name="updateMultipleSLAservice_address<?php echo $i; ?>" id="updateMultipleSLAservice_address<?php echo $i; ?>"> 
				</td>
			</tr>  	
		    <?php 
	        $i++; ?>
 </table>
</form> 
   <?php   }
?> 
 </body>
</html>