<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:addthis="http://www.addthis.com/help/api-spec" lang="en-US">
<head profile="http://gmpg.org/xfn/11"><link media="all" href="includes/widget082.css" type="text/css" rel="stylesheet"> 
<?php require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php'; include('header.php'); ?>	
	</head>	
	<body class="home page page-id-2270 page-template page-template-template-onecolumn-php custom-background one-column" onload="initialize(); onloadofPage();">
	
<div id="container">     
        <div id="header" style="background-image:url(<?php echo $siteURL; ?>/images/cropped-MainHeader1.6.jpg);">
                <a href="http://nextlevelinternet.com/" id="header_img_link" title="Go back to the front page">&nbsp;</a>
                
        		
        		<h1 style="display:none;" class="header_title"><a style="display: none;" href="http://nextlevelinternet.com/" title="Go back to the front page">NextLevel Internet</a></h1>
        <h2 style="display:none;" class="header_desc"></h2>
            </div>
    <div id="nav"> 
                
        <div class="menu-bottom-shadow">&nbsp;</div>


        
    </div>

    
    <div id="content" class="clearfix hfeed">
                
                
        <div id="content-main" class="clearfix">
         
    	 			
              <?php $full_path = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>
<h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">  
            <span style="color: #0000FF"> 
                Please verify/update Contacts and Locations of <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('first_name', $totalValues)) { echo $totalValues['first_name']; } } ?> <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('last_name', $totalValues)) { echo $totalValues['last_name']; } } ?> for <b><u>Company:</u></b>&nbsp; 
                <a href="<?php echo $accountRecordURL.$contactRelatedAccountId; ?>" target="_blank">
                    <?php echo ucfirst($contactRelatedAccountName); ?> 
                </a>    
            </span>      
</h2> 
<span style="font: 14px arial; color: #0000FF;"><b>*</b> <i>are required fields</i></span>
<?php
     if(isset($_REQUEST['finish']) and $_REQUEST['finish'] == 1)
     {
?> <br>
          <span style="color: blue;">
               Your Record has been updated successfully...
          </span>
<?php
     }
?>
<br /> 

<h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">       
             <span style="color: #0000FF"> 
	          Billing Information 
             </span>  
</h2>

<form name="actionform" method="post" action="testSubmit.php" onsubmit="return checkform(this);">  
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit" id="mainContentArea"> 
<tr>
    <td colspan="4">
	       <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">  
				   Billing Contact 
		   </h2>
	</td>
</tr> 
<tr>
	<td width="25%" valign="top" scope="row" id="first_name_label">
	     <div style="float: right"> Salutation: </div>
	</td>
	<td width="25%" valign="top">
		<select id="salutation" name="salutation" tabindex="100">
			<option value="" <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "") { ?> selected="selected" <?php } } ?> label=""></option>
			<option value="Mr." <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "Mr.") { ?> selected="selected" <?php } } ?> label="Mr.">Mr.</option>
			<option value="Ms." <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "Ms.") { ?> selected="selected" <?php } } ?> label="Ms.">Ms.</option>
			<option value="Mrs." <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "Mrs.") { ?> selected="selected" <?php } } ?> label="Mrs.">Mrs.</option>
			<option value="Dr." <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "Dr.") { ?> selected="selected" <?php } } ?> label="Dr.">Dr.</option>
			<option value="Prof." <?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('salutation', $totalValues)) { $salut = $totalValues['salutation']; } if($salut == "Prof.") { ?> selected="selected" <?php } } ?> label="Prof.">Prof.</option>
		</select>
	</td>
	<td width="25%" valign="top">
	    <div style="float: right"> Contact Type: &nbsp; </div>
	</td>
	<td width="25%" valign="top">
	     <select tabindex="101" title="" id="contacttype_c" name="contacttype_c" onchange="check4Primary(this);">
			<option selected="selected" value="PrimaryBilling" label="Primary Billing">Primary Billing</option>
			<option value="AdditionalBilling" label="Additional Billing">Additional Billing</option>
			<option value="PrimaryTechnical" label="Primary Technical">Primary Technical</option>
			<option value="AdditionalTechnical" label="Additional Technical">Additional Technical</option>
		 </select>
	</td>	
