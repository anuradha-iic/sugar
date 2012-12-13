<?php
$viewdefs ['Opportunities'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qualified_opportunity_c',
            'label' => 'LBL_QUALIFIED_OPPORTUNITY',
          ),
          1 => 'opportunity_type',
        ),
        2 => 
        array (
          0 => 'date_closed',
          1 => 
          array (
            'name' => 'amount',
            'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
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
          1 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
      ),
      'lbl_detailview_panel2' => 
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
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'salesforceopportunitiesid_c',
            'label' => 'LBL_SALESFORCEOPPORTUNITIESID',
          ),
          1 => 
          array (
            'name' => 'expectedrevenue_c',
            'label' => 'LBL_EXPECTEDREVENUE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'forecastcategory_c',
            'label' => 'LBL_FORECASTCATEGORY',
          ),
          1 => 
          array (
            'name' => 'ownerrole_c',
            'label' => 'LBL_OWNERROLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'closed_c',
            'label' => 'LBL_CLOSED',
          ),
          1 => 
          array (
            'name' => 'won_c',
            'label' => 'LBL_WON',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'age_c',
            'label' => 'LBL_AGE',
          ),
          1 => 
          array (
            'name' => 'lastactivity_c',
            'label' => 'LBL_LASTACTIVITY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'fiscalperiod_c',
            'label' => 'LBL_FISCALPERIOD',
          ),
          1 => 
          array (
            'name' => 'fiscalyear_c',
            'label' => 'LBL_FISCALYEAR',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'primarypartner_c',
            'label' => 'LBL_PRIMARYPARTNER',
          ),
          1 => 
          array (
            'name' => 'nextgoal_c',
            'label' => 'LBL_NEXTGOAL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'serviceaddress1street_c',
            'label' => 'LBL_SERVICEADDRESS1STREET',
          ),
          1 => 
          array (
            'name' => 'serviceaddress1city_c',
            'label' => 'LBL_SERVICEADDRESS1CITY',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'serviceaddress1state_c',
            'label' => 'LBL_SERVICEADDRESS1STATE',
          ),
          1 => 
          array (
            'name' => 'serviceaddress1zip_c',
            'label' => 'LBL_SERVICEADDRESS1ZIP',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'serviceaddress1special_c',
            'label' => 'LBL_SERVICEADDRESS1SPECIAL ',
          ),
          1 => 
          array (
            'name' => 'term_c',
            'label' => 'LBL_TERM',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'requestedinstalldate_c',
            'label' => 'LBL_REQUESTEDINSTALLDATE',
          ),
          1 => 
          array (
            'name' => 'lastmonthdepositdiscount_c',
            'label' => 'LBL_LASTMONTHDEPOSITDISCOUNT',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'support_c',
            'label' => 'LBL_SUPPORT',
          ),
          1 => 
          array (
            'name' => 'importantdetails_c',
            'label' => 'LBL_IMPORTANTDETAILS',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'comments_c',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
          1 => 
          array (
            'name' => 'serviceaddress2street_c',
            'label' => 'LBL_SERVICEADDRESS2STREET',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'serviceaddress2city_c',
            'label' => 'LBL_SERVICEADDRESS2CITY',
          ),
          1 => 
          array (
            'name' => 'serviceaddress2state_c',
            'label' => 'LBL_SERVICEADDRESS2STATE',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'serviceaddress2zip_c',
            'label' => 'LBL_SERVICEADDRESS2ZIP',
          ),
          1 => 
          array (
            'name' => 'serviceaddress2special_c',
            'label' => 'LBL_SERVICEADDRESS2SPECIAL ',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'monthlysubtotal_c',
            'label' => 'LBL_MONTHLYSUBTOTAL',
          ),
          1 => 
          array (
            'name' => 'installationsubtotal_c',
            'label' => 'LBL_INSTALLATIONSUBTOTAL',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
      ),
    ),
  ),
);
?>
