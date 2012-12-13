function filloutwithprimary(obj)
 {
       if(obj.checked == true)
       {
            $("#altaddress").val('');
			clearResults2();
            $("#wrapper2").hide();
            primary_addressVal = $("#address").val();
            $("#altaddress").val(primary_addressVal); 
       }
       else
       {
            $("#wrapper2").show();
			$("#altaddress").val(''); 
			clearResults2(); 
       }
 } 
 
 function check4Primary(obj)
 { 
       if(obj.value != "PrimaryBilling")
	   {
	       obj.value = "PrimaryBilling";
	   }
 } 
 function check4Technical(obj)
 { 
       if(obj.value != "PrimaryTechnical")
	   {
	       obj.value = "PrimaryTechnical";
	   }
 }
 
 function check4DynamicPrimary(obj)
 { 
       if(obj.value != "AdditionalBilling")
	   {
	       obj.value = "AdditionalBilling";
	   }
 }
 
 function check4DynamicTechnical(obj)
 { 
       if(obj.value != "AdditionalTechnical")
	   {
	       obj.value = "AdditionalTechnical";
	   }
 }
 
 function checkform(formobj)
 {
       if(formobj.first_name.value == "")
	   {
	      alert("Required: Please enter the First Name.....");
		  formobj.first_name.focus();
		  return false;
	   }
	   else if(formobj.last_name.value == "")
	   {
	      alert("Required: Please enter the Last Name.....");
		  formobj.last_name.focus();
		  return false;
	   }
	   else if(formobj.phone_work.value == "")
	   {
	      alert("Required: Please enter the Office Phone.....");
		  formobj.phone_work.focus();
		  return false;
	   }
	   else
	   {
	        
	   }
	   	   
	   if(formobj.service_name.value == "")
	   {
	      alert("Required: Please enter the Service Name.....");
		  formobj.service_name.focus();
		  return false;
	   }
	   else if(formobj.service_address_street.value == "")
	   {
	      alert("Required: Please enter the Service Address Street.....");
		  formobj.service_address_street.focus();
		  return false;
	   }
	   else if(formobj.service_address_city.value == "")
	   {
	      alert("Required: Please enter the Service Address City.....");
		  formobj.service_address_city.focus();
		  return false;
	   }
	   else if(formobj.service_address_state.value == "")
	   {
	      alert("Required: Please enter the Service Address State.....");
		  formobj.service_address_state.focus();
		  return false;
	   }
	   else if(formobj.service_address_postal_code.value == "")
	   {
	      alert("Required: Please enter the Service Address Postal Code.....");
		  formobj.service_address_postal_code.focus();
		  return false;
	   }
	   else if(formobj.service_address_country.value == "")
	   {
	      alert("Required: Please enter the Service Address Country.....");
		  formobj.service_address_country.focus();
		  return false;
	   } 
	   else
	   {
	        
	   } 
	  // alert(totalBilling+' '+totalTechnical); return false; 
			  document.getElementById('totalBillingContacts').value = totalBilling; 
			  document.getElementById('totalTechnicalContacts').value = totalTechnical;
                          document.getElementById('totalServiceAddressLocations').value = MulServicetotalBilling;
			  
		document.getElementById('TotalfieldLastValofTechnicalContacts').value = "";
		for(var i=1; i<=NumOfRow2; i++)
		{
			if(document.getElementById('technicalbtn'+i) != null)
			 { 
				   document.getElementById('TotalfieldLastValofTechnicalContacts').value += i + ", "; 
			 }  
		}	
		
		document.getElementById('TotalfieldLastValofBillingContacts').value = "";
		for(var i=1; i<=NumOfRow; i++)
		{
			if(document.getElementById('btn'+i) != null)
			 { 
				   document.getElementById('TotalfieldLastValofBillingContacts').value += i + ", "; 
			 }  
		}  
                
                document.getElementById('TotalfieldLastValofServiceAddress').value = "";
		for(var i=1; i<=MulServiceNumOfRow; i++)
		{
			if(document.getElementById('MulServicebtn'+i) != null)
			 { 
				   document.getElementById('TotalfieldLastValofServiceAddress').value += i + ", "; 
			 }  
		}
		
		filloutServiceAddress('service_address'); 	  
			  return true;
 }  
 
function validateEmail(elementValue){
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(elementValue);
 }