<?php
$module_name = 'AOS_Quotes';
$_object_name = 'aos_quotes';
$viewdefs [$module_name] = 
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
          4 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'pdf\');" value="{$MOD.LBL_PRINT_AS_PDF}">',
          ),
          5 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'emailpdf\');" value="{$MOD.LBL_EMAIL_PDF}">',
          ),
          6 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'email\');" value="{$MOD.LBL_EMAIL_QUOTE}">',
          ),
          7 => 
          array (
            'customCode' => '<input type="submit" class="button" onClick="this.form.action.value=\'createContract\';" value="{$MOD.LBL_CREATE_CONTRACT}">',
          ),
          8 => 
          array (
            'customCode' => '<input type="submit" class="button" onClick="this.form.action.value=\'converToInvoice\';" value="{$MOD.LBL_CONVERT_TO_INVOICE}">',
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
            'name' => 'opportunity',
            'label' => 'LBL_OPPORTUNITY',
          ),
          1 => 
          array (
            'name' => 'billing_account',
            'label' => 'LBL_BILLING_ACCOUNT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'billing_contact',
            'label' => 'LBL_BILLING_CONTACT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'number',
            'label' => 'LBL_QUOTE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'stage',
            'label' => 'LBL_STAGE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'expiration',
            'label' => 'LBL_EXPIRATION',
          ),
          1 => 
          array (
            'name' => 'invoice_status',
            'label' => 'LBL_INVOICE_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'term',
            'label' => 'LBL_TERM',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'approval_status',
            'label' => 'LBL_APPROVAL_STATUS',
          ),
          1 => 
          array (
            'name' => 'approval_issue',
            'label' => 'LBL_APPROVAL_ISSUE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'quote_desired_install',
            'label' => 'LBL_DESIRED_INSTALL',
          ),
          1 => 
          array (
            'name' => 'serviceaddress_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICEADDRESS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'service_period',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_PERIOD_QUOTE',
          ),
          1 => 
          array (
            'name' => 'renewal_period',
            'studio' => 'visible',
            'label' => 'LBL_RENEWAL_PERIOD_QUOTE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'quote_type_c',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_TYPE',
          ),
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'label' => 'LBL_BILLING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
            ),
          ),
        ),
      ),
      'lbl_line_items' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items_c',
            'label' => 'LBL_LINE_ITEMS',
            'customCode' => '{$LINE_ITEMS}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'currency',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'total_MRC_LBL',
            'label' => '<b>Monthly Service Totals</b>',
          ),
          1 => 
          array (
            'name' => 'total_NRC_LBL',
            'label' => '<b>OneTime Service Totals</b>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'order_discount',
            'label' => 'LBL_TOTAL_ORDER_DISCOUNT',
          ),
          1 => 
          array (
            'name' => 'total_nrc',
            'label' => 'LBL_TOTAL_NRC_FROM_MONTHLY_SER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'subtotal_amount',
            'label' => 'LBL_SUBTOTAL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'total_nrc_from_onetime_service',
            'label' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tax_amount',
            'label' => 'LBL_TAX_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'order_nrc_discont',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'total_amount',
            'label' => 'LBL_GRAND_TOTAL',
          ),
          1 => 
          array (
            'name' => 'total_lmd',
            'label' => 'LBL_TOTAL_LMD',
          ),
        ),
        5 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'shipping_amount',
            'label' => 'LBL_SHIPPING_AMOUNT',
          ),
        ),
        6 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'grand_total_nrc',
          ),
        ),
      ),
      'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'template_ddown_c',
            'studio' => 'visible',
            'label' => 'LBL_TEMPLATE_DDOWN_C',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quote_cover_letter',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_COVER_LETTER',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'quote_introduction',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_INTRODUCTION',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quote_final_notes',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_FINALNOTES',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'quote_important_details',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_IMPORTANT_DETAILS',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quote_cover_letter_extra_c',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_COVER_LETTER_EXTRA',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'quote_introduction_extra_c',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_INTRODUCTION_EXTRA',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quote_final_notes_extra_c',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_FINAL_NOTES_EXTRA',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'quote_important_details_extr_c',
            'studio' => 'visible',
            'label' => 'LBL_QUOTE_IMPORTANT_DETAILS_EXTR',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
