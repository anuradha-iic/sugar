<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-20 02:55:45
$dictionary["Account"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'account_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_quotes"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'account_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_invoices"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'account_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_contracts"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'contract_account_id',
	'relationship_type'=>'one-to-many',
);



// created: 2012-05-08 11:20:34
$dictionary["Account"]["fields"]["nli_serviceesses_accounts"] = array (
  'name' => 'nli_serviceesses_accounts',
  'type' => 'link',
  'relationship' => 'nli_serviceaddresses_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_NLI_SERVICEADDRESSES_ACCOUNTS_FROM_NLI_SERVICEADDRESSES_TITLE',
);


 // created: 2012-07-13 03:56:50

 

 // created: 2012-07-13 03:57:45

 

 // created: 2012-07-13 03:59:20

 

 // created: 2012-09-17 12:07:54

 

 // created: 2012-08-27 15:30:58

 

 // created: 2012-08-27 15:30:34

 

 // created: 2012-08-27 15:31:59

 

 // created: 2012-08-27 15:32:15

 

 // created: 2012-08-27 15:31:25

 

 // created: 2012-08-27 15:31:43

 

 // created: 2012-09-11 04:12:00

 

 // created: 2012-09-11 04:13:50

 

 // created: 2012-09-17 12:07:54

 

 // created: 2012-09-17 12:02:10

 

 // created: 2012-07-13 03:58:21

 

 // created: 2012-08-27 15:51:59

 

 // created: 2012-07-13 03:58:49

 
?>