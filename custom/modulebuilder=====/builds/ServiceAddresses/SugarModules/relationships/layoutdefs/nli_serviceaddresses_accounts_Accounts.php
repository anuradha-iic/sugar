<?php
 // created: 2012-05-08 11:20:34
$layout_defs["Accounts"]["subpanel_setup"]['nli_serviceesses_accounts'] = array (
  'order' => 100,
  'module' => 'nli_ServiceAddresses',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NLI_SERVICEADDRESSES_ACCOUNTS_FROM_NLI_SERVICEADDRESSES_TITLE',
  'get_subpanel_data' => 'nli_serviceesses_accounts',
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
