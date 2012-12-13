<?php 
 //WARNING: The contents of this file are auto-generated


/*
* Changes by Ashutosh to change the Product code to a text box
*/
$dictionary['AOS_Products']['fields']['maincode'] =
  array (
    'required' => '1',
    'name' => 'maincode',
    'vname' => 'LBL_MAINCODE',
    'type' => 'varchar',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
  );

$dictionary['AOS_Products']['fields']['unit_measure'] =
  array (
    'required' => '0',
    'name' => 'unit_measure',
    'vname' => 'LBL_UNIT_MEASURE',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'options' => 'nli_unit_list',
    'studio' => 'visible',
  );




// created: 2012-02-28 12:08:50
$dictionary["AOS_Products"]["fields"]["nli_pricing_aos_products"] = array (
  'name' => 'nli_pricing_aos_products',
  'type' => 'link',
  'relationship' => 'nli_pricing_aos_products',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_NLI_PRICING_TITLE',
);


 // created: 2012-06-10 22:17:34
$dictionary['AOS_Products']['fields']['category']['reportable']=true;
$dictionary['AOS_Products']['fields']['category']['default']='Internet';

 

 // created: 2012-06-13 02:48:06

 

 // created: 2012-06-10 22:00:15

 
?>