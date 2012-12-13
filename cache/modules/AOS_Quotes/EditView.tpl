

<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if !empty($smarty.request.return_module) || !empty($smarty.request.relate_to)}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
<input title="Save [Alt+S]" accessKey="S" onclick="this.form.action.value='Save'; return check_custom_data();" type="submit" name="button" value="Save">
<input title="Cancel [Alt+X]" accessKey="X" onclick="this.form.action.value='index'; this.form.module.value='AOS_Quotes'; this.form.record.value='';" type="submit" name="button" value="Cancel">
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=AOS_Quotes", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</td>
<td align='right'>
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="EditView_tabs"
>
<div >
<div id="LBL_ACCOUNT_INFORMATION">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_ACCOUNT_INFORMATION' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='opportunity_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITY' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.opportunity.name}" class="sqsEnabled" tabindex="100" id="{$fields.opportunity.name}" size="" value="{$fields.opportunity.value}" title='' autocomplete="off"  >
<input type="hidden" name="{$fields.opportunity.id_name}" 
id="{$fields.opportunity.id_name}" 
value="{$fields.opportunity_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.opportunity.name}" id="btn_{$fields.opportunity.name}" tabindex="100" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" accessKey="{sugar_translate label="LBL_SELECT_BUTTON_KEY"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}" 
onclick='open_popup(
"{$fields.opportunity.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_opp_return","form_name":"EditView","field_to_name_array":{"id":"opportunity_id","name":"opportunity"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.opportunity.name}" id="btn_clr_{$fields.opportunity.name}" tabindex="100" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_KEY"}" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '{$fields.opportunity.name}', '{$fields.opportunity.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["{$form_name}_{$fields.opportunity.name}"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.opportunity.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='billing_account_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ACCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.billing_account.name}" class="sqsEnabled" tabindex="101" id="{$fields.billing_account.name}" size="" value="{$fields.billing_account.value}" title='' autocomplete="off"  >
<input type="hidden" name="{$fields.billing_account.id_name}" 
id="{$fields.billing_account.id_name}" 
value="{$fields.billing_account_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.billing_account.name}" id="btn_{$fields.billing_account.name}" tabindex="101" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_KEY"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}" 
onclick='open_popup(
"{$fields.billing_account.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"billing_account_id","name":"billing_account"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.billing_account.name}" id="btn_clr_{$fields.billing_account.name}" tabindex="101" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_KEY"}" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '{$fields.billing_account.name}', '{$fields.billing_account.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["{$form_name}_{$fields.billing_account.name}"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.billing_account.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
id='{$fields.name.name}' size='30' 
maxlength='255' 
value='{$value}' title='' tabindex='102' > 
<td valign="top" id='billing_contact_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_CONTACT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.billing_contact.name}" class="sqsEnabled" tabindex="103" id="{$fields.billing_contact.name}" size="" value="{$fields.billing_contact.value}" title='' autocomplete="off"  >
<input type="hidden" name="{$fields.billing_contact.id_name}" 
id="{$fields.billing_contact.id_name}" 
value="{$fields.billing_contact_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.billing_contact.name}" id="btn_{$fields.billing_contact.name}" tabindex="103" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_KEY"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_CONTACTS_LABEL"}" 
onclick='open_popup(
"{$fields.billing_contact.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"billing_contact_id","name":"billing_contact"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.billing_contact.name}" id="btn_clr_{$fields.billing_contact.name}" tabindex="103" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_KEY"}" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '{$fields.billing_contact.name}', '{$fields.billing_contact.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_CONTACTS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["{$form_name}_{$fields.billing_contact.name}"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.billing_contact.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='number_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_NUMBER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
{$fields.number.value}
<td valign="top" id='stage_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_STAGE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.stage.name}" 
id="{$fields.stage.name}" 
title='' tabindex="105"  
>
{if isset($fields.stage.value) && $fields.stage.value != ''}
{html_options options=$fields.stage.options selected=$fields.stage.value}
{else}
{html_options options=$fields.stage.options selected=$fields.stage.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.stage.options }
{capture name="field_val"}{$fields.stage.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.stage.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.stage.name}" 
id="{$fields.stage.name}" 
title='' tabindex="105"  
>
{if isset($fields.stage.value) && $fields.stage.value != ''}
{html_options options=$fields.stage.options selected=$fields.stage.value}
{else}
{html_options options=$fields.stage.options selected=$fields.stage.default}
{/if}
</select>
<input
id="{$fields.stage.name}-input"
name="{$fields.stage.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.stage.name}-image"></button><button type="button"
id="btn-clear-{$fields.stage.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.stage.name}-input', '{$fields.stage.name}');sync_{$fields.stage.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.stage.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.stage.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.stage.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.stage.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.stage.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.stage.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.stage.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.stage.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.stage.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.stage.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='expiration_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPIRATION' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.expiration.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.expiration.name}" id="{$fields.expiration.name}" value="{$date_value}" title=''  tabindex='106' size="11" maxlength="10" >
<img border="0" src="{sugar_getimagepath file='jscalendar.gif'}" alt="{$APP.LBL_ENTER_DATE}" id="{$fields.expiration.name}_trigger" align="absmiddle" />
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.expiration.name}",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.expiration.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<td valign="top" id='invoice_status_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_INVOICE_STATUS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.invoice_status.name}" 
id="{$fields.invoice_status.name}" 
title='' tabindex="107"  
>
{if isset($fields.invoice_status.value) && $fields.invoice_status.value != ''}
{html_options options=$fields.invoice_status.options selected=$fields.invoice_status.value}
{else}
{html_options options=$fields.invoice_status.options selected=$fields.invoice_status.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.invoice_status.options }
{capture name="field_val"}{$fields.invoice_status.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.invoice_status.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.invoice_status.name}" 
id="{$fields.invoice_status.name}" 
title='' tabindex="107"  
>
{if isset($fields.invoice_status.value) && $fields.invoice_status.value != ''}
{html_options options=$fields.invoice_status.options selected=$fields.invoice_status.value}
{else}
{html_options options=$fields.invoice_status.options selected=$fields.invoice_status.default}
{/if}
</select>
<input
id="{$fields.invoice_status.name}-input"
name="{$fields.invoice_status.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.invoice_status.name}-image"></button><button type="button"
id="btn-clear-{$fields.invoice_status.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.invoice_status.name}-input', '{$fields.invoice_status.name}');sync_{$fields.invoice_status.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.invoice_status.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.invoice_status.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.invoice_status.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.invoice_status.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.invoice_status.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.invoice_status.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.invoice_status.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.invoice_status.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.invoice_status.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.invoice_status.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='assigned_user_name_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="108" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="108" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_KEY"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}" 
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="108" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_KEY"}" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["{$form_name}_{$fields.assigned_user_name.name}"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
		enableQS
);
</script>
<td valign="top" id='term_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TERM' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.term.name}" 
id="{$fields.term.name}" 
title='' tabindex="109"  
>
{if isset($fields.term.value) && $fields.term.value != ''}
{html_options options=$fields.term.options selected=$fields.term.value}
{else}
{html_options options=$fields.term.options selected=$fields.term.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.term.options }
{capture name="field_val"}{$fields.term.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.term.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.term.name}" 
id="{$fields.term.name}" 
title='' tabindex="109"  
>
{if isset($fields.term.value) && $fields.term.value != ''}
{html_options options=$fields.term.options selected=$fields.term.value}
{else}
{html_options options=$fields.term.options selected=$fields.term.default}
{/if}
</select>
<input
id="{$fields.term.name}-input"
name="{$fields.term.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.term.name}-image"></button><button type="button"
id="btn-clear-{$fields.term.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.term.name}-input', '{$fields.term.name}');sync_{$fields.term.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.term.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.term.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.term.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.term.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.term.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.term.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.term.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.term.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.term.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.term.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='approval_status_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_STATUS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.approval_status.name}" 
id="{$fields.approval_status.name}" 
title='' tabindex="110"  
>
{if isset($fields.approval_status.value) && $fields.approval_status.value != ''}
{html_options options=$fields.approval_status.options selected=$fields.approval_status.value}
{else}
{html_options options=$fields.approval_status.options selected=$fields.approval_status.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.approval_status.options }
{capture name="field_val"}{$fields.approval_status.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.approval_status.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.approval_status.name}" 
id="{$fields.approval_status.name}" 
title='' tabindex="110"  
>
{if isset($fields.approval_status.value) && $fields.approval_status.value != ''}
{html_options options=$fields.approval_status.options selected=$fields.approval_status.value}
{else}
{html_options options=$fields.approval_status.options selected=$fields.approval_status.default}
{/if}
</select>
<input
id="{$fields.approval_status.name}-input"
name="{$fields.approval_status.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.approval_status.name}-image"></button><button type="button"
id="btn-clear-{$fields.approval_status.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.approval_status.name}-input', '{$fields.approval_status.name}');sync_{$fields.approval_status.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.approval_status.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.approval_status.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.approval_status.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.approval_status.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.approval_status.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.approval_status.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.approval_status.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.approval_status.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.approval_status.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.approval_status.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
<td valign="top" id='approval_issue_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_ISSUE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if empty($fields.approval_issue.value)}
{assign var="value" value=$fields.approval_issue.default_value }
{else}
{assign var="value" value=$fields.approval_issue.value }
{/if}  
<textarea  id='{$fields.approval_issue.name}' name='{$fields.approval_issue.name}'
rows="4" 
cols="60" 
title='' tabindex="111" >{$value}</textarea>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_desired_install_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_DESIRED_INSTALL' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="dateTime">
{assign var=date_value value=$fields.quote_desired_install.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.quote_desired_install.name}" id="{$fields.quote_desired_install.name}" value="{$date_value}" title=''  tabindex='112' size="11" maxlength="10" >
<img border="0" src="{sugar_getimagepath file='jscalendar.gif'}" alt="{$APP.LBL_ENTER_DATE}" id="{$fields.quote_desired_install.name}_trigger" align="absmiddle" />
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.quote_desired_install.name}",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.quote_desired_install.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
step : 1,
weekNumbers:false
{rdelim}
);
</script>
<td valign="top" id='serviceaddress_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<input type="text" name="{$fields.serviceaddress_c.name}" class="sqsEnabled" tabindex="113" id="{$fields.serviceaddress_c.name}" size="" value="{$fields.serviceaddress_c.value}" title='' autocomplete="off"  >
<input type="hidden" name="{$fields.serviceaddress_c.id_name}" 
id="{$fields.serviceaddress_c.id_name}" 
value="{$fields.nli_serviceaddresses_id_c.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.serviceaddress_c.name}" id="btn_{$fields.serviceaddress_c.name}" tabindex="113" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" accessKey="{sugar_translate label="LBL_SELECT_BUTTON_KEY"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}" 
onclick='open_popup(
"{$fields.serviceaddress_c.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"nli_serviceaddresses_id_c","name":"serviceaddress_c"}}{/literal}, 
"single", 
true
);' ><img src="{sugar_getimagepath file="id-ff-select.png"}"></button><button type="button" name="btn_clr_{$fields.serviceaddress_c.name}" id="btn_clr_{$fields.serviceaddress_c.name}" tabindex="113" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}" accessKey="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_KEY"}" class="button lastChild" 
onclick="SUGAR.clearRelateField(this.form, '{$fields.serviceaddress_c.name}', '{$fields.serviceaddress_c.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
<script type="text/javascript">
if(typeof QSProcessedFieldsArray != 'undefined') 
	QSProcessedFieldsArray["{$form_name}_{$fields.serviceaddress_c.name}"] = false;
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.serviceaddress_c.name}']) != 'undefined'",
		enableQS
);
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='service_period_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICE_PERIOD_QUOTE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.service_period.value) <= 0}
{assign var="value" value=$fields.service_period.default_value }
{else}
{assign var="value" value=$fields.service_period.value }
{/if}  
<input type='text' name='{$fields.service_period.name}' 
id='{$fields.service_period.name}' size='30' maxlength='11' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='114' >
<td valign="top" id='renewal_period_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_RENEWAL_PERIOD_QUOTE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.renewal_period.value) <= 0}
{assign var="value" value=$fields.renewal_period.default_value }
{else}
{assign var="value" value=$fields.renewal_period.value }
{/if}  
<input type='text' name='{$fields.renewal_period.name}' 
id='{$fields.renewal_period.name}' size='30' maxlength='11' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='115' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_type_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_TYPE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.quote_type_c.name}" 
id="{$fields.quote_type_c.name}" 
title='' tabindex="116"  
>
{if isset($fields.quote_type_c.value) && $fields.quote_type_c.value != ''}
{html_options options=$fields.quote_type_c.options selected=$fields.quote_type_c.value}
{else}
{html_options options=$fields.quote_type_c.options selected=$fields.quote_type_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.quote_type_c.options }
{capture name="field_val"}{$fields.quote_type_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.quote_type_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.quote_type_c.name}" 
id="{$fields.quote_type_c.name}" 
title='' tabindex="116"  
>
{if isset($fields.quote_type_c.value) && $fields.quote_type_c.value != ''}
{html_options options=$fields.quote_type_c.options selected=$fields.quote_type_c.value}
{else}
{html_options options=$fields.quote_type_c.options selected=$fields.quote_type_c.default}
{/if}
</select>
<input
id="{$fields.quote_type_c.name}-input"
name="{$fields.quote_type_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.quote_type_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.quote_type_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.quote_type_c.name}-input', '{$fields.quote_type_c.name}');sync_{$fields.quote_type_c.name}()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
(function (){
var selectElem = document.getElementById("{/literal}{$fields.quote_type_c.name}{literal}");
if (typeof select_defaults =="undefined")
select_defaults = [];
select_defaults[selectElem.id] = {key:selectElem.value,text:''};
//get default
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value)
select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
}
//SUGAR.AutoComplete.{$ac_key}.ds = 
//get options array from vardefs
var options = SUGAR.AutoComplete.getOptionsArray("");
YUI().use('datasource', 'datasource-jsonschema',function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
})();
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.quote_type_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.quote_type_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.quote_type_c.name}');
{literal}
function SyncToHidden(selectme){
var selectElem = document.getElementById("{/literal}{$fields.quote_type_c.name}{literal}");
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
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
//global variable 
sync_{/literal}{$fields.quote_type_c.name}{literal} = function(){
SyncToHidden();
}
function syncFromHiddenToWidget(){
var selectElem = document.getElementById("{/literal}{$fields.quote_type_c.name}{literal}");
//if select no longer on page, kill timer
if (selectElem==null || selectElem.options == null)
return;
var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.quote_type_c.name}-input{literal}'))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
}
}
YAHOO.util.Event.onAvailable("{/literal}{$fields.quote_type_c.name}{literal}", syncFromHiddenToWidget);
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
if(hover[0] != null){
if (ex) {
var h = '1000px';
hover[0].style.height = h;
}
else{
hover[0].style.height = '';
}
}
}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
var selectElem = document.getElementById("{/literal}{$fields.quote_type_c.name}{literal}");
//if typed value is a valid option, do nothing
for (i=0;i<selectElem.options.length;i++)
if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
return;
//typed value is invalid, so set the text and the hidden to blank
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
SyncToHidden(select_defaults[selectElem.id].key);
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
} else {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
});
// when they select an option, set the hidden input with the KEY, to be saved
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
SyncToHidden(e.result.raw.key);
});
});
</script> 
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
{/if}
<div id="LBL_ADDRESS_INFORMATION">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_ADDRESS_INFORMATION' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='2'>
{counter name="panelFieldCount"}

