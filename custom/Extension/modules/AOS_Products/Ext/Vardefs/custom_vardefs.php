<?php
/*
* Changes by Ashutosh to change the Product code to a text box
*/
$dictionary['AOS_Products']['fields']['maincode'] =
  array (
    'required' => '1',
    'name' => 'maincode',
    'vname' => 'LBL_MAINCODE',
    'type' => 'varchar',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'studio' => 'visible',
  );

$dictionary['AOS_Products']['fields']['unit_measure'] =
  array (
    'required' => '0',
    'name' => 'unit_measure',
    'vname' => 'LBL_UNIT_MEASURE',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'options' => 'nli_unit_list',
    'studio' => 'visible',
  );


