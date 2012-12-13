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
		        $query = "SELECT id, first_name, last_name FROM contacts WHERE id='".$val."' AND deleted=0"; 
				 $result = mysql_query($query, $link);
				 $arrayD = array();
				 while ($row = mysql_fetch_assoc($result)) { 
					 $arrayD['name'] = $row['first_name'].' '.$row['last_name']; 
					 $arrayD['id']   = $row['id']; 
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
			$displayData    = $this->displayData($contactDetails);
			echo $displayData; 
			 
			$this->closeconn($connect);
	} 
	
	function displayData($contactDetails)
	{
	    $totalcheckuncheck = $_REQUEST['totalcheckuncheck'];
		 
	    $data = "<table cellpadding='0' cellspacing='0' border='0' width='126%'><tr>
					       <td colspan='2' style='font-size: 12pt; font-weight: bold;' valign='top'>
						        Please unselect any contact that you don't need to relate. Otherwise it will also be saved with quote contact relation
						   </td>
					     </tr>";
	     foreach($contactDetails as $key=>$val)
		  {
		       $data .= "<tr>
					       <td colspan='2' style='font-size: 12pt; font-weight: bold;' valign='top'>
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
							  <td valign='top' style='width: 96%'>
							     ".$val['name']."
							  </td>
                         </tr>						 
			            ";
		  }
		$data .= "</table>||".count($contactDetails);  
		
		return $data;
	}
	
} 

$ajaxObj = new AOS_QuotesViewAjax($_REQUEST['dbconfigVars'], $_REQUEST['account_id']);
echo $ajaxObj->display();
?>
