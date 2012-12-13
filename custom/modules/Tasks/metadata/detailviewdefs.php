<?php
$viewdefs ['Tasks'] = 
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
            'customCode' => '{if $fields.status.value != "Completed"} <input type="hidden" name="isSaveAndNew" value="false">  <input type="hidden" name="status" value="">  <input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  accesskey="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_KEY}"  class="button"  onclick="this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true; this.form.return_id.value=\'{$fields.id.value}\';"  name="button"  value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  type="submit">{/if}',
          ),
          4 => 
          array (
            'customCode' => '{if $fields.status.value != "Completed"} <input type="hidden" name="isSave" value="false">  <input title="{$APP.LBL_CLOSE_BUTTON_TITLE}"  accesskey="{$APP.LBL_CLOSE_BUTTON_KEY}"  class="button"  onclick="this.form.status.value=\'Completed\'; this.form.action.value=\'Save\';this.form.return_module.value=\'Tasks\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'"  name="button1"  value="{$APP.LBL_CLOSE_BUTTON_TITLE}"  type="submit">{/if}',
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
            'label' => 'LBL_SUBJECT',
          ),
          1 => 'status',
        ),
        1 => 
        array (
          0 => 'date_start',
          1 => 
          array (
            'name' => 'parent_name',
            'customLabel' => '{sugar_translate label=\'LBL_MODULE_NAME\' module=$fields.parent_type.value}',
          ),
        ),
        2 => 
        array (
          0 => 'date_due',
          1 => 
          array (
            'name' => 'contact_name',
            'label' => 'LBL_CONTACT',
          ),
        ),
        3 => 
        array (
          0 => 'priority',
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
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
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
?>
