<?php    
class AOS_QuotesViewAjax { 
	  
	var $requestVars;
	var $accountID;
	var $host;
    var $user;
    var $pass;
    var $dname; 
		  
	function __construct($dbVars, $accountID) {
        $this->requestVars = $dbVars;
		$this->accountID   = $accountID;
		
		$DrequestVars = $this->requestVars;
		$resultData = explode(";", $DrequestVars);
		
	      $this->host  = $resultData[0];
		  $this->user  = $resultData[1];
		  $this->pass  = $resultData[2];
		  $this->dname = $resultData[3]; 
	}  
 
    function mysqlConnect()
	{  
	    $link = mysql_connect($this->host, $this->user, $this->pass);
		if (!$link) {
			//die('Could not connect: ' . mysql_error());
			$result = "";
		}
		else {
            $result = $link;
        } 
		return $result;
	}
	
	function mysqlselDB($link)
	{
	    $db_selected = mysql_select_db($this->dname, $link);
		return $db_selected;
	}
	
	function closeconn($link)
	{ 
	    mysql_close($link);
	} 
	
	function fetchContactIdsByAccountID($link)
	{   
	        $query = "SELECT * FROM accounts_contacts WHERE account_id='".$this->accountID."' AND deleted=0";
 
		   	 $result = mysql_query($query, $link);
			 while ($row = mysql_fetch_assoc($result)) { 
				 $contact_id[] = $row['contact_id']; 
			} 
			return $contact_id;
	}
	
	function fetchContactDetailsByContactID($link, $contactIDs)
	{   
	      foreach($contactIDs as $key=>$val)
		  {
		        $query = "SELECT ctc.id, ctc.first_name, ctc.last_name, ctc.phone_work, ctc.phone_mobile, ctcst.opportunity_role_c, ctcst.contact_type_primary_billing_c, ctcst.contact_type_other_billing_c, ctcst.contact_type_primary_tech_c, ctcst.contact_type_additional_tech_c, ctcst.contact_type_other_c FROM contacts as ctc INNER JOIN contacts_cstm as ctcst ON ctc.id = ctcst.id_c WHERE ctc.id='".$val."' AND ctc.deleted=0"; 
				 $result = mysql_query($query, $link);
				 $arrayD = array();
				 while ($row = mysql_fetch_assoc($result)) { 
					 $arrayD['name']          = $row['first_name'].' '.$row['last_name']; 
					 $arrayD['id']            = $row['id']; 
					 $arrayD['phone_work']    = $row['phone_work'];
			         $arrayD['phone_mobile']  = $row['phone_mobile'];
					 $arrayD['opportunity_role_c'] = $row['opportunity_role_c'];
					 
					 $arrayD['role'] = "";
				 if($row['contact_type_primary_billing_c'] == 1)
				 {
					  $arrayD['role'] .= "Primary Billing, ";
				 }
				 else
				 {
					  $arrayD['role'] .= "";
				 }
				 
				 if($row['contact_type_other_billing_c'] == 1)
				 {
					  $arrayD['role'] .= "Additional Billing, ";
				 }
				 else
				 {
					  $arrayD['role'] .= "";
				 }
				 
				 if($row['contact_type_primary_tech_c'] == 1)
				 {
					  $arrayD['role'] .= "Primary Technical, ";
				 }
				 else
				 {
					  $arrayD['role'] .= "";
				 }
				 
				 if($row['contact_type_additional_tech_c'] == 1)
				 {
					  $arrayD['role'] .= "Additional Technical, ";
				 }
				 else
				 {
					  $arrayD['role'] .= "";
				 }
				 
				 if($row['contact_type_other_c'] == 1)
				 {
					  $arrayD['role'] .= "Others, ";
				 }
				 else
				 {
					  $arrayD['role'] .= "";
				 }
					 
					 $Q2 = "SELECT email.email_address FROM email_addr_bean_rel as email_rel INNER JOIN email_addresses as email ON email_rel.email_address_id = email.id WHERE email_rel.bean_id = '".$row['id']."' and email_rel.bean_module = 'Contacts' and email_rel.deleted = 0 and email.deleted = 0";
					 $result2 = mysql_query($Q2, $link); 
						while ($row2 = mysql_fetch_assoc($result2)) {
								$emailAddr = $row2['email_address'];
						 } 
					 $arrayD['email'] = $emailAddr;
					 
					 $lenfind = substr($arrayD['role'], 0, strlen($arrayD['role'])-2);
			         $arrayD['role'] = $lenfind; 
				 } 
			  $contacts[] = $arrayD;	 
		  }  
		return $contacts;
	}
	 