<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Address/SugarFieldAddress.js"}'></script>
<fieldset id='BILLING_address_fieldset'>
<legend>{sugar_translate label='LBL_BILLING_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="billing_address_street_label" width='25%' scope='row' >
{sugar_translate label='LBL_BILLING_STREET' module=''}:
{if $fields.billing_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<textarea id="billing_address_street" name="billing_address_street" maxlength="150" rows="2" cols="30" tabindex="117">{$fields.billing_address_street.value}</textarea>
</td>
</tr>
<tr>
<td id="billing_address_city_label" width='%' scope='row' >
{sugar_translate label='LBL_CITY' module=''}:
{if $fields.billing_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_city" id="billing_address_city" size="30" maxlength='150' value='{$fields.billing_address_city.value}' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_state_label" width='%' scope='row' >
{sugar_translate label='LBL_STATE' module=''}:
{if $fields.billing_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_state" id="billing_address_state" size="30" maxlength='150' value='{$fields.billing_address_state.value}' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_postalcode_label" width='%' scope='row' >
{sugar_translate label='LBL_POSTAL_CODE' module=''}:
{if $fields.billing_address_postalcode.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_postalcode" id="billing_address_postalcode" size="30" maxlength='150' value='{$fields.billing_address_postalcode.value}' tabindex="117">
</td>
</tr>
<tr>
<td id="billing_address_country_label" width='%' scope='row' >
{sugar_translate label='LBL_COUNTRY' module=''}:
{if $fields.billing_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="billing_address_country" id="billing_address_country" size="30" maxlength='150' value='{$fields.billing_address_country.value}' tabindex="117">
</td>
</tr>
<tr>
<td colspan='2' NOWRAP>&nbsp;</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
		billing_address = new SUGAR.AddressField("billing_checkbox",'', 'billing');
	{rdelim});
</script>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='2'>
{counter name="panelFieldCount"}

<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Address/SugarFieldAddress.js"}'></script>
<fieldset id='SHIPPING_address_fieldset'>
<legend>{sugar_translate label='LBL_SHIPPING_ADDRESS' module=''}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="shipping_address_street_label" width='25%' scope='row' >
{sugar_translate label='LBL_SHIPPING_STREET' module=''}:
{if $fields.shipping_address_street.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
<textarea id="shipping_address_street" name="shipping_address_street" maxlength="150" rows="2" cols="30" tabindex="118">{$fields.shipping_address_street.value}</textarea>
</td>
</tr>
<tr>
<td id="shipping_address_city_label" width='%' scope='row' >
{sugar_translate label='LBL_CITY' module=''}:
{if $fields.shipping_address_city.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_city" id="shipping_address_city" size="30" maxlength='150' value='{$fields.shipping_address_city.value}' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_state_label" width='%' scope='row' >
{sugar_translate label='LBL_STATE' module=''}:
{if $fields.shipping_address_state.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_state" id="shipping_address_state" size="30" maxlength='150' value='{$fields.shipping_address_state.value}' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_postalcode_label" width='%' scope='row' >
{sugar_translate label='LBL_POSTAL_CODE' module=''}:
{if $fields.shipping_address_postalcode.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_postalcode" id="shipping_address_postalcode" size="30" maxlength='150' value='{$fields.shipping_address_postalcode.value}' tabindex="118">
</td>
</tr>
<tr>
<td id="shipping_address_country_label" width='%' scope='row' >
{sugar_translate label='LBL_COUNTRY' module=''}:
{if $fields.shipping_address_country.required || false}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td>
<input type="text" name="shipping_address_country" id="shipping_address_country" size="30" maxlength='150' value='{$fields.shipping_address_country.value}' tabindex="118">
</td>
</tr>
<tr>
<td scope='row' NOWRAP>
{sugar_translate label='LBL_COPY_ADDRESS_FROM_LEFT' module=''}:
</td>
<td>
<input id="shipping_checkbox" name="shipping_checkbox" type="checkbox" onclick="shipping_address.syncFields();">
</td>
</tr>
</table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
		shipping_address = new SUGAR.AddressField("shipping_checkbox",'billing', 'shipping');
	{rdelim});
</script>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_ADDRESS_INFORMATION").style.display='none';</script>
{/if}
<div id="LBL_LINE_ITEMS">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_LINE_ITEMS' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}
{$LINE_ITEMS}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='currency_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}
<input tabindex="120"  type="hidden" id="discount_amount" name="discount_amount" />
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_LINE_ITEMS").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL1">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL1' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='2'>
{counter name="panelFieldCount"}
<b>Monthly Service Totals</b>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='2'>
{counter name="panelFieldCount"}
<b>OneTime Service Totals</b>
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='order_discount_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_ORDER_DISCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.order_discount.value) <= 0}
{assign var="value" value=$fields.order_discount.default_value }
{else}
{assign var="value" value=$fields.order_discount.value }
{/if}  
<input type='text' name='{$fields.order_discount.name}' 
id='{$fields.order_discount.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='123' >
<td valign="top" id='total_nrc_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_NRC_FROM_MONTHLY_SER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="124"  type="text" name="total_nrc" id="total_nrc" value="{$fields.total_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='subtotal_amount_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBTOTAL_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="125"  type="text" name="subtotal_amount" id="subtotal_amount" value="{$fields.subtotal_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='total_nrc_from_onetime_service_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_NRC_FROM_ONETIME_SER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="126"  type="text" name="total_nrc_from_onetime_service" id="total_nrc_from_onetime_service" value="{$fields.service_subtotal_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='tax_amount_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TAX_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="127"  type="text" name="tax_amount" id="tax_amount" value="{$fields.tax_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='order_nrc_discont_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ORDER_NRC_DISCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="128"  type="text" name="order_nrc_discont" id="order_nrc_discont" value="{$fields.order_nrc_discont.value|number_format:2}" size="30" maxlength="26" onblur="calculateServiceGrandTotals()" />
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='total_amount_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="129"  type="text" name="total_amount" id="total_amount" value="{$fields.total_amount.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
<td valign="top" id='total_lmd_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_LMD' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if strlen($fields.total_lmd.value) <= 0}
{assign var="value" value=$fields.total_lmd.default_value }
{else}
{assign var="value" value=$fields.total_lmd.value }
{/if}  
<input type='text' name='{$fields.total_lmd.name}' 
id='{$fields.total_lmd.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='130' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
<td valign="top" id='shipping_amount_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
{$SHIPPING}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
<td valign="top" id='grand_total_nrc_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_ONTIME_GRAND_TOTAL_NRC' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}
<input tabindex="134"  type="text" name="grand_total_nrc" id="grand_total_nrc" value="{$fields.grand_total_nrc.value|number_format:2}" size="30" maxlength="26" readonly="readonly" />
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id="LBL_EMAIL_ADDRESSES">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EMAIL_ADDRESSES' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='template_ddown_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_TEMPLATE_DDOWN_C' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
<span class="required">*</span>
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' colspan='3'>
{counter name="panelFieldCount"}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<input type="hidden" id="{$fields.template_ddown_c.name}_multiselect"
name="{$fields.template_ddown_c.name}_multiselect" value="true">
{multienum_to_array string=$fields.template_ddown_c.value default=$fields.template_ddown_c.default assign="values"}
<select id="{$fields.template_ddown_c.name}"
name="{$fields.template_ddown_c.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="135"  >
{html_options options=$fields.template_ddown_c.options selected=$values}
</select>
{else}
{assign var="field_options" value=$fields.template_ddown_c.options }
{capture name="field_val"}{$fields.template_ddown_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.template_ddown_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<input type="hidden" id="{$fields.template_ddown_c.name}_multiselect"
name="{$fields.template_ddown_c.name}_multiselect" value="true">
{multienum_to_array string=$fields.template_ddown_c.value default=$fields.template_ddown_c.default assign="values"}
<select style='display:none' id="{$fields.template_ddown_c.name}"
name="{$fields.template_ddown_c.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="135" >
{html_options options=$fields.template_ddown_c.options selected=$values}
</select>
<input
id="{$fields.template_ddown_c.name}-input"
name="{$fields.template_ddown_c.name}-input"
size="60"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button">
<img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.template_ddown_c.name}-image">
</button>
<button type="button"
id="btn-clear-{$fields.template_ddown_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.template_ddown_c.name}-input', '{$fields.template_ddown_c.name};');SUGAR.AutoComplete.{$ac_key}.inputNode.updateHidden()"><img src="{sugar_getimagepath file="id-ff-clear.png"}"></button>
</span>
{literal}
<script>
SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
{/literal}
{literal}
YUI().use('datasource', 'datasource-jsonschema', function (Y) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
source: function (request) {
var selectElem = document.getElementById("{/literal}{$fields.template_ddown_c.name}{literal}");
var ret = [];
for (i=0;i<selectElem.options.length;i++)
if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
return ret;
}
});
});
{/literal}
{literal}
YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters","node-event-simulate", function (Y) {
{/literal}
SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.template_ddown_c.name}-input');
SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.template_ddown_c.name}-image');
SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.template_ddown_c.name}');
SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
{literal}
}
{/literal}
if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
{/literal}
SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
{literal}
}
{/literal}
{literal}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
activateFirstItem: true,
allowTrailingDelimiter: true,
{/literal}
minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
queryDelimiter: ',',
zIndex: 99999,
{literal}
source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
resultTextLocator: 'text',
resultHighlighter: 'phraseMatch',
resultFilters: 'phraseMatch',
// Chain together a startsWith filter followed by a custom result filter
// that only displays tags that haven't already been selected.
resultFilters: ['phraseMatch', function (query, results) {
// Split the current input value into an array based on comma delimiters.
var selected = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
// Convert the array into a hash for faster lookups.
selected = Y.Array.hash(selected);
// Filter out any results that are already selected, then return the
// array of filtered results.
return Y.Array.filter(results, function (result) {
return !selected.hasOwnProperty(result.text);
});
}]
});
{/literal}{literal}
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// expand the dropdown options upon focus
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
});
}
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden = function() {
var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
var selectElem = document.getElementById("{/literal}{$fields.template_ddown_c.name}{literal}");
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
if (n=='')
continue;
if (!oTable.hasOwnProperty(n))
fireEvent = true; //the options are different, fire the event
}
for (o in oTable){
if (o=='')
continue;
if (!nTable.hasOwnProperty(o))
fireEvent=true; //the options are different, fire the event
}
//if the selected options are different from before, fire the 'change' event
if (fireEvent){
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
}
};
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText = function() {
//get last option typed into the input widget
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set(SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'));
var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
//create a string ret_string as a comma-delimited list of text from selectElem options.
var selectElem = document.getElementById("{/literal}{$fields.template_ddown_c.name}{literal}");
var ret_array = [];
if (selectElem==null || selectElem.options == null)
return;
for (i=0;i<selectElem.options.length;i++){
if (selectElem.options[i].selected && selectElem.options[i].innerHTML!=''){
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
ret_string = ret_array.concat(sorted_array).join(', ');
if (ret_string.match(/^\s*$/))
ret_string='';
else
ret_string+=', ';
//update the input widget
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set('value', ret_string);
};
function updateTextOnInterval(){
if (document.activeElement != document.getElementById("{/literal}{$fields.template_ddown_c.name}-input{literal}"))
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
setTimeout(updateTextOnInterval,100);
}
updateTextOnInterval();
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
});
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
});
// when they click on the arrow image, toggle the visibility of the options
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.on('click', function () {
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
}
else{
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
}
});
if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
// After a tag is selected, send an empty query to update the list of tags.
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
});
} else {
// After a tag is selected, send an empty query to update the list of tags.
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
});
}
});
</script>
{/literal}
{/if}
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EMAIL_ADDRESSES").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL2">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL2' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_cover_letter_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_COVER_LETTER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if empty($fields.quote_cover_letter.value)}
{assign var="value" value=$fields.quote_cover_letter.default_value }
{else}
{assign var="value" value=$fields.quote_cover_letter.value }
{/if}  
<textarea  id='{$fields.quote_cover_letter.name}' name='{$fields.quote_cover_letter.name}'
rows="24" 
cols="20" 
title='' tabindex="136" >{$value}</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_introduction_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_INTRODUCTION' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if empty($fields.quote_introduction.value)}
{assign var="value" value=$fields.quote_introduction.default_value }
{else}
{assign var="value" value=$fields.quote_introduction.value }
{/if}  
<textarea  id='{$fields.quote_introduction.name}' name='{$fields.quote_introduction.name}'
rows="24" 
cols="20" 
title='' tabindex="138" >{$value}</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_final_notes_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_FINALNOTES' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

