<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-07-17 06:48:10

 

 // created: 2012-07-17 06:41:10

 

 // created: 2012-07-17 06:44:32

 

 // created: 2012-07-17 06:41:25

 

 // created: 2012-07-17 06:49:05

 

 // created: 2012-07-17 06:46:11

 

 // created: 2012-07-17 06:40:20

 

 // created: 2012-07-17 06:40:55

 

 // created: 2012-07-17 06:42:17

 

 // created: 2012-07-17 06:47:51

 

 // created: 2012-07-17 06:38:34

 

 // created: 2012-07-17 06:41:58

 

 // created: 2012-07-17 06:40:39

 

 // created: 2012-07-17 06:38:48

 

 // created: 2012-08-29 09:37:41

 

 // created: 2012-07-17 06:41:42

 

 // created: 2012-07-17 06:45:41

 

// created: 2012-10-03 05:09:44
$dictionary["Opportunity"]["fields"]["leads_opportunities"] = array (
  'name' => 'leads_opportunities',
  'type' => 'link',
  'relationship' => 'leads_opportunities',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_FROM_LEADS_TITLE',
);


 // created: 2012-07-17 06:48:49

 

 // created: 2012-07-17 06:43:33

 

 // created: 2012-07-17 06:40:03

 

// created: 2010-12-20 02:55:45
$dictionary["Opportunity"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'opportunity_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);


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


// created: 2010-12-20 02:55:45
$dictionary["Opportunity"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'opportunity_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);


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




 // created: 2012-08-22 12:47:00

 

 // created: 2012-07-17 06:43:57

 

 // created: 2012-07-17 06:42:37

 

 // created: 2012-07-17 06:48:32

 

 // created: 2012-09-17 12:32:39

 

 // created: 2012-07-17 06:45:17

 

 // created: 2012-07-17 06:46:48

 

 // created: 2012-08-29 09:31:58

 

 // created: 2012-07-17 06:46:28

 

 // created: 2012-07-17 06:44:55

 

 // created: 2012-07-17 06:44:12

 

 // created: 2012-09-17 12:31:52

 

 // created: 2012-07-17 06:47:20

 

 // created: 2012-07-17 06:45:55

 

 // created: 2012-07-17 06:43:08

 
?>