

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
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button primary" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='EditView';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Edit" id="edit_button" value="{$APP.LBL_EDIT_BUTTON_LABEL}">{/if} 
{if $bean->aclAccess("edit")}<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.isDuplicate.value=true; this.form.action.value='EditView'; this.form.return_id.value='{$id}';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Duplicate" value="{$APP.LBL_DUPLICATE_BUTTON_LABEL}" id="duplicate_button">{/if} 
{if $bean->aclAccess("delete")}<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}');" type="submit" name="Delete" value="{$APP.LBL_DELETE_BUTTON_LABEL}" id="delete_button">{/if} 
{if $bean->aclAccess("edit") && $bean->aclAccess("delete")}<input title="{$APP.LBL_DUP_MERGE}" accessKey="M" class="button" onclick="this.form.return_module.value='Opportunities'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='Step1'; this.form.module.value='MergeRecords';SUGAR.ajaxUI.submitForm(this.form);" type="button" name="Merge" value="{$APP.LBL_DUP_MERGE}" id="merge_duplicate_button">{/if} 
</form>
</td>
<td class="buttons" align="left" NOWRAP>
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Opportunities", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</td>
<td align="right" width="100%">{$ADMIN_EDIT}
{$PAGINATION}
</td>
</tr>
</table>{sugar_include include=$includes}
<div id="Opportunities_detailview_tabs"
>
<div >
<div id='DEFAULT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<table id='detailpanel_1' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OPPORTUNITY_NAME' module='Opportunities'}{/capture}
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
{if !$fields.account_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNT_NAME' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.account_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id" class="sugar_field">{$fields.account_name.value}</span>
{if !empty($fields.account_id.value)}</a>{/if}
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
{if !$fields.qualified_opportunity_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_QUALIFIED_OPPORTUNITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.qualified_opportunity_c.hidden}
{counter name="panelFieldCount"}

{if strval($fields.qualified_opportunity_c.value) == "1" || strval($fields.qualified_opportunity_c.value) == "yes" || strval($fields.qualified_opportunity_c.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="checkbox" class="checkbox" name="{$fields.qualified_opportunity_c.name}" id="{$fields.qualified_opportunity_c.name}" value="$fields.qualified_opportunity_c.value" disabled="true" {$checked}>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.opportunity_type.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.opportunity_type.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.opportunity_type.options)}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.options }">
{ $fields.opportunity_type.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.opportunity_type.name}" value="{ $fields.opportunity_type.value }">
{ $fields.opportunity_type.options[$fields.opportunity_type.value]}
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
{if !$fields.date_closed.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_CLOSED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_closed.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.date_closed.value) <= 0}
{assign var="value" value=$fields.date_closed.default_value }
{else}
{assign var="value" value=$fields.date_closed.value }
{/if} 
<span class="sugar_field" id="{$fields.date_closed.name}">{$fields.date_closed.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.amount.hidden}
{capture name="label" assign="label"}{$MOD.LBL_AMOUNT} ({$CURRENCY}){/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.amount.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.amount.name}'>
{sugar_number_format var=$fields.amount.value }
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
{if !$fields.sales_stage.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALES_STAGE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.sales_stage.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.sales_stage.options)}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.options }">
{ $fields.sales_stage.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.sales_stage.name}" value="{ $fields.sales_stage.value }">
{ $fields.sales_stage.options[$fields.sales_stage.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.amount_nrc.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AMOUNT_NRC' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.amount_nrc.hidden}
{counter name="panelFieldCount"}

<span id='{$fields.amount_nrc.name}'>
{sugar_number_format var=$fields.amount_nrc.value }
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
{if !$fields.probability.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PROBABILITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.probability.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.probability.name}">
{sugar_number_format precision=0 var=$fields.probability.value}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.total_amount.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TOTAL_OPP_AMOUNT' module='Opportunities'}{/capture}
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
{if !$fields.next_step.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NEXT_STEP' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.next_step.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.next_step.value) <= 0}
{assign var="value" value=$fields.next_step.default_value }
{else}
{assign var="value" value=$fields.next_step.value }
{/if} 
<span class="sugar_field" id="{$fields.next_step.name}">{$fields.next_step.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.description.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.description.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.description.name|escape:'html'|url2html|nl2br}">
{$fields.description.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
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
<script>document.getElementById("DEFAULT").style.display='none';</script>
{/if}
<div id='LBL_DETAILVIEW_PANEL2' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_DETAILVIEW_PANEL2' module='Opportunities'}</h4>
<table id='detailpanel_2' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lead_source.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEAD_SOURCE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lead_source.hidden}
{counter name="panelFieldCount"}


{if is_string($fields.lead_source.options)}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.options }">
{ $fields.lead_source.options }
{else}
<input type="hidden" class="sugar_field" id="{$fields.lead_source.name}" value="{ $fields.lead_source.value }">
{ $fields.lead_source.options[$fields.lead_source.value]}
{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.agent_referral_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AGENT_REFERRAL' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.agent_referral_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.account_id_c.value)}
{capture assign="detail_url"}index.php?module=Accounts&action=DetailView&record={$fields.account_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="account_id_c" class="sugar_field">{$fields.agent_referral_c.value}</span>
{if !empty($fields.account_id_c.value)}</a>{/if}
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
{if !$fields.campaign_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CAMPAIGN' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.campaign_name.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.campaign_id.value)}
{capture assign="detail_url"}index.php?module=Campaigns&action=DetailView&record={$fields.campaign_id.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="campaign_id" class="sugar_field">{$fields.campaign_name.value}</span>
{if !empty($fields.campaign_id.value)}</a>{/if}
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.referred_by_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REFERRED_BY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.referred_by_c.hidden}
{counter name="panelFieldCount"}

{if !empty($fields.contact_id_c.value)}
{capture assign="detail_url"}index.php?module=Contacts&action=DetailView&record={$fields.contact_id_c.value}{/capture}
<a href="{sugar_ajax_url url=$detail_url}">{/if}
<span id="contact_id_c" class="sugar_field">{$fields.referred_by_c.value}</span>
{if !empty($fields.contact_id_c.value)}</a>{/if}
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
<script>document.getElementById("LBL_DETAILVIEW_PANEL2").style.display='none';</script>
{/if}
<div id='LBL_DETAILVIEW_PANEL1' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_DETAILVIEW_PANEL1' module='Opportunities'}</h4>
<table id='detailpanel_3' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.salesforceopportunitiesid_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SALESFORCEOPPORTUNITIESID' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.salesforceopportunitiesid_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.salesforceopportunitiesid_c.value) <= 0}
{assign var="value" value=$fields.salesforceopportunitiesid_c.default_value }
{else}
{assign var="value" value=$fields.salesforceopportunitiesid_c.value }
{/if} 
<span class="sugar_field" id="{$fields.salesforceopportunitiesid_c.name}">{$fields.salesforceopportunitiesid_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.expectedrevenue_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPECTEDREVENUE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.expectedrevenue_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.expectedrevenue_c.value) <= 0}
{assign var="value" value=$fields.expectedrevenue_c.default_value }
{else}
{assign var="value" value=$fields.expectedrevenue_c.value }
{/if} 
<span class="sugar_field" id="{$fields.expectedrevenue_c.name}">{$fields.expectedrevenue_c.value}</span>
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
{if !$fields.forecastcategory_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FORECASTCATEGORY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.forecastcategory_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.forecastcategory_c.value) <= 0}
{assign var="value" value=$fields.forecastcategory_c.default_value }
{else}
{assign var="value" value=$fields.forecastcategory_c.value }
{/if} 
<span class="sugar_field" id="{$fields.forecastcategory_c.name}">{$fields.forecastcategory_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.ownerrole_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_OWNERROLE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.ownerrole_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.ownerrole_c.value) <= 0}
{assign var="value" value=$fields.ownerrole_c.default_value }
{else}
{assign var="value" value=$fields.ownerrole_c.value }
{/if} 
<span class="sugar_field" id="{$fields.ownerrole_c.name}">{$fields.ownerrole_c.value}</span>
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
{if !$fields.closed_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CLOSED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.closed_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.closed_c.value) <= 0}
{assign var="value" value=$fields.closed_c.default_value }
{else}
{assign var="value" value=$fields.closed_c.value }
{/if} 
<span class="sugar_field" id="{$fields.closed_c.name}">{$fields.closed_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.won_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_WON' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.won_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.won_c.value) <= 0}
{assign var="value" value=$fields.won_c.default_value }
{else}
{assign var="value" value=$fields.won_c.value }
{/if} 
<span class="sugar_field" id="{$fields.won_c.name}">{$fields.won_c.value}</span>
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
{if !$fields.age_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_AGE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.age_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.age_c.value) <= 0}
{assign var="value" value=$fields.age_c.default_value }
{else}
{assign var="value" value=$fields.age_c.value }
{/if} 
<span class="sugar_field" id="{$fields.age_c.name}">{$fields.age_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lastactivity_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LASTACTIVITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lastactivity_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.lastactivity_c.value) <= 0}
{assign var="value" value=$fields.lastactivity_c.default_value }
{else}
{assign var="value" value=$fields.lastactivity_c.value }
{/if} 
<span class="sugar_field" id="{$fields.lastactivity_c.name}">{$fields.lastactivity_c.value}</span>
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
{if !$fields.fiscalperiod_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FISCALPERIOD' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.fiscalperiod_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.fiscalperiod_c.value) <= 0}
{assign var="value" value=$fields.fiscalperiod_c.default_value }
{else}
{assign var="value" value=$fields.fiscalperiod_c.value }
{/if} 
<span class="sugar_field" id="{$fields.fiscalperiod_c.name}">{$fields.fiscalperiod_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.fiscalyear_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_FISCALYEAR' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.fiscalyear_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.fiscalyear_c.value) <= 0}
{assign var="value" value=$fields.fiscalyear_c.default_value }
{else}
{assign var="value" value=$fields.fiscalyear_c.value }
{/if} 
<span class="sugar_field" id="{$fields.fiscalyear_c.name}">{$fields.fiscalyear_c.value}</span>
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
{if !$fields.primarypartner_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_PRIMARYPARTNER' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.primarypartner_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.primarypartner_c.value) <= 0}
{assign var="value" value=$fields.primarypartner_c.default_value }
{else}
{assign var="value" value=$fields.primarypartner_c.value }
{/if} 
<span class="sugar_field" id="{$fields.primarypartner_c.name}">{$fields.primarypartner_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.nextgoal_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_NEXTGOAL' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.nextgoal_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.nextgoal_c.value) <= 0}
{assign var="value" value=$fields.nextgoal_c.default_value }
{else}
{assign var="value" value=$fields.nextgoal_c.value }
{/if} 
<span class="sugar_field" id="{$fields.nextgoal_c.name}">{$fields.nextgoal_c.value}</span>
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
{if !$fields.serviceaddress1street_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS1STREET' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress1street_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress1street_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress1street_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress1street_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress1street_c.name}">{$fields.serviceaddress1street_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress1city_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS1CITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress1city_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress1city_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress1city_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress1city_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress1city_c.name}">{$fields.serviceaddress1city_c.value}</span>
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
{if !$fields.serviceaddress1state_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS1STATE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress1state_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress1state_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress1state_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress1state_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress1state_c.name}">{$fields.serviceaddress1state_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress1zip_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS1ZIP' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress1zip_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress1zip_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress1zip_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress1zip_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress1zip_c.name}">{$fields.serviceaddress1zip_c.value}</span>
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
{if !$fields.serviceaddress1special_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS1SPECIAL ' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress1special_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress1special_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress1special_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress1special_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress1special_c.name}">{$fields.serviceaddress1special_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.term_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_TERM' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.term_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.term_c.value) <= 0}
{assign var="value" value=$fields.term_c.default_value }
{else}
{assign var="value" value=$fields.term_c.value }
{/if} 
<span class="sugar_field" id="{$fields.term_c.name}">{$fields.term_c.value}</span>
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
{if !$fields.requestedinstalldate_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_REQUESTEDINSTALLDATE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.requestedinstalldate_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.requestedinstalldate_c.value) <= 0}
{assign var="value" value=$fields.requestedinstalldate_c.default_value }
{else}
{assign var="value" value=$fields.requestedinstalldate_c.value }
{/if} 
<span class="sugar_field" id="{$fields.requestedinstalldate_c.name}">{$fields.requestedinstalldate_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.lastmonthdepositdiscount_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_LASTMONTHDEPOSITDISCOUNT' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.lastmonthdepositdiscount_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.lastmonthdepositdiscount_c.value) <= 0}
{assign var="value" value=$fields.lastmonthdepositdiscount_c.default_value }
{else}
{assign var="value" value=$fields.lastmonthdepositdiscount_c.value }
{/if} 
<span class="sugar_field" id="{$fields.lastmonthdepositdiscount_c.name}">{$fields.lastmonthdepositdiscount_c.value}</span>
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
{if !$fields.support_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SUPPORT' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.support_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.support_c.value) <= 0}
{assign var="value" value=$fields.support_c.default_value }
{else}
{assign var="value" value=$fields.support_c.value }
{/if} 
<span class="sugar_field" id="{$fields.support_c.name}">{$fields.support_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.importantdetails_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPORTANTDETAILS' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.importantdetails_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.importantdetails_c.value) <= 0}
{assign var="value" value=$fields.importantdetails_c.default_value }
{else}
{assign var="value" value=$fields.importantdetails_c.value }
{/if} 
<span class="sugar_field" id="{$fields.importantdetails_c.name}">{$fields.importantdetails_c.value}</span>
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
{if !$fields.comments_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_COMMENTS' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.comments_c.hidden}
{counter name="panelFieldCount"}

<span class="sugar_field" id="{$fields.comments_c.name|escape:'html'|url2html|nl2br}">
{$fields.comments_c.value|escape:'htmlentitydecode'|escape:'html'|url2html|nl2br}
</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress2street_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS2STREET' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress2street_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress2street_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress2street_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress2street_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress2street_c.name}">{$fields.serviceaddress2street_c.value}</span>
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
{if !$fields.serviceaddress2city_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS2CITY' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress2city_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress2city_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress2city_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress2city_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress2city_c.name}">{$fields.serviceaddress2city_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress2state_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS2STATE' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress2state_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress2state_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress2state_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress2state_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress2state_c.name}">{$fields.serviceaddress2state_c.value}</span>
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
{if !$fields.serviceaddress2zip_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS2ZIP' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress2zip_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress2zip_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress2zip_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress2zip_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress2zip_c.name}">{$fields.serviceaddress2zip_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.serviceaddress2special_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_SERVICEADDRESS2SPECIAL ' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.serviceaddress2special_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.serviceaddress2special_c.value) <= 0}
{assign var="value" value=$fields.serviceaddress2special_c.default_value }
{else}
{assign var="value" value=$fields.serviceaddress2special_c.value }
{/if} 
<span class="sugar_field" id="{$fields.serviceaddress2special_c.name}">{$fields.serviceaddress2special_c.value}</span>
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
{if !$fields.monthlysubtotal_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_MONTHLYSUBTOTAL' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.monthlysubtotal_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.monthlysubtotal_c.value) <= 0}
{assign var="value" value=$fields.monthlysubtotal_c.default_value }
{else}
{assign var="value" value=$fields.monthlysubtotal_c.value }
{/if} 
<span class="sugar_field" id="{$fields.monthlysubtotal_c.name}">{$fields.monthlysubtotal_c.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.installationsubtotal_c.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_INSTALLATIONSUBTOTAL' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.installationsubtotal_c.hidden}
{counter name="panelFieldCount"}

{if strlen($fields.installationsubtotal_c.value) <= 0}
{assign var="value" value=$fields.installationsubtotal_c.default_value }
{else}
{assign var="value" value=$fields.installationsubtotal_c.value }
{/if} 
<span class="sugar_field" id="{$fields.installationsubtotal_c.name}">{$fields.installationsubtotal_c.value}</span>
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
<script>document.getElementById("LBL_DETAILVIEW_PANEL1").style.display='none';</script>
{/if}
<div id='LBL_PANEL_ASSIGNMENT' class='detail view'>
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
<h4>{sugar_translate label='LBL_PANEL_ASSIGNMENT' module='Opportunities'}</h4>
<table id='detailpanel_4' cellspacing='{$gridline}'>
{counter name="fieldsUsed" start=0 print=false assign="fieldsUsed"}
{counter name="fieldsHidden" start=0 print=false assign="fieldsHidden"}
{capture name="tr" assign="tableRow"}
<tr>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.assigned_user_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Opportunities'}{/capture}
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
{if !$fields.date_modified.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_MODIFIED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_modified.hidden}
{counter name="panelFieldCount"}
<span id="date_modified" class="sugar_field">{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}</span>
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
{if !$fields.created_by_name.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_CREATED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.created_by_name.hidden}
{counter name="panelFieldCount"}

<span id="created_by" class="sugar_field">{$fields.created_by_name.value}</span>
{/if}
</td>
{counter name="fieldsUsed"}
<td width='12.5%' scope="row">
{if !$fields.date_entered.hidden}
{capture name="label" assign="label"}{sugar_translate label='LBL_DATE_ENTERED' module='Opportunities'}{/capture}
{$label|strip_semicolon}:
{/if}
</td>
<td width='37.5%'  >
{if !$fields.date_entered.hidden}
{counter name="panelFieldCount"}
<span id="date_entered" class="sugar_field">{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}</span>
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
<script>document.getElementById("LBL_PANEL_ASSIGNMENT").style.display='none';</script>
{/if}
</div></div>

</form>