</tr>

<tr>
	<td width="53%" valign="top" scope="row" id="first_name_label">
	     <div style="float: right"> First Name: <b>*</b>&nbsp; </div>
	</td>
    <td width="47%" valign="top" colspan="3">
	     <input type="text" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('first_name', $totalValues)) { echo $totalValues['first_name']; } } ?>" maxlength="25" size="25" id="first_name" name="first_name" tabindex="102">
    </td>
</tr> 

<tr>
	<td width="25%" valign="top" scope="row" id="last_name_label">
	     <div style="float: right"> Last Name:  <b>*</b> </div>
	</td>
    <td width="25%" valign="top">
		 <input type="text" tabindex="103" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('last_name', $totalValues)) { echo $totalValues['last_name']; } } ?>" maxlength="100" size="30" id="last_name" name="last_name"> 
    </td>
	<td width="25%" valign="top" scope="row" id="phone_work_label">
            <div style="float: right"> Office Phone: <b>*</b> </div>
    </td>
    <td width="25%" valign="top">
         <input type="text" class="phone" tabindex="104" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('phone_work', $totalValues)) { echo $totalValues['phone_work']; } } ?>" maxlength="100" size="30" id="phone_work" name="phone_work">
    </td>
</tr>

<tr>
	<td width="53%" valign="top" scope="row" id="description_label">
	    <div style="float: right"> Primary Contact:  </div>
	</td>
	<td width="47%" valign="top" colspan="3">
	    <input type="text" class="email" tabindex="105" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('primarycontacts_c', $totalValues)) { echo $totalValues['primarycontacts_c']; } } ?>" maxlength="100" size="20" id="primarycontacts_c" name="primarycontacts_c"> &nbsp; 
		        <img src="<?php echo $siteURL; ?>/images/lookup.png" border="0" width="16" height="16" style="cursor: pointer;" onclick="javascript: openpopupForAddPrimaryContacts('primarycontacts_c', 'selectedPrimaryContactsID');"  /> &nbsp; 
                <img src="<?php echo $siteURL; ?>/images/cancel.png" border="0" width="16" height="16" style="cursor: pointer;" onclick="javascript: cancelPrimaryContact('primarycontacts_c');" />
                <input type="hidden" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('contact_id_c', $totalValues)) { echo $totalValues['contact_id_c']; } } ?>" id="selectedPrimaryContactsID" name="selectedPrimaryContactsID">
	</td>
</tr>

<tr>
	<td width="25%" valign="top" scope="row" id="title_label">
	    <div style="float: right"> Title: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" tabindex="106" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('title', $totalValues)) { echo $totalValues['title']; } } ?>" maxlength="100" size="30" id="title" name="title"> 
	</td>
	<td width="25%" valign="top" scope="row" id="phone_mobile_label">
	    <div style="float: right"> Mobile: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" class="phone" tabindex="107" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('phone_mobile', $totalValues)) { echo $totalValues['phone_mobile']; } } ?>" maxlength="100" size="30" id="phone_mobile" name="phone_mobile">
	</td>
</tr>

<tr>
	<td width="25%" valign="top" scope="row" id="department_label">
	    <div style="float: right"> Department: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" tabindex="108" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('department', $totalValues)) { echo $totalValues['department']; } } ?>" maxlength="255" size="30" id="department" name="department"> 
	</td>
	<td width="25%" valign="top" scope="row" id="phone_fax_label">
        <div style="float: right"> Fax: </div>
    </td>
    <td width="25%" valign="top">
        <input type="text" class="phone" tabindex="109" title="" value="<?php if(is_array($totalValues) and !empty($totalValues)) { if(array_key_exists('phone_fax', $totalValues)) { echo $totalValues['phone_fax']; } } ?>" maxlength="100" size="30" id="phone_fax" name="phone_fax">
    </td>
