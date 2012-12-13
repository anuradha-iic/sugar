<?php
$popupMeta = array (
    'moduleMain' => 'AOS_Products',
    'varName' => 'AOS_Products',
    'orderBy' => 'aos_products.maincode ASC',
    'whereClauses' => array (
  'name' => 'aos_products.name',
),
    'searchInputs' => array (
  0 => 'aos_products_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'MAINCODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MAINCODE',
    'default' => true,
    'name' => 'maincode',
  ),
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'PART_NUMBER' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PART_NUMBER',
    'default' => true,
    'name' => 'part_number',
  ),
  'CATEGORY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CATEGORY',
    'default' => true,
    'name' => 'category',
  ),
  'COST' => 
  array (
    'width' => '10%',
    'label' => 'LBL_COST',
    'currency_format' => true,
    'default' => true,
    'name' => 'cost',
  ),
  'PRICE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PRICE',
    'currency_format' => true,
    'default' => true,
    'name' => 'price',

  ),
  'UNIT_MEASURE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_UNIT_MEASURE',
    'width' => '10%',
  ),
  'GRID'=> array('width' => '10%','sortable'=>false,
	  'label'=>'','default' => true,
	   'customCode' => '<a href="javascript:void(0)" onclick="getProductGrid(\'{$ID}\')" > Grid Pricing</a>'
	)
),
);
