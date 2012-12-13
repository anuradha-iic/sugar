<?php 
//if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
define("sugarEntry",TRUE);
include("include/entryPoint.php");
error_reporting(0);
//require_once 'config.php'; 
require_once 'webGathering/CallWebServiceSugarSoap.php'; 
require_once('modules/AOS_PDF_Templates/templateParser.php');

require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');

global $mod_strings;
global $db;
	if ( ! isset($db) ) { 
		   $db = DBManagerFactory::getInstance(); 
	 } 
?>

<html>
<title>Quote Acceptance</title>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<!--<script type="text/javascript" src="http://fbug.googlecode.com/svn/lite/branches/firebug1.4/content/firebug-lite-dev.js"></script>-->
<script type="text/javascript">
function checkings()
{	
	if((document.getElementById("accept1").checked==false))
	{
		alert ('Please select checkboxes to accept Quote.');
    	return false;
	}
	else if(document.getElementById("accept2").checked==false){
		alert ('Please select checkboxes to accept Quote.');
    	return false;
	}
	/*else{
		return true;
	}*/
}
</script>
</head>
<?php 
if( isset($_REQUEST['record']) && $_REQUEST['record'] != '' )
{
	$record = $_REQUEST['record'];
	$module_type = $_REQUEST['module'];
	
	$module = new $module_type();
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
//print_r($resultArray);

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
 
 $SummaryDetails=array();
 
 foreach($quote_data as $key => $val) { 	
 	$SummaryDetails[$val->name]=$val->value;	
 }
 
   //$templates = explode('^,^',trim($SummaryDetails['template_ddown_c'])); 		
//echo $SummaryDetails['template_ddown_c'].'<br>';
     $templateId = str_replace('^','',$SummaryDetails['template_ddown_c']);
//echo $templateId.'<br>';
 
 	$opportunity_idVal = $SummaryDetails['opportunity_id'];	
	$quote_idVal       = $SummaryDetails['id'];	
	$quoteName      = $SummaryDetails['name'];
	
	$object_arr = array();
	
	$object_arr[$module_type] = $SummaryDetails['id'];
	
	$object_arr['Accounts'] = $SummaryDetails['billing_account_id'];	
	$object_arr['Contacts'] = $SummaryDetails['billing_contact_id'];
	$object_arr['Users']    = $SummaryDetails['assigned_user_id'];
	
// print_r($SummaryDetails);

 
	$fetchAdminCheckQuery = "SELECT * FROM opportunities_contacts WHERE opportunity_id = '$opportunity_idVal' and deleted = 0";
	$resultAdCheck = $db->query($fetchAdminCheckQuery); 
	while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {
			//  echo "<pre>"; print_r($row2);
			  $totalContacts[] = $row2['contact_id'];
	 }
	 
	 $Q1 = "SELECT qsc.contacts_id, ct.salutation, ct.id, ct.first_name, ct.last_name, ct.phone_work, ct.phone_mobile, ctcst.contact_type_primary_billing_c, ctcst.contact_type_other_billing_c, ctcst.contact_type_primary_tech_c, ctcst.contact_type_additional_tech_c, ctcst.contact_type_other_c, ctcst.contacttype_c, ctcst.opportunity_role_c FROM quotes_saved_contacts as qsc INNER JOIN contacts as ct ON qsc.contacts_id = ct.id INNER JOIN contacts_cstm as ctcst ON ct.id = ctcst.id_c WHERE qsc.quotes_id = '".$record."' and ct.deleted = 0 ORDER BY ct.first_name, ct.last_name desc";		 
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
	
 /**
  * start
  */
 
 
 $search = array ('@<script[^>]*?>.*?</script>@si', 		// Strip out javascript
					'@<[\/\!]*?[^<>]*?>@si',		// Strip out HTML tags
					'@([\r\n])[\s]+@',			// Strip out white space
					'@&(quot|#34);@i',			// Replace HTML entities '/\[(.*?)\]/',	
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
					 '',
					 chr(161),
					 'chr(\1)',									
					 '<br>'
					 
		);
		
	
	$module_type_low=strtolower($_REQUEST['module']);
	
	//product line items start
	$lineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$_REQUEST['module']."' AND parent_id = '".$record."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
	$res = $db->query($sql);
	while($row = $db->fetchByAssoc($res)){
		$lineItems[$row['id']] = $row['product_id'];
	} 
	//end
	
	//service Line Items array start
	$serviceLineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$_REQUEST['module']."' AND parent_id = '".$record."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
	$res = $db->query($sql);
	while($row = $db->fetchByAssoc($res)){
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
	
 $contacts_locations = '<p></p>
<table style="border: 1pt none currentcolor; width: 100%; border-spacing: 0pt; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="2"><tbody>
<tr><td style="text-align: center; height: 10px; background-color: #0001f9;" colspan="5"><span style="font-size: 11px; color: #ffffff;"> <strong>CUSTOMER CONTACT INFORMATION</strong> </span></td>
</tr>';
 $data = "";
    
		if( isset($totalCts) && is_array($totalCts) && !empty($totalCts) )
		{  
		   $data .= '<tr>
<td style="border-style: solid; border-width: 1px; text-align: left; width: 20%;" valign="top"><span style="font-size: 11px;"><strong>Role(s)</strong></span></td>
<td style="border-style: solid; border-width: 1px; text-align: left; width: 25%;" valign="top"><span style="font-size: 11px;"><strong>Name</strong></span></td>
<td style="border-style: solid; border-width: 1px; text-align: left; width: 25%;" valign="top"><span style="font-size: 11px;"><strong>Phone</strong></span></td> 
<td style="border-style: solid; border-width: 1px; text-align: left; width: 30%;" valign="top"><span style="font-size: 11px;"><strong>Email</strong></span></td>
</tr>'; 
		      foreach($totalCts as  $key=>$val) {	
				   $contacttype = "";
				   if($val['role'] != "")
				   {
							$contacttype = $val['role'];
				   }
				   else
				   {
							$contacttype = "";
				   }
	       $data .= '<tr>
				<td style="width: 20%; height: 12px; border: 1px solid black; border-collapse: collapse;" padding: 2px 2px; valign="top"><span style="font-size: 11px;">'.$contacttype.'</span></td>
				<td style="width: 25%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['name'].'</span></td>
				<td style="width: 25%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.'<b>Work:</b> '.$val['work'].' <b>Mobile:</b> '.$val['mobile'].'</span></td> 
				<td style="width: 30%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['email'].'</span></td>
			</tr>';
		   }
		 $data .= '<tr><td colspan="5"></td></tr></tbody></table>'; 
	   }
	   else
	   {
	      $data .= "<tr><td colspan='5'><span style='font-size: 11px; text:align: center; color: red;'>There is not any records defined</span></td></tr></tbody></table>"; 
	   }
	    $contacts_locations .= $data;
  $contacts_locations .= '<p></p>
 <table style="border: 1pt none currentcolor; width: 100%; border-spacing: 0pt; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="2"><tbody>
 <tr><td style="text-align: center; height: 10px; background-color: #0001f9;" colspan="5"><span style="font-size: 11px; color: #ffffff;"><strong>CUSTOMER LOCATION INFORMATION</strong></span></td>
 </tr>';
 
 $service_address_idArray = array();
$sql = "SELECT ln.*,sa.name service_address_name FROM aos_products_quotes ln LEFT JOIN nli_serviceaddresses sa ON sa.id =ln.service_address_id AND sa.deleted =0 WHERE ln.parent_type = 'AOS_Quotes' AND ln.parent_id = '".$SummaryDetails['id']."' AND ln.is_service = '0' AND ln.deleted = 0 ORDER BY ln.number ASC";
  $result = $db->query($sql);	
	while ($row = $db->fetchByAssoc($result)) {
	      $service_address_idArray[] = $row['service_address_id'];
	}
	 $serviceAddressArray = array();	  
   foreach($service_address_idArray as $key=>$val) {
           $sql = "SELECT id, name, service_address_street, service_address_city, service_address_state, service_address_postalcode FROM nli_serviceaddresses WHERE id = '".$val."' and deleted = 0";
		   $result = $db->query($sql);	
			while ($row = $db->fetchByAssoc($result)) {  
				 $tmpArray['id']     = $row['id'];	
                 $tmpArray['name']     = $row['name'];					 
				 $tmpArray['service_address_street']     = $row['service_address_street'];
				 $tmpArray['service_address_city']       = $row['service_address_city'];
				 $tmpArray['service_address_state']      = $row['service_address_state'];
				 $tmpArray['service_address_postalcode'] = $row['service_address_postalcode'];
			} 
		$serviceAddressArray[] = $tmpArray;	
   }
       
   $finalserviceAddressArray = array();
   $tmpctr = "";	
   foreach($serviceAddressArray as $key=>$val)
   {
        if($tmpctr != $val['id'])
        {
              $finalserviceAddressArray[] = $val;
			  $tmpctr = $val['id'];	
        }	
        else
        {  }		
   }
     
$data = "";
   
		if( isset($finalserviceAddressArray) && is_array($finalserviceAddressArray) && !empty($finalserviceAddressArray) )
		{
		   $data .= '<tr>
			<td style="border-style: solid; border-width: 1px; text-align: left; width: 25%;"><span style="font-size: 11px;"><strong>Name</strong></span></td>
			<td style="border-style: solid; border-width: 1px; text-align: left; width: 40%;"><span style="font-size: 11px;"><strong>Street</strong></span></td>
			<td style="border-style: solid; border-width: 1px; text-align: left; width: 15%;"><span style="font-size: 11px;"><strong>City</strong></span></td>
			<td style="border-style: solid; border-width: 1px; text-align: left; width: 10%;"><span style="font-size: 11px;"><strong>State</strong></span></td> 
			<td style="border-style: solid; border-width: 1px; text-align: left; width: 10%;"><span style="font-size: 11px;"><strong>Zip</strong></span></td> 
			</tr>'; 
		     $temp = 0;
	 if($SummaryDetails['shipping_address_street'] != '' and $SummaryDetails['shipping_address_city']!= '' and $SummaryDetails['shipping_address_state'] != '' and $SummaryDetails['shipping_address_postalcode'] != '')
     {	 
	     $data .= '<tr>
				<td style="width: 25%; height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">Shipping Address</span></td>
				<td style="width: 40%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['shipping_address_street'].'</span></td>
				<td style="width: 15%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['shipping_address_city'].'</span></td>
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['shipping_address_state'].'</span></td> 
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['shipping_address_postalcode'].'</span></td>
				</tr>';	
      }
     
	 if($SummaryDetails['billing_address_street'] != '' and $SummaryDetails['billing_address_city']!= '' and $SummaryDetails['billing_address_state'] != '' and $SummaryDetails['billing_address_postalcode'] != '')
      {
		$data .= '<tr>
				<td style="width: 25%; height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">Billing Address</span></td>
				<td style="width: 40%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['billing_address_street'].'</span></td>
				<td style="width: 15%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['billing_address_city'].'</span></td>
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['billing_address_state'].'</span></td> 
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$SummaryDetails['billing_address_postalcode'].'</span></td>
				</tr>';		 
	  }	 
		      foreach($finalserviceAddressArray as  $key=>$val) { 
	       $data .= '<tr> 
				<td style="width: 25%; height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['name'].'</span></td>
				<td style="width: 40%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['service_address_street'].'</span></td>
				<td style="width: 15%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['service_address_city'].'</span></td>
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['service_address_state'].'</span></td>  
				<td style="width: 10%;height: 12px; border: 1px solid black; border-collapse: collapse; padding: 2px 2px;" valign="top"><span style="font-size: 11px;">'.$val['service_address_postalcode'].'</span></td> 
			</tr>';
		   }
		 $data .= '<tr><td colspan="5"></td></tr>'; 
	   }
	   else
	   {
	      //$text = str_replace('--Service Address--', "<span style='font-size: 11px; text:align: center; color: red;'>There is not any records defined</span>", $text); 
		  $data .= "";
	   } 
    $contacts_locations .= $data;
	$contacts_locations .= '</tbody></table>';
	
   
	$template = new AOS_PDF_Templates();
	$template->retrieve($templateId);
	
		//get PDF Template Header,Body,Footer
		//$pdfTemplateArray = $soapclient->get_entry($session_id, 'AOS_PDF_Templates', $templateId);
		//print_r($pdfTemplateArray);
		
		//$pdf_template_data = $pdfTemplateArray->entry_list[0]->name_value_list;
		//print_r($pdf_template_data);
		//die;
		
	//foreach($pdf_template_data as $temp_val) {
			
		//if($temp_val->name=='pdfheader')
		//{
			//echo html_entity_decode(str_replace('',' ',$temp_val->value));
			//echo '<br/><h1>header</h1>'; 
			$header = preg_replace($search, $replace,  $template->pdfheader); 
			echo $header = templateParser::parse_template($header, $object_arr, $SummaryDetails, $totalCts);				
		//}
		
		//if($temp_val->name=='description')
		//{
			//echo html_entity_decode(str_replace('',' ',$temp_val->value));
			//echo '<br/><h1>body</h1>';
			$text   = preg_replace($search, $replace, $template->description);
			
			$text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text );
			$text = preg_replace('/x-small/i',"11px",$text);
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
		 
		if($firstValue !== '' && $lastValue !== ''){
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
			
			$service_subtotal_nrc = $SummaryDetails['service_subtotal_nrc'];
			$product_subtotal_nrc = $SummaryDetails['product_subtotal_nrc'];
			
			$build_field = "$".formatMoney($service_subtotal_nrc + $product_subtotal_nrc, true);
			$text = str_replace("BUILD FIELD", $build_field, $text);
			
			$aos_quotes_grand_total_nrc2 = ( (($service_subtotal_nrc + $product_subtotal_nrc) - $SummaryDetails['order_nrc_discont']) + $SummaryDetails['shipping_amount'] + $SummaryDetails['product_subtotal_lmd'] );
			$grandtotal = "$".formatMoney($aos_quotes_grand_total_nrc2, true); 
			$text = str_replace('aosQuotes_grand_total', $grandtotal, $text);


			$text = str_replace('--Other Customer Locations Contacts--', $contacts_locations, $text);

			$converted = templateParser::parse_template($text, $object_arr, $SummaryDetails, $totalCts);
			echo $converted =  html_entity_decode(str_replace('&nbsp;','',$converted)); 
			
			
		//}//desc=body if end &#194;
		
		//if($temp_val->name=='pdffooter')
		//{
			//echo html_entity_decode(str_replace('&nbsp;',' ',$temp_val->value));
			//echo '<br/><h1>footer</h1>';	
			$footer = preg_replace($search, $replace, $template->description);				
			echo $footer = templateParser::parse_template($footer, $object_arr, $SummaryDetails, $totalCts);
		//}
						
	//}
	?>
<form name="quote_online" method="post" action="thankyou.php" onSubmit="return checkings();">
 <input type="checkbox" name="accept_terms" id="accept1" />Accept Terms and Conditions
 <input type="checkbox" name="agreement" id="accept2" />Agreement on Quotation
 <input type="hidden" name="record" value="<?php echo $record; ?>" readonly />
 <br>
 <input type="submit" name="submit" value="Submit">
 </form>
<?php
}
else{
	die('Error retrieving record. This record may be deleted or you may not be authorized to view it.');
}
?> 
</html>