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

/*
 * Function to get all Attendees inclusing meeting status for a given activity
 * 
 */
$server->register(
    'get_relationships_activity',
    array('session'=>'xsd:string', 'module_name'=>'xsd:string', 'module_id'=>'xsd:string', 'related_module'=>'xsd:string', 'deleted'=>'xsd:int'),
    array('return'=>'tns:get_activity_attendee'),
    $NAMESPACE);

function get_relationships_activity($session, $module_name, $module_id, $related_module, $deleted){
		$error = new SoapError();
	$ids = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array('ids'=>$ids,'error'=> $error->get_soap_array());
	}
	global  $beanList, $beanFiles;
	$error = new SoapError();

	if(empty($beanList[$module_name]) || empty($beanList[$related_module])){
		$error->set_error('no_module');
		return array('ids'=>$ids, 'error'=>$error->get_soap_array());
	}
	$class_name = $beanList[$module_name];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();
	$mod->retrieve($module_id);
	if(!$mod->ACLAccess('DetailView')){
		$error->set_error('no_access');
		return array('ids'=>$ids, 'error'=>$error->get_soap_array());
	}

	$related_class_name = $beanList[$related_module];
	require_once($beanFiles[$related_class_name]);
	$related_mod = new $related_class_name();

	if($module_name == "Meetings")
	{
	   $sql = "SELECT meetings_users.user_id, meetings_users.date_modified, meetings_users.accept_status, users.first_name, users.last_name , email_addresses.email_address " 
	    . "FROM meetings_users "
	    . "INNER JOIN users ON meetings_users.user_id=users.id "
	    . "LEFT JOIN email_addr_bean_rel ON users.id=email_addr_bean_rel.bean_id AND email_addr_bean_rel.deleted = false AND email_addr_bean_rel.primary_address=true "
        . "LEFT JOIN email_addresses ON email_addresses.id = email_addr_bean_rel.email_address_id AND email_addresses.deleted=false "
	    . "WHERE meetings_users.meeting_id = '{$module_id}' AND meetings_users.deleted = {$deleted}";
	   
	   $result = $related_mod->db->query($sql);
	   while ($row = $related_mod->db->fetchByAssoc($result)) {
			$return_list[] = array(
			'id' => $row['user_id'],
			'name' => $row['first_name'] . " " . $row['last_name'],
			'email' => $row['email_address'],
			'type' => 'Users',
			'date_modified' => $row['date_modified'],
			'accept_status' => $row['accept_status']
			);
	   }

	   $sql = "SELECT meetings_contacts.contact_id, meetings_contacts.date_modified, meetings_contacts.accept_status, contacts.first_name, contacts.last_name, email_addresses.email_address "
	        . "FROM meetings_contacts "
	        . "INNER JOIN contacts ON meetings_contacts.contact_id=contacts.id "
	        . "LEFT JOIN email_addr_bean_rel ON meetings_contacts.contact_id=email_addr_bean_rel.bean_id AND email_addr_bean_rel.deleted = false AND email_addr_bean_rel.primary_address=true "
            . "LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id AND email_addresses.deleted=false "
	        . "WHERE meetings_contacts.meeting_id = '{$module_id}' and meetings_contacts.deleted = {$deleted}";
	     
	
	   $result = $related_mod->db->query($sql);
	   while ($row = $related_mod->db->fetchByAssoc($result)) {
			$return_list[] = array(
			'id' => $row['contact_id'],
			'name' => $row['first_name'] . " " . $row['last_name'],
			'email' => $row['email_address'],
			'type' => 'Contacts', 
			'date_modified' => $row['date_modified'],
			'accept_status' => $row['accept_status']
			);
	   }
	}

	if($module_name == "Calls")
	{
	   $sql = "SELECT calls_users.user_id, calls_users.date_modified, calls_users.accept_status, users.first_name, users.last_name , email_addresses.email_address " 
	    . "FROM calls_users "
	    . "INNER JOIN users ON calls_users.user_id=users.id "
	    . "LEFT JOIN email_addr_bean_rel ON users.id=email_addr_bean_rel.bean_id AND email_addr_bean_rel.deleted = false AND email_addr_bean_rel.primary_address=true "
        . "LEFT JOIN email_addresses ON email_addresses.id = email_addr_bean_rel.email_address_id AND email_addresses.deleted=false "
	    . "WHERE calls_users.call_id = '{$module_id}' AND calls_users.deleted = {$deleted}";
	   
	   $result = $related_mod->db->query($sql);
	   while ($row = $related_mod->db->fetchByAssoc($result)) {
			$return_list[] = array(
			'id' => $row['user_id'],
			'name' => $row['first_name'] . " " . $row['last_name'],
			'email' => $row['email_address'],
			'type' => 'Users',
			'date_modified' => $row['date_modified'],
			'accept_status' => $row['accept_status']
			);
	   }

	   $sql = "SELECT calls_contacts.contact_id, calls_contacts.date_modified, calls_contacts.accept_status, contacts.first_name, contacts.last_name, email_addresses.email_address "
	        . "FROM calls_contacts "
	        . "INNER JOIN contacts ON calls_contacts.contact_id=contacts.id "
	        . "LEFT JOIN email_addr_bean_rel ON calls_contacts.contact_id=email_addr_bean_rel.bean_id AND email_addr_bean_rel.deleted = false AND email_addr_bean_rel.primary_address=true "
            . "LEFT JOIN email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id AND email_addresses.deleted=false "
	        . "WHERE calls_contacts.call_id = '{$module_id}' and calls_contacts.deleted = {$deleted}";
	     
	
	   $result = $related_mod->db->query($sql);
	   while ($row = $related_mod->db->fetchByAssoc($result)) {
			$return_list[] = array(
			'id' => $row['contact_id'],
			'name' => $row['first_name'] . " " . $row['last_name'],
			'email' => $row['email_address'],
			'type' => 'Contacts', 
			'date_modified' => $row['date_modified'],
			'accept_status' => $row['accept_status']
			);
	   }
	}	
	
	return array('ids' => $return_list, 'error' => $error->get_soap_array());
}


