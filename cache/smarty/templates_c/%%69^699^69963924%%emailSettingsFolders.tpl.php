<?php /* Smarty version 2.6.11, created on 2012-12-05 12:54:07
         compiled from modules/Emails/templates/emailSettingsFolders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'modules/Emails/templates/emailSettingsFolders.tpl', 49, false),)), $this); ?>
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="view">
	<tr>
		<th colspan="4">
			<h4><?php echo $this->_tpl_vars['app_strings']['LBL_EMAIL_FOLDERS_TITLE']; ?>
</h4>
		</th>
	</tr>
    <tr>
		<td NOWRAP style="padding: 8px;" valign="top" scope="row">
			<div>
				<?php echo $this->_tpl_vars['app_strings']['LBL_EMAIL_SETTINGS_USER_FOLDERS']; ?>
:
				<div id="rollover">
                    <a href="#" class="rollover"><img border="0" src="<?php echo smarty_function_sugar_getimagepath(array('file' => 'helpInline.gif'), $this);?>
"><span><?php echo $this->_tpl_vars['app_strings']['LBL_EMAIL_MULTISELECT']; ?>
</span></a>
                </div>
			</div>
			<br/>
			<div>
				<select multiple size="8" STYLE="width: 140px" name="userFolders[]" id="userFolders" onchange="SUGAR.email2.folders.updateSubscriptions();"></select>
			</div>
		</td>

	</tr>
	<tr>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    	<td align="right">
    	   <input type="button" class="button" style="margin-left:5px;" value="   <?php echo $this->_tpl_vars['app_strings']['LBL_EMAIL_DONE_BUTTON_LABEL']; ?>
   " onclick="javascript:SUGAR.email2.settings.saveOptionsGeneral(true);">
        </td>
	</tr>
</table>