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
 
	if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || !isset($_REQUEST['templateID']) || empty($_REQUEST['templateID'])){
		die('Error retrieving record. This record may be deleted or you may not be authorized to view it.');
	}
	error_reporting(0);
	require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
	require_once('modules/AOS_PDF_Templates/templateParser.php');
	require_once('modules/AOS_PDF_Templates/sendEmail.php');
	require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');
	global $mod_strings;
	
	$module_type = $_REQUEST['module'];
	$module_type_file = strtoupper(ltrim(rtrim($module_type,'s'),'AOS_'));
	$module_type_low = strtolower($module_type);
	
	$module = new $module_type();
	$module->retrieve($_REQUEST['uid']);

	$task = $_REQUEST['task'];
	
	$lineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$module_type."' AND parent_id = '".$module->id."' AND product_id != '0' AND deleted = 0 ORDER BY number ASC";
	$res = $module->db->query($sql);
	while($row = $module->db->fetchByAssoc($res)){
		$lineItems[$row['id']] = $row['product_id'];
	} 
	
	$serviceLineItems = array();
	$sql = "SELECT id, product_id FROM aos_products_quotes WHERE parent_type = '".$module_type."' AND parent_id = '".$module->id."' AND product_id = '0' AND deleted = 0 ORDER BY number ASC";
	$res = $module->db->query($sql);
	while($row = $module->db->fetchByAssoc($res)){
		$serviceLineItems[$row['id']] = $row['product_id'];
	}
	
	$template = new AOS_PDF_Templates();
	$template->retrieve($_REQUEST['templateID']);