/*
 * Function to set the status of an acitvity for an attendee
 */

$server->register(
    'set_relationships_activity',
    array('session'=>'xsd:string','set_relationship_activity_list'=>'tns:set_relationship_activity_list'),
    array('return'=>'tns:set_relationship_list_result'),
    $NAMESPACE);


function set_relationships_activity($session, $set_relationship_activity_list){
	$GLOBALS['log']->debug("KINAMU SOAP Call to relationship Activity");
	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return -1;
	}
	$count = 0;
	$failed = 0;
	foreach($set_relationship_activity_list as $set_relationship_activity_value){
		
		handle_set_activity_relationship($set_relationship_activity_value);
	}
	return array('created'=>$count , 'failed'=>$failed, 'error'=>$error);
}
/*
 * internal function to handel the relationships
 */
function handle_set_activity_relationship($set_relationship_activity_value)
{
    global  $beanList, $beanFiles;
    $error = new SoapError();

    $module1 = $set_relationship_activity_value['module1'];
    $module1_id = $set_relationship_activity_value['module1_id'];
    $module2 = $set_relationship_activity_value['module2'];
    $module2_id = $set_relationship_activity_value['module2_id'];
    // allow for Deletion
    $delete_flag = $set_relationship_activity_value['deleted'];
 
    if(empty($beanList[$module1]) || empty($beanList[$module2]) )
    {
        $error->set_error('no_module');
        return $error->get_soap_array();
    }
    $class_name = $beanList[$module1];
    require_once($beanFiles[$class_name]);
    $mod = new $class_name();
    $mod->retrieve($module1_id);
    
    $key = strtolower($module2);
    $mod->load_relationship($key);
    if($delete_flag != '1') {
    	$mod->$key->add($module2_id);
    } else {
    	$mod->$key->delete($module1_id, $module2_id);
    }
}

/*
 * KINAMU function to retrieve the contacts thet should be synced
 * returns similar result as the get relationship but is a litel bit easire to handle
 * from the SOAP Call
 */
$server->register(
    'get_contactstosync',
    array('session'=>'xsd:string', 'user_id'=>'xsd:string', 'changed_since'=>'xsd:string', 'deleted'=>'xsd:int'),
    array('return'=>'tns:get_relationships_result'),
    $NAMESPACE);


function get_contactstosync($session, $user_id, $changed_since, $deleted){
	$error = new SoapError();
	$ids = array();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array('ids'=>$ids,'error'=> $error->get_soap_array());
	}
	global  $beanList, $beanFiles;
	$error = new SoapError();

	
	$class_name = $beanList["Contacts"];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();
	
	$sql = "SELECT contacts.id, contacts.date_modified, contacts.deleted FROM contacts "
	        . "INNER JOIN contacts_users ON contacts.id = contacts_users.contact_id AND contacts_users.user_id ='" . $user_id . "' AND contacts_users.deleted = '" . $deleted ."' "
	        . "WHERE contacts.date_modified > '" . $changed_since . "'";    
   $return_list = array();
	
	   $result = $mod->db->query($sql);
	   while ($row = $mod->db->fetchByAssoc($result)) {

			$return_list[] = array(
			'id' => $row['id'], 
			'date_modified' => $row['date_modified'],
			'deleted' => $row['deleted']
			);
	   }

	return array('ids' => $return_list, 'error' => $error->get_soap_array());
}

/*
 * Function that retunrs the appountments to sync
 * one coimbined call that does this all on SugarSide
 * easier to handel and more performant
 */
$server->register(
    'kinamu_get_appointmentstosync',
    array('session'=>'xsd:string', 'user_id'=>'xsd:string', 'changed_since'=>'xsd:string', 'start_after'=>'xsd:string', 'module'=>'xsd:string'),
    array('return'=>'tns:get_syncids_meetings'),
    $NAMESPACE);


