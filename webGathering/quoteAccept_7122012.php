<html>
<title>Quote Acceptance</title>
<?php 
require_once 'config.php'; 
require_once 'CallWebServiceSugarSoap.php'; 
require_once('../modules/AOS_PDF_Templates/templateParser.php');

//global $mod_strings;
//global $db;
//		if ( ! isset($db) ) { 
//			   $db = DBManagerFactory::getInstance(); 
//		 } 

//error_reporting(0);

?>
<img src="<?php echo $siteURL; ?>/images/cropped-MainHeader1.6.jpg" />
<?php 
if( isset($_REQUEST['record']) && $_REQUEST['record'] != '' )
{
	$record = $_REQUEST['record'];
	//get pdf template for respective quote
	
	//$quote_focus = new AOS_Quotes();
	//$quote_focus->retrieve($record);
	//echo $quote_focus->template_ddown_c;
	
 $soapclientObj = new CallWebServiceSugarSoap();
 $soapclient = $soapclientObj->getsoapclientObj(); 
 $soapclientObj->loginInsugar(); 
 $session_id = $soapclientObj->getsessionID();
 $user_guid = $soapclientObj->getuser_guid();
 
 
 $totalContacts = array();
 $totalContactsinPDF = array();
 $totalCts = array();
 
 $resultArray = $soapclient->get_entry($session_id, 'AOS_Quotes', $record);
 echo "<pre>";

 $quote_data = $resultArray->entry_list[0]->name_value_list;
// print_r($quote_data);

	function formatMoney($number, $fractional=false) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return $number;
	}
	
 foreach($quote_data as $key => $val) {
 	
 	$SummaryDetails=$val;
 	if($val->name=='opportunity_id')
 	$opportunity_idVal = $val->value;
	
	$object_arr = array();
	
	if($val->name=='billing_account_id')
    $object_arr['Accounts'] = $val->value;	
	
	if($val->name=='billing_contact_id')
    $object_arr['Contacts'] = $val->value;
	
	if($val->name=='assigned_user_id')
    $object_arr['Users']    = $val->value;
	
 }
 
	$fetchAdminCheckQuery = "SELECT * FROM opportunities_contacts WHERE opportunity_id = '$opportunity_idVal' and deleted = 0";
	$resultAdCheck = mysql_query($fetchAdminCheckQuery); 
	while (($row2 = mysql_fetch_assoc($resultAdCheck)) != null) {
			//  echo "<pre>"; print_r($row2);
			  $totalContacts[] = $row2['contact_id'];
	 }
	 
	 $Q1 = "SELECT qsc.contacts_id, ct.salutation, ct.id, ct.first_name, ct.last_name, ct.phone_work, ct.phone_mobile, ctcst.contact_type_primary_billing_c, ctcst.contact_type_other_billing_c, ctcst.contact_type_primary_tech_c, ctcst.contact_type_additional_tech_c, ctcst.contact_type_other_c, ctcst.contacttype_c, ctcst.opportunity_role_c FROM quotes_saved_contacts as qsc INNER JOIN contacts as ct ON qsc.contacts_id = ct.id INNER JOIN contacts_cstm as ctcst ON ct.id = ctcst.id_c WHERE qsc.quotes_id = '".$record."' and ct.deleted = 0 ORDER BY ct.first_name, ct.last_name desc";		 
		  	$result1 = mysql_query($Q1); 
			while (($row3 = mysql_fetch_assoc($result1)) != null) { 			
			
					 $totalContactsinPDF['opportunity_role_c'] = $row3['opportunity_role_c'];
					 $totalContactsinPDF['id'] = $row3['id'];
					 $totalContactsinPDF['name'] = $row3['salutation']. ' ' .$row3['first_name']. ' ' .$row3['last_name'];
					 
					 if($row3['contacttype_c'] == "PrimaryBilling")
					   $totalContactsinPDF['contacttype'] = "Primary Billing";
					 if($row3['contacttype_c'] == "OtherBilling")
					   $totalContactsinPDF['contacttype'] = "Other Billing";
                     if($row3['contacttype_c'] == "PrimaryTechnical")
					   $totalContactsinPDF['contacttype'] = "Primary Technical";
                     if($row3['contacttype_c'] == "AdditionalTechnical")
					   $totalContactsinPDF['contacttype'] = "Additional Technical";
					 if($row3['contacttype_c'] == "Others")
					   $totalContactsinPDF['contacttype'] = "Others";
					 
					 $totalContactsinPDF['role'] = "";
					 if($row3['contact_type_primary_billing_c'] == 1)
					 {
					      $totalContactsinPDF['role'] .= "Primary Billing, ";
					 }
					 else
					 {
					      $totalContactsinPDF['role'] .= "";
					 }
					 
					 if($row3['contact_type_other_billing_c'] == 1)
					 {
					      $totalContactsinPDF['role'] .= "Additional Billing, ";
					 }
					 else
					 {
					      $totalContactsinPDF['role'] .= "";
					 }
					 
					 if($row3['contact_type_primary_tech_c'] == 1)
					 {
					      $totalContactsinPDF['role'] .= "Primary Technical, ";
					 }
					 else
					 {
					      $totalContactsinPDF['role'] .= "";
					 }
					 
					 if($row3['contact_type_additional_tech_c'] == 1)
					 {
					      $totalContactsinPDF['role'] .= "Additional Technical, ";
					 }
					 else
					 {
					      $totalContactsinPDF['role'] .= "";
					 }
					 
					 if($row3['contact_type_other_c'] == 1)
					 {
					      $totalContactsinPDF['role'] .= "Others, ";
					 }
					 else
					 {
					      $totalContactsinPDF['role'] .= "";
					 }
					 
					   $totalContactsinPDF['work'] = $row3['phone_work'];
					   $totalContactsinPDF['mobile'] = $row3['phone_mobile'];
					   
					$Q2 = "SELECT email.email_address FROM email_addr_bean_rel as email_rel INNER JOIN email_addresses as email ON email_rel.email_address_id = email.id WHERE email_rel.bean_id = '".$row3['id']."' and email_rel.bean_module = 'Contacts' and email_rel.deleted = 0 and email.deleted = 0";
					$result2 = mysql_query($Q2); 
					while (($row4 = mysql_fetch_assoc($result2)) != null) {
							$emailAddr = $row4['email_address'];
					 }
					  
					$totalContactsinPDF['email'] = $emailAddr;  
					$totalContactsinPDF['size']  = count($totalContacts);  
					
					$lenfind = substr($totalContactsinPDF['role'], 0, strlen($totalContactsinPDF['role'])-2);
					$totalContactsinPDF['role'] = $lenfind;   

                    $totalCts[] = $totalContactsinPDF;					
			 }
			 
 /**
  * start
  */
 
 
 $search = array ('@<script[^>]*?>.*?</script>@si', 		// Strip out javascript
					'@<[\/\!]*?[^<>]*?>@si',		// Strip out HTML tags
					'@([\r\n])[\s]+@',			// Strip out white space
					'@&(quot|#34);@i',			// Replace HTML entities
					'@&(amp|#38);@i',
					'@&(lt|#60);@i',
					'@&(gt|#62);@i',
					'@&(nbsp|#160);@i',
					'@&(iexcl|#161);@i',
					'@&#(\d+);@e',
					'@<address[^>]*?>@si'
	);

	$replace = array ('',
					 '',
					 '\1',
					 '"',
					 '&',
					 '<',
					 '>',
					 ' ',
					 chr(161),
					 'chr(\1)',
					 '<br>'
		);
		
	
	$module_type_low=strtolower($_REQUEST['module']);
	
	//product line items start
	$lineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$_REQUEST['module']."' AND parent_id = '".$record."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$lineItems[$row['id']] = $row['product_id'];
	} 
	//end
	
	//service Line Items array start
	$serviceLineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$_REQUEST['module']."' AND parent_id = '".$record."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$serviceLineItems[$row['id']] = $row['product_id'];
	}
	//end
	
	//start product quotes
	$prodQuotesArr = $soapclient->get_module_fields($session_id, 'AOS_Products_Quotes');	
	$module_fields=$prodQuotesArr->module_fields;
	//end
	
	//start aos_products
	$prodArr = $soapclient->get_module_fields($session_id, 'AOS_Products');
	$prodArr_fields=$prodArr->module_fields;
	//end
	
 $contacts_locations = '<p>&nbsp;</p>