</tr> 
<tr>
    <td colspan="4" style="">&nbsp;
	     <div style="float: right">
	         <input type="button" value="Save" name="useSubmitinner1" onclick="javascript: var res = checkform(document.actionform); if(res) { document.actionform.submit(); }">
		 </div>	 
	</td>
</tr> 
</table>

<?php 
 $fetchmultipleBC = $soapclient->get_entry_list($session_id, 'Contacts', "contactid_c = '".$record."' and contacttype_c = 'AdditionalBilling'", '','','','', 0); 
 $totaladditionalBillingContacts = count($fetchmultipleBC->entry_list); 
     if($totaladditionalBillingContacts > 0)
      {
?>   
		<h2 style="border-bottom: 1px solid #0000ff; font: 18px arial; padding-bottom: 5px; color: #0000ff;">  
				   Additional Billing Contacts
	    </h2>
           <iframe src="<?php echo $siteURL; ?>/update_multiple_billing_contacts.php?record=<?php echo $record; ?>" id="dynmaiciFrameID4AddBillCont" style="margin-left:0px; margin-top:0px; border:none; width:937px; height:300px; background: transparent;" frameborder="0" scrolling="yes" allowTransparency="true" height="300" width="937"></iframe>
        <hr style="border-bottom: 1px solid #0000ff; color: #0000ff;">
<?php
      }
?>
<div id="mainContentArea2">
	 <div style="float: right"> <input id="Button1" type="button" value="Add More Billing Contacts" onclick="Button1_onclick()" /> </div>
</div>	 

    <br>
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit">
<tr>
    <td colspan="4">
	       <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;">  
				   Billing Address 
		   </h2>
	</td>
</tr> 
<tr> 
<td width="64%" valign="top" colspan="4"> 
    <div style="padding-left: 270px;"> Your Billing Address: &nbsp;&nbsp; </div>
    <div style="float: right"> 
<?php   
	       if( isset($billingAddressValues) and is_array($billingAddressValues) and !empty($billingAddressValues) ) 
		{ 
			  $address_street     = $billingAddressValues['billing_address_street']; 
                          $address_city       = $billingAddressValues['billing_address_city'];
                          $address_state      = $billingAddressValues['billing_address_state'];
                          $address_country    = $billingAddressValues['billing_address_country'];
                          $address_postalcode = $billingAddressValues['billing_address_postalcode'];
                          $Valprimary_address_street = $address_street.' '.$address_city.' '.$address_state.' '.$address_country.' '.$address_postalcode;
		} 
	       else
		{
			  $address_street     = ''; 
                          $address_city       = '';
                          $address_state      = '';
                          $address_country    = '';
                          $address_postalcode = '';
                          $Valprimary_address_street = '';
                }	
?> 
        <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
            <tr>
                <td width="40%">
                       Billing Address Street: &nbsp;
                </td>
                <td width="60%">
                       <input type="text" value="<?php echo $address_street; ?>" name="billing_address_street" id="billing_address_street" size="40" maxlength="150">  
                </td>
            </tr>
            <tr>
                <td>
                       Billing Address City: &nbsp;
                </td>
                <td>
                       <input type="text" value="<?php echo $address_city; ?>" name="billing_address_city" id="billing_address_city" maxlength="100">  
                </td>
            </tr>
            <tr>
                <td>
                       Billing Address State: &nbsp;
                </td>
                <td>
                       <input type="text" value="<?php echo $address_state; ?>" name="billing_address_state" id="billing_address_state" maxlength="100">  
                </td>
            </tr>
            <tr>
                <td>
                       Billing Address Country: &nbsp;
                </td>
                <td>
                       <input type="text" value="<?php echo $address_country; ?>" name="billing_address_country" id="billing_address_country" maxlength="150">  
                </td>
            </tr>
            <tr>
                <td>
                       Billing Address Postal Code: &nbsp;
                </td>
                <td>
                       <input type="text" value="<?php echo $address_postalcode; ?>" name="billing_address_postalcode" id="billing_address_postalcode" maxlength="20">  
                </td>
            </tr>
        </table> 
               <input type="hidden" value="<?php echo $Valprimary_address_street; ?>" name="address" id="address"> 
