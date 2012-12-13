<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-10-15 03:59:09
$dictionary["Contact"]["fields"]["aos_quotes_contacts"] = array (
  'name' => 'aos_quotes_contacts',
  'type' => 'link',
  'relationship' => 'aos_quotes_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_QUOTES_CONTACTS_FROM_AOS_QUOTES_TITLE',
);


// created: 2010-12-20 02:55:45
$dictionary["Contact"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'contact_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Contact"]["relationships"]["contact_aos_quotes"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);

// created: 2010-12-20 02:56:01

$dictionary["Contact"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'contact_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Contact"]["relationships"]["contact_aos_invoices"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);


 // created: 2012-07-13 04:13:43

 

 // created: 2012-10-11 05:20:02

 

 // created: 2012-10-11 05:23:18

 

 // created: 2012-10-11 05:22:09

 

 // created: 2012-10-11 05:22:57

 

 // created: 2012-10-11 05:22:37

 

 // created: 2012-05-23 01:58:16

 

 // created: 2012-05-15 04:19:37

 

 // created: 2012-05-11 00:58:40

 

 // created: 2012-06-13 05:42:04

 

 // created: 2012-08-17 11:23:26

 

 // created: 2012-08-17 11:22:14

 

 // created: 2012-08-17 11:23:39

 

 // created: 2012-08-17 11:21:26

 

 // created: 2012-08-17 11:22:50

 

 // created: 2012-07-13 04:13:27

 

 // created: 2012-07-13 04:12:26

 

 // created: 2012-07-13 04:10:00

 

 // created: 2012-07-13 04:13:12

 

 // created: 2012-08-23 15:12:34
$dictionary['Contact']['fields']['first_name']['required']=true;

 

 // created: 2012-07-13 04:11:49

 

 // created: 2012-07-13 04:10:35

 

 // created: 2012-07-13 04:11:00

 

 // created: 2012-06-15 01:11:39

 

 // created: 2012-09-17 13:24:21

 

 // created: 2012-06-13 05:42:55

 

 // created: 2012-07-13 04:12:42

 

 // created: 2012-09-27 14:01:08

 

 // created: 2012-07-13 04:14:01

 
?>