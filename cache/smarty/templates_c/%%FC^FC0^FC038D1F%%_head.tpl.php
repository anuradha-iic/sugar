<?php /* Smarty version 2.6.11, created on 2012-11-17 05:51:48
         compiled from custom/themes/Sugar5/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getimagepath', 'custom/themes/Sugar5/tpls/_head.tpl', 51, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
<title><?php echo $this->_tpl_vars['APP']['LBL_BROWSER_TITLE']; ?>
</title>
<?php echo $this->_tpl_vars['SUGAR_CSS']; ?>

<?php echo $this->_tpl_vars['SUGAR_JS']; ?>

<?php echo '
<script type="text/javascript">
<!--
SUGAR.themes.theme_name      = \'';  echo $this->_tpl_vars['THEME'];  echo '\';
SUGAR.themes.theme_ie6compat = ';  echo $this->_tpl_vars['THEME_IE6COMPAT'];  echo ';
SUGAR.themes.hide_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this); echo '\';
SUGAR.themes.show_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this); echo '\';
SUGAR.themes.loading_image      = \'';  echo smarty_function_sugar_getimagepath(array('file' => "img_loading.gif"), $this); echo '\';
SUGAR.themes.allThemes       = eval(';  echo $this->_tpl_vars['allThemes'];  echo ');
if ( YAHOO.env.ua )
    UA = YAHOO.env.ua;
-->
</script>
<script type="text/javascript" src="custom/include/javascript/jquery.js"></script>
<script src="custom/include/javascript/jquery.idletimer.js" type="text/javascript"></script>
<script src="custom/include/javascript/jquery.idletimeout.js" type="text/javascript"></script>

<!-- we want to force people to click a button, so hide the close link in the toolbar -->
<style type="text/css">a.ui-dialog-titlebar-close { display:none }
#idletimeout { background:#8C2B2B; border:3px solid #8C2B2B; color:#fff; font-family:arial, sans-serif; text-align:center; font-size:12px; padding:10px; position:fixed; top:0px; left:0; right:0; z-index:100000; display:none; }
#idletimeout a { color:#fff; font-weight:bold }
#idletimeout span { font-weight:bold }</style>
'; ?>

</head>
<div id="idletimeout">
	You will be logged off in <span><!-- countdown place holder --></span>&nbsp;seconds due to inactivity. 
	<a id="idletimeout-resume" href="#">Click here to continue using this web page</a>.
</div>
<a name="top"></a>