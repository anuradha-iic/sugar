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
		
		//$updateID = $bean->id;  
		  echo "<pre>";
		      print_r($bean); //die;
           
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