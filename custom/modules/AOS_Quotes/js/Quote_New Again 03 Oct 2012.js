/* Advanced, robust set of sales and support modules.
 * Extensions to OpenSales for SugarCRM
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
 * @author Greg Soper <greg.soper@salesagility.com>
 */

/**
 * Copy address right
 */
 var lineno;
 var prodLine = 0;
 var servLine = 0;
 var module = "AOS_Quotes"
 
 
 function setModule(mod)
 {
 	module = mod;
 }


function calculateDiscount(ln)
{
	if (document.getElementById('product_list_price' + ln).value == '') {
		return;
	}
	var total = 0;
	
	 $("input[rel=service_address_rel]").each(function() {
		  total = total + 1;
	   });
	 
	 var totalDiscount = 0.00;
	for(var i=0; i<total; i++)
     { 
	     //if( (document.getElementById('product_line' + i).style.display == "") && (document.getElementById('product_note_line' + i).style.display == "") )
		// {
			var listPrice = unformatNumber(document.getElementById('product_list_price' + i).value);
			var discount = unformatNumber(document.getElementById('product_discount' + i).value);
			var dis = document.getElementById('discount' + i).value;
			
			if(dis == 'Amount')
			{
				if(discount > listPrice)
				{
					document.getElementById('product_discount' + i).value = listPrice;
					discount = listPrice;
				}
				document.getElementById('product_unit_price' + i).value = formatNumber(listPrice - discount);
			}
			else if(dis == 'Percentage')
			{
				if(discount > 100)
				{
					document.getElementById('product_discount' + i).value = 100;
					discount = 100;
				}
				discount = (discount/100) * listPrice;
				document.getElementById('product_unit_price' + i).value = formatNumber(listPrice - discount);
			}
			else
			{
				document.getElementById('product_unit_price' + i).value = document.getElementById('product_list_price' + i).value;
				document.getElementById('product_discount' + i).value = '';
				discount = 0;
			}
			    totalDiscount = totalDiscount + discount;
				
			document.getElementById('product_list_price' + i).value = formatNumber(listPrice);
			document.getElementById('product_discount_amount' + i).value = formatNumber(discount);
			document.getElementById('order_discount').value = formatNumber(totalDiscount);
	    //}		
	 }  
	 // document.getElementById('order_discount').value = totaltmpe;
	 
        var totDiscount = unformatNumber( document.getElementById('order_discount').value) + unformatNumber( document.getElementById('product_subtotal_discount').value);  //
	document.getElementById('total_discount').value = formatNumber(totDiscount);
	calculateProductLine(ln);
	calculateSubTotals();
}


function showProductHeader(bool)
{
	if(bool)
	{
		document.getElementById("productHeader").style.display="table-row";
		document.getElementById("productSubTotals").style.display="";
	}
	else
	{
		document.getElementById("productHeader").style.display="none";
		document.getElementById("productSubTotals").style.display="none";
	}
}

/**
 * Insert product line
 */
 
