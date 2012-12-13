<?php 
     class CallWebServiceSugarSoap {
         
         var $application_name = 'WebtoContactForm';
         var $user_name = 'Admin';
         var $password  = '321@admin!';
         var $wsdlURL  = 'http://sugarcrm-dev.nextlevelinternet.com/soap.php?wsdl';
         var $soapURL  = 'http://sugarcrm-dev.nextlevelinternet.com/soap.php';
         var $user_auth;
         var $session_id;
         var $user_guid; 
         var $soapclient;
         
         public function __construct()
         {
             $this->soapclient       = new SoapClient($this->wsdlURL, array('trace' => 1, 'location' => $this->soapURL));  
             $this->user_auth  = array('user_name' => $this->user_name,          //admin username
                                       'password'  => md5($this->password),      //admin password
                                       'version'   => '0.1');
         } 
         
         public function getsoapclientObj()
         {
             return $this->soapclient;
         }
         
         public function getsessionID()
         {
             return $this->session_id;
         }
         
         public function getuser_guid()
         {
             return $this->user_guid;
         }
         
         public function loginInsugar()
         {
            $soapclientObj = $this->soapclient;
            $result_array  = $soapclientObj->login($this->user_auth,$this->application_name);	 
	    $this->session_id = $result_array->id;
	    $this->user_guid  = $soapclientObj->get_user_id($this->session_id); 
         }
         
         function get_entry_list($mod_name, $recPerPage)
         {
            $soapclientObj = $this->soapclient;
            $result_array  = $soapclientObj->get_entry_list($this->session_id,$mod_name,'','first_name,last_name','','',$recPerPage, 0); 
            $res1 = $result_array->entry_list;
            $totalct = count($res1);
            $tempArray = array();
            $finalArray = array();
            
            $fetched_fields = array('id','salutation','first_name', 'last_name', 'account_name', 'title', 'email1', 'email2');
            for($i=0; $i<$totalct; $i++)
            {
                 foreach($res1[$i]->name_value_list as $key=>$val)
                 {
                       if(in_array($val->name, $fetched_fields))
                        {
                               $tempArray[$val->name] = $val->value;
                        }
                 }
                 $finalArray[] = $tempArray;
            }
            return $finalArray;
         }
         
		 function fetchFirstNameBySplitSearchString($search_string)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search); 
                $first_name = trim($fields[0]);
				return $first_name;
		}
		function fetchLastNameBySplitSearchString($search_string)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search);  
				$last_name = trim($fields[1]); 
				return $last_name;
		}
		function fetchAccountNameBySplitSearchString($search_string)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search);  
				$account_name = trim($fields[2]); 
				return $account_name;
		}
		function fetchTitleBySplitSearchString($search_string)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search);  
				$title = trim($fields[3]); 
				return $title;
		}
		function fetchEmailBySplitSearchString($search_string)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search);  
				$email = trim($fields[4]);
				return $email;
		}
		 
         function get_search_by_module($mod_name, $search_string, $recPerPage)
         {
                $search = urldecode($search_string);
				$fields = explode(";",$search); 
                $first_name = trim($fields[0]);
				$last_name = trim($fields[1]);
				$account_name = trim($fields[2]);
				$title = trim($fields[3]);
				$email = trim($fields[4]);  
                $soapclientObj = $this->soapclient;
 		        $searchResults = array();
				
				if( $email != "" )
				{
				    $search_Email_Result_Array  = $soapclientObj->contact_by_email($this->user_name, md5($this->password), $email);
				}
				else
				{
				    $search_Email_Result_Array  = array();
				}
				
				
                //$result_array  = $soapclientObj->get_entry_list($this->session_id, $mod_name, "first_name LIKE '%".$first_name."%'", '','','',$recPerPage, 0);  
			    //$result_array  = $soapclientObj->get_entries_count($this->session_id, $mod_name, "first_name LIKE '%".$first_name."%'", 0);  
				
				if( is_array($search_Email_Result_Array) and !empty($search_Email_Result_Array) )
				{
				     foreach($search_Email_Result_Array as $key=>$val)
					 {
					     if($val->type == 'Contact')
						 {
							 $tempsearchResults['id'] = $val->id;
							 $tempsearchResults['salutation'] = '';
							 $tempsearchResults['first_name'] = $val->name1;
							 $tempsearchResults['last_name'] = $val->name2;
							 $tempsearchResults['title'] = '';
							 $tempsearchResults['email1'] = $val->email_address;
							 $tempsearchResults['email2'] = '';
							 $tempsearchResults['account_name'] = $val->association;
							 
							 $searchResults[] = $tempsearchResults;
						}	 
					 }
				}
				else
				{
				     $searchResults = array();
				}
               // echo "<pre>";
                 // print_r($searchResults); die;
				 return $searchResults;
         }
     }  
?>