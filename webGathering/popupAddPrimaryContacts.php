<?php ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Primary Contact....</title>
<link rel="stylesheet" href="styles/style.css" type="text/css">
<?php session_start(); ?>
</head> 
<body>  
<?php
    if( isset($_REQUEST['IDVal']) and $_REQUEST['IDVal'] != '')
    {
         $IDval = $_REQUEST['IDVal'];
    }
    else
    {
         $IDval = "";
    }
    if( isset($_REQUEST['ID']) and $_REQUEST['ID'] != '')
    {
         $ID = $_REQUEST['ID'];
    }
    else
    {
         $ID = "";
    }
    if( isset($_REQUEST['search']) and $_REQUEST['search'] != '')
    {
         $search = $_REQUEST['search'];
    }
    else
    {
         $search = "";
    }
?>
<script language="Javascript"> 
function send_back(module,id,value) { // opener.document.formname.fieldname.value
    opener.document.getElementById('<?php echo $IDval; ?>').value = value; 
    opener.document.getElementById('<?php echo $ID; ?>').value = id; 
    window.close();
}

function checkform(formObj)
{
     var search = escape(formObj.first_name_advanced.value+';'+formObj.last_name_advanced.value+';'+formObj.account_name_advanced.value+';'+formObj.title_advanced.value+';'+formObj.email_advanced.value);  
	 
     formObj.action = "popupAddPrimaryContacts.php?search="+search+"&IDVal=<?php echo $IDval; ?>&ID=<?php echo $ID; ?>";
     formObj.submit();
}
</script>
<?php require_once 'config.php'; require_once 'includePHPFun.php'; require_once 'CallWebServiceSugarSoap.php'; 
$soapclientObj = new CallWebServiceSugarSoap();
$soapclient = $soapclientObj->getsoapclientObj(); 
$soapclientObj->loginInsugar(); 
$session_id = $soapclientObj->getsessionID();
$user_guid = $soapclientObj->getuser_guid();
$totalrecPerPage = 20;

if(isset($_REQUEST['start']) and $_REQUEST['start']!= '' and $_REQUEST['start'] > 0)
{
    $start = $_REQUEST['start'];  
    $totalrecPerPage = $totalrecPerPage + 20;
}
else
{ 
    $start = 0;
    $totalrecPerPage = 20;
} 

if($search == "")
{
    $result = $soapclientObj->get_entry_list('Contacts', $totalrecPerPage);   
	
	$_SESSION['first_name'] = '';
	$_SESSION['last_name'] = '';
	$_SESSION['account_name'] = '';
	$_SESSION['title'] = '';
	$_SESSION['email'] = ''; ?>
	<script language="Javascript">
	   function clearsearchfields(formID)
		  {
			 var fomObj = document.getElementById(formID);
			 fomObj.first_name_advanced.value = "";
			 fomObj.last_name_advanced.value = "";
			 fomObj.account_name_advanced.value = "";
			 fomObj.title_advanced.value = "";
			 fomObj.email_advanced.value = ""; 
		  }
	</script>
<?php }
else
{   
	$result = $soapclientObj->get_search_by_module('Contacts', $search, $totalrecPerPage);
	$first_name  = $soapclientObj->fetchFirstNameBySplitSearchString($search);
	$last_name  = $soapclientObj->fetchLastNameBySplitSearchString($search);
	$account_name  = $soapclientObj->fetchAccountNameBySplitSearchString($search);
	$title  = $soapclientObj->fetchTitleBySplitSearchString($search);
	$email  = $soapclientObj->fetchEmailBySplitSearchString($search);
	
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['account_name'] = $account_name;
	$_SESSION['title'] = $title;
	$_SESSION['email'] = $email;?>
	<script language="Javascript">
	   function clearsearchfields(formID)
		  {
			 var fomObj = document.getElementById(formID);
			 fomObj.first_name_advanced.value = "";
			 fomObj.last_name_advanced.value = "";
			 fomObj.account_name_advanced.value = "";
			 fomObj.title_advanced.value = "";
			 fomObj.email_advanced.value = ""; 
		  }
	</script>
<?php
}
 
$temptotal = count($result);
 
?>  
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="formHeader h3Row">
<tbody>
    <tr>
        <td nowrap="">
             <h3><span>Contact List</span></h3>
        </td>
        <td width="100%">
             <img width="1" height="1" alt="" src="<?php echo $siteURL; ?>/images/blank.gif">
        </td>
    </tr>
