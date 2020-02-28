<?php
class engineClass{
    public  $sql;
    public $session;
    public $phpmailer;
    function  __construct() {
        global $sql,$session,$phpmailer;
        $this->session= $session;
        $this->sql = $sql;
        $this->phpmailer = $phpmailer;
    }
    //actorid
    public function getActorid(){
        $actor_id = $this->session->get("actorid");
        return $actor_id;
    }

    public function getActorDetails($actor_id='', $actor_h1=''){
        if($actor_id == ""){
            $actor_id = $this->session->get("actorid");
        }
        if($actor_h1 == ""){
            $actor_h1 = $this->session->get("h1");
        }
        $stmt = $this->sql->Prepare("SELECT * FROM fpay_user WHERE USR_ID = ".$this->sql->Param('a')." AND USR_USERNAME = ".$this->sql->Param('a')." LIMIT 1");
        $stmt = $this->sql->Execute($stmt,array($actor_id, $actor_h1));
        if($stmt && ($stmt->RecordCount() > 0)){
            return $stmt->FetchNextObject();
        }else{
            print $this->sql->ErrorMsg();
            return false;
        }
    }//end of getActorsDetails


    public function getActorSettings($actor_id = ""){
        if($actor_id == ""){
            $actor_id = $this->session->get("actorid");
        }
        $stmt = $this->sql->Prepare("SELECT * FROM pol_usr_setting WHERE SET_USR = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($actor_id));
        if($stmt && ($stmt->RecordCount() > 0)){
            return $stmt->FetchNextObject();

        }else{
            // print $this->sql->ErrorMsg();
            return false;
        }
    }//end of getActorsDetails


    public function getActor(){
        $stmt = $this->sql->Prepare("SELECT * FROM fpay_user WHERE USR_STATUS ='1' ");
        $stmt = $this->sql->Execute($stmt);
        if($stmt && ($stmt->RecordCount() > 0)){
            while($obj = $stmt->FetchNextObject()){
                $actorname[$obj->USR_ID] = $obj->USR_NAME;
            }
            return $actorname;

        }else{
            // print $this->sql->ErrorMsg();
            return false;
        }
    }

    public function getActorName(){
        $obj=$this->getActorDetails();
        return $obj->USR_NAME;
    }
    public function getActorPicture(){
        $obj=$this->getActorDetails();
        return $obj->CLT_PROFILE_IMAGE;
    }
# START: GET CLIENT NUMBER
    public function getActorNumber(){
        $obj=$this->getActorDetails();
        return $obj->USR_CONTACT;
    }
# END: GET CLIENT NUMBER

    public function getActorNameCode(){
        $obj=$this->getActorDetails();
        return $obj->USR_CODE;
    }


    public function getClientEmail(){
        $obj=$this->getActorDetails();
        return $obj->USR_EMAIL;
    }

//actor status
    public function getActorLevel(){
        $obj=$this->getActorDetails();
        return $obj->USR_USERTYPE;
    }

    public function msgBox($msg,$status){
        if(!empty($status)){
            if($status == "success"){
                echo '<div class="alert alert-success"> '.$msg.'</div>';
            }elseif($status == "error"){
                echo '<div class="alert alert-danger"> '.$msg.'</div>';
            }else{
                echo '<div class="alert alert-info"> '.$msg.'</div>';
            }
        }
    }


    public function add3dots($string, $repl, $limit) {
        if(strlen($string) > $limit) {
            return substr($string, 0, $limit) . $repl;
        }else {
            return $string;
        }
    }


 /**
     * this function is use to return all actor's details
     * @return <string>
     */
    public function geAllUsersDetails($userid){
        $stmt = $this->sql->Prepare("SELECT * FROM fpay_user WHERE USR_ID = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($userid));

        if($stmt)   {
            return $stmt->FetchNextObject();

        }else{return false ;}
    }// end geAllUsersDetails



/**
     * this function is use to return all driver details
     * @return <string>
     */
    public function getdriverDetails($drivercode){
        $stmt = $this->sql->Prepare("SELECT * FROM pol_drivers WHERE DV_CODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($drivercode));

        if($stmt)   {
            return $stmt->FetchNextObject();

        }else{return false ;}
    }// end geAllUsersDetails



    # START: GET ANY SENDER NAME
    public function getSenderName($sender_code){
        $actor_id = $this->session->get("actorid");
        $stmt = $this->sql->Prepare("SELECT * FROM sms_sendername WHERE SN_CLIENTCODE = ".$this->sql->Param('a'));
        $stmt = $this->sql->Execute($stmt,array($actor_id));
        # ARRAY
        if($stmt && ($stmt->RecordCount() > 0)){
            $obj = $stmt->FetchNextObject();
            $sender_name[$sender_code] = array($obj->SN_NAME);
            return $sender_name[$sender_code][0];
        }else{
            // print $this->sql->ErrorMsg();
            return false;
        }
    }
    # END: GET ANY SENDER NAME


//Event log
public function setEventLog($event_type,$activity){
    $actor_id = $this->session->get("userid");
    $fullname = $this->getActorName();
    $remoteip = $_SERVER['REMOTE_ADDR'];
   $useragent = empty($_SERVER['HTTP_USER_AGENT'])? '': $_SERVER['HTTP_USER_AGENT'] ;
    $sessionid = $this->session->getSessionID();

        $stmt=$this->sql->Prepare("INSERT INTO fpay_eventlog (SEVL_EVTCODE,SEVL_USERID,SEVL_COMPNAME,SEVL_ACTIVITIES,SEVL_SESSION_ID,SEVL_BROWSER)
         VALUES (".$this->sql->Param('a').",".$this->sql->Param('b').",".$this->sql->Param('c').",".$this->sql->Param('d').",
         ".$this->sql->Param('e').",".$this->sql->Param('f').")");
        $stmt = $this->sql->Execute($stmt,array($event_type,$actor_id,$fullname,$activity,$sessionid,$useragent));

        print $this->sql->ErrorMsg();
        
    }//end


    //Get country
    public function getCountry(){
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT * FROM sms_countries"));
        if($stmt){
            return $stmt;
        }else{return false;}
    }


    public function getDateFormat($inputdate,$format="Y-m-j"){
        //echo '. '.$inputdate."<br/>";
        $input = explode("/",$inputdate);
        $mk = $input[2].'-'.$input[1].'-'.$input[0];
        if($format=="j/m/Y"){
            $input = explode("-",$inputdate);
            $mk =$input[2].'/'.$input[1].'/'.$input[0];
        }
        return $mk;
    }

    // public function getAPIKeys(){
    // $stmt = $this->sql->Execute($this->sql->Prepare("SELECT API_KEYS FROM sms_apikeys WHERE API_STATUS = '1' "));
    // print $this->sql->ErrorMsg();
    // if($stmt){
    //          $obj = $stmt->FetchNextObject();
    // 		 return $obj->API_KEYS;
    //       }else{
    // 	          return false;
    // 	       }
    //  }
    function curlMainJSON($params, $url) {
        $adb_option_defaults = array (
            CURLOPT_HEADER => 'Content-Type: application/json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 180
        );

        $options = array (
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params
        );

        if (! isset ( $adb_handle ))
            $adb_handle = curl_init ();

        curl_setopt_array ( $adb_handle, ($options + $adb_option_defaults) );

        // send request and wait for responce
        $output = curl_exec ( $adb_handle );
        // print_r($output);
        if ($output != false) {

            $responce = json_decode ( $output, true );

            curl_close ( $adb_handle );
            // print_r($responce);
            return ($responce);
        } else {
            echo 'Curl error: ' . curl_error ( $adb_handle );
        }

        curl_close ( $adb_handle );

        return false;
    }
    //strong password
    public function strongPassword($password){
        if(strlen($password) < 8) {
            return 'Password too short!';
        }else
            if(!preg_match('#[0-9]+#', $password)) {
                return 'Password must include at least one number!';
            }else
                if(!preg_match('#[a-zA-Z]+#', $password)) {
                    return 'Password must include at least one letter!';
                }else{
                    return 'true';
                }
    }

    function curlMain($params, $url) {
        $adb_option_defaults = array (
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 180
        );

        $options = array (
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params
        );

        if (! isset ( $adb_handle ))
            $adb_handle = curl_init ();

        curl_setopt_array ( $adb_handle, ($options + $adb_option_defaults) );

        // send request and wait for responce
        $output = curl_exec ( $adb_handle );
        // print_r($output);
        if ($output != false) {
            // var_dump($output);
            $responce = json_decode ( $output, true );

            curl_close ( $adb_handle );

            return ($responce);
        } else {
            echo 'Curl error: ' . curl_error ( $adb_handle );
        }

        curl_close ( $adb_handle );

        return false;
    }

    public function MonthName(){
        $month = array(
            "1"=>"Jan",
            "2"=>"Feb.",
            "3"=>"March",
            "4"=>"April",
            "5"=>"May",
            "6"=>"June",
            "7"=>"July",
            "8"=>"Aug.",
            "9"=>"Sept.",
            "10"=>"Oct.",
            "11"=>"Nov.",
            "12"=>"Dec."
        );
        return $month;
    }
    public function loadValidCountries(){
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT BC_NAME FROM sms_blacklist_countries WHERE BC_STATUS = '0'"));
        $obj = $stmt->FetchNextObject();
        return $obj;
    }


    public function clientToken($chars, $ccode, $length=8) {
        $token = '';
        $appdate = date('Y-m-d');
        $chars = preg_replace('/[^\p{L}\p{N}\s]/u', '', $chars);
        for($i = 0; $i < $length; ++$i) {
            $random = str_shuffle($chars);
            $token  .= $random[5];
        }
        $stmt = $this->sql->Execute($this->sql->Prepare('SELECT CLTTK_TOKENID FROM `sms_client_token`
		WHERE CLTTK_CLTCODE = '.$this->sql->Param('1').' LIMIT 1'), array($ccode));
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            return $obj->CLTTK_TOKENID;
        }else{
            $stmt = $this->sql->Execute($this->sql->Prepare('SELECT CLTTK_TOKENID FROM `sms_client_token`
			WHERE CLTTK_TOKENID = '.$this->sql->Param('1').' LIMIT 1'), array($token));
            if($stmt->RecordCount() > 0){
                return $this->clientToken($chars, $ccode, $length);
            }else{
                return $token;
            }

        }
    }


    public function clientUsername($chars, $ccode, $length=8) {
        $username = '';
        $appdate = date('Y-m-d');
        $chars = preg_replace('/[^a-zA-Z\s]/', '', $chars);
        for($i = 0; $i < $length; ++$i) {
            $random = str_shuffle($chars);
            $username .= $random[5];
        }
        $stmt = $this->sql->Execute($this->sql->Prepare('SELECT CLTTK_USERNAME FROM `sms_client_token`
		WHERE CLTTK_CLTCODE = '.$this->sql->Param('1').' LIMIT 1'), array($ccode));
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            return $obj->CLTTK_USERNAME;
        }else{
            $stmt = $this->sql->Execute($this->sql->Prepare('SELECT CLTTK_USERNAME FROM `sms_client_token`
			WHERE CLTTK_USERNAME = '.$this->sql->Param('1').' LIMIT 1'), array($username));
            if($stmt->RecordCount() > 0){
                return $this->clientUsername($chars, $ccode, $length);
            }else{
                return $username;
            }

        }
    }

    public function clientUsernameToken($ccode) {
        $stmt = $this->sql->Execute($this->sql->Prepare('SELECT CLTTK_TOKENID, CLTTK_USERNAME FROM `sms_client_token`
		WHERE CLTTK_CLTCODE = '.$this->sql->Param('1').' LIMIT 1'), array($ccode));
        if($stmt->RecordCount() > 0){
            return $stmt->FetchNextObject();
        }
    }

    public function EnforcePassword(){
        $actorid = $this->session->get("actorid");
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT CLT_FGTPASS_STATUS FROM `sms_client` WHERE CLT_CODE = ".$this->sql->Param('a').""),array($actorid));
        $row = $stmt->FetchNextObject();

        return $row->CLT_FGTPASS_STATUS;
    }



     /*
     * This function below generates the user code
     */
    public function getUserCode(){
        // $activeinstitution = $this->session->get("activeinstitution");
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT COUNT(USR_ID) AS TOTALUSER FROM fpay_user WHERE USR_STATUS =  ".$this->sql->Param('a')." "),array('1'));
        print $this->sql->ErrorMsg();

         $activeinstitution='0001';

        if($stmt){
            $obj = $stmt->FetchNextObject();
            $totusr = $obj->TOTALUSER + 1;
            return $subcounter = $activeinstitution.$totusr;
        }else{
            return false;
        }
    }

 public function userbranchcode($faccode){
        $item = 'UDC'.date('Ymd');
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT USRBRCH_CODE FROM area_userbranch WHERE USRBRCH_FACCODE = ".$this->sql->Param('a')." ORDER BY USRBRCH_ID DESC LIMIT 1"),array($faccode));
        print $this->sql->ErrorMsg();
        if ($stmt->RecordCount()>0){
            $obj = $stmt->FetchNextObject()->USRBRCH_CODE;

            $grpcode = substr($obj,strpos($obj,'-')+1);
            $grpcode = $grpcode + 1;
            $groupcode='';

            if (strlen($grpcode) == 1){
                $grpcode = '00'.$grpcode;
            }elseif (strlen($grpcode) == 2){
                $grpcode = '0'.$grpcode;
            }elseif (strlen($grpcode) == 3){
                $grpcode = $grpcode;
            }
            $groupcode = $item.$faccode.'-'.$grpcode;
        }else{
            $groupcode = $item.$faccode.'-001';
        }
        return $groupcode;
    }


    public function validateNumber($number) {
        // Country codes
        $ccodes = array('233');
        $carriers = array('023','024','054','055','027','057','028','028','020','050','026','056');
        // Clear all symbols
        $number = str_replace(' ', '', $number);
        $number = preg_replace('/[^\p{L}\p{N}\s]/u', '', $number);
        if(is_numeric($number)){
            if(strlen($number) >= 9){
                if(strlen($number) == 12){
                    // Get the country code
                    $ccode = substr($number, 0, 3);
                    // Check country code
                    if(in_array($ccode, $ccodes)){
                        return $number;
                    }else{
                        return 'ERR: Invalid country code';
                    }
                }else if(strlen($number) == 9){
                    return $this->validateNumber('0'.substr($number, 0, 9));
                }else  if(strlen($number) == 10){
                    $carrier = substr($number, 0, 3);
                    if(in_array($carrier, $carriers)){
                        return '233'.substr($number, 1, 9);
                    }else{
                        return 'ERR: Invalid carrier';
                    }
                }else if(strlen($number) == 11){
                    return 'ERR: The length of the number is incorrect';
                }else if(strlen($number) == 13){
                    $ccode = substr($number, 0, 3);
                    if(in_array($ccode, $ccodes)){
                        return $number;
                    }else{
                        return 'ERR: Invalid country code';
                    }
                }
            }else{
                return 'ERR: The length of the number is incorrect';
            }
            if(strlen($number) > 13){
                return 'ERR: The length of the number is incorrect';
            }
        }else{
            return 'ERR: The number is not numeric';
        }
    }#end

    public function createErrorFile($fileName, $content) {
        $file = fopen(JPATH_ROOT.DS.'errorfiles'.DS.$fileName.'.csv', 'wb');
        fwrite($file, $content);
        fclose($file);
    }

    public function createReportFile($fileName, $content) {
        $file = fopen(JPATH_ROOT.DS.'userreports'.DS.$fileName.'.csv', 'wb');
        foreach ($content as  $value) {
            # code...
            fputcsv($file, $value);
        }
        fclose($file);
    }

    public function getKeyword($keycode){
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT CG_NAME FROM sms_keywords WHERE CG_CODE = ".$this->sql->Param('a')." "),array($keycode));
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            return $obj->CG_NAME;
        }
    }




}
