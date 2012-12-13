<?php
$module_name = 'AOS_Quotes';
$_object_name = 'aos_quotes';
$viewdefs [$module_name] = 
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
          'file' => 'custom/modules/AOS_Quotes/js/Quote.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
      'javascript' => '{literal}<script type="text/javascript" language="Javascript" src="custom/modules/AOS_Quotes/js/Quote.js"></script><style>
	input[readonly] {
	 background-color:#ccc;
	}
	</style>{/literal}',
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
            'displayParams' => 
            array (
              'required' => true,
            ),
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'opportunity',
            'label' => 'LBL_OPPORTUNITY',
            'displayParams' => 
            array (
              'call_back_function' => 'set_opp_return',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'number',
            'label' => 'LBL_QUOTE_NUMBER',
            'customCode' => '{$fields.number.value}',
          ),
          1 => 
          array (
            'name' => 'stage',
            'label' => 'LBL_STAGE',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'term',
            'label' => 'LBL_TERM',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'quote_desired_install',
            'label' => 'LBL_DESIRED_INSTALL',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'service_period',
            'studio' => 'visible',
            'label' => 'LBL_RENEWAL_PERIOD_QUOTE',
          ),
          1 => 
          array (
            'name' => 'renewal_period',
            'studio' => 'visible',
            'label' => 'LBL_RENEWAL_PERIOD_QUOTE',
          ),
        ),
      ),
      'lbl_address_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'billing_account',
            'label' => 'LBL_BILLING_ACCOUNT',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'billing_contact',
            'label' => 'LBL_BILLING_CONTACT',
          ),
          1 => '',
        ),
        2 => 
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
            'label' => 'LBL_BILLING_ADDRESS_STREET',
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
            'label' => 'LBL_SHIPPING_ADDRESS_STREET',
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
	    'hideLabel' => true,
            'customCode' => '{$LINE_ITEMS}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'currency',
            'label' => '',
            'customCode' => '{*$CURRENCY*}<input type="hidden" id="discount_amount" name="discount_amount" />',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'order_discount',
            'label' => 'LBL_TOTAL_ORDER_DISCOUNT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'total_discount',
            'label' => 'LBL_TOTAL_DISCOUNT_ORDER',
	    'customCode' => '<input type="text" name="total_discount" id="total_discount" value="{$fields.total_discount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'subtotal_amount',
            'label' => 'LBL_SUBTOTAL_AMOUNT',
	     'customCode' => '<input type="text" name="subtotal_amount" id="subtotal_amount" value="{$fields.subtotal_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tax_amount',
            'label' => 'LBL_TAX_AMOUNT',
	    'customCode' => '<input type="text" name="tax_amount" id="tax_amount" value="{$fields.tax_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'total_amount',
            'label' => 'LBL_GRAND_TOTAL',
	    'customCode' => '<input type="text" name="total_amount" id="total_amount" value="{$fields.total_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'total_nrc',
            'label' => 'LBL_TOTAL_NRC_FROM_MONTHLY_SER',
	    'customCode' => '<input type="text" name="total_nrc" id="total_nrc" value="{$fields.total_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
          ),
        ),
        
        1 => 
        array (
          0 => array('name'=>'total_nrc_from_onetime_service',
		     'label' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
		     'customCode' => '<input type="text" name="total_nrc_from_onetime_service" id="total_nrc_from_onetime_service" value="{$fields.service_subtotal_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
		    ),
          1 => '',
        ),
        2 => 
        array (
          0 => array('name'=>'order_nrc_discont', 
		     'customCode'=>'<input type="text" name="order_nrc_discont" id="order_nrc_discont" value="{$fields.order_nrc_discont.value|number_format:2}" size="30" maxlength="26" onblur="calculateServiceGrandTotals()" />'),
          1 => '',
        ),
	3 => array(
		0 => array('name'=>'total_nrc_discont',
			   'label' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT',
			    'customCode' => '<input type="text" name="total_nrc_discont" id="total_nrc_discont" value="{$fields.service_subtotal_discount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
			)
		),
	4 => 
        array (
          0 => 
          array (
            'name' => 'total_nrc_subtotal',
            'label' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL',

          ),
        ),
	5 => 
        array (
          0 => 
          array (
            'name' => 'shipping_amount',
            'label' => 'LBL_SHIPPING_AMOUNT',
            'customCode' => '{$SHIPPING}',
          ),
        ),
	6 => array(
		0 => array( 'name' =>'grand_total_nrc',
			    'customCode' => '<input type="text" name="grand_total_nrc" id="grand_total_nrc" value="{$fields.grand_total_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />',
			)		
		),
      ),
'lbl_email_addresses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'template_ddown_c',
            'label' => 'LBL_TEMPLATE_DDOWN_C',
          ),
        ),
      ),
    ),
  ),
);
?>