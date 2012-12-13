<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AOS_QuotesViewEdit extends ViewEdit {
	function AOS_QuotesViewEdit(){
 		parent::ViewEdit();
 	}
	
	function getopportContactsDetailsByID($opportID)
	{
	     global $db;
			if ( ! isset($db) ) 
			 { 
				   $db = DBManagerFactory::getInstance(); 
			 } 
		 $result = array();
		 
	     $fetchopportData = "SELECT contact_id_c FROM opportunities_cstm WHERE id_c = '$opportID'"; 
		 $resultProIds = $db->query($fetchopportData);  
			while (($row2 = $db->fetchByAssoc($resultProIds)) != null) {
				  $contact_id_c = $row2['contact_id_c'];
			 } 
	      
 		 $fetchcontactData = "SELECT first_name, last_name FROM contacts WHERE id = '$contact_id_c'"; 
		 $resultcontactData = $db->query($fetchcontactData);  
			while (($row3 = $db->fetchByAssoc($resultcontactData)) != null) {
				    $first_name = $row3['first_name'];
					$last_name  = $row3['last_name'];
			 }
		
        $result['first_name'] = $first_name;	
		$result['last_name'] = $last_name;
		$result['name'] = $first_name.' '.$last_name;
		$result['ContactID'] = $contact_id_c;
		
		return $result;
	}
	
	function display(){ 
		global $locale;
		$format = $locale->getPrecedentPreference('default_date_format');
		
		?> 
		            <script>
					      var opportContactDetails = new Array();  
					</script>
		<?php
		  
		if( isset($_REQUEST['parent_type']) and $_REQUEST['parent_type'] != '' )
		{
		     $opportunity_nameSubPanel = $_REQUEST['opportunity_name'];
			 $opportunity_idSubPanel   = $_REQUEST['opportunity_id'];
			 $opportContactDetails            = array();
			 $opportContactDetails     = $this->getopportContactsDetailsByID($opportunity_idSubPanel); 
			    foreach($opportContactDetails as $key=>$val)
				 {
	    ?> 
		            <script>
					        opportContactDetails["<?php echo $key; ?>"] = "<?php echo $val; ?>";
					</script>
		<?php    }
		 }
		else
        {
             $opportunity_nameSubPanel = "";
			 $opportunity_idSubPanel   = "";
			 $opportContactDetails            = array();
			 ?> 
		            <script> 
							  opportContactDetails["first_name"] = "";						  
							  opportContactDetails["last_name"] = "";
							  opportContactDetails["name"] = "";
							  opportContactDetails["ContactID"] = "";
					</script>
		<?php 
	    } 
		  ?>
                <script>
                        document.getElementById('df_id').value = "<?php echo $format; ?>";
						var opportunity_nameSubPanel = "<?php echo $opportunity_nameSubPanel; ?>";  
			    </script>
		  <?php 
			 if(empty($this->bean->id))
			 {
			      //echo "Add Quotes case"; http://sugarcrm-dev.nextlevelinternet.com/index.php?module=AOS_Quotes&return_module=AOS_Quotes&action=EditView 
			    if(isset($_REQUEST['ajax_load']) and $_REQUEST['ajax_load'] == 1 )	
                 {				
				 ?>
				     <script>
                          window.location = "index.php?module=AOS_Quotes&return_module=AOS_Quotes&action=EditView";
			         </script>
				 <?php  
				 } 
				 else
				 { 
					 $this->populateCurrency();
					 $this->populateQuoteTemplates();
					 $this->populateLineItems();
					 parent::display();
					 $this->displayJS();
				 }	 
			 }	
			 else
			 {
				 $this->populateCurrency();
				 $this->populateQuoteTemplates();
				 $this->populateLineItems();
				 parent::display();
				 $this->displayJS(); 
			 }	 
	}
	
	
	function populateCurrency(){
		global $mod_strings;
		require_once('modules/Currencies/Currency.php');
		$currency  = new Currency();
		$currText = '';
		if(isset($this->bean->currency_id) && !empty($this->bean->currency_id)){
			$currency->retrieve($this->bean->currency_id);
			if( $currency->deleted != 1){
				$currText =  $currency->iso4217 .' '.$currency->symbol;
			}else{
				$currText = $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol();
			}
		}else{
			$currText = $currency->getDefaultISO4217() .' '.$currency->getDefaultCurrencySymbol();
		}
		
		$this->ss->assign('CURRENCY', $currText);
		/*$mod_strings['LBL_LIST_PRICE'] .= " (".$currText.")";
		$mod_strings['LBL_UNIT_PRICE'] .= " (".$currText.")";
		$mod_strings['LBL_VAT_AMT'] .= " (".$currText.")";
		$mod_strings['LBL_TOTAL_PRICE'] .= " (".$currText.")";
		$mod_strings['LBL_SERVICE_PRICE'] .= " (".$currText.")";*/
	}
	
	function populateQuoteTemplates(){
		global $app_list_strings, $current_user;
		
		$sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='Quotes'";
		
		$res = $this->bean->db->query($sql);
		while($row = $this->bean->db->fetchByAssoc($res)){
			$app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
		}
	}
	
	function populateLineItems(){	
		global $locale, $app_list_strings, $app_strings, $mod_strings, $popup_request_data, $sugar_config;
		
		$json = getJSONobj();
		$encoded_contact_popup_request_data = $json->encode($popup_request_data);
  		
  		//$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
  		$sql = "SELECT ln.*,sa.name service_address_name FROM aos_products_quotes ln LEFT JOIN nli_serviceaddresses sa ON sa.id =ln.service_address_id AND sa.deleted =0 WHERE ln.parent_type = 'AOS_Quotes' AND ln.parent_id = '".$this->bean->id."' AND ln.is_service = '0' AND ln.deleted = 0 ORDER BY ln.number ASC";
  		$result = $this->bean->db->query($sql);
		
		$html = '<input type="hidden" id="editcase" value="'.$this->bean->id.'" /> ';
		$html .= '<script language="javascript"> var module = "AOS_Quotes"; </script>';
		
		$html .= "<table class='list view'  border='0' cellspacing='0' width='100%' id='productLine'>";
					
		$html .= "<tr id='productHeader' style='display: none'>";
		
                $html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_QUANITY']."</th>";
	        $html .= "<th width='10%' class='dataLabel' style='text-align: left;' colspan='2'>".$mod_strings['LBL_PRODUCT_NAME']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_CODE']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_UNIT']."</th>";
		$html .="<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PER_UNIT_PRICE']."</th>";
                $html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_LIST_PRICE']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_DISCOUNT_AMT']."</th>";
	//	$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_UNIT_PRICE']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_TOTAL_AMT']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_NRC']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_LMD']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_VAT_AMT']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_DESIRED_DATE_INSTALL']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: center;'>".str_replace(" ","<br>",$mod_strings['LBL_SERVICE_PERIOD'])."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: center;'>".$mod_strings['LBL_RENEWAL_PERIOD']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_SERVICE_ADDRESS']."</th>";
		$html .= "<th width='5%' colspan='3' class='dataLabel' style='text-align: left;'>&nbsp;</th>";

		$html .= "</tr>";
		
		$decimals = $locale->getPrecision();
		$sep = get_number_seperators();
		
		$i = 0;
		while ($row = $this->bean->db->fetchByAssoc($result)) {
		
		if($i == 0)
		{
			$html .= '<script language="javascript">window.onload = function (){showProductHeader(true);}</script>';
		}

			$sqs_objects = array('product_name['.$i.']' =>
			 	array(
			 	'form' => 'EditView',
                    		'method' => 'query',
                    		'modules' => array('AOS_Products'),
                    		'group' => 'or',
                    		'field_list' => array('name', 'id','cost','price','unit_measure','maincode'),
                    		'populate_list' => array('product_name['.$i.']', 'product_id['.$i.']','product_cost_price['.$i.']','product_list_price['.$i.']','unit['.$i.']','product_code['.$i.']'),
                   	 	'required_list' => array('product_id['.$i.']'),
                    		'conditions' => array(array('name'=>'name','op'=>'like_custom','end'=>'%','value'=>'')),
                    		'order' => 'name',
                    		'limit' => '30',
                    		'post_onblur_function' => 'formatListPrice('.$i.');',
                    		'no_match_text' => $app_strings['ERR_SQS_NO_MATCH']
                   		)
                	);
                                   
                	$quicksearch_js = '<script language="javascript">';
           		$quicksearch_js.= 'if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}';
           	
           		foreach($sqs_objects as $sqsfield=>$sqsfieldArray){
               			$quicksearch_js .= "sqs_objects['$sqsfield']={$json->encode($sqsfieldArray)};";
           		}
           		
           		$html .= $quicksearch_js . '</script>';
           		
			$row['id'] = (isset($_REQUEST['Duplicate']) && trim($_REQUEST['Duplicate']) == 'Duplicate')?"":$row['id'];
			
			$html .= "<tr class='oddListRowS1' height='20' id='product_line$i'>";
			$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_qty[$i]' id='product_qty$i' size='8' maxlength='10' value='".rtrim(rtrim(format_number($row['product_qty']), '0'),$sep[1])."' rel='lineitem_qty_rel' title='' onblur='getListPriceFromLookup($i); Quantity_formatNumber($i);calculateProductLine($i);'></td>";

 $html .= "<td class='dataField'><input class='sqsEnabled' autocomplete='off' tabindex='116' readonly='readonly' type='text' name='product_name[$i]' id='product_name$i' size='16' maxlength='50' value='".$row['name']."' title=''><input type='hidden' name='product_id[$i]' id='product_id$i' value='".$row['product_id']."'></td>";
                        $html .= "<td class='dataField'><button title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' accessKey='".$app_strings['LBL_SELECT_BUTTON_KEY']."' type='button' tabindex='116' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='btn1' onclick='openProductPopup($i)'><img src='themes/default/images/id-ff-select.png' alt='".$app_strings['LBL_SELECT_BUTTON_LABEL']."'></button></td>";

$html .= "<td class='dataField'><input readonly='readonly' tabindex='116' type='text' name='product_code[$i]' id='product_code$i' size='7' maxlength='20' value='".$row['product_code']."' title=''></td>";

$html .= "<td class='dataField'><input readonly='readonly' tabindex='116' type='text' name='unit[$i]' id='unit$i' size='4' maxlength='10' value='".$row['unit']."' title=''></td>";

$html .= "<td class='dataField'><input style='width:55px' readonly='readonly' tabindex='116' type='text' name='per_unit_price[]' id='per_unit_price$i' size='8' maxlength='10' value='".$row['per_unit_price']."' title=''></td>";
		  	$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_list_price[$i]' id='product_list_price$i' size='10' maxlength='50' value='".format_number($row['product_list_price'])."' title='' onfocus='calculateDiscount($i);'><input type='hidden' name='product_cost_price[$i]' id='product_cost_price$i' value='".format_number($row['product_cost_price'])."' /></td>";
		  	$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_discount[]' rel='product_discount_rel' id='product_discount$i' size='10' maxlength='50' value='".format_number($row['product_discount'])."' title='' tabindex='116' onfocus='calculateDiscount($i);' onblur='calculateDiscount($i);'><input type='hidden' name='product_discount_amount[]' id='product_discount_amount$i' value='".format_number($row['product_discount_amount'])."' />"."<input type='hidden' name='product_unit_price[]' id='product_unit_price$i' size='10' maxlength='50' value='".format_number($row['product_unit_price'])."'  >"."</td>";
//$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_unit_price[]' id='product_unit_price$i' size='10' maxlength='50' value='".format_number($row['product_unit_price'])."' title='' onfocus='calculateDiscount($i);' onblur='calculateDiscount($i); calculateProductLine($i);' ></td>";
                    
		  	
$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_total_price[]' id='product_total_price$i' size='10' maxlength='50' value='".format_number($row['product_total_price'])."' title='' readonly='readonly'></td>";

                        $html .= "<td class='dataField'><input tabindex='116' type='text' name='product_total_nrc[]' id='product_total_nrc$i' size='10' maxlength='50' value='".format_number($row['product_total_nrc'])."' title='' ></td>";
                        $html .= "<td class='dataField'><input tabindex='116' type='text' name='product_total_lmd[]' id='product_total_lmd$i' size='10' maxlength='50' value='".format_number($row['product_total_lmd'])."' title='' ></td>";

$html .= "<td class='dataField'><input tabindex='116' type='text' name='vat_amt[]' readonly='readonly' id='vat_amt$i' size='10' maxlength='50' value='".format_number($row['vat_amt'])."'  title=''></td>";		  	
global $timedate;
$html .= "<td class='dataField'><table border=0 ><tr><td><input tabindex='116' type='text' name='desired_install_date[]' id='desired_install_date$i' size='10' maxlength='50' value='".$timedate->to_display_date($row['desired_install_date'])."'  title=''></td><td> <img align='left' src='themes/Sugar5/images/jscalendar.gif' border=0 id='date_install_triggr_$i' /> <script type='text/javascript'>Calendar.setup ({inputField : 'desired_install_date$i',ifFormat : '%m/%d/%Y %I:%M%P',daFormat : '%m/%d/%Y %I:%M%P',button : 'date_install_triggr_$i',singleClick : true,dateStr : '02/29/2012',step : 1,weekNumbers:false});</script></td></tr></table></td>";
/*
$html .= "<td class='dataField'><select tabindex='116' name='product_service_period[]' id='product_service_period$i' >".get_select_options_with_id($app_list_strings['nli_periods_dom'], $row['product_service_period'])."</select></td>";*/
$html .= "<td class='dataField' align='center'><input style='width:30px' tabindex='116' rel='product_service_period_rel' name='product_service_period[]' id='product_service_period$i' value='". $row['product_service_period']."' /></td>";
/*$html .= "<td class='dataField'><select tabindex='116' name='product_renewal_period[]' id='product_renewal_period$i' >".get_select_options_with_id($app_list_strings['nli_periods_dom'], $row['product_renewal_period'])."</select></td>";
*/
$html .= "<td class='dataField' align='center' ><input style='width:30px' tabindex='116' rel='product_renewal_period_rel' name='product_renewal_period[]' id='product_renewal_period$i' value='". $row['product_renewal_period']."' /></td>";  

$html .= "<td class='dataField'><input type='hidden' name='service_address_id[]' rel='service_address_rel'  id='service_address_id$i' value='".$row['service_address_id']."'><input type='text' name='service_address_name[]' id='service_address_name$i' readonly='readonly' style='width:55px;' value='".$row['service_address_name']."'></td>";

//$html .= "<td class='dataField'><input type='hidden' name='service_address_id[]' id='service_address_id$i' value='".$row['service_address_id']."'><input style='width:118px' type='text' name='service_address_name[]' id='service_address_name$i' value='".$row['service_address_name']."'></td>";
$html .= "<td class='dataField'><button title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' accessKey='".$app_strings['LBL_SELECT_BUTTON_KEY']."' type='button' tabindex='116' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='btn1' onclick='openServiceAddressesPopup($i)'><img src='themes/default/images/id-ff-select.png' alt='".$app_strings['LBL_SELECT_BUTTON_LABEL']."'></button></td>";
		  	
$html .= "<td class='dataField'><input type='hidden' name='product_deleted[]' id='product_deleted$i' value='0'><input type='hidden' name='product_quote_id[]' value='".$row['id']."'><button type='button' class='button' value='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."' tabindex='116' onclick='markProductLineDeleted($i)'><input type='hidden' name='is_service[]' value='0' /><img src='themes/default/images/id-ff-clear.png' alt='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."'></button></td>";
		  	$html .= "</tr>";
                        
           		$html .= "<tr class='oddListRowS1' height='20'  id='product_note_line$i'>";
			$html .= "<td class='dataField' align='right' style='padding:0px;margin:0px;vertical-align:top'><table border='0' cellspacing='3' cellpadding='0' > <tr><td class='dataField' align='right' >".$mod_strings['LBL_PRODUCT_QUOTE_DESC']." :&nbsp;</td></td></tr><tr><td class='dataField' align='right' >".$mod_strings['LBL_PRODUCT_NOTE']." :&nbsp</td></tr></table></td>";
			$html .= "<td class='dataField' colspan='6'><table border='0' cellspacing='0' cellpadding='0' > <tr><td class='dataField' align='left' > <input type='text'id='quotes_product_name$i' name='quotes_product_name[]' value='".$row['quotes_product_name']."' /></td></tr><tr><td class='dataField' align='left'><textarea tabindex='116' name='product_note[]' id='product_note$i' rows='2' cols='53'>".$row['description']."</textarea></td></tr></table></td>";
			$html .= "<td class='dataField' colspan='4'>".$mod_strings['LBL_DISCOUNT_TYPE']."&nbsp;:&nbsp;<select tabindex='116' name='discount[]' id='discount$i' onchange='calculateDiscount($i);'>".get_select_options_with_id($app_list_strings['discount_list'], $row['discount'])."</select></td>";
			$html .= "<td class='dataField'>".$mod_strings['LBL_SUBTOTAL_MONTHLY_TAX_TOTAL']." %&nbsp; :&nbsp;&nbsp;<select tabindex='116' name='vat[]' id='vat$i' onchange='calculateProductLine($i);'>".get_select_options_with_id($app_list_strings['vat_list'], $row['vat'])."</select></td>";
			$html .= "<td class='dataField' colspan='1'></td>";
			$html .= "</tr>";
			
		  	$i++;
		}
		
		$html .= '<script language="javascript">prodLine = '.$i.';</script>';
		$html .= "</table>";


                $html .= '<table width="100%">
                            <tr>
                            <td width="40%"></td>
                            <td>
                                <table id="productSubTotals" class="list view" border="0" cellspacing="0" width="100% style="display:none;" >

				<tr  class="oddListRowS1" height="20" >
                                    <th colspan="6" width="100%" style="text-align:center" >'.$mod_strings['LBL_PRODUCT_SUBTOTAL'].'</th>
				</tr>
				<tr  class="oddListRowS1" height="20">
                                    <th width="5%" >'.$mod_strings['LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL'].'</th>
                                    <th width="5%" >'.$mod_strings['LBL_SUBTOTAL_MONTHLY_MRC_DISCOUNT'].'</th>
                                    <th width="5%" >'.$mod_strings['LBL_SUBTOTAL_MONTHLY_MRC_TOTAL'].'</th>
				    <th width="5%" >'.$mod_strings['LBL_SUBTOTAL_MONTHLY_NRC_TOTAL'].'</th>
				    <th width="5%">'.$mod_strings['LBL_SUBTOTAL_MONTHLY_LMD_TOTAL'].'</th>
                                    <th width="5%">'.$mod_strings['LBL_SUBTOTAL_MONTHLY_TAX_TOTAL'].'</th>
				</tr>
				<tr class="oddListRowS1" height="20" >
                                     <td  width="5%" >
					<input type="text" name="product_subtotal_list_price" id="product_subtotal_list_price" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_list_price).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     <td  width="5%" >
					<input type="text" name="product_subtotal_discount" id="product_subtotal_discount" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_discount).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     <td  width="5%" >
					<input type="text" name="product_subtotal_mrc" id="product_subtotal_mrc" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_mrc).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     <td width="5%" >
					<input type="text" name="product_subtotal_nrc" id="product_subtotal_nrc" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_nrc).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     <td width="5%" >
                                        <input type="text" name="product_subtotal_lmd" id="product_subtotal_lmd" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_lmd).'" title="" tabindex="116" readonly="readonly" />
				      </td>
                                     <td width="5%" >
                                        <input type="text" name="product_subtotal_tax" id="product_subtotal_tax" size="10" maxlength="26" value="'.format_number($this->bean->product_subtotal_tax).'" title="" tabindex="116" readonly="readonly" />
				      </td>
				</tr>
					</table>

                                </td>
                                <td width="40%"></td>


                                </tr>
                                </table> ';

		//HIDDEN fields for totals  
		
	  /*<input type="hidden" name="total_nrc" id="total_nrc" >*/
        $html .= '<div > <input type="hidden" name="total_discount" id="discount_amount" >
		                 <input type="hidden" name="total_discount2" id="total_discount" >
						 <input type="hidden" name="total_nrc_discont" id="total_nrc_discont" >
		  <input type="hidden" name="total_amt" id="total_amt" >
		
                  </div> ';

  		//$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
		$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND is_service = '1' AND deleted = 0 ORDER BY number ASC";
  		$result = $this->bean->db->query($sql);
  		
		if(preg_match('/^6\.?[2-9]/', $sugar_config['sugar_version'])){
			$html .= "<table class='list view'  border='0' cellspacing='0' width='100%' id='serviceLine'>";
		}else{
			$html .= "<table  class='list view'  border='0' cellspacing='0' width='100%' id='serviceLine'>";
		}
		
		$html .= "<tr id='serviceHeader' style='display: none'>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_QUANITY']."</th>";
	        $html .= "<th width='10%' class='dataLabel' style='text-align: left;' colspan='2'>".$mod_strings['LBL_PRODUCT_NAME']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_CODE']."</th>";
		$html .= "<th width='3%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_UNIT']."</th>";
		$html .= "<th width='3%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PER_UNIT_PRICE']."</th>";
		$html .= "<th width='5%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_LIST_PRICE']."</th>";
		$html .= "<th width='15%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_DISCOUNT_NRC']."</th>";
		$html .= "<th width='15%' class='dataLabel' style='text-align: left;'>".$mod_strings['LBL_PRODUCT_NRC']."</th>";
		$html .= "<th width='10%' class='dataLabel' style='text-align: left;'>&nbsp;</th>";
		$html .= "<th width='10%' class='dataLabel' style='text-align: left;'>&nbsp;</th>";
		$html .= "<th width='10%' class='dataLabel' style='text-align: left;'>&nbsp;</th>";
		$html .= "<th width='10%' class='dataLabel' style='text-align: left;'>&nbsp;</th>";
		$html .= "<th width='10%' class='dataLabel' style='text-align: left;'>&nbsp;</th>";
		$html .= "</tr>";
		
		$k = 0;
		while ($row = $this->bean->db->fetchByAssoc($result)) {
		
		if($k == 0)
		{
			$html .= '<script language="javascript">showServiceHeader(true);</script>';
		}
           		
			$row['id'] = (isset($_REQUEST['Duplicate']) && trim($_REQUEST['Duplicate']) == 'Duplicate')?"":$row['id'];
			
			/*$html .= "<tr id='service_line$k'>";
			$html .= "<td class='dataField' colspan='4'><textarea tabindex='116' type='text' name='product_name[]' id='service_name$k' size='16' cols='60' title='' maxlength='255' onkeypress='return imposeMaxLength(this);'>".$row['name']."</textarea><input type='hidden' name='product_id[]' id='service_id$k' value='".$row['product_id']."'></td>";
		  	$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_unit_price[]' id='service_unit_price$k' size='16' maxlength='50' value='".format_number($row['product_unit_price'])."' title=''  onblur='calculateServiceLine($k);'></td>";
			$html .= "<td class='dataField'><input tabindex='116' type='text' name='vat_amt[]' id='ser_vat_amt$k' size='16' maxlength='50' value='".format_number($row['vat_amt'])."' readonly title=''><br />".$mod_strings['LBL_VAT']." %&nbsp; :&nbsp;&nbsp;<select name='vat[]' tabindex='116' id='ser_vat$k' onchange='calculateServiceLine($k);'>".get_select_options_with_id($app_list_strings['vat_list'], $row['vat'])."</select></td>";
		  	$html .= "<td class='dataField'><input tabindex='116' type='text' name='product_total_price[]' id='service_total_price$k' size='16' maxlength='50' value='".format_number($row['product_total_price'])."' title='' readonly='readonly'></td>";
		  	$html .= "<td class='dataField'><input type='hidden' name='product_deleted[]' id='ser_deleted$k' value='0'><input type='hidden' name='product_quote_id[]' value='".$row['id']."'><button type='button' class='button' value='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."' tabindex='116' onclick='markServiceLineDeleted($k)'><img src='themes/default/images/id-ff-clear.png' alt='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."'></button></td>";
			$html .= "</tr>";
		  	*/

                        $html .= "<tr id='service_line$k'>";
                        $html .= "<td class='dataField'><input type='text' name='product_qty[]' rel='service_qty_rel' id='service_qty$k' size='8' maxlength='6' value='".rtrim(rtrim(format_number($row['product_qty']), '0'),$sep[1])."' title='' tabindex='116' onblur='getServiceListPriceFromLookup($k);'></td>" ;
                        $html .= "<td class='dataField'><input  type='text'readonly='readonly' name='product_name[]' id='service_name$k' size='16' maxlength='50' value='".$row['name']."' title='' tabindex='116' ><input type='hidden' name='product_id[]' id='service_id$k' size='20' maxlength='50' value='".$row['product_id']."'></td>" ;
                        $html .= "<td class='dataField'><button title='".$app_strings['LBL_SELECT_BUTTON_TITLE']."' accessKey='".$app_strings['LBL_SELECT_BUTTON_KEY']."' type='button' tabindex='116' class='button' value='".$app_strings['LBL_SELECT_BUTTON_LABEL']."' name='btn1' onclick='openServicePopup($k)'><img src='themes/default/images/id-ff-select.png' alt='".$app_strings['LBL_SELECT_BUTTON_LABEL']."'></button></td>" ;
                        $html .= "<td class='dataField'><input type='text' name='product_code[]' readonly='readonly'  id='service_code$k' size='7' maxlength='20' value='".$row['product_code']."' title='' tabindex='116' ></td>" ;
                        $html .= "<td class='dataField'><input type='text' readonly='readonly' name='unit[]' id='service_unit$k' size='4' maxlength='10' value='".$row['unit']."' title='' tabindex='116' ></td>" ;
                        
                        $html .= "<td class='dataField'><input type='text' title='' value='".$row['per_unit_price']."' maxlength='10' size='8' id='ser_per_unit_price$k' name='per_unit_price[]' tabindex='116' readonly='readonly' /></td>" ;
                        $html .= "<td class='dataField'><input type='text' name='product_list_price[]' id='service_list_price$k' size='10' maxlength='50' value='".format_number($row['product_list_price'])."' title='' tabindex='116' onfocus='calculateServiceLine($k);;'><input type='hidden' name='product_cost_price[]' id='service_cost_price$k' value='".$row['product_cost_price']."'  /></td>" ;
                        $html .= "<td class='dataField'><input type='text' name='product_discount[]' id='service_discount$k' size='10' maxlength='50' value='".format_number($row['product_discount'])."' title='' tabindex='116' onfocus='calculateServiceLine($k);' onblur='calculateServiceLine($k);'><input type='hidden' name='product_discount_amount[]' id='service_discount_amount$k' value='".$row['product_discount_amount']."'  /></td>";
                        
                        $html .= "<td class='dataField'><input type='text' name='product_total_nrc[]' id='service_total_nrc$k' size='10' maxlength='50' value='".format_number($row['product_total_nrc'])."' title='' tabindex='116' ></td>" ;
                        $html .= "<td class='dataField'><input type='hidden' name='product_unit_price[]' id='service_unit_price$k'  value='".$row['product_unit_price']."' /><input type='hidden' name='is_service[]' value='1' /><input type='hidden' name='product_deleted[]' id='ser_deleted$k' value='0'><input type='hidden' name='product_quote_id[]' value='".$row['id']."'><button type='button' class='button' value='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."' tabindex='116' onclick='markServiceLineDeleted($k)'><img src='themes/default/images/id-ff-clear.png' alt='".$mod_strings['LBL_REMOVE_PRODUCT_LINE']."'></button><br></td>" ;
                        $html .= "<td class='dataField'>&nbsp;</td>" ;
                        $html .= "<td class='dataField'>&nbsp;</td>" ;
                        $html .= "<td class='dataField'>&nbsp;</td>" ;
                        $html .= "<td class='dataField'>&nbsp;</td>" ;
                        $html .= "<td class='dataField'>&nbsp;</td>" ;
			$html .= "</tr>";
                        
			$html .= "<tr><td height='1px'></td></tr><tr  class='oddListRowS1' height='20'  id='service_note_line$k'>";
			$html .= "<td class='dataField' align='right' valign='top' style='padding:0px;margin:0px;vertical-align:top'><table border='0' cellspacing='3' cellpadding='0' > <tr><td class='dataField' align='right' >".$mod_strings['LBL_PRODUCT_QUOTE_DESC']." :&nbsp;</td></td></tr><tr><td class='dataField' align='right' >".$mod_strings['LBL_PRODUCT_NOTE']." :&nbsp</td></tr></table></td>";
			$html .= "<td class='dataField' colspan='6'><table border='0' cellspacing='0' cellpadding='0' > <tr><td class='dataField' align='left' > <input type='text'id='quotes_service_name$k' name='quotes_product_name[]' value='".$row['quotes_product_name']."' /></td></tr><tr><td class='dataField' align='left' ><textarea tabindex='116' name='product_note[]' id='product_note$i' rows='2' cols='53'>".$row['description']."</textarea></td></tr></table></td>";
			$html .= "<td class='dataField' colspan='4'>".$mod_strings['LBL_DISCOUNT_TYPE']."&nbsp;:&nbsp;<select tabindex='116' name='discount[]' id='service_discount_type$k' onchange='calculateServiceLine($k);'>".get_select_options_with_id($app_list_strings['discount_list'], $row['discount'])."</select></td>";
			$html .= "<td class='dataField'></td>";
			$html .= "<td class='dataField' colspan='1'></td>";
			$html .= "</tr>";
                        


		  	$k++;
		}
		$html .= "</table>";
                
                $html .= '<table width="100%">
                            <tr>
                            <td width="35%"></td>
                            <td><table id="serviceSubTotals" class="list view" border="0" cellspacing="0" width="100% style="display:none;" >
                                <tr><th colspan="3" align="center"  style="text-align:center">'.$mod_strings['LBL_SERVICE_SUBTOTAL'].'</th></tr>
				<tr  class="oddListRowS1" height="20">
                                   
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_DISCOUNT_NRC'].'</th>
                                    <th width="5%" >&nbsp;</th>
				    <th width="5%" >'.$mod_strings['LBL_SUBTOTAL_MONTHLY_CONTRACT_VALUE_TOTAL'].'</th>
				    
                                 
				</tr>
				<tr class="oddListRowS1" height="20" >
                                   
				     <td  width="5%" >
					<input type="text" name="service_subtotal_discount" id="service_subtotal_discount" size="10" maxlength="26" value="'.format_number($this->bean->service_subtotal_discount).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     <td  width="5%" >
					
				     </td>
				     <td width="5%" >
					<input type="text" name="service_subtotal_nrc" id="service_subtotal_nrc" size="10" maxlength="26" value="'.format_number($this->bean->service_subtotal_nrc).'" title="" tabindex="116" readonly="readonly" />
				     </td>
				     
                                      
				</tr>
					</table>

                                </td><td width="42%"></td>
                                </tr>
                                
                                </table> 
								';
                
		$html .= '<script language="javascript">servLine = '.$k.';</script>';
		
		$html .= "<div style='padding-top: 10px; padding-bottom:10px;'>";
		$html .= "<input type=\"button\" tabindex=\"116\" class=\"button\" value=\"".$mod_strings['LBL_ADD_PRODUCT_LINE']."\" id=\"addProductLine\" onclick=\"insertProductLine(".$i.")\" />";
		$html .= " <input type=\"button\" tabindex=\"116\" class=\"button\" value=\"".$mod_strings['LBL_ADD_SERVICE_LINE']."\" id=\"addServiceLine\" onclick=\"insertServiceLine(".$k.")\" />";
		$html .= "</div> ";
		
		$html .= '<input type="hidden" name="vathidden" id="vathidden" value="'.get_select_options_with_id($app_list_strings['vat_list'], '').'">
			  <input type="hidden" name="discounthidden" id="discounthidden" value="'.get_select_options_with_id($app_list_strings['discount_list'], '').'"> <input type="hidden" name="periodshidden" id="periodshidden" value="'.get_select_options_with_id($app_list_strings['nli_periods_dom'], '').'">
				  <input type="hidden" id="significant_digits" name="significant_digits" value="'.$decimals.'" />
				  <input type="hidden" id="grp_seperator" name="grp_seperator" value="'.$sep[0].'" />
				  <input type="hidden" id="dec_seperator" name="dec_seperator" value="'.$sep[1].'" />
				  <input type="hidden" id="currency_symbol" name="currency_symbol" value="{CURRENCY_SYMBOL}" />';
		$html .= "<br>
		        <table cellpadding='0' cellspacing='0' border='0' width='126%'>
				     <tr>
					       <td colspan='2' style='font-size: 12pt; font-weight: bold;'>
						        Please unselect any contact that you don't need to relate. Otherwise it will also be saved with quote contact relation
						   </td>
					 </tr>
				</table>
		";
		
		$this->ss->assign('LINE_ITEMS',$html);
		
		$value;
		if($this->bean->shipping_amount != '')
		{
			$value = format_number($this->bean->shipping_amount);
		}
		
		$this->ss->assign('SHIPPING','<input type="text" tabindex="123" title="" value="'.$value.'" onBlur="calculateGrandTotal();" maxlength="16" size="30" id="shipping_amount" name="shipping_amount">');
	}
	
	function displayJS(){
		global $app_strings, $mod_strings;
                echo "<script type=\"text/javascript\">document.getElementById('total_lmd').setAttribute('readonly','');
				    var serviceAddressVal = document.getElementById('serviceaddress_c').value;
				</script>";
		echo "<script type=\"text/javascript\">
                           
				var selectButtonTitle = '". $app_strings['LBL_SELECT_BUTTON_TITLE'] . "';
				var selectButtonKey	  = '". $app_strings['LBL_SELECT_BUTTON_KEY'] . "';
				var selectButtonValue = '". $app_strings['LBL_SELECT_BUTTON_LABEL'] . "';
				var deleteButtonValue = '". $mod_strings['LBL_REMOVE_PRODUCT_LINE'] . "';";
		
		$js=<<<JS
			if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}
	sqs_objects['EditView_billing_account']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id","billing_address_street","billing_address_city","billing_address_state","billing_address_postalcode","billing_address_country","shipping_address_street","shipping_address_city","shipping_address_state","shipping_address_postalcode","shipping_address_country"],"populate_list":["EditView_billing_account","billing_account_id","billing_address_street","billing_address_city","billing_address_state","billing_address_postalcode","billing_address_country","shipping_address_street","shipping_address_city","shipping_address_state","shipping_address_postalcode","shipping_address_country"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["billing_account_id"],"order":"name","limit":"30","no_match_text":"No Match"};			
	document.getElementById('btn_billing_account').onclick = function() {
	open_popup('Accounts', 800, 851, '', true, false, {'call_back_function':'set_return','form_name':'EditView','field_to_name_array':{'id':'billing_account_id','name':'billing_account','billing_address_street':'billing_address_street','billing_address_city':'billing_address_city','billing_address_state':'billing_address_state','billing_address_postalcode':'billing_address_postalcode','billing_address_country':'billing_address_country','shipping_address_street':'shipping_address_street','shipping_address_city':'shipping_address_city','shipping_address_state':'shipping_address_state','shipping_address_postalcode':'shipping_address_postalcode','shipping_address_country':'shipping_address_country'}}, 'single', true);
	}
	document.getElementById('btn_billing_contact').onclick = function() {
	open_popup('Contacts', 800, 851, '&account_name='+ document.getElementById('billing_account').value , true, false, {'call_back_function':'set_return','form_name':'EditView','field_to_name_array':{'id':'billing_contact_id','name':'billing_contact'}},'single', true);
	}

