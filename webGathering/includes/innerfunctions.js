function deleteCont(counter, record, filename, hiddenID)
{
    var delID = document.getElementById(hiddenID+counter).value;
	
	var agree=confirm("Are you sure you wish to Delete?");
	if (agree) {
		window.location = 'delete_contacts.php?delid='+escape(delID)+"&record="+escape(record)+"&filename="+escape(filename);
	}
	else {
		return false ;
	} 
}

function deleteSLA(counter, record, filename, hiddenID)
{
    var delID = document.getElementById(hiddenID+counter).value;
	
	var agree=confirm("Are you sure you wish to Delete?");
	if (agree) {
		window.location = 'delete_serviceAddresses.php?delid='+escape(delID)+"&record="+escape(record)+"&filename="+escape(filename);
	}
	else {
		return false ;
	} 
}

function checkform(counter, hiddenID, record, filename)
{
    var recordEditCont  = document.getElementById(hiddenID+counter).value;
	var salutation      = document.getElementById('updateMultiplesalutation'+counter).value;
	var contacttype     = document.getElementById('updateMultiplecontacttype_c'+counter).value;
	var first_name      = document.getElementById('updateMultiplefirst_name'+counter).value;
	var last_name       = document.getElementById('updateMultiplelast_name'+counter).value;
	var phone_work      = document.getElementById('updateMultiplephone_work'+counter).value;
	var title           = document.getElementById('updateMultipletitle'+counter).value;
	var phone_mobile    = document.getElementById('updateMultiplephone_mobile'+counter).value;
	var department      = document.getElementById('updateMultipledepartment'+counter).value;
	var phone_fax       = document.getElementById('updateMultiplephone_fax'+counter).value;
	var data            = salutation+';'+contacttype+';'+first_name+';'+last_name+';'+phone_work+';'+title+';'+phone_mobile+';'+department+';'+phone_fax+';';
	
	var returnRecord = record;
	
	window.location = 'edit_contacts.php?recordEditCont='+escape(recordEditCont)+"&record="+escape(returnRecord)+"&filename="+escape(filename)+"&data="+escape(data);
    return true; 
}

function checkEditTechform(counter, hiddenID, record, filename)
{
    var recordEditCont  = document.getElementById(hiddenID+counter).value;
	var salutation      = document.getElementById('updateMultipleTechnicalsalutation'+counter).value;
	var contacttype     = document.getElementById('updateMultipleTechnicalcontacttype_c'+counter).value;
	var first_name      = document.getElementById('updateMultipleTechnicalfirst_name'+counter).value;
	var last_name       = document.getElementById('updateMultipleTechnicallast_name'+counter).value;
	var phone_work      = document.getElementById('updateMultipleTechnicalphone_work'+counter).value;
	var title           = document.getElementById('updateMultipleTechnicaltitle'+counter).value;
	var phone_mobile    = document.getElementById('updateMultipleTechnicalphone_mobile'+counter).value;
	var department      = document.getElementById('updateMultipleTechnicaldepartment'+counter).value;
	var phone_fax       = document.getElementById('updateMultipleTechnicalphone_fax'+counter).value;
	var data            = salutation+';'+contacttype+';'+first_name+';'+last_name+';'+phone_work+';'+title+';'+phone_mobile+';'+department+';'+phone_fax+';';
	
	var returnRecord = record;
	
	window.location = 'edit_contacts.php?recordEditCont='+escape(recordEditCont)+"&record="+escape(returnRecord)+"&filename="+escape(filename)+"&data="+escape(data);
    return true; 
}

function checkEditSLAform(counter, hiddenID, record, filename)
{
    var recordEditCont  = document.getElementById(hiddenID+counter).value;
	var ServiceName      = document.getElementById('updateMultipleSLAservice_name'+counter).value;
	var SAddressStreet     = document.getElementById('updateMultipleSLAservice_address_street'+counter).value;
	var SAddressCity      = document.getElementById('updateMultipleSLAservice_address_city'+counter).value;
	var SAddressState       = document.getElementById('updateMultipleSLAservice_address_state'+counter).value;
	var SAddressPostalCode      = document.getElementById('updateMultipleSLAservice_address_postal_code'+counter).value;
	var SAddressIsPrivate           = document.getElementById('updateMultipleSLAis_private_residence'+counter).value;
	var SAddressCountry    = document.getElementById('updateMultipleSLAservice_address_country'+counter).value;
	var SAddressFull      = document.getElementById('updateMultipleSLAservice_address'+counter).value; 
	var data            = ServiceName+';'+SAddressStreet+';'+SAddressCity+';'+SAddressState+';'+SAddressPostalCode+';'+SAddressIsPrivate+';'+SAddressCountry+';'+SAddressFull;
	
	var returnRecord = record;
	
	window.location = 'edit_serviceAddresses.php?recordEditCont='+escape(recordEditCont)+"&record="+escape(returnRecord)+"&filename="+escape(filename)+"&data="+escape(data);
    return true; 
}