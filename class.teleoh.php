<?
/*

888            888                   888      
888            888                   888      
888            888                   888      
888888 .d88b.  888  .d88b.   .d88b.  88888b.  
888   d8P  Y8b 888 d8P  Y8b d88""88b 888 "88b 
888   88888888 888 88888888 888  888 888  888 
Y88b. Y8b.     888 Y8b.     Y88..88P 888  888 
 "Y888 "Y8888  888  "Y8888   "Y88P"  888  888 

  Website: http://teleoh.com
  API & XML Docs: https://docs.hawkinsegroup.com/teleoh/  
  Support: https://developer.teleoh.com/show/newticket

  teleohapi / utilze API methods part of the Teleoh™ Rest API. 
  teleohxml / seperate class extends telohapi class, used to generate Teleoh™ML during call flow. 
  
  See readme for usage examples.

*/


$f = $_REQUEST['f'];
$p = $_REQUEST['p'];


      ### Primary class - teleohapi
      class teleohapi {
        	
			public $API_USER_ID;
            public $API_KEY;
			public $HEG_ACCOUNT_ID;
			public $format;
            
			
            // Assign the values
            public function __construct($API_USER_ID,$API_KEY,$HEG_ACCOUNT_ID,$format) {
			  $this->API_USER_ID = $API_USER_ID;
			  $this->API_KEY = $API_KEY;
			  $this->HEG_ACCOUNT_ID = $HEG_ACCOUNT_ID;
			  $this->format = $format;
            }
			
			
			private function post($url,$fields) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"$url");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"$fields");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
			if ($this->format == "xml") { $xml = @simplexml_load_string($server_output); return $xml; }
            if ($this->format == "json") { return $server_output; }
            }
			
      
            private function build_query($p) {
            //NOTE: If you have problems with this consider using PHP built in function http_build_query
            $count = ''; $params = '';
            $variable_count = count($p);
        
            foreach ($p as $key => $item) {
            $count++;
  
            if ($count < $variable_count) {
            $pre_param = "$key=$item" . '&';
            $params = $params . $pre_param;
            }else{
            $pre_param =  "$key=$item";
            $params = $params . $pre_param;
            }
            }
            return $params;
            }


           ########################### START PUBLIC FUNCTIONS
            

              #### Application
              public function Application ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Create';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Application/Create","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Application/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Application/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'Modify';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Application/Modify","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Delete';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Application/Delete","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                    

                      }
                    }

             
              #### Call

              public function Call ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Originate';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/Originate","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'CallDetail';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/CallDetail","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'CallTransfer';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/CallTransfer","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'Hangup';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/Hangup","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'DTMF';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/DTMF","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'PlayAudio';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/PlayAudio","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'StopAudio';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/StopAudio","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;    

                        case 'CallHistory'; 
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/CallHistory","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;
 
                        case 'SetVariable'; 
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/SetVariable","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;


                      }
                    }


             #### Conference

              public function Conference ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'ListMembers';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/ListMembers","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'UnMuteMember';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/UnMuteMember","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'MuteMember';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/MuteMember","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'KickMember';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/KickMember","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'PlayAudio';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/PlayAudio","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'StopPlayAudio';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/StopPlayAudio","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'DeafMember';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/DeafMember","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;    

                        case 'UnDeafMember'; 
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Conference/UnDeafMember","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;
                   

                      }
                    }


              #### Endpoint
              public function Endpoint ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Create';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/Create","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'ReloadPassword';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/ReloadPassword","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Delete';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/Delete","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                    

                        case 'Modify';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Endpoint/Modify","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  
                      }
                    }


              #### Number

              public function Number ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'SearchLocal';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/SearchLocal","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'Modify';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/Modify","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'SearchTollFree';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/SearchTollFree","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'BuyLocalNumber';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/BuyLocalNumber","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'BuyTollFreeNumber';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/BuyTollFreeNumber","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;    

                        case 'Delete'; 
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Number/Delete","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;
                   

                      }
                    }


             #### Recording

              public function Recording ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Recording/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Recording/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                        case 'Modify';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Recording/Modify","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;                           

                        case 'Delete';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Recording/Delete","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                      }
                    }   


             #### Pricing

              public function Pricing ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Pricing/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                      }
                    }   

            
             #### SMS

              public function SMS ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'SendMessage';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/SMS/SendMessage","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/SMS/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/SMS/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                      }
                    }  

              
              ### Fax
              public function Fax ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'OriginateFax';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Fax/OriginateFax","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                      }
                    }  


              ### Logs
              public function Logs ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'GetAll';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Logs/GetAll","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Get';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Logs/Get","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;      

                      }
                    }  
                       //CallHistory = Get the call history between two dates (start_date,end_date)       
                  
                  


                      ##Get Call History
                      public function CallHistory($start_date,$end_date) {
                      $post = $this->post("http://voiceapi.cloud/API/$this->format/Call/CallHistory","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&start_date=$start_date&end_date=$end_date");
                      if ($post->error) { throw new Exception("$post->error", 1); };
					  return $post;
                      }



             #### TSV
             public function TSV ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Create';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/TSV/Create","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                        case 'Verify';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/TSV/Verify","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break; 

                      }
                    }   



             #### Dial (Outbound Dial API)
             public function Dial ($f,$p) {
                     
                     $url_params = $this->build_query($p);
                    
                     switch ($f) {
 
                        case 'Create';
                        $post = $this->post("http://voiceapi.cloud/API/$this->format/Dial/Create","API_USER_ID=$this->API_USER_ID&API_KEY=$this->API_KEY&$url_params");
                        if ($post->error) { throw new Exception("$post->error", 1); };
                        return $post;
                        break;  

                      }
                    }  
                    

} //End teleohapi class, example available in test.php