<input type="hidden" value="" name="primary_address" id="primary_address"> 
    </div>
</td> 
</tr> 

<tr>
    <td colspan="4">&nbsp;
	     <div style="float: right">
	          <input type="button" value="Save" name="useSubmitinner3" onclick="javascript: var res = checkform(document.actionform); if(res) { document.actionform.submit(); }">
		 </div>	  
	</td>
</tr>
<tr>
    <td colspan="2">
	       <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;"> 
                              <span style="color: #0000FF">
				   Service Installation > Service Locations  
                              </span>     
		   </h2>
	</td>
</tr>  

</table>

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit"> 
<tr>
    <td colspan="4">
	       <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;"> 
				   Technical Contact 
		   </h2>
    </td>
</tr>  
<tr>
	<td width="25%" valign="top" scope="row" id="first_name_label">
	     <div style="float: right"> Salutation: </div>
	</td>
	<td width="25%" valign="top">
		<select id="technical_salutation" name="technical_salutation" tabindex="111">
			<option value="" <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "") { ?> selected="selected" <?php } } ?> label=""></option>
			<option value="Mr." <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "Mr.") { ?> selected="selected" <?php } } ?> label="Mr.">Mr.</option>
			<option value="Ms." <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "Ms.") { ?> selected="selected" <?php } } ?> label="Ms.">Ms.</option>
			<option value="Mrs." <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "Mrs.") { ?> selected="selected" <?php } } ?> label="Mrs.">Mrs.</option>
			<option value="Dr." <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "Dr.") { ?> selected="selected" <?php } } ?> label="Dr.">Dr.</option>
			<option value="Prof." <?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('salutation', $primaryTechnicalValues)) { $salut = $primaryTechnicalValues['salutation']; } if($salut == "Prof.") { ?> selected="selected" <?php } } ?> label="Prof.">Prof.</option>
		</select>
	</td>
	<td width="25%" valign="top">
	    <div style="float: right"> Contact Type: &nbsp; </div>
	</td>
	<td width="25%" valign="top">
	     <select tabindex="112" title="" id="technical_contacttype_c" name="technical_contacttype_c" onchange="check4Technical(this);">
			<option value="PrimaryBilling" label="Primary Billing">Primary Billing</option>
			<option value="AdditionalBilling" label="Additional Billing">Additional Billing</option>
			<option value="PrimaryTechnical" selected="selected" label="Primary Technical">Primary Technical</option>
			<option value="AdditionalTechnical" label="Additional Technical">Additional Technical</option>
		 </select>
	</td>	
</tr>

<tr>
	<td width="53%" valign="top" scope="row" id="first_name_label">
	     <div style="float: right"> First Name: <b>*</b>&nbsp; </div>
	</td>
    <td width="47%" valign="top" colspan="3">
	     <input type="text" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('first_name', $primaryTechnicalValues)) { echo $primaryTechnicalValues['first_name']; } } ?>" maxlength="25" size="25" id="technical_first_name" name="technical_first_name" tabindex="113">
    </td>
</tr> 