function insertProductLine(ln)
{

        if(prodLine == 0)
        {
            showProductHeader(true);
        }

	var vat_hidden=document.getElementById("vathidden").value;
	var discount_hidden=document.getElementById("discounthidden").value;
   	
   	sqs_objects["product_name["+ln+"]"]=
	{
   		"form":"EditView",
   		"method":"query",
   		"modules":["AOS_Products"],
   		"group":"or",
   		"field_list":["name","id","cost","price","unit_measure","maincode"],
   		"populate_list":["product_name["+ln+"]","product_id["+ln+"]","product_cost_price["+ln+"]","product_list_price["+ln+"]","unit["+ln+"]","product_code["+ln+"]"],
   		"required_list":"product_id["+ln+"]",
   		"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
   		"order":"name",
   		"limit":"30",
   		"post_onblur_function":"getListPriceFromLookup("+ln+"); formatListPrice("+ln+");",
   		"no_match_text":"No Match"
   	};/*
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['product_name['+ln+']']={"form":"EditView","method":"query","modules":["AOS_Products"],"group":"or","field_list":["name","id","cost","price","unit_measure","maincode"],"populate_list":["product_name["+ln+"]","product_id["+ln+"]","product_cost_price["+ln+"]","product_list_price["+ln+"]","unit["+ln+"]","product_code["+ln+"]"],"required_list":["product_id["+ln+"]"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","post_onblur_function":"formatListPrice("+ln+");","no_match_text":"No Match"};
*/	//alert("product_name["+ln+"]")
	var x=document.getElementById('productLine').insertRow(-1);
	
	var a=x.insertCell(0);
        var b=x.insertCell(1);

	var ba=x.insertCell(2);
	var pcode =x.insertCell(3);
       var unit=x.insertCell(4);
	var per_unit = x.insertCell(5);
	var c=x.insertCell(6);
	var d=x.insertCell(7);
//	var e=x.insertCell(8);

	var g=x.insertCell(8);
	var nrc = x.insertCell(9);
	var lmd = x.insertCell(10);
	var f=x.insertCell(11);
	
	var date_install= x.insertCell(12);
	var s_period = x.insertCell(13);
	var r_period = x.insertCell(14);
	var service_address = x.insertCell(15);
    var s_addr_add = x.insertCell(16);
	var h= x.insertCell(17);	
		
	a.className="dataField";
	b.className="dataField";
	c.className="dataField";
	d.className="dataField";
//	e.className="dataField";
	f.className="dataField";
	g.className="dataField";
	h.className="dataField";
	unit.className="dataField";
        pcode.className = "dataField";
	nrc.className = "dataField";
	lmd.className = "dataField";
	per_unit.className = "dataField";

	date_install.className = "dataField";
	r_period.className = "dataField";
	s_period.className = "dataField";
	service_address.className = 'dataField';
	s_addr_add.className = 'dataField';

	a.innerHTML="<input type='text' name='product_qty[]' rel='lineitem_qty_rel' id='product_qty" + ln + "' size='6' maxlength='6' value='' title='' tabindex='116' onblur='getListPriceFromLookup("+ln+");Quantity_formatNumber(" + ln + ");calculateProductLine(" + ln + ");'>";
	unit.innerHTML="<input type='text' readonly='readonly' name='unit[]' id='unit" + ln + "' size='4' maxlength='10' value='' title='' tabindex='116' >";
        pcode.innerHTML ="<input type='text' name='product_code[]' readonly='readonly'  id='product_code" + ln + "' size='7' maxlength='10' value='' title='' tabindex='116' >";
	b.innerHTML="<input class='sqsEnabled' autocomplete='off' type='text'readonly='readonly' name='product_name[" + ln + "]' id='product_name" + ln +"' size='16' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_id[" + ln + "]' id='product_id" + ln + "' size='20' maxlength='50' value=''>";
        per_unit.innerHTML ='<input style="width:55px" type="text" title="" value="" maxlength="10" size="4" id="per_unit_price'+ln+'" name="per_unit_price[]" tabindex="116" readonly="readonly">';
	ba.innerHTML="<button title='" + selectButtonTitle + "' accessKey='" + selectButtonKey + "' type='button' tabindex='116' class='button' value='" + selectButtonValue + "' name='btn1' onclick='openProductPopup(" + ln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + selectButtonValue + "'></button>";
	c.innerHTML="<input type='text' name='product_list_price[" + ln + "]' id='product_list_price" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onfocus='calculateDiscount(" + ln + ");'><input type='hidden' name='product_cost_price[" + ln + "]' id='product_cost_price" + ln + "' value=''  />";
	d.innerHTML="<input type='text' name='product_discount[]' rel='product_discount_rel' id='product_discount" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onfocus='calculateDiscount(" + ln + ");' onblur='calculateDiscount(" + ln + ");'><input type='hidden' name='product_discount_amount[]' id='product_discount_amount" + ln + "' value=''  />";
d.innerHTML += "<input type='hidden' name='product_unit_price[]' id='product_unit_price" + ln + "'  value='' />";
//	e.innerHTML="<input type='text' name='product_unit_price[]' id='product_unit_price" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onfocus='calculateDiscount(" + ln + ");' onblur='calculateDiscount(" + ln + "); calculateProductLine(" + ln + ");'>";
	f.innerHTML="<input type='text' name='vat_amt[]' readonly='readonly' id='vat_amt" + ln + "' size='10' maxlength='250' value='' title='' tabindex='116' >";	
	g.innerHTML="<input type='text' name='product_total_price[]' id='product_total_price" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' readonly='readonly'>";
        nrc.innerHTML = "<input type='text' name='product_total_nrc[]' id='product_total_nrc" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onblur='calculateSubTotals()' >";
	lmd.innerHTML = "<input type='text' name='product_total_lmd[]' id='product_total_lmd" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onblur='calculateSubTotals()' >";
	h.innerHTML="<input type='hidden' name='is_service[]' value='0' /><input type='hidden' name='product_deleted[]' id='product_deleted" + ln + "' value='0'><input type='hidden' name='product_quote_id[]' value=''><button type='button' class='button' value='" + deleteButtonValue + "' tabindex='116' onclick='deleteProductLine(this)'><img src='themes/default/images/id-ff-clear.png' alt='" + deleteButtonValue + "'></button><br>";
	var date_install_val = document.getElementById('quote_desired_install').value;
	date_install.innerHTML= '<table border="0"><tbody><tr><td><input tabindex="116" type="text" name="desired_install_date[]" id="desired_install_date' + ln + '" size="10" maxlength="50" value="'+date_install_val+'" title=""></td><td> <img align="left" src="themes/Sugar5/images/jscalendar.gif" border="0" id="date_install_triggr_' + ln + '"> </td></tr></tbody></table>';

        Calendar.setup ({inputField : 'desired_install_date' + ln ,ifFormat : '%m/%d/%Y %I:%M%P',daFormat : '%m/%d/%Y %I:%M%P',button : 'date_install_triggr_' + ln ,singleClick : true,dateStr : '02/29/2012',step : 1,weekNumbers:false});

        var period_hidden = document.getElementById('periodshidden').value;
		var service_period = document.getElementById('service_period').value;
		var renewal_period = document.getElementById('renewal_period').value;

       /* r_period.innerHTML = "<select tabindex='116' name='product_service_period[]' id='product_service_period" + ln + "' >"+ period_hidden.replace("value='12"," SELECTED value='12") +"</select>";
        s_period.innerHTML ="<select tabindex='116' name='product_renewal_period[]' id='product_renewal_period" + ln + "' >"+ period_hidden.replace("value='24"," SELECTED value='24") +"</select>";*/
       s_period.innerHTML = "<input style='width:30px' tabindex='116' name='product_service_period[]' rel='product_service_period_rel'  id='product_service_period" + ln + "' value='"+service_period+"' />";	          
       r_period.innerHTML ="<input style='width:30px' tabindex='116' name='product_renewal_period[]' rel='product_renewal_period_rel'  id='product_renewal_period" + ln + "' value='"+renewal_period+"' />";
	   service_address.innerHTML = '<input type="hidden" name="service_address_id[]" id="service_address_id' + ln + '" value=""><input type="text" rel="service_address_rel" name="service_address_name[]" readonly="readonly" style="width:55px;" id="service_address_name' + ln + '" value="">';
	s_addr_add.innerHTML =  '<button title="Select [Alt+T]" accesskey="T" type="button" tabindex="116" class="button" value="Select" name="btn1" onclick="openServiceAddressesPopup(' + ln + ')"><img src="themes/default/images/id-ff-select.png" alt="Select"></button>'
   	enableQS(true);

	getservice_address_call();
	getfocus_line_items();
	
	var y=document.getElementById('productLine').insertRow(-1);

	var i=y.insertCell(0);
	var j=y.insertCell(1);
	var k=y.insertCell(2);
	var l=y.insertCell(3);
	var m=y.insertCell(4);
	var n=y.insertCell(5);
	var o=y.insertCell(6);
	
	i.align="right";
	j.colSpan="6";k.colSpan ="4";

	i.className="dataField";
	j.className="dataField";
	k.className="dataField";
	l.className="dataField";
	m.className="dataField";
	n.className="dataField";
	o.className="dataField";
	i.setAttribute('style','padding:0px;margin:0px;vertical-align:top');
	i.innerHTML=SUGAR.language.get(module, 'LBL_PRODUCT_QUOTE_DESC') +" :&nbsp;<br/>&nbsp;&nbsp;&nbsp;" +SUGAR.language.get(module, 'LBL_PRODUCT_NOTE')+" :&nbsp";
	j.innerHTML="<input type='text' name='quotes_product_name[]'  id='quotes_product_name"+ln+"' /><textarea tabindex='116' name='product_note[]' id='product_note" + ln + "' rows='2' cols='53'></textarea>&nbsp;&nbsp;";
	k.innerHTML=SUGAR.language.get(module, 'LBL_DISCOUNT_TYPE')+"&nbsp;:&nbsp;<select tabindex='116' name='discount[]' id='discount" + ln + "' onchange='calculateDiscount(" + ln + ");'>"+ discount_hidden +"</select>";
	l.innerHTML=SUGAR.language.get(module, 'LBL_SUBTOTAL_MONTHLY_TAX_TOTAL')+" %&nbsp; :&nbsp;&nbsp;<select tabindex='116' name='vat[]' id='vat" + ln + "' onchange='calculateProductLine(" + ln + ");'>"+ vat_hidden.replace("value='11","SELECTED value='11") +"</select>";

	ln++;
	prodLine++;

	document.getElementById('addProductLine').onclick = function() {
		insertProductLine(ln);
		
	}
}

