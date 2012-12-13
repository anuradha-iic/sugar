<?php
$viewdefs ['Leads'] = 
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
          3 => 
          array (
            'customCode' => '{if $bean->aclAccess("edit")}<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">{/if}',
          ),
          4 => 'FIND_DUPLICATES',
          5 => 
          array (
            'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
          ),
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
          ),
        ),
        'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Leads/Lead.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'last_name',
            'comment' => 'Last name of the contact',
            'label' => 'LBL_LAST_NAME',
          ),
          1 => 
          array (
            'name' => 'first_name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_FIRST_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'title',
          1 => 'phone_mobile',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
          ),
          1 => 'phone_work',
        ),
        3 => 
        array (
          0 => 'website',
          1 => 'phone_fax',
        ),
        4 => 
        array (
          0 => 'email1',
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'addresstype_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESSTYPE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'addresstypeother_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESSTYPEOTHER',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
            ),
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'lead_type_prospect_c',
            'label' => 'LBL_LEAD_TYPE_PROSPECT',
            'tabindex' => '1',
          ),
          1 => 
          array (
            'name' => 'lead_type_roal_c',
            'label' => 'LBL_LEAD_TYPE_ROAL',
            'tabindex' => '2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'lead_type_agent_c',
            'label' => 'LBL_LEAD_TYPE_AGENT',
          ),
          1 => 
          array (
            'name' => 'lead_type_vendor_c',
            'label' => 'LBL_LEAD_TYPE_VENDOR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lead_type_employee_c',
            'label' => 'LBL_LEAD_TYPE_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'lead_type_other_c',
            'label' => 'LBL_LEAD_TYPE_OTHER',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'status',
          1 => 'lead_source',
        ),
        1 => 
        array (
          0 => 'status_description',
          1 => 'lead_source_description',
        ),
        2 => 
        array (
          0 => 'opportunity_amount',
          1 => 
          array (
            'name' => 'referred_by_lookup_c',
            'studio' => 'visible',
            'label' => 'LBL_REFERRED_BY_LOOKUP',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'paid_referral_c',
            'studio' => 'visible',
            'label' => 'LBL_PAID_REFERRAL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
          1 => 'do_not_call',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'qualify_decision_maker_c',
            'label' => 'LBL_QUALIFY_DECISION_MAKER',
          ),
          1 => 
          array (
            'name' => 'qualify_decision_date_c',
            'label' => 'LBL_QUALIFY_DECISION_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qualify_pain_c',
            'studio' => 'visible',
            'label' => 'LBL_QUALIFY_PAIN',
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
        ),
      ),
    ),
  ),
);
?>
