<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_quotes"] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Quotes',
  'get_subpanel_data' => 'aos_quotes',
);


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_invoices"] = array (
  'order' => 100,
  'module' => 'AOS_Invoices',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Invoices',
  'get_subpanel_data' => 'aos_invoices',
);


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_contracts"] = array (
  'order' => 100,
  'module' => 'AOS_Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Contracts',
  'get_subpanel_data' => 'aos_contracts',
);



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


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['nli_serviceesses_accounts']['override_subpanel_name'] = 'Account_subpanel_nli_serviceesses_accounts';

?>