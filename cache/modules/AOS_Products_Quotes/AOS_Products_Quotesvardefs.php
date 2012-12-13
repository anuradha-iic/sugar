<?php
// created: 2012-11-17 05:51:43
$GLOBALS["dictionary"]["AOS_Products_Quotes"] = array (
  'table' => 'aos_products_quotes',
  'audited' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'aos_products_quotes_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'aos_products_quotes_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'aos_products_quotes_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'number' => 
    array (
      'required' => false,
      'name' => 'number',
      'vname' => 'LBL_LIST_NUM',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '11',
      'disable_num_format' => '',
    ),
    'product_qty' => 
    array (
      'required' => false,
      'name' => 'product_qty',
      'vname' => 'LBL_PRODUCT_QTY',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => '4',
    ),
    'product_cost_price' => 
    array (
      'required' => false,
      'name' => 'product_cost_price',
      'vname' => 'LBL_PRODUCT_COST_PRICE',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => 26,
    ),
    'product_list_price' => 
    array (
      'required' => false,
      'name' => 'product_list_price',
      'vname' => 'LBL_PRODUCT_LIST_PRICE',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'product_discount' => 
    array (
      'required' => false,
      'name' => 'product_discount',
      'vname' => 'LBL_PRODUCT_DISCOUNT',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'product_discount_amount' => 
    array (
      'required' => false,
      'name' => 'product_discount_amount',
      'vname' => 'LBL_PRODUCT_DISCOUNT_AMOUNT',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'discount' => 
    array (
      'required' => false,
      'name' => 'discount',
      'vname' => 'LBL_DISCOUNT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => 'Percentage',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 255,
      'options' => 'discount_list',
      'studio' => 'visible',
    ),
    'product_unit_price' => 
    array (
      'required' => '1',
      'name' => 'product_unit_price',
      'vname' => 'LBL_PRODUCT_UNIT_PRICE',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'vat_amt' => 
    array (
      'required' => '1',
      'name' => 'vat_amt',
      'vname' => 'LBL_VAT_AMT',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'product_total_price' => 
    array (
      'required' => '1',
      'name' => 'product_total_price',
      'vname' => 'LBL_PRODUCT_TOTAL_PRICE',
      'type' => 'currency',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 26,
    ),
    'vat' => 
    array (
      'required' => false,
      'name' => 'vat',
      'vname' => 'LBL_VAT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '5.0',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => 100,
      'options' => 'vat_list',
      'studio' => 'visible',
    ),
    'parent_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'parent_name',
      'vname' => 'LBL_FLEX_RELATE',
      'type' => 'parent',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 25,
      'options' => 'product_quote_parent_type_dom',
      'studio' => 'visible',
      'type_name' => 'parent_type',
      'id_name' => 'parent_id',
      'parent_type' => 'record_type_display',
    ),
    'parent_type' => 
    array (
      'required' => false,
      'name' => 'parent_type',
      'vname' => 'LBL_PARENT_TYPE',
      'type' => 'parent_type',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 100,
      'dbType' => 'varchar',
      'studio' => 'hidden',
    ),
    'parent_id' => 
    array (
      'required' => false,
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ID',
      'type' => 'id',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 36,
    ),
    'product_id' => 
    array (
      'required' => false,
      'name' => 'product_id',
      'vname' => '',
      'type' => 'id',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 36,
    ),
    'product_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'product_name',
      'vname' => 'LBL_PRODUCT',
      'type' => 'relate',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'product_id',
      'ext2' => 'AOS_Products',
      'module' => 'AOS_Products',
      'quicksearch' => 'enabled',
      'studio' => 'hidden',
    ),
    'aos_products' => 
    array (
      'name' => 'aos_products',
      'type' => 'link',
      'relationship' => 'aos_product_quotes_aos_products',
      'module' => 'AOS_Products',
      'bean_name' => 'AOS_Products',
      'source' => 'non-db',
    ),
    'unit' => 
    array (
      'required' => false,
      'name' => 'unit',
      'vname' => 'LBL_PRODUCT_UNIT',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 100,
      'dbType' => 'varchar',
    ),
    'product_code' => 
    array (
      'required' => false,
      'name' => 'product_code',
      'vname' => 'LBL_PRODUCT_CODE',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 100,
      'dbType' => 'varchar',
    ),
    'product_total_nrc' => 
    array (
      'required' => false,
      'name' => 'product_total_nrc',
      'vname' => 'LBL_PRODUCT_TOTAL_NRC',
      'type' => 'currency',
      'group' => 'amount',
      'dbType' => 'double',
      'disable_num_format' => true,
      'duplicate_merge' => '0',
      'audited' => false,
    ),
    'product_total_lmd' => 
    array (
      'required' => false,
      'name' => 'product_total_lmd',
      'vname' => 'LBL_PRODUCT_TOTAL_LMD',
      'type' => 'currency',
      'group' => 'amount',
      'dbType' => 'double',
      'disable_num_format' => true,
      'duplicate_merge' => '0',
      'audited' => false,
    ),
    'quotes_product_name' => 
    array (
      'required' => false,
      'name' => 'quotes_product_name',
      'vname' => 'LBL_TOTAL_ORDER_DISCOUNT',
      'type' => 'text',
      'dbType' => 'varchar',
      'massupdate' => 0,
      'comments' => 'Product name for quotes',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'len' => 100,
    ),
    'per_unit_price' => 
    array (
      'required' => false,
      'name' => 'per_unit_price',
      'vname' => 'LBL_PER_UNIT_PRICE',
      'type' => 'currency',
      'group' => 'amount',
      'dbType' => 'double',
      'disable_num_format' => true,
      'duplicate_merge' => '0',
      'audited' => false,
    ),
    'desired_install_date' => 
    array (
      'required' => false,
      'name' => 'desired_install_date',
      'vname' => 'LBL_PER_UNIT_PRICE',
      'type' => 'date',
      'group' => 'date',
      'dbType' => 'date',
      'disable_num_format' => true,
      'duplicate_merge' => '0',
      'audited' => false,
    ),
    'product_service_period' => 
    array (
      'required' => false,
      'name' => 'product_service_period',
      'vname' => 'LBL_SERVICE_PERIOD',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 1,
      'reportable' => 0,
      'default' => '24 Months',
      'len' => 100,
      'options' => 'nli_periods_dom',
      'studio' => 'visible',
    ),
    'product_renewal_period' => 
    array (
      'required' => false,
      'name' => 'product_renewal_period',
      'vname' => 'LBL_RENEWAL_PERIOD',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'default' => '12 Months',
      'audited' => 1,
      'reportable' => 0,
      'len' => 100,
      'options' => 'nli_periods_dom',
      'studio' => 'visible',
    ),
    'is_service' => 
    array (
      'required' => false,
      'name' => 'is_service',
      'vname' => 'LBL_IS_SERVICE',
      'type' => 'bool',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'default' => '0',
      'audited' => 0,
      'reportable' => 0,
      'studio' => 'visible',
    ),
    'service_address_id' => 
    array (
      'required' => false,
      'name' => 'service_address_id',
      'vname' => 'LBL_SERVICE_ADDRESS',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'default' => '',
      'audited' => 0,
      'reportable' => 0,
      'studio' => 'visible',
      'len' => '40',
    ),
  ),
  'relationships' => 
  array (
    'aos_products_quotes_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Products_Quotes',
      'rhs_table' => 'aos_products_quotes',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'aos_products_quotes_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Products_Quotes',
      'rhs_table' => 'aos_products_quotes',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'aos_products_quotes_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Products_Quotes',
      'rhs_table' => 'aos_products_quotes',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'aos_product_quotes_aos_products' => 
    array (
      'lhs_module' => 'AOS_Products',
      'lhs_table' => 'aos_products',
      'lhs_key' => 'id',
      'rhs_module' => 'AOS_Products_Quotes',
      'rhs_table' => 'aos_products_quotes',
      'rhs_key' => 'product_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_lock' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'aos_products_quotespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);