<table style="border: 1pt none currentcolor; width: 100%; border-spacing: 0pt; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="2"><tbody>
<tr><td style="text-align: center; height: 10px; background-color: #0001f9;" colspan="5"><span style="font-size: x-small; color: #ffffff;"> <strong>CUSTOMER CONTACT INFORMATION</strong> </span></td>
</tr>';
 
 foreach($quote_data as $key => $val) {
 	
 	$SummaryDetails=$val;
 	if($val->name=='opportunity_id')
 	$opportunity_idVal = $val->value;
 	
 	if($val->name=='template_ddown_c')
 	{
 		
 		$templates = explode('^,^',trim($val->value)); 		
 		foreach($templates as $template){
 			$templateId = str_replace('^','',$template);
 			
 			//get PDF Template Header,Body,Footer
 			$pdfTemplateArray = $soapclient->get_entry($session_id, 'AOS_PDF_Templates', $templateId);
 			//print_r($pdfTemplateArray);
 			$pdf_template_data = $pdfTemplateArray->entry_list[0]->name_value_list;
 			foreach($pdf_template_data as $temp_val) {
 				
 				if($temp_val->name=='pdfheader')
 				{
 					//echo html_entity_decode(str_replace('&nbsp;',' ',$temp_val->value));
 					//echo '<br/><h1>header</h1>'; 
 					$header = preg_replace($search, $replace, $temp_val->value); 
 					//echo $header = templateParser::parse_template($header, $object_arr, $SummaryDetails, $totalCts);				
 				}
 				
 				if($temp_val->name=='description')
 				{
 					//echo html_entity_decode(str_replace('&nbsp;',' ',$temp_val->value));
 					//echo '<br/><h1>body</h1>';
 					$text   = preg_replace($search, $replace, $temp_val->value);
 					
 					$text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text );
 					$text = str_replace("\$aos_quotes","\$".$module_type_low,$text);
					$text = str_replace("\$aos_invoices","\$".$module_type_low,$text);
					$text = str_replace("\$total_amt","\$".$module_type_low."_total_amt",$text);
					$text = str_replace("\$discount_amount","\$".$module_type_low."_discount_amount",$text);
					$text = str_replace("\$subtotal_amount","\$".$module_type_low."_subtotal_amount",$text);
					$text = str_replace("\$tax_amount","\$".$module_type_low."_tax_amount",$text);
					$text = str_replace("\$shipping_amount","\$".$module_type_low."_shipping_amount",$text);
					$text = str_replace("\$total_amount","\$".$module_type_low."_total_amount",$text);
					
					$text = str_replace("\$total_nrc","\$".$module_type_low."_total_nrc",$text);
					$text = str_replace("\$OneTimeGrandTotal","\$".$module_type_low."_OneTimeGrandTotal",$text);
					
					$firstValue = '';
					$firstNum = 0;
					
					$lastValue = '';
					$lastNum = 0;
	
 				foreach($module_fields as $name => $arr)
				{
					if(!($arr->type == 'id' || $arr->type == 'link')){
					//echo $arr->name.'<br>';
					$curNum = strpos($text,'$aos_products_quotes_'.$arr->name);
					if($curNum)
					{
						if($curNum < $firstNum || $firstNum == 0)
						{
							$firstValue = '$aos_products_quotes_'.$arr->name;
							$firstNum = $curNum;
						}
						else if($curNum > $lastNum)
						{
							$lastValue = '$aos_products_quotes_'.$arr->name;
							$lastNum = $curNum;
						}
					}
				 }
				}
				
				foreach($prodArr_fields as $name => $arr){
					if(!($arr->type == 'id' || $arr->type == 'link')){
					
						$curNum = strpos($text,'$aos_products_'.$arr->name);
						if($curNum)
						{
							if($curNum < $firstNum || $firstNum == 0)
							{
								$firstValue = '$aos_products_'.$arr->name;
								$firstNum = $curNum;
							}
							else if($curNum > $lastNum)
							{
								$lastValue = '$aos_products_'.$arr->name;
								$lastNum = $curNum;
							}
						}
					}
				}
				 
				if($firstValue !== '' && $lastvalue !== ''){
				//Converting Text
				$parts = explode($firstValue,$text);
				$text = $parts[0];
				$parts = explode($lastValue,$parts[1]);
				$linePart = $firstValue . $parts[0] . $lastValue;
				
				if(count($lineItems) != 0){
					//Read line start <tr> value
					$tcount = strrpos($text,"<tr");
					$lsValue = substr($text,$tcount);
					$tcount=strpos($lsValue,">")+1;
					$lsValue = substr($lsValue,0,$tcount);
				
					//Read line end values
					$tcount=strpos($parts[1],"</tr>")+5;
					$leValue = substr($parts[1],0,$tcount);
					
					//Converting Line Items
					$obb = array();
					$sep = '';
					$tdTemp = explode($lsValue,$text);
			         $i=0;
					foreach($lineItems as $id => $productId){
						$obb['AOS_Products_Quotes'] = $id;
						$obb['AOS_Products'] = $productId;
						//echo "Verma:  <pre>"; print_r($obb); 
						$text .= $sep . templateParser::parse_template($linePart, $obb, $SummaryDetails, $totalCts); 
						$sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
						$i = $i + 1;
					}  
				}
				else{
					$tcount = strrpos($text,"<tr");
					$text = substr($text,0,$tcount);
					
					$tcount=strpos($parts[1],"</tr>")+5;
					$parts[1]= substr($parts[1],$tcount);
				}
			
				$text .= $parts[1];
			} 
			
 				$firstValue = '';
				$firstNum = 0;
				
				$lastValue = '';
				$lastNum = 0; 
				
				$text = str_replace("\$aos_services_quotes_service","\$aos_services_quotes_product",$text);
				
				//Find first and last valid line values
				
					foreach($module_fields as $name => $arr){
						if(!( $arr->type == 'id' || $arr->type == 'link')){
						
							$curNum = strpos($text,'$aos_services_quotes_'.$arr->name);
							if($curNum)
							{
								if($curNum < $firstNum || $firstNum == 0)
								{
									$firstValue = '$aos_products_quotes_'.$arr->name;
									$firstNum = $curNum;
								}
								else if($curNum > $lastNum)
								{
									$lastValue = '$aos_products_quotes_'.$arr->name;
									$lastNum = $curNum;
								}
							}
						}
					}
					
					if($firstValue !== '' && $lastvalue !== '')
					{
						$text = str_replace("\$aos_products","\$aos_null",$text);
						$text = str_replace("\$aos_services","\$aos_products",$text);
						
						$parts = explode($firstValue,$text);
						$text = $parts[0];
						$parts = explode($lastValue,$parts[1]);
						$linePart = $firstValue . $parts[0] . $lastValue;
						
						if(count($serviceLineItems) != 0){
						//Read line start <tr> value
						$tcount = strrpos($text,"<tr");
						$lsValue = substr($text,$tcount);
						$tcount=strpos($lsValue,">")+1;
						$lsValue = substr($lsValue,0,$tcount);
						
						//Read line end values
						$tcount=strpos($parts[1],"</tr>")+5;
						$leValue = substr($parts[1],0,$tcount);
						
						//Converting ServiceLine Items
						$obb = array();
						$sep = '';
						$tdTemp = explode($lsValue,$text);
						
						$j = 0;
						foreach($serviceLineItems as $id => $productId){
						$obb['AOS_Products_Quotes'] = $id;
						$obb['AOS_Products'] = $productId;
						//$text .= $sep . templateParser::parse_template($linePart, $obb)."$";
						$text .= $sep . templateParser::parse_template($linePart, $obb, $SummaryDetails, $totalCts);
						$sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
						$j = $j + 1;
						}
						}
						else{
						//Remove Line if no values
						$tcount = strrpos($text,"<tr");
						$text = substr($text,0,$tcount);
						
						$tcount=strpos($parts[1],"</tr>")+5;
						$parts[1]= substr($parts[1],$tcount);
						}
						
						$text .= $parts[1];
					} 
					// sample DISCOUNTS AND TOTALS SECTION  $stringtoaddinPDF
					$pos = strpos($temp_val->value, "sample DISCOUNTS AND TOTALS SECTION");
					
					if ($pos === false) 
					{ 
						//echo "The string '$findme' was not found in the string '$mystring'";
							$stringA = $text;
							$stringB = $stringtoaddinPDF;
							$length  = strlen($text); 
							$strHTMLTags = htmlentities($stringA);
									
						    $pos2 = strpos($stringA, "term.]"); 
							if ($pos2 === false) 
							{ 
								//echo "The string '$findme' was not found in the string '$mystring'"; 
								$text .= $stringtoaddinPDF;
							} 
							else 
							{ 
									$stringFirstPart = substr($stringA,0,$pos2+6);   
									$stringSeconPart = substr($stringA,$pos2+7,$length); 
									$stringSeconPartlength  = strlen($stringSeconPart); 
									
									$stringSeconPart2 = substr($stringSeconPart,5,$stringSeconPartlength); 
									
									$text = $stringFirstPart.$stringtoaddinPDF.$stringSeconPart2;
							}  
					} 
					else 
					{ 
						//echo "The string '$findme' was found in the string '$mystring'"; 
						 $text = str_replace($existed, $stringtoaddinPDF, $text);
					}
					
					if($val->name=='service_subtotal_nrc')
					$service_subtotal_nrc = $val->value;
					
					if($val->name=='product_subtotal_nrc')
				    $product_subtotal_nrc = $val->value;
					
				    $build_field = "$".formatMoney($service_subtotal_nrc + $product_subtotal_nrc, true);
				    $text = str_replace("BUILD FIELD", $build_field, $text);
					
					if($val->name=='order_nrc_discont')
					$order_nrc_discont=$val->value;
					
					if($val->name=='shipping_amount')
					$shipping_amount=$val->value;
					
					if($val->name=='product_subtotal_lmd')
					$product_subtotal_lmd=$val->value;					
					
					$aos_quotes_grand_total_nrc2 = ( (($service_subtotal_nrc + $product_subtotal_nrc) - $order_nrc_discont) + $shipping_amount + $product_subtotal_lmd );
	  				$grandtotal = "$".formatMoney($aos_quotes_grand_total_nrc2, true); 
	  				$text = str_replace('aosQuotes_grand_total', $grandtotal, $text);
	
	
 					$text = str_replace('--Other Customer Locations Contacts--', $contacts_locations, $text);
 echo $text;
 die;
					$converted = templateParser::parse_template($text, $object_arr, $SummaryDetails, $totalCts);
			    	$converted =  html_entity_decode(str_replace('&nbsp;',' ',$converted));
 					echo $printable = str_replace("\n","<br />",$converted);
 				}//desc=body if end
 				
 				if($temp_val->name=='pdffooter')
 				{
 					//echo html_entity_decode(str_replace('&nbsp;',' ',$temp_val->value));
 					//echo '<br/><h1>footer</h1>';	
 					$footer = preg_replace($search, $replace, $temp_val->value); 
 					//echo $footer = templateParser::parse_template($footer, $object_arr, $SummaryDetails, $totalCts);
 				}
 				
 				//7th dec
 				
				
				
			  
				
 			}
 			
 		}
 	} //if template_ddwn_c end
 }//foreach  end
 
 
}
else{
	
}
?> 
</html>