function kinamu_get_appointmentstosync($session, $user_id, $changed_since, $start_after, $module){
	$error = new SoapError();
	$ids = array();
	
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array('ids_changed'=>$ids, 'ids_deleted'=>$ids,'ids_new'=>$ids, 'error'=> $error->get_soap_array());
	}
	
	global  $beanList, $beanFiles;
	$error = new SoapError();

	
	$class_name = $beanList["Meetings"];
	require_once($beanFiles[$class_name]);
	$mod = new $class_name();
	
	// $GLOBALS['log']->debug("SOAP Requesting meetings");
	// get all meetings changed or deleted since that date
	if($module == "Meetings")
	{
	$sql = "SELECT DISTINCT meetings.id, meetings.name, meetings.date_start, meetings.duration_hours, meetings.duration_minutes, meetings.location, meetings.description, meetings.status, meetings.parent_type, meetings.parent_id, meetings.date_modified, "
	        . "meetings.deleted, meetings_users.deleted AS linkdeleted, meetings.assigned_user_id, users.user_name as assigned_user_name, meetings_users.accept_status FROM meetings "
			. "INNER JOIN users on meetings.assigned_user_id = users.id "
			. "INNER JOIN meetings_users ON meetings.id = meetings_users.meeting_id AND meetings_users.user_id ='" . $user_id . "' " //AND meetings_users.deleted = '0' "
	        . "WHERE meetings.date_modified > '" . $changed_since . "' AND meetings.date_entered < '" . $changed_since ."' AND meetings.date_start > '" . $start_after . "'";// AND meetings.deleted = '0'";
	}    
	if($module == "Calls")
	{
	$sql = "SELECT DISTINCT calls.id, calls.name, calls.date_start, calls.duration_hours, calls.duration_minutes, '' as location, calls.description, calls.status, calls.parent_type, calls.parent_id, calls.date_modified, "
	        . "calls.deleted, calls_users.deleted AS linkdeleted, calls.assigned_user_id, users.user_name as assigned_user_name, calls_users.accept_status FROM calls "
			. "INNER JOIN users on calls.assigned_user_id = users.id "
			. "INNER JOIN calls_users ON calls.id = calls_users.call_id AND calls_users.user_id ='" . $user_id . "' " //AND meetings_users.deleted = '0' "
	        . "WHERE calls.date_modified > '" . $changed_since . "' AND calls.date_entered < '" . $changed_since ."' AND calls.date_start > '" . $start_after . "'";// AND meetings.deleted = '0'";
	}   
	        
	$return_list = array();
    $return_list_deleted = array();
	
	   $result = $mod->db->query($sql);
	   while ($row = $mod->db->fetchByAssoc($result)) {
   		
	   	// sort record into changed or deleted
	   	 if($row['deleted'] == '1' OR $row['linkdeleted'] == '1')
	   	 {
			$return_list_deleted[] = array(
			'id' => $row['id'], 
			'deleted' => $row['deleted'], 
			'linkdeleted' => $row['linkdeleted'],
			);
	   	 } else
	   	 {
			$return_list[] = array(
			'id' => $row['id'], 
			'date_modified' => $row['date_modified'],
			'deleted' => $row['deleted'], 
			'linkdeleted' => $row['linkdeleted'],
			'assigned_user_id' => $row['assigned_user_id'],
			'name' => $row['name'],
			'date_start' => $row['date_start'],
			'duration_hours' => $row['duration_hours'],
			'duration_minutes' => $row['duration_minutes'],
			'location' => $row['location'], 
			'description' => $row['description'], 
			'status' => $row['status'], 
			'parent_type' => $row['parent_type'],
			'parent_id' => $row['parent_id'],
			'assigned_user_name' => $row['assigned_user_name'],
			'accept_status' => $row['accept_status'],
			);
	   	 }

	   }
 
	// get all meetings created since that date
	if($module == "Meetings")
	{
	$sql = "SELECT DISTINCT meetings.id, meetings.name, meetings.date_start, meetings.duration_hours, meetings.duration_minutes, meetings.location, meetings.description, meetings.status, meetings.parent_type, meetings.parent_id, meetings.date_modified, "
	        . "meetings.deleted, meetings_users.deleted AS linkdeleted, meetings.assigned_user_id, users.user_name as assigned_user_name, meetings_users.accept_status FROM meetings "
	   		. "INNER JOIN users on meetings.assigned_user_id = users.id "
	        . "INNER JOIN meetings_users ON meetings.id = meetings_users.meeting_id AND meetings_users.user_id ='" . $user_id . "' " // AND meetings_users.deleted = '0' "
	        . "WHERE meetings.date_entered > '" . $changed_since . "' AND meetings.date_start > '" . $start_after . "'"; // AND meetings.deleted = '0'";    
	}
	if($module == "Calls")
	{
	$sql = "SELECT DISTINCT calls.id, calls.name, calls.date_start, calls.duration_hours, calls.duration_minutes, '' as location, calls.description, calls.status, calls.parent_type, calls.parent_id, calls.date_modified, "
	        . "calls.deleted, calls_users.deleted AS linkdeleted, calls.assigned_user_id, users.user_name as assigned_user_name, calls_users.accept_status FROM calls "
	   		. "INNER JOIN users on calls.assigned_user_id = users.id "
	        . "INNER JOIN calls_users ON calls.id = calls_users.call_id AND calls_users.user_id ='" . $user_id . "' " // AND meetings_users.deleted = '0' "
	        . "WHERE calls.date_entered > '" . $changed_since . "' AND calls.date_start > '" . $start_after . "'"; // AND meetings.deleted = '0'";    
	}  
    $return_list_new = array();	        
	        
	   $result = $mod->db->query($sql);
	   while ($row = $mod->db->fetchByAssoc($result)) {

			$return_list_new[] = array(
			'id' => $row['id'], 
			'date_modified' => $row['date_modified'],
			'deleted' => $row['deleted'], 
			'linkdeleted' => $row['linkdeleted'],
			'assigned_user_id' => $row['assigned_user_id'],
			'name' => $row['name'],
			'date_start' => $row['date_start'],
			'duration_hours' => $row['duration_hours'],
			'duration_minutes' => $row['duration_minutes'],
			'location' => $row['location'], 
			'description' => $row['description'], 
			'status' => $row['status'], 
			'parent_type' => $row['parent_type'],
			'parent_id' => $row['parent_id'],
			'assigned_user_name' => $row['assigned_user_name'],
			'accept_status' => $row['accept_status'],			
			);
	   }	   
	   
	return array('ids_changed' => $return_list, 'ids_deleted' => $return_list_deleted, 'ids_new' => $return_list_new, 'error' => $error->get_soap_array());
}


