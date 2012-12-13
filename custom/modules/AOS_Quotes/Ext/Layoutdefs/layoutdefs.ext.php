<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-10-15 03:59:09
$layout_defs["AOS_Quotes"]["subpanel_setup"]['aos_quotes_contacts'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_QUOTES_CONTACTS_FROM_CONTACTS_TITLE',
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


 // created: 2012-10-04 13:49:30
$layout_defs["AOS_Quotes"]["subpanel_setup"]['aos_quotes_rviceaddresses'] = array (
  'order' => 100,
  'module' => 'nli_ServiceAddresses',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AOS_QUOTES_NLI_SERVICEADDRESSES_FROM_NLI_SERVICEADDRESSES_TITLE',
  'get_subpanel_data' => 'aos_quotes_rviceaddresses',
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

?>