function getListPriceFromLookup(ln){

YUI().use('node','io',function(Y){
qunty =unformatNumber( Y.one("#product_qty"+ln).get('value'));

if(qunty == 0)
{
   qunty = 1;
}

prodid = Y.one("#product_id"+ln).get('value');
var url = 'index.php?module=AOS_Quotes&action=get_pricelookup&to_pdf=1&product_id='+prodid+'&quantity='+qunty;

var cfg = {method:"GET",
           on:{ start:function(){
			//alert('wait')
tt = Y.one('#product_qty'+ln).get('parentNode');

if(Y.one('#qty_loader'+ln)){
 Y.one('#qty_loader'+ln).setStyle('display','');
}else{
tt.append("<img id='qty_loader"+ln+"' src='themes/default/images/img_loading.gif' align='left' style='left:-18px;top:-22px;position:relative' />");
}
		},
                complete:function(id,o){
                 resVal = JSON.parse(o.responseText);
                 if(resVal.status== 'sucess'){
                   document.getElementById('product_list_price'+ln).value = formatNumber(resVal.price);
		   document.getElementById('per_unit_price'+ln).value = formatNumber(resVal.per_unit_price);                   
                   Quantity_formatNumber(ln);
                   calculateProductLine(ln);
                   calculateDiscount(ln);
                 }else{
                 //what to do
                }
                },
                end:function(){

                 Y.one('#qty_loader'+ln).setStyle('display','none');
                }

                }
        };
Y.io(url,cfg)
});
}



