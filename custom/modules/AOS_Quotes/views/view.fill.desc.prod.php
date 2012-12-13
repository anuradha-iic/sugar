<?php    
class AOS_QuotesViewAjax { 
	  
	var $requestVars;
	var $counter;
	var $productID;
	var $host;
    var $user;
    var $pass;
    var $dname; 
		  
	function __construct($dbVars, $counter, $productID) {
        $this->requestVars   = $dbVars;
		$this->counter       = $counter;
		$this->productID     = $productID;
		
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
	
	function fetchProductDescByProdID($link)
	{   
	        $query = "SELECT * FROM aos_products WHERE id='".$this->productID."' AND deleted=0";
 
		   	 $result = mysql_query($query, $link);
			 while ($row = mysql_fetch_assoc($result)) { 
				 $description = $row['description']; 
			} 
			return $description;
	} 
	  
	function display(){   
		    $connect        = $this->mysqlConnect();
			$db_selected    = $this->mysqlselDB($connect);
			$description    = $this->fetchProductDescByProdID($connect);  
			echo $description;  
			$this->closeconn($connect);
	}  
} 

$ajaxObj = new AOS_QuotesViewAjax($_REQUEST['dbconfigVars'], $_REQUEST['counter'], $_REQUEST['productID']);
echo $ajaxObj->display();
?>
