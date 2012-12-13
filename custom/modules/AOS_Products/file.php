<?php 
require_once 'class.php';
class IntegrateJbillingClass
{
	function InsertProductToJbillingMethod(&$bean, $event, $arguments)
	{  
		global $db;		
		if(empty($_REQUEST['record'])) {
			if ( ! isset($db) ) 
			 { 
				   $db = DBManagerFactory::getInstance(); 
			 } 	   
				$productID = $bean->id; 		   
				$fetchAdminCheckQuery = "SELECT * FROM aos_products WHERE id='".$productID."'";
				$resultAdCheck = $db->query($fetchAdminCheckQuery);   
						
				while (($row = $db->fetchByAssoc($resultAdCheck)) != null) {
						   $path_to_wsdl = 'custom/modules/AOS_Products/jBilling.wsdl';
						   try {					   
						   $client = new SoapClient($path_to_wsdl);
						   $jbilling_categories = $client->getAllItemCategories();					   
						   
						   $itemPriceDTOEx = new itemPriceDTOEx();
						   $itemPriceDTOEx->currencyId = ($row['currency_id'] == 0)? 1 : $row['currency_id'];
						   $itemPriceDTOEx->price = $row['price'];
						   $itemPriceDTOEx->name = $row['name'];
						  
						   $itemDTOEx = new itemDTOEx($itemPriceDTOEx);
						   $itemDTOEx->price = $row['price'];
						   $itemDTOEx->currencyId = ($row['currency_id'] == 0)? 1 : $row['currency_id'];
						   $itemDTOEx->deleted = $row['deleted'];
						   if(!empty($row['description'])) {
						      $itemDTOEx->description = $row['description'];
						   } else {
						      $itemDTOEx->description = $row['name']; 
						   }
						   $itemDTOEx->number = $row["maincode"];
							  $flagjcat = true;
							  $orderTypeId = 0;
							  foreach($jbilling_categories->return as $category) {
								 if(strtolower(str_replace(" ","",$row['category'])) == strtolower(str_replace(" ","",$category->description)))
								 {
								   $itemDTOEx->types = $category->id;
								   $itemDTOEx->orderLineTypeId = $category->orderLineTypeId;
								   $flagjcat = false;
								 }
								 if($orderTypeId < intval($category->orderLineTypeId)) {							 
								   $orderTypeId = intval($category->orderLineTypeId);
								 }
							  }
							  if($flagjcat) {
								 $itemTypeWS = new itemTypeWS();
								 $itemTypeWS->description = $row['category'];
								 $itemTypeWS->orderLineTypeId = $orderTypeId + 1;
								 $createItemCategory = new createItemCategory($itemTypeWS);
								
								 $itemDTOEx->types = $createItemCategory->return;
								 $itemDTOEx->orderLineTypeId = $orderTypeId;
							  }
						   
											   
						   $itemDTOEx->hasDecimals = 1;
						   $itemDTOEx->entityId = 1;
						   //$itemDTOEx->percentage = 0;
						   $itemDTOEx->priceManual = 1;
						   
						   $createItem = new createItem($itemDTOEx);
						   //JBilling Handler					   
								$res = $client->createItem($createItem);
								$jbilling = $res->return;
								
								//Homir Call Starts here....
								
								$clienthomir = new SoapClient("http://homir-dev.nextlevelinternet.com/web_services/wsdl");
								$ProductWS = new ProductWS();
								$ProductWS->assigend_user_id = $row['assigend_user_id'];
								$ProductWS->jbilling_item_id = $jbilling;
								$ProductWS->price = $row['price'];
								$ProductWS->cost = $row['cost'];
								$ProductWS->maincode = $row['maincode'];
								$ProductWS->part_number = $row['part_number'];
								$ProductWS->url = $row['url'];
								$catArrHomir = $clienthomir->GetProductCategories();
								$flaghcat = true;
								foreach($catArrHomir as $cathomir) {
									if(strtolower(str_replace(" ","",$row['category'])) == strtolower(str_replace(" ","",$cathomir->name)))
									 {
									   $ProductWS->product_category_id = $cathomir->id;
									   $flaghcat = false;
									 }	
								}
								if($flaghcat) {
									  $ProductCategoryWS = new ProductCategoryWS(); 
									  $ProductCategoryWS->description = $row['category'];
									  $ProductCategoryWS->name = $row['category'];
									  $createCatHomir = $clienthomir->AddProductCategory($ProductCategoryWS);
									  $ProductWS->product_category_id = $createCatHomir;
								}
								$ProductWS->date_entered = $row['date_entered'];
								$ProductWS->date_modified = $row['date_modified'];
								$ProductWS->product_id = $row['id'];
								$ProductWS->contact_id = $row['contact_id'];
								$ProductWS->deleted = $row['deleted'];
								if(!empty($row['description'])) {
								  $ProductWS->description = $row['description'];
								} else {
							      $ProductWS->description = $row['name']; 
								}
								$ProductWS->product_type = $row['type'];
								$ProductWS->modified_user_id = $row['modified_user_id'];
								$ProductWS->name = $row['name'];
								$ProductWS->currency_id = ($row['currency_id'] == 0)? 1 : $row['currency_id'];
								$ProductWS->created_by = $row['created_by'];
								$ProductWS->unit_measure = $row['unit_measure'];
							
								$resHomir = $clienthomir->AddProduct($ProductWS);
								$db->query("INSERT INTO aos_products_cstm (id_c,jbilling_relation_id_c,homir_id_c) VALUES('".$productID."', '','')");
                                                       $db->query("UPDATE aos_products_cstm set jbilling_relation_id_c= '".$jbilling."', homir_id_c= '".$resHomir."' where id_c='".$productID."'");
                                            
                                                }
							catch(Exception $e) {
								echo "<h1>Error</h1>";
								echo "<pre>";
								print_r($createItem);
								echo "</pre>";
								echo "<pre>";
								print_r($ProductWS);
								echo "</pre>";
								echo "<pre>";
								print_r($resHomir);
								echo "</pre>";                            							
								echo "<h2>SOAP Call Error: ". $e.'</h2>';
								echo "<hr/>";  
								die;							
							}
					 }	
          }					 
    }
}
?>