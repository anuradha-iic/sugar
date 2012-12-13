<?php
// created: 2012-02-28 12:08:50
$dictionary["nli_pricing_aos_products"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'nli_pricing_aos_products' => 
    array (
      'lhs_module' => 'AOS_Products',
      'lhs_table' => 'aos_products',
      'lhs_key' => 'id',
      'rhs_module' => 'nli_Pricing',
      'rhs_table' => 'nli_pricing',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'nli_pricingaos_products_c',
      'join_key_lhs' => 'nli_pricind645roducts_ida',
      'join_key_rhs' => 'nli_pricin5ea3pricing_idb',
    ),
  ),
  'table' => 'nli_pricingaos_products_c',
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
      'name' => 'nli_pricind645roducts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'nli_pricin5ea3pricing_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'nli_pricing_aos_productsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'nli_pricing_aos_products_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'nli_pricind645roducts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'nli_pricing_aos_products_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'nli_pricin5ea3pricing_idb',
      ),
    ),
  ),
);