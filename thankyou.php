<?php
define("sugarEntry",TRUE);
include("include/entryPoint.php");
//print_r($_POST);

if((isset($_POST['submit']))&&($_POST['submit']))
{
	
	if( isset($_POST['accept_terms']) && ($_POST['accept_terms']=='on') && isset($_POST['accepted_by']) && (!empty($_POST['accepted_by'])) )
	{
		$query3 = "UPDATE aos_quotes_cstm SET quote_accepted_date_c='".date('Y-m-d')."',quote_accept_agreement_c='1',accepted_by_c='".$_POST['accepted_by']."' WHERE id_c='".$_POST['record']."' ";
		$db->query($query3);
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<center><b>Thank You For Your Time for accepting Quote. We will get back to you at the earlist.</b></center>        
        
<?php		
	}
}
?>