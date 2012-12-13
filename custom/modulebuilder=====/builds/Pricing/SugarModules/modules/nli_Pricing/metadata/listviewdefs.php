<?php
$module_name = 'nli_Pricing';
$listViewDefs [$module_name] = 
array (
  'NLI_PRICING_PRODUCTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'NLI_PRICIND645RODUCTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'RANGE_FROM' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_RANGE_FROM',
    'width' => '10%',
    'default' => true,
  ),
  'RANGE_TO' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_RANGE_TO',
    'width' => '10%',
    'default' => true,
  ),
  'PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
  'CURRENCY_ID' => 
  array (
    'type' => 'id',
    'studio' => 'visible',
    'label' => 'LBL_CURRENCY',
    'width' => '10%',
    'default' => false,
  ),
);
?>
