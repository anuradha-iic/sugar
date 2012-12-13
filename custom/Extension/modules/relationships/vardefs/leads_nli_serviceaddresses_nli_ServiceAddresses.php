<?php
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
