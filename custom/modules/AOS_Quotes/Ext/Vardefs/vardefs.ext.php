<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-10-15 03:59:09
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_contacts"] = array (
  'name' => 'aos_quotes_contacts',
  'type' => 'link',
  'relationship' => 'aos_quotes_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_CONTACTS_FROM_CONTACTS_TITLE',
);


// created: 2012-10-04 13:49:30
$dictionary["AOS_Quotes"]["fields"]["aos_quotes_rviceaddresses"] = array (
  'name' => 'aos_quotes_rviceaddresses',
  'type' => 'link',
  'relationship' => 'aos_quotes_nli_serviceaddresses',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_AOS_QUOTES_NLI_SERVICEADDRESSES_FROM_NLI_SERVICEADDRESSES_TITLE',
);


$dictionary['AOS_Quotes']['fields']['total_nrc'] =
  array (
    'required' => false,
    'name' => 'total_nrc',
    'vname' => 'LBL_TOTAL_NRC',
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
  );
$dictionary['AOS_Quotes']['fields']['total_lmd'] =
  array (
    'required' => false,
    'name' => 'total_lmd',
    'vname' => 'LBL_TOTAL_LMD',
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
  );

$dictionary['AOS_Quotes']['fields']['total_discount'] =
  array (
    'required' => false,
    'name' => 'total_discount',
    'vname' => 'LBL_TOTAL_DISCOUNT_ORDER',
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
  );
$dictionary['AOS_Quotes']['fields']['order_discount'] =
  array (
    'required' => false,
    'name' => 'order_discount',
    'vname' => 'LBL_TOTAL_ORDER_DISCOUNT',
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
  );

$dictionary['AOS_Quotes']['fields']['expiration']['display_default'] = '+1 month';
/*
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
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

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
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
*/
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24',
    'len' => 11,
    
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12',
    'audited' => 1,
    'reportable' => 0,
    'len' => 11,
    'studio' => 'visible',
  );
//subtotal fields
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_discount',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_mrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_mrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_MRC',
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
  );

$dictionary['AOS_Quotes']['fields']['product_subtotal_lmd'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_lmd',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_LMD',
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
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_NRC',
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
  );
