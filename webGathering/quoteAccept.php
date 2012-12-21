<html>
<title>Quote Acceptance</title>
<script type="text/javascript" src="jquery-1.4.1.js"></script>
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
echo "<pre>";
?>
<!--<img src="<?php //echo $siteURL; ?>/images/cropped-MainHeader1.6.jpg" />-->
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
 

 $quote_data = $resultArray->entry_list[0]->name_value_list;


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
	
 $temp_actual_arr=array('$aos_quotes_quote_type_c','$aos_quotes_service_period','$aos_quotes_assigned_user_name','$aos_quotes_quote_desired_install','$aos_quotes_product_subtotal_mrc','$aos_quotes_order_discount','$aos_quotes_order_nrc_discont','$aos_quotes_subtotal_amount','$aos_quotes_product_subtotal_lmd','$aos_quotes_amount_due_c','$aos_quotes_quote_important_details','$aos_quotes_grand_total_nrc','$aos_quotes_total_nrc_subtotal','$aos_quotes_grand_total_nrc');
 
 $temp_fields_arr=array('quote_type_c','service_period','assigned_user_name','quote_desired_install','product_subtotal_mrc','order_discount','order_nrc_discont','subtotal_amount','product_subtotal_lmd','amount_due_c','quote_important_details','grand_total_nrc','total_nrc_subtotal','grand_total_nrc');
 
 $basket = array_replace($temp_actual_arr,$temp_fields_arr);
 
 $temp_values_arr=array();

 /*foreach($quote_data as $key => $val) { 	
	
	if(in_array($val->name, $temp_fields_arr))
	{
		$temp_values_arr[$val->name] = $val->value;
	}
	
 }*/
//print_r($module_fields);


	 
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
	
	//start aos_products
	$prodArr = $soapclient->get_module_fields($session_id, 'AOS_Products');
	$prodArr_fields=$prodArr->module_fields;
	//end
	
	$prod_quotes_lineitems =array();
	//print_r($getQuotesLineItems);
	foreach($module_fields as $name=>$arr)
	{
		$prod_quotes_lineitems[] = $arr->name;
	}
	//$line
	//end
	//print_r($prod_quotes_lineitems);
	
	$line_items_arr = array('$aos_products_quotes_product_qty','$aos_products_quotes_quotes_product_name','$aos_products_quotes_description','$aos_products_quotes_per_unit_price','$aos_products_quotes_product_list_price','$aos_products_quotes_product_discount','$aos_products_quotes_product_total_price','$aos_products_quotes_product_total_nrc');
	
	$line_items_replace_arr = array('product_qty','quotes_product_name','description','per_unit_price','product_list_price','product_discount','product_total_price','product_total_nrc');
	
	array_replace($line_items_arr,$line_items_replace_arr);
	

	$getQuotesLineItems = $soapclient->get_entry_list($session_id,'AOS_Products_Quotes', " parent_type = '".$_REQUEST['module']."' and parent_id='".$record."' and product_id != '0'", 'aos_products_quotes.number asc','','','50',0); 	
	$getQuotesLineItems = $getQuotesLineItems->entry_list;
	
	//print_r($getQuotesLineItems);
	
	
 $contacts_locations = '<p>&nbsp;</p>
<table style="border: 1pt none currentcolor; width: 100%; border-spacing: 0pt; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="2"><tbody>
<tr><td style="text-align: center; height: 10px; background-color: #0001f9;" colspan="5"><span style="font-size: 12px; color: #ffffff;"> <strong>CUSTOMER CONTACT INFORMATION</strong> </span></td>
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
 					$text   = preg_replace($search, $replace, $temp_val->value);
 					//echo $text;

                                    preg_match( '/src="([^"]*)"/i', $text, $match);
					$img_path = $rootURL."/".$match[1];
					$text = str_replace($match[1],$img_path,$text);
					$text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text);
					
					$text = preg_replace('/x-small/i',"12px",$text);
					
							
					
					for($i=0;$i<count($temp_actual_arr);$i++){
						//replacing acc to table fields
						$text = str_replace($temp_actual_arr[$i],$temp_fields_arr[$i],$text);
						
					}
					
					//checking in array: replacing with values of db
					foreach($quote_data as $key => $val) 
					{ 

						//print_r($temp_fields_arr);
						/*echo $temp_fields_arr[$key].'<br>';
						die;
						if($val->name==$temp_fields_arr[$key])*/
						if(in_array($val->name,$temp_fields_arr,true))						
						{
						
							if($val->name=='product_subtotal_mrc'){
							 $product_subtotal_nrc = "$".formatMoney($val->value, true); 
							 $text = str_replace($val->name,$product_subtotal_nrc,$text);
							}
							elseif($val->name=='order_discount' || $val->name=='subtotal_amount'){
								$text = str_replace($val->name,"$".formatMoney($val->value, true),$text);
							}
							elseif($val->name=='total_nrc_subtotal' || $val->name=='order_nrc_discont'  || $val->name=='product_subtotal_lmd' || $val->name=='amount_due_c' || $val->name=='grand_total_nrc'){
								$text = str_replace($val->name,"$".formatMoney($val->value, true),$text);
							}
							
							
							$text = str_replace($val->name,$val->value,$text);
						}
					}
					//line items start
					$firstValue = '';
					$firstNum = 0;
					
					$lastValue = '';
					$lastNum = 0;
	//print_r($module_fields);
 				foreach($module_fields as $name => $arr)
				{
					
					if(!($arr->type == 'id' || $arr->type == 'link')){
					//echo '$aos_products_quotes_'.$arr->name.'<br>';
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
				//echo 'iic india='.$firstValue;

				if($firstValue !== '' && $lastValue !== ''){
				//Converting Text
				//echo  $firstValue.''.$lastValue;
				
				$parts1 = explode($firstValue,$text);
				//$parts = explode($lastValue,$parts1[1]);
				

				}
			
/*echo $text;
die;*/
					for($j=0;$j<count($line_items_arr);$j++){	
							//replacing acc to db table fields
							$text = str_replace($line_items_arr[$j],$line_items_replace_arr[$j],$text);						
					}
					//line items checking in array: replacing with values of db	
					//foreach($getQuotesLineItems as $line_item_key => $line_item_val) 
					for($k=0;$k<count($getQuotesLineItems);$k++)					
					{
						
						foreach($getQuotesLineItems[$k]->name_value_list as $name_value_key => $name_value_val)
						{
							//print_r($name_value_val);
							if(in_array($name_value_val->name,$line_items_replace_arr))						
							{
								$text = str_replace($name_value_val->name,$name_value_val->value,$text);
								
							}
						}
					}
					
					//line items end
					$text = str_replace('--Other Customer Locations Contacts--', $contacts_locations, $text);
					
					echo html_entity_decode(str_replace('&nbsp;',' ',$text));
 					//echo '<br/><h1>body</h1>';
 					
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