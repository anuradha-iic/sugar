<?php 
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
 
	if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || !isset($_REQUEST['templateID']) || empty($_REQUEST['templateID'])){
		die('Error retrieving record. This record may be deleted or you may not be authorized to view it.');
	}
	error_reporting(0);
	require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
	require_once('modules/AOS_PDF_Templates/templateParser.php');
	require_once('modules/AOS_PDF_Templates/sendEmail.php');
	require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');
	global $mod_strings;
	global $db;
		if ( ! isset($db) ) { 
			   $db = DBManagerFactory::getInstance(); 
		 }  
		 
	$module_type = $_REQUEST['module'];
	$module_type_file = strtoupper(ltrim(rtrim($module_type,'s'),'AOS_'));
	$module_type_low = strtolower($module_type);
	
	$module = new $module_type();
	$module->retrieve($_REQUEST['uid']);

	$task = $_REQUEST['task'];
	
	$lineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$module_type."' AND parent_id = '".$module->id."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
	$res = $module->db->query($sql);
	while($row = $module->db->fetchByAssoc($res)){
		$lineItems[$row['id']] = $row['product_id'];
	} 
	
	$serviceLineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$module_type."' AND parent_id = '".$module->id."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
	$res = $module->db->query($sql);
	while($row = $module->db->fetchByAssoc($res)){
		$serviceLineItems[$row['id']] = $row['product_id'];
	}
	
	$template = new AOS_PDF_Templates();
	$template->retrieve($_REQUEST['templateID']);
	$templateName = $template->name;

	
	$SummaryDetails = $module->fetched_row; 
	$quoteName      = $SummaryDetails['name'];
	$totalContacts = array();
	$totalContactsinPDF = array();
	$totalCts = array();
	//echo "<pre>";  
	 //   print_r($SummaryDetails); 
	
    $opportunity_idVal = $SummaryDetails['opportunity_id'];	
	$quote_idVal       = $SummaryDetails['id'];	
	 // echo "<br>";
	  
	  $fetchAdminCheckQuery = "SELECT * FROM opportunities_contacts WHERE opportunity_id = '$opportunity_idVal' and deleted = 0";
	    $resultAdCheck = $db->query($fetchAdminCheckQuery); 
	    while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {
		        //  echo "<pre>"; print_r($row2);
				  $totalContacts[] = $row2['contact_id'];
	     } 
 
          
          $Q1 = "SELECT qsc.contacts_id, ct.salutation, ct.id, ct.first_name, ct.last_name, ct.phone_work, ct.phone_mobile, ctcst.contact_type_primary_billing_c, ctcst.contact_type_other_billing_c, ctcst.contact_type_primary_tech_c, ctcst.contact_type_additional_tech_c, ctcst.contact_type_other_c, ctcst.contacttype_c, ctcst.opportunity_role_c FROM quotes_saved_contacts as qsc INNER JOIN contacts as ct ON qsc.contacts_id = ct.id INNER JOIN contacts_cstm as ctcst ON ct.id = ctcst.id_c WHERE qsc.quotes_id = '".$quote_idVal."' and ct.deleted = 0 ORDER BY ct.first_name, ct.last_name desc";		 
		  	$result1 = $db->query($Q1); 
			while (($row3 = $db->fetchByAssoc($result1)) != null) {   
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
					      $totalContactsinPDF['role'] .= "Other Billing, ";
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
					$result2 = $db->query($Q2); 
					while (($row4 = $db->fetchByAssoc($result2)) != null) {
							$emailAddr = $row4['email_address'];
					 }
					  
					$totalContactsinPDF['email'] = $emailAddr;  
					$totalContactsinPDF['size']  = count($totalContacts);  
					
					$lenfind = substr($totalContactsinPDF['role'], 0, strlen($totalContactsinPDF['role'])-2);
					$totalContactsinPDF['role'] = $lenfind;   

                    $totalCts[] = $totalContactsinPDF;					
			 }  
	  
	 /* echo "<pre>";
	    print_r($SummaryDetails); 
	die; */ 
	 
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

	$object_arr = array();
	$object_arr[$module_type] = $module->id;
	
	$object_arr['Accounts'] = $module->billing_account_id;
	$object_arr['Contacts'] = $module->billing_contact_id;
	$object_arr['Users']    = $module->assigned_user_id;
	
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
		
	$header = preg_replace($search, $replace, $template->pdfheader); 
	
	//echo $template->pdfheader; die;
	
	$footer = preg_replace($search, $replace, $template->pdffooter); 
	$text   = preg_replace($search, $replace, $template->description); 
	
	//echo $template->description;
	// die;
	 
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
	
	//Find first and last valid line values
	$product_quote = new AOS_Products_Quotes();
		foreach($product_quote->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_products_quotes_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_quotes_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_quotes_'.$name;
						$lastNum = $curNum;
					}
				}
			}
		} 
	// echo $text; die; 
	$product = new AOS_Products();
		foreach($product->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_products_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_'.$name;
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
	
//echo $text; die;
			
	$firstValue = '';
	$firstNum = 0;
	
	$lastValue = '';
	$lastNum = 0; 
	
	$text = str_replace("\$aos_services_quotes_service","\$aos_services_quotes_product",$text);
	
	//Find first and last valid line values
	$product_quote = new AOS_Products_Quotes();
		foreach($product_quote->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_services_quotes_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_quotes_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_quotes_'.$name;
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
	$pos = strpos($template->description, "sample DISCOUNTS AND TOTALS SECTION");
 
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
				//echo "The string  
					
					//echo "<hr>Enjoy!! <br><br><br><br><br><br>";
										 
					$stringFirstPart = substr($stringA,0,$pos2+6);   
					$stringSeconPart = substr($stringA,$pos2+7,$length); 
					$stringSeconPartlength  = strlen($stringSeconPart); 
					
					$stringSeconPart2 = substr($stringSeconPart,5,$stringSeconPartlength); 
					 
					//$secPartHTMLTags = htmlentities($stringSeconPart);
					//$secPartHTMLTags = str_replace('pacing="2" cellpadding="2"> <tbody> <tr style="text-align: left;"> <td style="text-align: left;">', '<table border="0" width="100%" cellpadding="0" cellspacing="0"> <tbody> <tr style="text-align: left;"> <td style="text-align: left;">', $secPartHTMLTags);   
					//echo $stringSeconPart = html_entity_decode($secPartHTMLTags);
					
 	                //echo $stringFirstPartHTMLTags = htmlentities($stringFirstPart);
                    // $stringFirstPart = str_replace('br />', '<br />', $stringFirstPart);	
					//echo html_entity_decode($stringFirstPart)."<br><br>Mahajan<br>".html_entity_decode($stringSeconPart);
					//$text = html_entity_decode($stringFirstPart).$stringtoaddinPDF.html_entity_decode($stringSeconPart);
					 
					$text = $stringFirstPart.$stringtoaddinPDF.$stringSeconPart2;
			}  
	} 
	else 
	{ 
		//echo "The string '$findme' was found in the string '$mystring'"; 
		 $text = str_replace($existed, $stringtoaddinPDF, $text);
	}
 
 
 //if($templateName != "NLI Quotes Template V 1.3")
 //{    
	  $service_subtotal_nrc = $SummaryDetails['service_subtotal_nrc'];
	  $product_subtotal_nrc = $SummaryDetails['product_subtotal_nrc'];
	  $build_field = "$".formatMoney($service_subtotal_nrc + $product_subtotal_nrc, true);
	  $text = str_replace("BUILD FIELD", $build_field, $text); 
	   
	   
	  /*$aos_quotes_tax_amount = (1 - ($SummaryDetails['order_discount']/$SummaryDetails['product_subtotal_mrc'])) * $SummaryDetails['tax_amount'];
	  $aos_quotes_tax_amount_Final = "$".formatMoney($aos_quotes_tax_amount, true);
	  $text = str_replace("CalculatedTaxAmount", $aos_quotes_tax_amount_Final, $text);  
	  
	  
	  $aos_quotes_grand_total_nrc = "$".formatMoney(($service_subtotal_nrc + $product_subtotal_nrc) - $SummaryDetails['order_nrc_discont'], true);
	  $text = str_replace('aos_quotes_grand_total_nrc', $aos_quotes_grand_total_nrc, $text); */
	  
	  $aos_quotes_grand_total_nrc2 = ( (($service_subtotal_nrc + $product_subtotal_nrc) - $SummaryDetails['order_nrc_discont']) + $SummaryDetails['shipping_amount'] + $SummaryDetails['product_subtotal_lmd'] );
	  $grandtotal = "$".formatMoney($aos_quotes_grand_total_nrc2, true); 
	  $text = str_replace('aosQuotes_grand_total', $grandtotal, $text); 
 
 //}        
 
