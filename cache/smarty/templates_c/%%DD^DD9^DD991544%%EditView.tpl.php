<?php /* Smarty version 2.6.11, created on 2012-12-11 13:55:36
         compiled from cache/modules/AOS_Quotes/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/modules/AOS_Quotes/EditView.tpl', 36, false),array('function', 'counter', 'cache/modules/AOS_Quotes/EditView.tpl', 41, false),array('function', 'sugar_translate', 'cache/modules/AOS_Quotes/EditView.tpl', 45, false),array('function', 'sugar_getimagepath', 'cache/modules/AOS_Quotes/EditView.tpl', 75, false),array('function', 'html_options', 'cache/modules/AOS_Quotes/EditView.tpl', 213, false),array('function', 'sugar_number_format', 'cache/modules/AOS_Quotes/EditView.tpl', 1257, false),array('function', 'sugar_getjspath', 'cache/modules/AOS_Quotes/EditView.tpl', 1523, false),array('function', 'multienum_to_array', 'cache/modules/AOS_Quotes/EditView.tpl', 1927, false),array('modifier', 'default', 'cache/modules/AOS_Quotes/EditView.tpl', 42, false),array('modifier', 'strip_semicolon', 'cache/modules/AOS_Quotes/EditView.tpl', 53, false),array('modifier', 'lookup', 'cache/modules/AOS_Quotes/EditView.tpl', 238, false),array('modifier', 'count', 'cache/modules/AOS_Quotes/EditView.tpl', 318, false),array('modifier', 'number_format', 'cache/modules/AOS_Quotes/EditView.tpl', 1774, false),)), $this); ?>


<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']):  echo $_REQUEST['return_relationship'];  elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['relate_to'];  elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )):  echo $_REQUEST['return_module'];  endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<input title="Save [Alt+S]" accessKey="S" onclick="this.form.action.value='Save'; return check_custom_data();" type="submit" name="button" value="Save">
<input title="Cancel [Alt+X]" accessKey="X" onclick="this.form.action.value='index'; this.form.module.value='AOS_Quotes'; this.form.record.value='';" type="submit" name="button" value="Cancel">
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')):  if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=AOS_Quotes", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif;  endif; ?>
</td>
<td align='right'>
<?php echo $this->_tpl_vars['PAGINATION']; ?>

</td>
</tr>
</table><?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="EditView_tabs"
>
<div >
<div id="LBL_ACCOUNT_INFORMATION">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCOUNT_INFORMATION','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='opportunity_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" class="sqsEnabled" tabindex="100" id="<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['opportunity']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['opportunity']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['opportunity']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['opportunity_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" tabindex="100" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_KEY'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_LABEL'), $this);?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['opportunity']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_opp_return","form_name":"EditView","field_to_name_array":{"id":"opportunity_id","name":"opportunity"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
" tabindex="100" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_KEY'), $this);?>
" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['opportunity']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['opportunity']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='billing_account_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ACCOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" class="sqsEnabled" tabindex="101" id="<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['billing_account']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['billing_account']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['billing_account']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['billing_account_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" tabindex="101" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_ACCOUNTS_KEY'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL'), $this);?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['billing_account']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"billing_account_id","name":"billing_account"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
" tabindex="101" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_ACCOUNTS_KEY'), $this);?>
" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['billing_account']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['billing_account']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['name']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='255' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='102' > 
<td valign="top" id='billing_contact_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_CONTACT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" class="sqsEnabled" tabindex="103" id="<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['billing_contact']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['billing_contact']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['billing_contact']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['billing_contact_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" tabindex="103" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_KEY'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_CONTACTS_LABEL'), $this);?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['billing_contact']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"billing_contact_id","name":"billing_contact"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
" tabindex="103" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_KEY'), $this);?>
" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['billing_contact']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['billing_contact']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='number_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_NUMBER','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo $this->_tpl_vars['fields']['number']['value']; ?>

<td valign="top" id='stage_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_STAGE','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
" 
title='' tabindex="105"  
>
<?php if (isset ( $this->_tpl_vars['fields']['stage']['value'] ) && $this->_tpl_vars['fields']['stage']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['stage']['options'],'selected' => $this->_tpl_vars['fields']['stage']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['stage']['options'],'selected' => $this->_tpl_vars['fields']['stage']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['stage']['options']);  ob_start();  echo $this->_tpl_vars['fields']['stage']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['stage']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
" 
title='' tabindex="105"  
>
<?php if (isset ( $this->_tpl_vars['fields']['stage']['value'] ) && $this->_tpl_vars['fields']['stage']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['stage']['options'],'selected' => $this->_tpl_vars['fields']['stage']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['stage']['options'],'selected' => $this->_tpl_vars['fields']['stage']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['stage']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['stage']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['stage']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['stage']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['stage']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['stage']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['stage']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['stage']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='expiration_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_EXPIRATION','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['expiration']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['expiration']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['expiration']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex='106' size="11" maxlength="10" >
<img border="0" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'jscalendar.gif'), $this);?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" id="<?php echo $this->_tpl_vars['fields']['expiration']['name']; ?>
_trigger" align="absmiddle" />
</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['expiration']['name']; ?>
",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['expiration']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
<td valign="top" id='invoice_status_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_INVOICE_STATUS','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
" 
title='' tabindex="107"  
>
<?php if (isset ( $this->_tpl_vars['fields']['invoice_status']['value'] ) && $this->_tpl_vars['fields']['invoice_status']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['invoice_status']['options'],'selected' => $this->_tpl_vars['fields']['invoice_status']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['invoice_status']['options'],'selected' => $this->_tpl_vars['fields']['invoice_status']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['invoice_status']['options']);  ob_start();  echo $this->_tpl_vars['fields']['invoice_status']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['invoice_status']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
" 
title='' tabindex="107"  
>
<?php if (isset ( $this->_tpl_vars['fields']['invoice_status']['value'] ) && $this->_tpl_vars['fields']['invoice_status']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['invoice_status']['options'],'selected' => $this->_tpl_vars['fields']['invoice_status']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['invoice_status']['options'],'selected' => $this->_tpl_vars['fields']['invoice_status']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['invoice_status']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['invoice_status']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="108" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="108" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_KEY'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_LABEL'), $this);?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['assigned_user_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="108" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_KEY'), $this);?>
" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='term_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TERM','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
" 
title='' tabindex="109"  
>
<?php if (isset ( $this->_tpl_vars['fields']['term']['value'] ) && $this->_tpl_vars['fields']['term']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['term']['options'],'selected' => $this->_tpl_vars['fields']['term']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['term']['options'],'selected' => $this->_tpl_vars['fields']['term']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['term']['options']);  ob_start();  echo $this->_tpl_vars['fields']['term']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['term']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
" 
title='' tabindex="109"  
>
<?php if (isset ( $this->_tpl_vars['fields']['term']['value'] ) && $this->_tpl_vars['fields']['term']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['term']['options'],'selected' => $this->_tpl_vars['fields']['term']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['term']['options'],'selected' => $this->_tpl_vars['fields']['term']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['term']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['term']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['term']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['term']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['term']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['term']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['term']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['term']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='approval_status_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_APPROVAL_STATUS','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
" 
title='' tabindex="110"  
>
<?php if (isset ( $this->_tpl_vars['fields']['approval_status']['value'] ) && $this->_tpl_vars['fields']['approval_status']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['approval_status']['options'],'selected' => $this->_tpl_vars['fields']['approval_status']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['approval_status']['options'],'selected' => $this->_tpl_vars['fields']['approval_status']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['approval_status']['options']);  ob_start();  echo $this->_tpl_vars['fields']['approval_status']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['approval_status']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
" 
title='' tabindex="110"  
>
<?php if (isset ( $this->_tpl_vars['fields']['approval_status']['value'] ) && $this->_tpl_vars['fields']['approval_status']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['approval_status']['options'],'selected' => $this->_tpl_vars['fields']['approval_status']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['approval_status']['options'],'selected' => $this->_tpl_vars['fields']['approval_status']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['approval_status']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['approval_status']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
<td valign="top" id='approval_issue_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_APPROVAL_ISSUE','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['approval_issue']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['approval_issue']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['approval_issue']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['approval_issue']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['approval_issue']['name']; ?>
'
rows="4" 
cols="60" 
title='' tabindex="111" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_desired_install_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_DESIRED_INSTALL','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="dateTime">
<?php $this->assign('date_value', $this->_tpl_vars['fields']['quote_desired_install']['value']); ?>
<input class="date_input" autocomplete="off" type="text" name="<?php echo $this->_tpl_vars['fields']['quote_desired_install']['name']; ?>
" id="<?php echo $this->_tpl_vars['fields']['quote_desired_install']['name']; ?>
" value="<?php echo $this->_tpl_vars['date_value']; ?>
" title=''  tabindex='112' size="11" maxlength="10" >
<img border="0" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'jscalendar.gif'), $this);?>
" alt="<?php echo $this->_tpl_vars['APP']['LBL_ENTER_DATE']; ?>
" id="<?php echo $this->_tpl_vars['fields']['quote_desired_install']['name']; ?>
_trigger" align="absmiddle" />
</span>
<script type="text/javascript">
Calendar.setup ({
inputField : "<?php echo $this->_tpl_vars['fields']['quote_desired_install']['name']; ?>
",
ifFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
daFormat : "<?php echo $this->_tpl_vars['CALENDAR_FORMAT']; ?>
",
button : "<?php echo $this->_tpl_vars['fields']['quote_desired_install']['name']; ?>
_trigger",
singleClick : true,
dateStr : "<?php echo $this->_tpl_vars['date_value']; ?>
",
step : 1,
weekNumbers:false
}
);
</script>
<td valign="top" id='serviceaddress_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICEADDRESS','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" class="sqsEnabled" tabindex="113" id="<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['value']; ?>
" title='' autocomplete="off"  >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['nli_serviceaddresses_id_c']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" tabindex="113" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_KEY'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SELECT_BUTTON_LABEL'), $this);?>
" 
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"nli_serviceaddresses_id_c","name":"serviceaddress_c"}}'; ?>
, 
"single", 
true
);' ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-select.png"), $this);?>
"></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
" tabindex="113" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_TITLE'), $this);?>
" accessKey="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_KEY'), $this);?>
" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_RELATE_LABEL'), $this);?>
" ><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['serviceaddress_c']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='service_period_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICE_PERIOD_QUOTE','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['service_period']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['service_period']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['service_period']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['service_period']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['service_period']['name']; ?>
' size='30' maxlength='11' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='114' >
<td valign="top" id='renewal_period_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_RENEWAL_PERIOD_QUOTE','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['renewal_period']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['renewal_period']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['renewal_period']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['renewal_period']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['renewal_period']['name']; ?>
' size='30' maxlength='11' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='115' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_type_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_TYPE','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
" 
title='' tabindex="116"  
>
<?php if (isset ( $this->_tpl_vars['fields']['quote_type_c']['value'] ) && $this->_tpl_vars['fields']['quote_type_c']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['quote_type_c']['options'],'selected' => $this->_tpl_vars['fields']['quote_type_c']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['quote_type_c']['options'],'selected' => $this->_tpl_vars['fields']['quote_type_c']['default']), $this);?>

<?php endif; ?>
</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['quote_type_c']['options']);  ob_start();  echo $this->_tpl_vars['fields']['quote_type_c']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
" 
title='' tabindex="116"  
>
<?php if (isset ( $this->_tpl_vars['fields']['quote_type_c']['value'] ) && $this->_tpl_vars['fields']['quote_type_c']['value'] != ''):  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['quote_type_c']['options'],'selected' => $this->_tpl_vars['fields']['quote_type_c']['value']), $this);?>

<?php else:  echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['quote_type_c']['options'],'selected' => $this->_tpl_vars['fields']['quote_type_c']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
(function (){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo '");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
');
<?php echo '
function SyncToHidden(selectme){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo '");
var doSimulateChange = false;
if (selectElem.value!=selectme)
doSimulateChange=true;
selectElem.value=selectme;
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
if (selectElem.options[i].value==selectme)
selectElem.options[i].selected=true;
}
if (doSimulateChange)
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
//global variable 
sync_';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo ' = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo '");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.simulate(\'keyup\');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\'';  echo $this->_tpl_vars['fields']['quote_type_c']['name']; ?>
-input<?php echo '\'))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo '", syncFromHiddenToWidget);
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
if(hover[0] != null){
if (ex) {
var h = \'1000px\';
hover[0].style.height = h;
}
else{
hover[0].style.height = \'\';
}
}
}
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = true;
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible = false;
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['quote_type_c']['name'];  echo '");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.ancestor().on(\'click\', function () {
if (SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.optionsVisible) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.blur();
} else {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'query\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.set(\'value\', \'\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'visibleChange\', function (e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.on(\'select\', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id="LBL_ADDRESS_INFORMATION">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ADDRESS_INFORMATION','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Address/SugarFieldAddress.js"), $this);?>
'></script>
<fieldset id='BILLING_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="billing_address_street_label" width='25%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_STREET','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<textarea id="billing_address_street" name="billing_address_street" maxlength="150" rows="2" cols="30" tabindex="117"><?php echo $this->_tpl_vars['fields']['billing_address_street']['value']; ?>
</textarea>
</td>
</tr>
<tr>
<td id="billing_address_city_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_city" id="billing_address_city" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_city']['value']; ?>
' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_state_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_state" id="billing_address_state" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_state']['value']; ?>
' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_postalcode_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_POSTAL_CODE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_postalcode']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_postalcode" id="billing_address_postalcode" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_postalcode']['value']; ?>
' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_country_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['billing_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="billing_address_country" id="billing_address_country" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['billing_address_country']['value']; ?>
' tabindex="117">
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){
		billing_address = new SUGAR.AddressField("billing_checkbox",'', 'billing');
	});
</script>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<script type="text/javascript" src='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarFields/Fields/Address/SugarFieldAddress.js"), $this);?>
'></script>
<fieldset id='SHIPPING_address_fieldset'>
<legend><?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS','module' => ''), $this);?>
</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="shipping_address_street_label" width='25%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_STREET','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_street']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td width="*">
<textarea id="shipping_address_street" name="shipping_address_street" maxlength="150" rows="2" cols="30" tabindex="118"><?php echo $this->_tpl_vars['fields']['shipping_address_street']['value']; ?>
</textarea>
</td>
</tr>
<tr>
<td id="shipping_address_city_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CITY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_city']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_city" id="shipping_address_city" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_city']['value']; ?>
' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_state_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_STATE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_state']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_state" id="shipping_address_state" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_state']['value']; ?>
' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_postalcode_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_POSTAL_CODE','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_postalcode']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_postalcode" id="shipping_address_postalcode" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_postalcode']['value']; ?>
' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_country_label" width='%' scope='row' >
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COUNTRY','module' => ''), $this);?>
:
<?php if ($this->_tpl_vars['fields']['shipping_address_country']['required'] || false): ?>
<span class="required"><?php echo $this->_tpl_vars['APP']['LBL_REQUIRED_SYMBOL']; ?>
</span>
<?php endif; ?>
</td>
<td>
<input type="text" name="shipping_address_country" id="shipping_address_country" size="30" maxlength='150' value='<?php echo $this->_tpl_vars['fields']['shipping_address_country']['value']; ?>
' tabindex="118">
</td>
</tr>
<tr>
<td scope='row' NOWRAP>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COPY_ADDRESS_FROM_LEFT','module' => ''), $this);?>
:
</td>
<td>
<input id="shipping_checkbox" name="shipping_checkbox" type="checkbox" onclick="shipping_address.syncFields();">
</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){
		shipping_address = new SUGAR.AddressField("shipping_checkbox",'billing', 'shipping');
	});
</script>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_ADDRESS_INFORMATION").style.display='none';</script>
<?php endif; ?>
<div id="LBL_LINE_ITEMS">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_LINE_ITEMS','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo $this->_tpl_vars['LINE_ITEMS']; ?>

</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='currency_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => '','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="120"  type="hidden" id="discount_amount" name="discount_amount" />
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_LINE_ITEMS").style.display='none';</script>
<?php endif; ?>
<div id="LBL_EDITVIEW_PANEL1">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL1','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<b>Monthly Service Totals</b>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='2'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<b>OneTime Service Totals</b>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='order_discount_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_ORDER_DISCOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['order_discount']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['order_discount']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['order_discount']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['order_discount']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['order_discount']['name']; ?>
' size='30' maxlength='26' value='<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='123' >
<td valign="top" id='total_nrc_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_NRC_FROM_MONTHLY_SER','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="124"  type="text" name="total_nrc" id="total_nrc" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['total_nrc']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='subtotal_amount_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBTOTAL_AMOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="125"  type="text" name="subtotal_amount" id="subtotal_amount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['subtotal_amount']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='total_nrc_from_onetime_service_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="126"  type="text" name="total_nrc_from_onetime_service" id="total_nrc_from_onetime_service" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['service_subtotal_nrc']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='tax_amount_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TAX_AMOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="127"  type="text" name="tax_amount" id="tax_amount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['tax_amount']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='order_nrc_discont_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ORDER_NRC_DISCOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="128"  type="text" name="order_nrc_discont" id="order_nrc_discont" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['order_nrc_discont']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" onblur="calculateServiceGrandTotals()" />
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='total_amount_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAND_TOTAL','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="129"  type="text" name="total_amount" id="total_amount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['total_amount']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='total_lmd_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_LMD','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['total_lmd']['value'] ) <= 0):  $this->assign('value', $this->_tpl_vars['fields']['total_lmd']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['total_lmd']['value']);  endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['total_lmd']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['total_lmd']['name']; ?>
' size='30' maxlength='26' value='<?php echo smarty_function_sugar_number_format(array('var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='130' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<td valign="top" id='shipping_amount_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_AMOUNT','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<?php echo $this->_tpl_vars['SHIPPING']; ?>

</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<td valign="top" id='grand_total_nrc_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_ONTIME_GRAND_TOTAL_NRC','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>

<input tabindex="134"  type="text" name="grand_total_nrc" id="grand_total_nrc" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fields']['grand_total_nrc']['value'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : number_format($_tmp, 2)); ?>
" size="30" maxlength="26" readonly="readonly" />
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
<?php endif; ?>
<div id="LBL_EMAIL_ADDRESSES">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_ADDRESSES','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='template_ddown_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_TEMPLATE_DDOWN_C','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
<span class="required">*</span>
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' colspan='3'>
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
_multiselect"
name="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
_multiselect" value="true">
<?php echo smarty_function_multienum_to_array(array('string' => $this->_tpl_vars['fields']['template_ddown_c']['value'],'default' => $this->_tpl_vars['fields']['template_ddown_c']['default'],'assign' => 'values'), $this);?>

<select id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
"
name="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
[]"
multiple="true" size='6' style="width:150" title='' tabindex="135"  >
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['template_ddown_c']['options'],'selected' => $this->_tpl_vars['values']), $this);?>

</select>
<?php else:  $this->assign('field_options', $this->_tpl_vars['fields']['template_ddown_c']['options']);  ob_start();  echo $this->_tpl_vars['fields']['template_ddown_c']['value'];  $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean();  $this->assign('field_val', $this->_smarty_vars['capture']['field_val']);  ob_start();  echo $this->_tpl_vars['fields']['template_ddown_c']['name'];  $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean();  $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
_multiselect"
name="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
_multiselect" value="true">
<?php echo smarty_function_multienum_to_array(array('string' => $this->_tpl_vars['fields']['template_ddown_c']['value'],'default' => $this->_tpl_vars['fields']['template_ddown_c']['default'],'assign' => 'values'), $this);?>

<select style='display:none' id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
"
name="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
[]"
multiple="true" size='6' style="width:150" title='' tabindex="135" >
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['template_ddown_c']['options'],'selected' => $this->_tpl_vars['values']), $this);?>

</select>
<input
id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input"
size="60"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button">
<img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-image">
</button>
<button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
;');SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode.updateHidden()"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-clear.png"), $this);?>
"></button>
</span>
<?php echo '
<script>
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo ' = [];
'; ?>

<?php echo '
YUI().use(\'datasource\', \'datasource-jsonschema\', function (Y) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds = new Y.DataSource.Function({
source: function (request) {
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['template_ddown_c']['name'];  echo '");
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
return ret;
}
});
});
'; ?>

<?php echo '
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters","node-event-simulate", function (Y) {
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-image');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
');
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
<?php echo '
}
'; ?>

if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
'; ?>

SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
<?php echo '
}
'; ?>

<?php echo '
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
allowTrailingDelimiter: true,
'; ?>

minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
queryDelimiter: ',',
zIndex: 99999,
<?php echo '
source: SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.ds,
resultTextLocator: \'text\',
resultHighlighter: \'phraseMatch\',
resultFilters: \'phraseMatch\',
// Chain together a startsWith filter followed by a custom result filter
// that only displays tags that haven\'t already been selected.
resultFilters: [\'phraseMatch\', function (query, results) {
// Split the current input value into an array based on comma delimiters.
var selected = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);
// Convert the array into a hash for faster lookups.
selected = Y.Array.hash(selected);
// Filter out any results that are already selected, then return the
// array of filtered results.
return Y.Array.filter(results, function (result) {
return !selected.hasOwnProperty(result.text);
});
}]
});
';  echo '
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
});
}
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateHidden = function() {
var index_array = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['template_ddown_c']['name'];  echo '");
var oTable = {};
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].selected)
oTable[selectElem.options[i].value] = true;
}
for (i=0;i<selectElem.options.length;i++){
selectElem.options[i].selected=false;
}
var nTable = {};
for (i=0;i<index_array.length;i++){
var key = index_array[i];
for (c=0;c<selectElem.options.length;c++)
if (selectElem.options[c].innerHTML == key){
selectElem.options[c].selected=true;
nTable[selectElem.options[c].value]=1;
}
}
//the following two loops check to see if the selected options are different from before.
//oTable holds the original select. nTable holds the new one
var fireEvent=false;
for (n in nTable){
if (n==\'\')
continue;
if (!oTable.hasOwnProperty(n))
fireEvent = true; //the options are different, fire the event
}
for (o in oTable){
if (o==\'\')
continue;
if (!nTable.hasOwnProperty(o))
fireEvent=true; //the options are different, fire the event
}
//if the selected options are different from before, fire the \'change\' event
if (fireEvent){
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'change\');
}
};
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateText = function() {
//get last option typed into the input widget
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.set(SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\'));
var index_array = SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);
//create a string ret_string as a comma-delimited list of text from selectElem options.
var selectElem = document.getElementById("';  echo $this->_tpl_vars['fields']['template_ddown_c']['name'];  echo '");
var ret_array = [];
if (selectElem==null || selectElem.options == null)
return;
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].selected && selectElem.options[i].innerHTML!=\'\'){
ret_array.push(selectElem.options[i].innerHTML);
}
}
//index array - array from input
//ret array - array from select
var sorted_array = [];
var notsorted_array = [];
for (i=0;i<index_array.length;i++){
for (c=0;c<ret_array.length;c++){
if (ret_array[c]==index_array[i]){
sorted_array.push(ret_array[c]);
ret_array.splice(c,1);
}
}
}
ret_string = ret_array.concat(sorted_array).join(\', \');
if (ret_string.match(/^\\s*$/))
ret_string=\'\';
else
ret_string+=\', \';
//update the input widget
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.set(\'value\', ret_string);
};
function updateTextOnInterval(){
if (document.activeElement != document.getElementById("';  echo $this->_tpl_vars['fields']['template_ddown_c']['name']; ?>
-input<?php echo '"))
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateText();
setTimeout(updateTextOnInterval,100);
}
updateTextOnInterval();
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'click\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'click\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'dblclick\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'dblclick\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'focus\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'focus\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mouseup\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mouseup\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'mousedown\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'mousedown\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function(e) {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputHidden.simulate(\'blur\');
});
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.on(\'blur\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateHidden();
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateText();
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputImage.on(\'click\', function () {
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.show();
}
else{
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.focus();
}
});
if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
// After a tag is selected, send an empty query to update the list of tags.
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.after(\'select\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.sendRequest(\'\');
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.show();
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateHidden();
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateText();
});
} else {
// After a tag is selected, send an empty query to update the list of tags.
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.ac.after(\'select\', function () {
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateHidden();
SUGAR.AutoComplete.';  echo $this->_tpl_vars['ac_key'];  echo '.inputNode.updateText();
});
}
});
</script>
'; ?>

<?php endif; ?>
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EMAIL_ADDRESSES").style.display='none';</script>
<?php endif; ?>
<div id="LBL_EDITVIEW_PANEL2">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL2','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_cover_letter_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_COVER_LETTER','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['quote_cover_letter']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['quote_cover_letter']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['quote_cover_letter']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['quote_cover_letter']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['quote_cover_letter']['name']; ?>
'
rows="24" 
cols="20" 
title='' tabindex="136" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_introduction_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_INTRODUCTION','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['quote_introduction']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['quote_introduction']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['quote_introduction']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['quote_introduction']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['quote_introduction']['name']; ?>
'
rows="24" 
cols="20" 
title='' tabindex="138" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_final_notes_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_FINALNOTES','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<?php if (empty ( $this->_tpl_vars['fields']['quote_final_notes']['value'] )):  $this->assign('value', $this->_tpl_vars['fields']['quote_final_notes']['default_value']);  else:  $this->assign('value', $this->_tpl_vars['fields']['quote_final_notes']['value']);  endif; ?>  
<textarea  id='<?php echo $this->_tpl_vars['fields']['quote_final_notes']['name']; ?>
' name='<?php echo $this->_tpl_vars['fields']['quote_final_notes']['name']; ?>
'
rows="24" 
cols="20" 
title='' tabindex="140" ><?php echo $this->_tpl_vars['value']; ?>
</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_important_details_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_IMPORTANT_DETAILS','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
<?php endif; ?>
<div id="LBL_EDITVIEW_PANEL3">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','start' => 0,'print' => false,'assign' => 'panelFieldCount'), $this);?>

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam <?php echo ((is_array($_tmp=@$this->_tpl_vars['def']['templateMeta']['panelClass'])) ? $this->_run_mod_handler('default', true, $_tmp, 'edit view dcQuickEdit') : smarty_modifier_default($_tmp, 'edit view dcQuickEdit')); ?>
">
<tr>
<th align="left" colspan="8">
<h4><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EDITVIEW_PANEL3','module' => 'AOS_Quotes'), $this);?>
</h4>
</th>
</tr>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_cover_letter_extra_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_COVER_LETTER_EXTRA','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['quote_cover_letter_extra_c']['name']; ?>
"><p><span style="font-size: x-small;"><strong>Dear $contacts_first_name</strong>,<br /><br />It is my pleasure to offer <strong>$accounts_name</strong> NextLevel Clear Channel Internet and Hosted Voice services. NextLevel is completely dedicated to providing superior managed Internet and Voice services to enterprise businesses. Below you will find our service advantages:<br /><br /><span style="color: #0000ff;"><strong>Privately Managed Data Access </strong></span>- NextLevel Clear Channel Internet connectivity privately transports and prioritizes the Voice services directly to our highly-redundant, Tier 1 data centers.<br /><br /><span style="color: #0000ff;"><strong>Flawless voice quality</strong></span> - NextLevel Voice delivers carrier-grade voice service over a Tier 1 network that is specifically designed to provide exceptional clarity, reliability, and redundancy.<br /><br /><span style="color: #0000ff;"><strong>Predictable operating expenses</strong></span> - The NextLevel Voice platform has low to no capital costs with zero maintenance fees, zero management expenses, and flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>Simplicity and flexibility</strong></span> - Place the order and have voice services in hours, not days or weeks. Fast-growing companies and distributed companies with a large number of off-site employees are all supported with free unlimited calling between locations.<br /><br /><span style="color: #0000ff;"><strong>Premium feature bundles</strong></span> - The NextLevel Voice platform offers businesses a feature set comparable with overpriced PBX solutions previously available only to large enterprises, including Business Class Voicemail, Voicemail to Email, Web-based Administration, Auto-Attendant, Extension Dialing, Conference Calling, Call Transfer, 3-Way Calling, Call Forwarding, Distinctive Ringing, and Multi-Site Support - all with Unlimited Domestic Calling plans available.<br /><br /><span style="color: #0000ff;"><strong>Straightforward billing</strong></span> - There is only one bill and point of contact for all local, long distance, and data services. There is no costly investment or maintenance contract associated with an in-house PBX or hybrid phone system-only flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>24/7 support and service</strong></span> - NextLevel Internet prides itself on its customer retention and satisfaction, providing world class service with USA-based support.<br /><br />NextLevel Internet looks forward to exceeding your expectations!<br /><br /><br />Best Regards,</span><br /><br /><br /><br /><br /><br /><strong><span style="color: #0000ff; font-size: medium;">NextLevel Internet<br />"Where You Want To Be!"</span></strong></p></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_introduction_extra_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_INTRODUCTION_EXTRA','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['quote_introduction_extra_c']['name']; ?>
"><p><span style="font-size: x-small;"><span style="text-decoration: underline;"><span>USE FOR VOICE<br /></span></span></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Voice solution allows your business the opportunity to build a flexible and high availability PBX replacement system that affordably supports between 5 and 200+ users. This is a cost-effective alternative to purchasing, managing, and supporting an obsolete PBX or hybrid key system. NextLevel&rsquo;s mission-critical voice solution is designed to give you everything you need to maximize your company&rsquo;s uptime.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!<br /><br /><span style="text-decoration: underline; font-size: x-small;">USE FOR INTERNET<br /></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Connectivity allows customers to affordably select Internet speeds ranging from 1.5 Mb/s to 1,000 Mb/s. These privately managed internet connections with quality of service (QoS) are the perfect complement to NextLevel&rsquo;s hosted voice services. NextLevel&rsquo;s mission-critical Internet access and 24/7 NOC services are designed to give businesses everything they need to maximize company uptime. With 24/7 proactive monitoring, if you&rsquo;re having a problem, we&rsquo;ll call you! NextLevel&rsquo;s USA-based helpdesk engineers have minimum certifications of CCNA and MCSE and they are available as your first point of contact 24/7.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</p>
<p><span style="text-decoration: underline; font-size: x-small;">USE FOR CO-LO</span></p>
<p><span style="font-size: x-small;">NextLevel Internet&rsquo;s mission critical co-location facilities allow your business to safely house equipment that requires 100% uptime. This is a cost-effective alternative to building and managing your own facility that also allows for unlimited bandwidth bursts. NextLevel&rsquo;s high availability solution is designed to give you everything you need to maximize your company&rsquo;s uptime and help you pass important audits such as the SAS70, Sarbanes- Oxley, HIPPA, ISO and others.</span></p>
<p><br /><span style="font-size: x-small;">At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</span></p></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_final_notes_extra_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_FINAL_NOTES_EXTRA','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['quote_final_notes_extra_c']['name']; ?>
"><p><span style="text-decoration: underline; font-family: arial,helvetica,sans-serif; font-size: small;">Deliverables:</span></p>
<ul>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will include the use of Cisco router, switch (non-PoE) and firewall at no cost (value $2,500).</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will waive our install fees with a 2 year term.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will fully train client staff on both the phones and user interface portal.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will assist in the final selection and purchase of the phones.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will pre-configure the phones before hardware vendor drop ships to client location.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will install and make sure phones are working to client satisfaction.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will set up the system to your specifications.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will create caller ID and number for inbound and outbound calls per client specifications.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel will port numbers (800 and local numbers) - a Letter of Authorization (LOA) will allow us to initiate the process of transferring your service and telephone number to NextLevel. &nbsp;You will then be able to use your old number with your new service.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel support is 24/7 and USA based.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">Anywhere client plugs in the phone with an internet connection (anywhere in the world) the phone will be up and running as if the phone were in the office.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">There are no typical upgrade or maintenance fees.</span></li>
<li><span style="font-family: arial,helvetica,sans-serif; font-size: small;">NextLevel has a 100% uptime guarantee.</span></li>
</ul></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif;  echo smarty_function_counter(array('name' => 'fieldsUsed','start' => 0,'print' => false,'assign' => 'fieldsUsed'), $this);?>

<?php ob_start(); ?>
<tr>
<td valign="top" id='quote_important_details_extr_c_label' width='12.5%' scope="row">
<?php ob_start();  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_IMPORTANT_DETAILS_EXTR','module' => 'AOS_Quotes'), $this); $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean();  echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount'), $this);?>


<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['quote_important_details_extr_c']['name']; ?>
"><p><span style="text-decoration: underline; font-size: x-small;">Data (Circuits, Tier 2, & Colo):</span></p>
<p><span style="font-size: x-small;">Install Fee and Last Month Deposit are due upon signature.&nbsp; The pricing on this SOF is valid for 10 days, and is based on costs of the underlying circuit(s) and services from the local provider(s).&nbsp; In the event that a local provider increases costs, NextLevel Internet reserves the right to change the pricing based on the difference.&nbsp; If the pricing is changed, Customer will have the right to either accept the new pricing or cancel the order. Tax recovery fees apply to Monthly Fee.&nbsp; &nbsp;Requests for Support must come from the Customer's designated Technical Point of Contact (POC).&nbsp; A pre-approved POC is required for administrative and security purposes.</span></p>
<p><span style="text-decoration: underline; font-size: x-small;">Voice:</span></p>
<p><span style="font-size: x-small;">Install Fee and Last Month Deposit are due upon signature.&nbsp; Install Fee does not include charges assessed by any required phone or LAN vendor(s) during installation.&nbsp; Customer is responsible for all LAN cabling as well as any cabling required for circuit demarc extension(s).&nbsp; Tax recovery fees apply to Monthly Fee.&nbsp; Minutes apply to inbound and outbound Local and Domestic Long Distance calling, as well as outbound Toll Free calls.&nbsp; If porting phone numbers, Customer may be subject to double billing of inbound calls by NextLevel Internet and the existing carrier during the porting process.&nbsp; Directory Assistance calls billed separately.&nbsp; International calls (if subscribed to an international dial plan) billed based on usage in minutes per month per country.</span></p>
<p><span style="text-decoration: underline; font-size: x-small;">Voice & Data:</span></p>
<p><span style="font-size: x-small;">Install Fee and Last Month Deposit are due upon signature.&nbsp; The pricing on this SOF is valid for 10 days, and is based on costs of the underlying circuit(s) and services from the local provider(s).&nbsp; In the event that a local provider increases costs, NextLevel Internet reserves the right to change the pricing based on the difference.&nbsp; If the pricing is changed, Customer will have the right to either accept the new pricing or cancel the order.&nbsp; Tax recovery fees apply to Monthly Fee.&nbsp; Install Fee does not include charges assessed by any required phone or LAN vendor(s) during installation.&nbsp; Customer is responsible for all LAN cabling as well as any cabling required for circuit demarc extension(s).&nbsp; Minutes apply to inbound and outbound Local and Domestic Long Distance calling, as well as outbound Toll Free calls.&nbsp; If porting phone numbers, Customer may be subject to double billing of inbound calls by NextLevel Internet and the existing carrier during the porting process.&nbsp; Directory Assistance calls billed separately.&nbsp; International calls (if subscribed to an international dial plan) billed based on usage in minutes per month per country.</span></p>
<p><span style="text-decoration: underline;">Support</span></p>
<p><span>Support for NextLevel Internet services available 24x7x365. Support for NextLevelVoice services available 8am-6pm PT. NextLevelVoice Support provided for "voice" service only, and only within the Service Address network. "Quality of Service" (QoS) is limited to prioritization of NextLevelVoice packets above all others. Not responsible for QoS issues that occur within a Customers network or outside of our network. Configuration services and additional non-standard NextLevelVoice Support (following initial training and 15 days of free support) available at current market rate (hourly rate as of 7/1/09 is $75/hr billed in 15-minute increments). Requests for Support must come from the Customers designated Technical Point of Contact (POC). A pre-approved POC is required for administrative and security purposes.</span></p>
<p><span style="font-size: x-small;"><span style="text-decoration: underline;">Voice-Required</span>:</span><br /><span style="font-size: x-small;">$0.05/min for Local, Domestic Long Distance, or Toll Free calling after minute blocks are used.</span></p>
<p>&nbsp;</p>
<p><span style="font-size: x-small;"><span style="text-decoration: underline;">Voice-Optional</span>:</span><br /><span style="font-size: x-small;">All Standard and Enhanced Extensions include one DOD at no additional charge. </span><br /><br /><span style="font-size: x-small;">$0.05/min for inbound calls to Inbound Toll Free Number. </span><br /><br /><span style="font-size: x-small;">Advanced Automated Attendant or Hunt Group configuration (beyond 1-hour standard configuration time) will bill at current market rate. </span><br /><br /><span style="font-size: x-small;">Conference Bridge includes one DID at no additional charge. </span><br /><br /><span style="font-size: x-small;">Customer is requesting that the following number(s) be ported: &nbsp;xxx-xxx-xxxx, xxx-xxx-xxxx, and xxx-xxx-xxxx.</span></p>
<p>&nbsp;</p>
<p><span style="text-decoration: underline; font-size: x-small;">Circuits-Optional:</span><br /><br /><span style="font-size: x-small;">NextLevel will include the use of a pre-configured Cisco router at no additional charge. </span><br /><br /><span style="font-size: x-small;">This agreement replaces the agreement for the existing circuit(s). </span><br /><br /><span style="font-size: x-small;">An additional T1 circuit will be installed at the existing Service Address.&nbsp; The two circuits will be bundled for 3Mbps Clear Channel Ethernet (router configuration provided by NextLevel Internet). </span><br /><br /><span style="font-size: x-small;">Current T1 at ADDRESS will be moved to the new Service Address. </span><br /><br /><span style="font-size: x-small;">Additional T1 will be installed at the new Service Address.&nbsp; The two circuits will be bundled for 3Mbps up/down, with router configuration provided by NextLevel Internet at no additional charge. </span><br /><br /><span style="font-size: x-small;">It is very important to indicate where you would like to have the line terminated (NextLevel Internet will provide your demarc extension).&nbsp; Please double check the service installation address and termination location details provided.&nbsp; Errors, typos, omissions, or lack of information may cause delays in delivery of services. </span><br /><br /><span style="font-size: x-small;">Specific location instructions regarding where circuit(s) should terminate:</span><br /><br /><span style="font-size: x-small;"><em>If no suite designation provided, what floor?<br /><br />Does the customer currently occupy this space?&nbsp; If not, what is their anticipated occupancy date?<br /><br />Is there any construction, either planned or currently in progress, at the site?</em>&nbsp;</span></p>
<p>&nbsp;</p>
<p><span style="text-decoration: underline; font-size: x-small;">Colo:</span><br /><br /><span style="font-size: x-small;">$50 p/100Kbps will be charged for bandwidth over the committed rate using the 95th percentile billing method.</span><br /><br /><span style="font-size: x-small;">Regarding power planning, utilization of an automatic transfer switch (ATS) is strongly recommended if *ANY* single power supply equipment will be installed.&nbsp; An ATS allows single power supply equipment to be fed by the two separate electrical systems that supply an N+1 circuit.&nbsp; Also note that maximum sustained usage on any one circuit is 80% of stated amperage capacity.&nbsp; For example, 16 Amps is the max draw allowed on an N+1 20A 120V Conditioned AC Power Circuit.</span></p>
<p>&nbsp;</p>
<p><span style="text-decoration: underline; font-size: x-small;">Shared Internet T1:</span><br /><br /><span style="font-size: x-small;">Pricing based on 1 static IP address. </span><br /><br /><span style="font-size: x-small;">Customer will supply cabling from their suite to MPOE if required (NextLevel can provide recommended vendor).</span><br /><br /><span style="font-size: x-small;">Customer will supply internal router/switch/firewall (e.g., Linksys E1000). </span><br /><br /><span style="font-size: x-small;">NextLevel Internet is not responsible for any firewall protection or VLAN switch segmenting. </span><br /><br /><span style="font-size: x-small;">Bandwidth utilization monitored for excessive use of shared connection.&nbsp; In case of continued excessive usage, bandwidth burstability may be throttled.</span></p>
<p><span style="font-size: x-small;"><br /></span></p></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
<?php echo smarty_function_counter(array('name' => 'fieldsUsed'), $this);?>

<td valign="top" width='37.5%' >
</tr>
<?php $this->_smarty_vars['capture']['tr'] = ob_get_contents();  $this->assign('tableRow', ob_get_contents());ob_end_clean();  if ($this->_tpl_vars['fieldsUsed'] > 0):  echo $this->_tpl_vars['tableRow']; ?>

<?php endif; ?>
</table>
</div>
<?php if ($this->_tpl_vars['panelFieldCount'] == 0): ?>
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
<?php endif; ?>
</div></div>

<!--end body panes-->
</td></tr></table>
</div>
<div class="clear"></div>
</div>
<div id="bottomLinks">
<?php if ($this->_tpl_vars['AUTHENTICATED']):  echo $this->_tpl_vars['BOTTOMLINKS']; ?>

<?php endif; ?>
</div>
<div id="footer">
<?php echo $this->_tpl_vars['STATISTICS']; ?>

<div id="copyright">
<?php echo $this->_tpl_vars['COPYRIGHT']; ?>

</div>
</div>
<script>
<?php echo '
if(SUGAR.util.isTouchScreen()) {
setTimeout(resizeHeader,10000);
}
//qe_init function sets listeners to click event on elements of \'quickEdit\' class
if(typeof(DCMenu) !=\'undefined\'){
DCMenu.qe_refresh = false;
DCMenu.qe_handle;
}
function qe_init(){
//do not process if YUI is undefined
if(typeof(YUI)==\'undefined\' || typeof(DCMenu) == \'undefined\'){
return;
}
//remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
if(typeof(DCMenu.qe_handle) !=\'undefined\'){
DCMenu.qe_handle.detach();
}
//set listeners on click event, and define function to call
YUI().use(\'node\', function(Y) {
var qe = Y.all(\'.quickEdit\');
var refreshDashletID;
var refreshListID;
//store event listener handle for future use, and define function to call on click event
DCMenu.qe_handle = qe.on(\'click\', function(e) {
//function will flash message, and retrieve data from element to pass on to DC.miniEditView function
ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'),800);
e.preventDefault();
if(typeof(e.currentTarget.getAttribute(\'data-dashlet-id\'))!=\'undefined\'){
refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
}
if(typeof(e.currentTarget.getAttribute(\'data-list\'))!=\'undefined\'){
refreshListID = e.currentTarget.getAttribute(\'data-list\');
}
DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'),refreshListID,refreshDashletID);
});
});
}
qe_init();
SUGAR_callsInProgress++;
SUGAR._ajax_hist_loaded = true;
if(SUGAR.ajaxUI)
YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);
</script>
'; ?>

<?php echo '  
<script type="text/javascript" src="http://sugarcrm-dev.nextlevelinternet.com/include/javascript/tiny_mce/tiny_mce.js"></script>
'; ?>

</body>
</html><?php echo $this->_tpl_vars['overlibStuff']; ?>

<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () { initEditView(document.forms.EditView) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
</script><?php echo '
<script type="text/javascript">
addForm(\'EditView\');addToValidate(\'EditView\', \'name\', \'name\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'date_entered_date\', \'date\', false,\'Date Created\' );
addToValidate(\'EditView\', \'date_modified_date\', \'date\', false,\'Date Modified\' );
addToValidate(\'EditView\', \'modified_user_id\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'modified_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by\', \'assigned_user_name\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'created_by_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'description\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'deleted\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_id\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'assigned_user_name\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'approval_issue\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_APPROVAL_ISSUE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_account_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_account\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ACCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_contact_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_contact\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_CONTACT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_CITY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STATE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_POSTALCODE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'billing_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_COUNTRY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_street\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_city\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_CITY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_state\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STATE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_postalcode\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_address_country\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_COUNTRY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'expiration\', \'date\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_EXPIRATION','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'number\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_NUMBER','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'opportunity_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => '','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'opportunity\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'template_ddown_c[]\', \'multienum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TEMPLATE_DDOWN_C','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_amt\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_AMT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'subtotal_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBTOTAL_AMOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'discount_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DISCOUNT_AMOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'tax_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TAX_AMOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'shipping_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_AMOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_GRAND_TOTAL','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'currency_id\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENCY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'stage\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_STAGE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'term\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TERM','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'terms_c\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TERMS_C','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'approval_status\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_APPROVAL_STATUS','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'invoice_status\', \'enum\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_INVOICE_STATUS','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'subtotal_tax_amount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBTOTAL_TAX_AMOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_nrc\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_NRC','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_lmd\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_LMD','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_DISCOUNT_ORDER','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'order_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_ORDER_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'service_period\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICE_PERIOD_QUOTE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'renewal_period\', \'int\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_RENEWAL_PERIOD_QUOTE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_mrc\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT_SUBTOTAL_MRC','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_lmd\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT_SUBTOTAL_LMD','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_nrc\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT_SUBTOTAL_NRC','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'service_subtotal_discount\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICE_SUBTOTAL_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'service_subtotal_nrc\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCT_SUBTOTAL_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_desired_install\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_DESIRED_INSTALL','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_nrc_from_onetime_service\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_NRC_FROM_ONETIME_SER','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'order_nrc_discont\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ORDER_NRC_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_nrc_discont\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ORDER_TOTAL_NRC_DISCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'total_nrc_subtotal\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'grand_total_nrc\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_ONTIME_GRAND_TOTAL_NRC','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_tax\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'product_subtotal_list_price\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_cover_letter\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_COVER_LETTER','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_introduction\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_INTRODUCTION','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_final_notes\', \'text\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_FINALNOTES','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_final_notes_extra_c\', \'html\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_FINAL_NOTES_EXTRA','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'nli_serviceaddresses_id_c\', \'id\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_RELATED_TO','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'serviceaddress_c\', \'relate\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICEADDRESS','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_cover_letter_extra_c\', \'html\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_COVER_LETTER_EXTRA','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_introduction_extra_c\', \'html\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_INTRODUCTION_EXTRA','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_important_details_extr_c\', \'html\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_IMPORTANT_DETAILS_EXTR','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'amount_due_c\', \'currency\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_AMOUNT_DUE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_type_c\', \'enum\', true,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_TYPE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quotes_product_description_c\', \'varchar\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTES_PRODUCT_DESCRIPTION','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_webaddress_c\', \'url\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_WEBADDRESS','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_accepted_date_c\', \'date\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_ACCEPTED_DATE','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidate(\'EditView\', \'quote_accept_agreement_c\', \'bool\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'LBL_QUOTE_ACCEPT_AGREEMENT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\' );
addToValidateBinaryDependency(\'EditView\', \'assigned_user_name\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOS_Quotes','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'AOS_Quotes','for_js' => true), $this); echo '\', \'assigned_user_id\' );
addToValidateBinaryDependency(\'EditView\', \'billing_account\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOS_Quotes','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ACCOUNT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\', \'billing_account_id\' );
addToValidateBinaryDependency(\'EditView\', \'billing_contact\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOS_Quotes','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_CONTACT','module' => 'AOS_Quotes','for_js' => true), $this); echo '\', \'billing_contact_id\' );
addToValidateBinaryDependency(\'EditView\', \'opportunity\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOS_Quotes','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_OPPORTUNITY','module' => 'AOS_Quotes','for_js' => true), $this); echo '\', \'opportunity_id\' );
addToValidateBinaryDependency(\'EditView\', \'serviceaddress_c\', \'alpha\', false,\'';  echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'AOS_Quotes','for_js' => true), $this); echo ': ';  echo smarty_function_sugar_translate(array('label' => 'LBL_SERVICEADDRESS','module' => 'AOS_Quotes','for_js' => true), $this); echo '\', \'nli_serviceaddresses_id_c\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'EditView_opportunity\']={"form":"EditView","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["opportunity","opportunity_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_billing_account\']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_billing_account","billing_account_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["billing_account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_billing_contact\']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["billing_contact","billing_contact_id","billing_contact_id","billing_contact_id"],"required_list":["billing_contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_assigned_user_name\']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects[\'EditView_serviceaddress_c\']={"form":"EditView","method":"query","modules":["nli_ServiceAddresses"],"group":"or","field_list":["name","id"],"populate_list":["serviceaddress_c","nli_serviceaddresses_id_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>'; ?>
