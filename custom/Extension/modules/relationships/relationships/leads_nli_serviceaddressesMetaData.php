<?php
// created: 2012-08-21 10:54:28
$dictionary["leads_nli_serviceaddresses"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'leads_nli_serviceaddresses' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'nli_ServiceAddresses',
      'rhs_table' => 'nli_serviceaddresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'leads_nli_siceaddresses_c',
      'join_key_lhs' => 'leads_nli_a0cdesleads_ida',
      'join_key_rhs' => 'leads_nli_b489dresses_idb',
    ),
  ),
  'table' => 'leads_nli_siceaddresses_c',
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
      'name' => 'leads_nli_a0cdesleads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'leads_nli_b489dresses_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'leads_nli_srviceaddressesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'leads_nli_srviceaddresses_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'leads_nli_a0cdesleads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'leads_nli_srviceaddresses_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'leads_nli_b489dresses_idb',
      ),
    ),
  ),
);