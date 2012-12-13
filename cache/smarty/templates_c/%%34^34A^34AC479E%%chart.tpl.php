<?php /* Smarty version 2.6.11, created on 2012-11-18 23:07:36
         compiled from include/SugarCharts/Jit/tpls/chart.tpl */ ?>

<?php if (! $this->_tpl_vars['error']): ?>
<script type="text/javascript">
	<?php echo '
	SUGAR.util.doWhen(
		"((SUGAR && SUGAR.mySugar && SUGAR.mySugar.sugarCharts)   || SUGAR.loadChart  || document.getElementById(\'showHideChartButton\') != null) && typeof(loadSugarChart) != undefined",
		function(){
			'; ?>

			var css = new Array();
			var chartConfig = new Array();
			<?php $_from = $this->_tpl_vars['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['selector'] => $this->_tpl_vars['property']):
?>
				css["<?php echo $this->_tpl_vars['selector']; ?>
"] = '<?php echo $this->_tpl_vars['property']; ?>
';
			<?php endforeach; endif; unset($_from); ?>
			<?php $_from = $this->_tpl_vars['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
				chartConfig["<?php echo $this->_tpl_vars['name']; ?>
"] = '<?php echo $this->_tpl_vars['value']; ?>
';
			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['height'] > 480): ?>
				chartConfig["scroll"] = true;
			<?php endif; ?>
			loadCustomChartForReports = function(){
				loadSugarChart('<?php echo $this->_tpl_vars['chartId']; ?>
','<?php echo $this->_tpl_vars['filename']; ?>
',css,chartConfig,1);
			};
			loadCustomChartForReports();
			<?php echo '
		}
	);
	'; ?>

</script>

<div class="chartContainer">
	<div id="sb<?php echo $this->_tpl_vars['chartId']; ?>
" class="scrollBars">
    <div id="<?php echo $this->_tpl_vars['chartId']; ?>
" class="chartCanvas" style="width: <?php echo $this->_tpl_vars['width']; ?>
; height: <?php echo $this->_tpl_vars['height']; ?>
px;"></div>  
    </div>
	<div id="legend<?php echo $this->_tpl_vars['chartId']; ?>
" class="legend"></div>
</div>
<div class="clear"></div>
<?php else: ?>

<?php echo $this->_tpl_vars['error']; ?>

<?php endif; ?>