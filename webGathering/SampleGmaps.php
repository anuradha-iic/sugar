<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Slingshot Example</title>
</head>

<body>

    <?php require_once 'config.php'; require_once 'EasyGoogleMap.class.php'; require_once 'includePHPFun.php';   
if( isset($_REQUEST['counter']) and $_REQUEST['counter'] != '' )
{
    $counter = $_REQUEST['counter'];
}
else
{
    $counter = 0;
}
if( isset($_REQUEST['address']) and $_REQUEST['address'] != '' )
{
    $address = urldecode($_REQUEST['address']); 
}
else
{
    $address = "Washington DC USA";
}
if( isset($_REQUEST['zipcode']) and $_REQUEST['zipcode'] != '' )
{
    $zipcode = $_REQUEST['zipcode']; 
}
else
{
    $zipcode = "";
}
$validcheck = validateUSAZip($zipcode);

$results = fetchDetailsofAddress($address);
$parseValidateResult = parseAndValidateAddressForUSA($results);

if($parseValidateResult == "Valid") 
{    
  if($validcheck == 1 or $zipcode == "" or $address == "Washington DC USA") { 
    $gm = new EasyGoogleMap($googleAPIKey); 
    $gm->SetMarkerIconStyle(); 
    $gm->SetMapZoom(16);
    $gm->SetAddress($address);
    $gm->SetInfoWindowText($address); 
    echo $gm->GmapsKey();  
?> 
    <div id="map<?php echo $counter; ?>" style="width: 407px; height: 300px;" height="300" width="407"></div>  
    <?php echo $gm->InitJs($counter); ?>
    <?php echo $gm->GetSideClick($counter); ?>
    <?php echo $gm->UnloadMap(); ?>  
<?php
    }
    else
    {
        echo "Please enter the Service address of USA country only....";
    }
}
else
{
    echo "It is an invalid Address. Please enter the correct one...";
}
?>

    </body>
</html>