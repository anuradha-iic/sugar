<?php
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