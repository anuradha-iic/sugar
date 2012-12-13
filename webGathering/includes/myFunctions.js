function countLines(addressID,maxlength) 
{
       // var area = document.getElementById("texta")
        // trim trailing return char if exists
		var areavalue = document.getElementById(addressID).value;
        var text = areavalue.replace(/\s+$/g, "")
        var split = text.split("\n")
        if (split.length > maxlength) 
		{
            split = split.slice(0, maxlength);
            document.getElementById(addressID).value = split.join('\n');
            alert("You can not enter more than "+maxlength.toString()+" lines");
			return false;
        }
		else
		{
		    return true;
		}        
}

function filloutServiceAddress(addressID)
{
    service_address_street      = document.getElementById('service_address_street').value;
	service_address_city        = document.getElementById('service_address_city').value;
	service_address_state       = document.getElementById('service_address_state').value;
	service_address_postal_code = document.getElementById('service_address_postal_code').value;
	service_address_country     = document.getElementById('service_address_country').value;
	
	document.getElementById(addressID).value = service_address_street+' '+service_address_city+' '+service_address_state+' '+service_address_postal_code+' '+service_address_country;
}

function checkandshow(addressID)
{
    // var res = countLines(addressID,3);   
	filloutServiceAddress(addressID); 
	 validate();  
}
 
  var geocoder, map, marker;
  var defaultLatLng = new google.maps.LatLng(30,0); 
 
 function checkforUSAaddress(addArray)
 {
      var countA = addArray.length;
      var result;
         for(var i=0; i<countA; i++)
          {
               if(addArray[i].short_name == 'US')
                {
                    result = "Valid";
                    break;
                }
                else 
                {
                    result = "InValid"; 
                }
          }
       return result;
 }
 
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var mapOptions = {
      zoom: 0,
      center: defaultLatLng,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    map = new google.maps.Map(
      document.getElementById("map_canvas"),
      mapOptions
    );
    marker = new google.maps.Marker();
	
	clearResults();
    var address = document.getElementById('service_address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      switch(status) {
        case google.maps.GeocoderStatus.OK:
		  document.getElementById('addresserrormsg').style.display = 'none';
          document.getElementById('valid').value = 'YES';
          document.getElementById('type').value = results[0].types[0];
          document.getElementById('result').value = results[0].formatted_address;
          var addressArray = results[0].address_components;
          var checkResult = checkforUSAaddress(addressArray);
           if(checkResult == "Valid")
            {
                mapAddress(results[0]);
            }
           else
            {
                alert('It is an invalid other Address and not from United States. Please enter the correct one...'); 
            }
          break;
        case google.maps.GeocoderStatus.ZERO_RESULTS:
          document.getElementById('valid').value = 'NO';
		  //document.getElementById('addresserrormsg').style.display = '';  
		  //document.getElementById('addresserrormsg').innerHTML = 'It is an invalid Address. Please enter the correct one...';
		  alert('It is an invalid Address. Please enter the correct one...');
          break;
        default:
          alert("An error occured while validating this address");
		  document.getElementById('addresserrormsg').style.display = 'none';
      }
    });
  }
 
  function validate() {
    clearResults();
    var address = document.getElementById('service_address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      switch(status) {
        case google.maps.GeocoderStatus.OK:
		  document.getElementById('addresserrormsg').style.display = 'none';
          document.getElementById('valid').value = 'YES';
          document.getElementById('type').value = results[0].types[0];
          document.getElementById('result').value = results[0].formatted_address;
          var addressArray = results[0].address_components;
          var checkResult = checkforUSAaddress(addressArray);
           if(checkResult == "Valid")
            {
                mapAddress(results[0]);
            }
           else
            {
                alert('It is an invalid other Address and not from United States. Please enter the correct one...'); 
            } 
          break;
        case google.maps.GeocoderStatus.ZERO_RESULTS:
          document.getElementById('valid').value = 'NO';
		  //document.getElementById('addresserrormsg').style.display = '';  
		  //document.getElementById('addresserrormsg').innerHTML = 'It is an invalid Address. Please enter the correct one...';
		  alert('It is an invalid Address. Please enter the correct one...');
          break;
        default:
          alert("An error occured while validating this address");
		  document.getElementById('addresserrormsg').style.display = 'none';
      }
    });
  }
 
  function clearResults() {
    document.getElementById('valid').value = '';
    document.getElementById('type').value = '';
    document.getElementById('result').value = '';
    map.setCenter(defaultLatLng);
    map.setZoom(0);
    marker.setMap(null);
  }
 
  function mapAddress(result) {
    marker.setPosition(result.geometry.location);
    marker.setMap(map);
    map.fitBounds(result.geometry.viewport);
  } 
  
  
  function setiframeAddress(counter)
  { 
        var service_address_street      = document.getElementById('Multipleservice_address_street'+counter).value;
	var service_address_city        = document.getElementById('Multipleservice_address_city'+counter).value;
	var service_address_state       = document.getElementById('Multipleservice_address_state'+counter).value;
	var service_address_postal_code = document.getElementById('Multipleservice_address_postal_code'+counter).value;
	var service_address_country     = document.getElementById('Multipleservice_address_country'+counter).value;
        var address = escape(service_address_street+' '+service_address_city+' '+service_address_state+' '+service_address_postal_code+' '+service_address_country);
        if(service_address_street == "" && service_address_city == "" && service_address_state == "" && service_address_postal_code == "")
            {
                address = 'Washington DC USA';
            } 
        var iframeURL = document.getElementById('dynmaiciFrameID'+counter);
        var iframeURLSrc = iframeURL.src;
          iframeURL.src = iframeURLSrc+"&address="+address+"&zipcode="+service_address_postal_code; 
  }
  
  function cancelPrimaryContact(txtBoxID)
  {
       document.getElementById(txtBoxID).value = "";
  }
  
  function openpopupForAddPrimaryContacts(txtBoxID, ID)
  {
     var myWindow = window.open(siteURLJS+'/popupAddPrimaryContacts.php?IDVal='+txtBoxID+"&ID="+ID,txtBoxID,'width=950,height=600,location=no,menubar=no,titlebar = no,status=no,toolbar=no,resizable=yes,scrollbars=yes');  
  }
   