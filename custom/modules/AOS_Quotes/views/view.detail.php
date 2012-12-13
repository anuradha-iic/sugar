<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class AOS_QuotesViewDetail extends ViewDetail {
	var $currSymbol;
	function AOS_QuotesViewDetail(){
 		parent::ViewDetail();
 	}
	
	function display(){
		$this->populateCurrency();
		$this->populateQuoteTemplates();
		$this->displayPopupHtml();
		$this->populateLineItems();
		parent::display();
		?>
		   <script>
		   function html_entity_decode (string, quote_style) { 
					var hash_map = {},
						symbol = '',
						tmp_str = '',
						entity = '';    tmp_str = string.toString();
				 
					if (false === (hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style))) {
						return false;
					}  
					delete(hash_map['&']);
					hash_map['&'] = '&amp;'; 
					for (symbol in hash_map) {
						entity = hash_map[symbol];
						tmp_str = tmp_str.split(entity).join(symbol);
					}    tmp_str = tmp_str.split('&#039;').join("'"); 
					return tmp_str;
			}      
     var quote_cover_letter = html_entity_decode(document.getElementById('quote_cover_letter').innerHTML);
	 var quote_introduction = html_entity_decode(document.getElementById('quote_introduction').innerHTML);
	 var quote_final_notes  = html_entity_decode(document.getElementById('quote_final_notes').innerHTML);
	 var quote_important_details = html_entity_decode(document.getElementById('quote_important_details').innerHTML);
	 
	 document.getElementById('quote_cover_letter').innerHTML = quote_cover_letter;
	 document.getElementById('quote_introduction').innerHTML = quote_introduction;
	 document.getElementById('quote_final_notes').innerHTML = quote_final_notes;
	 document.getElementById('quote_important_details').innerHTML = quote_important_details;
		   </script>
		<?php
	}
	
	function populateCurrency(){
		require_once('modules/Currencies/Currency.php');
		$currency  = new Currency();
		if(isset($this->bean->currency_id) && !empty($this->bean->currency_id)){
			$currency->retrieve($focus->currency_id);
			if( $currency->deleted != 1){
				$this->currSymbol =  $currency->symbol;
			}else{
				$this->currSymbol = $currency->getDefaultCurrencySymbol();
			}
		}else{
			$this->currSymbol = $currency->getDefaultCurrencySymbol();
		}
		
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
		global $app_strings, $mod_strings,$app_list_strings,$timedate;
		
//  		$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
              $sql = "SELECT ln.*,sa.name service_address_name FROM aos_products_quotes ln LEFT JOIN nli_serviceaddresses sa ON sa.id =ln.service_address_id AND sa.deleted =0 WHERE ln.parent_type = 'AOS_Quotes' AND ln.parent_id = '".$this->bean->id."' AND ln.is_service = '0' AND ln.deleted = 0 ORDER BY ln.number ASC";  		
		$result = $this->bean->db->query($sql);
		$countLine = $this->bean->db->getRowCount($result);
		$sep = get_number_seperators();
		
		$html = "";
		$html .= "<table border='0' width='100%' cellpadding='0' cellspacing='0'>";
		
		if($countLine != 0)
		{
			$html .= "<tr>";
			$html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;'>&nbsp;</td>";
			$html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_PRODUCT_QUANITY']."</td>";
			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_PRODUCT_NAME']."</td>";
			$html .=  "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_PRODUCT_CODE']."</td>";
			$html .=  "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_UNIT']."</td>";

			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_LIST_PRICE']."</td>";
			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_DISCOUNT_AMT']."</td>";
			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_TOTAL_AMT']."</td>";
			$html .= "<td width='15%' class='tabDetailViewDL' style='text-align: left;padding:2px' scope='row'>".$mod_strings['LBL_PRODUCT_NRC']."</td>";
	               $html .= "<td width='15%' class='tabDetailViewDL' style='text-align: left;padding:2px' scope='row'>".$mod_strings['LBL_PRODUCT_LMD']."</td>";
			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_VAT']."</td>";
			$html .= "<td width='12%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_VAT_AMT']."</td>";
		$html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_DESIRED_DATE_INSTALL']."</td>";
                $html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_SERVICE_PERIOD']."</td>";
                $html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_RENEWAL_PERIOD']."</td>";
$html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px;' scope='row'>".$mod_strings['LBL_SERVICE_ADDRESS']."</td>";
			$html .= "</tr>";
		}
		$i = 1;
		while ($row = $this->bean->db->fetchByAssoc($result)) {

			$html .= "<tr>";
			$product_note = wordwrap($row['description'],40,"<br />\n");
			$html .= "<td class='tabDetailViewDF' style='text-align: left; padding:2px;'>".$i++."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".number_format($row['product_qty'],2)."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'><a href='index.php?module=AOS_Products&action=DetailView&record=".$row['product_id']."' class='tabDetailViewDFLink'>".$row['name']."</a><br />".$product_note."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".$row['product_code']."</td>";		  
 		        $html .= "<td class='tabDetailViewDF' style='padding:2px;'>".$row['unit']."</td>";
	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_list_price'])."</td>";
		  	if($row['product_discount'] != '' && $row['product_discount'] != '0.00')
		  	{
		  		if($row['discount'] == 'Amount')
		  		{
		  			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_discount'])."</td>";
		  		}
		  		else
		  		{
		  			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".rtrim(rtrim(format_number($row['product_discount']), '0'),$sep[1])."%</td>";	
		  		}
		  	}
		  	else
		  	{
		  		$html .= "<td class='tabDetailViewDF' style='padding:2px;'>-</td>";
		  	}
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_total_price'])."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_total_nrc'])."</td>";
                        $html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_total_lmd'])."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".rtrim(rtrim(format_number($row['vat']), '0'),$sep[1])."%</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['vat_amt'])."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".$timedate->to_display_date($row['desired_install_date'])."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>". $row['product_service_period']."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>". $row['product_renewal_period']."</td>";
                        $html .= "<td class='tabDetailViewDF' style='padding:2px;'><a href='index.php?module=nli_ServiceAddresses&action=DetailView&record=".$row['service_address_id']."' class='tabDetailViewDFLink'>". $row['service_address_name']."</a></td>";

			$html .= "</tr>";
		}
		
		 $html .= '
                            <tr>
                            <td width="12.5%" colspan="6"></td>
                            <td width="37.5%" colspan="5">
				<table class="list view" border="0" cellspacing="0" width="100%  >
                                <tr  class="oddListRowS1" height="20" >
                                    <th colspan="4" width="100%" style="text-align:center" >'.$mod_strings['LBL_PRODUCT_SUBTOTAL'].'</th>
                                </tr>
                                <tr  class="oddListRowS1" height="20">                                    
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_DISCOUNT_ORDER'].'</th>
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_AMT'].'</th>
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_LMD'].'</th>
                                    <th width="5%">'.$mod_strings['LBL_TOTAL_NRC'].'</th>                                
                                </tr>
                                <tr class="oddListRowS1" height="20" >                                
                                     <td  width="5%" >
                                       '.format_number($this->bean->product_subtotal_discount).'
                                     </td>
                                     <td  width="5%" >
                                        '.format_number($this->bean->product_subtotal_mrc).'
                                     </td>
                                     <td width="5%" >
                                        '.format_number($this->bean->product_subtotal_nrc).'
                                     </td>
                                     <td width="5%" >
                                        '.format_number($this->bean->product_subtotal_lmd).'
                                      </td>                                     
                                </tr>
                                        </table>
				    </td>
                                        <td width="12.5%" colspan="4"></td>                         
				 </tr>
                                 ';
	//	$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
  	      $sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$this->bean->id."' AND is_service = '1' AND deleted = 0 ORDER BY number ASC";	
		$result = $this->bean->db->query($sql);
		$countLine = $this->bean->db->getRowCount($result);
		
		
		$html .= "<tr >";
		$html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;'>&nbsp;</td>";
                $html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_PRODUCT_QUANITY']."</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_SERVICE_NAME']."</td>";
                $html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_PRODUCT_CODE']."</td>";
                $html .= "<td width='3%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_UNIT']."</td>";
                
                $html .= "<td width='5%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_LIST_PRICE']."</td>";
                $html .= "<td width='15%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_DISCOUNT_NRC']."</td>";