echo "ddsddd"; die;
	
	$SummaryDetails = $module->fetched_row; 
	$quoteName      = $SummaryDetails['name'];
	
	//echo "<pre>";  
	  //print_r($SummaryDetails); die;
	 
	function formatMoney($number, $fractional=false) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return $number;
	} 	  
	
	$object_arr = array();
	$object_arr[$module_type] = $module->id;
	
	$object_arr['Accounts'] = $module->billing_account_id;
	$object_arr['Contacts'] = $module->billing_contact_id;
	$object_arr['Users']    = $module->assigned_user_id;
	
	$search = array ('@<script[^>]*?>.*?</script>@si', 		// Strip out javascript
					'@<[\/\!]*?[^<>]*?>@si',		// Strip out HTML tags
					'@([\r\n])[\s]+@',			// Strip out white space
					'@&(quot|#34);@i',			// Replace HTML entities
					'@&(amp|#38);@i',
					'@&(lt|#60);@i',
					'@&(gt|#62);@i',
					'@&(nbsp|#160);@i',
					'@&(iexcl|#161);@i',
					'@&#(\d+);@e',
					'@<address[^>]*?>@si'
	);

	$replace = array ('',
					 '',
					 '\1',
					 '"',
					 '&',
					 '<',
					 '>',
					 ' ',
					 chr(161),
					 'chr(\1)',
					 '<br>'
		);
	
	$header = preg_replace($search, $replace, $template->pdfheader); 
	
	$footer = preg_replace($search, $replace, $template->pdffooter); 
	$text   = preg_replace($search, $replace, $template->description); 
	  
	
	$text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text );
	$text = str_replace("\$aos_quotes","\$".$module_type_low,$text);
	$text = str_replace("\$aos_invoices","\$".$module_type_low,$text);
	$text = str_replace("\$total_amt","\$".$module_type_low."_total_amt",$text);
	$text = str_replace("\$discount_amount","\$".$module_type_low."_discount_amount",$text);
	$text = str_replace("\$subtotal_amount","\$".$module_type_low."_subtotal_amount",$text);
	$text = str_replace("\$tax_amount","\$".$module_type_low."_tax_amount",$text);
	$text = str_replace("\$shipping_amount","\$".$module_type_low."_shipping_amount",$text);
	$text = str_replace("\$total_amount","\$".$module_type_low."_total_amount",$text);
	 
	
	$firstValue = '';
	$firstNum = 0;
	
	$lastValue = '';
	$lastNum = 0;
	
	//Find first and last valid line values
	$product_quote = new AOS_Products_Quotes();
		foreach($product_quote->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_products_quotes_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_quotes_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_quotes_'.$name;
						$lastNum = $curNum;
					}
				}
			}
		} 
		
	$product = new AOS_Products();
		foreach($product->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_products_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_'.$name;
						$lastNum = $curNum;
					}
				}
			}
		} 
	
	if($firstValue !== '' && $lastvalue !== ''){
		//Converting Text
		$parts = explode($firstValue,$text);
		$text = $parts[0];
		$parts = explode($lastValue,$parts[1]);
		$linePart = $firstValue . $parts[0] . $lastValue;
		
		if(count($lineItems) != 0){
			//Read line start <tr> value
			$tcount = strrpos($text,"<tr");
			$lsValue = substr($text,$tcount);
			$tcount=strpos($lsValue,">")+1;
			$lsValue = substr($lsValue,0,$tcount);
		
			//Read line end values
			$tcount=strpos($parts[1],"</tr>")+5;
			$leValue = substr($parts[1],0,$tcount);
			
			//Converting Line Items
			$obb = array();
			$sep = '';
			$tdTemp = explode($lsValue,$text);
	         
			foreach($lineItems as $id => $productId){
				$obb['AOS_Products_Quotes'] = $id;
				$obb['AOS_Products'] = $productId;
				//echo "Verma:  <pre>"; print_r($obb); 
				$text .= $sep . templateParser::parse_template($linePart, $obb); 
				$sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
			}  
		}
		else{
			$tcount = strrpos($text,"<tr");
			$text = substr($text,0,$tcount);
			
			$tcount=strpos($parts[1],"</tr>")+5;
			$parts[1]= substr($parts[1],$tcount);
		}
	
		$text .= $parts[1];
	} 
	    //echo $text; die;
	$firstValue = '';
	$firstNum = 0;
	
	$lastValue = '';
	$lastNum = 0;
	
	$text = str_replace("\$aos_services_quotes_service","\$aos_services_quotes_product",$text);
	
	//Find first and last valid line values
	$product_quote = new AOS_Products_Quotes();
		foreach($product_quote->field_defs as $name => $arr){
			if(!((isset($arr['dbType']) && strtolower($arr['dbType']) == 'id') || $arr['type'] == 'id' || $arr['type'] == 'link')){
			
				$curNum = strpos($text,'$aos_services_quotes_'.$name);
				if($curNum)
				{
					if($curNum < $firstNum || $firstNum == 0)
					{
						$firstValue = '$aos_products_quotes_'.$name;
						$firstNum = $curNum;
					}
					else if($curNum > $lastNum)
					{
						$lastValue = '$aos_products_quotes_'.$name;
						$lastNum = $curNum;
					}
				}
			}
		}
	if($firstValue !== '' && $lastvalue !== '')
	{
		$text = str_replace("\$aos_products","\$aos_null",$text);
		$text = str_replace("\$aos_services","\$aos_products",$text);
	
		$parts = explode($firstValue,$text);
		$text = $parts[0];
		$parts = explode($lastValue,$parts[1]);
		$linePart = $firstValue . $parts[0] . $lastValue;

		if(count($serviceLineItems) != 0){
			//Read line start <tr> value
			$tcount = strrpos($text,"<tr");
			$lsValue = substr($text,$tcount);
			$tcount=strpos($lsValue,">")+1;
			$lsValue = substr($lsValue,0,$tcount);
		
			//Read line end values
			$tcount=strpos($parts[1],"</tr>")+5;
			$leValue = substr($parts[1],0,$tcount);
			
			//Converting ServiceLine Items
			$obb = array();
			$sep = '';
			$tdTemp = explode($lsValue,$text);
	
	
			foreach($serviceLineItems as $id => $productId){
				$obb['AOS_Products_Quotes'] = $id;
				$obb['AOS_Products'] = $productId;
				//$text .= $sep . templateParser::parse_template($linePart, $obb)."$";
				$text .= $sep . templateParser::parse_template($linePart, $obb);
				$sep = $leValue. $lsValue . $tdTemp[count($tdTemp)-1];
			}
		}
		else{
			//Remove Line if no values
			$tcount = strrpos($text,"<tr");
			$text = substr($text,0,$tcount);
			
			$tcount=strpos($parts[1],"</tr>")+5;
			$parts[1]= substr($parts[1],$tcount);
		}
	
		$text .= $parts[1];
	}

	
