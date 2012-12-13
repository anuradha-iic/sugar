<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$dictionary['nli_ServiceAddresses'] = array(
	'table'=>'nli_serviceaddresses',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
  'service_address_city' => 
  array (
    'required' => true,
    'name' => 'service_address_city',
    'vname' => 'LBL_SERVICE_ADDRESS_CITY',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
  ),
  'service_address_state' => 
  array (
    'required' => true,
    'name' => 'service_address_state',
    'vname' => 'LBL_SERVICE_ADDRESS_STATE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
  ),
  'service_address_postalcode' => 
  array (
    'required' => true,
    'name' => 'service_address_postalcode',
    'vname' => 'LBL_SERVICE_ADDRESS_POSTALCODE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 20,
    'size' => '20',
  ),
  'service_address_country' => 
  array (
    'required' => false,
    'name' => 'service_address_country',
    'vname' => 'LBL_SERVICE_ADDRESS_COUNTRY',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
  ),
  'service_address_street' => 
  array (
    'required' => true,
    'name' => 'service_address_street',
    'vname' => 'LBL_SERVICE_ADDRESS',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'client_occupation_date' => 
  array (
    'required' => false,
    'name' => 'client_occupation_date',
    'vname' => 'LBL_CLIENT_OCCUPATION_DATE',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'enable_range_search' => false,
    'display_default' => 'now',
  ),
  'extend_dmarc' => 
  array (
    'required' => false,
    'name' => 'extend_dmarc',
    'vname' => 'LBL_EXTEND_DMARC',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'yes_no_option_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'is_private_residence' => 
  array (
    'required' => false,
    'name' => 'is_private_residence',
    'vname' => 'LBL_IS_PRIVATE_RESIDENCE',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'No',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'yes_no_option_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'interaction_pmgr_requred' => 
  array (
    'required' => false,
    'name' => 'interaction_pmgr_requred',
    'vname' => 'LBL_INTERACTION_PMGR_REQURED',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'yes_no_option_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'mpoe_access' => 
  array (
    'required' => false,
    'name' => 'mpoe_access',
    'vname' => 'LBL_MPOE_ACCESS',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'yes_no_option_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'demarc_location' => 
  array (
    'required' => false,
    'name' => 'demarc_location',
    'vname' => 'LBL_DEMARC_LOCATION',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'ip_required' => 
  array (
    'required' => false,
    'name' => 'ip_required',
    'vname' => 'LBL_IP_REQUIRED',
    'type' => 'varchar',
    'massupdate' => 0,
    'default' => '29',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  'nextlevel_router' => 
  array (
    'required' => false,
    'name' => 'nextlevel_router',
    'vname' => 'LBL_NEXTLEVEL_ROUTER',
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
    'rows' => '4',
    'cols' => '20',
  ),
  'additional_nextlevel_hardware' => 
  array (
    'required' => false,
    'name' => 'additional_nextlevel_hardware',
    'vname' => 'LBL_ADDITIONAL_NEXTLEVEL_HARDWARE',
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
    'rows' => '4',
    'cols' => '20',
  ),
  'hours_of_operation' => 
  array (
    'required' => false,
    'name' => 'hours_of_operation',
    'vname' => 'LBL_HOURS_OF_OPERATION',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('nli_ServiceAddresses','nli_ServiceAddresses', array('basic','assignable'));
