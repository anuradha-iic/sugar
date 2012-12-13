<?php
$siteURL = "http://localhost/sugar/webGathering";  //"http://sugarcrm-dev.nextlevelinternet.com/webGathering";
$rootURL = "http://sugarcrm-dev.nextlevelinternet.com";
$accountRecordURL = "http://sugarcrm-dev.nextlevelinternet.com/index.php?action=DetailView&module=Accounts&record=";
$googleAPIKey = "AIzaSyAdPYYmWRBfG72cX8VMo0zSBQtbtXTYUU8";

$rootURL="http://localhost/sugar";
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('db_sugarcrm');
?>
<script language="Javascript">
    var siteURLJS = "<?php echo $siteURL; ?>";    
    var rootURLJS = "<?php echo $rootURL; ?>";
    var accountRecordURLJS = "<?php echo $accountRecordURL; ?>";
</script>    