/**
 * Delete product line
 */
function deleteProductLine(ln)
{
	var obj = ln.parentNode.parentNode.rowIndex;
	document.getElementById('productLine').deleteRow(obj);
	// delete product note line
	document.getElementById('productLine').deleteRow(obj);
	// calculate product line total
	calculateProductLineTotal();
	prodLine--;
	
	if(prodLine == 0)
	{
		showProductHeader(false);
	}
}

/**
 * Mark product line deleted
 */
function markProductLineDeleted(ln)
{
	// collapse product line; update deleted value
	document.getElementById('product_line' + ln).style.display = 'none';
	// collapse product note line
	document.getElementById('product_note_line' + ln).style.display = 'none';
	document.getElementById('product_deleted' + ln).value = '1';
	// calculate product line total
	calculateProductLineTotal();
	
	var total = 0;
	
	 $("input[rel=service_address_rel]").each(function() {
		  total = total + 1;
	   });
	  
	 var totalDiscount = 0.00;
	for(var i=0; i<total; i++)
     {	
	     if( (document.getElementById('product_line' + i).style.display == "") && (document.getElementById('product_note_line' + i).style.display == "") )
		 {
			var listPrice = unformatNumber(document.getElementById('product_list_price' + i).value);
			var discount = unformatNumber(document.getElementById('product_discount' + i).value);
			var dis = document.getElementById('discount' + i).value;
			
			if(dis == 'Amount')
			{
				if(discount > listPrice)
				{
					document.getElementById('product_discount' + i).value = listPrice;
					discount = listPrice;
				}
				document.getElementById('product_unit_price' + i).value = formatNumber(listPrice - discount);
			}
			else if(dis == 'Percentage')
			{
				if(discount > 100)
				{
					document.getElementById('product_discount' + i).value = 100;
					discount = 100;
				}
				discount = (discount/100) * listPrice;
				document.getElementById('product_unit_price' + i).value = formatNumber(listPrice - discount);
			}
			else
			{
				document.getElementById('product_unit_price' + i).value = document.getElementById('product_list_price' + i).value;
				document.getElementById('product_discount' + i).value = '';
				discount = 0;
			}
			    totalDiscount = totalDiscount + discount;
				
			document.getElementById('product_list_price' + i).value = formatNumber(listPrice);
			document.getElementById('product_discount_amount' + i).value = formatNumber(discount);
			document.getElementById('order_discount').value = formatNumber(totalDiscount);
		 }	
	 }  
	
	prodLine--;
	
	if(prodLine == 0)
	{
		showProductHeader(false);
	}
}

function showServiceHeader(bool)
{
	if(bool)
	{
		document.getElementById("serviceHeader").style.display="table-row";
		//document.getElementById("serviceSubTotals").style.display="table-row";
	}
	else
	{
		document.getElementById("serviceHeader").style.display="none";
		//document.getElementById("serviceSubTotals").style.display="none";
	}
}

function deleteServiceLine(ln)
{
	var t1 = document.getElementById('serviceLine').cellSpacing;
	var obj = ln.parentNode.parentNode.rowIndex;
	document.getElementById('serviceLine').deleteRow(obj);
	document.getElementById('serviceLine').deleteRow(obj);
	// calculate product line total
	calculateProductLineTotal();
	servLine--;
	
	if(servLine == 0)
	{
		showServiceHeader(false);
	}
}

function markServiceLineDeleted(ln)
{
	// collapse product line; update deleted value
	document.getElementById('service_line' + ln).style.display = 'none';
	document.getElementById('service_note_line' + ln).style.display = 'none';
	// collapse product note line
	document.getElementById('ser_deleted' + ln).value = '1';
	// calculate product line total
	
	calculateProductLineTotal();
	servLine--;
	
	if(servLine == 0)
	{
		showServiceHeader(false);
	}
}