/*
 * KINAMU Derivate from the original Sugar Function
 * this one differentiates between leads and Contacts 
 * also handles leads properly with the subsequent functions
 */

$server->register(
    'kinamu_contact_by_email',
//    array('user_name'=>'xsd:string','password'=>'xsd:string', 'email_address'=>'xsd:string'),
    array('session'=>'xsd:string', 'email_address'=>'xsd:string'),
    array('return'=>'tns:contact_detail_array'),
    $NAMESPACE);


/**
 * Kinamu adoption of the standard functionality - this also adds leads to a contact 
 * and ensures that teh functions does not dump if obejcts other than the
 * contact has the email assigned (e.g. leads)
 */
//function kinamu_contact_by_email($user_name, $password, $email_address)
function kinamu_contact_by_email($session, $email_address)
{

	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array();
	}
	$seed_contact = new Contact();
	$seed_lead = new Lead();
	$output_list = Array();
	$email_address_list = explode("; ", $email_address);

	// remove duplicate email addresses
	$non_duplicate_email_address_list = Array();
	foreach( $email_address_list as $single_address)
	{
		// Check to see if the current address is a match of an existing address
		$found_match = false;
		foreach( $non_duplicate_email_address_list as $non_dupe_single)
		{
			if(strtolower($single_address) == $non_dupe_single)
			{
				$found_match = true;
				break;
			}
		}

		if($found_match == false)
		{
			$non_duplicate_email_address_list[] = strtolower($single_address);
		}
	}

	// now copy over the non-duplicated list as the original list.
	$email_address_list =$non_duplicate_email_address_list;

	// Track the msi_id
	$msi_id = 1;

	foreach( $email_address_list as $single_address)
	{
	    // verify that contacts can be listed
	    $GLOBALS['log']->fatal("KINAMU SOAP - searching Contacts");
		if($seed_contact->ACLAccess('ListView')){
			kinamu_add_contacts_matching_email_address($output_list, $single_address, $seed_contact, $msi_id);
		}
		// verify that leads can be listed
		$GLOBALS['log']->fatal("KINAMU SOAP - searching Leads");
		if($seed_lead->ACLAccess('ListView')){
			kinamu_add_leads_matching_email_address($output_list, $single_address, $seed_lead, $msi_id);
		}
	}

	return $output_list;
}

/*
 * internal function adoption of the standard
 * adding Leads as well and checking on the type of the found bean returned by the search by email
 */
function kinamu_add_contacts_matching_email_address(&$output_list, $email_address, &$seed_contact, &$msi_id)
{
    // escape the email address
	$safe_email_address = addslashes($email_address);
	global $current_user;

	// Verify that the user has permission to see Contact list views
	if(!$seed_contact->ACLAccess('ListView'))
	{
		return;
	}

	$contactList = $seed_contact->emailAddress->getBeansByEmailAddress($safe_email_address);
	// create a return array of names and email addresses.
	foreach($contactList as $contact)
	{
		if($contact->object_name == "Contact")
		{
		$output_list[] = Array("name1"	=> $contact->first_name,
			"name2" => $contact->last_name,
			"association" => $contact->account_name,
			"type" => 'Contact',
			"id" => $contact->id,
			"msi_id" => $msi_id,
			"email_address" => $contact->email1);

        $accounts = $contact->get_linked_beans('accounts','Account');
		foreach($accounts as $account)
		{
			$output_list[] = get_account_array($account, $msi_id);
		}

        $opps = $contact->get_linked_beans('opportunities','Opportunity');
		foreach($opps as $opp)
		{
			$output_list[] = get_opportunity_array($opp, $msi_id);
		}

        $cases = $contact->get_linked_beans('cases','aCase');
		foreach($cases as $case)
		{
			if($case->status != 'Closed' && $case->status != 'Rejected' )
				$output_list[] = get_case_array($case, $msi_id);
		}

		 $bugs = $contact->get_linked_beans('bugs','Bug');
		foreach($bugs as $bug)
		{
			$output_list[] = get_bean_array($bug, $msi_id, 'Bug');
		}

		$projects = $contact->get_linked_beans('project','Project');
		foreach($projects as $project)
		{
			$output_list[] = get_bean_array($project, $msi_id, 'Project');
		}

		// add discover yof leads to the contact as well 
		$leads = $contact->get_linked_beans('leads','Lead');
		foreach($leads as $lead)
		{
			$output_list[] = get_lead_array($lead, $msi_id, 'Lead');
		}
		}
		$msi_id = $msi_id + 1;
	}
}

/**
 * internal function adoption of the standard that 
 * checks if the found bean is a lead or not
 */
function kinamu_add_leads_matching_email_address(&$output_list, $email_address, &$seed_lead, &$msi_id)
{
	$safe_email_address = addslashes($email_address);
	if(!$seed_lead->ACLAccess('ListView')){
		return;
	}

	$leadList = $seed_lead->emailAddress->getBeansByEmailAddress($safe_email_address);

	// create a return array of names and email addresses.
	foreach($leadList as $lead)
	{
		if($lead->object_name == "Lead")
		{
						$output_list[] = get_lead_array($lead, $msi_id, 'Lead');
		}
		$msi_id = $msi_id + 1;
		
	}
}

/*
 * internal function to see if the Plugin is registered
 * simply returns true ... try/catch in the plugin to see if we succeed with the call 
 * .. if yes we assuem it has been properly installed
 */
$server->register(
    'check_kinamu_soap_enhancement',
    array('session'=>'xsd:string'),
    array('return'=>'xsd:int'),
    $NAMESPACE);

