<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'agent_c',
            'studio' => 'visible',
            'label' => 'LBL_AGENT',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'relationship_status_c',
            'studio' => 'visible',
            'label' => 'LBL_RELATIONSHIP_STATUS',
          ),
          1 => 
          array (
            'name' => 'phone_alternate',
            'comment' => 'An alternate phone number',
            'label' => 'LBL_PHONE_ALT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'address_type_billing_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE_BILLING',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address_type_shipping_c',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE_SHIPPING',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'account_type_client_c',
            'label' => 'LBL_ACCOUNT_TYPE_CLIENT',
          ),
          1 => 
          array (
            'name' => 'account_type_channel_partner_c',
            'label' => 'LBL_ACCOUNT_TYPE_CHANNEL_PARTNER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_type_roal_c',
            'label' => 'LBL_ACCOUNT_TYPE_ROAL',
          ),
          1 => 
          array (
            'name' => 'account_type_vendor_c',
            'label' => 'LBL_ACCOUNT_TYPE_VENDOR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'account_type_competitor_c',
            'label' => 'LBL_ACCOUNT_TYPE_COMPETITOR',
          ),
          1 => 
          array (
            'name' => 'account_type_other_c',
            'label' => 'LBL_ACCOUNT_TYPE_OTHER',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'industry',
          1 => 'employees',
        ),
        1 => 
        array (
          0 => 'campaign_name',
          1 => '',
        ),
        2 => 
        array (
          0 => 'parent_name',
          1 => 'ownership',
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