function insertServiceLine(ln)
{

	if(servLine == 0)
	{
		showServiceHeader(true);
	}

	var vat_hidden=document.getElementById("vathidden").value;
        var discount_hidden=document.getElementById("discounthidden").value;

	var x=document.getElementById('serviceLine').insertRow(-1);

    var a=x.insertCell(0);
    var b=x.insertCell(1);
	var ba=x.insertCell(2);
	var pcode =x.insertCell(3);
    var unit=x.insertCell(4);
	var per_unit = x.insertCell(5);
	var c=x.insertCell(6);
	var d=x.insertCell(7);
	var nrc = x.insertCell(8);
	var h= x.insertCell(9);
	var i= x.insertCell(10);
	var j= x.insertCell(11);
	var k= x.insertCell(12);
	var l= x.insertCell(13);
	var m= x.insertCell(14);

	a.className="dataField";
	b.className="dataField";
	c.className="dataField";
	d.className="dataField";
	h.className="dataField";
	unit.className="dataField";
        pcode.className = "dataField";
	nrc.className = "dataField";
	per_unit.className = "dataField";


	a.innerHTML="<input type='text' name='product_qty[]' id='service_qty" + ln + "' rel='service_qty_rel' size='6' maxlength='6' value='' title='' tabindex='116' onblur='getServiceListPriceFromLookup("+ln+");'>";
        b.innerHTML="<input  type='text'readonly='readonly' name='product_name[]' id='service_name" + ln +"' size='16' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_id[]' id='service_id" + ln + "' size='20' maxlength='50' value=''>";
	c.innerHTML="<input type='text' name='product_list_price[]' id='service_list_price" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onfocus='calculateServiceLine(" + ln + ");;'><input type='hidden' name='product_cost_price[]' id='service_cost_price" + ln + "' value=''  />";
        d.innerHTML="<input type='text' name='product_discount[]' id='service_discount" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' onfocus='calculateServiceLine(" + ln + ");' onblur='calculateServiceLine(" + ln + ");'><input type='hidden' name='product_discount_amount[]' id='service_discount_amount" + ln + "' value=''  />";
        unit.innerHTML="<input type='text' readonly='readonly' name='unit[]' id='service_unit" + ln + "' size='4' maxlength='10' value='' title='' tabindex='116' >";
        pcode.innerHTML ="<input type='text' name='product_code[]' readonly='readonly'  id='service_code" + ln + "' size='5' maxlength='10' value='' title='' tabindex='116' >";
        per_unit.innerHTML ='<input type="text" title="" value="" maxlength="10" size="4" id="ser_per_unit_price'+ln+'" name="per_unit_price[]" tabindex="116" readonly="readonly">';
	ba.innerHTML="<button title='" + selectButtonTitle + "' accessKey='" + selectButtonKey + "' type='button' tabindex='116' class='button' value='" + selectButtonValue + "' name='btn1' onclick='openServicePopup(" + ln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + selectButtonValue + "'></button>";
	nrc.innerHTML = "<input type='text' name='product_total_nrc[]' id='service_total_nrc" + ln + "' size='10' maxlength='50' value='' title='' tabindex='116' >";
	h.innerHTML="<input type='hidden' name='product_unit_price[]' id='service_unit_price" + ln + "'  value='' /><input type='hidden' name='is_service[]' value='1' /><input type='hidden' name='product_deleted[]' id='ser_deleted" + ln + "' value='0'><input type='hidden' name='product_quote_id[]' value=''><button type='button' class='button' value='" + deleteButtonValue + "' tabindex='116' onclick='deleteServiceLine(this)'><img src='themes/default/images/id-ff-clear.png' alt='" + deleteButtonValue + "'></button><br>";
        i.innerHTML="&nbsp;";
        j.innerHTML="&nbsp;";
        k.innerHTML="&nbsp;";
        l.innerHTML="&nbsp;";
        m.innerHTML="&nbsp;";


       var y=document.getElementById('serviceLine').insertRow(-1);

	var i=y.insertCell(0);
	var j=y.insertCell(1);
	var k=y.insertCell(2);
	var l=y.insertCell(3);
	var m=y.insertCell(4);
	var n=y.insertCell(5);
	var o=y.insertCell(6);

	i.align="right";
	j.colSpan="6";k.colSpan ="4";

	i.className="dataField";
	j.className="dataField";
	k.className="dataField";
	l.className="dataField";
	

	i.innerHTML=SUGAR.language.get(module, 'LBL_PRODUCT_QUOTE_DESC') +" :&nbsp;<br/>&nbsp;&nbsp;&nbsp;" +SUGAR.language.get(module, 'LBL_PRODUCT_NOTE')+" :&nbsp";
	j.innerHTML="<input type='text' name='quotes_product_name[]'  id='quotes_service_name"+ln+"' /><textarea tabindex='116' name='product_note[]' id='product_note" + ln + "' rows='2' cols='53'></textarea>&nbsp;&nbsp;";
	k.innerHTML=SUGAR.language.get(module, 'LBL_DISCOUNT_TYPE')+"&nbsp;:&nbsp;<select tabindex='116' name='discount[]' id='service_discount_type" + ln + "' onchange='calculateServiceLine(" + ln + ");'>"+ discount_hidden +"</select>";
	m.innerHTML= "" //SUGAR.language.get(module, 'LBL_VAT')+" %&nbsp; :&nbsp;&nbsp;<select tabindex='116' name='vat[]' id='vat" + ln + "' onchange='calculateProductLine(" + ln + ");'>"+ vat_hidden.replace("value='11","SELECTED value='11") +"</select>";



	ln++;	servLine++;
    getfocus_service_qty();
	document.getElementById('addServiceLine').onclick = function() {
		insertServiceLine(ln);

	}
}





function calculateServiceLine(ln)
{
    
    YUI().use("node","io", function(Y){
            var ser_qty = unformatNumber(Y.one("#service_qty"+ln).get("value"));
            
            if(ser_qty ==""){
                ser_qty =1;
                Y.one("#service_qty"+ln).set("value",ser_qty);                
            }
            Y.one('#significant_digits').set('value',4);
            ser_per_unit = formatNumber(unformatNumber(Y.one("#service_list_price"+ln).get('value'))/ser_qty);
            Y.one('#significant_digits').set('value',2);
            //set unit price
            Y.one("#ser_per_unit_price"+ln).set("value",ser_per_unit);

            //check if discount is set
            var iSerdiscount = Y.one("#service_discount"+ln).get("value");
            var iContract = unformatNumber(Y.one('#service_list_price'+ln).get('value'));
             
            
            if(iContract == 0)
            {
                    Y.one("#service_discount"+ln).set("value","0.00");
                    
            }else  if(iSerdiscount !='' ){
                //type of discount to be applied
                stType = Y.one('#service_discount_type'+ln).get('value');
             

                iDiscountAmt = unformatNumber(Y.one('#service_discount'+ln).get('value'));
             
                if(stType == 'Amount'){
                    //set TOTAL NRC
                    var calculatedNRC = (iContract-iDiscountAmt);
                      Y.one('#service_discount_amount'+ln).set('value',formatNumber(iDiscountAmt));
                    if(calculatedNRC >0){
                        Y.one('#service_total_nrc'+ln).set('value',formatNumber(calculatedNRC));
			
			
                    }else {
			 Y.one('#service_discount'+ln ).set('value',formatNumber(Y.one('#service_list_price'+ln).get('value')));
                         Y.one('#service_total_nrc'+ln).set('value',"0.00");
                    }
                }else{
                
                    var calculatedNRC = (iContract- ((iContract*iDiscountAmt)/100));
                    Y.one('#service_discount_amount'+ln).set('value',unformatNumber(((iContract*iDiscountAmt)/100)));
                    if(calculatedNRC >0){
                        Y.one('#service_total_nrc'+ln).set('value',formatNumber(calculatedNRC));
                    }else {
			 Y.one('#service_discount'+ln ).set('value',formatNumber(Y.one('#service_list_price'+ln).get('value')));
                         Y.one('#service_total_nrc'+ln).set('value',"0.00");
                    }
                }
                
            }
            else
                {
                Y.one('#service_total_nrc'+ln).set('value',formatNumber(iContract));
            }
            
            
    });
     calculateSubTotals();
}

function openServiceAddressesPopup(ln)
{
 lineno=ln;

if(document.getElementById('billing_account_id').value == ''){
//alert('Please select an account.');
//return;
}
	var popupRequestData = {
		"call_back_function" : "setServiceAddressReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "service_address_id" + ln,
			"name" : "service_address_name" + ln,
				
		}
	};

	open_popup('nli_ServiceAddresses', 800, 850, '&nli_service_accounts_name_advanced='+document.getElementById('billing_account').value, true, true, popupRequestData);
   
}

function setServiceAddressReturn(popupReplyData){
fromPopupReturn = true;
	var formName = popupReplyData.form_name;
	var nameToValueArray = popupReplyData.name_to_value_array;
	
	for (var theKey in nameToValueArray)
	{
		if(theKey == 'toJSON')
		{
			/* just ignore */
		}
		else
		{
			var displayValue = nameToValueArray[theKey].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;
			/** depreciated
			 window.document.forms[form_name].elements[the_key].value = displayValue;
			 */
			//alert(theKey + " => " + displayValue);
			document.getElementById(theKey).value = displayValue;
			/** uncomment to copy value on select
			 if (theKey.search('product_list_price') != -1) {
			 	var ln = theKey.slice(18);
				document.getElementById('product_unit_price' + ln).value = displayValue;
			 }
			 */
 			
		}
	}
}
/**
 * Open product popup
 */