<tr>
	<td width="25%" valign="top" scope="row" id="last_name_label">
	     <div style="float: right"> Last Name:  <b>*</b> </div>
	</td>
    <td width="25%" valign="top">
		 <input type="text" tabindex="114" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('last_name', $primaryTechnicalValues)) { echo $primaryTechnicalValues['last_name']; } } ?>" maxlength="100" size="30" id="technical_last_name" name="technical_last_name"> 
    </td>
	<td width="25%" valign="top" scope="row" id="phone_work_label">
         <div style="float: right"> Office Phone: <b>*</b> </div>
    </td>
    <td width="25%" valign="top">
         <input type="text" class="phone" tabindex="115" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('phone_work', $primaryTechnicalValues)) { echo $primaryTechnicalValues['phone_work']; } } ?>" maxlength="100" size="30" id="technical_phone_work" name="technical_phone_work">
    </td>
</tr>

<tr>
	<td width="53%" valign="top" scope="row" id="description_label">
	    <div style="float: right"> Primary Contact (Technical):  </div>
	</td>
	<td width="47%" valign="top" colspan="3">
	    <input type="text" class="email" tabindex="116" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('primarycontacts_c', $primaryTechnicalValues)) { echo $primaryTechnicalValues['primarycontacts_c']; } } ?>" maxlength="100" size="20" id="technicalprimarycontacts_c" name="technicalprimarycontacts_c"> &nbsp; <img src="<?php echo $siteURL; ?>/images/lookup.png" border="0" width="16" height="16" style="cursor: pointer;" onclick="javascript: openpopupForAddPrimaryContacts('technicalprimarycontacts_c', 'selectedTechnicalPrimaryContactsID');" /> &nbsp; 
                                  <img src="<?php echo $siteURL; ?>/images/cancel.png" border="0" width="16" height="16" style="cursor: pointer;" onclick="javascript: cancelPrimaryContact('technicalprimarycontacts_c');" />
             <input type="hidden" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('contact_id_c', $primaryTechnicalValues)) { echo $primaryTechnicalValues['contact_id_c']; } } ?>" id="selectedTechnicalPrimaryContactsID" name="selectedTechnicalPrimaryContactsID">
	</td>
</tr>

<tr>
	<td width="25%" valign="top" scope="row" id="title_label">
	    <div style="float: right"> Title: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" tabindex="117" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('title', $primaryTechnicalValues)) { echo $primaryTechnicalValues['title']; } } ?>" maxlength="100" size="30" id="technical_title" name="technical_title"> 
	</td>
	<td width="25%" valign="top" scope="row" id="phone_mobile_label">
	    <div style="float: right"> Mobile: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" class="phone" tabindex="118" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('phone_mobile', $primaryTechnicalValues)) { echo $primaryTechnicalValues['phone_mobile']; } } ?>" maxlength="100" size="30" id="technical_phone_mobile" name="technical_phone_mobile">
	</td>
</tr>

<tr>
	<td width="25%" valign="top" scope="row" id="department_label">
	    <div style="float: right"> Department: </div>
	</td>
	<td width="25%" valign="top">
	    <input type="text" tabindex="119" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('department', $primaryTechnicalValues)) { echo $primaryTechnicalValues['department']; } } ?>" maxlength="255" size="30" id="technical_department" name="technical_department"> 
	</td>
	<td width="25%" valign="top" scope="row" id="phone_fax_label">
        <div style="float: right"> Fax: </div>
    </td>
    <td width="25%" valign="top">
        <input type="text" class="phone" tabindex="120" title="" value="<?php if(is_array($primaryTechnicalValues) and !empty($primaryTechnicalValues)) { if(array_key_exists('phone_fax', $primaryTechnicalValues)) { echo $primaryTechnicalValues['phone_fax']; } } ?>" maxlength="100" size="30" id="technical_phone_fax" name="technical_phone_fax">
    </td>
</tr> 
<tr>
    <td colspan="4">&nbsp;
	    <div style="float: right">
	        <input type="button" value="Save" name="useSubmitinner2" onclick="javascript: var res = checkform(document.actionform); if(res) { document.actionform.submit(); }">
		</div>	
	</td>
</tr>
</table>

