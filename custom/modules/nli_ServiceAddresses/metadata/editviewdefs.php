<?php
$module_name = 'nli_ServiceAddresses';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '1',
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
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'relatedcontactid_c',
            'studio' => 'visible',
            'label' => 'LBL_RELATEDCONTACTID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'accountuserrelated_c',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNTUSERRELATED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'service_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'service',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'is_private_residence',
            'studio' => 'visible',
            'label' => 'LBL_IS_PRIVATE_RESIDENCE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'client_occupation_date',
            'label' => 'LBL_CLIENT_OCCUPATION_DATE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'interaction_pmgr_requred',
            'studio' => 'visible',
            'label' => 'LBL_INTERACTION_PMGR_REQURED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'extend_dmarc',
            'studio' => 'visible',
            'label' => 'LBL_EXTEND_DMARC',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'mpoe_access',
            'studio' => 'visible',
            'label' => 'LBL_MPOE_ACCESS',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'demarc_location',
            'label' => 'LBL_DEMARC_LOCATION',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'ip_required',
            'label' => 'LBL_IP_REQUIRED',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'nextlevel_router',
            'studio' => 'visible',
            'label' => 'LBL_NEXTLEVEL_ROUTER',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'additional_nextlevel_hardware',
            'studio' => 'visible',
            'label' => 'LBL_ADDITIONAL_NEXTLEVEL_HARDWARE',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'leads_nli_saddresses_name',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'aos_quotes_addresses_name',
          ),
        ),
      ),
    ),
  ),
);
?>