function openProductPopup(ln)
{ lineno=ln;
	var popupRequestData = {
		"call_back_function" : "setProductReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "product_id" + ln,
			"name" : "product_name" + ln,
			"cost" : "product_cost_price" + ln,
			"price" : "product_list_price" + ln,
			"maincode" : "product_code" + ln,
			"unit_measure"  : "unit"+ln	
		}
	};

	open_popup('AOS_Products', 800, 850, '&category_advanced[]=Voice', true, true, popupRequestData);

}

/**
 * The reply data must be a JSON array structured with the following information:
 *  1) form name to populate
 *  2) associative array of input names to values for populating the form
 */
var fromPopupReturn  = false;
function setProductReturn(popupReplyData)
{ 
	fromPopupReturn = true;
	var formName = popupReplyData.form_name;
	var nameToValueArray = popupReplyData.name_to_value_array;
	
	for (var theKey in nameToValueArray)
	{
		if(theKey == 'toJSON')
		{
			/* just ignore */
		}
		else
		{
			var displayValue = nameToValueArray[theKey].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;
			/** depreciated
			 window.document.forms[form_name].elements[the_key].value = displayValue;
			 */
			//alert(theKey + " => " + displayValue);
			document.getElementById(theKey).value = displayValue;
			/** uncomment to copy value on select
			 if (theKey.search('product_list_price') != -1) {
			 	var ln = theKey.slice(18);
				document.getElementById('product_unit_price' + ln).value = displayValue;
			 }
			 */
 			if(theKey.indexOf('product_name') != -1){
				tmpProAr = theKey.split('product_name'); //console.log(tmpProAr);
				document.getElementById('quotes_product_name'+tmpProAr[1]).value = displayValue;
			}
		}
	}
         getListPriceFromLookup(lineno);
	formatListPrice(lineno);
	/** uncomment to copy value on select
	 calculateProductLine(ln);
	 */
//	 subcode1(document.getElementById('product_id' + lineno).value);
}

/**
 * Calculate product line
 */
function calculateProductLine(ln)
{
	var productQty = document.getElementById('product_qty' + ln).value;
	var productUnitPrice = document.getElementById('product_unit_price' + ln).value;
	var vat =document.getElementById('vat' + ln).value;
	
	

	
	if (document.getElementById('product_list_price' + ln).value == '') {
		return;
	}
	else if(productQty == ''){
	document.getElementById('product_qty' + ln).value =1;
	productQty = 1;
	}
	
	productQty = unformatNumber(productQty);
	productUnitPrice = unformatNumber(productUnitPrice);
	vat = unformatNumber(vat);

//	var productTotalPrice = productQty * productUnitPrice;
	var productTotalPrice =  productUnitPrice;

	
	var totalvat=(productTotalPrice * vat) /100;
	
	//uncomment to have vat added to the totoal at the productline
	//productTotalPrice=productTotalPrice + totalvat;
	
	document.getElementById('vat_amt' + ln).value = formatNumber(totalvat);
	
	document.getElementById('product_unit_price' + ln).value = formatNumber(productUnitPrice);
	document.getElementById('product_total_price' + ln).value = formatNumber(productTotalPrice);
 document.getElementById('product_total_nrc' + ln).value = formatNumber(productTotalPrice);
 document.getElementById('product_total_lmd' + ln).value = formatNumber(productTotalPrice);
// get per unit price 
var contractPrice = unformatNumber( document.getElementById('product_list_price' + ln).value)

document.getElementById('significant_digits').value = 4;
perUnitPrice = formatNumber(contractPrice/productQty);
document.getElementById('significant_digits').value = 2;

document.getElementById('per_unit_price'+ln).value = perUnitPrice;	
	calculateProductLineTotal();calculateSubTotals()
}

/**
 * Calculate product line total
 */
function calculateProductLineTotal()
{calculateSubTotals()
	var length = document.getElementById('productLine').getElementsByTagName('tr').length;
	var row = document.getElementById('productLine').getElementsByTagName('tr');
	var subtotal = 0;
	var dis_tot = 0;
	var tax_vat = 0;
	var total_ncr =0;
	var total_lmd =0;
	
	for (i=1; i < length; i++) {
		var qty = 0;
		var price = 0;
		var deleted = 0;
		var dis_amt = 0;
		var vat_amt = 0;
		var ncr_amt =0;
		var lmd_amt =0;

		var input = row[i].getElementsByTagName('input');
		for (j=0; j < input.length; j++) {
			if (input[j].id.indexOf('product_qty') != -1) {
				qty = unformatNumber(input[j].value);
			}
			if (input[j].id.indexOf('product_unit_price') != -1) 
			{
				price = unformatNumber(input[j].value);
			}
			if (input[j].id.indexOf('product_discount_amount') != -1) 
			{
				dis_amt = unformatNumber(input[j].value);
			}
			if (input[j].id.indexOf('vat_amt') != -1) 
			{
				vat_amt = unformatNumber(input[j].value);
			}
			
			if (input[j].id.indexOf('product_total_nrc') != -1)
                        {
                                ncr_amt = unformatNumber(input[j].value);
                        }

			if (input[j].id.indexOf('product_total_lmd') != -1)
                        {
                                lmd_amt = unformatNumber(input[j].value);
                        }			
						
			// insufficient; depreciated
			if (input[j].id.indexOf('product_deleted') != -1) {
				deleted = input[j].value;
			}
			
		}
		if(ncr_amt !=0 && deleted != 1){
		    total_ncr += ncr_amt; 
		}
		if(lmd_amt !=0 && deleted != 1){
                    total_lmd += lmd_amt;
                }
		if (qty != 0 && price != 0 && deleted != 1) {
			
			subtotal += price; //* qty;
		}
		if (dis_amt != 0 && deleted != 1) {
		//	dis_tot += dis_amt * qty;
		dis_tot += dis_amt;	
		}
		if (vat_amt != 0 && deleted != 1) {
			tax_vat += vat_amt;
			
		}
		
	}
	
	var servLength = document.getElementById('serviceLine').getElementsByTagName('tr').length;
	var servRow = document.getElementById('serviceLine').getElementsByTagName('tr');
	
	for (i=1; i < servLength; i++) {
		var qty = 0;
		var price = 0;
		var deleted = 0;
		var dis_amt = 0;
		var vat_amt = 0;

		var input = servRow[i].getElementsByTagName('input');
		for (j=0; j < input.length; j++) {
			if (input[j].id.indexOf('service_unit_price') != -1) 
			{
				price = unformatNumber(input[j].value);
			}
			if (input[j].id.indexOf('ser_vat_amt') != -1) 
			{
				vat_amt = unformatNumber(input[j].value);
			}
			
						
			// insufficient; depreciated
			if (input[j].id.indexOf('ser_deleted') != -1) {
				deleted = input[j].value;
			}
			
		}
		if (price != 0 && deleted != 1) {
			
			//subtotal += price;
		}
		if (vat_amt != 0 && deleted != 1) {
			//tax_vat += vat_amt;
			
		}
		
	}
	
	
	var total_price =subtotal;
	 
	document.getElementById('subtotal_amount').value = formatNumber(subtotal);
	var taxcal=document.getElementById('subtotal_amount').value;
	
	document.getElementById('discount_amount').value = formatNumber(dis_tot);
	
	var tot_amt = subtotal - dis_tot;
	
	document.getElementById('total_amt').value = formatNumber(tot_amt);
	
	if(document.getElementById('tax_amount') != null)
	{
		document.getElementById('tax_amount').value = formatNumber(tax_vat);
	}
	
	if(document.getElementById('total_nrc') != null){
		document.getElementById('total_nrc').value =formatNumber( total_ncr);
	}
	if(document.getElementById('total_lmd') != null){

                document.getElementById('total_lmd').value = formatNumber(total_lmd);
        }



	var taxcal1= parseInt(unformatNumber(taxcal));
	calculateGrandTotal(total_price,subtotal);


}

