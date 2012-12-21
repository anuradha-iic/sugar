<?php
define("sugarEntry", TRUE);
include("include/entryPoint.php");
$record = $_REQUEST['quoteID'];
//echo 'iic anuradha'accepted_by;

$quote_focus = new AOS_Quotes();
$quote_focus->retrieve($record);
//echo '<pre>';
//print_r($quote_focus);
//echo $quote_focus->assigned_user_id.'&nbsp;'.$quote_focus->assigned_user_name.'<br>'.$quote_focus->billing_contact_id.'<br>'.$quote_focus->billing_contact;
if($_REQUEST['accepted_by']!=$quote_focus->billing_contact)
{
    echo 'Orders may only be accepted by the Authorize Contact. Please contact '.$quote_focus->assigned_user_name.' at 858-836-0703 <br> if you are unsure of the Authorized Contact.';
}else{
    echo '1';
}
?>