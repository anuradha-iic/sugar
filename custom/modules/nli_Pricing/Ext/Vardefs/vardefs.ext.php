<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-02-28 12:08:50
$dictionary["nli_Pricing"]["fields"]["nli_pricing_aos_products"] = array (
  'name' => 'nli_pricing_aos_products',
  'type' => 'link',
  'relationship' => 'nli_pricing_aos_products',
  'source' => 'non-db',
  'vname' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_AOS_PRODUCTS_TITLE',
  'id_name' => 'nli_pricind645roducts_ida',
);
$dictionary["nli_Pricing"]["fields"]["nli_pricing_products_name"] = array (
  'name' => 'nli_pricing_products_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_AOS_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'nli_pricind645roducts_ida',
  'link' => 'nli_pricing_aos_products',
  'table' => 'aos_products',
  'module' => 'AOS_Products',
  'rname' => 'name',
);
$dictionary["nli_Pricing"]["fields"]["nli_pricind645roducts_ida"] = array (
  'name' => 'nli_pricind645roducts_ida',
  'type' => 'link',
  'relationship' => 'nli_pricing_aos_products',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NLI_PRICING_AOS_PRODUCTS_FROM_NLI_PRICING_TITLE',
);

?>