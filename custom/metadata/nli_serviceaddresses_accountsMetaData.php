<?php
// created: 2012-05-08 11:20:34
$dictionary["nli_serviceaddresses_accounts"] = array (
  'relationships' => 
  array (
    'nli_serviceaddresses_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'nli_ServiceAddresses',
      'rhs_table' => 'nli_serviceaddresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'nli_serviceses_accounts_c',
      'join_key_lhs' => 'nli_servicaa98ccounts_ida',
      'join_key_rhs' => 'nli_servic71a8dresses_idb',
    ),
  ),
  'table' => 'nli_serviceses_accounts_c',
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
      'name' => 'nli_servicaa98ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'nli_servic71a8dresses_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'nli_serviceesses_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'nli_serviceesses_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'nli_servicaa98ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'nli_serviceesses_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'nli_servic71a8dresses_idb',
      ),
    ),
  ),
);