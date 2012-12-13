<?php
$module_name='nli_Pricing';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'nli_Pricing',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'range_from' => 
    array (
      'type' => 'decimal',
      'vname' => 'LBL_RANGE_FROM',
      'width' => '10%',
      'default' => true,
    ),
    'range_to' => 
    array (
      'type' => 'decimal',
      'vname' => 'LBL_RANGE_TO',
      'width' => '10%',
      'default' => true,
    ),
    'price' => 
    array (
      'type' => 'currency',
      'vname' => 'LBL_PRICE',
      'currency_format' => true,
      'width' => '10%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'nli_Pricing',
      'width' => '5%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'nli_Pricing',
      'width' => '5%',
      'default' => true,
    ),
  ),
);