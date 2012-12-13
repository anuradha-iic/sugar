<?php
$viewdefs ['Tasks'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="isSaveAndNew" value="false">',
        ),
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
          2 => 
          array (
            'customCode' => '{if $fields.status.value != "Completed"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" accessKey="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_KEY}" class="button" onclick="document.getElementById(\'status\').value=\'Completed\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; if(check_form(\'EditView\'))SUGAR.ajaxUI.submitForm(this.form);" type="button" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
          ),
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
      'lbl_task_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'status',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_start',
            'type' => 'datetimecombo',
            'displayParams' => 
            array (
              'showNoneCheckbox' => true,
              'showFormats' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_LIST_RELATED_TO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_due',
            'type' => 'datetimecombo',
            'displayParams' => 
            array (
              'showNoneCheckbox' => true,
              'showFormats' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'contact_name',
            'label' => 'LBL_CONTACT_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'createdbyname_c',
            'label' => 'LBL_CREATEDBYNAME',
          ),
          1 => 
          array (
            'name' => 'caseorigin_c',
            'label' => 'LBL_CASEORIGIN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'casetype_c',
            'label' => 'LBL_CASETYPE',
          ),
          1 => 
          array (
            'name' => 'callduration_c',
            'label' => 'LBL_CALLDURATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'calltype_c',
            'label' => 'LBL_CALLTYPE',
          ),
          1 => 
          array (
            'name' => 'callobjectidentifier_c',
            'label' => 'LBL_CALLOBJECTIDENTIFIER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'accountid_c',
            'label' => 'LBL_ACCOUNTID',
          ),
          1 => 
          array (
            'name' => 'closed_c',
            'label' => 'LBL_CLOSED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'activitydate_c',
            'label' => 'LBL_ACTIVITYDATE',
          ),
          1 => 
          array (
            'name' => 'activitytype_c',
            'label' => 'LBL_ACTIVITYTYPE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'fullcomments_c',
            'label' => 'LBL_FULLCOMMENTS',
          ),
          1 => 
          array (
            'name' => 'companyaccounts_c',
            'label' => 'LBL_COMPANYACCOUNTS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'opportunity_c',
            'label' => 'LBL_OPPORTUNITY',
          ),
          1 => 
          array (
            'name' => 'contact_c',
            'label' => 'LBL_CONTACT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'lead_c',
            'label' => 'LBL_LEAD',
          ),
          1 => 
          array (
            'name' => 'task_c',
            'label' => 'LBL_TASK',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'activityid_c',
            'label' => 'LBL_ACTIVITYID',
          ),
          1 => '',
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
