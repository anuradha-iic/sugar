<?php
$listViewDefs ['AOS_Products'] = 
array (
  'MAINCODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MAINCODE',
    'default' => true,
  ),
  'JBILLING_RELATION_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_JBILLING_RELATION_ID',
    'width' => '10%',
  ),
  'HOMIR_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_HOMIR_ID',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CATEGORY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CATEGORY',
    'default' => true,
  ),
  'PRICE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => true,
    'module' => 'Users',
    'link' => true,
    'id' => 'CREATED_BY',
    'related_fields' => 
    array (
      0 => 'created_by',
    ),
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'COST' => 
  array (
    'width' => '10%',
    'label' => 'LBL_COST',
    'currency_format' => true,
    'default' => false,
  ),
  'PART_NUMBER' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PART_NUMBER',
    'default' => false,
  ),
);
?>
