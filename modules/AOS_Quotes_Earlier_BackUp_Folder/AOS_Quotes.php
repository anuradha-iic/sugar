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
require_once('modules/AOS_Quotes/AOS_Quotes_sugar.php');
class AOS_Quotes extends AOS_Quotes_sugar {
	
	function AOS_Quotes(){	
		parent::AOS_Quotes_sugar();
	}
	
	function save($check_notify = FALSE){
		// If new or duplicate entry, get a quote number otherwise already set.
		$this->number = (empty($this->id)) ? $this->db->getOne("SELECT count(id)+1 FROM aos_quotes"): $this->number;
		
		if (empty($this->id))unset($_POST['product_quote_id']);
		
		parent::save($check_notify);
		if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
			$this->saveListItems();
		}
	}
	
	function saveListItems(){
		require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
		$productQuote = new AOS_Products_Quotes();

		$product = array('id' => $_POST['product_quote_id'],
						 'product_id' => $_POST['product_id'],
						 'product_name' => $_POST['product_name'],
						 'product_qty' => $_POST['product_qty'],
						 'vat'=>$_POST['vat'],
						 'vat_amt' => $_POST['vat_amt'],
						 'product_cost_price' => $_POST['product_cost_price'],
						 'product_list_price' => $_POST['product_list_price'], 
						 'product_discount' => $_POST['product_discount'],
						 'product_discount_amount' => $_POST['product_discount_amount'],
						 'discount' => $_POST['discount'],
						 'product_unit_price' => $_POST['product_unit_price'],
						 'product_total_price' => $_POST['product_total_price'],
						 'product_note' => $_POST['product_note'],
						 'product_deleted' => $_POST['product_deleted'],
						'unit' =>$_POST['unit'],
						'product_code'=> $_POST['product_code'],
						'product_total_nrc' => $_POST['product_total_nrc'],
						'product_total_lmd' => $_POST['product_total_lmd'],
						'quotes_product_name' => $_POST['quotes_product_name'],
						'per_unit_price' => $_POST['per_unit_price'],
						'desired_install_date' => $_POST['desired_install_date'],
						'product_service_period' => $_POST['product_service_period'],
						'product_renewal_period' => $_POST['product_renewal_period'],
					        'is_service' => $_POST['is_service'],
						
						 'product_subtotal_discount' => $_POST['product_subtotal_discount'],
						 'product_subtotal_mrc' => $_POST['product_subtotal_mrc'],
						 'product_subtotal_lmd' => $_POST['product_subtotal_lmd'],
						 'product_subtotal_nrc' => $_POST['product_subtotal_nrc'],
						 'service_subtotal_discount' => $_POST['service_subtotal_discount'],
						 'service_subtotal_nrc' => $_POST['service_subtotal_nrc'],
						 'service_address_id' => $_POST['service_address_id']	
						);
							 
		$productLineCount = count($product['product_id']);
		$j = 0;
		
		for ($i = 0; $i < 1; $i++) {
			$productQuote->id = $product['id'][$i];
			$productQuote->parent_id = $this->id;
			$productQuote->parent_type = 'AOS_Quotes';
			$productQuote->product_id = $product['product_id'][$i];
			$productQuote->name = stripslashes($product['product_name'][$i]);
			$productQuote->product_qty = $product['product_qty'][$i];
			$productQuote->product_cost_price = $product['product_cost_price'][$i];
			$productQuote->product_list_price = $product['product_list_price'][$i];
			$productQuote->product_discount = $product['product_discount'][$i];
			$productQuote->product_discount_amount = $product['product_discount_amount'][$i];
			$productQuote->discount = $product['discount'][$i];
			$productQuote->product_unit_price = $product['product_unit_price'][$i];
			$productQuote->vat = $product['vat'][$i];
			$productQuote->vat_amt = $product['vat_amt'][$i];
			$productQuote->product_total_price = $product['product_total_price'][$i];
			$productQuote->description = stripslashes($product['product_note'][$i]);
			$productQuote->deleted = $product['product_deleted'][$i];
			
			$productQuote->unit = $product['unit'][$i];
                        $productQuote->product_code = $product['product_code'][$i];
                        $productQuote->product_total_nrc = $product['product_total_nrc'][$i];
                        $productQuote->product_total_lmd = $product['product_total_lmd'][$i];
			$productQuote->quotes_product_name = $product['quotes_product_name'][$i];
			$productQuote->per_unit_price = $product['per_unit_price'][$i];

                        $productQuote->desired_install_date = $product['desired_install_date'][$i];
                        $productQuote->product_service_period = $product['product_service_period'][$i];
                        $productQuote->product_renewal_period = $product['product_renewal_period'][$i];
		        $productQuote->is_service = $product['is_service'][$i];



			$productQuote->product_subtotal_discount = $product['product_subtotal_discount'][$i];
			$productQuote->product_subtotal_mrc = $product['product_subtotal_mrc'][$i];
			$productQuote->product_subtotal_lmd = $product['product_subtotal_lmd'][$i];
			$productQuote->product_subtotal_nrc = $product['product_subtotal_nrc'][$i];
			$productQuote->service_subtotal_discount = $product['service_subtotal_discount'][$i];
			$productQuote->service_subtotal_nrc = $product['service_subtotal_nrc'][$i];
                        $productQuote->service_address_id = $product['service_address_id'][$i];
				
			if ($productQuote->deleted == 1) {
				$productQuote->mark_deleted($productQuote->id);
			} else {
				if(trim($productQuote->product_id) != '' && trim($productQuote->name) != '' && trim($productQuote->product_unit_price) != ''){
					$productQuote->number = ++$j;
					$productQuote->save();
				}
			}
		}
		for ($i = 1; $i < $productLineCount; $i++) {
			$productQuote->id = $product['id'][$i];
			$productQuote->parent_id = $this->id;
			$productQuote->parent_type = 'AOS_Quotes';
			$productQuote->product_id = $product['product_id'][$i];
			$productQuote->name = stripslashes($product['product_name'][$i]);
			$productQuote->product_qty = unformat_number($product['product_qty'][$i]);
			$productQuote->product_cost_price = unformat_number($product['product_cost_price'][$i]);
			$productQuote->product_list_price = unformat_number($product['product_list_price'][$i]);
			$productQuote->product_discount = unformat_number($product['product_discount'][$i]);
			$productQuote->product_discount_amount = unformat_number($product['product_discount_amount'][$i]);
			$productQuote->discount = $product['discount'][$i];
			$productQuote->product_unit_price = unformat_number($product['product_unit_price'][$i]);
			$productQuote->vat = $product['vat'][$i];
			$productQuote->vat_amt = unformat_number($product['vat_amt'][$i]);	
			$productQuote->product_total_price = unformat_number($product['product_total_price'][$i]);
			$productQuote->description = stripslashes($product['product_note'][$i]);
			$productQuote->deleted = $product['product_deleted'][$i];
			
			$productQuote->unit = $product['unit'][$i];
                        $productQuote->product_code = $product['product_code'][$i];
                        $productQuote->product_total_nrc = $product['product_total_nrc'][$i];
                        $productQuote->product_total_lmd = $product['product_total_lmd'][$i];
			$productQuote->quotes_product_name = $product['quotes_product_name'][$i];
			$productQuote->per_unit_price = $product['per_unit_price'][$i];

                        $productQuote->desired_install_date = $product['desired_install_date'][$i];
                        $productQuote->product_service_period = $product['product_service_period'][$i];
                        $productQuote->product_renewal_period = $product['product_renewal_period'][$i];
			$productQuote->is_service = $product['is_service'][$i];

			$productQuote->product_subtotal_discount = $product['product_subtotal_discount'][$i];
			$productQuote->product_subtotal_mrc = $product['product_subtotal_mrc'][$i];
			$productQuote->product_subtotal_lmd = $product['product_subtotal_lmd'][$i];
			$productQuote->product_subtotal_nrc = $product['product_subtotal_nrc'][$i];
			$productQuote->service_subtotal_discount = $product['service_subtotal_discount'][$i];
			$productQuote->service_subtotal_nrc = $product['service_subtotal_nrc'][$i];
			$productQuote->service_address_id = $product['service_address_id'][$i];

			if ($productQuote->deleted == 1) {
				$productQuote->mark_deleted($productQuote->id);
			} else {
				if(trim($productQuote->product_id) != '' && trim($productQuote->name) != '' && trim($productQuote->product_unit_price) != ''){
					$productQuote->number = ++$j;
					$productQuote->save();
				}
			}
		}
	}
	
	function mark_deleted($id)
	{	
		$recordId = $this->id;
		$productQuote = new AOS_Products_Quotes();
		$sql = "SELECT id FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$recordId."' AND deleted = 0";
  		$result = $this->db->query($sql);
		parent::mark_deleted($id);
		while ($row = $this->db->fetchByAssoc($result)) {
			$productQuote->id = $row['id'];
			$productQuote->parent_id = $recordId;
			$productQuote->save();
  			$productQuote->mark_deleted($row['id']);
  		}
	}	
}
?>