/**
 * Calculate grand total
 */
function calculateGrandTotal(totprice,subtot)
{calculateSubTotals()
	var tax = document.getElementById('tax_amount');
	var shipping = document.getElementById('shipping_amount');
	var subtotal_tax = document.getElementById('subtotal_tax_amount');
	var subtotal = unformatNumber(document.getElementById('subtotal_amount').value);
	if(shipping != null && tax != null)
	{
		tax = unformatNumber(tax.value);
		shipping = unformatNumber(shipping.value);
		var total = subtotal + tax + shipping;
	}
	else if(shipping == null && tax != null)
	{
		tax = unformatNumber(tax.value);
		var total = subtotal + tax;
	}
	else if(shipping != null && tax == null)
	{
		shipping = unformatNumber(shipping.value);
		var total = subtotal + shipping;
	}
	else
	{
		var total = subtotal;
	}
	
	if(subtotal_tax != null && tax != null)
	{
		document.getElementById('subtotal_tax_amount').value = formatNumber(subtotal + tax);
	}
	document.getElementById('total_amount').value = formatNumber(total);
}

function formatListPrice(ln)
{
	document.getElementById('product_list_price' + ln).value = formatNumber(document.getElementById('product_list_price' + ln).value);
	document.getElementById('product_cost_price' + ln).value = formatNumber(document.getElementById('product_cost_price' + ln).value);
	
	//document.getElementById('product_code' + ln).value = document.getElementById('product_code' + ln).value;	
	calculateDiscount(ln);
}

function unformatNumber(str)
{
	var grp_sep = String(document.getElementById('grp_seperator').value);
	var dec_sep = String(document.getElementById('dec_seperator').value);
	
	str = String(str);
	
	str = str.replace(grp_sep, '');
	str = str.replace(grp_sep, '');
	str = str.replace(grp_sep, '');
	str = str.replace(grp_sep, '');
	
	str = str.replace(dec_sep, '.');
	
	num = Number(str);
	
	return num;
}

function formatNumber(str)
{
	var sig_dig = Number(document.getElementById('significant_digits').value);
	var grp_sep = String(document.getElementById('grp_seperator').value);
	var dec_sep = String(document.getElementById('dec_seperator').value);
	
	num = Number(str);
	if(sig_dig == 2){
		str = formatCurrency(num);
	}
	else{
		str =	num.toFixed(sig_dig);
	}
	str = str.replace(/,/, '{,}').replace(/\./, '{.}');
	str = str.replace(/{,}/, grp_sep).replace(/{.}/, dec_sep);
	
	return str;
}

function Quantity_formatNumber(ln)
{
	var dec_sep = String(document.getElementById('dec_seperator').value);
	var qty=unformatNumber(document.getElementById('product_qty' + ln).value);
	if(qty == null || qty == 0){qty = 1;}

	var str = formatNumber(qty);
	str = str.replace(/0*$/,'');
	str = str.replace(dec_sep,'~');
	str = str.replace(/~$/,'');
	str = str.replace('~',dec_sep);
	document.getElementById('product_qty' + ln).value=str;
}


function formatCurrency(strValue)
{
	strValue = strValue.toString().replace(/\$|\,/g,'');
	dblValue = parseFloat(strValue);

	blnSign = (dblValue == (dblValue = Math.abs(dblValue)));
	dblValue = Math.floor(dblValue*100+0.50000000001);
	intCents = dblValue%100;
	strCents = intCents.toString();
	dblValue = Math.floor(dblValue/100).toString();
	if(intCents<10)
		strCents = "0" + strCents;
	for (var i = 0; i < Math.floor((dblValue.length-(1+i))/3); i++)
		dblValue = dblValue.substring(0,dblValue.length-(4*i+3))+','+
		dblValue.substring(dblValue.length-(4*i+3));
	return (((blnSign)?'':'-') + dblValue + '.' + strCents);
}