function check_kinamu_soap_enhancement($session){
	if(validate_authenticated($session)){
		global $current_user;
		return 1;

	}else{
		return 0;
	}
}   
 

/*
 * KINAMU function to get the version of the plugin installed 
 */
$server->register(
    'get_kinamu_soap_enhancement_version',
    array(),
    array('return'=>'xsd:string'),
    $NAMESPACE);

function get_kinamu_soap_enhancement_version(){

		return "1.6.0";

}    


/*
 *  KINAMU enhancement to also get the release level
 */
$server->register(
    'kinamu_get_server_version',
    array(),
    array('return'=>'xsd:string'),
    $NAMESPACE);

function kinamu_get_server_version(){
 global $sugar_version;
 require_once('sugar_version.php');
 return $sugar_version;
}


/*
 *  KINAMU enhancement to support LDAP
 */

$server->register(
    'kinamu_check_ldap',
    array(),
    array('return'=>'xsd:int'),
    $NAMESPACE);

function kinamu_check_ldap(){

	 global $db;
     $enc_key = "";
 
     $query = "Select value from config where category = 'system' and name = 'ldap_enabled'";
     $result = $db->query($query);
     if(($resultValue = $db->fetchByAssoc($result)) && ($resultValue['value'] == '1'))
         return 1;
     else
         return 0;
} 

$server->register(
    'kinamu_get_ldap_key',
    array(),
    array('return'=>'xsd:string'),
    $NAMESPACE);

function kinamu_get_ldap_key(){
 global $db;
 $enc_key = "";
 
 $query = "Select value from config where category = 'ldap' and name = 'enc_key'";
 $result = $db->query($query);
 if($resultValue = $db->fetchByAssoc($result))
    $enc_key = $resultValue['value'];

 return $enc_key;
}


// function that receives all Meetings from Outllook and returns the ones relevant for Outlook
// to change there .. processes sync logic
$server->register(
    'syncronize_meeting',
    array('session'=>'xsd:string', 'changed_since' => 'xsd:string', 'start_after' => 'xsd:string' , 'module' => 'xsd:string', 'meetings' => 'tns:meetings_sync', 'syncmode' => 'xsd:string'),
    array('return'=>'tns:meetings_sync'),
    $NAMESPACE);

