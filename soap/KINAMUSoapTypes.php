<?php
/*********************************************************************************
 * The Contents of this File have been created by KINAMU Business Solutions
 ********************************************************************************/
/*********************************************************************************
 * Description:  SOAP Enhancements for Outlook Connector
 * Portions created by KINAMU Business Solutions AG (c) 2009
 * All Rights Reserved.
 * Contributor(s): Christian Knoll
 ********************************************************************************/
$server->wsdl->addComplexType(
   	 'id_mod2',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'id' => array('name'=>'id', 'type'=>'xsd:string'),
		'name' => array('name'=>'name', 'type'=>'xsd:string'),
		'email' => array('name'=>'email', 'type'=>'xsd:string'),
	    'type' => array('name'=>'type', 'type'=>'xsd:string'),
		'date_modified' => array('name' =>'date_modified', 'type'=>'xsd:string'),
		'accept_status' => array('name' =>'accept_status', 'type'=>'xsd:string'),
	)
);

$server->wsdl->addComplexType(
    'ids_mods2',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:id_mod2[]')
    ),
	'tns:id_mod2'
);

$server->wsdl->addComplexType(
   	 'get_activity_attendee',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'ids' => array('name'=>'ids', 'type'=>'tns:ids_mods2'),
		'error' => array('name' =>'error', 'type'=>'tns:error_value'),
	)
);

$server->wsdl->addComplexType(
    'set_relationship_activity_value',
	'complexType',
   	 'struct',
   	 'all',
  	  '',
		array(
			'module1'=>array('name'=>'module1', 'type'=>'xsd:string'),
			'module1_id'=>array('name'=>'module1_id', 'type'=>'xsd:string'),
			'module2'=>array('name'=>'module2', 'type'=>'xsd:string'),
			'module2_id'=>array('name'=>'module_2_id', 'type'=>'xsd:string'),
			'accept_status'=>array('name' =>'accept_status', 'type'=>'xsd:string'),
		// add delete possibility
            'deleted'=>array('name'=>'deleted', 'type'=>'xsd:string'),
		)
);

$server->wsdl->addComplexType(
    'set_relationship_activity_list',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:set_relationship_activity_value[]')
    ),
	'tns:set_relationship_activity_value'
);

// types for the changed record that also include the owner of a record
$server->wsdl->addComplexType(
   	 'id_mod_owner',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'id' => array('name'=>'id', 'type'=>'xsd:string'),
		'date_modified' => array('name' =>'date_modified', 'type'=>'xsd:string'),
		'deleted' => array('name' =>'deleted', 'type'=>'xsd:int'),
		'new' => array('name' => 'new', 'type' => 'xsd:int'),
		'owner_id' => array('name'=>'owner_id', 'type'=>'xsd:string'),
	)
);

//these are just a list of fields we want to get
$server->wsdl->addComplexType(
    'ids_mods_owner',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:id_mod_owner[]')
    ),
	'tns:id_mod_owner'
);

$server->wsdl->addComplexType(
   	 'get_changedids_results',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'ids' => array('name'=>'ids', 'type'=>'tns:ids_mods_owner'),
		'error' => array('name' =>'error', 'type'=>'tns:error_value'),
	)
);

// types for the changed record that also include the owner of a record
$server->wsdl->addComplexType(
   	 'id_mod_meeting',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'id' => array('name'=>'id', 'type'=>'xsd:string'),
		'date_modified' => array('name' =>'date_modified', 'type'=>'xsd:string'),
		'deleted' => array('name' =>'deleted', 'type'=>'xsd:int'),
	    'linkdeleted' => array('name' => 'linkdeleted', 'type'=>'xsd:int'),
		'assigned_user_id' => array('name' =>'assigned_user_id', 'type'=>'xsd:string'),
		'name' => array('name' =>'name', 'type'=>'xsd:string'),
		'date_start' => array('name' =>'date_start', 'type'=>'xsd:string'),
		'duration_hours' => array('name' =>'duration_hours', 'type'=>'xsd:string'),
		'duration_minutes' => array('name' =>'duration_minutes', 'type'=>'xsd:string'),
		'location' => array('name' =>'location', 'type'=>'xsd:string'),
		'description' => array('name' =>'description', 'type'=>'xsd:string'),
		'status' => array('name' =>'date_modified', 'type'=>'xsd:string'),
		'parent_type' => array('name' =>'status', 'type'=>'xsd:string'),
		'parent_id' => array('name' =>'parent_id', 'type'=>'xsd:string'),
		'assigned_user_name' => array('name' =>'assigned_user_name', 'type'=>'xsd:string'),
	    'accept_status' => array('name' => 'accept_status', 'type'=>'xsd:string'),
	)
);

