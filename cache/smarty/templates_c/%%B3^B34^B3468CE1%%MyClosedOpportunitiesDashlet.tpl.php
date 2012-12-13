<?php /* Smarty version 2.6.11, created on 2012-11-19 09:40:33
         compiled from modules/Opportunities/Dashlets/MyClosedOpportunitiesDashlet/MyClosedOpportunitiesDashlet.tpl */ ?>

<div style="width:100%;vertical-align:middle;">
<table width="100%" border="0" align="center" class="list view" cellspacing="0" cellpadding="0">
	<tr>
		<th  align="center"><?php echo $this->_tpl_vars['lblTotalOpportunities']; ?>
</td>
		<th  align="center"><?php echo $this->_tpl_vars['lblClosedWonOpportunities']; ?>
</td>
	</tr>
	<tr class="oddListRowS1">
		<td valign="top"><?php echo $this->_tpl_vars['total_opportunities']; ?>
</td>
		<td valign="top"><b><?php echo $this->_tpl_vars['total_opportunities_won']; ?>
</b></td>
	</tr>
</table>
</div>