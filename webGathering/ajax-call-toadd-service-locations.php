<?php  require_once 'config.php';
   if( isset($_REQUEST['counter']) and $_REQUEST['counter'] != '' )
   {
        $counter = $_REQUEST['counter'];
   }
   else
   {
        $counter = 0;
   }
   if( isset($_REQUEST['addCounter']) and $_REQUEST['addCounter'] != '' )
   {
        $addCounter = $_REQUEST['addCounter'];
   }
   else
   {
        $addCounter = 0;
   }
?> 
<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
<tr>
    <td colspan="4">
        &nbsp;
    </td>
</tr>
<tr>
    <td colspan="4">
        <h2 style="border-top: 1px solid #E3E3E3; font: 18px arial; padding-bottom: 5px;"> 
                           Additional <?php echo $addCounter; ?> Service Addresses/Locations
        </h2>
    </td>
</tr>

<tr>
	<td width="36%" valign="top" scope="row" id="Multipledescription_label2<?php echo $counter; ?>">
	        <div style="float: right"> Name of Service Location: </div> 
	</td>
    <td width="64%" valign="top" colspan="3">  
          <input type="text" value="" name="Multipleservice_name<?php echo $counter; ?>" id="Multipleservice_name<?php echo $counter; ?>">  
    </td> 
</tr>

<tr>
    <td colspan="4">
	        <fieldset id="MultipleSERVICE_address_fieldset<?php echo $counter; ?>" style="border: 1px solid; min-height: 180px;">
			     <legend>Service Address</legend>
			             <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
						        <tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> Street: </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="" name="Multipleservice_address_street<?php echo $counter; ?>" id="Multipleservice_address_street<?php echo $counter; ?>" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> City: </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="" name="Multipleservice_address_city<?php echo $counter; ?>" id="Multipleservice_address_city<?php echo $counter; ?>" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> State: </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="" name="Multipleservice_address_state<?php echo $counter; ?>" id="Multipleservice_address_state<?php echo $counter; ?>" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
									<td width="36%" valign="top" scope="row">
										  <div style="float: right"> Postal Code: </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
										  <input type="text" value="" name="Multipleservice_address_postal_code<?php echo $counter; ?>" id="Multipleservice_address_postal_code<?php echo $counter; ?>" size="20" maxlength="20">  
									</td> 
								</tr>
                                                                <tr>
                                                                        <td width="36%" valign="top" scope="row">
                                                                            <div style="float: right"> Is Private Residence ?: &nbsp;&nbsp; </div>
                                                                        </td>
                                                                        <td width="64%" valign="top" colspan="3">  
                                                                            <select tabindex="104" title="" id="Multipleis_private_residence<?php echo $counter; ?>" name="Multipleis_private_residence<?php echo $counter; ?>">
                                                                                    <option value="" label=""></option>
                                                                                    <option value="Yes" label="Yes">Yes</option>
                                                                                    <option selected="selected" value="No" label="No">No</option>
                                                                            </select>
                                                                        </td> 
                                                                </tr> 
								<tr>
									<td width="36%" valign="top" scope="row">
										 <div style="float: right"> Country: </div>
									</td>
									<td width="64%" valign="top" colspan="3">  
                                                                            USA &nbsp; <input type="hidden" value="USA" name="Multipleservice_address_country<?php echo $counter; ?>" id="Multipleservice_address_country<?php echo $counter; ?>" size="60" maxlength="100">  
									</td> 
								</tr>
								<tr>
								    <td colspan="4">
									      <span style="color:#0000FF;">Please enter the above service address and then see on map. &nbsp; </span>
											 <div style="float: right;">  
												  <div id="Multiplevalidate<?php echo $counter; ?>" style="margin-left: 330px;"><input type="button" value="See on Map" onClick="jaavscript: setiframeAddress(<?php echo $counter; ?>);"></input></div>
												  <div id="Multiplemap_canvas<?php echo $counter; ?>" style="width: 407px;">                           
                                                                    <iframe src="<?php echo $siteURL; ?>/SampleGmaps.php?counter=<?php echo $counter; ?>" id="dynmaiciFrameID<?php echo $counter; ?>" style="margin-left:0px; margin-top:0px; border:none; width:407px; height:300px; overflow:hidden; background: transparent;" frameborder="0" scrolling="no" allowTransparency="true" height="300" width="407"></iframe>
                                                                    
                                                                                                  </div> 
												   
												  <div style="display: none;" id="Multipleaddresserrormsg<?php echo $counter; ?>"></div> 
											 </div> 
									</td>
							    </tr>		
						 </table>
			</fieldset> 
			<input type="hidden" value="" name="multiple_service_address<?php echo $counter; ?>" id="multiple_service_address<?php echo $counter; ?>"> 
	</td>
</tr>  
</table>