//these are just a list of fields we want to get
$server->wsdl->addComplexType(
    'ids_mods_meeting',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:id_mod_meeting[]')
    ),
	'tns:id_mod_meeting'
);

$server->wsdl->addComplexType(
   	 'get_syncids_meetings',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'ids_changed' => array('name'=>'ids_changed', 'type'=>'tns:ids_mods_meeting'),
	    'ids_deleted' => array('name'=>'ids_deleted', 'type'=>'tns:ids_mods_meeting'),
		'ids_new' => array('name'=>'ids_new', 'type'=>'tns:ids_mods_meeting'),
		'error' => array('name' =>'error', 'type'=>'tns:error_value'),
	)
);

$server->wsdl->addComplexType(
   	 'meeting_attendee',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'sugar_id' => array('name'=>'sugar_id', 'type'=>'xsd:string'),
	    'type' => array('name'=>'type', 'type'=>'xsd:string'),
		'name' => array('name'=>'name', 'type'=>'xsd:string'),		
		'email' => array('name'=>'email', 'type'=>'xsd:string'),		
		'status' => array('name' => 'status', 'type'=>'xsd:string'),
		'deleted' => array('name'=>'deleted', 'type'=>'xsd:string'),	
	)
);

//these are just a list of fields we want to get
$server->wsdl->addComplexType(
    'meeting_attendees',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:meeting_attendee[]')
    ),
	'tns:meeting_attendee'
);

$server->wsdl->addComplexType(
   	 'meeting_sync',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'processing_flag' => array('name' => 'processing_flag', 'type'=>'xsd:string'),
		'outlook_id' => array('name'=>'outlook_id', 'type'=>'xsd:string'),
		'sugar_id' => array('name'=>'sugar_id', 'type'=>'xsd:string'),
		'change_date' => array('name' => 'change_date', 'type'=>'xsd:string'),
		'name' => array('name'=>'name', 'type'=>'xsd:string'),
		'description' => array('name'=>'description', 'type'=>'xsd:string'),
		'location' => array('name'=>'location', 'type'=>'xsd:string'),
	    'type' => array('name'=>'type', 'type'=>'xsd:string'),
		'status' => array('name' => 'status', 'type'=>'xsd:string'),
		'date_start' => array('name' =>'date_start', 'type'=>'xsd:string'),
		'duration_hours' => array('name' =>'duration_hours', 'type'=>'xsd:string'),
		'duration_minutes' => array('name' =>'duration_minutes', 'type'=>'xsd:string'),
		'parent_type' => array('name' =>'parent_type', 'type'=>'xsd:string'),
		'parent_id' => array('name' =>'parent_id', 'type'=>'xsd:string'),
		'parent_name' => array('name' =>'parent_name', 'type'=>'xsd:string'),
		'assigned_user_id' => array('name' =>'assigned_user_id', 'type'=>'xsd:string'),
		'assigned_user_name' => array('name' =>'assigned_user_name', 'type'=>'xsd:string'),
		'attendees' => array('name' => 'attendees', 'type' => 'tns:meeting_attendees'),
	)
);

//these are just a list of fields we want to get
$server->wsdl->addComplexType(
    'meetings_sync',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:meeting_sync[]')
    ),
	'tns:meeting_sync'
);


// id & name pair for searching projects for accounts and conttacts
$server->wsdl->addComplexType(
   	 'kinamu_id_name',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array(
		'id' => array('name'=>'sugar_id', 'type'=>'xsd:string'),
		'name' => array('name'=>'name', 'type'=>'xsd:string'),		
	)
);

//these are just a list of fields we want to get
$server->wsdl->addComplexType(
    'kinamu_id_names',
	'complexType',
   	 'array',
   	 '',
  	  'SOAP-ENC:Array',
	array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:kinamu_id_name[]')
    ),
	'tns:kinamu_id_name'
);



?>