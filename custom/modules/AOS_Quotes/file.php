<?php
class UpdateOpportQuotesClass
{
function UpdateOpportunitiesQuotesMethod(&$bean, $event, $arguments)
	{  
		global $db;
		if ( ! isset($db) ) 
		 { 
			   $db = DBManagerFactory::getInstance(); 
		 }  
		 
		$quotes_product_descriptionArr = $_REQUEST['quotes_product_description']; 
		   
		$updateID = $_REQUEST['record'];   
        $opportID = $_REQUEST['opportunity_id']; 
		
		$data = $bean->fetched_row;
		
		$grand_total_nrc = str_replace(",","",$_REQUEST['grand_total_nrc']);
		$grand_total_mrc = str_replace(",","",$_REQUEST['total_amount']);
		
	    $grand_total_nrc = number_format(floatval($grand_total_nrc), 2); 
		$grand_total_mrc    = number_format(floatval($grand_total_mrc), 2); 
		    $grand_total_nrc = str_replace(",","",$_REQUEST['grand_total_nrc']);
			$grand_total_mrc = str_replace(",","",$_REQUEST['total_amount']);
			
		$total_amt = number_format($grand_total_nrc + $grand_total_mrc, 2);
		$total_amt = str_replace(",","",$total_amt);
		
       $fetchProductids = "UPDATE opportunities SET amount = $grand_total_mrc, amount_nrc = $grand_total_nrc, total_amount = $total_amt WHERE id = '$opportID'";
		//die;
		
		$db->query($fetchProductids); 	

        $selContacts = $_REQUEST['selectedAccountContacts'];
		$totalcheckuncheck = $_REQUEST['totalcheckuncheck']; 
		$contactsArray = explode(",", $selContacts); 
		$quotes_ID = $bean->id;
		 
		if($totalcheckuncheck != '')
		{
		            $Qry = "SELECT count(*) as total FROM quotes_saved_contacts_IDs WHERE quotes_id = '".$quotes_ID."'";
					$resultQry = $db->query($Qry); 
				 
					while (($row2 = $db->fetchByAssoc($resultQry)) != null) {
						 $checkforexistence =  $row2['total'];
					}
				 	 
			if( isset($checkforexistence) and $checkforexistence > 0 )
             {	
			    $QA = "UPDATE quotes_saved_contacts_IDs SET contact_ids = '".$totalcheckuncheck."' WHERE quotes_id = '".$quotes_ID."' "; 
				$db->query($QA);  
             }
            else
             {			
				$QA = "INSERT INTO quotes_saved_contacts_IDs (quotes_id, contact_ids) VALUES ('".$quotes_ID."', '".$totalcheckuncheck."')"; 
				$db->query($QA); 
			 }
             			 
        }
	     
		
        foreach($contactsArray as $key=> $val){
		      if($val != "")
			   { 
			       $Q2 = "DELETE FROM quotes_saved_contacts WHERE quotes_id = '".$quotes_ID."'";  
					$db->query($Q2);  
			   }		
		} 		
		
		foreach($contactsArray as $key=> $val){
		      if($val != "")
			   { 
				     $Q2 = "INSERT INTO quotes_saved_contacts (quotes_id, contacts_id) VALUES ('".$quotes_ID."', '".$val."')"; 
					  $db->query($Q2); 
			   }		
		}   
		  
        foreach($quotes_product_descriptionArr as $key=>$val)
        {	
              $number = $key+1;		
              $Q2 = "UPDATE aos_products_quotes SET quotes_product_description_c = '".$val."' WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$quotes_ID."' AND number = '".$number."' AND is_service = '0' AND deleted = 0";  
			  $db->query($Q2);
        }		 
	 }
    
	
	function checkOppertunityAccountmgr($id) {
        global $db;
		if ( ! isset($db) ) 
		 { 
			   $db = DBManagerFactory::getInstance(); 
		 } 
		$fetchProductids = "SELECT b.assigned_user_id, c.account_id FROM `quotes_opportunities` as a left join opportunities as b on (a.opportunity_id = b.id) left join accounts_opportunities as c on (c.opportunity_id = b.id) where (c.account_id IS NOT NULL) and a.quote_id ='".$updateID."'";
					$resultProIds = $db->query($fetchProductids); 
					$name = '';
					while (($row2 = $db->fetchByAssoc($resultProIds)) != null) {
						 $name =  $row2[account_id].'-'.$row2[assigned_user_id];
					}
		return $name;
	}
	
	function saveQuoteWebaddress(&$bean, $event, $arguments)
	{
		global $sugar_config;
		$quoteId = $bean->id;
		$module_name=$bean->module_name;
		
		
		//$bean->quote_webaddress_c=$sugar_config['site_url']."webGathering/index.php?record=$quoteId";
		$url = $sugar_config['site_url'];
		//echo "<a href=".$url."webGathering/index.php?record=$quoteId>".$url."webGathering/index.php?record=$quoteId</a>";
		$bean->quote_webaddress_c="<a href=".$url."quoteAccept.php?module=$module_name&record=$quoteId>".$url."quoteAccept.php?module=$module_name&record=$quoteId</a>";
		$bean->save();
	}
	
 
}
?>