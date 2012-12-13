<?php

//echo '<pre>';print_r($_REQUEST);die;
         $obProducts = new AOS_Products();
         $obProducts->retrieve($_REQUEST['proid']);
         //$arListData = $obProducts->get_linked_beans('nli_pricing_aos_products', 'nli_Pricing', array('range_from'=>'ASC'));

         $arListData = $obProducts->get_linked_beans('nli_pricing_aos_products', 'nli_Pricing', array('range_from'=>'ASC'));


         //echo '<pre>';print_r($arListData);die;
         $html = '<div style="height:150px;overflow-y:scroll"> <table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view">
                    <tr>
                      <th scope="col"> From </th>
                      <th scope="col"> To </th>
                      <th scope="col"> Price</th>
                   </tr>
                ';
         if(count($arListData)>0){
             foreach($arListData as $obPricing){

                 $html .= '<tr class="oddListRowS1">
                            <td scope="row">'.format_number($obPricing->range_from)
                            .'</td><td  scope="row">  '.format_number($obPricing->range_to)
                            .'</td><td  scope="row" >'.format_number($obPricing->price).'</td></tr>';
             }
             $html .= '</table>';
             //echo '<pre>';print_r($arListData);die;
             }else{
                $html .= '<tr class="oddListRowS1">
                            <td scope="row" colspan=3 >No Data.</td></tr>';

                 
             }
         echo $html.'</div>';die;
?>

