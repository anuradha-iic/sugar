<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); require_once('functions.php'); 
 $allContacts = getallContacts(); 
 $parentTab = $_REQUEST['parentTab'];
 
   if( isset($_REQUEST['go']) and $_REQUEST['go'] == 'Send' )
    {
	     $emailTo  = $_REQUEST['emailTo'];
		 $recordID = $_REQUEST['recordID'];
		 $nameFL = $_REQUEST['nameFL'];
		 $res      = sendEmail($emailTo, $recordID, $nameFL); 
		 echo $res;
	}
 ?>
<script language="Javascript">
   function showURL(val)
    {
	     var splitArr = val.split(';'); 
	     var URL = "http://sugarcrm-dev.nextlevelinternet.com/webGathering/index.php?record="+splitArr[0];
		 document.getElementById('displayURL').style.display = ""; 
		 document.getElementById('displayURL').innerHTML = "<span style='color: #4E8CCF; font-size: 12px;'>Web Page Gathering Link: <a href='"+URL+"' target='_blank'>"+URL+"</a></span>";
		 document.getElementById('recordID').value = splitArr[0];
		 document.getElementById('emailTo').value  = splitArr[1];
		 document.getElementById('nameFL').value  = splitArr[2];
	}
	
	function checkform(formObj)
	{
	     if(formObj.sel_contact.value == "")
		 {
		     alert("Please select the contact to send email.");
			 formObj.sel_contact.focus();
			 return false;
		 }
		 return true;
	}
</script>  
<style>
 .fieldLabel {
     font-size: 14px;
 }
</style>
<form name="sendEmailForm" id="sendEmailForm" action="index.php?module=hw_salesRepMod&action=index&parentTab=<?php echo $parentTab;?>" method="post" onsubmit="return checkform(this);">
   <input type="hidden" name="emailTo" id="emailTo" value="">
   <input type="hidden" name="recordID" id="recordID" value="">
   <input type="hidden" name="nameFL" id="nameFL" value="">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
	     <td colspan="2">
		       <h2>Select Contact for Sending the web gathering link via email.</h2>
		 </td>  
	</tr>
	<tr>
	     <td colspan="2">
		       &nbsp;
		 </td>  
	</tr>
	<tr>
	     <td valign="top" width="10%" class="fieldLabel">
		       Select Contact: &nbsp;
		 </td>
		 <td valign="top" width="90%">
		       <select name="sel_contact" style="width: auto;" onChange="showURL(this.value);">
			        <option value="">Select Contact</option>
					<?php
					   foreach($allContacts as $key=>$val) 
					   {  ?> 
				            <option value="<?php echo $val['id'].';'.$val['email1'].','.$val['email2'].';'.$val['first_name'].','.$val['last_name']; ?>"><?php echo $val['salutation'].' '.$val['first_name'].' '.$val['last_name']; ?></option>   	   
				 <?php }
					?>
			   </select>
		 </td>
	</tr>
	<tr>
	     <td colspan="2">
		       &nbsp;
		 </td>  
	</tr>
	<tr>
	     <td colspan="2" id="displayURL" style="display: none;">
		        
		 </td>  
	</tr>
	<tr>
	     <td colspan="2">
		       &nbsp;
		 </td>  
	</tr>
	<tr>
	     <td colspan="2">
		       <input type="submit" name="go" value="Send">
		 </td>  
	</tr>
</table>
</form>