$data = "";
    $pos = strpos($template->description, "--Other Contacts--"); 
	if ($pos === false) 
	{ 
		//echo "The string '$findme' was not found in the string '$mystring'";  
    }
	else
	{
        // Was FOund 
		if( isset($totalCts) && is_array($totalCts) && !empty($totalCts) )
		{
		   $data .= '<table style="width: 100%; border: 1px solid black; border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">'; 
		      foreach($totalCts as  $key=>$val) {	
				   $opportunity_role_c = "";
				   if($val['opportunity_role_c'] != "")
				   {
							$opportunity_role_c = $val['opportunity_role_c'];
				   }
				   else
				   {
							$opportunity_role_c = "";
				   }
	       $data .= '<tr>
				<td style="width: 20%; height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($opportunity_role_c, 18, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['name'], 20, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['work'], 15, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['mobile'], 15, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['email'], 25, "<br />").'&nbsp;</span></td>
			</tr>';
		   }
		 $data .= '</table> <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="5">&nbsp;</td></tr></table>';
		 $text = str_replace('--Other Contacts--', $data, $text); 
	   }
	   else
	   {
	      $text = str_replace('--Other Contacts--', "<span style='font-size: x-small; text:align: center; color: red;'>There is not any records defined</span>", $text); 
	   }
    }

	$service_address_idArray = array();