	function display(){   
		    $connect        = $this->mysqlConnect();
			$db_selected    = $this->mysqlselDB($connect);
			$contactIDs     = $this->fetchContactIdsByAccountID($connect);
			$contactDetails = $this->fetchContactDetailsByContactID($connect, $contactIDs);
			$displayData    = $this->displayData($connect, $contactDetails);
			echo $displayData; 
			 
			$this->closeconn($connect);
	} 
	
	function displayData($link, $contactDetails)
	{  
       // $totalcheckuncheck = '';
		
		if($_REQUEST['totalcheckuncheck'] != '')
		{
		    $totalcheckuncheck = $_REQUEST['totalcheckuncheck'];
		}
		
		if( $totalcheckuncheck == '' )
		{     
		     $Q2 = "SELECT * FROM quotes_saved_contacts_IDs WHERE quotes_id = '".$_REQUEST['quotesID4Ajax']."' ";
					 $result2 = mysql_query($Q2, $link); 
						while ($row2 = mysql_fetch_assoc($result2)) {
								$contact_ids = $row2['contact_ids'];
						 }
			 $totalcheckuncheck = $contact_ids;		 		 
		}
		else
		{
		    $totalcheckuncheck = $_REQUEST['totalcheckuncheck'];
		}
		  //echo $totalcheckuncheck."<br>";
	    $data = "<table cellpadding='0' cellspacing='0' border='0' width='126%'><tr><td colspan='5' style='font-size: 12pt; font-weight: bold;' valign='top'>Please Select the Contacts to show on the SOF template. Otherwise it will also be saved with quote contact relation</td></tr> <tr> <td colspan='5' style='font-size: 12pt; font-weight: bold;' valign='top'>&nbsp;</td></tr> <tr> <th style='text-align: left;'>&nbsp;</th> <th style='text-align: left;'>Role</th> <th style='text-align: left;'>Name</th> <th style='text-align: left;'>Work</th> <th style='text-align: left;'>Mobile</th> <th style='text-align: left;'>Email</th> </tr>";
		$checkforContacts = "";
		
	 if(count($contactDetails) > 0)  {	
          $checkforContacts = "yes";	 
	     foreach($contactDetails as $key=>$val)
		  { 
		       $opportunity_role_c = "";
						   if($val['role'] != "")
						   {
									$opportunity_role_c = $val['role'];
						   }
						   else
						   {
									$opportunity_role_c = "";
						   }
		       $data .= "<tr>
					       <td colspan='5' style='font-size: 12pt; font-weight: bold;' valign='top'>
						        &nbsp;
						   </td>
					     </tr>
			             <tr>
			                  <td valign='top' style='width: 4%'>"; 
                                  $pos = strpos($totalcheckuncheck, $val['id']);  
								if ($pos === false) {
									  $data .= "<input type='checkbox' checked='checked' onclick='checkfor(this);' name='contactsdisplay_".$key."' id='contactsdisplay_".$key."' value='".$val['id']."'> ";
								} else {
									  $data .= "<input type='checkbox' onclick='checkfor1(this);' name='contactsdisplay_".$key."' id='contactsdisplay_".$key."' value='".$val['id']."'> ";
								}	 
			   $data .= "     </td>
			                  <td valign='top' style='width: 14%'>".chunk_split($opportunity_role_c, 18, '<br />')."</td>
							  <td valign='top' style='width: 14%'> <a href='http://sugarcrm-dev.nextlevelinternet.com/index.php?module=Contacts&return_module=Contacts&action=EditView&record=".$val['id']."'>
							     ".$val['name']." </a>
							  </td>
							  <td valign='top' style='width: 14%'>
							     ".$val['phone_work']."
							  </td>
							  <td valign='top' style='width: 14%'>
							     ".$val['phone_mobile']."
							  </td>
							  <td valign='top' style='width: 40%'>
							     ".$val['email']."
							  </td>
                         </tr>						 
			            ";
		  }
	 }
     else
     {
	      $checkforContacts = "no";
          $data .= "<tr>
					   <td colspan='5' style='font-size: 12pt; font-weight: bold; color: red;' valign='top'>
							 Currently there is not any contacts for selected Account
					   </td>
				   </tr>";
     }	 
		$data .= "</table>||".count($contactDetails)."||".$checkforContacts;  
		
		return $data;
	}
	
} 

$ajaxObj = new AOS_QuotesViewAjax($_REQUEST['dbconfigVars'], $_REQUEST['account_id']);
echo $ajaxObj->display();
?>
