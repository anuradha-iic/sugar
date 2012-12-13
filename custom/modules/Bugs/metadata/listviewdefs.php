<?php
$listViewDefs ['Bugs'] = 
array (
  'BUG_NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUMBER',
    'link' => true,
    'default' => true,
  ),
  'CATEGORY_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BUG_CATEGORY',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_LIST_SUBJECT',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'TYPE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_TYPE',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_PRIORITY',
    'default' => true,
  ),
  'PRIORITY2_C' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_PRIORITY2',
    'width' => '10%',
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'RELEASE_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_FOUND_IN_RELEASE',
    'default' => false,
    'related_fields' => 
    array (
      0 => 'found_in_release',
    ),
    'module' => 'Releases',
    'id' => 'FOUND_IN_RELEASE',
  ),
  'RESOLUTION' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_RESOLUTION',
    'default' => false,
  ),
);
?>
