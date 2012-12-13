<?php  // definitions of all the PHP functions used in the site.......
// Validate Zip Postal Code of USA...
function validateUSAZip($zip_code)
{
  if(preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zip_code))
    return true;
  else
    return false;
}

function fetchDetailsofAddress($address)
{
    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=true";
    // create a new cURL resource
         $ch = curl_init(); 
    // set URL and other appropriate options
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_HEADER, false); 
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    // grab URL and pass it to the browser
         $data = curl_exec($ch); 
    // close cURL resource, and free up system resources
         curl_close($ch);          
         return $data;
}

function parseAndValidateAddressForUSA($jsonResult)
{    
     $res = json_decode($jsonResult); 
     $status = $res->status;
       if($status == 'OK')
       {
                $countryObject = $res->results[0]->address_components;
                $totalCount = count($countryObject);

                foreach($countryObject as $key=>$val)
                {
                        $ctry = $val->short_name;
                        if($ctry == 'US')
                        {
                            $result = "Valid";
                            break;
                        }
                        else 
                        {
                            $result = "InValid"; 
                        }
                } 
       }
       else  
       {
               $result = "InValid";
       }   
     return $result;
}

?>