<?php 
 $fetchmultipleTC = $soapclient->get_entry_list($session_id, 'Contacts', "contactid_c = '".$record."' and contacttype_c = 'AdditionalTechnical'", '','','','', 0); 
 $totaladditionalTechnicalContacts = count($fetchmultipleTC->entry_list); 
     if($totaladditionalTechnicalContacts > 0)
      {
?>   
		<h2 style="border-bottom: 1px solid #0000ff; font: 18px arial; padding-bottom: 5px; color: #0000ff;">  
				   Additional Technical Contacts
	    </h2> 
           <iframe src="<?php echo $siteURL; ?>/update_multiple_technical_contacts.php?record=<?php echo $record; ?>" id="dynmaiciFrameID4AddTechCont" style="margin-left:0px; margin-top:0px; border:none; width:937px; height:320px; background: transparent;" frameborder="0" scrolling="yes" allowTransparency="true" height="320" width="937"></iframe>
        <hr style="border-bottom: 1px solid #0000ff; color: #0000ff;">
<?php
      }
?>

<div id="mainContentAreaofTechContacts">
	<div style="float: right"> <input id="Button2" type="button" value="Add More Technical Contacts" onclick="Button2_onclick()" /> </div> 
</div>	
<br /><br />

<?php include('service_address.php'); ?>

<br /><br />
<input type="hidden" value="true" name="useEmailWidget">  
</span> 
<input type="hidden" value="" name="altaddress" id="altaddress">
<input type="hidden" value="<?php echo $case; ?>" name="casetoUse">
<input type="hidden" value="<?php echo $record; ?>" name="recordID"> 
<input type="hidden" value="<?php echo $user_assigned; ?>" name="userAssignedID" id="userAssignedID">
<input type="hidden" value="<?php echo $contactRelatedAccountId; ?>" name="contactRelatedAccountId" id="contactRelatedAccountId">
<input type="hidden" value="<?php echo $contactRelatedAccountName; ?>" name="contactRelatedAccountName" id="contactRelatedAccountName">
        
<input type="hidden" value="<?php echo $comma_separated_emails; ?>" name="comma_separated_emails">

<input type="hidden" value="<?php echo $full_path; ?>" name="full_URL" id="full_URL">

<input type="hidden" value="" name="totalBillingContacts" id="totalBillingContacts">
<input type="hidden" value="" name="totalServiceAddressLocations" id="totalServiceAddressLocations">
<input type="hidden" value="" name="TotalfieldLastValofBillingContacts" id="TotalfieldLastValofBillingContacts">
<input type="hidden" value="" name="TotalfieldLastValofTechnicalContacts" id="TotalfieldLastValofTechnicalContacts">
<input type="hidden" value="" name="TotalfieldLastValofServiceAddress" id="TotalfieldLastValofServiceAddress">
<input type="hidden" value="" name="totalTechnicalContacts" id="totalTechnicalContacts">

    <div style="float: right">
<input type="submit" value="Save" name="useSubmit">
    </div>
</form>   

<script type="text/javascript" src="includes/formSubmission.js"></script> 
         
    </div><!-- #content-main --> 

</div><!-- #content --> 

<div id="footer" class="clearfix">
    
       <?php include('footer.php'); ?>
    
    </div><!-- #footer -->


</div><!-- #container -->
 
	<div style="display:none">
	</div>
<!--[if IE 8]>
    <script type="text/javascript">
        (function( $) {
            var imgs, i, w;
            var imgs = document.getElementsByTagName( 'img' );
            maxwidth = 0.98 * $( '.entry-content' ).width();
            for( i = 0; i < imgs.length; i++ ) {
                w = imgs[i].getAttribute( 'width' );
                if ( w > maxwidth ) {
                    imgs[i].removeAttribute( 'width' );
                    imgs[i].removeAttribute( 'height' );
                }
            }
        })(jQuery);
    </script>
    <![endif]-->  
	
</body></html>