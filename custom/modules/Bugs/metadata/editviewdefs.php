<?php
$viewdefs ['Bugs'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="account_id" value="{$smarty.request.account_id}">',
          1 => '<input type="hidden" name="contact_id" value="{$smarty.request.contact_id}">',
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_bug_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'date_logged_c',
            'label' => 'LBL_DATE_LOGGED',
          ),
          1 => 'status',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'size' => 60,
              'required' => true,
            ),
          ),
          1 => 'type',
        ),
        2 => 
        array (
          0 => 'priority',
          1 => 
          array (
            'name' => 'priority2_c',
            'label' => 'LBL_PRIORITY2',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'category_c',
            'studio' => 'visible',
            'label' => 'LBL_BUG_CATEGORY',
          ),
          1 => 'source',
        ),
        4 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'bug_number',
            'type' => 'readonly',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'resolution',
          1 => 
          array (
            'name' => 'date_fixed_c',
            'label' => 'LBL_DATE_FIXED',
          ),
        ),
        1 => 
        array (
          0 => 'found_in_release',
          1 => 'fixed_in_release',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'work_log',
            'nl2br' => true,
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
            'label' => 'LBL_ASSIGNED_TO_NAME',
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
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
?>
