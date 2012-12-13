<table cellspacing="0" cellpadding="0" border="0" width="100%" class="yui3-skin-sam edit view dcQuickEdit"> 
<tr>
    <td colspan="4">
	       <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;"> 
				   Service Addresses/Locations
	       </h2>
    </td>
</tr>
<?php
if( isset($ServiceAddressOtherValues) and is_array($ServiceAddressOtherValues) and !empty($ServiceAddressOtherValues) ) 
 { 
              $service_name               = $ServiceAddressOtherValues['name']; 
			  $service_address_street     = $ServiceAddressOtherValues['service_address_street']; 
			  $service_address_city       = $ServiceAddressOtherValues['service_address_city'];
			  $service_address_state      = $ServiceAddressOtherValues['service_address_state'];
			  $service_address_country    = $ServiceAddressOtherValues['service_address_country'];
			  $service_address_postalcode = $ServiceAddressOtherValues['service_address_postalcode'];
			  $service_address            = $service_address_street.' '.$service_address_city.' '.$service_address_state.' '.$service_address_country.' '.$service_address_postalcode;
			  $is_private_residence       = $ServiceAddressOtherValues['is_private_residence'];
 } 
else
 {
              $service_name               = '';
			  $service_address_street     = ''; 
			  $service_address_city       = '';
			  $service_address_state      = '';
			  $service_address_country    = '';
			  $service_address_postalcode = '';
			  $service_address            = '';
			  $is_private_residence       = '';
 }	
?>
<tr>
	<td width="36%" valign="top" scope="row" id="description_label2">
	       <div style="float: right"> Name of Service Location: &nbsp;&nbsp; <b>*</b> </div>
	</td>
    <td width="64%" valign="top" colspan="3">  
          <input type="text" value="<?php echo $service_name; ?>" name="service_name" id="service_name" size="60">  
    </td> 
</tr>

<tr>
    <td colspan="4">
	        <fieldset id="SERVICE_address_fieldset" style="border: 1px solid; min-height: 180px;">
			     <legend>Service Address</legend>
			             <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
						        <tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> Street: &nbsp;&nbsp; <b>*</b> </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="<?php echo $service_address_street; ?>" name="service_address_street" id="service_address_street" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> City: &nbsp;&nbsp; <b>*</b> </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="<?php echo $service_address_city; ?>" name="service_address_city" id="service_address_city" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> State: &nbsp;&nbsp; <b>*</b> </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="<?php echo $service_address_state; ?>" name="service_address_state" id="service_address_state" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> Postal Code: &nbsp;&nbsp; <b>*</b> </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="<?php echo $service_address_postalcode; ?>" name="service_address_postal_code" id="service_address_postal_code" size="20" maxlength="20">  
									</td> 
								</tr>
                                                                <tr>
                                                                        <td width="36%" valign="top" scope="row" id="description_label2">
                                                                            <div style="float: right"> Is Private Residence ?: &nbsp;&nbsp; </div>
                                                                        </td>
                                                                        <td width="64%" valign="top" colspan="3">  
                                                                            <select tabindex="104" title="" id="is_private_residence" name="is_private_residence">
                                                                                <option value="" label="" <?php if($is_private_residence == "") {?>selected="selected"<?php } ?> ></option>
                                                                                <option value="Yes" label="Yes" <?php if($is_private_residence == "Yes") {?>selected="selected"<?php } ?> >Yes</option>
                                                                                <option value="No" label="No" <?php if($is_private_residence == "No") {?>selected="selected"<?php } ?> >No</option>
                                                                            </select>
                                                                        </td> 
                                                                </tr> 
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> Country: &nbsp;&nbsp; <b>*</b> </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
                                                                            USA &nbsp; <input type="hidden" value="USA" name="service_address_country" id="service_address_country" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
								    <td colspan="4">
									   <span style="color:#0000FF;">Please enter the above service address and then see on map. &nbsp; </span>
											 <div style="float: right;">  
												  <div id="validate" style="margin-left: 330px;"><input type="button" value="See on Map" onClick="javascript: checkandshow('service_address');"></input></div>
												  <div id="map_canvas" style="width: 407px;"></div> 
												  <div id="results">
													  <input type="hidden" id="valid" size="60"></input>
													  <input type="hidden" id="type" size="60"></input>
													  <input type="hidden" id="result" size="60"></input>
												  </div>
												  <div style="display: none;" id="addresserrormsg"></div> 
											 </div> 
									</td>
							    </tr>		
						 </table>
			</fieldset> 
			<input type="hidden" value="<?php echo $service_address; ?>" name="service_address" id="service_address"> 
	</td>
</tr>  
</table>

