<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2012-09-05 03:53:59
$dictionary['AOS_Quotes']['fields']['quote_cover_letter']['default']='<p><span style="font-size: x-small;">$contacts_first_name,</span></p>
<p><span style="font-size: x-small;">It is my pleasure to offer <strong>$accounts_name</strong> NextLevel Clear Channel Internet and Hosted Voice services. NextLevel is completely dedicated to providing superior managed Internet and Voice services to enterprise businesses. Below you will find our service advantages:</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Privately Managed Data Access </strong></span>- NextLevel Clear Channel Internet connectivity privately transports and prioritizes the Voice services directly to our highly-redundant, Tier 1 data centers.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Flawless voice quality</strong></span> - NextLevel Voice delivers carrier-grade voice service over a Tier 1 network that is specifically designed to provide exceptional clarity, reliability, and redundancy.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Predictable operating expenses</strong></span> - The NextLevel Voice platform has low to no capital costs with zero maintenance fees, zero management expenses, and flat rate, per seat pricing.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Simplicity and flexibility</strong></span> - Place the order and have voice services in hours, not days or weeks. Fast-growing companies and distributed companies with a large number of off-site employees are all supported with free unlimited calling between locations.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Premium feature bundles</strong></span> - The NextLevel Voice platform offers businesses a feature set comparable with overpriced PBX solutions previously available only to large enterprises, including Business Class Voicemail, Voicemail to Email, Web-based Administration, Auto-Attendant, Extension Dialing, Conference Calling, Call Transfer, 3-Way Calling, Call Forwarding, Distinctive Ringing, and Multi-Site Support - all with Unlimited Domestic Calling plans available.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>Straightforward billing</strong></span> - There is only one bill and point of contact for all local, long distance, and data services. There is no costly investment or maintenance contract associated with an in-house PBX or hybrid phone system-only flat rate, per seat pricing.</span></p>
<p><span style="font-size: x-small;"><span style="color: #0000ff;"><strong>24/7 support and service</strong></span> - NextLevel Internet prides itself on its customer retention and satisfaction, providing world class service with USA-based support.</span></p>
<p><span style="font-size: x-small;">NextLevel Internet looks forward to exceeding your expectations!</span></p>
<p><span style="font-size: x-small;">Best Regards,</span></p>
<p><span style="color: #ff0000; font-size: medium;">EACH REP INSERT GRAPHIC COPY OF SIGNATURE</span></p>
<p><strong><span style="color: #0000ff; font-size: medium;">Where You Want To Be!</span></strong></p>';

 

 // created: 2012-09-03 05:32:12

 

 // created: 2012-09-17 14:50:13

 

 // created: 2012-09-05 04:13:41

 

