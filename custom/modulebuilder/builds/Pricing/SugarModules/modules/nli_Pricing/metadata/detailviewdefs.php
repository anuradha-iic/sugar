<?php
$module_name = 'nli_Pricing';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'nli_pricing_products_name',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'range_from',
            'label' => 'LBL_RANGE_FROM',
          ),
          1 => 
          array (
            'name' => 'range_to',
            'label' => 'LBL_RANGE_TO',
          ),
        ),
        2 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'price',
            'label' => 'LBL_PRICE',
          ),
        ),
      ),
    ),
  ),
);
?>
