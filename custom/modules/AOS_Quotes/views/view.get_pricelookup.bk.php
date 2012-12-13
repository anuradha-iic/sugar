<?php

class AOS_QuotesViewGet_pricelookup extends SugarView {
        function AOS_QuotesViewGet_pricelookup (){
                parent::SugarView();
        }

        function display(){

		//get product price list
		if(isset($_REQUEST['product_id'])){
			
			$obProduct = new AOS_Products();
			$obProduct->retrieve($_REQUEST['product_id']);
			$arPricing = $obProduct->get_linked_beans("nli_pricing_aos_products",'nli_Pricing',array(), 0, -1, 0
						,' (range_from >="'.$_REQUEST['quatnity'].'" AND range_to >="'.$_REQUEST['quantity'].'")' );
			//pr($_REQUEST);	
			foreach($arPricing as $obPricing){
				pr($obPricing->range_from."---->".$obPricing->range_to);				;
			}
			
		}
//pr($_REQUEST);
	}
}

function pr($dd){
echo '<pre>';
print_r($dd);
echo '</pre>';
}
?>