$dictionary['AOS_Quotes']['fields']['total_nrc'] =
  array (
    'required' => false,
    'name' => 'total_nrc',
    'vname' => 'LBL_TOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['total_lmd'] =
  array (
    'required' => false,
    'name' => 'total_lmd',
    'vname' => 'LBL_TOTAL_LMD',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['total_discount'] =
  array (
    'required' => false,
    'name' => 'total_discount',
    'vname' => 'LBL_TOTAL_DISCOUNT_ORDER',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['order_discount'] =
  array (
    'required' => false,
    'name' => 'order_discount',
    'vname' => 'LBL_TOTAL_ORDER_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['expiration']['display_default'] = '+1 month';
/*
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24 Months',
    'len' => 100,
    'options' => 'nli_periods_dom',
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12 Months',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'options' => 'nli_periods_dom',
    'studio' => 'visible',
  );
*/
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24',
    'len' => 11,
    
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12',
    'audited' => 1,
    'reportable' => 0,
    'len' => 11,
    'studio' => 'visible',
  );
//subtotal fields
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_discount',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_mrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_mrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_MRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['product_subtotal_lmd'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_lmd',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_LMD',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
//service subtotal fields
$dictionary['AOS_Quotes']['fields']['service_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_discount',
    'vname' => 'LBL_SERVICE_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['service_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['quote_desired_install'] = array (
    'required' => false,
    'name' => 'quote_desired_install',
    'vname' => 'LBL_DESIRED_INSTALL',
    'type' => 'date',
    'group'=>'date',
    'dbType' => 'date',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_from_onetime_service'] = array (
    'required' => false,
    'name' => 'total_nrc_from_onetime_service',
    'vname' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
    'type' => 'varchar',
    'dbType' => 'non-db',   
    'source' => 'non-db',   

  );
$dictionary['AOS_Quotes']['fields']['order_nrc_discont'] = array (
    'required' => false,
    'name' => 'order_nrc_discont',
    'vname' => 'LBL_ORDER_NRC_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_discont'] = array (
    'required' => false,
    'name' => 'total_nrc_discont',
    'vname' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_subtotal'] = array (
    'required' => false,
    'name' => 'total_nrc_subtotal',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['grand_total_nrc'] = array (
    'required' => false,
    'name' => 'grand_total_nrc',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_tax'] = array (
    'required' => false,
    'name' => 'product_subtotal_tax',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_list_price'] = array (
    'required' => false,
    'name' => 'product_subtotal_list_price',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,

  );
$dictionary['AOS_Quotes']['fields']['quote_cover_letter'] = array (
    'required' => false,
    'name' => 'quote_cover_letter',
    'vname' => 'LBL_QUOTE_COVER_LETTER',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '2000',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );$dictionary['AOS_Quotes']['fields']['quote_introduction'] = array (
    'required' => false,
    'name' => 'quote_introduction',
    'vname' => 'LBL_QUOTE_INTRODUCTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );
$dictionary['AOS_Quotes']['fields']['quote_final_notes'] = array (
    'required' => false,
    'name' => 'quote_final_notes',
    'vname' => 'LBL_QUOTE_FINALNOTES',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );

 // created: 2012-05-11 12:12:46
$dictionary['AOS_Quotes']['fields']['approval_status']['default']='Pending';
$dictionary['AOS_Quotes']['fields']['approval_status']['reportable']=true;

 

 // created: 2012-08-30 05:05:02
$dictionary['AOS_Quotes']['fields']['service_period']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['service_period']['enable_range_search']=false;

 

 // created: 2012-09-05 00:31:09

 

 // created: 2012-09-03 05:32:43
$dictionary['AOS_Quotes']['fields']['renewal_period']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['renewal_period']['enable_range_search']=false;

 

 // created: 2012-03-29 10:52:39
$dictionary['AOS_Quotes']['fields']['total_amt']['reportable']=true;
$dictionary['AOS_Quotes']['fields']['total_amt']['enable_range_search']=false;

 

 // created: 2012-08-30 01:23:51
$dictionary['AOS_Quotes']['fields']['quote_introduction']['default']='<p><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel Internet’s Clear Channel Voice solution allows your business the opportunity to build a flexible and high availability PBX replacement system that affordably supports between 5 and 200+ users. This is a cost-effective alternative to purchasing, managing, and supporting an obsolete PBX or hybrid key system. NextLevel’s mission-critical voice solution is designed to give you everything you need to maximize your company\'s uptime.</span></p><p><span style="font-size: x-small;" data-mce-style="font-size: x-small;">At NextLevel Internet, we look forward to the opportunity to exceed your company’s service expectations!</span></p>';

 

 // created: 2012-08-30 01:23:01
$dictionary['AOS_Quotes']['fields']['quote_final_notes']['default']='<p><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Deliverables:</span></p><ul><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will fully Training client staff on both the phones and user interface portal</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will assist in the final selection and purchase of the phones</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will pre-configure the phones before hardware vendor drop ships to client location</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel Internet will install and make sure phones are working to client satisfaction</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will set up the system to your specs</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel to create caller ID and number for inbound and outbound calls per client specs</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will port numbers - A Letter Of Authorization (LOA) will allow us to initiate the process of transferring your service and telephone number to NextLevel. You will then be able to use your old number with our service.</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel will assist your technician with the proper router settings</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">NextLevel support is 24/7 and US based</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Anywhere client plugs in the phone with an internet (anywhere in the world) the phone will be up and running as if phone was in the office</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">There are no typical Upgrade or Maintenance fees</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">100% uptime guarantee</span></li><li style="font-size: x-small;" data-mce-style="font-size: x-small;"><span style="font-size: x-small;" data-mce-style="font-size: x-small;">Waived Install fees with a 2 year term</span></li></ul>';

 

 // created: 2012-09-05 00:31:09

 

$dictionary['AOS_Quotes']['fields']['total_nrc'] =
  array (
    'required' => false,
    'name' => 'total_nrc',
    'vname' => 'LBL_TOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['total_lmd'] =
  array (
    'required' => false,
    'name' => 'total_lmd',
    'vname' => 'LBL_TOTAL_LMD',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['total_discount'] =
  array (
    'required' => false,
    'name' => 'total_discount',
    'vname' => 'LBL_TOTAL_DISCOUNT_ORDER',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['order_discount'] =
  array (
    'required' => false,
    'name' => 'order_discount',
    'vname' => 'LBL_TOTAL_ORDER_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['expiration']['display_default'] = '+1 month';
/*
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24 Months',
    'len' => 100,
    'options' => 'nli_periods_dom',
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD',
    'type' => 'enum',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12 Months',
    'audited' => 1,
    'reportable' => 0,
    'len' => 100,
    'options' => 'nli_periods_dom',
    'studio' => 'visible',
  );
*/
$dictionary['AOS_Quotes']['fields']['service_period'] = 
  array (
    'required' => false,
    'name' => 'service_period',
    'vname' => 'LBL_SERVICE_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'default' => '24',
    'len' => 11,
    
    'studio' => 'visible',
  );

$dictionary['AOS_Quotes']['fields']['renewal_period'] =
  array (
    'required' => false,
    'name' => 'renewal_period',
    'vname' => 'LBL_RENEWAL_PERIOD_QUOTE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'default' => '12',
    'audited' => 1,
    'reportable' => 0,
    'len' => 11,
    'studio' => 'visible',
  );
//subtotal fields
$dictionary['AOS_Quotes']['fields']['product_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_discount',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_mrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_mrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_MRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );

$dictionary['AOS_Quotes']['fields']['product_subtotal_lmd'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_lmd',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_LMD',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'product_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
//service subtotal fields
$dictionary['AOS_Quotes']['fields']['service_subtotal_discount'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_discount',
    'vname' => 'LBL_SERVICE_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['service_subtotal_nrc'] =
  array (
    'required' => false,
    'name' => 'service_subtotal_nrc',
    'vname' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,
  );
$dictionary['AOS_Quotes']['fields']['quote_desired_install'] = array (
    'required' => false,
    'name' => 'quote_desired_install',
    'vname' => 'LBL_DESIRED_INSTALL',
    'type' => 'date',
    'group'=>'date',
    'dbType' => 'date',
    'disable_num_format' => true,
    'duplicate_merge'=>'0',
    'audited'=>false,

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_from_onetime_service'] = array (
    'required' => false,
    'name' => 'total_nrc_from_onetime_service',
    'vname' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER',
    'type' => 'varchar',
    'dbType' => 'non-db',   
    'source' => 'non-db',   

  );
$dictionary['AOS_Quotes']['fields']['order_nrc_discont'] = array (
    'required' => false,
    'name' => 'order_nrc_discont',
    'vname' => 'LBL_ORDER_NRC_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_discont'] = array (
    'required' => false,
    'name' => 'total_nrc_discont',
    'vname' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['total_nrc_subtotal'] = array (
    'required' => false,
    'name' => 'total_nrc_subtotal',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['grand_total_nrc'] = array (
    'required' => false,
    'name' => 'grand_total_nrc',
    'vname' => 'LBL_ONTIME_GRAND_TOTAL_NRC',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,   

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_tax'] = array (
    'required' => false,
    'name' => 'product_subtotal_tax',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,

  );
$dictionary['AOS_Quotes']['fields']['product_subtotal_list_price'] = array (
    'required' => false,
    'name' => 'product_subtotal_list_price',
    'vname' => 'LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => 26,

  );
$dictionary['AOS_Quotes']['fields']['quote_cover_letter'] = array (
    'required' => false,
    'name' => 'quote_cover_letter',
    'vname' => 'LBL_QUOTE_COVER_LETTER',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );$dictionary['AOS_Quotes']['fields']['quote_introduction'] = array (
    'required' => false,
    'name' => 'quote_introduction',
    'vname' => 'LBL_QUOTE_INTRODUCTION',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );
$dictionary['AOS_Quotes']['fields']['quote_final_notes'] = array (
    'required' => false,
    'name' => 'quote_final_notes',
    'vname' => 'LBL_QUOTE_FINALNOTES',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '24',
    'cols' => '20',

  );

 // created: 2012-09-17 15:40:43

 
?>