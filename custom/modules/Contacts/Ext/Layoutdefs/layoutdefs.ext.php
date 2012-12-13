<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-10-15 03:59:09
$layout_defs["Contacts"]["subpanel_setup"]['aos_quotes_contacts'] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_QUOTES_CONTACTS_FROM_AOS_QUOTES_TITLE',
  'get_subpanel_data' => 'aos_quotes_contacts',
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


// created: 2010-12-20 02:56:01
$layout_defs["Contacts"]["subpanel_setup"]["account_aos_quotes"] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Quotes',
  'get_subpanel_data' => 'aos_quotes',
);


// created: 2010-12-20 02:56:01
$layout_defs["Contacts"]["subpanel_setup"]["account_aos_invoices"] = array (
  'order' => 100,
  'module' => 'AOS_Invoices',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Invoices',
  'get_subpanel_data' => 'aos_invoices',
);


?>