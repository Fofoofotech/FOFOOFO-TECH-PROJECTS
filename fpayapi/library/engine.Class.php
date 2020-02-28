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

    public function getUserDetails($userid){
        $stmt = $this->sql->Prepare("SELECT * FROM fpay_clients WHERE CLNT_CODE = ".$this->sql->Param('a')." ");
        $stmt = $this->sql->Execute($stmt,array($userid));
        if($stmt && ($stmt->RecordCount() > 0)){
            return $stmt->FetchNextObject();
        }else{
            print $this->sql->ErrorMsg();
            return false;
        }

    }//end of getActorsDetails

    /**
     * this function is use to return actors full name.
     * @return <string>
     */
    public function getUserName($userid,$compcode){
        $obj = $this->getUserDetails($userid,$compcode);
        return $obj->USR_OTHERNAME.' '.$obj->USR_SURNAME;
    }// end getActorName


   
    public function generateAPIKey(){
        $length = '64';
        $token = bin2hex(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length));
        return $token;
    }//end of generateAPIKey

    public function getAPIKey($userid){
        $stmt = $this->sql->Prepare("SELECT USR_TOKEN FROM salon_user WHERE USR_ID=".$this->sql->Param('a')." AND USR_STATUS = '1' ");
        $stmt = $this->sql->Execute($stmt,array($userid));
        if($stmt && ($stmt->RecordCount() > 0)){
            $obj = $stmt->FetchNextObject();
            return $obj->PATAPI_VALUE;
        }else{
            return false;
        }
    }//end of getAPIKeys

    public function setEventLog($event_type,$agentcode,$agentname,$activity,$compcode){
        $actor_id = $this->getUserDetails($agentcode,$compcode)->USR_USERID;
        $fullname = (!empty($agentname)?$agentname:$this->getUserName($agentcode,$compcode));
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $sessionid = $this->session->getSessionID();

        $stmt = $this->sql->Prepare("INSERT INTO fpay_eventlog (EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_SESSION_ID,EVL_BROWSER,EVL_COMPCODE) VALUES (".$this->sql->Param('1').",".$this->sql->Param('2').",".$this->sql->Param('3').",".$this->sql->Param('4').",".$this->sql->Param('5').",".$this->sql->Param('6').",".$this->sql->Param('7').")");
        $stmt = $this->sql->Execute($stmt,array($event_type,$actor_id,$fullname,$activity,$sessionid,$useragent,$compcode));
        print $this->sql->ErrorMsg();
    }//end

    /**
     * Function for all code generations
     * @param $table
     * @param $prefix
     * @param $code_column
     * @return string
     */
    public function generateCode__($table, $prefix, $code_column,$compcode){
        $code_column = strtoupper($code_column);
      
        $final = uniqid($prefix.$compcode.'-') ;
        #check if code already exists
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
        if($stmt->RecordCount()>0){
            return  $this->generateCode($table, $prefix, $code_column,$compcode);
        }
        
        return $final ;
    }
    function generateCode($table,$prefix,$base_col,$compcode){
    global $sql;
    $no_prec = 3;#Maximum number of preceding Zeros;
    $stmt = $sql->Execute($sql->Prepare("SELECT {$base_col} FROM {$table} ORDER BY RIGHT ($base_col,$no_prec) DESC LIMIT 1"));
    print $sql->ErrorMsg();
    if($stmt->RecordCount() > 0){
        $obj = $stmt->FetchNextObject();
        $rawcount = substr($obj->$base_col,strlen($prefix));
        $rawcount = $rawcount + 1;
        $multiplier = $no_prec - strlen($rawcount);
        $multiplier = $multiplier <= 0 ? 0 : $multiplier ;
        $code = str_repeat("0",$multiplier) . $rawcount;
    }else{
        $code = str_repeat("0",$no_prec) . 1;
    }
 $stmt = $sql->Execute($sql->Prepare("SELECT {$base_col} FROM {$table} WHERE {$base_col} ={$this->sql->Param('a')}"),[$prefix.$code]);
   if($stmt->RecordCount() > 0){
   	   $code= $code = str_repeat("0",$no_prec) . $rawcount ++;
     return $prefix.$code;
   }
    return $prefix.$code;
}
   

    public function random($timebase = false){
        $m1 = rand(10,50);
        $m2 = rand(50,99);
        if ($timebase){
            return  time() . rand(10*$m1, 100*$m2);
        }
        return rand(10*$m1, 100*$m2);

    }

    /**
     * Generates a public ID for the client
     * @param $zone_name
     * @return string
     */
    public function genClientNum($zone_name){
        do{
            $uid = $this->random();
            $splt = explode(" ",$zone_name);
//            die(var_dump($splt));
            $prefix = '';
            if(count($splt) > 1){
                foreach ($splt as $word){
                    $prefix .=  substr($word,0,1);
                }
            }else{
                $prefix =  substr($zone_name,0,3);
            }
            $final = $prefix.$uid;
            #check if this already exists for a client
            $checkSql = $this->sql->Execute("select CLNT_NUM from area_clients where area_clients.CLNT_NUM ='{$final}'",[]);
        }while( $checkSql->RecordCount() > 0);

        return  strtoupper($final);
    }


    public function upload($file,$target_dir,$neu_name="-1",$size="-1"){
        $format_types = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
        $uploadit = $uploadpass_size = $uploadpass_type = true;
        $neu_name = ($neu_name == "-1")?basename($_FILES[$file]["name"]):$neu_name;
        $ext = explode('.', $neu_name);//explode file name from dot(.)
        $file_extension = end($ext); //store extensions in the variable
        $filename= md5($ext[0]) . "." . $ext[1];
        //$target_file = $target_dir.DS.$neu_name;
        $target_file = $target_dir.DS.$filename;

        //check file exits
        if (!file_exists($target_file)) {
            $uploadit = true;
        } else {
            //$uploadit = false;
        }

        //check file size
        if ($size != "-1" && $_FILES[$file]["size"] > $size) {
            $uploadpass_size = false;
        }

        //check format
        if(!in_array($_FILES[$file]["type"],$format_types)){
            $uploadpass_type = false;
        }
        if($uploadit && $uploadpass_size && $uploadpass_type){

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {

                //return $neu_name;
                return $filename;
            } else {
                return $_FILES[file]["error"];
            }
        }else{
            return false;
        }
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



    public function getRcode(){
        $random_hash = substr(md5(uniqid(rand(), true)), 16, 8);
        $micro=date('ys');
        return $micro.''.$random_hash;
    }


    /**
     * Generate a clients number
     * @param $prefix
     * @return string
     */
    
    public function clientNumber___($prefix){
        return $this->genericCodeGenerator('area_clients',$prefix,'CLNT_NUM',3);
    }
     

    
    /**
     * Function to generate codes
     * @param $table
     * @param $prefix
     * @param $code_column
     * @param int $number_of_digits
     * @return string
     */
    public function genericCodeGenerator($table, $prefix, $code_column,$number_of_digits = 10){
        $code_column = strtoupper($code_column);
        //        $no_prec = 10;#Maximum number of preceding Zeros;
        $no_prec = $number_of_digits;#Maximum number of preceding Zeros;
        $pref_len = strlen($prefix);
        $pref_len_m = $pref_len+1;
        $surplus = $no_prec - $pref_len;
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT  MAX(CAST( SUBSTRING({$code_column} FROM {$pref_len_m}) AS UNSIGNED)) AS {$code_column}  FROM {$table} WHERE {$code_column} LIKE '{$prefix}%'  LIMIT 1"));
        print $this->sql->ErrorMsg();
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            $prev_code = $obj->$code_column ? $obj->$code_column : 0 ;
            $next_code = $prev_code + 1;
            //            die(var_dump([$prev_code,$prefix]));
            $multiplier = $no_prec - strlen($next_code);
            $multiplier = $multiplier <= 0 ? 0 : $multiplier ;
            $code = str_repeat("0",$multiplier) . $next_code;
        }else{
            $code = str_repeat("0",$no_prec) . 1;
        }
        $final = $prefix.$code;
        #check if code already exists
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
        if($stmt->RecordCount()>0){
            return  $this->genericCodeGenerator($table, $prefix, $code_column);
        }
        return $final ;
    }


    public function countries() {
        return array(        '93','355','213','1684','376','244','1264','1268','54','374','297','61','43','994','1242','973','880','1246','375','32','501','229','1441','975','591','387','267','55','673','359','226','257','855','237','1','238','1345','236','235','56','86','61','57','269','242','243','682','506','385','53','357','420','225','45','253','1767','593','20','503','240','291','372','251','500','298','679','358','33','594','689','262','241','220','995','49','233','350','30','299','1473','590','1671','502','44','224','245','592','509','504','852','36','354','91','62','98','964','353','972','39','1876','81','44','962','7','254','686','850','82','996','856','371','961','266','231','218','423','370','352','853','389','261','265','60','960','223','356','692','596','222','230','262','52','691','373','377','976','382','1664','212','258','95','264','674','977','31','687','64','505','227','234','683','672','1670','47','968','92','680','970','507','675','595','51','63','870','48','351','787','974','40','7','250','262','590','685','378','239','966','221','381','248','232','65','421','386','677','252','27','34','94','290','1869','1758','249','597','47','268','46','41','963','886','992','255','66','670','228','690','676','1868','216','90','993','1649','688','265','380','971','44','1','598','998','678','58','84','681','212','967','260','263'
        );
    }


    public function validateNumber($number) {
        // Country codes
        $cnumber = '';
        $ccodes = $this->countries();
        // Clear all symbols
        $number = str_replace(' ', '', $number);
        $number = preg_replace('/[^\p{L}\p{N}\s]/u', '', $number);
        $number = preg_replace('/^00/', '', $number);
        foreach($ccodes as $ccode){
            $cnumber = '*';
            if(preg_match('/^'.$ccode.'/', $number) == true){
                $cnumber = $ccode;
            }
        }
        if(is_numeric($number)){
            if($cnumber == 233 || $cnumber == '*'){
                $carriers = array('023','024','054','055','027','057','028','028','020','050','026','056');
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
                return $number;
            }
        }else{
            return 'ERR: The number is not numeric';
        }
    }#end


    /*
     * This function generates code
     */
    public function generateCode_bk($table, $prefix, $code_column){
        $code_column = strtoupper($code_column);
        $no_prec = 10;#Maximum number of preceding Zeros;
        $pref_len = strlen($prefix);
        $pref_len_m = $pref_len+1;
        $surplus = $no_prec - $pref_len;
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT  MAX(CAST( SUBSTRING({$code_column} FROM {$pref_len_m}) AS UNSIGNED)) AS {$code_column}  FROM {$table} LIMIT 1"));
        print $this->sql->ErrorMsg();
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            $prev_code = $obj->$code_column;
            $next_code = $prev_code + 1;
            $multiplier = $no_prec - strlen($next_code);
            $multiplier = $multiplier <= 0 ? 0 : $multiplier ;
            $code = str_repeat("0",$multiplier) . $next_code;
        }else{
            $code = str_repeat("0",$no_prec) . 1;
        }
        $final = $prefix.$code;
        #check if code already exists
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
        if($stmt->RecordCount()>0){
            return  $this->generateCode_bk($table, $prefix, $code_column);
        }

        return $final ;
    }




    
    
    public function sendTransactionSMS($companyname,$companycode,$clientphonenumber,$countrycode='+233',$clientcatcode,$clientnum,$amt,$tdate,$companycontact,$shortcode,$senderid){
        if (!empty($clientphonenumber)) {
            
            //MSG BUILD UP
            $message = $companyname."\nTag ID: ".$clientnum."\nPaid: GHC".$amt."\nDate: ".date('d/m/Y',strtotime($tdate))."\nCall care: ".$companycontact."\nReceipt http://smartrcs.com/r/" . $shortcode;
            $messagecount = strlen($message);
            $messagecost = ceil($messagecount / 160);
            $smsbalance = $this->getCompBal($companycode);
            $smssendingstatus = ($smsbalance > $messagecost) ? '1' : '0';
            $time = date('Y-m-d H:i:s');
            
           
            $validated = $this->validateNumber($clientphonenumber);
            $msgcode = $this->generateCode('area_sms_message', '', 'MSG_CODE',$companycode);
           
            $this->sql->Execute("INSERT INTO area_sms_message (MSG_CODE,MSG_COMPCODE,MSG_MESSAGE,MSG_TYPE,MSG_STATUS,MSG_DATE) VALUES(" . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . ") ", array($msgcode, $companycode, $message, '1', $smssendingstatus, $time));
            print $this->sql->ErrorMsg();
            if (!preg_match('/ERR/i', $validated)) {
                $prefix2 = 'MSGD-' . date('dmy');
                $msgDcod = $this->generateCode('area_sms_message_details', $prefix2, 'MSGD_CODE',$companycode);
               
                $std = $this->sql->Execute("INSERT INTO area_sms_message_details(MSGD_CODE,MSGD_MSGCODE,MSGD_COMPCODE,MSGD_CLTAGNAME,MSGD_PHONENUMBER,MSGD_TYPE,MSGD_STATUS,MSGD_DATE,MSGD_TOTMSG,MSGD_CLTZONECODE,MSGD_CLTBRANCHCODE,MSGD_CLTCATCODE,MSGD_AGNCODE,MSGD_CLNTTAG) VALUES(" . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . "," . $this->sql->Param('a') . ") ", array($msgDcod, $msgcode, $companycode, $clientname, $validated, '0', $smssendingstatus, $time, '1',$clietcode[27],$clietcode[9],$clientcatcode,$clietcode[2],$clientnum));
                print $this->sql->ErrorMsg();
                if ($smsbalance > $messagecost) {
                    //  Send SMS if sms balance if more than sms cost
                   return array($senderid, $validated, $message);
                    
                }
                
                return false;
                
            }
        }
        
        
    }//end of function
    
    
  
}