
			$(document).ready(function() {   
                var billing_address_type_html = $("td#address_type_billing_c_label").closest("tr").html();
                $("td#address_type_billing_c_label").closest("tr").remove();
                $("#BILLING_address_fieldset table").prepend("<tr>"+billing_address_type_html+"</tr>");  
				
				var shipping_address_type_html = $("td#address_type_shipping_c_label").closest("tr").html();
                $("td#address_type_shipping_c_label").closest("tr").remove();
                $("#SHIPPING_address_fieldset table").prepend("<tr>"+shipping_address_type_html+"</tr>"); 
			}); 