function imposeMaxLength(obj)
{
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

/*function getListPriceFromLookup(ln){
YUI().use('node','io',function(Y){

var url = 'index.php?module=AOS_Quotes&action=get_pricelookup&to_pdf=1&product_id=';
var cfg = {method:"GET",
	   on:{
		complete:function(id,o){
			alert(o.responseText);
		},
		end:function(){
		}
			
		}
	};

Y.io(url,cfg)
});
}*/
function set_opp_return(popup_reply_data,filter)
{
filter =/\S/;

var form_name = popup_reply_data.form_name;
	var name_to_value_array = popup_reply_data.name_to_value_array;
	for (var the_key in name_to_value_array)
	{
		if(the_key == 'toJSON')
		{
			/* just ignore */
		}
		else if(the_key.match(filter))
		{
			var displayValue=name_to_value_array[the_key].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;
			// begin andopes change: support for enum fields (SELECT)
			if(window.document.forms[form_name] && window.document.forms[form_name].elements[the_key]) {
				if(window.document.forms[form_name].elements[the_key].tagName == 'SELECT') {
					var selectField = window.document.forms[form_name].elements[the_key];
					for(var i = 0; i < selectField.options.length; i++) {
						if(selectField.options[i].text == displayValue) {
							selectField.options[i].selected = true;
                            SUGAR.util.callOnChangeListers(selectField);
							break;
						}
					}
				} else {
	//			alert(displayValue);
if(the_key == 'opportunity'){
window.document.forms[form_name].elements['name'].value = displayValue;
}
					window.document.forms[form_name].elements[the_key].value = displayValue;
                    SUGAR.util.callOnChangeListers(window.document.forms[form_name].elements[the_key]);
				}
			}
			// end andopes change: support for enum fields (SELECT)
		}
	}
}



//Ashutosh functions

/**
Open service popup
*/
function openServicePopup(ln){
lineno=ln;
	var popupRequestData = {
		"call_back_function" : "setServiceReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "service_id" + ln,
			"name" : "service_name" + ln,
			"cost" : "service_cost_price" + ln,
			"price" : "service_list_price" + ln,
			"maincode" : "service_code" + ln,
			"unit_measure"  : "service_unit"+ln
		}
	};

	open_popup('AOS_Products', 800, 850, '&category_advanced[]=Voice', true, true, popupRequestData);
}
/**
set return pop up for service items
*/
function setServiceReturn(popupReplyData)
{
    fromPopupReturn = true;
    var formName = popupReplyData.form_name;
    var nameToValueArray = popupReplyData.name_to_value_array;

    for (var theKey in nameToValueArray)
	{
		if(theKey == 'toJSON')
		{
            	/* just ignore */
		}
		else
		{
			var displayValue = nameToValueArray[theKey].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;

			  //alert(theKey + " => " + displayValue);
			document.getElementById(theKey).value = displayValue;
                        if(theKey.indexOf('service_name') != -1){
				tmpProAr = theKey.split('service_name'); 
				document.getElementById('quotes_service_name'+tmpProAr[1]).value = displayValue;
			}

		}
	}
        getServiceListPriceFromLookup(lineno)
	//formatListPrice(lineno);
	/** uncomment to copy value on select
          
	 calculateProductLine(ln);
	 */
         calculateServiceLine(lineno)

}

function getServiceListPriceFromLookup(ln){

YUI().use('node','io',function(Y){
qunty =unformatNumber( Y.one("#service_qty"+ln).get('value'));
prodid = Y.one("#service_id"+ln).get('value');
var url = 'index.php?module=AOS_Quotes&action=get_pricelookup&to_pdf=1&product_id='+prodid+'&quantity='+qunty;

var cfg = {method:"GET",
           on:{ start:function(){
			//alert('wait')
tt = Y.one('#service_qty'+ln).get('parentNode');

if(Y.one('#sqty_loader'+ln)){
 Y.one('#sqty_loader'+ln).setStyle('display','');
}else{
tt.append("<img id='sqty_loader"+ln+"' src='themes/default/images/img_loading.gif' align='left' style='left:-18px;top:-22px;position:relative' />");
}
		},
                complete:function(id,o){
                 resVal = JSON.parse(o.responseText);
                 if(resVal.status== 'sucess'){
                   document.getElementById('service_list_price'+ln).value = formatNumber(resVal.price);
		           document.getElementById('service_unit_price'+ln).value = formatNumber(resVal.per_unit_price);
                   
                   calculateServiceLine(ln);
                   //calculateDiscount(ln);
                 }else{
                 //what to do
                }
                },
                end:function(){

                 Y.one('#sqty_loader'+ln).setStyle('display','none');
                }

                }
        };
    Y.io(url,cfg)
});
}
function calculateSubTotals(){

   //get all line items discount and nrc,lmd,mrc and set for products/services
  YUI().use("node","node-base", function(Y){
		subTotalMrc = 0.00;
		subTotalNrc = 0.00;
		subTotalLmd = 0.00;
		subTotalProDiscount=0.00;
		subTotalSerDiscount=0.00;
	 	subServiceTotalNrc= 0.00;
		subTotalContractValue = 0.00;
		subTotalTax =0.00;

		Y.all("input[id^=product_total_price]").each(function(elm){
		
		 //check if this line is deleted 
		 idIsdeleted = elm.get('id').replace('product_total_price','product_deleted')
		 
		 if(Y.one('#'+idIsdeleted).get('value') != 1){
		 	subTotalMrc += unformatNumber(elm.get('value'));
		        
			nrcId = elm.get('id').replace('product_total_price','product_total_nrc');
			lmdId = elm.get('id').replace('product_total_price','product_total_lmd');
			proDisId = elm.get('id').replace('product_total_price','product_discount');
			proDisAmtId = elm.get('id').replace('product_total_price','product_discount_amount');
			disTypeId = elm.get('id').replace('product_total_price','discount');
			contractValId = elm.get('id').replace('product_total_price','product_list_price');
			tAxValId =  elm.get('id').replace('product_total_price','vat_amt');

		 	subTotalLmd += unformatNumber(Y.one('#'+lmdId).get('value'));
		 	subTotalNrc += unformatNumber(Y.one('#'+nrcId).get('value'));
			subTotalContractValue += unformatNumber(Y.one('#'+contractValId).get('value'));
                        subTotalTax += unformatNumber(Y.one('#'+tAxValId).get('value'));
			if(Y.one('#'+disTypeId).get('value') == 'Amount'){
				subTotalProDiscount += unformatNumber(Y.one('#'+proDisId).get('value'));
			}else{
				subTotalProDiscount += unformatNumber(Y.one('#'+proDisAmtId).get('value'));
			}

			
		 }
		});

                Y.one('#product_subtotal_mrc').set('value',formatNumber(subTotalMrc));
		
		if(Y.one('#product_subtotal_list_price') != null)
                Y.one('#product_subtotal_list_price').set('value',formatNumber(subTotalContractValue));

		if(Y.one('#product_subtotal_nrc') != null)
                Y.one('#product_subtotal_nrc').set('value',formatNumber(subTotalNrc));	
		
		if(Y.one('#product_subtotal_lmd') != null)
                Y.one('#product_subtotal_lmd').set('value',formatNumber(subTotalLmd));

		if(Y.one('#product_subtotal_discount') != null)
                Y.one('#product_subtotal_discount').set('value',formatNumber(subTotalProDiscount));		
		
		iTotalDiscount = unformatNumber(Y.one('#order_discount').get('value'))+subTotalProDiscount;
                Y.one('#total_discount').set('value',formatNumber(iTotalDiscount));

		if(Y.one('#product_subtotal_tax') != null)
                Y.one('#product_subtotal_tax').set('value',formatNumber(subTotalTax));	
		

		Y.all("input[id^=service_total_nrc]").each(function(elm){
		  
		 //check if this line is deleted 
		 isDeleted = elm.get('id').replace('service_total_nrc','ser_deleted')
		  if(Y.one('#'+isDeleted).get('value') != 1){
		    subServiceTotalNrc += unformatNumber(elm.get('value'));
		    
		    serDisid = elm.get('id').replace('service_total_nrc','service_discount_amount')
		
		    subTotalSerDiscount += unformatNumber(Y.one('#'+serDisid).get('value')); 
		   }
			
		 
		});
		if(Y.one('#service_subtotal_nrc') != null)
                Y.one('#service_subtotal_nrc').set('value',formatNumber(subServiceTotalNrc));
		
		if(Y.one('#service_subtotal_discount'))
		Y.one('#service_subtotal_discount').set('value',formatNumber(subTotalSerDiscount))	
	
	});

calculateServiceGrandTotals();

}
function calculateServiceGrandTotals(){
	
	YUI().use("node","node-base", function(Y){
		Y.one("#total_nrc").set('value',Y.one("#product_subtotal_nrc").get('value'));
		Y.one("#total_nrc_from_onetime_service").set('value',Y.one("#service_subtotal_nrc").get('value'));
		subTotalNrcDiscount = unformatNumber(Y.one("#service_subtotal_discount").get('value'));
		if(unformatNumber(Y.one("#order_nrc_discont").get('value'))  !=''){
		  totalNRCDiscount = subTotalNrcDiscount+unformatNumber(Y.one("#order_nrc_discont").get('value'))
		}else{
		 totalNRCDiscount = subTotalNrcDiscount;
		}
		Y.one("#total_nrc_discont").set('value',formatNumber(totalNRCDiscount));
		subTotal = formatNumber((unformatNumber(Y.one("#service_subtotal_nrc").get('value'))+unformatNumber(Y.one("#product_subtotal_nrc").get('value')))
			   -(unformatNumber(Y.one("#total_nrc_discont").get('value')))	);	
		//Y.one("#order_nrc_discont").set('value',formatNumber(totalNRCDiscount));
		//Y.one("#order_nrc_discont").set('value',0.00);
		Y.one("#total_lmd").set('value',subTotal);
		grndTotal = unformatNumber(subTotal) + unformatNumber(Y.one("#shipping_amount").get('value'));
		Y.one("#grand_total_nrc").set('value',formatNumber(grndTotal));
		
	});
}


