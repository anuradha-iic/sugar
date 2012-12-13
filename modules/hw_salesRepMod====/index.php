<?php 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2009 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
/*********************************************************************************

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
echo "\n<p>\n";
echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_TITLE'], true); 
echo "\n</p>\n";
global $db;
if ( ! isset($db) ) { 
	   $db = DBManagerFactory::getInstance(); 
 }
 
$userID = $_SESSION['authenticated_user_id']; 
$salesManager = 0;
$isAdmin      = 0;


// check the user for administration Access Rights
$fetchAdminCheckQuery = "SELECT * FROM users WHERE id = '$userID' and employee_status = 'Active' and status = 'Active'";
$resultAdCheck = $db->query($fetchAdminCheckQuery); 
while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {
		$isAdmin    = $row2['is_admin']; 
		$first_name = $row2['first_name']; 
		$last_name  = $row2['last_name']; 
 } 
// check if user is not admin then check for the user role. The below code is checking the user for "Sales Manager" role. 
if($isAdmin == 0)
{
   $fetchAdminCheckQuery = "SELECT * FROM acl_roles_users WHERE user_id = '$userID' and deleted = 0";
   $resultAdCheck = $db->query($fetchAdminCheckQuery); 
	while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {
			$role_id = $row2['role_id']; 
	 } 
	    $fetchAdminCheckQuery = "SELECT * FROM acl_roles WHERE id = '$role_id' and deleted = 0";
		$resultAdCheck = $db->query($fetchAdminCheckQuery); 
		while (($row2 = $db->fetchByAssoc($resultAdCheck)) != null) {
				$roleName = $row2['name'];
				$roleDesc = $row2['description']; 
		 }  
	if($roleName == 'Sales Manager')
    {
        $salesManager = 1;
    }
    else
    {
        $salesManager = 0;
    }	
} 

if($isAdmin == 1 and $salesManager == 1)
{
    $name = "Hello $first_name $last_name";
	echo '<h1 align="center"> Welcome to Sales Persons Area ! <br> '.$name.'</h1>'; 
}
else if($isAdmin == 0 and $salesManager == 1)
{
    $name = "Hello $first_name $last_name";
	echo '<h1 align="center"> Welcome to Sales Persons Area ! <br> '.$name.'</h1>';
}
else if($isAdmin == 1 and $salesManager == 0)
{
    $name = "Hello $first_name $last_name";
	echo '<h1 align="center"> Welcome to Sales Persons Area ! <br> '.$name.'</h1>';
}
else
{ 
	echo '<h1 align="center" style="color: red;"> This page is restricted and can only be accessed by Sales Managers.... </h1>';
}

?>