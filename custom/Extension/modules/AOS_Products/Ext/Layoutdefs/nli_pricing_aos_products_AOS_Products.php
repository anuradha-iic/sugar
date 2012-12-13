<?php
 // created: 2012-02-28 12:08:50
$layout_defs["AOS_Products"]["subpanel_setup"]['nli_pricing_aos_products'] = array (
  'order' => 100,
  'module' => 'nli_Pricing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'range_from',
  'title_key' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_NLI_PRICING_TITLE',
  'get_subpanel_data' => 'nli_pricing_aos_products',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
