<?php
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
