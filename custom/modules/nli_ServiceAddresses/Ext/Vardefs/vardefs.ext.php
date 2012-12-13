<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-10-04 13:49:30
$dictionary["nli_ServiceAddresses"]["fields"]["aos_quotes_rviceaddresses"] = array (
  'name' => 'aos_quotes_rviceaddresses',
  'type' => 'link',
  'relationship' => 'aos_quotes_nli_serviceaddresses',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_NLI_SERVICEADDRESSES_FROM_AOS_QUOTES_TITLE',
  'id_name' => 'aos_quotes9f00_quotes_ida',
);
$dictionary["nli_ServiceAddresses"]["fields"]["aos_quotes_addresses_name"] = array (
  'name' => 'aos_quotes_addresses_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_NLI_SERVICEADDRESSES_FROM_AOS_QUOTES_TITLE',
  'save' => true,
  'id_name' => 'aos_quotes9f00_quotes_ida',
  'link' => 'aos_quotes_rviceaddresses',
  'table' => 'aos_quotes',
  'module' => 'AOS_Quotes',
  'rname' => 'name',
);
$dictionary["nli_ServiceAddresses"]["fields"]["aos_quotes9f00_quotes_ida"] = array (
  'name' => 'aos_quotes9f00_quotes_ida',
  'type' => 'link',
  'relationship' => 'aos_quotes_nli_serviceaddresses',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_NLI_SERVICEADDRESSES_FROM_NLI_SERVICEADDRESSES_TITLE',
);


// created: 2012-08-21 10:54:28
$dictionary["nli_ServiceAddresses"]["fields"]["leads_nli_srviceaddresses"] = array (
  'name' => 'leads_nli_srviceaddresses',
  'type' => 'link',
  'relationship' => 'leads_nli_serviceaddresses',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_NLI_SERVICEADDRESSES_FROM_LEADS_TITLE',
  'id_name' => 'leads_nli_a0cdesleads_ida',
);
$dictionary["nli_ServiceAddresses"]["fields"]["leads_nli_saddresses_name"] = array (
  'name' => 'leads_nli_saddresses_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_NLI_SERVICEADDRESSES_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_nli_a0cdesleads_ida',
  'link' => 'leads_nli_srviceaddresses',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["nli_ServiceAddresses"]["fields"]["leads_nli_a0cdesleads_ida"] = array (
  'name' => 'leads_nli_a0cdesleads_ida',
  'type' => 'link',
  'relationship' => 'leads_nli_serviceaddresses',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_NLI_SERVICEADDRESSES_FROM_NLI_SERVICEADDRESSES_TITLE',
);


// created: 2012-05-08 11:20:34
$dictionary["nli_ServiceAddresses"]["fields"]["nli_serviceesses_accounts"] = array (
  'name' => 'nli_serviceesses_accounts',
  'type' => 'link',
  'relationship' => 'nli_serviceaddresses_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_NLI_SERVICEADDRESSES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'nli_servicaa98ccounts_ida',
);
$dictionary["nli_ServiceAddresses"]["fields"]["nli_service_accounts_name"] = array (
  'name' => 'nli_service_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NLI_SERVICEADDRESSES_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'nli_servicaa98ccounts_ida',
  'link' => 'nli_serviceesses_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["nli_ServiceAddresses"]["fields"]["nli_servicaa98ccounts_ida"] = array (
  'name' => 'nli_servicaa98ccounts_ida',
  'type' => 'link',
  'relationship' => 'nli_serviceaddresses_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NLI_SERVICEADDRESSES_ACCOUNTS_FROM_NLI_SERVICEADDRESSES_TITLE',
);


 // created: 2012-06-06 04:44:41

 

 // created: 2012-06-06 04:44:17

 

 // created: 2012-06-21 04:55:09

 

 // created: 2012-05-24 03:42:19

 

 // created: 2012-05-24 03:42:19

 

 // created: 2012-06-22 04:40:42

 
?>