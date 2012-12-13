<?php
class UpdateOpportQuotesClass
{
   function UpdateOpportunitiesQuotesMethodBeforeSave(&$bean, $event, $arguments)
	{  
	}

function UpdateOpportunitiesQuotesMethod(&$bean, $event, $arguments)
	{ 
	   echo "<pre>";
		   print_r($_REQUEST):
		   
		   die;
	 
		global $db;
		if ( ! isset($db) ) 
		 { 
			   $db = DBManagerFactory::getInstance(); 
		 } 
		 
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
 
}
?>