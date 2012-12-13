<?php


$dictionary['AOS_Products_Quotes']['fields']['unit'] = array (
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
  );

$dictionary['AOS_Products_Quotes']['fields']['product_code'] = array (
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
  );

$dictionary['AOS_Products_Quotes']['fields']['product_total_nrc'] = array (
    'required' => false,
    'name' => 'product_total_nrc',
    'vname' => 'LBL_PRODUCT_TOTAL_NRC',
    'type' => 'currency',
    'group'=>'amount',
    'dbType' => 'double',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );

$dictionary['AOS_Products_Quotes']['fields']['product_total_lmd'] = array (
    'required' => false,
    'name' => 'product_total_lmd',
    'vname' => 'LBL_PRODUCT_TOTAL_LMD',
    'type' => 'currency',
    'group'=>'amount',
    'dbType' => 'double',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );
$dictionary['AOS_Products_Quotes']['fields']['quotes_product_name'] =
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
  );
$dictionary['AOS_Products_Quotes']['fields']['per_unit_price'] = array (
    'required' => false,
    'name' => 'per_unit_price',
    'vname' => 'LBL_PER_UNIT_PRICE',
    'type' => 'currency',
    'group'=>'amount',
    'dbType' => 'double',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );

$dictionary['AOS_Products_Quotes']['fields']['desired_install_date'] = array (
    'required' => false,
    'name' => 'desired_install_date',
    'vname' => 'LBL_PER_UNIT_PRICE',
    'type' => 'date',
    'group'=>'date',
    'dbType' => 'date',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );

$dictionary['AOS_Products_Quotes']['fields']['product_service_period'] =
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
  );

$dictionary['AOS_Products_Quotes']['fields']['product_renewal_period'] =
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
  );
$dictionary['AOS_Products_Quotes']['fields']['is_service'] =
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
  );

$dictionary['AOS_Products_Quotes']['fields']['service_address_id'] =
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
	'len'=> '40'
  );