$sql = "SELECT ln.*,sa.name service_address_name FROM aos_products_quotes ln LEFT JOIN nli_serviceaddresses sa ON sa.id =ln.service_address_id AND sa.deleted =0 WHERE ln.parent_type = 'AOS_Quotes' AND ln.parent_id = '".$SummaryDetails['id']."' AND ln.is_service = '0' AND ln.deleted = 0 ORDER BY ln.number ASC";
  $result = $this->bean->db->query($sql);	
	while ($row = $this->bean->db->fetchByAssoc($result)) {
	      $service_address_idArray[] = $row['service_address_id'];
	}

   $serviceAddressArray = array();	  
   foreach($service_address_idArray as $key=>$val) {
           $sql = "SELECT service_address_street, service_address_city, service_address_state, service_address_postalcode FROM nli_serviceaddresses WHERE id = '".$val."' and deleted = 0";
		   $result = $this->bean->db->query($sql);	
			while ($row = $this->bean->db->fetchByAssoc($result)) {
				 $tmpArray['service_address_street']     = $row['service_address_street'];
				 $tmpArray['service_address_city']       = $row['service_address_city'];
				 $tmpArray['service_address_state']      = $row['service_address_state'];
				 $tmpArray['service_address_postalcode'] = $row['service_address_postalcode'];
			} 
		$serviceAddressArray[] = $tmpArray;	
   } 
	
$data = "";
    $pos = strpos($template->description, "--Service Address--"); 
	if ($pos === false) 
	{ 
		//echo "The string '$findme' was not found in the string '$mystring'";  
    }
	else
	{
        // Was FOund 
		if( isset($serviceAddressArray) && is_array($serviceAddressArray) && !empty($serviceAddressArray) )
		{
		   $data .= '<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">'; 
		     $temp = 0;
		      foreach($serviceAddressArray as  $key=>$val) { 
	       $data .= '<tr>
				<td style="width: 20%; height: 12px;" valign="top"><span style="font-size: x-small;">Service Address '.$temp++.'</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['service_address_street'], 20, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px; padding-left:70px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['service_address_city'], 15, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px; padding-left:70px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['service_address_state'], 15, "<br />").'&nbsp;</span></td>
				<td style="width: 20%;height: 12px;" valign="top"><span style="font-size: x-small;">'.chunk_split($val['service_address_postalcode'], 25, "<br />").'&nbsp;</span></td>
			</tr>';
		   }
		 $data .= '</table> <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="5">&nbsp;</td></tr></table>';
		 $text = str_replace('--Service Address--', $data, $text); 
	   }
	   else
	   {
	      $text = str_replace('--Service Address--', "<span style='font-size: x-small; text:align: center; color: red;'>There is not any records defined</span>", $text); 
	   }
    }


// echo $text; die;
 
	$converted = templateParser::parse_template($text, $object_arr, $SummaryDetails, $totalCts);
    $converted =  html_entity_decode(str_replace('&nbsp;',' ',$converted));
	$header = templateParser::parse_template($header, $object_arr, $SummaryDetails, $totalCts);
	$footer = templateParser::parse_template($footer, $object_arr, $SummaryDetails, $totalCts);
 
   
	
	$printable = str_replace("\n","<br />",$converted);        
		
	if($task == 'pdf' || $task == 'emailpdf')
	{
	    // $file_name = $mod_strings['LBL_PDF_NAME']."_".str_replace(" ","_",$module->name).".pdf";
		$file_name = str_replace(" ","_",$module->name).".pdf";
		
		ob_clean();
		try{ 
			$pdf=new mPDF('en','A4','','DejaVuSans',15,15,16,16,8,8);
			$pdf->setAutoFont(); 
			$pdf->SetHTMLHeader($header); 
			$pdf->SetHTMLFooter($footer.'&nbsp; '); 
			//$pdf->SetHTMLFooter('<p style="text-align: center;">'.$quoteName."</p>");   Page No: {PAGENO}
			//echo $printable; die;
			$pdf->writeHTML($printable);
			
			if($task == 'pdf'){
				$pdf->Output($file_name, "D");
			}else{
				$fp = fopen('cache/upload/attachfile.pdf','wb');
				fclose($fp);
				$pdf->Output('cache/upload/attachfile.pdf','F');
				sendEmail::send_email($module,$module_type, '',$file_name, true);
			}
		}catch(mPDF_exception $e){
			echo $e;
		}
	}
	else if($task == 'email')
	{
		sendEmail::send_email($module,$module_type, $printable,'', false);
	}
?>
