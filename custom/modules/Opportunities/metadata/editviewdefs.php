<?php
$viewdefs ['Opportunities'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
      'javascript' => '{$PROBABILITY_SCRIPT}',
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
          ),
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 'opportunity_type',
          1 => 
          array (
            'name' => 'qualified_opportunity_c',
            'label' => 'LBL_QUALIFIED_OPPORTUNITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_closed',
          ),
          1 => 
          array (
            'name' => 'amount',
          ),
        ),
        3 => 
        array (
          0 => 'sales_stage',
          1 => 
          array (
            'name' => 'amount_nrc',
            'comment' => '',
            'label' => 'LBL_AMOUNT_NRC',
          ),
        ),
        4 => 
        array (
          0 => 'probability',
          1 => 
          array (
            'name' => 'total_amount',
            'comment' => '',
            'label' => 'LBL_TOTAL_OPP_AMOUNT',
          ),
        ),
        5 => 
        array (
          0 => 'next_step',
          1 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'lead_source',
          1 => 
          array (
            'name' => 'agent_referral_c',
            'studio' => 'visible',
            'label' => 'LBL_AGENT_REFERRAL',
          ),
        ),
        1 => 
        array (
          0 => 'campaign_name',
          1 => 
          array (
            'name' => 'referred_by_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERRED_BY',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
?>
