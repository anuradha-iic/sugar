

<table cellpadding="1" cellspacing="0" border="0" width="100%" class="actionsContainer">
<tr>
<td class="buttons" align="left" NOWRAP>
<form action="index.php" method="post" name="DetailView" id="form">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="this.form.return_module.value='AOS_Quotes'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='EditView';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} 
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='AOS_Quotes'; this.form.return_action.value='DetailView'; this.form.isDuplicate.value=true; this.form.action.value='EditView'; this.form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} 
{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='AOS_Quotes'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}');" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} 
{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" accessKey="M" class="button" onclick="this.form.return_module.value='AOS_Quotes'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='Step1'; this.form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} 
<input type="button" class="button" onClick="showPopup('pdf');" value="{$MOD.LBL_PRINT_AS_PDF}">
<input type="button" class="button" onClick="showPopup('emailpdf');" value="{$MOD.LBL_EMAIL_PDF}">
<input type="button" class="button" onClick="showPopup('email');" value="{$MOD.LBL_EMAIL_QUOTE}">
<input type="submit" class="button" onClick="this.form.action.value='createContract';" value="{$MOD.LBL_CREATE_CONTRACT}">
<input type="submit" class="button" onClick="this.form.action.value='converToInvoice';" value="{$MOD.LBL_CONVERT_TO_INVOICE}">
</form>
</td>
<td class="buttons" align="left" NOWRAP>
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=AOS_Quotes", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</td>
<td align="right" width="100%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="AOS_Quotes_detailview_tabs"
>
<div >
<div id='LBL_ACCOUNT_INFORMATION' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_ACCOUNT_INFORMATION' module='AOS_Quotes'}</h4>
<table id='detailpanel_1' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.opportunity.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITY' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.opportunity.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.opportunity_id.value)}
{capture assign="detail_url"}index.php?module=Opportunities&action=DetailView&record={$fields.opportunity_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="opportunity_id" class="sugar_field">{$fields.opportunity.value}</span>
{if !empty($fields.opportunity_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.billing_account.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ACCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.billing_account.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.billing_account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.billing_account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="billing_account_id" class="sugar_field">{$fields.billing_account.value}</span>
{if !empty($fields.billing_account_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.name.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if} 
<span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.billing_contact.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_CONTACT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.billing_contact.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.billing_contact_id.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.billing_contact_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="billing_contact_id" class="sugar_field">{$fields.billing_contact.value}</span>
{if !empty($fields.billing_contact_id.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.number.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_NUMBER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.number.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.number.value) <= 0}
{assign var="value" value=$fields.number.default_value }
{else}
{assign var="value" value=$fields.number.value }
{/if} 
<span class="sugar_field" id="{$fields.number.name}">{$fields.number.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.stage.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_STAGE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.stage.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.stage.name}" value="{ $fields.stage.options }">
{ $fields.stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.stage.name}" value="{ $fields.stage.value }">
{ $fields.stage.options[$fields.stage.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.expiration.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPIRATION' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.expiration.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.expiration.value) <= 0}
{assign var="value" value=$fields.expiration.default_value }
{else}
{assign var="value" value=$fields.expiration.value }
{/if} 
<span class="sugar_field" id="{$fields.expiration.name}">{$fields.expiration.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.invoice_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INVOICE_STATUS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.invoice_status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.invoice_status.options)}
<input type="hidden" class="sugar_field" id="{$fields.invoice_status.name}" value="{ $fields.invoice_status.options }">
{ $fields.invoice_status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.invoice_status.name}" value="{ $fields.invoice_status.value }">
{ $fields.invoice_status.options[$fields.invoice_status.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.assigned_user_name.hidden}
{counter name="panelFieldCount"}

<span id="assigned_user_id" class="sugar_field">{$fields.assigned_user_name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.term.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TERM' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.term.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.term.options)}
<input type="hidden" class="sugar_field" id="{$fields.term.name}" value="{ $fields.term.options }">
{ $fields.term.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.term.name}" value="{ $fields.term.value }">
{ $fields.term.options[$fields.term.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.approval_status.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_STATUS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.approval_status.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.approval_status.options)}
<input type="hidden" class="sugar_field" id="{$fields.approval_status.name}" value="{ $fields.approval_status.options }">
{ $fields.approval_status.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.approval_status.name}" value="{ $fields.approval_status.value }">
{ $fields.approval_status.options[$fields.approval_status.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.approval_issue.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_APPROVAL_ISSUE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.approval_issue.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.approval_issue.name|escape:'html'|url2html|nl2br}">
{$fields.approval_issue.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_desired_install.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESIRED_INSTALL' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_desired_install.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.quote_desired_install.value) <= 0}
{assign var="value" value=$fields.quote_desired_install.default_value }
{else}
{assign var="value" value=$fields.quote_desired_install.value }
{/if} 
<span class="sugar_field" id="{$fields.quote_desired_install.name}">{$fields.quote_desired_install.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.nli_serviceaddresses_id_c.value)}
{capture assign="detail_url"}index.php?module=nli_ServiceAddresses&action=DetailView&record={$fields.nli_serviceaddresses_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="nli_serviceaddresses_id_c" class="sugar_field">{$fields.serviceaddress_c.value}</span>
{if !empty($fields.nli_serviceaddresses_id_c.value)}</a>{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.service_period.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICE_PERIOD_QUOTE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.service_period.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.service_period.name}">
{sugar_number_format precision=0 var=$fields.service_period.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.renewal_period.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_RENEWAL_PERIOD_QUOTE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.renewal_period.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.renewal_period.name}">
{sugar_number_format precision=0 var=$fields.renewal_period.value}
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_type_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_TYPE' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.quote_type_c.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.quote_type_c.options)}
<input type="hidden" class="sugar_field" id="{$fields.quote_type_c.name}" value="{ $fields.quote_type_c.options }">
{ $fields.quote_type_c.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.quote_type_c.name}" value="{ $fields.quote_type_c.value }">
{ $fields.quote_type_c.options[$fields.quote_type_c.value]}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_ACCOUNT_INFORMATION").style.display='none';</script>
{/if}
<div id='LBL_ADDRESS_INFORMATION' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_ADDRESS_INFORMATION' module='AOS_Quotes'}</h4>
<table id='detailpanel_2' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.billing_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_BILLING_ADDRESS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.billing_address_street.hidden}
{counter name="panelFieldCount"}

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="billing_address_street" value="{$fields.billing_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_city" value="{$fields.billing_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_country" value="{$fields.billing_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="billing_address_postalcode" value="{$fields.billing_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
{$fields.billing_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br>
{$fields.billing_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br} {$fields.billing_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}&nbsp;&nbsp;{$fields.billing_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br>
{$fields.billing_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</td>
<td class='dataField' width='1%'>
{$custom_code_billing}
</td>
</tr>
</table>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.shipping_address_street.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_ADDRESS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.shipping_address_street.hidden}
{counter name="panelFieldCount"}

<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%'>
<input type="hidden" class="sugar_field" id="shipping_address_street" value="{$fields.shipping_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_city" value="{$fields.shipping_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_country" value="{$fields.shipping_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
<input type="hidden" class="sugar_field" id="shipping_address_postalcode" value="{$fields.shipping_address_postalcode.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}">
{$fields.shipping_address_street.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}<br>
{$fields.shipping_address_city.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br} {$fields.shipping_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}&nbsp;&nbsp;{$fields.shipping_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br>
{$fields.shipping_address_country.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</td>
<td class='dataField' width='1%'>
{$custom_code_shipping}
</td>
</tr>
</table>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_ADDRESS_INFORMATION").style.display='none';</script>
{/if}
<div id='LBL_LINE_ITEMS' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_LINE_ITEMS' module='AOS_Quotes'}</h4>
<table id='detailpanel_3' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.line_items_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LINE_ITEMS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.line_items_c.hidden}
{counter name="panelFieldCount"}
<span id="line_items_c" class="sugar_field">{$LINE_ITEMS}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.currency.hidden}
&nbsp;
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.currency.hidden}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_LINE_ITEMS").style.display='none';</script>
{/if}
<div id='LBL_EDITVIEW_PANEL1' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL1' module='AOS_Quotes'}</h4>
<table id='detailpanel_4' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_MRC_LBL.hidden}
{capture name="label" assign="label"}{sugar_translate label='<b>Monthly Service Totals</b>' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_MRC_LBL.hidden}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_NRC_LBL.hidden}
{capture name="label" assign="label"}{sugar_translate label='<b>OneTime Service Totals</b>' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_NRC_LBL.hidden}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.order_discount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_ORDER_DISCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.order_discount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.order_discount.name}'>
{sugar_number_format var=$fields.order_discount.value }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_nrc.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_NRC_FROM_MONTHLY_SER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_nrc.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.total_nrc.name}'>
{sugar_number_format var=$fields.total_nrc.value }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.subtotal_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUBTOTAL_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.subtotal_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.subtotal_amount.name}'>
{sugar_number_format var=$fields.subtotal_amount.value }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_nrc_from_onetime_service.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_NRC_FROM_ONETIME_SER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_nrc_from_onetime_service.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.total_nrc_from_onetime_service.value) <= 0}
{assign var="value" value=$fields.total_nrc_from_onetime_service.default_value }
{else}
{assign var="value" value=$fields.total_nrc_from_onetime_service.value }
{/if} 
<span class="sugar_field" id="{$fields.total_nrc_from_onetime_service.name}">{$fields.total_nrc_from_onetime_service.value}</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.tax_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TAX_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.tax_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.tax_amount.name}'>
{sugar_number_format var=$fields.tax_amount.value }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.order_nrc_discont.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ORDER_NRC_DISCOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.order_nrc_discont.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.order_nrc_discont.name}'>
{sugar_number_format var=$fields.order_nrc_discont.value }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_GRAND_TOTAL' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.total_amount.name}'>
{sugar_number_format var=$fields.total_amount.value }
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_lmd.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_LMD' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.total_lmd.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.total_lmd.name}'>
{sugar_number_format var=$fields.total_lmd.value }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.shipping_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_AMOUNT' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.shipping_amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.shipping_amount.name}'>
{sugar_number_format var=$fields.shipping_amount.value }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.grand_total_nrc.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ONTIME_GRAND_TOTAL_NRC' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.grand_total_nrc.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.grand_total_nrc.name}'>
{sugar_number_format var=$fields.grand_total_nrc.value }
</span>
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_EDITVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='LBL_EMAIL_ADDRESSES' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_EMAIL_ADDRESSES' module='AOS_Quotes'}</h4>
<table id='detailpanel_5' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.template_ddown_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TEMPLATE_DDOWN_C' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%' colspan='3' >
{if !$fields.template_ddown_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.template_ddown_c.value) && ($fields.template_ddown_c.value != '^^')}
<input type="hidden" class="sugar_field" id="{$fields.template_ddown_c.name}" value="{$fields.template_ddown_c.value}">
{multienum_to_array string=$fields.template_ddown_c.value assign="vals"}
{foreach from=$vals item=item}
<li style="margin-left:10px;">{ $fields.template_ddown_c.options.$item }</li>
{/foreach}
{/if}
{/if}
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_EMAIL_ADDRESSES").style.display='none';</script>
{/if}
<div id='LBL_EDITVIEW_PANEL2' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL2' module='AOS_Quotes'}</h4>
<table id='detailpanel_6' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_cover_letter.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_COVER_LETTER' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_cover_letter.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_cover_letter.name|escape:'html'|url2html|nl2br}">
{$fields.quote_cover_letter.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_introduction.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_INTRODUCTION' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_introduction.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_introduction.name|escape:'html'|url2html|nl2br}">
{$fields.quote_introduction.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_final_notes.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_FINALNOTES' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_final_notes.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_final_notes.name|escape:'html'|url2html|nl2br}">
{$fields.quote_final_notes.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_important_details.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_IMPORTANT_DETAILS' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_important_details.hidden}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_EDITVIEW_PANEL2").style.display='none';</script>
{/if}
<div id='LBL_EDITVIEW_PANEL3' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_EDITVIEW_PANEL3' module='AOS_Quotes'}</h4>
<table id='detailpanel_7' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_cover_letter_extra_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_COVER_LETTER_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_cover_letter_extra_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_cover_letter_extra_c.name}"><p><span style="font-size: x-small;"><strong>Dear $contacts_first_name</strong>,<br /><br />It is my pleasure to offer <strong>$accounts_name</strong> NextLevel Clear Channel Internet and Hosted Voice services. NextLevel is completely dedicated to providing superior managed Internet and Voice services to enterprise businesses. Below you will find our service advantages:<br /><br /><span style="color: #0000ff;"><strong>Privately Managed Data Access </strong></span>- NextLevel Clear Channel Internet connectivity privately transports and prioritizes the Voice services directly to our highly-redundant, Tier 1 data centers.<br /><br /><span style="color: #0000ff;"><strong>Flawless voice quality</strong></span> - NextLevel Voice delivers carrier-grade voice service over a Tier 1 network that is specifically designed to provide exceptional clarity, reliability, and redundancy.<br /><br /><span style="color: #0000ff;"><strong>Predictable operating expenses</strong></span> - The NextLevel Voice platform has low to no capital costs with zero maintenance fees, zero management expenses, and flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>Simplicity and flexibility</strong></span> - Place the order and have voice services in hours, not days or weeks. Fast-growing companies and distributed companies with a large number of off-site employees are all supported with free unlimited calling between locations.<br /><br /><span style="color: #0000ff;"><strong>Premium feature bundles</strong></span> - The NextLevel Voice platform offers businesses a feature set comparable with overpriced PBX solutions previously available only to large enterprises, including Business Class Voicemail, Voicemail to Email, Web-based Administration, Auto-Attendant, Extension Dialing, Conference Calling, Call Transfer, 3-Way Calling, Call Forwarding, Distinctive Ringing, and Multi-Site Support - all with Unlimited Domestic Calling plans available.<br /><br /><span style="color: #0000ff;"><strong>Straightforward billing</strong></span> - There is only one bill and point of contact for all local, long distance, and data services. There is no costly investment or maintenance contract associated with an in-house PBX or hybrid phone system-only flat rate, per seat pricing.<br /><br /><span style="color: #0000ff;"><strong>24/7 support and service</strong></span> - NextLevel Internet prides itself on its customer retention and satisfaction, providing world class service with USA-based support.<br /><br />NextLevel Internet looks forward to exceeding your expectations!<br /><br /><br />Best Regards,</span><br /><br /><br /><br /><br /><br /><strong><span style="color: #0000ff; font-size: medium;">NextLevel Internet<br />"Where You Want To Be!"</span></strong></p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_introduction_extra_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_INTRODUCTION_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_introduction_extra_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.quote_introduction_extra_c.name}"><p><span style="font-size: x-small;"><span style="text-decoration: underline;"><span>USE FOR VOICE<br /></span></span></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Voice solution allows your business the opportunity to build a flexible and high availability PBX replacement system that affordably supports between 5 and 200+ users. This is a cost-effective alternative to purchasing, managing, and supporting an obsolete PBX or hybrid key system. NextLevel&rsquo;s mission-critical voice solution is designed to give you everything you need to maximize your company&rsquo;s uptime.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!<br /><br /><span style="text-decoration: underline; font-size: x-small;">USE FOR INTERNET<br /></span></p>
<p>NextLevel Internet&rsquo;s Clear Channel Connectivity allows customers to affordably select Internet speeds ranging from 1.5 Mb/s to 1,000 Mb/s. These privately managed internet connections with quality of service (QoS) are the perfect complement to NextLevel&rsquo;s hosted voice services. NextLevel&rsquo;s mission-critical Internet access and 24/7 NOC services are designed to give businesses everything they need to maximize company uptime. With 24/7 proactive monitoring, if you&rsquo;re having a problem, we&rsquo;ll call you! NextLevel&rsquo;s USA-based helpdesk engineers have minimum certifications of CCNA and MCSE and they are available as your first point of contact 24/7.<br /><br />At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</p>
<p><span style="text-decoration: underline; font-size: x-small;">USE FOR CO-LO</span></p>
<p><span style="font-size: x-small;">NextLevel Internet&rsquo;s mission critical co-location facilities allow your business to safely house equipment that requires 100% uptime. This is a cost-effective alternative to building and managing your own facility that also allows for unlimited bandwidth bursts. NextLevel&rsquo;s high availability solution is designed to give you everything you need to maximize your company&rsquo;s uptime and help you pass important audits such as the SAS70, Sarbanes- Oxley, HIPPA, ISO and others.</span></p>
<p><br /><span style="font-size: x-small;">At NEXTLEVEL INTERNET, we look forward to the opportunity to exceed your company&rsquo;s service expectations!</span></p></span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_final_notes_extra_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_FINAL_NOTES_EXTRA' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_final_notes_extra_c.hidden}
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
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.quote_important_details_extr_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUOTE_IMPORTANT_DETAILS_EXTR' module='AOS_Quotes'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.quote_important_details_extr_c.hidden}
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
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
&nbsp;
</td>
<td width='37.5%'  >
</td>
</tr>
{/capture}
{if $fieldsUsed > 0 && $fieldsUsed != $fieldsHidden}
{$tableRow}
{/if}
</table>
</div>
{if $panelFieldCount == 0 && !$useTabs}}
<script>document.getElementById("LBL_EDITVIEW_PANEL3").style.display='none';</script>
{/if}
</div></div>

</form>