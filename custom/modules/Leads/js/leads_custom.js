
			$(document).ready(function() {   
                var primary_address_type_html = $("td#addresstype_c_label").closest("tr").html();
                $("td#addresstype_c_label").closest("tr").remove();
                $("#PRIMARY_address_fieldset table").prepend("<tr>"+primary_address_type_html+"</tr>");  
				
				var other_address_type_html = $("td#addresstypeother_c_label").closest("tr").html();
                $("td#addresstypeother_c_label").closest("tr").remove();
                $("#ALT_address_fieldset table").prepend("<tr>"+other_address_type_html+"</tr>"); 
			}); 