<?php 
 $fetchmultipleSLA = $soapclient->get_entry_list($session_id, 'nli_ServiceAddresses', "contact_id_c = '".$record."' and addressstatus_c = 'Additional'", '','','','', 0); 
 $totaladditionalServiceAddresses = count($fetchmultipleSLA->entry_list); 
     if($totaladditionalServiceAddresses > 0)
      {
?>  
		<h2 style="border-bottom: 1px solid #0000ff; font: 18px arial; padding-bottom: 5px; color: #0000ff;">  
				   Additional Service Location Addresses
	    </h2> 
           <iframe src="<?php echo $siteURL; ?>/update_multiple_service_addresses.php?record=<?php echo $record; ?>" id="dynmaiciFrameID4AddSLA" style="margin-left:0px; margin-top:0px; border:none; width:937px; height:630px; background: transparent;" frameborder="0" scrolling="yes" allowTransparency="true" height="630" width="937"></iframe>
        <hr style="border-bottom: 1px solid #0000ff; color: #0000ff;">
<?php
      }
?>

<div id="mainServiceAddressContentArea2">
  <div style="float: right"> <input id="MulServiceButton1" type="button" value="Add Multiple Service Addresses" onclick="Mul_Service_Button1_onclick()" /> </div> 
</div>

<script language="javascript">
var MulServiceNumOfRow     = 1;
var MulServiceAddRow       = 0; 
var MulServicetotalBilling = 0; 
var MulServicetabIndexCtr  = -1; 
 
function onloadofPage()
{  
      var totalVal = MulServicetotalBilling;
        if(totalVal > 0)
         {
              
         }
    //window.setTimeout("onloadofPage();", 1000);  
} 
  
function Mul_Service_Button1_onclick()
{
    MulServicetabIndexCtr = MulServicetabIndexCtr + 1;
    MulServiceNumOfRow++;
    MulServiceAddRow++;
    MulServicetotalBilling++;
    
    var mainDiv = document.getElementById('mainServiceAddressContentArea2');
    
    var serviceAddressdynamicVars = document.createElement('div');
    serviceAddressdynamicVars.setAttribute('id','innerMainDiv'+MulServiceNumOfRow); 
     
    if (window.XMLHttpRequest)
    {   // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {   // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    } 
    xmlhttp.onreadystatechange=function()
    {
       if (xmlhttp.readyState==4 && xmlhttp.status==200)
        { 
                serviceAddressdynamicVars.innerHTML = xmlhttp.responseText;  
                // Final Eight Row for Remove Button
                var trFinalDivTag=document.createElement('div'); 
                trFinalDivTag.setAttribute('id','MulServiceinnerDiv2'+MulServiceNumOfRow);  
                trFinalDivTag.setAttribute('style','float: right;');
                var newButton = document.createElement('input');
                newButton.type='button';
                newButton.value='Remove Service Address Location';
                newButton.id='MulServicebtn'+MulServiceNumOfRow;  
                newButton.onclick=function RemoveEntry() 
                {    
                    MulServicetotalBilling = MulServicetotalBilling - 1;  
                    var mainDiv=document.getElementById('mainServiceAddressContentArea2');
                    mainDiv.removeChild(serviceAddressdynamicVars); 
                }  
                trFinalDivTag.appendChild(newButton);
                serviceAddressdynamicVars.appendChild(trFinalDivTag); 
                // finally append the new div to the main div
                mainDiv.appendChild(serviceAddressdynamicVars);
        }
    } 
    xmlhttp.open("GET","ajax-call-toadd-service-locations.php?counter="+MulServiceNumOfRow+"&addCounter="+MulServiceAddRow,true);
    xmlhttp.send();   
}

function altcheckandshow(addressID, currentNumber)
{ 
            eval("var geocoder" + currentNumber + ";");
            eval("var map" + currentNumber + ";");
            eval("var marker" + currentNumber + ";");
            eval("var defaultLatLng" + currentNumber + "= new google.maps.LatLng(30,0);");
         altfilloutServiceAddress(addressID, currentNumber); 
	 validate2(currentNumber);  
}

function altfilloutServiceAddress(addressID, currentNumber)
{
        service_address_street      = document.getElementById('multiple_service_address_street'+currentNumber).value;
	service_address_city        = document.getElementById('multiple_service_address_city'+currentNumber).value;
	service_address_state       = document.getElementById('multiple_service_address_state'+currentNumber).value;
	service_address_postal_code = document.getElementById('multiple_service_address_postal_code'+currentNumber).value;
	service_address_country     = document.getElementById('multiple_service_address_country'+currentNumber).value;
	
	document.getElementById(addressID).value = service_address_street+' '+service_address_city+' '+service_address_state+' '+service_address_postal_code+' '+service_address_country;
}
   
 
</script>