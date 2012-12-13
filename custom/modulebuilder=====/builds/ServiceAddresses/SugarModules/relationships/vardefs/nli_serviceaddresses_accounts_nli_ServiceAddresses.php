<?php
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
