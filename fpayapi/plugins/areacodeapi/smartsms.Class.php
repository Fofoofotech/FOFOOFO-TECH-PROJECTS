<?php

class SmartSMSClass {
    public $smsusername;
    public $smspassword;

    function __construct(){
        global $session;
        $this->baseurl = "https://smartsmsgh.com";
        $this->tokenuser = "caooaarr";
        $this->tokenpass = "rcndiaad";
        $this->senderid = "SMARTCOLECT";
    }

    public function prepareBulkSMS($from ,array $to = array(), $message,$username ="", $password = ""){
        /**
         * @param to flat array of contacts or string
         * @param username added with consideration for class use outside php session
         * @param password added with consideration for class use outside php session
         */
        $username = empty($username)?$this->tokenuser:$username;
        $password = empty($password)?$this->tokenpass:$password;

        $data = array(
            "globals"=>array( "from" => $from ),
            "messages"=> [array("to"=>$to,  "content"=> $message)]
    );
        
        $data = json_encode($data);
         // var_dump($data);
         // die();
        $response = $this->sendBulk($username,$password,$data);
         // die(var_dump($response));
        return $response;   


    }

    public function getBalanceCredit(){
        $b64 = $this->getbase64($this->tokenuser, $this->tokenpass);
        $response = $this->getUserBalance($b64);
        return $response;
    }
    
    public function sendSms($from = "SMARTCOLECT",$to,$content){
        $url = $this->baseurl.':1401/send';
        $params = '?smsusername='.$this->tokenuser;
        $params.= '&smspassword='.$this->tokenpass;
        $params.= '&to='.urlencode($to);
        $params.= '&from='.urlencode($from);
        $params.= '&content='.urlencode($content);

        // $this->sendLinkSms($url, $params);
        $response = $this->sendCurl($url, $params);
       
        return $response;
    }

    public function sendSMSNEW($senderName='SMARTCOLECT',$phoneNumber,$message){
        $url = 'http://smartsmsgh.com:1401/send';
                                                            
$tokenUsername = 'caooaarr';
$tokenPassword = 'rcndiaad';
// $phoneNumber = ''; // Phone number of recepient 233545155292
// $senderName = ''; // Name of the sender
// $message = ''; // Message to be sent
                                                            
$params = '?username='.$tokenUsername;
$params.= '&password='.$tokenPassword;
$params.= '&to='.urlencode($phoneNumber);
$params.= '&from='.urlencode($senderName);
$params.= '&content='.urlencode($message);

// Send through Curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.$params);                        
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
$result = trim(curl_exec($ch));
curl_close($ch);
return $result;
    }


        public function sendSmsBulk($from = "SMARTCOLECT",$to,$content,$username,$password){
        $url = $this->baseurl.':1401/send';
        $params = '?username='.$username;
        $params.= '&password='.$password;
        $params.= '&to='.urlencode($to);
        $params.= '&from='.urlencode($from);
        $params.= '&content='.urlencode($content);
        $params.= '&coding=1';

        // $this->sendLinkSms($url,$params);
        // die(var_dump($params));
        $response = $this->sendCurl($url,$params);
       // die(var_dump($response));
        return $response;
    }
      
        

    public function sendLinkSms($url,$params){
        try {
            $response = file_get_contents($url.$params);

            if ($response === false) {
                // Handle the error
            }
        } catch (Exception $e) {
            // Handle exception
            print $e;
        }
    }

    protected function sendRestCurl($auth,$url,$params){       
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(	'Authorization: '.$auth,	'Content-Type: application/json' ,	'timeout: 180',	'open_timeout: 180'	)  ); 
    
    $result = curl_exec($ch);	
    // header('Content-Type: application/json');
    
    return json_decode($result);
    }

    // public function sendRestCurl($auth,$url,$params){

    //     $ch = curl_init();
        
    //     // Set query data here with the URL
    //     curl_setopt($ch, CURLOPT_URL, $url); 
        
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$auth)); 
    //     $content = trim(curl_exec($ch));
    //     curl_close($ch);
    //     return $content;
    // }

    public function sendCurl($url,$params){

        $ch = curl_init();
        
        // Set query data here with the URL
        curl_setopt($ch, CURLOPT_URL, $url.$params); 
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        $content = trim(curl_exec($ch));
        curl_close($ch);
        return $content;
    }
        function validateNumber($number, $forced_prefix = NULL, $number_length = '0'){
            
            if (!$forced_prefix){
                $forced_prefix = "+233";
            }
            
            // Remove any non-numeric characters in the number
            $number = preg_replace('/[^\+0-9]/s','',$number);
            
            // If a prefix is allready added then return the number "as is"
            if ( substr($number, 0, 1) == "+" || substr($number, 0, 2) === "00" ){
                return $number;
            }

            if (substr($number, 0, 1)=='0' && substr($number,0,2)!='00'){
                // single 0 at the beginning of number, we're supposed to remove that
                $number = substr($number,1);
            }
            
            // Add a prefix if the number doesn't have one yet
            if (isset($forced_prefix) && strlen($forced_prefix) > 0){
                if (substr($number, 0, strlen($forced_prefix)) != $forced_prefix){
                    // The beginning of the number does not match the forced prefix
                }else{
                    $number = substr($number, strlen($forced_prefix));
                }
            }
            
            // Check if the number is still not numeric, if so we return 0/false
            if (!is_numeric($number)){
                return 0;
            }
            
            // Check if the number has the correct length. 
            // Setting $number_length to 0 or false will skip this test
            if ($number_length && strlen($number) != $number_length){
                return 0;
            }
            
            // Add the forced prefix
            $number = $forced_prefix . $number;
            
            return $number;
        }
        public function getbase64($username, $password) {
            $data = "$username:$password";
            return base64_encode($data);
        }

        public function getUserBalance($base64_key){
            $headr = array();
            $headr[] = 'Authorization: Basic '.$base64_key;		
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_URL, JASMIN_HOST.':8080/secure/balance');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($result);
            return   $result->data->sms_count;
    
        }
        public function getNewBalance(){
             $url="http://smartsmsgh.com:1401/balance";
             $tokenUsername = 'caooaarr';
            $tokenPassword = 'rcndiaad';
            $params = '?username='.$tokenUsername;
            $params.= '&password='.$tokenPassword;


            // Send through Curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url.$params);                        
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3);
            $result = trim(curl_exec($ch));
            curl_close($ch);
            return $result;
        }
}