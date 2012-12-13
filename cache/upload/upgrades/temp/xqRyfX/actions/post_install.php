<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


global $db;

$domainsModuleQuery = $db->query("SELECT COUNT(id) as DOMAINS FROM upgrade_history WHERE id_name = 'AlineaSolDomains'");
$domainsModuleRow = $db->fetchByAssoc($domainsModuleQuery);
$isDomainsModule = ($domainsModuleRow['DOMAINS'] >= 1) ? true : false;

$salesModuleQuery = $db->query("SELECT COUNT(id) as SALES FROM upgrade_history WHERE id_name = 'AlineaSolSales'");
$salesModuleRow = $db->fetchByAssoc($salesModuleQuery);
$isSalesModule = ($salesModuleRow['SALES'] >= 1) ? true : false;

$publishHomePageModuleQuery = $db->query("SELECT COUNT(id) as PUBLISHHOMEPAGE FROM upgrade_history WHERE id_name = 'AlineaSolPublishHomePage'");
$publishHomePageModuleRow = $db->fetchByAssoc($publishHomePageModuleQuery);
$isPublishHomePageModule = ($publishHomePageModuleRow['PUBLISHHOMEPAGE'] >= 1) ? true : false;



//Actualizamos el fichero asolRepair.php de la zona de Administraci�n

if ($isDomainsModule || $isSalesModule || $isPublishHomePageModule) {
	
	$gestorRepair = fopen("modules/Administration/asolRepair.php", "r");
	
	if ($gestorRepair){
	
		
		$fileTextRepair = "";
	
		while ((!feof($gestorRepair)) && (!strstr($bufferRepair, "echo \"<b>Restored Files:</b><br/><br/>\";"))) {
			$bufferRepair = fgets($gestorRepair);
			$fileTextRepair .= $bufferRepair;
		}
		
		if ($isDomainsModule) {
		
			$fileTextRepair .= "
//*********AlineaSol Domains*********//
include(\"modules/Administration/AlineaSolDomainsRestore.php\");
//*********AlineaSol Domains*********//
\n";
	
		}
		
		if ($isSalesModule) {
		
			$fileTextRepair .= "
//*********AlineaSol Sales*********//
include(\"modules/Administration/AlineaSolSalesRestore.php\");
//*********AlineaSol Sales*********//
\n";
	
		}
		
		if ($isPublishHomePageModule) {
		
			$fileTextRepair .= "
//*********AlineaSol PublishHomePage*********//
include(\"modules/Administration/AlineaSolPublishHomePageRestore.php\");
//*********AlineaSol PublishHomePage*********//
\n";
	
		}
		
		
		while ((!feof($gestorRepair)) && (!strstr($bufferRepair, "<br/><br/><br/><b>Modified Files:</b><br/><br/>"))) {
			$bufferRepair = fgets($gestorRepair);
			$fileTextRepair .= $bufferRepair;
		}
		
		
		if ($isDomainsModule) {
		
			$fileTextRepair .= "
//*********AlineaSol Domains*********//
include(\"modules/Administration/AlineaSolDomainsModify.php\");
//*********AlineaSol Domains*********//
\n";
			
		}
		
		if ($isSalesModule) {
		
			$fileTextRepair .= "
//*********AlineaSol Sales*********//
include(\"modules/Administration/AlineaSolSalesModify.php\");
//*********AlineaSol Sales*********//
\n";
	
		}
		
		if ($isPublishHomePageModule) {
		
			$fileTextRepair .= "
//*********AlineaSol PublishHomePage*********//
include(\"modules/Administration/AlineaSolPublishHomePageModify.php\");
//*********AlineaSol PublishHomePage*********//
\n";
	
		}
		
	
		while (!feof($gestorRepair))  {
			$bufferRepair = fgets($gestorRepair);
			$fileTextRepair .= $bufferRepair;
		}
		
		
		fclose($gestorRepair);
		
		$gestorRepair = fopen('modules/Administration/asolRepair.php', 'w');//Permiso denegado
		fwrite($gestorRepair, $fileTextRepair);
		
		fclose($gestorRepair);
		
	}

}
	
?>