{if empty($fields.quote_final_notes.value)}
{assign var="value" value=$fields.quote_final_notes.default_value }
{else}
{assign var="value" value=$fields.quote_final_notes.value }
{/if}  
<textarea  id='{$fields.quote_final_notes.name}' name='{$fields.quote_final_notes.name}'
rows="24" 
cols="20" 
title='' tabindex="140" >{$value}</textarea>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_important_details_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_IMPORTANT_DETAILS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
<div id="LBL_EDITVIEW_PANEL3">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="yui3-skin-sam {$def.templateMeta.panelClass|default:'edit view dcQuickEdit'}">
<tr>
<th align="left" colspan="8">
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL3' module='AOS_Quotes'}</h4>
</th>
</tr>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_cover_letter_extra_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_COVER_LETTER_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_cover_letter_extra_c.name}"><p><span style="font-size: x-small;"><strong>Dear $contacts_first_name</strong>,<br /><br />It is my pleasure to offer <strong>$accounts_name</strong> NextLevel Clear Channel Internet and Hosted Voice services. NextLevel is completely dedicated to providing superior managed Internet and Voice services to enterprise businesses. Below you will find our service advantages:<br /><br /><span style="color: #0000ff;"><strong>Privately Managed Data Access </strong></span>- NextLevel Clear Channel Internet connectivity privately transports and prioritizes the Voice services directly to our highly-redundant, Tier 1 data centers.<br /><br /><span style="color: #0000ff;"><strong>Flawless voice quality</strong></span> - NextLevel Voice delivers carrier-grade voice service over a Tier 1 network that is specifically designed to provide exceptional clarity, reliability, and redundancy.<br /><br /><span style="color: #0000ff;"><strong>Predictable operating expenses</strong></span> - The NextLevel Voice platform has low to no capital costs with zero maintenance fees, zero management expenses, and flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>Simplicity and flexibility</strong></span> - Place the order and have voice services in hours, not days or weeks. Fast-growing companies and distributed companies with a large number of off-site employees are all supported with free unlimited calling between locations.<br /><br /><span style="color: #0000ff;"><strong>Premium feature bundles</strong></span> - The NextLevel Voice platform offers businesses a feature set comparable with overpriced PBX solutions previously available only to large enterprises, including Business Class Voicemail, Voicemail to Email, Web-based Administration, Auto-Attendant, Extension Dialing, Conference Calling, Call Transfer, 3-Way Calling, Call Forwarding, Distinctive Ringing, and Multi-Site Support - all with Unlimited Domestic Calling plans available.<br /><br /><span style="color: #0000ff;"><strong>Straightforward billing</strong></span> - There is only one bill and point of contact for all local, long distance, and data services. There is no costly investment or maintenance contract associated with an in-house PBX or hybrid phone system-only flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>24/7 support and service</strong></span> - NextLevel Internet prides itself on its customer retention and satisfaction, providing world class service with USA-based support.<br /><br />NextLevel Internet looks forward to exceeding your expectations!<br /><br /><br />Best Regards,</span><br /><br /><br /><br /><br /><br /><strong><span style="color: #0000ff; font-size: medium;">NextLevel Internet<br />"Where You Want To Be!"</span></strong></p></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_introduction_extra_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_INTRODUCTION_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_introduction_extra_c.name}"><p><span style="font-size: x-small;"><span style="text-decoration: underline;"><span>USE FOR VOICE<br /></span></span></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Voice solution allows your business the opportunity to build a flexible and high availability PBX replacement system that affordably supports between 5 and 200+ users. This is a cost-effective alternative to purchasing, managing, and supporting an obsolete PBX or hybrid key system. NextLevel&rsquo;s mission-critical voice solution is designed to give you everything you need to maximize your company&rsquo;s uptime.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!<br /><br /><span style="text-decoration: underline; font-size: x-small;">USE FOR INTERNET<br /></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Connectivity allows customers to affordably select Internet speeds ranging from 1.5 Mb/s to 1,000 Mb/s. These privately managed internet connections with quality of service (QoS) are the perfect complement to NextLevel&rsquo;s hosted voice services. NextLevel&rsquo;s mission-critical Internet access and 24/7 NOC services are designed to give businesses everything they need to maximize company uptime. With 24/7 proactive monitoring, if you&rsquo;re having a problem, we&rsquo;ll call you! NextLevel&rsquo;s USA-based helpdesk engineers have minimum certifications of CCNA and MCSE and they are available as your first point of contact 24/7.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</p>
<p><span style="text-decoration: underline; font-size: x-small;">USE FOR CO-LO</span></p>
<p><span style="font-size: x-small;">NextLevel Internet&rsquo;s mission critical co-location facilities allow your business to safely house equipment that requires 100% uptime. This is a cost-effective alternative to building and managing your own facility that also allows for unlimited bandwidth bursts. NextLevel&rsquo;s high availability solution is designed to give you everything you need to maximize your company&rsquo;s uptime and help you pass important audits such as the SAS70, Sarbanes- Oxley, HIPPA, ISO and others.</span></p>
<p><br /><span style="font-size: x-small;">At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</span></p></span>
<td valign="top" id='_label' width='12.5%' scope="row">
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_final_notes_extra_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_FINAL_NOTES_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_final_notes_extra_c.name}"><p><span style="text-decoration: underline; font-family: arial,helvetica,sans-serif; font-size: small;">Deliverables:</span></p>
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
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{capture name="tr" assign="tableRow"}
<tr>
<td valign="top" id='quote_important_details_extr_c_label' width='12.5%' scope="row">
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_IMPORTANT_DETAILS_EXTR' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
</td>
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_important_details_extr_c.name}"><p><span style="text-decoration: underline; font-size: x-small;">Data (Circuits, Tier 2, & Colo):</span></p>
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
{counter name="fieldsUsed"}
<td valign="top" width='37.5%' >
</tr>
{/capture}
{if $fieldsUsed > 0 }
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0}
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
{/if}
</div></div>

