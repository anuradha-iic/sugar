<?php
// created: 2010-12-20 02:55:45
$dictionary["Opportunity"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'opportunity_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);
?>
<?php
// created: 2010-12-20 02:56:01
$dictionary["Opportunity"]["relationships"]["opportunity_aos_quotes"] = array (
	'lhs_module'=> 'Opportunities', 
	'lhs_table'=> 'opportunities', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'opportunity_id',
	'relationship_type'=>'one-to-many',
);
?>
<?php
// created: 2010-12-20 02:55:45
$dictionary["Opportunity"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'opportunity_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);
?>
<?php
// created: 2010-12-20 02:56:01
$dictionary["Opportunity"]["relationships"]["opportunity_aos_contracts"] = array (
	'lhs_module'=> 'Opportunities', 
	'lhs_table'=> 'opportunities', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'opportunity_id',
	'relationship_type'=>'one-to-many',
);

// Added by : Ashutosh new fields for Opportunities


$dictionary["Opportunity"]["fields"]['amount_nrc'] =
  array (
    'name' => 'amount_nrc',
    'vname' => 'LBL_AMOUNT_NRC',
    //'function'=>array('vname'=>'getCurrencyType'),
    'type' => 'currency',
//    'disable_num_format' => true,
    'dbType' => 'double',
    'comment' => '',
    'importable' => 'true',
    'duplicate_merge'=>'1',
    'required' => false,
        'options' => 'numeric_range_search_dom',
    'enable_range_search' => true,
  );


$dictionary["Opportunity"]["fields"]['total_amount'] =
  array (
    'name' => 'total_amount',
    'vname' => 'LBL_TOTAL_OPP_AMOUNT',
    //'function'=>array('vname'=>'getCurrencyType'),
    'type' => 'currency',
//    'disable_num_format' => true,
    'dbType' => 'double',
    'comment' => '',
    'importable' => 'true',
    'duplicate_merge'=>'1',
    'required' => false,
        'options' => 'numeric_range_search_dom',
    'enable_range_search' => true,
  );

?>
