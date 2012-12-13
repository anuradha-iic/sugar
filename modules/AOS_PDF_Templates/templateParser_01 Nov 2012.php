<?php
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */
 
class templateParser{
		function parse_template_bean($string, $bean_name, &$focus, &$SummaryDetails, &$totalCts) {
		global $app_strings;
			$repl_arr = array();
		global $db;
		if ( ! isset($db) ) { 
			   $db = DBManagerFactory::getInstance(); 
		 } 
		 
			foreach($focus->field_defs as $field_def) {
				if($field_def['type'] == 'enum' && isset($field_def['options'])) {
					$translated = translate($field_def['options'],$bean_name,$focus->$field_def['name']);

					if(isset($translated) && ! is_array($translated)) {
						$repl_arr[strtolower($focus->module_dir)."_".$field_def['name']] = $translated;
					} else { // unset enum field, make sure we have a match string to replace with ""
						$repl_arr[strtolower($focus->module_dir)."_".$field_def['name']] = '';
					}
				} else if($field_def['type'] == 'multienum' && isset($field_def['options'])) {
					$translated = str_replace('^', '', $focus->$field_def['name']);
					$translated = str_replace(',', ', ', $translated);
					
					$repl_arr[strtolower($focus->module_dir)."_".$field_def['name']] = $translated;
				} else {
					$repl_arr[strtolower($focus->module_dir)."_".$field_def['name']] = $focus->$field_def['name'];
				}
			} // end foreach()
	
			krsort($repl_arr);
			reset($repl_arr);  
		      
			  $tmpctr = 0;
			foreach ($repl_arr as $name=>$value) {  
				if (strpos($name,'amt')>0 || strpos($name,'amount')>0 || strpos($name,'price')>0){
				      if( $name == 'aos_products_quotes_per_unit_price' )
					   {
					       $value=currency_format_number($value,$params = array('currency_symbol' => true, 'decimals'=> 2));
					   }
					  else
                       {
                           $value=currency_format_number($value,$params = array('currency_symbol' => true, 'decimals'=> 2));
                       }					   
				}
				else if (strpos($name,'product_discount')>0){
					if($value != '' && $value != '0.00')
					{
						if($repl_arr[aos_products_quotes_discount] == 'Percentage')
						{
							$sep = get_number_seperators();
							$value=rtrim(rtrim(format_number($value), '0'),$sep[1]).$app_strings['LBL_PERCENTAGE_SYMBOL'];
						}
						else
						{
							$value=currency_format_number($value,$params = array('currency_symbol' => true, 'decimals'=> 2));
						}
					}
					else
					{
						$value='';
					}
				}
				if( $name == 'aos_quotes_amount_due_c' )
				{
				    //$totalVal = $SummaryDetails['subtotal_amount'] + $SummaryDetails['product_subtotal_lmd'] + $SummaryDetails['grand_total_nrc'];
					$totalVal = $SummaryDetails['product_subtotal_lmd'] + $SummaryDetails['grand_total_nrc'];
				    $value = currency_format_number($totalVal, $params = array('currency_symbol' => true, 'decimals'=> 2));
				}
				if ($name === 'aos_products_quotes_service_address_id'){  
				    $service_address = "";
					$Q2 = "SELECT * FROM nli_serviceaddresses WHERE id = '$value' and deleted = 0";
					$result2 = $db->query($Q2); 
					while (($row4 = $db->fetchByAssoc($result2)) != null) {
							//$service_address .= $row4['service_address_street'].' '.$row4['service_address_city'].' '.$row4['service_address_state'].' '.$row4['service_address_postalcode'].' '.$row4['service_address_country'];
							$service_address .= $row4['name'];
					 }
					 $value = $service_address;
				}
				 if( isset($totalCts[0]['size']) )
				 {
				     $size = $totalCts[0]['size'];
				 }
				 else
				 {
				     $size = 0;
				 }
				if ($name === 'contacts_calculated_contact_type_c'){  
					$value = $totalCts['contacttype'];
				}
				else if ($name === 'contacts_calculated_name_c'){  
					$value = $totalCts['name'];
				}
				else if ($name === 'contacts_calculated_phone_work_c'){  
					$value = $totalCts['work'];
				}
				else if ($name === 'contacts_calculated_phone_mobile_c'){  
					$value = $totalCts['mobile'];
				}
				else if ($name === 'contacts_calculated_email1_c'){  
					$value = $totalCts['email'];
				}
				if ($name === 'aos_products_quotes_product_qty'){
					$sep = get_number_seperators();
					//$value= rtrim(rtrim(format_number($value), '0'),$sep[1]);  number_format($number, 2   
					$value = rtrim(number_format($value, 1));
				}	
				/*if ( ($name === 'product_subtotal_nrc') ){  
				      $service_subtotal_nrc = $SummaryDetails['service_subtotal_nrc'];
					  $product_subtotal_nrc = $SummaryDetails['product_subtotal_nrc'];
					  $build_field = $service_subtotal_nrc + $product_subtotal_nrc;
					  $value = currency_format_number($build_field,$params = array('currency_symbol' => true, 'decimals'=> 2));
				}*/
                if ( ($name === 'aos_quotes_tax_amount') ){  
				     $aos_quotes_tax_amount = (1 - ($SummaryDetails['order_discount']/$SummaryDetails['product_subtotal_mrc'])) * $SummaryDetails['tax_amount'];
					 $value = currency_format_number($aos_quotes_tax_amount,$params = array('currency_symbol' => true, 'decimals'=> 2));					
				} 
                if ( ($name === 'aos_quotes_grand_total_nrc') ){ 
                     $service_subtotal_nrc = $SummaryDetails['service_subtotal_nrc'];
	                 $product_subtotal_nrc = $SummaryDetails['product_subtotal_nrc'];				
				     $aos_quotes_grand_total_nrc = ($service_subtotal_nrc + $product_subtotal_nrc) - $SummaryDetails['order_nrc_discont'];
					 $value = currency_format_number($aos_quotes_grand_total_nrc,$params = array('currency_symbol' => true, 'decimals'=> 2));					
				}				
				if ( ($name === 'aos_quotes_product_subtotal_mrc') or ($name === 'aos_quotes_order_discount') or ($name === 'aos_quotes_order_nrc_discont') or ($name === 'aos_quotes_product_subtotal_lmd') or ($name === 'aos_quotes_total_nrc') ){  
					$value = currency_format_number($value,$params = array('currency_symbol' => true, 'decimals'=> 2));					
				}  			
				if( $name == 'aos_products_quotes_product_total_nrc' )
				{
				    $value = currency_format_number($value,$params = array('currency_symbol' => true, 'decimals'=> 2));
				}				
				if ($name === 'aos_products_quotes_vat'||strpos($name,'pct')>0 || strpos($name,'percent')>0 || strpos($name,'percentage')>0){
					$sep = get_number_seperators();
					$value=rtrim(rtrim(format_number($value), '0'),$sep[1]).$app_strings['LBL_PERCENTAGE_SYMBOL'];
				}
				if (strpos($name,'date')>0 || strpos($name,'expiration')>0){
					if($value != ''){
					$dt = explode(' ',$value);
					$value = $dt[0];
					}
				}
				if($value != '' && is_string($value)) {   
					   if($name == "aos_products_quotes_product_total_nrc")
					            $string = str_replace("\$$name", $value, $string);
					   else
                                $string = str_replace("\$$name", $value, $string);
				} else if(strpos($name,'address')>0) {
					$string = str_replace("\$$name<br />", '', $string);
					$string = str_replace("\$$name <br />", '', $string);
					$string = str_replace("\$$name", '', $string);
				} else {
					$string = str_replace("\$$name", '&nbsp;', $string);
				}
			}
	       
			return $string;
		}
		function parse_template($string, &$bean_arr, &$SummaryDetails, &$totalCts) {
			global $beanFiles, $beanList;
	
			foreach($bean_arr as $bean_name => $bean_id) {
				require_once($beanFiles[$beanList[$bean_name]]);
	
				$focus = new $beanList[$bean_name];
				$focus->retrieve($bean_id);
				
				$string = templateParser::parse_template_bean($string, $bean_name, $focus, $SummaryDetails, $totalCts);
			}
			return $string;
		}
	}
?>
