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
		$updateID = $bean->id;  
		$opportunityID  = $bean->opportunity_id;
		$data = $bean->fetched_row;  
		
		//echo "<pre>";
		  //print_r($bean); 
		
		if($opportunityID != '')
		{
		    if($data['total_amount'] != '')
			 $opportTotalMRC = $data['total_amount'];
			else
			 $opportTotalMRC = 0.00;
			
            if($data['grand_total_nrc'] != '')			
			 $opportTotalNRC = $data['grand_total_nrc'];
			else
             $opportTotalNRC = 0.00;			
			 
			$opportTotalAmt = $opportTotalMRC + $opportTotalNRC; 
			  
			 $fetchProductids = "UPDATE opportunities SET amount = $opportTotalMRC, amount_nrc = $opportTotalNRC, total_amount = $opportTotalAmt WHERE id = '$opportunityID'";
			  $resultProIds = $db->query($fetchProductids);  
		}   // die;          
	 }
    
	 
 
}
?>