<!--end body panes-->
</td></tr></table>
</div>
<div class="clear"></div>
</div>
<div id="bottomLinks">
{if $AUTHENTICATED}
{$BOTTOMLINKS}
{/if}
</div>
<div id="footer">
{$STATISTICS}
<div id="copyright">
{$COPYRIGHT}
</div>
</div>
<script>
{literal}
if(SUGAR.util.isTouchScreen()) {
setTimeout(resizeHeader,10000);
}
//qe_init function sets listeners to click event on elements of 'quickEdit' class
if(typeof(DCMenu) !='undefined'){
DCMenu.qe_refresh = false;
DCMenu.qe_handle;
}
function qe_init(){
//do not process if YUI is undefined
if(typeof(YUI)=='undefined' || typeof(DCMenu) == 'undefined'){
return;
}
//remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
if(typeof(DCMenu.qe_handle) !='undefined'){
DCMenu.qe_handle.detach();
}
//set listeners on click event, and define function to call
YUI().use('node', function(Y) {
var qe = Y.all('.quickEdit');
var refreshDashletID;
var refreshListID;
//store event listener handle for future use, and define function to call on click event
DCMenu.qe_handle = qe.on('click', function(e) {
//function will flash message, and retrieve data from element to pass on to DC.miniEditView function
ajaxStatus.flashStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'),800);
e.preventDefault();
if(typeof(e.currentTarget.getAttribute('data-dashlet-id'))!='undefined'){
refreshDashletID = e.currentTarget.getAttribute('data-dashlet-id');
}
if(typeof(e.currentTarget.getAttribute('data-list'))!='undefined'){
refreshListID = e.currentTarget.getAttribute('data-list');
}
DCMenu.miniEditView(e.currentTarget.getAttribute('data-module'), e.currentTarget.getAttribute('data-record'),refreshListID,refreshDashletID);
});
});
}
qe_init();
SUGAR_callsInProgress++;
SUGAR._ajax_hist_loaded = true;
if(SUGAR.ajaxUI)
YAHOO.util.Event.onContentReady('ajaxUI-history-field', SUGAR.ajaxUI.firstLoad);
</script>
{/literal}
{literal}  
<script type="text/javascript" src="http://sugarcrm-dev.nextlevelinternet.com/include/javascript/tiny_mce/tiny_mce.js"></script>
{/literal}
</body>
</html>{$overlibStuff}
<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
</script>{literal}
<script type="text/javascript">
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'Date Created' );
addToValidate('EditView', 'date_modified_date', 'date', false,'Date Modified' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'approval_issue', 'text', false,'{/literal}{sugar_translate label='LBL_APPROVAL_ISSUE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_account_id', 'id', false,'{/literal}{sugar_translate label='' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_account', 'relate', false,'{/literal}{sugar_translate label='LBL_BILLING_ACCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_contact_id', 'id', false,'{/literal}{sugar_translate label='' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_contact', 'relate', false,'{/literal}{sugar_translate label='LBL_BILLING_CONTACT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_CITY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STATE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_POSTALCODE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'billing_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_COUNTRY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_CITY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STATE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_POSTALCODE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_COUNTRY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'expiration', 'date', true,'{/literal}{sugar_translate label='LBL_EXPIRATION' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'number', 'varchar', false,'{/literal}{sugar_translate label='LBL_QUOTE_NUMBER' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity_id', 'id', false,'{/literal}{sugar_translate label='' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'opportunity', 'relate', false,'{/literal}{sugar_translate label='LBL_OPPORTUNITY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'template_ddown_c[]', 'multienum', true,'{/literal}{sugar_translate label='LBL_TEMPLATE_DDOWN_C' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_amt', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_AMT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'subtotal_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_SUBTOTAL_AMOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'discount_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_DISCOUNT_AMOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'tax_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_TAX_AMOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_SHIPPING_AMOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_GRAND_TOTAL' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'currency_id', 'id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'stage', 'enum', true,'{/literal}{sugar_translate label='LBL_STAGE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'term', 'enum', false,'{/literal}{sugar_translate label='LBL_TERM' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'terms_c', 'text', false,'{/literal}{sugar_translate label='LBL_TERMS_C' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'approval_status', 'enum', false,'{/literal}{sugar_translate label='LBL_APPROVAL_STATUS' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_status', 'enum', false,'{/literal}{sugar_translate label='LBL_INVOICE_STATUS' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'subtotal_tax_amount', 'currency', false,'{/literal}{sugar_translate label='LBL_SUBTOTAL_TAX_AMOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_nrc', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_NRC' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_lmd', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_LMD' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_DISCOUNT_ORDER' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'order_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_ORDER_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'service_period', 'int', false,'{/literal}{sugar_translate label='LBL_SERVICE_PERIOD_QUOTE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'renewal_period', 'int', false,'{/literal}{sugar_translate label='LBL_RENEWAL_PERIOD_QUOTE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_PRODUCT_SUBTOTAL_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_mrc', 'currency', false,'{/literal}{sugar_translate label='LBL_PRODUCT_SUBTOTAL_MRC' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_lmd', 'currency', false,'{/literal}{sugar_translate label='LBL_PRODUCT_SUBTOTAL_LMD' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_nrc', 'currency', false,'{/literal}{sugar_translate label='LBL_PRODUCT_SUBTOTAL_NRC' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'service_subtotal_discount', 'currency', false,'{/literal}{sugar_translate label='LBL_SERVICE_SUBTOTAL_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'service_subtotal_nrc', 'currency', false,'{/literal}{sugar_translate label='LBL_PRODUCT_SUBTOTAL_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_desired_install', 'date', false,'{/literal}{sugar_translate label='LBL_DESIRED_INSTALL' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_nrc_from_onetime_service', 'varchar', false,'{/literal}{sugar_translate label='LBL_TOTAL_NRC_FROM_ONETIME_SER' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'order_nrc_discont', 'currency', false,'{/literal}{sugar_translate label='LBL_ORDER_NRC_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_nrc_discont', 'currency', false,'{/literal}{sugar_translate label='LBL_ORDER_TOTAL_NRC_DISCOUNT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'total_nrc_subtotal', 'currency', false,'{/literal}{sugar_translate label='LBL_ONTIME_GRAND_TOTAL_NRC_SUBTOTAL' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'grand_total_nrc', 'currency', false,'{/literal}{sugar_translate label='LBL_ONTIME_GRAND_TOTAL_NRC' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_tax', 'currency', false,'{/literal}{sugar_translate label='LBL_SUBTOTAL_MONTHLY_TAX_TOTAL' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'product_subtotal_list_price', 'currency', false,'{/literal}{sugar_translate label='LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_cover_letter', 'text', false,'{/literal}{sugar_translate label='LBL_QUOTE_COVER_LETTER' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_introduction', 'text', false,'{/literal}{sugar_translate label='LBL_QUOTE_INTRODUCTION' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_final_notes', 'text', false,'{/literal}{sugar_translate label='LBL_QUOTE_FINALNOTES' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_final_notes_extra_c', 'html', false,'{/literal}{sugar_translate label='LBL_QUOTE_FINAL_NOTES_EXTRA' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'nli_serviceaddresses_id_c', 'id', false,'{/literal}{sugar_translate label='LBL_LIST_RELATED_TO' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'serviceaddress_c', 'relate', false,'{/literal}{sugar_translate label='LBL_SERVICEADDRESS' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_cover_letter_extra_c', 'html', false,'{/literal}{sugar_translate label='LBL_QUOTE_COVER_LETTER_EXTRA' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_introduction_extra_c', 'html', false,'{/literal}{sugar_translate label='LBL_QUOTE_INTRODUCTION_EXTRA' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_important_details_extr_c', 'html', false,'{/literal}{sugar_translate label='LBL_QUOTE_IMPORTANT_DETAILS_EXTR' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'amount_due_c', 'currency', false,'{/literal}{sugar_translate label='LBL_AMOUNT_DUE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_type_c', 'enum', true,'{/literal}{sugar_translate label='LBL_QUOTE_TYPE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quotes_product_description_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_QUOTES_PRODUCT_DESCRIPTION' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_webaddress_c', 'url', false,'{/literal}{sugar_translate label='LBL_QUOTE_WEBADDRESS' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_accepted_date_c', 'date', false,'{/literal}{sugar_translate label='LBL_QUOTE_ACCEPTED_DATE' module='AOS_Quotes' for_js=true}{literal}' );
addToValidate('EditView', 'quote_accept_agreement_c', 'bool', false,'{/literal}{sugar_translate label='LBL_QUOTE_ACCEPT_AGREEMENT' module='AOS_Quotes' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOS_Quotes' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='AOS_Quotes' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'billing_account', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOS_Quotes' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_BILLING_ACCOUNT' module='AOS_Quotes' for_js=true}{literal}', 'billing_account_id' );
addToValidateBinaryDependency('EditView', 'billing_contact', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOS_Quotes' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_BILLING_CONTACT' module='AOS_Quotes' for_js=true}{literal}', 'billing_contact_id' );
addToValidateBinaryDependency('EditView', 'opportunity', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOS_Quotes' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_OPPORTUNITY' module='AOS_Quotes' for_js=true}{literal}', 'opportunity_id' );
addToValidateBinaryDependency('EditView', 'serviceaddress_c', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='AOS_Quotes' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_SERVICEADDRESS' module='AOS_Quotes' for_js=true}{literal}', 'nli_serviceaddresses_id_c' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_opportunity']={"form":"EditView","method":"query","modules":["Opportunities"],"group":"or","field_list":["name","id"],"populate_list":["opportunity","opportunity_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_billing_account']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_billing_account","billing_account_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["billing_account_id"],"order":"name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_billing_contact']={"form":"EditView","method":"get_contact_array","modules":["Contacts"],"field_list":["salutation","first_name","last_name","id"],"populate_list":["billing_contact","billing_contact_id","billing_contact_id","billing_contact_id"],"required_list":["billing_contact_id"],"group":"or","conditions":[{"name":"first_name","op":"like_custom","end":"%","value":""},{"name":"last_name","op":"like_custom","end":"%","value":""}],"order":"last_name","limit":"30","no_match_text":"No Match"};sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};sqs_objects['EditView_serviceaddress_c']={"form":"EditView","method":"query","modules":["nli_ServiceAddresses"],"group":"or","field_list":["name","id"],"populate_list":["serviceaddress_c","nli_serviceaddresses_id_c"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};</script>{/literal}
