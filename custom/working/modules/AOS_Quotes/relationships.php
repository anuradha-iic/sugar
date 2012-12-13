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

$relationships = array (
  'contact_aos_quotes' => 
  array (
    'id' => '57cea935-1fb8-4e0a-13c9-507be217e982',
    'relationship_name' => 'contact_aos_quotes',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Quotes',
    'rhs_table' => 'aos_quotes',
    'rhs_key' => 'billing_contact_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'account_aos_quotes' => 
  array (
    'id' => '5ea77ba5-f18b-be75-8075-507be2726de5',
    'relationship_name' => 'account_aos_quotes',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Quotes',
    'rhs_table' => 'aos_quotes',
    'rhs_key' => 'billing_account_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'opportunity_aos_quotes' => 
  array (
    'id' => '64e9728d-d2a4-eb73-3a6a-507be2206b1a',
    'relationship_name' => 'opportunity_aos_quotes',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Quotes',
    'rhs_table' => 'aos_quotes',
    'rhs_key' => 'opportunity_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'aos_quotes_project' => 
  array (
    'id' => 'c00dc9a2-1795-ac46-0f75-507be26e188d',
    'relationship_name' => 'aos_quotes_project',
    'lhs_module' => 'AOS_Quotes',
    'lhs_table' => 'aos_quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'Project',
    'rhs_table' => 'project',
    'rhs_key' => 'id',
    'join_table' => 'aos_quotes_project_c',
    'join_key_lhs' => 'aos_quotes1112_quotes_ida',
    'join_key_rhs' => 'aos_quotes7207project_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'aos_quotes_aos_invoices' => 
  array (
    'id' => 'c0981b25-de64-6346-92df-507be2d4290a',
    'relationship_name' => 'aos_quotes_aos_invoices',
    'lhs_module' => 'AOS_Quotes',
    'lhs_table' => 'aos_quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Invoices',
    'rhs_table' => 'aos_invoices',
    'rhs_key' => 'id',
    'join_table' => 'aos_quotes_aos_invoices_c',
    'join_key_lhs' => 'aos_quotes77d9_quotes_ida',
    'join_key_rhs' => 'aos_quotes6b83nvoices_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => 'default',
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'aos_quotes_aos_contracts' => 
  array (
    'id' => 'c0efba07-c3bd-f1e0-3c8f-507be27b43f7',
    'relationship_name' => 'aos_quotes_aos_contracts',
    'lhs_module' => 'AOS_Quotes',
    'lhs_table' => 'aos_quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'AOS_Contracts',
    'rhs_table' => 'aos_contracts',
    'rhs_key' => 'id',
    'join_table' => 'aos_quotes_os_contracts_c',
    'join_key_lhs' => 'aos_quotese81e_quotes_ida',
    'join_key_rhs' => 'aos_quotes4dc0ntracts_idb',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'aos_quotes_nli_serviceaddresses' => 
  array (
    'id' => 'c148b3dd-a69d-e6a6-64fd-507be222af80',
    'relationship_name' => 'aos_quotes_nli_serviceaddresses',
    'lhs_module' => 'AOS_Quotes',
    'lhs_table' => 'aos_quotes',
    'lhs_key' => 'id',
    'rhs_module' => 'nli_ServiceAddresses',
    'rhs_table' => 'nli_serviceaddresses',
    'rhs_key' => 'id',
    'join_table' => 'aos_quotes_iceaddresses_c',
    'join_key_lhs' => 'aos_quotes9f00_quotes_ida',
    'join_key_rhs' => 'aos_quotesccc3dresses_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'aos_quotes_contacts' => 
  array (
    'rhs_label' => 'Contacts',
    'lhs_label' => 'Quotes',
    'lhs_subpanel' => 'default',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'AOS_Quotes',
    'rhs_module' => 'Contacts',
    'relationship_type' => 'many-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'aos_quotes_contacts',
  ),
);