<?php
 // created: 2012-08-21 10:54:28
$layout_defs["Leads"]["subpanel_setup"]['leads_nli_srviceaddresses'] = array (
  'order' => 100,
  'module' => 'nli_ServiceAddresses',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_NLI_SERVICEADDRESSES_FROM_NLI_SERVICEADDRESSES_TITLE',
  'get_subpanel_data' => 'leads_nli_srviceaddresses',
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