function getservice_address_call() {
	var serviceaddress_c = document.getElementById("serviceaddress_c").value;
	if(serviceaddress_c != '') {
	   $("input[rel=service_address_rel]").each(function() {
		   if($(this).val() == "") {
		      $(this).val(serviceaddress_c);
		   }
	   });
	}

    var renewal_period = document.getElementById("renewal_period").value;
	if(renewal_period != '') {
	   $("input[rel=product_renewal_period_rel]").each(function() {
		   if($(this).val() == "") {
		      $(this).val(renewal_period);
		   }
	   });
	}

	var service_period = document.getElementById("service_period").value;
	if(service_period != '') {
	   $("input[rel=product_service_period_rel]").each(function() {
		   if($(this).val() == "") {
		      $(this).val(service_period);
		   }
	   });
	}
	
    $("#btn_serviceaddress_c").attr("onclick","open_popup('nli_ServiceAddresses',  600,  400,'&nli_service_accounts_name_advanced="+$("#billing_account").val()+"',  true,  false,  {'call_back_function':'set_return','form_name':'EditView','field_to_name_array':{'id':'nli_serviceaddresses_id_c','name':'serviceaddress_c'}},  'single',  true )");
    setTimeout(function(){ getservice_address_call(); },1000);
}

function setservice_address_clear(obj) {
	   SUGAR.clearRelateField(obj.form, 'serviceaddress_c', 'nli_serviceaddresses_id_c');
	   $("input[rel=service_address_rel]").each(function() {
		  $(this).val('');
	   });
}

function getfocus_line_items() {
	   $("input[rel=lineitem_qty_rel]").each(function() {
		  $(this).focus();
	   });
}

function getfocus_service_qty() {
	   $("input[rel=service_qty_rel]").each(function() {
		  $(this).focus();
	   });
}

$(document).ready(function() { 
       $("#LBL_EDITVIEW_PANEL3").hide();
	   $("#total_lmd").attr('readonly',"readonly");
	   var editcase = document.getElementById("editcase").value;
	   if(editcase == "" ) {
		   var quote_cover_letter_extra_c =  $("#quote_cover_letter_extra_c").html();
		   var quote_introduction_extra_c =  $("#quote_introduction_extra_c").html();
		   var quote_final_notes_extra_c =  $("#quote_final_notes_extra_c").html();
		   var quote_important_details_extr_c =  $("#quote_important_details_extr_c").html();
		   $("#quote_cover_letter").val(quote_cover_letter_extra_c);	   
		   $("#quote_introduction").val(quote_introduction_extra_c);
		   $("#quote_final_notes").val(quote_final_notes_extra_c);
		   $("#quote_important_details").val(quote_important_details_extr_c);		   
       }
   var html = $("form table").eq(0).html();
   $("form#EditView").append("<table width='100%' id='footerSaveMenu'>"+html+"</table>");
   $("#footerSaveMenu input[type=hidden]").remove();
   timecall(); 
   
   $("#renewal_period").blur(function(){
		var renewal_period = document.getElementById("renewal_period").value;
		if(service_period != '') {
		   $("input[rel=product_renewal_period_rel]").each(function() {
				  $(this).val(renewal_period);
		   });
	   }
   }); 

   $("#service_period").blur(function(){
		var service_period = document.getElementById("service_period").value;
		if(service_period != '') {
		   $("input[rel=product_service_period_rel]").each(function() {
				  $(this).val(service_period);
		   });
	   }
   });  
   
  if( $('#editcase').val() == '')
   {
       $("#order_discount").val("0.00");
	   $("#name").val(opportunity_nameSubPanel);
   }
   if( $('#editcase').val() == '')
   {
       $("#order_nrc_discont").val("0.00");
   }
   $("#shipping_amount").attr('tabindex', '130'); 
   
});

function check_custom_data() { 
   if(check_form('EditView'))SUGAR.ajaxUI.submitForm(this.form);return false;
}


function timecall(quote_cover_letter_extra_c) {
    var df = document.getElementById('df_id').value;  
	tinyMCE.init({
			theme : "advanced",
			theme_advanced_toolbar_align : "left",
			mode: "exact",
				elements : "quote_cover_letter,quote_introduction,quote_final_notes,quote_important_details",
				theme_advanced_toolbar_location : "top",
				theme_advanced_buttons1: "code,separator,bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,undo,redo,separator,forecolor,backcolor,separator,styleprops,styleselect,formatselect,fontselect,fontsizeselect,separator,insertdate",
				theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
				plugins : "advhr,insertdatetime,table,paste,searchreplace,directionality,style",
				width: "70%",
				height: "320px",
				inline_styles : true,
				directionality : "ltr",
				entity_encoding: "raw",
				cleanup_on_startup : true,
				strict_loading_mode : true,
				convert_urls : false,
				remove_redundant_brs : true,
				plugin_insertdate_dateFormat : "{DATE "+df+"}",
			});
}