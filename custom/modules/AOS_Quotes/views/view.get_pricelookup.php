<?php


class AOS_QuotesViewGet_pricelookup extends SugarView {
        function AOS_QuotesViewGet_pricelookup (){
                parent::SugarView();
        }

        function display(){
                  global $db;
		//get product price list
		if(isset($_REQUEST['product_id'])){

			//check if grid pricing exists
			$obProducts = new AOS_Products();
			$obProducts->retrieve($_REQUEST['product_id']);
			$arListData = $obProducts->get_linked_beans('nli_pricing_aos_products', 'nli_Pricing', array('range_from'=>'ASC'));
         
//			pr(count($arListData));die;
			if(count($arListData)>0){
			
			$obProduct = new AOS_Products();
                        $obProduct->disable_row_level_security = 1;
			$obProduct->retrieve($_REQUEST['product_id']);
			//$arPricing = $obProduct->get_linked_beans("nli_pricing_aos_products",'nli_Pricing');
                        $arSql = $obProduct->create_new_list_query(""
                                                        , " aos_products.id='".$_REQUEST['product_id']."'"
                                                        , array(), array(),0,"",1);

                        $arSql['select'] .= ' ,nli_pricing.range_to,nli_pricing.range_from,nli_pricing.price PRICE_VALUE';
                        $arSql['from'] .= ' 
                                    LEFT JOIN nli_pricingaos_products_c relPrice ON 
                                    relPrice.nli_pricind645roducts_ida = aos_products.id AND relPrice.deleted =0
                                    LEFT JOIN nli_pricing ON relPrice.nli_pricin5ea3pricing_idb = nli_pricing.id and nli_pricing.deleted =0 

                            ';
//                        $arSql['where'] .= ' AND (range_from >="'.$_REQUEST['quantity'].'" AND range_to >="'.$_REQUEST['quantity'].'")';
			$arSql['where'] .= ' AND (( "'.$_REQUEST['quantity'].'" BETWEEN range_from AND range_to) 
					     OR (range_from ="'.$_REQUEST['quantity'].'"  OR range_to= "'.$_REQUEST['quantity'].'" ) )';
                        
                        $rsResult = $db->query($arSql['select']." ".$arSql['from']." ".$arSql['where']);
                        $arData = $db->fetchByAssoc($rsResult);
			//set price from grid pricing				
			if (isset($arData['PRICE_VALUE'])){
                            echo json_encode(array('status'=>'sucess','price'=>$arData['PRICE_VALUE']
					,'per_unit_price'=>$arData['PRICE_VALUE']/$_REQUEST['quantity'],'grid_price'=>1 ));die;
                        }else
                        {
                            echo json_encode(array('status'=>'failed'));die;
                        }
			
			}
//pr($_REQUEST);
		else{
			 echo json_encode(array('status'=>'sucess','price'=>$_REQUEST['quantity'] * $obProducts->price
                                        ,'per_unit_price'=>$obProducts->price,'grid_price'=>0 ));die;
		}
		}
	}
}

function pr($dd){
echo '<pre>';
print_r($dd);
echo '</pre>';
}
?>