//service subtotal fields
$dictionary['AOS_Quotes']['fields']['service_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_discount',
    'vname' => 'LBL_SERVICE_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['service_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['quote_desired_install'] = array (
    'required' => false,
    'name' => 'quote_desired_install',
    'vname' => 'LBL_DESIRED_INSTALL',
    'type' => 'date',
    'group'=>'date',
    'dbType' => 'date',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_from_onetime_service'] = array (
    'required' => false,
    'name' => 'total_nrc_from_onetime_service',
    'vname' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
    'type' => 'varchar',
    'dbType' => 'non-db',   
    'source' => 'non-db',   

  );
$dictionary['AOS_Quotes']['fields']['order_nrc_discont'] = array (
    'required' => false,
    'name' => 'order_nrc_discont',
    'vname' => 'LBL_ORDER_NRC_DISCOUNT',
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

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_discont'] = array (
    'required' => false,
    'name' => 'total_nrc_discont',
    'vname' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT',
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

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_subtotal'] = array (
    'required' => false,
    'name' => 'total_nrc_subtotal',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['grand_total_nrc'] = array (
    'required' => false,
    'name' => 'grand_total_nrc',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC',
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

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_tax'] = array (
    'required' => false,
    'name' => 'product_subtotal_tax',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_list_price'] = array (
    'required' => false,
    'name' => 'product_subtotal_list_price',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['quote_cover_letter'] = array (
    'required' => false,
    'name' => 'quote_cover_letter',
    'vname' => 'LBL_QUOTE_COVER_LETTER',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '2000',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );$dictionary['AOS_Quotes']['fields']['quote_introduction'] = array (
    'required' => false,
    'name' => 'quote_introduction',
    'vname' => 'LBL_QUOTE_INTRODUCTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );
$dictionary['AOS_Quotes']['fields']['quote_final_notes'] = array (
    'required' => false,
    'name' => 'quote_final_notes',
    'vname' => 'LBL_QUOTE_FINALNOTES',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );

$dictionary['AOS_Quotes']['fields']['total_nrc'] =
  array (
    'required' => false,
    'name' => 'total_nrc',
    'vname' => 'LBL_TOTAL_NRC',
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
  );
$dictionary['AOS_Quotes']['fields']['total_lmd'] =
  array (
    'required' => false,
    'name' => 'total_lmd',
    'vname' => 'LBL_TOTAL_LMD',
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
  );

$dictionary['AOS_Quotes']['fields']['total_discount'] =
  array (
    'required' => false,
    'name' => 'total_discount',
    'vname' => 'LBL_TOTAL_DISCOUNT_ORDER',
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
  );
$dictionary['AOS_Quotes']['fields']['order_discount'] =
  array (
    'required' => false,
    'name' => 'order_discount',
    'vname' => 'LBL_TOTAL_ORDER_DISCOUNT',
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
  );

$dictionary['AOS_Quotes']['fields']['expiration']['display_default'] = '+1 month';
/*
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
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

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
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
*/
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24',
    'len' => 11,
    
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12',
    'audited' => 1,
    'reportable' => 0,
    'len' => 11,
    'studio' => 'visible',
  );
//subtotal fields
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_discount',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_mrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_mrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_MRC',
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
  );

$dictionary['AOS_Quotes']['fields']['product_subtotal_lmd'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_lmd',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_LMD',
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
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_NRC',
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
  );
//service subtotal fields
$dictionary['AOS_Quotes']['fields']['service_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_discount',
    'vname' => 'LBL_SERVICE_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['service_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
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
  );
$dictionary['AOS_Quotes']['fields']['quote_desired_install'] = array (
    'required' => false,
    'name' => 'quote_desired_install',
    'vname' => 'LBL_DESIRED_INSTALL',
    'type' => 'date',
    'group'=>'date',
    'dbType' => 'date',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_from_onetime_service'] = array (
    'required' => false,
    'name' => 'total_nrc_from_onetime_service',
    'vname' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
    'type' => 'varchar',
    'dbType' => 'non-db',   
    'source' => 'non-db',   

  );
$dictionary['AOS_Quotes']['fields']['order_nrc_discont'] = array (
    'required' => false,
    'name' => 'order_nrc_discont',
    'vname' => 'LBL_ORDER_NRC_DISCOUNT',
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

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_discont'] = array (
    'required' => false,
    'name' => 'total_nrc_discont',
    'vname' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT',
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

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_subtotal'] = array (
    'required' => false,
    'name' => 'total_nrc_subtotal',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['grand_total_nrc'] = array (
    'required' => false,
    'name' => 'grand_total_nrc',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC',
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

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_tax'] = array (
    'required' => false,
    'name' => 'product_subtotal_tax',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_list_price'] = array (
    'required' => false,
    'name' => 'product_subtotal_list_price',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL',
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

  );
$dictionary['AOS_Quotes']['fields']['quote_cover_letter'] = array (
    'required' => false,
    'name' => 'quote_cover_letter',
    'vname' => 'LBL_QUOTE_COVER_LETTER',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );$dictionary['AOS_Quotes']['fields']['quote_introduction'] = array (
    'required' => false,
    'name' => 'quote_introduction',
    'vname' => 'LBL_QUOTE_INTRODUCTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );
$dictionary['AOS_Quotes']['fields']['quote_final_notes'] = array (
    'required' => false,
    'name' => 'quote_final_notes',
    'vname' => 'LBL_QUOTE_FINALNOTES',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );

 // created: 2012-12-18 10:46:23

 

 // created: 2012-10-05 01:40:59

 

 // created: 2012-05-11 12:12:46
$dictionary['AOS_Quotes']['fields']['approval_status']['default']='Pending';
$dictionary['AOS_Quotes']['fields']['approval_status']['reportable']=true;

 

 // created: 2012-09-05 00:31:09

 

 // created: 2012-09-26 16:19:41
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount']['audited']=false;
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount']['enable_range_search']=false;

 

 // created: 2012-11-07 05:15:26

 

 // created: 2012-12-11 13:30:33

 

 // created: 2012-12-11 13:32:18

 

 // created: 2012-09-20 00:04:42
$dictionary['AOS_Quotes']['fields']['quote_cover_letter']['default']='ruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegrruuh9phaegruuh9phaegruuh9phaeruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9phaegruuh9gruuh9phaeguuh9phaegaeg';

 

 // created: 2012-09-27 12:49:05

 

 // created: 2012-08-30 01:23:01
$dictionary['AOS_Quotes']['fields']['quote_final_notes']['default']='<p><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Deliverables:</span></p><ul><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will fully Training client staff on both the phones and user interface portal</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will assist in the final selection and purchase of the phones</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will pre-configure the phones before hardware vendor drop ships to client location</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel Internet will install and make sure phones are working to client satisfaction</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will set up the system to your specs</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel to create caller ID and number for inbound and outbound calls per client specs</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will port numbers - A Letter Of Authorization (LOA) will allow us to initiate the process of transferring your service and telephone number to NextLevel. You will then be able to use your old number with our service.</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will assist your technician with the proper router settings</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel support is 24/7 and US based</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Anywhere client plugs in the phone with an internet (anywhere in the world) the phone will be up and running as if phone was in the office</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">There are no typical Upgrade or Maintenance fees</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">100% uptime guarantee</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Waived Install fees with a 2 year term</span></li></ul>';

 

 // created: 2012-09-27 13:43:35

 

 // created: 2012-09-19 05:12:41

 

 // created: 2012-10-09 08:56:21

 

 // created: 2012-09-19 13:44:30
$dictionary['AOS_Quotes']['fields']['quote_introduction']['default']='<p>Server response time: <span id="responseTime">0.22</span> seconds.<br /> © 2004-2011 SugarCRM Inc. The Program is provided AS IS, without warranty. Licensed under <a class="copyRightLink" href="http://sugarcrm-dev.nextlevelinternet.com/LICENSE.txt" tar';

 

 // created: 2012-09-28 11:30:15

 

 // created: 2012-10-30 12:05:23

 

 // created: 2012-12-06 07:08:39

 

 // created: 2012-09-03 05:32:43
$dictionary['AOS_Quotes']['fields']['renewal_period']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['renewal_period']['enable_range_search']=false;

 

 // created: 2012-09-05 00:31:09

 

 // created: 2012-08-30 05:05:02
$dictionary['AOS_Quotes']['fields']['service_period']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['service_period']['enable_range_search']=false;

 

 // created: 2012-03-29 10:52:39
$dictionary['AOS_Quotes']['fields']['total_amt']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['total_amt']['enable_range_search']=false;

 

 // created: 2012-09-27 13:24:47
$dictionary['AOS_Quotes']['fields']['total_nrc']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['total_nrc']['enable_range_search']=false;

 
?>