<?php
require_once('include/MVC/View/views/view.detail.php');

class Nli_ServiceAddressesViewDetail extends ViewDetail{

	function Nli_ServiceAddressesViewDetail(){
		parent::ViewDetail();	
	}
	function display(){

	$this->ss->assign('frameVal','<iframe name="adada" border="0" src="http://maps.google.com/?q='.$this->bean->service_address.''.$this->bean->service_address_city.','.$this->bean->service_address_state.','.$this->bean->service_address_postalcode.'" ></iframe>');
	parent::display();
	}
}
?>