$existed = '<p><span style="font-size: x-small;"><em><span style="text-decoration: underline;"><span style="color: #ff0000; text-decoration: underline;">sample DISCOUNTS AND TOTALS SECTION</span></span><br /><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAhQAAAC6CAIAAAB5kUMFAAAW6klEQVR4nO2cQbLmKA6Eff9bzn6irsAsal6Fn5FSKcA2hvzCCxeWhIDkz+ruiTmKEEIIkeR4uwEhhBDfQ+YhhBAijcxDCCFEGpmHEEKINDIPIYQQaWQeQggh0sg8hBBCpJF5CCGESCPzEEIIkUbmIYQQIo1tHocQ36T9JgghfGQeYnFkHkLcQc48/vz3P3r0fOXxJJ4yj9dXoUfPbI/MQ8/ij8xDj547HpmHnsUfmYcePXc8Mg89iz8yDz167nhkHnoWf2QeevTc8cg80L7w4y+2NNsWzfbIPG7a0tfb+FCHs/UzcFFfMo/jB3I8Vdb7YzieanVIh22bRrY0KmaGZ0/z4M+aLHIudcee6LJ87vFulszDLsVPcbls725aT/P91WZY9VbmMfaH/oEd0GX54vNh86h/67ODlwt2HjTDziLwxsEI3xU/Y7jesKXsbnjVzCLvSuXcyT7mgaXoycw75YaCqeLeFCDrqKjrYHGG/Xgt1Vlg+WZjZj+gjZmfv21/zzz+/P4bSq2YnncmDIvjD7xCbZ2AeFwhbDJ8T8XjHt4SjMyj7X14QXM/jx96Zjn/EYs57Kdn1al43MPkz9+2v2oe3kvnezYF669BT6kVMV+zWUyF+t1Mef3525jMo+19eEEsLW9epj1+xqzUe1bkvX9LVObzdxUyj1vM408llKMCz87r1atsbl1qmXVxHPOuPLxVyzyYd1M/PQXD4nXZMMtrj+mE76dt1XVxHPO6Wnqev0v4pHn8+fmHxPBEs+/ZFLwtWMd4drLbsAcmq3PHyB6efzyJyzwYZQ4pyO+hLsuHHu9mfcY8Rp2op0gmzJM4k26Om5VBS6Cyt3XDdyz8+q5g9jEPfBC8sM0UvghZ/DKiy/Khx7tZnzeP81dGVZdqpAjq+nWrpmhAV15uOLVZ2du6MKvejUtY/Y5X9K5gtjKP8FjNM2JScJGG4nVAuAqsVTx7tp/Urh7fvyyp52/bXzKP2R7tyeSPJ/G1zUOPnrsfmceA7Xu9DT3gkXno0XPHI/MYsH2vt6EHPDIPPXrueGQeehZ/ZB569NzxtJiHEJ+j0zyEECY582i+h2JaFj7WTtFK86KHhcUj8xClbCnxZ9LF5iwsHpmHKGVLiT+TLjZnYfHIPEQpW0r8mXSxOQuLR+YhSuEk/tGjl3mIF9nwZs1iHt50H93uadlQ4s+kpyYy38Wn2fBmUebhJnfct0viEPM4fmhrqWfqr4AXBTYw3Ng69/gNMwsIILNAh5i6ybYiqZgwnrwm4nU2vFnrmEf/zd8BLBEv7O8fs7meZnAzYSkgleXNQ0zLhjeLNY+6dD3omeH5kxdphoG11YvBKwddeZXr9dZF6kEzch5ImfbkziZxklB44Vl7SiMlXQd716SOJ7sV97HhzRpmHuZXr5QZn1pbvZhwv5iu+KlB5bqNeXhY4qmfTlwqbKPztxL3Sd5hTxVeVkqEIL5U2+6FiZvY8GYlzIN86RxnwvAiyQtW5xZ/K/mficnvKm6v3sDhuR81D7PDUBVhVmq72rqaXJDLsOHNWso8zPQLZlmzcmgeZuXi7/UMkI2F4gOfcO5K5oGzzgGe9urKWKhMV/hmiZvY8Gatbx44AFQOfxTIHqZiQ4mTtJkH6NMrwswi8/gcG96snHmAT8+YhzliNskHhz2Y7+uZR0p8IB7rsu339OvmcS7OLFbm8Tk2vFnDzOPfJxAASvWbx7kBcxBMF7ZqFvcqd/6K3QpuzGue2UO8+XiwuVQdAFaHAS0BcXp91n80983LNSt48eFmeksWA9nwZt3yl7hbmbaxTxBKfFSp5xlrHkKk2PBmfcw85uzqQ4yS+IQHIfMQL7LhzZJ57MXCGyjzEC+ysHgWMQ/RycLHKvMQL7KweFrMQ4jP0XlDhBAmOfNovodiWhY+1k7RSvOih4XFI/MQpWwp8WfSxeYsLB6ZhyhlS4k/ky42Z2HxyDxEKVtK/Jl0sTkLi0fmIUrhJP7Ro5d5iBfZ8Gbdbh6z7dds/TzMhhJ/Jl1szoY3K2Ee+H+2BSbmg4ckNpQ9fvNAGyFPLv/8tfk3FGsmNUtPVkPnIL1N86DIudodR9zf7aXakDo70HyzyLtwqTDDzWLNA/8R0Ky/m4Trnd8DU6d4cvn1p+zs5q+hWTCcpS2r3GAew1Vxt656TlB00nazsn+NqONfvFlUNG7l33pMV7zUqV2uTseTehXMdxwMBs3NvSwtHAlFU34vv95Ar41mSIkPKT6JxEmaNe8pBIiq/mN9C7wKXnGvZy/rMmO47eZ6vX5Ak6vSc7PIjcLX4fmbNcY8vODLZWDSwaSgAh4E4+FceB/M28jMG+4e+KHpoUfi2eKTSJxkiObxqeH9MYuDlsILgrPwtcWzp6S+CTIPOzq8SF6LTBjoGI9gNT9vHql5m7elE1z2+GFI8UkkTjJE8z3mkXoHHeKFAIHhS9Qs9U3ouVnMjjU7fWfWv+aNcSZ6lHlcCDs2u6orFEf3/HTgYtTLGXKjsuOjIMu2zc78OD4vcZIhmgcSBVn8OygOWiUvgnmJvOZxP51n8UV6bhaTG57L8zfrUfPw5iLHwRZj3YdFwFyptdcjzM8NP28/PRLPZk0icZIhmid/0Os/Zt9DGu5dg3mQPeyAzMONJnVff3rGPHAb4Ti/ustgHcn8rIBtIS25mdCAe6ZrNo/+i1FGm0c9EaP5d80j3DrQTEOHMo8zPTcrvOxz3qxE9HHCW8klsm6uLoI7roMb2ginI8t6AZdBUKrelnA60HYDuI7ZNlnWXDW/Y2EbYW9tneN0RhWFEDmTFb7j4peAMMtLx3/0zvdSufMsvgher7cn5NGARDwYBoDeLgHGeCpafJ1Q4o91MpxO0UrzooeBN2s2Hco8RCkyj9vSxeaMulkTilDmIUqZUpqjkHmIF1lYPDIPUcqWEn8mXWzOwuJpMQ8hPkfnDRFCmOTMo/keimlZ+Fg7RSvNix4WFo/MQ5SypcSfSRebs7B4ZB6ilC0l/ky62JyFxSPzEKVsKfFn0sXmLCwemYcohZD4d89d5iFeZMObNZF5uC3e08xja5zqV2lDiT+T/okZX5l9Kv3fx4Y3izKP4wczrHlTzFnCMKYmE49XRNYZFfMYoBO8arAKc9O8nQz31gxgTqRzn0M9dFb2tqK5LJ6LjCRbTRVpiFmAUJkNAjOPA8sJ7LYZwJy12x4THa7cmxVjzhKGkQV7NN02Y0/MY5BLvoTxB32ROJiFDwizwk8MdTo5b3P94Uj/L9Jws8Jfv7bBx25Wzjz6By+9ngfNMG+p5pJS2+pNh+vwS8DV3sLrBDRpbn5YJHUWOCDMCj8xpNQViocRFaklprg3hTkLuQSzDtnzMav+78NbI7n88Oz4QT4gzMKfEuZRLNvE0uTfmbBQlLVw+ztJFQnjXwfrA/TJrKJe9aVsuC3huYM2Ovd5lAaGiyq7e52z9LQaxi8MlmW4A/hA6/00B8NSl3fymLxPafPwXjrfsynueqqj6uwklRjGvw7o5DjhfcWVvYBQLWYRPovsEDNEA8NF1SY8b95bW2XiFwas8TjBfzIjvcFww80A8pjcU2ai68nC6TslG76HSx3VSUMiaOB1wk4uzV/Gw0T8KdyW8KyZWdoYooGjYkjBsHhdtqFyZ6t1h161JQnXyJxamO4NhhtuBpDH5H3KmUf52aNmaZKSDd/xXg/sZPgy34XpJBQfn3X5FG5LeNbMLG0M10DY3n1C6qw8ttXOc/kKzBp71GsG8HfEDGiW7v/Hmeh6jiFKCmcBYfZibuhk+DLfBejj/F6H8XsCCoZbxA+aS+jZ59QCeSE11G8ofhnprzyw1c5z+QpAlud3Rh5n5dcB3iDefH7QXIL5aaR5nL+G+1JXI8VX1687v3w9fgMGzRnB0swl4C16F9BJuECwLn7HwGA2y5wOLx/QcOhmIpOCizQUrwO8VZj7HLYaruv4iP7vA6wRnJr5yTsmJmtIKbNJYzwVPQmTtzczeN9SuzrbKXT2M9tyxLfY8GZ9zzxm7m1+Rkl8wlOQeYgX2fBmyTz2YuGtk3mIF1lYPOuYh+hh4WOVeYgXWVg8LeYhxOfovCFCCJOceTTfQzEtCx9rp2iledHDwuKReYhStpT4M+licxYWj8xDlLKlxJ9JF5uzsHhkHqKULSX+TLrYnIXFI/MQpXAS/+jRyzzEi2x4s2Qee7GhxJ9Jv5QaUkd8iA1vVmweh8WNnYo7wWfXc75mLj9YB5gpIPEO82jTfHMbXg91M6lWQeJbd3m935DmmxWqq871DpS8Wd7lwlnGOB+93nlvCJYIE8bn8oN1qYbfuOxPfJje/DvbYx5gXtBPqvMZLvIMPYyl7WaZJx7mgouTDWBu/S3mYVof7k+8CynT4VOkxFp/et48mFWcU853wfzLYF3cs6useYSrBne5rlm36o0w7nVeab1XK/1E9NwsMhdvF69er5TXhnez2s0Dewb5GyEe5rvmUf9g1Sk9S8C/hpdBEAx+E710MwAPgnFQlpzIHKnvNdlbai3f5WHzwP49u3ngthZQw5Lgcwl/oNvqpyTe/Olh8wAtNf/c4+t9/Aa3CtrzOmGufOdKecP7HD03a0jux8zDlDJoQrwOeTTNJyjzuISZv/jN5oEjPUjzKMQmyDw8em4WqXZek7ObB5byeuJYg1vNg7kYu5mHNxczfrlKD5hH+FXm4SHzQNH4r1eX8ZS4xWP0yLShMlZRw48U6G2seaR6uHx6wDz4flKJl8HwL4VeZLOpfJchBoDj8S9+yhteNo9zGL8A8S74LI4fGsqeAYPmLObXMMvsIds5Tjc7Kf5duFwHbzngloKucA9eq14PdREvwDsIEMn0zGzIh8BLSB1NeAT8YHOpOsAYT0WLrxNK/LFOhtMpWmle9DDwZs2mQ5mHKEXmcVu62JxRN2tCEco8RClTSnMUMg/xIguLR+YhStlS4s+ki81ZWDwt5iHE5+i8IUIIk5x5NN9DMS0LH2unaKV50cPC4pF5iFK2lPgz6WJzFhaPzEOUsqXEn0kXm7OweGQeopQtJf5MutichcUj8xClEBL/7rnLPMSLbHizNjKPZxY1+dZtKPFn0j8x4xB0j0w2vFmUeRw/mGH/xo/feMHeJuL0fuqyR0W2QlvMi4DeRp1dPeKN407M4mEPXs2QtoXzlb2taC5LTndTfTBjOOmomKkI9eytKJS0p5xLYrj/bVmgw/HmASqc/xj2N1w6DYfXEDm56LGwzDBwjvUgDggjiyU2cks7d95UYNhtT/070D16i4abVSy1g/rgEvF3MJWFP+XMAw8y76nmzInCZrzjcbfA3+t6FWQn5MKfx+uHbBXslReQUsVRabqzN55wUiyGSxhOZwqmintTgFyzFLkufvY6Bay07sRby4R43YKFHJbawyLmuxeAK4RZ+FPCPMrvDcLTk20xAZdS3nhzG/U4WS0VPwlYH2G3vC7Dr7xYj9+keuMxJ80uBCxwbMHwIPACvcaap+5ZYBj/Cbxuh+g23MmUNvgs/CltHt5LOW2Tl+7hFQla56SZqtNfIVzsu4DezLOrA/A4Pnpyo4Z/YghF26m3sQXNxdYBzIYPmbp5gUz8JwDd1mdRf8WVPSH9e2/QBpOFP403D7xasjmwquM3OJ7ZHX72bCcTEvZ2Wc5lHKSYYeCPZMEhnxhC0fIaq1XRWTAsnp2irtbWUtvs2U4+Qdgtf2o4wNylcOvasvCnnHmUnz0aojbQXLZsTxv3zT4hTG94Q3A8UA6OJKdr+8SAOy/dpz9WZg9MkW3jvtk/AdOtuajssZq7FG5dWxb+1GIeDWdf/zE749h3MPUDM74I0Mf5HfyxHueX368WsKWdu813m1pIQ/2G4t4sPVPwx3rHAjtP83mALM/vdVhKeN7XcBtTWWGH/x9nous5Gs7+OAEmrWPMP5JtgLJefdzteTDbyQyAfsIlhyvFB8dE4rnwfnbuNt9tofWG6+PNTBX3egbHAfaZj8cLDHfj4O7RJyBPxBsnTwEUBIPZLHM6YzwVLb4OPtbUoc8mks5+ZluO+BYb3iyZx16MkviECpF5iBfZ8GbJPPZi4WOVeYgXWVg8Mg9RypYSfyZdbM7C4mkxDyE+x/AbIgTDwuLxrobMQyxF5w0RQpiw5iHEbng3RAiGhcUj8xACIfMQPSwsHpmHEAiZh+hhYfHIPIRAyDxEDwuLR+YhBELmIXpgxPNRgck8hEAw5vHRyy8eQOYhxKbUN6T+Hyl6l7/nR+GjPyjiAj5H8D94nR+ZhxAI4BP/3j96+cUDAG0wf/+YGZmHEAjmHzKO3/8X4mYwjmnLPQ/++/TFn6GFIc3ji8g8hECQ5hH+EwmI6cnFg+J1ZB5CbAr4y/555BJQjzMxPblf/yVaFXwu5j9NfgWZhxAIcLeHG0BP7kd/gJaHPJcnj2+UY8k8hEDMbB5l3A+BuIkJzWMUMg8hEODfUGUNoOe/eYT1vWDxLuR/8/jiqck8hECM/W8eXi6uyfyTB3YU8Rb4OD79D44yDyEQo+52+O+++mt+9DdobULzeKyT4cg8hEDIPEQPMg8hNmVm8yjWv7YSU7Hwucg8hEDod1n0sLB4cuZxCPFNht8QIRgWFo93NWQeYik6b4gQwiRnHs33UIjn6RStNC96WFg8Mg+xODIP8SILi0fmIRZH5iFeZGHxyDzE4sg8xIssLB6Zh2D56NHLPMSLhOL5rrp2NI85VzFnV2cmb8/ji+YxvxgAn25+ODIPO7pZJe6sP5DjbdOFpY7ftE2a5TzXbNcPbAVu9aioB5lZQACZhRcIwIK86aTApN4Ibsn7ZB5QtrGGmH1g9MyflxlWp3jjfBtMA95Xmcebv+NTXb/L1tWf+FZBPJgFBIRZ5QbzMEea65OTFusWeELFgvcqNzfWXG0HSFmCd1wB/1K1BZA/gN6nRvM4TnjrPH4TprcNXhZPNsAsk5+a35NSnVzdcN3nM4RTk72dV4qL8AFhVhltHrgaUJoZA6RSz1J/yr6Ta8TTkQvkZ18bb/nkzoAwIAYznQ8gT9D71GIevIDcWU/dX8p6BbPvYW98/MCW+IafJ5ya7O2yOiwePMu5VNhG5+6lzuJyiN54gzzOg/2l8Br5yqn4PcGybDiac9l6qy9leVGV3wJjTtDtjYkm69bbBHbk0n24nuw7/pSK739PdfUidbeXr0wFPH7ZClyBzyp3msdxAs/VqdjLYP1yacZrmFxjtjEyZk/AVpjnFX46lw2PgxdVKgt/ajQPrGBeguCl8x1/IuPrNTa3wUTOg3dqbYnn8cvO4Ap8VrnTPOoR74g7pWIGeClhw+Ea+cbCBQpy81PqDbfaFAMjKjIrmJ2JBn/k5QhiirNNPe9MJ9n4tjZSkZPgrb0tsfw+X34WPqu8Zx4DFesFNJfCa7yj+W0hb0dKvUeFl9UgKiYLf5rCPEYpONUnn1s6vK254ecx1+sFmDEg4LxkcpAJuEzXs3v41Er+6Nuk4s3boJ+w8t0L2Qogy/M7kDrYzMvXejw8F37QXIL5KWEeZxHXI+fBulQoWW8N9Sx4zXWTYP3mKpip8Uq9flINvwKzFectrcOYguaeNGSZc6HlQVIKYVThvYOyXidk2eKIkF+jOd6wwA0JlclvPhYAzgKl+CyzSWM8FS3W3pnU0mbbh86jWftkxd1g8WRv1lRSlHmMYe2d4Zc24SbIPMSLjDKPCXUo8xiDdmZaZB7iRRYWj8xDLI7MQ7zIwuJpMQ8hPkfnDRFCmMg8xOLIPIS4A9Y8hBBCCIDMQwghRBqZhxBCiDQyDyGEEGlkHkIIIdLIPIQQQqSReQghhEgj8xBCCJFG5iGEECKNzEMIIUSa/wE1vnycuycoKwAAAABJRU5ErkJggg==" alt="" /></em></span></p>'; 	
	
	$OneTimeSubTotal   = $SummaryDetails['total_nrc'] + $SummaryDetails['service_subtotal_nrc'] - $SummaryDetails['order_nrc_discont'];
	$OneTimeGrandTotal = $OneTimeSubTotal + $SummaryDetails['shipping_amount'];
	
	$stringtoaddinPDF = '<div><table style="border: 0pt none currentcolor; width: 80%; border-spacing: 0pt;"><tbody>
	<tr><td style="width:50%;float:left;"><table style="border: 0pt none currentcolor; width: 100%; border-spacing: 0pt;"><tbody><tr><td colspan="2" style="text-align: center; height: 20px; background-color: #0001F9;"><span style="font-size: x-small; color: #FFFFFF;"><strong>Monthly Service Totals:</strong></span></td></tr>
		 <tr><td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Line Level Discount(s):  </span></td>	<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['total_discount'], true).'</span></td>
		  </tr>	  <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Order Level Discount:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['order_discount'], true).'</span></td>
		  </tr>		  <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">Monthly Sub Total:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['subtotal_amount'], true).'</span></td>
		  </tr>          <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Tax:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['tax_amount'], true).'</span></td>
		  </tr>  <tr>	<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">MRC Grand Total:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['total_amount'], true).'</span></td>
		  </tr>   <tr>
			<td colspan="2" style="border-width: 0px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">&nbsp;</span></td>
		  </tr><tr>
			<td colspan="2" style="border-width: 0px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">&nbsp;</span></td>
		  </tr><tr><td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">Last Month Deposit:</span></td>	<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['product_subtotal_lmd'], true).'</span></td> </tr> </tbody>
		</table> </td>
	  <td style="width:50%;">   <table  style="border: 0pt none currentcolor; width: 100%; padding-top:17px; border-spacing: 0pt;">
         <tbody>          <tr>
            <td colspan="2" style="text-align: center; height: 20px; background-color: #0001F9;"><span style="font-size: x-small; color: #FFFFFF;"><strong>OneTime Service Totals:</strong></span></td>
          </tr>		  <tr>
		  <tr>			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Installation:  </span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['total_nrc'], true).'</span></td>
		  </tr>		  <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">OneTime Services:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['service_subtotal_nrc'], true).'</span></td>
		  </tr>		  <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Order NRC Discount:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['order_nrc_discont'], true).'</span></td>
		  </tr>          <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;font-weight: bold;"><span style="font-size: x-small;">OneTime SubTotal:</span></td><td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($OneTimeSubTotal, true).'</span></td> </tr>
		  <tr>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">Shipping:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($SummaryDetails['shipping_amount'], true).'</span></td>
		  </tr>
          <tr><td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left; font-weight: bold;"><span style="font-size: x-small;">OneTime Grand Total:</span></td>
			<td style="border-style: solid; border-width: 0.5px; padding: 2px 6px; text-align: left;"><span style="font-size: x-small;">$'.formatMoney($OneTimeGrandTotal, true).'</span></td>
		  </tr>			  
		  </tbody>
		</table>	  </td>
    </tr>   </tbody>
  </table></div>';
	
	// sample DISCOUNTS AND TOTALS SECTION  $stringtoaddinPDF
	$pos = strpos($template->description, "sample DISCOUNTS AND TOTALS SECTION");
 
	if ($pos === false) 
	{ 
		//echo "The string '$findme' was not found in the string '$mystring'";
		  $text .= $stringtoaddinPDF;
	} 
	else 
	{ 
		//echo "The string '$findme' was found in the string '$mystring'"; 
		 $text = str_replace($existed, $stringtoaddinPDF, $text);
	}
 // text-transform: uppercase;
	 
	$converted = templateParser::parse_template($text, $object_arr);
    $converted =  html_entity_decode(str_replace('&nbsp;',' ',$converted));
	$header = templateParser::parse_template($header, $object_arr);
	$footer = templateParser::parse_template($footer, $object_arr);
	
	$printable = str_replace("\n","<br />",$converted); 
	
         //echo $text; die;
	if($task == 'pdf' || $task == 'emailpdf')
	{
		$file_name = $mod_strings['LBL_PDF_NAME']."_".str_replace(" ","_",$module->name).".pdf";
		
		ob_clean();
		try{
			$pdf=new mPDF('en','A4','','DejaVuSans',15,15,16,16,8,8);
			$pdf->setAutoFont();
			$pdf->SetHTMLHeader($header); 
			$pdf->SetHTMLFooter($footer);
			//$pdf->SetHTMLFooter('<p style="text-align: center;">'.$quoteName."</p>");
			$pdf->writeHTML($printable);
			if($task == 'pdf'){
				$pdf->Output($file_name, "D");
			}else{
				$fp = fopen('cache/upload/attachfile.pdf','wb');
				fclose($fp);
				$pdf->Output('cache/upload/attachfile.pdf','F');
				sendEmail::send_email($module,$module_type, '',$file_name, true);
			}
		}catch(mPDF_exception $e){
			echo $e;
		}
	}
	else if($task == 'email')
	{
		sendEmail::send_email($module,$module_type, $printable,'', false);
	}
?>
