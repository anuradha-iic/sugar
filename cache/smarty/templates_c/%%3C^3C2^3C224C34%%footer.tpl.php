<?php /* Smarty version 2.6.11, created on 2012-11-17 05:51:43
         compiled from custom/themes/Sugar5/tpls/footer.tpl */ ?>
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

<?php echo '
<script type="text/javascript">
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


<?php if ($_SESSION['loginAttempts']): ?>

<?php echo '
<script type="text/javascript">
$.idleTimeout(\'#idletimeout\', \'#idletimeout a\', {
	idleAfter: 600,
	keepAliveURL: \'keepalive.php\',
	serverResponseEquals: \'OK\',
	onTimeout: function(){
		$(this).slideUp();
		window.location = "index.php?module=Users&action=Logout";
	},
	onIdle: function(){
		$(this).slideDown(); // show the warning bar
	},
	onCountdown: function( counter ){
		$(this).find("span").html( counter ); // update the counter
	},
	onResume: function(){
		$(this).slideUp(); // hide the warning bar
	}
});
</script>
'; ?>


<?php endif; ?>

<?php $this->assign('actionURL', $_GET['action']);  $this->assign('moduleURL', $_GET['module']);  $this->assign('searchFormURL', $_GET['search_form']);  $this->assign('advancedURL', $_GET['advanced']);  $this->assign('queryStringURL', $_GET['query_string']); ?>
 


</body>
</html>