YUI().use("node","event",function (Y){

Y.one("#order_discount").on("change",function(e){


ord_dis = unformatNumber(Y.one('#order_discount').get('value'));
subtot_mrc_dis = unformatNumber(Y.one('#product_subtotal_discount').get('value'));

sub_tot = unformatNumber(Y.one('#product_subtotal_mrc').get('value'));

tot_dis = subtot_mrc_dis +ord_dis;

if(sub_tot <= ord_dis){
    Y.one('#subtotal_amount').set('value',formatNumber(0));
    Y.one('#order_discount').set('value',formatNumber(sub_tot));
    tot_dis = sub_tot;
}else{
    Y.one('#subtotal_amount').set('value',formatNumber(sub_tot -ord_dis));
    Y.one('#order_discount').set('value',formatNumber(ord_dis));
}
    Y.one('#total_discount').set('value',formatNumber(tot_dis));

})

})


 
JS;
		echo $js;				
		echo "</script>";

 echo "<script type=\"text/javascript\">";    
 echo ' document.getElementById("serviceaddress_c").setAttribute("readonly","readonly");';
 echo ' document.getElementById("btn_clr_serviceaddress_c").setAttribute("onclick","setservice_address_clear(this);");';
 echo " setTimeout(function(){ getservice_address_call(); },3000); ";
 echo "</script>";

	}
}
?>