</tbody>
</table>




<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tableviewclass">
		<tbody>
		     <?php if($search == "")
			 {  ?>
                     <tr class="pagination">
			<td align="right" colspan="6">
				<table width="100%" cellspacing="5" cellpadding="5" border="0">
					<tbody>
                                            <tr>
						<td align="left">
							&nbsp;</td>  
						<td nowrap="nowrap" align="right"> 
                                                         <input type="button" name="Start" value="Start" onclick="javascript: window.location='<?php echo $siteURL; ?>/popupAddPrimaryContacts.php?start=0&IDVal=<?php echo $IDval; ?>&ID=<?php echo $ID; ?>';">
                                                    <?php if($start > 0) {  ?>  
							      <input type="button" name="previous" value="Previous" onclick="javascript: window.location='<?php echo $siteURL; ?>/popupAddPrimaryContacts.php?start=<?php echo $start - $totalrecPerPage; ?>&IDVal=<?php echo $IDval; ?>&ID=<?php echo $ID; ?>';">                                                         
                                                    <?php } else { ?> 
                                                         <input type="button" name="previous" value="Previous" disabled="disabled">               
                                                    <?php } ?>     
						     <span class="pageNumbers">(<?php echo $start + 1; ?> - <?php echo count($result); ?> Records)</span>  
                                                    <?php  $tempvar = count($result) - $start;
                                                          if( ($start >= count($result)) OR ($tempvar < count($result)) ) {  ?>   
                                                         <input type="button" name="Next" value="Next" disabled="disabled">
                                                     <?php } else { ?> 
							 <input type="button" name="Next" value="Next" onclick="javascript: window.location='<?php echo $siteURL; ?>/popupAddPrimaryContacts.php?start=<?php echo $start + $totalrecPerPage; ?>&IDVal=<?php echo $IDval; ?>&ID=<?php echo $ID; ?>';">
                                                     <?php } ?>     
					        </td>
					   </tr>
				       </tbody>
                                </table>
			</td>
		      </tr> 
		  <?php 
              }
            ?>		  
		     <tr height="20" class="rowheadings"> 	
			  <th width="26.26%" nowrap="nowrap" scope="col">
			       <div align="left" width="100%" style="white-space: normal;">
	                             Name&nbsp;&nbsp;	 
                               </div> 
                          </th>
			              <th width="26.26%" nowrap="nowrap" scope="col">
			                   <div align="left" width="100%" style="white-space: normal;">
	                             Account Name&nbsp;&nbsp;		 
                               </div> 
                          </th>
                          <th width="26.26%" nowrap="nowrap" scope="col">
			                   <div align="left" width="100%" style="white-space: normal;">
	                             Title&nbsp;&nbsp;		 
                               </div> 
                          </th>
                          <th width="26.26%" nowrap="nowrap" scope="col">
			                   <div align="left" width="100%" style="white-space: normal;">
	                                 Email&nbsp;&nbsp;	 
                               </div> 
                          </th> 
		    </tr> 
                  <?php 
                        for($i=$start; $i<$temptotal; $i++) { 
                             $cid = $result[$i]['id'];
                             $ctemp = $result[$i]['salutation'].' '.$result[$i]['first_name'].' '.$result[$i]['last_name'];
                  ?>
                    <tr class="rowclass" height="20">
                        <td width="25%"> 
                              <a onclick="send_back('Contacts','<?php echo $cid; ?>', '<?php echo $ctemp; ?>');" href="javascript:void(0)" style="text-decoration: underline; color: blue;">
                                  <?php echo $result[$i]['salutation'].' '.$result[$i]['first_name'].' '.$result[$i]['last_name']; ?> &nbsp;
                              </a>  
                        </td>
                        <td width="25%">
                              <?php if( isset($result[$i]['account_name']) and $result[$i]['account_name'] != '') echo $result[$i]['account_name']; ?> &nbsp;
                        </td>
                        <td width="25%">
                              <?php echo $result[$i]['title']; ?> &nbsp;
                        </td>
                        <td width="25%">
                              <?php echo $result[$i]['email1'].'<br>'.$result[$i]['email2']; ?> &nbsp;
                        </td>
                    </tr>
                  <?php }  ?>
                    
                    
                    
	 </tbody>
</table>

</body>
</html>