$html .= "<td width='3%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='15%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >".$mod_strings['LBL_PRODUCT_NRC']."</td>";
		
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "<td width='10%' class='tabDetailViewDL' style='text-align: left;padding:2px; padding-top:12px;' scope='row' >&nbsp;</td>";
                $html .= "</tr>";

		while ($row = $this->bean->db->fetchByAssoc($result)) {
			/*$html .= "<tr>";
			$html .= "<td class='tabDetailViewDF' style='text-align: left; padding:2px;'>".$i++."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;' colspan='4'>".$row['name']."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_unit_price'])."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".rtrim(rtrim(currency_format_number($row['vat'],$params = array('currency_symbol' => false,)), '0'), $sep[1])."%</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['vat_amt'])."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_total_price'])."</td>";
			$html .= "</tr>";*/

			$html .= "<tr>";
			$product_note = wordwrap($row['description'],40,"<br />\n");
			$html .= "<td class='tabDetailViewDF' style='text-align: left; padding:2px;'>".$i++."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".rtrim(rtrim(format_number($row['product_qty']), '0'),$sep[1])."</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'><a href='index.php?module=AOS_Products&action=DetailView&record=".$row['product_id']."' class='tabDetailViewDFLink'>".$row['name']."</a><br />".$product_note."</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".$row['product_code']."</td>";		  
 		        $html .= "<td class='tabDetailViewDF' style='padding:2px;'>".$row['unit']."</td>";
	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_list_price'])."</td>";
		  	if($row['product_discount'] != '' && $row['product_discount'] != '0.00')
		  	{
		  		if($row['discount'] == 'Amount')
		  		{
		  			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_discount'])."</td>";
		  		}
		  		else
		  		{
		  			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".rtrim(rtrim(format_number($row['product_discount']), '0'),$sep[1])."%</td>";	
		  		}
		  	}
		  	else
		  	{
		  		$html .= "<td class='tabDetailViewDF' style='padding:2px;'>-</td>";
		  	}
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp; </td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>".currency_format_number($row['product_total_nrc'])."</td>";
                        $html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp; </td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";
		  	$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";
			$html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";
                        $html .= "<td class='tabDetailViewDF' style='padding:2px;'>&nbsp;</td>";

			$html .= "</tr>";
		}

	        $html .= '
                            <tr>
                            <td width="12.5%" colspan="6"></td>
                            <td width="37.5%" colspan="5">
				<table id="serviceSubTotals" class="list view" border="0" cellspacing="0" width="100% style="display:none;" >
                                <tr><th colspan="4" align="center"  style="text-align:center">'.$mod_strings['LBL_SERVICE_SUBTOTAL'].'</th></tr>
                                <tr  class="oddListRowS1" height="20">                                   
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_DISCOUNT_NRC'].'</th>
                                    <th width="5%" >&nbsp;</th>
                                    <th width="5%" >'.$mod_strings['LBL_TOTAL_LMD'].'</th>   
					<th width="5%" >&nbsp;</th>                             
                                </tr>
                                <tr class="oddListRowS1" height="20" >                                   
                                     <td  width="5%" >
                                        '.format_number($this->bean->service_subtotal_discount).'
                                     </td>
                                     <td  width="5%" >
                                        
                                     </td>
                                     <td width="5%" >
                                        '.format_number($this->bean->service_subtotal_nrc).'
                                     </td><td  width="5%" >
                                        
                                     </td>
                                     
                                      
                                </tr>
                                        </table>

				    </td>
                                        <td width="12.5%" colspan="5"></td>                         
				 </tr>
                                 ';
		$html .= "</table>";
		
		$this->ss->assign('LINE_ITEMS',$html);
	}
	
	function displayPopupHtml(){
		global $app_list_strings,$app_strings, $mod_strings;
		if(trim($this->bean->template_ddown_c) != ''){
		$templates = explode('^,^',trim($this->bean->template_ddown_c));
		
		echo '	<div id="popupDiv_ara" style="display:none;position:fixed;top: 39%; left: 41%;opacity:1;z-index:9999;background:#FFFFFF;">
				<form id="popupForm" action="index.php?entryPoint=generatePdf" method="post">
 				<table style="border: #000 solid 2px;padding-left:40px;padding-right:40px;padding-top:10px;padding-bottom:10px;font-size:110%;" >
					<tr height="20">
						<td colspan="2">
						<b>'.$app_strings['LBL_SELECT_TEMPLATE'].':-</b>
						</td>
					</tr>';
			foreach($templates as $template){
				$template = str_replace('^','',$template);
				$js = "document.getElementById('popupDivBack_ara').style.display='none';document.getElementById('popupDiv_ara').style.display='none';var form=document.getElementById('popupForm');if(form!=null){form.templateID.value='".$template."';form.submit();}else{alert('Error!');}";
				echo '<tr height="20">
				<td width="17" valign="center"><a href="#" onclick="'.$js.'"><img src="themes/default/images/txt_image_inline.gif" width="16" height="16" /></a></td>
				<td><b><a href="#" onclick="'.$js.'">'.$app_list_strings['template_ddown_c_list'][$template].'</a></b></td></tr>';
			}
		echo '		<input type="hidden" name="templateID" value="" />
				<input type="hidden" name="task" value="pdf" />
				<input type="hidden" name="module" value="'.$_REQUEST['module'].'" />
				<input type="hidden" name="uid" value="'.$this->bean->id.'" />
				</form>
				<tr style="height:10px;"><tr><tr><td colspan="2"><button style=" display: block;margin-left: auto;margin-right: auto" onclick="document.getElementById(\'popupDivBack_ara\').style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';return false;">Cancel</button></td></tr>
				</table>
				</div>
				<div id="popupDivBack_ara" onclick="this.style.display=\'none\';document.getElementById(\'popupDiv_ara\').style.display=\'none\';" style="top:0px;left:0px;position:fixed;height:100%;width:100%;background:#000000;opacity:0.5;display:none;vertical-align:middle;text-align:center;z-index:9998;">
				</div>
				<script>
					function showPopup(task){
					//alert(task)
						var form=document.getElementById(\'popupForm\');						
						var ppd=document.getElementById(\'popupDivBack_ara\');
						var ppd2=document.getElementById(\'popupDiv_ara\');
						if('.count($templates).' == 1){						
							form.task.value=task;
							form.templateID.value=\''.$template.'\';
							form.submit();
						}else if(form!=null && ppd!=null && ppd2!=null){
							ppd.style.display=\'block\';
							ppd2.style.display=\'block\';
							form.task.value=task;
						}else{
							alert(\'Error!\');
						}
					}
				</script>';
		}
		else{
			echo '<script>
				function showPopup(task){
				alert(\''.$mod_strings['LBL_NO_TEMPLATE'].'\');
				}
			</script>';
		}
	}
}
?>