function syncronize_meeting($session, $changed_since, $start_after, $module, $meetings, $syncmode){
	
	global $current_user, $db;
	$resultArray = array();
	$sugarMeetings = array();
	require_once('modules/Meetings/Meeting.php');
	
	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array();
	}
	
	// get all Meeting in Sugar that have been changed since the sync date
	$sql = "SELECT DISTINCT meetings.id, meetings.deleted, meetings_users.deleted as user_deleted FROM meetings "
		. "INNER JOIN users on meetings.assigned_user_id = users.id "
		. "INNER JOIN meetings_users ON meetings.id = meetings_users.meeting_id AND meetings_users.user_id ='" . $current_user->id . "' " 
        . "WHERE (meetings.date_modified > '" . $changed_since . "' OR meetings_users.date_modified > '" . $changed_since . "') "
        . "AND meetings.date_start > '" . $start_after . "'";

	$GLOBALS['log']->fatal("KINAMU SOAP - searching Meetings " . $sql);
	
	$queryResult = $db->query($sql);
	
	$GLOBALS['log']->fatal("KINAMU SOAP - selected Meetings in Sugar " . $db->getRowCount($queryResult));
	
	$GLOBALS['log']->fatal("KINAMU SOAP - received meetings count " . count($queryResult));
	

	while($currentRow = $db->fetchByAssoc($queryResult))
	{

		$GLOBALS['log']->fatal("KINAMU SOAP - processing sugarMeeting " . implode(',' ,$currentRow));
		
			// make a new meeting object 
			$currentMeeting = new Meeting();
			
			// set the deleted flag so also eleted items will get retrieved
			$currentMeeting->deleted = false;
			
			// retrieve the current meeting to have the bean and also do ecurity checks
			$currentMeeting->retrieve($currentRow['id']);
			
			// if we get a meeting (id is set) process it if not the user relationship is deleted
			if($currentMeeting->id != '' && $currentRow['user_deleted'] != '1')
			{	
				$sugarMeetings[$currentMeeting->id]['Meeting'] = $currentMeeting;
			}
			
			// mark for deletion if either the meeting is deleted or the user assignment is deleted
			if(($currentRow['deleted'] == '1' && $currentMeeting->id == '') || $currentRow['user_deleted'] == '1')
			{
				$currentMeeting->id =  $currentRow['id'];
				$currentMeeting->deleted = '1';
				$sugarMeetings[$currentRow['id']]['Meeting'] = $currentMeeting;
				
				$GLOBALS['log']->fatal("KINAMU SOAP - flagging meeting for deletion " . $currentRow['id']);
			}
	}
	
	
	$GLOBALS['log']->fatal("KINAMU SOAP - found in Sugar meetings count " . count($sugarMeetings));
	
	// now we have two array with meetings from either side ..
	// process sync looping thorugh the meeting we received from Outlook
	
	$GLOBALS['log']->fatal("KINAMU SOAP - syncmode is " . $syncmode);
	
	// first create all new meetings ... 
	foreach($meetings as $outlookMeeting)
	{
		//if($outlookMeeting->sugar_id == '')
		//{
		
		
		// compare ids
		if(isset($sugarMeetings[$outlookMeeting['sugar_id']]))
		{
			switch($syncmode)
			{
				case '0':
					// compare change dates if meeting is not flagged for deletion (deletion wins in any case
					if(strtotime($sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified) < strtotime($outlookMeeting['change_date']) && !$sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->deleted)
					{
						// update the meeting in Sugar
						kinamu_sugar_meeting_from_outlook($outlookMeeting);	
						$GLOBALS['log']->fatal("KINAMU SOAP - Outlook Wins " . $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified . ' ' . $outlookMeeting['change_date'] );
					}
					else
					{
						// sugar has the more up to date record
						// create an entry in the return array that will be passed back to Outlook
						kinamu_sugar_meeting_create_return_entry($resultArray, $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting'] );
						$GLOBALS['log']->fatal("KINAMU SOAP - Sugar Wins " . $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified . ' ' . $outlookMeeting['change_date'] );
						$GLOBALS['log']->fatal("KINAMU SOAP - Sugar Wins " . strtotime($sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified) . ' ' . strtotime($outlookMeeting['change_date']) );
						
					}
					break;
				case '1':
					// Outlook wins
					kinamu_sugar_meeting_from_outlook($outlookMeeting);	
					$GLOBALS['log']->fatal("KINAMU SOAP - Outlook Wins " . $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified . ' ' . $outlookMeeting['change_date'] );
					break;
				case '2':
					// sugar wins
					kinamu_sugar_meeting_create_return_entry($resultArray, $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting'] );
					$GLOBALS['log']->fatal("KINAMU SOAP - Sugar Wins " . $sugarMeetings[$outlookMeeting['sugar_id']]['Meeting']->date_modified . ' ' . $outlookMeeting['change_date'] );
					break;
			}
			// in any case - unset the entry
			unset($sugarMeetings[$outlookMeeting['sugar_id']]);
		}
		else
		{
			// create meeting from Outlook since we have not found a record in Sugar
			kinamu_sugar_meeting_from_outlook($outlookMeeting);			

		}
	}

	// process remaining entries in the sugar meetings array - 
	// they are all meetings not yet in Outlook or changed in Sugar
	reset($sugarMeetings);
	foreach($sugarMeetings as $sugarMeeting)
	{
		kinamu_sugar_meeting_create_return_entry($resultArray, $sugarMeeting['Meeting'] );
	}
	
	// return the array to Outlook with the meetings that need an update
	return $resultArray;
	
}   

function kinamu_sugar_meeting_from_outlook($outlookMeeting)
{
		global $current_user;
		
		// variable to see if we have a new meeting 
		// relevant for the attendees
		$newMeeting = false;
		
		$thisMeeting = new Meeting();
		$thisMeeting->retrieve($outlookMeeting['sugar_id']);
		if($thisMeeting->id == "")
		{
			$thisMeeting->id = $outlookMeeting['sugar_id'];
			// id is set from Outlook
			$thisMeeting->new_with_id = true;
			
			// set flag
			$newMeeting = true;
		}
	
		$thisMeeting->name = $outlookMeeting['name'];
		$thisMeeting->description = $outlookMeeting['description'];
		$thisMeeting->location = $outlookMeeting['location'];
		$thisMeeting->date_created = $outlookMeeting['change_date'];
		$thisMeeting->date_modified = $outlookMeeting['change_date'];
		$thisMeeting->date_start = $outlookMeeting['date_start'];
		$thisMeeting->duration_hours = $outlookMeeting['duration_hours'];
		$thisMeeting->duration_minutes = $outlookMeeting['duration_minutes'];
		$thisMeeting->status = $outlookMeeting['status'];
		$thisMeeting->parent_type = $outlookMeeting['parent_type'];
		$thisMeeting->parent_id = $outlookMeeting['parent_id'];
		
		// set user id
		$thisMeeting->assigned_user_id = $current_user->id;
		
		// set dates manually
		$thisMeeting->update_date_entered = false;
		$thisMeeting->update_date_modified = false;
		

		$GLOBALS['log']->fatal("KINAMU SOAP - saving meeting in Sugar " . $thisMeeting->id );
		
		
		// save meeting
		$thisMeeting->save();
		
		// process attendees
		if(is_array($outlookMeeting['attendees']) && count($outlookMeeting['attendees']) > 0)
		{

			$GLOBALS['log']->fatal("KINAMU SOAP - processing " .  count($outlookMeeting['attendees']) . ' Attendees');
						
			// if we have an existing meeting get the attendees
			if(!$newMeeting) 
			{
				$attendeeArray = kinamu_get_attendee_array($thisMeeting->id);
			}

			// process the attendees
			foreach($outlookMeeting['attendees'] as $outlookAttendee)
			{
				kinamu_update_attendee($thisMeeting->id, $outlookAttendee, $outlookMeeting['change_date']);
				if(isset($attendeeArray[$outlookMeeting['attendees']['sugar_id']]))
					unset($attendeeArray[$outlookMeeting['attendees']['sugar_id']]);
			}
		}
		
}

function kinamu_sugar_meeting_create_return_entry(&$resultArray, $currentMeeting)
{
	
	$resultArray[] = array(
				'processing_flag' => ($currentMeeting->deleted) ? 'D' : '',
				'outlook_id' => '',
				'sugar_id' => $currentMeeting->id,
				'change_date' => $currentMeeting->date_modified,
				'name' => $currentMeeting->name,
				'description' => $currentMeeting->description,
				'location' => $currentMeeting->location,
				'type' => 'Meetings',
				'status' => $currentMeeting->status,
				'date_start' => $currentMeeting->date_start,
				'duration_hours' => $currentMeeting->duration_hours,
				'duration_minutes' => $currentMeeting->duration_minutes,
				'parent_type' => $currentMeeting->parent_type,
				'parent_id' => $currentMeeting->parent_id,
				'parent_name' => $currentMeeting->parent_name,
				'assigned_user_id' => $currentMeeting->assigned_user_id,
				'assigned_user_name' => $currentMeeting->assigned_user_name,
	
				'attendees' => kinamu_get_attendee_array($currentMeeting->id),
	);
	
	$GLOBALS['log']->fatal("KINAMU SOAP - preparing result array " .  $currentMeeting->id );
	
	
}

function kinamu_get_attendee_array($id){
	global $db;
	
	$sql = "select 'Contacts' as invType, email_addresses.email_address, meetings_contacts.id, concat(contacts.first_name, ' ', contacts.last_name) as name, meetings_contacts.contact_id as participant_id, meetings_contacts.accept_status, meetings_contacts.deleted from meetings_contacts "
	     . "inner join contacts on contacts.id = meetings_contacts.contact_id "
	     . "left join email_addr_bean_rel on contacts.id = email_addr_bean_rel.bean_id "
	     . "left join email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id "
		 . "where meeting_id = '" . $id . "' "
		 . "union "
		 . "select 'Users' as invType, email_addresses.email_address,  meetings_users.id, concat(users.first_name, ' ', users.last_name) as name, meetings_users.user_id as participant_id, meetings_users.accept_status, meetings_users.deleted from meetings_users "
		 . "inner join users on users.id = meetings_users.user_id "
	     . "left join email_addr_bean_rel on users.id = email_addr_bean_rel.bean_id "
	     . "left join email_addresses on email_addresses.id = email_addr_bean_rel.email_address_id "		 
		 . "where meeting_id = '" . $id . "'";
	
	$attendeeResult = $db->query($sql);	
	
	// resetthe array of attendees
	$attendeeArray = array();
	
	while($currentAttendee = $db->fetchByAssoc($attendeeResult))
	{
		if( $currentAttendee['deleted'] == '0')
		{
			$attendeeArray[$currentAttendee['participant_id']] = array(
				'sugar_id' => $currentAttendee['participant_id'], 
			    'type' => $currentAttendee['invType'],
				'name' => $currentAttendee['name'],	
				'email' => $currentAttendee['email_address'],	
				'status' => $currentAttendee['status'],	
				'deleted' => $currentAttendee['deleted'],	
			);
		}
	}
	
	return $attendeeArray;
}

function kinamu_update_attendee($meetingId, $attendee, $change_date)
{
	require_once('include/utils.php');
	
	global $db;
	
	switch($attendee['type'])
	{
		case 'User':
			$sql = "select * from meetings_users where meeting_id = '" . $meetingId ."' and user_id = '" . $attendee['sugar_id'] . "'";
			$sqlResult = $db->query($sql);
			$GLOBALS['log']->fatal("KINAMU SOAP - looking up attendees " .  $sql );  
			
			if($db->getRowCount($sqlResult) == 1)
			{
				// check if delete flag is the same
				$sqlRow = $db->fetchByAssoc($sqlResult);
				//if($sqlRow['deleted'] != $attendee['deleted'])
				//{
					// no - update record
					$sql = "update meetings_users set deleted = '" . $attendee['deleted'] . "' where id = '" . $sqlRow['id'] . "'";
					$GLOBALS['log']->fatal("KINAMU SOAP - updating attendee Relationship " .  $sql );  
					$db->query($sql);
				//}
				// we have a record
			} 
			else
			{
				// nothing found create a record
				$sql = "insert into meetings_users values ("
				     . "'" . create_guid() . "',"
				     . "'" . $meetingId . "',"
				     . "'" . $attendee['sugar_id'] . "',"
				     . "'1', 'none',"
				     . "'" . $change_date . "',"
				     . "'" . $attendee['deleted'] . "')";
				     
				  $GLOBALS['log']->fatal("KINAMU SOAP - creating attendee Relationship " .  $sql );   
				     
				 $db->query($sql);
			}
			break;
		
		case 'Contact':
			$sql = "select * from meetings_contacts where meeting_id = '" . $meetingId ."' and contact_id = '" . $attendee['sugar_id'] . "'";
			$sqlResult = $db->query($sql);
			$GLOBALS['log']->fatal("KINAMU SOAP - looking up attendees " .  $sql );  
			
			if($db->getRowCount($sqlResult) == 1)
			{
				// check if delete flag is the same
				$sqlRow = $db->fetchByAssoc($sqlResult);
				if($sqlRow['deleted'] != $attendee['deleted'])
				{
					// no - update record
					$sql = "update meetings_contacts set deleted = '" . $attendee['deleted'] . "' where id = '" . $sqlRow['id'] . "'";
					$GLOBALS['log']->fatal("KINAMU SOAP - updating attendee Relationship " .  $sql );  
					$db->query($sql);
				}
				// we have a record
			} 
			else
			{
				// nothing found create a record
				$sql = "insert into meetings_contacts values ("
				     . "'" . create_guid() . "',"
				     . "'" . $meetingId . "',"
				     . "'" . $attendee['sugar_id'] . "',"
				     . "'1', 'none',"
				     . "'" . $change_date . "',"
				     . "'" . $attendee['deleted'] . "')";
				     
				  $GLOBALS['log']->fatal("KINAMU SOAP - creating attendee Relationship " .  $sql );   
				     
				 $db->query($sql);
			}
			break;
	}
}

$server->register(
    'kinamu_validate_session',
    array('session'=>'xsd:string'),
    array('return'=>'xsd:int'),
    $NAMESPACE);

/**
* check if the current session is still authenticated
 */
function kinamu_validate_session($session){
		if(!validate_authenticated($session)){
			return 0;
		}
		return 1;
}


// function to retrieve Projects 
$server->register(
    'kinamu_retrieve_projects',
    array('session'=>'xsd:string', 'contact_ids' => 'tns:kinamu_id_names', 'account_ids' => 'tns:kinamu_id_names' ),
    array('return'=>'tns:kinamu_id_names'),
    $NAMESPACE);

/**
* check if the current session is still authenticated
 */
function kinamu_retrieve_projects($session, $contacts, $accounts){

	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return array();
	}
	
	$returnArray = array();
	
	
	require_once('modules/Accounts/Account.php');
	
	foreach($accounts as $accountpair)
	{
		$thisAccount = new Account();
		$thisAccount->retrieve($accountpair['id']);
		
		if($thisAccount->id != '')
		{
			
		    $projects = $thisAccount->get_linked_beans('project','Project');
		    
			foreach($projects as $project)
			{
				$returnArray[$project->id] = array(
					'id' => $project->id, 
					'name' => $project->name,
				);
			}

		}
		
	}
	
	require_once('modules/Contacts/Contact.php');
	
	foreach($contacts as $contactpair)
	{
		$thisContact = new Contact();
		$thisContact->retrieve($contactpair['id']);
		if($thisContact->id != '')
		{
		    $projects = $thisContact->get_linked_beans('project','Project');
			foreach($projects as $project)
			{
				$returnArray[$project->id] = array(
					'id' => $project->id, 
					'name' => $project->name,
				);
			}
		}
	}
	
	return $returnArray;
}

