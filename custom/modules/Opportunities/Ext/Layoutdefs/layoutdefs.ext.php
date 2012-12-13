<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-10-03 05:09:44
$layout_defs["Opportunities"]["subpanel_setup"]['leads_opportunities'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_OPPORTUNITIES_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'leads_opportunities',
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
$layout_defs["Opportunities"]["subpanel_setup"]["opportunity_aos_quotes"] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Quotes',
  'get_subpanel_data' => 'aos_quotes',
);
// created: 2011-05-11 12:18:17
$layout_defs["Opportunities"]["subpanel_setup"]["opportunities_aos_contracts"] = array (
  'order' => 100,
  'module' => 'AOS_Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Contracts',
  'get_subpanel_data' => 'aos_contracts',
);



//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['contacts']['override_subpanel_name'] = 'Opportunity_subpanel_contacts';

?>