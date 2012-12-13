<?php
// created: 2012-10-04 13:49:30
$dictionary["aos_quotes_nli_serviceaddresses"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'aos_quotes_nli_serviceaddresses' => 
    array (
      'lhs_module' => 'AOS_Quotes',
      'lhs_table' => 'aos_quotes',
      'lhs_key' => 'id',
      'rhs_module' => 'nli_ServiceAddresses',
      'rhs_table' => 'nli_serviceaddresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'aos_quotes_iceaddresses_c',
      'join_key_lhs' => 'aos_quotes9f00_quotes_ida',
      'join_key_rhs' => 'aos_quotesccc3dresses_idb',
    ),
  ),
  'table' => 'aos_quotes_iceaddresses_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'aos_quotes9f00_quotes_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'aos_quotesccc3dresses_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'aos_quotes_rviceaddressesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'aos_quotes_rviceaddresses_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'aos_quotes9f00_quotes_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'aos_quotes_rviceaddresses_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'aos_quotesccc3dresses_idb',
      ),
    ),
  ),
);