// modified set Relationship to allow for deletion and also for establishing links to projects
$server->register(
    'kinamu_set_relationship',
    array('session'=>'xsd:string','set_relationship_value'=>'tns:set_relationship_value'),
    array('return'=>'tns:error_value'),
    $NAMESPACE);

/**
 * Set a single relationship between two beans.  The items are related by module name and id.
 *
 * @param String $session -- Session ID returned by a previous call to login.
 * @param Array $set_relationship_value --
 *      'module1' -- The name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
 *      'module1_id' -- The ID of the bean in the specified module
 *      'module2' -- The name of the module that the related record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
 *      'module2_id' -- The ID of the bean in the specified module
 * @return Empty error on success, Error on failure
 */
function kinamu_set_relationship($session, $set_relationship_value){
	$error = new SoapError();
	if(!validate_authenticated($session)){
		$error->set_error('invalid_login');
		return $error->get_soap_array();
	}
	return kinamu_handle_set_relationship($set_relationship_value);
}
function kinamu_handle_set_relationship($set_relationship_value)
{
    global  $beanList, $beanFiles;
    $error = new SoapError();

    $module1 = $set_relationship_value['module1'];
    $module1_id = $set_relationship_value['module1_id'];
    $module2 = $set_relationship_value['module2'];
    $module2_id = $set_relationship_value['module2_id'];
    // allow for Deletion
    $delete_flag = $set_relationship_value['deleted'];

    if(empty($beanList[$module1]) || empty($beanList[$module2]) )
    {
        $error->set_error('no_module');
        return $error->get_soap_array();
    }
    $class_name = $beanList[$module1];
    require_once($beanFiles[$class_name]);
    $mod = new $class_name();
    $mod->retrieve($module1_id);
	if(!$mod->ACLAccess('DetailView')){
		$error->set_error('no_access');
		return $error->get_soap_array();
	}
	if($module1 == "Contacts" && $module2 == "Users"){
		// needs to be handeld this way - funny enough to allow for unlinking
		// modification KINAMU
		if($delete_flag != 'X')
		{
			$key = 'contacts_users_id';
		}else{
			$key = 'user_sync';
		}
	}
	
	// Modifikation KINAMU to allow for relaitonship between Projects and Cases
	if($module1 == "Project" && $module2 == "Cases"){
		
			$key = 'cases';
			
			$mod->load_relationship($key);
			$mod->$key->add($module2_id);
			return $error->get_soap_array();
	}
	
	else{
    	$key = array_search(strtolower($module2),$mod->relationship_fields);
    	if (!$key) {
    		require_once('modules/Relationships/Relationship.php');
    		$key = Relationship::retrieve_by_modules($module1, $module2, $GLOBALS['db']);
    		if (!empty($key)) {
    			$mod->load_relationship($key);
    			$mod->$key->add($module2_id);
    			return $error->get_soap_array();
    		} // if
    	} // if
	}

    if(!$key)
    {
        $error->set_error('no_module');
        return $error->get_soap_array();
    }

    if(($module1 == 'Meetings' || $module1 == 'Calls') && ($module2 == 'Contacts' || $module2 == 'Users')){
    	$key = strtolower($module2);
    	$mod->load_relationship($key);
    	// allow for Deletion of link between contact/users and Calls/meeting
    	// KINAMU
    	if($delete_flag != 'X') {
    		$mod->$key->add($module2_id);
    	} else {
    		$mod->$key->delete($module1_id, $module2_id);
    	}
    }else{
    	// Also allow for Deletion between other modules
    	// KINAMU
    	 if($delete_flag != 'X') {
    		$mod->$key = $module2_id;
    		$mod->save_relationship_changes(false);
    	} else {
        	$mod->$key->delete($module1_id, $module2_id);
    	}
    }
   
    return $error->get_soap_array();
}
?>