//Teleoh XML Class for returning TeleohXML, used to control call flow.
class teleohxml extends teleohapi {
    

          ##Private Functions Begin
          private function check_numeric($number) {
          $val = intval($number);
          if (is_numeric($val)) { 
          return $val + 0;
          }else{
          throw new Exception('Not a valid number.');     
          } 
          }

     
     #Dial
     public function dial ($action,$method,$caller_name,$caller_id_number,$hold_music_url,$confirm_key,$confirm_sound_url,$digitsMatch,$digitsMatchBLeg,$callbackUrl,$record,$redirect,$maxDuration,$noanswer_timeout,$numbers,$users) {
     
     /*
           $numbers = array('12144636343','12145551212');
     */
           //Verify
     if ($confirm_sound_url != 'default' && $confirm_sound_url != 'Default' && $confirm_sound_url != 'DEFAULT') {
        if ($confirm_sound_url != '') {
     if (filter_var($confirm_sound_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('confirm_sound_url is invalid.'); }
     }
        }     
     if ($callbackUrl != '') {
     if (filter_var($callbackUrl, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('callbackUrl is invalid.'); }
     }     

     if (filter_var($action, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('action is invalid.'); }

     $num_count = count($numbers); $users_count = count($users);

     if ($num_count > '10') { throw new Exception("A maximum of ten numbers can be dialed. You provided $num_count numbers."); }
     if ($users_count > '10') { throw new Exception("A maximum of ten SIP users can be dialed. You provided $users_count users."); }
     if ($num_count == '0' && $users_count == '0') { throw new Exception('Provide numbers or users to dial.'); }

     if ($caller_id_number != '') { try { $this->check_numeric($caller_id_number); } catch(Exception $e) {  throw new Exception("caller_id_number is not a valid number."); } };
     if ($confirm_key != '') { try { $this->check_numeric($confirm_key); } catch(Exception $e) {  throw new Exception("confirm_key is not a valid number."); } };
     if ($maxDuration != '') { try { $this->check_numeric($maxDuration); } catch(Exception $e) {  throw new Exception("maxDuration is not a valid number."); } };
     if ($noanswer_timeout != '') { try { $this->check_numeric($noanswer_timeout); } catch(Exception $e) {  throw new Exception("noanswer_timeout is not a valid number."); } };


     //Build numbers XML
     if (count($numbers)) {
     foreach ($numbers as $this_number) {
      if ($this_number != '') {
      $numbers_pre = '<Number>' . $this_number . '</Number>';
      $all_numbers = $numbers_pre . $all_numbers;   
     }
     }
     }
     if (count($users)) {
     foreach ($users as $this_user) {
        if ($this_user != '') {
      $numbers_pre = '<User>' . $this_user . '</User>';
      $all_numbers = $numbers_pre . $all_numbers;   
     }
     }
     }
  
     $teleoh_xml = "
     <heg>
      <Response>
      <Dial action=\"$action\" method=\"$method\" hold_music_url=\"$hold_music_url\" caller_id_number=\"$caller_id_number\" caller_name=\"$caller_name\" confirm_sound_url=\"$confirm_sound_url\" confirm_key=\"$confirm_key\" callbackUrl=\"$callbackUrl\" digitsMatch=\"$digitsMatch\" digitsMatchBLeg=\"$digitsMatchBLeg\" record=\"$record\" redirect=\"$redirect\" noanswer_timeout=\"$noanswer_timeout\" maxDuration=\"$maxDuration\">
       $all_numbers
      </Dial>
     </Response>
     </heg>";

     return $teleoh_xml;     
     }


     #Get Digits
     public function getdigits ($action,$method,$digitTimeout,$numDigits,$finishOnKey,$retries,$variable_name,$speak_text,$speak_url) {
     
           //Verify
     if ($speak_url != '') {
     if (filter_var($speak_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('speak_url is invalid.'); }
     }
     if (filter_var($action, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('action is invalid.'); }

     try { $this->check_numeric($digitTimeout); } catch(Exception $e) {  throw new Exception("digitTimeout is not a valid number."); }
     try { $this->check_numeric($numDigits); } catch(Exception $e) {  throw new Exception("numDigits is not a valid number."); }
     try { $this->check_numeric($retries); } catch(Exception $e) {  throw new Exception("retries is not a valid number."); }

     if ($speak_url == "" && $speak_text == "") { throw new Exception('Either speak_url or speak_text must be provided to prompt for the digits.'); };
     
     //Generate XML
     if ($speak_url != '') { $say = "<Play>$speak_url</Play>";  }
     if ($speak_url == '' && $speak_text != '') { $say = "<Speak loop=\"0\" speak_language=\"en\" speak_voice=\"Watson\">$speak_text</Speak>"; }

     $teleoh_xml = "
     <heg>
     <Response>
      <GetDigits action=\"$action\" method=\"$method\" digitTimeout=\"$digitTimeout\" numDigits=\"$numDigits\" finishOnKey=\"$finishOnKey\" retries=\"$retries\" variable_name=\"$variable_name\">
         $say
      </GetDigits>
     </Response>
     </heg>"; 

     return $teleoh_xml;     
     }


    ## Play
    public function play ($action,$method,$loop,$url) {
     
           //Verify
     if (filter_var($action, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('action is invalid.'); }   
     if ($url != '') {
     if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('url is invalid.'); }
     }
     
          //Generate XML
     try { $this->check_numeric($loop); } catch(Exception $e) {  throw new Exception ("loop is not a valid number."); }

     $teleoh_xml = "
     <heg>
     <Response>
        <Play action=\"$action\" method=\"$method\" loop=\"$loop\">$url</Play>
     </Response>
     </heg>"; 

     return $teleoh_xml;     
     }


    ## Speak
    public function speak ($action,$method,$loop,$speak_text,$speak_voice) {
     
           //Verify
     if (filter_var($action, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('action is invalid.'); }   
     try { $this->check_numeric($loop); } catch(Exception $e) {  throw new Exception('loop is not a valid number.'); } 
  
     if ($speak_voice == '') { throw new Exception('speak_voice must be provided.'); }; 

          //Generate XML

     $teleoh_xml = "
     <heg>
     <Response>
       <Speak action=\"$action\" method=\"$method\" loop=\"$loop\" speak_voice=\"$speak_voice\" speak_language=\"$speak_language\">$speak_text</Speak>
     </Response>
     </heg>"; 

     return $teleoh_xml;     
     }

    
    ## Record
    public function record ($action,$method,$max_length,$play_beep,$finishOnKey,$speak_url,$speak_text) {
     
           //Verify
     if ($speak_url != '') {
     if (filter_var($speak_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('speak_url is invalid.'); }
     }

     try { $this->check_numeric($max_length); } catch(Exception $e) {  echo "digitTimeout is not a valid number."; }
     if ($play_beep == 'Y' || $play_beep == 'N') { }else{ throw new Exception('play_beep must be either Y or N.');  }
     if ($speak_url == "" && $speak_text == "") { throw new Exception('Either speak_url or speak_text must be provided to prompt for the digits.'); };
     
     //Generate XML
     if ($speak_url != '') { $say = "<Play>$speak_url</Play>";  }
     if ($speak_url == '' && $speak_text != '') { $say = "<Speak loop=\"0\" speak_language=\"en\" speak_voice=\"Watson\">$speak_text</Speak>"; }

     $teleoh_xml = "
     <heg>
     <Response>
      <Record action=\"$action\" mathod=\"$method\" finishOnKey=\"$finishOnKey\" max_length=\"$max_length\" play_beep=\"$play_beep\">
         $say
      </Record>
     </Response>
     </heg>"; 

     return $teleoh_xml;     
     }

 
    
    ## Hangup
    public function hangup ($speak_text,$media_url,$speak_loop,$speak_voice) {

       //Verify
     if ($speak_text != '' && $media_url != '') { throw new Exception('Either speak_text or media_url must be supplied, not both.'); }

     if ($media_url != '') {
     if (filter_var($media_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('media_url is invalid.'); } 
     }

     if ($speak_text != '') {
       if ($speak_voice == '') { throw new Exception('speak_voice must be provided.'); }
       try { $this->check_numeric($loop); } catch(Exception $e) {  echo "loop is not a valid number."; }
     }
    
     if ($speak_text != '') { $section1 = "<Speak loop=\"$speak_loop\" speak_language=\"$speak_language\" speak_voice=\"$speak_voice\">$speak_text</Speak>"; }
     if ($media_url != '') { $section1 = "<Play>$media_url</Play>"; }

     $teleoh_xml = "
     <heg>
     <Response>
      <Hangup />
      $section1
     </Response>
     </heg>";

     return $teleoh_xml;
     }  

  
   ## Wait
   public function wait ($action,$method,$wait_time,$speak_text,$speak_loop,$speak_voice,$media_url) {

     //Verify
     if ($speak_text != '' && $media_url != '') { throw new Exception('Either speak_text or media_url must be supplied, not both.'); }

  if ($media_url == "classical")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_classical.wav"; };
  if ($media_url == "funk")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_funk.wav"; };
  if ($media_url == "hiphop")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_hiphop.wav"; };
  if ($media_url == "relaxed")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_relaxed.wav"; };
  if ($media_url == "smooth")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_smooth.wav"; };
  if ($media_url == "techno")  { $media_url = "http://voiceapi.cloud/API/callflow/hold_music/hold_techno.wav"; };

     if ($media_url != '') {
     if (filter_var($media_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('media_url is invalid.'); } 
     }

     if ($speak_text != '') {
     if ($speak_voice == '') { throw new Exception('speak_voice must be provided.'); }
     try { $this->check_numeric($loop); } catch(Exception $e) {  echo "loop is not a valid number."; }
     }
    
     if ($speak_text != '') { $section1 = "<Speak loop=\"$speak_loop\" speak_voice=\"$speak_voice\">$speak_text</Speak>"; }
     if ($media_url != '') { $section1 = "<Play>$media_url</Play>"; }

     $teleoh_xml = "<heg>
     <Response>
     <Wait length=\"$wait_time\" action=\"$action\" method=\"$method\">
         $section1
      </Wait>
     </Response>
     </heg>";

     return $teleoh_xml;
     }


     ## Conference
     public function conference ($action,$method,$room_name,$user_pin,$mod_pin,$maxMembers,$record,$hangupOnStar,$enterSound,$exitSound,$waitSound) {

     if (strlen($room_name) > 5) { throw new Exception('room_name must be 5 characters or more.'); }
     
     if ($user_pin != '') {
     try { check_numeric($user_pin); } catch(Exception $e) {  throw new Exception('user_pin is not a valid number.'); } 
     }

     if ($mod_pin != '') {  try { check_numeric($mod_pin); } catch(Exception $e) {  throw new Exception('mod_pin is not a valid number.'); }} 

     if ($maxMembers != '') {
     try { check_numeric($maxMembers); } catch(Exception $e) { throw new Exception('maxMembers must be provided.');  }  
     }

     if ($record != '') {
      if ($record == 'Y' || $record == 'N') { }else{ throw new Exception('record must be either N or Y.'); }
     }

     if ($hangupOnStar != '') {
      if ($hangupOnStar == 'Y' || $hangupOnStar == 'N') { }else{ throw new Exception('hangupOnStar must be either N or Y.'); }
     }

     if ($enterSound != '') { if (filter_var($enterSound, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('enterSound is invalid.'); }  }
     if ($exitSound != '') {  if (filter_var($exitSound, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('exitSound is invalid.'); } }
     if ($waitSound != '') {  if (filter_var($waitSound, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('waitSound is invalid.'); } }

     $teleoh_xml = "
     <heg>
      <Response>
       <Conference action=\"$action\" method=\"$method\" user_pin=\"$user_pin\" mod_pin=\"$mod_pin\" maxMembers=\"$maxMembers\" record=\"$record\" hangupOnStar=\"$hangupOnStar\" enterSound=\"$enterSound\" exitSound=\"$exitSound\" waitSound=\"$waitSound\">$room_name</Conference>
     </Response>
    </heg>";

    return $teleoh_xml;
    }


     ## Redirect
     public function redirect ($action,$method) {
     
     $teleoh_xml = "
     <heg>
     <Response>
      <Redirect action=\"$action\" method=\"POST\"/>
     </Response>
     </heg>";
 
     return $teleoh_xml;
     } 

     
     ## Message
     public function message ($action,$method,$to,$from,$text_message,$media_url,$callbackUrl) {
     
     if ($media_url != '') { 
      if (filter_var($media_url, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('media_url is invalid.'); }  
     }

     if ($callbackUrl != '') { 
      if (filter_var($callbackUrl, FILTER_VALIDATE_URL) === FALSE) { throw new Exception('media_url is invalid.'); } 
     }

     try { check_numeric($to); } catch(Exception $e) {  throw new Exception('to is not a valid phone number.'); }
     try { check_numeric($from); } catch(Exception $e) {  throw new Exception('from is not a valid phone number.'); }
     

     $teleoh_xml = "
     <heg>
     <Response>
      <Message action=\"$action\" method=\"POST\" to=\"$to\" from=\"$from\" media_url=\"$media_url\" callbackUrl=\"$callbackUrl\">MMS</Message>
     </Response>
     </heg>";

     return $teleoh_xml;
     }


     ## SetVariable
     public function setvariable ($action,$method,$variable_name,$variable_value) {

     if ($variable_name == '') { throw new Exception('Variable name is invalid.'); }
     if ($variable_value == '') { throw new Exception('Variable value is invalid.');  }  

     $teleoh_xml = "
     <heg>
     <Response>
      <SetVariable action=\"$action\" method=\"$method\" variable_name=\"$variable_name\" variable_value=\"$variable_value\"/>
     </Response>
     </heg>";

     return $teleoh_xml;
     }

}
?>		
            