<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description: This file is used to override the default Meta-data DetailView behavior
 * to provide customization specific to the Campaigns module.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

class OpportunitiesViewEdit extends ViewEdit {

 	function OpportunitiesViewEdit(){
 		parent::ViewEdit();
 		$this->useForSubpanel = true;
 	}
 	
 	function display() {
		global $app_list_strings;
		$json = getJSONobj();
		$prob_array = $json->encode($app_list_strings['sales_probability_dom']);
		$prePopProb = '';
 		if(empty($this->bean->id) && empty($_REQUEST['probability'])) {
		   $prePopProb = 'document.getElementsByName(\'sales_stage\')[0].onchange();';
		}
		
$probability_script=<<<EOQ
	<script>
	prob_array = $prob_array;
	document.getElementsByName('sales_stage')[0].onchange = function() {
			if(typeof(document.getElementsByName('sales_stage')[0].value) != "undefined" && prob_array[document.getElementsByName('sales_stage')[0].value]
			&& typeof(document.getElementsByName('probability')[0]) != "undefined"
			) {
				document.getElementsByName('probability')[0].value = prob_array[document.getElementsByName('sales_stage')[0].value];
				SUGAR.util.callOnChangeListers(document.getElementsByName('probability')[0]);

			} 
		};
	$prePopProb
	</script>
EOQ;
	    
	    $this->ss->assign('PROBABILITY_SCRIPT', $probability_script);    
 		parent::display();
		$this->displayJS();
 	}
	
	function getleadsAcctDetailsByID($leadID)
	{
	     global $db;
			if ( ! isset($db) ) 
			 { 
				   $db = DBManagerFactory::getInstance(); 
			 } 
		 $result = array();
		 
	     $fetchopportData = "SELECT account_id FROM leads WHERE id = '$leadID'"; 
		 $resultProIds = $db->query($fetchopportData);  
			while (($row2 = $db->fetchByAssoc($resultProIds)) != null) {
				  $account_id = $row2['account_id'];
			 } 
	     
         $fetchopportData2 = "SELECT name FROM accounts WHERE id = '$account_id'"; 
		 $resultProIds2 = $db->query($fetchopportData2);  
			while (($row3 = $db->fetchByAssoc($resultProIds2)) != null) {
				    $accountName = $row3['name'];
			 }	
		 
         $result['account_id']  = $account_id;
         $result['accountName'] = $accountName;		

         return $result;		 
	}

	function displayJS() {
	        
             if( isset($_REQUEST['lead_id']) and $_REQUEST['lead_id'] != '' )
                {
                      $lead_id = $_REQUEST['lead_id'];
					  $leadsDetails = $this->getleadsAcctDetailsByID($lead_id);
					  
					  $account_id  = $leadsDetails['account_id'];
					  $accountName = $leadsDetails['accountName']; 
                }
			 else
                {
                      $lead_id = "";
					  $account_id  = "";
					  $accountName = "";
                }				
	
			echo '<script type="text/javascript"> var filter=/^[0-9]+$/; 
                        var lead_id     = "'.$lead_id.'";
						var account_id  = "'.$account_id.'";
						var accountName = "'.$accountName.'";
						
			            var today = "'.date("m/d/Y").'";
			             document.getElementById("date_closed").value = today; 
					
						 ';
			echo '$(document).ready(function() {  
					   if( $("#amount").val() == "" )
					     {
			                 $("#amount").val(0.00);
					     }
					   if( $("#amount_nrc").val() == "" )
					     {
			                 $("#amount_nrc").val(0.00);
					     }	 
			           if( $("#total_amount").val() == "" )
					     {
			                 $("#total_amount").val(0.00);
					     } 
						 
					  if(lead_id != "")
					  { 
						    $("input[id=account_name]").val(accountName); 
							$("#account_id").val(account_id); 
					  } 
			         var mrc = $("#amount").val();
					 var nrc = $("#amount_nrc").val(); 
					 
					 mrc = mrc.replace(",",""); 
					 nrc = nrc.replace(",","");
					 
					 $("#amount").val(mrc);
					 $("#amount_nrc").val(nrc); 
					 
                     var rc_total = parseFloat(mrc) + parseFloat(nrc);					 
					 //var rc_total = parseInt(mrc) + parseInt(nrc);
					 $("#total_amount").val(rc_total); 
			}); '; 
			echo ' document.getElementById("total_amount").setAttribute("readonly", "readonly");';
			echo ' getCountRC(); 
				   function intOnly(i)
					{
						if(i.value.length>0)
						{   
						        // i.value = i.value.replace(/[^.\d]+/g, ""); 								 
								if(isNaN(i.value)){
									 i.value = i.value.replace(/[^0-9\.]/g,"");
									 if(i.value.split(".").length>2) 
										 i.value =i.value.replace(/\.+$/,"");
								}  
						}
					}
				 ';
			echo ' document.getElementById("amount").setAttribute("onblur", "getCountRC()");';
			echo ' document.getElementById("amount_nrc").setAttribute("onblur", "getCountRC()");
			
			       document.getElementById("amount").setAttribute("onkeyPress", "intOnly(this)");  
			       document.getElementById("amount").setAttribute("onkeyup", "intOnly(this)");
				   document.getElementById("amount").setAttribute("onkeydown", "intOnly(this)");
				   
				   document.getElementById("amount_nrc").setAttribute("onkeyPress", "intOnly(this)");  
			       document.getElementById("amount_nrc").setAttribute("onkeyup", "intOnly(this)");
				   document.getElementById("amount_nrc").setAttribute("onkeydown", "intOnly(this)");
			';
			echo ' function getCountRC() {  ';
			echo ' var mrc = document.getElementById("amount").value;';
			echo ' var nrc = document.getElementById("amount_nrc").value;
			
			        if( $("#amount").val() == "" )
					 {
						 document.getElementById("amount").value = 0.00;
					 }
				    if( $("#amount_nrc").val() == "" )
					 {
						 document.getElementById("amount_nrc").value = 0.00;
					 }	 					
			 
			         mrc = mrc.replace(",",""); 
					 nrc = nrc.replace(",","");
					 
					if( ($("#amount").val() != "") && ($("#amount_nrc").val() == "0") )
					{
					     var rc_total = parseFloat(mrc) + parseFloat(0.00);
						 document.getElementById("total_amount").value = rc_total;
					}
					else if( ($("#amount").val() == "0") && ($("#amount_nrc").val() != "") )
					{
					     var rc_total = parseFloat(0.00) + parseFloat(nrc);
						 document.getElementById("total_amount").value = rc_total;
					}
					else if( ($("#amount").val() == "0") && ($("#amount_nrc").val() == "0") )
					{
					     var rc_total = parseFloat(0.00) + parseFloat(0.00);
						 document.getElementById("total_amount").value = rc_total;
					}
					else if( ($("#amount").val() != "") && ($("#amount_nrc").val() != "") )
					{
					     var rc_total = parseFloat(mrc) + parseFloat(nrc);
						 document.getElementById("total_amount").value = rc_total;
					}
					 
			'; 
			echo ' } ';
			echo '</script>';
 	}
}
?>