<?php
/****************************** JBilling Webservice Classes ********************************/

class itemTypeWS {
	 public $description;
	 public $Id;
	 public $orderLineTypeId;
}

class createItemCategory {
    public $arg0;
	function __construct(itemTypeWS $itemTypeWS) {	   
           $this->arg0 = $itemTypeWS;
	}
}

class getAllItems {    
}

class itemDTOEx {
    public $currencyId;
    public $deleted;
    public $description;
    public $entityId;
    public $hasDecimals;
    public $id;
    public $number;
    public $orderLineTypeId;
    public $percentage;
    public $price;
    public $priceManual;
    public $prices;
    public $promoCode;
    public $types;
    function __construct(itemPriceDTOEx $itemPriceDTOEx) {	   
               $this->prices = $itemPriceDTOEx;
            }
}

class itemPriceDTOEx {
    public $currencyId;
    public $id;
    public $name;
    public $price;
    public $priceForm;
}

class createItem {
    public $arg0;
    function __construct(itemDTOEx $itemDTOEx) {	   
           $this->arg0 = $itemDTOEx;
    }        
}

class getAllItemCategories {
}


/****************************** HOMIR Webservice Classes ********************************/
class ProductCategoryWS {
	 public $description;
	 public $name;
	 public $id;
}
class ProductWS {
	 public $assigend_user_id;
	 public $jbilling_item_id;
	 public $price;
	 public $part_number;
	 public $url;
	 public $cost;
	 public $maincode;
	 public $date_entered;
	 public $product_category_id;
	 public $date_modified;
	 public $product_id;
	 public $contact_id;
	 public $deleted;
	 public $description;
	 public $product_type;
	 public $modified_user_id;
	 public $name;
	 public $currency_id;
	 public $created_by;
	 public $id;
	 public $unit_measure;
}
?>
  