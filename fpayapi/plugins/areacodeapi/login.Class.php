<?php
    /**
     * This class defines the login class 
	 * for the patient
     */
			
	@define('USER_LOGIN_VAR',$uname);
	@define('USER_PASSW_VAR',$pwd);

	class Login{
		private $session;
		private $redirect;
		private $hashkey;
		private $md5 = false;
		private $sha2 = false;
		private $remoteip;
		private $useragent;
		private $connect;
		private $crypt;
        private $jconfig;

	
		public function __construct(){
			global $sql,$session;
			$this->hashkey	=$_SERVER['HTTP_HOST'];
			$this->sha2=true;
			//$this->remoteip = $_SERVER['HTTP_X_REAL_IP'];
			$this->useragent = $_SERVER['HTTP_USER_AGENT'];
			$this->session	=$session;
			$this->connect = $sql;
			$this->crypt = new cryptCls();
            $this->sessionid = $this->session->getSessionID();
			$this->signin();
			
		}
		
		private function signin(){

			if($this->session->get('hash_key'))
			{
			$this->confirmAuth();
			return;
			}
			
			if(USER_LOGIN_VAR=="" || USER_PASSW_VAR == ""){
				
				$this->logout("empty");			
			}
					
			if($this->sha2){
					  $passwrd = $this->crypt->loginPassword(USER_LOGIN_VAR,USER_PASSW_VAR);
					  $uname = USER_LOGIN_VAR;			
			}
	
			$query = "SELECT USR_CODE,USR_FACICODE,USR_SURNAME,USR_OTHERNAME,USR_TOKEN FROM hms_users WHERE USR_STATUS='1' AND USR_USERNAME=".$this->connect->Param('a')." AND USR_PASSWORD=".$this->connect->Param('b');
			
			$stmt = $this->connect->Prepare($query);
			$stmt = $this->connect->Execute($stmt,array($uname,$passwrd));
			print $this->connect->ErrorMsg();

			if($stmt){	

				if($stmt->RecordCount() == 1){ 

				$arr = $stmt->FetchNextObject();
				
				$userid = $arr->USR_CODE;
				$userfacicode = $arr->USR_FACICODE;  
				$accstatus = $arr->USR_STATUS;
				$loginstatus =$arr->USR_SESSION_STATE;
				$logintime = $arr->USR_SESSION_DATETIME;
				$userfullname = $arr->USR_OTHERNAME.' '.$arr->USR_SURNAME;
				$usertoken = $arr->USR_TOKEN;

				//CHECK IF ACCOUNT IS LOCKED
				if($accstatus =='2'){
					$this->logout("locked");
				}

				$this->storeAuth($userid,$userfacicode,$userfullname,$usertoken);
				$this->setLog("1");

				}else{
					$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  with USERNAME:".$uname." and PASSWORD:".USER_PASSW_VAR;
					$ufullname ='';
					$toinsetsession = $this->session->getSessionID();
					$type ='003';
					$query = "INSERT INTO hms_patient_eventlog(EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER) VALUES(".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').")";
					$stmt = $this->connect->Execute($query,array($type,'0',$ufullname,$activity,$this->remoteip,$toinsetsession,$this->useragent));

			        print $this->connect->ErrorMsg();
					$this->logout("wrong");
				}
				
				
			}else{ 
			//error msg
			}
			
		}//end
		
		public function direct($direction=''){
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			header('Cache-Control: no-store, no-cache, must-validate');
			header('Cache-Control: post-check=0, pre-check=0',FALSE);
			header('Pragma: no-cache');
			
			if($direction == 'empty'){
			header('Location: ' . $this->redirect.'&attempt_in=0');	
			}else if($direction == 'wrong'){
			header('Location: ' .$this->redirect.'&attempt_in=1');	
			}else if($direction == 'locked'){
				header('Location: ' .$this->redirect.'&attempt_in=110');
			}else if($direction=="out"){
			header('Location: ' .$this->redirect);	
			}else{
			header('Location: ' .$this->redirect);
			}
		}
		
	public function storeAuth($userid,$userfacicode,$userfullname,$usertoken,$login) {   

		$this->session->set('userid',$userid);
		$this->session->set('h1',$login);
		$this->session->set('userfacicode',$userfacicode);
		$this->session->set('loginuserfulname',$userfullname);
		$this->session->set('usertoken',$usertoken);
		$this->session->set('random_seed',md5(uniqid(microtime()))); 
		$hashkey = md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent);
		$this->session->set('hash_key',$hashkey);
		$this->session->set("LAST_REQUEST_TIME",time());
		
	}//end
	
	public function logout($msg="out"){
		
		if($msg =="out"){		
			//UNLOCK SESSION
			$userid=$this->session->get("userid");
			$this->setLog("0");
		}

		$this->session->del('userid');
		$this->session->del('usernumber');
		$this->session->del('userphoto');
		$this->session->del('loginuserfulname');
		$this->session->del('usertoken');
		$this->session->del('usercountry');
		$this->session->del('h1');
		$this->session->del('random_seed');
		$this->session->del('hash_key');
	}//end
	
	public function confirmAuth(){
		
		$login = $this->session->get("h1");
		$hashkey = $this->session->get('hash_key');
	
		if(md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent) != $hashkey)
		{
			$this->logout();
		}
	}//end
	
	
	private function setLog($act){
		$userid=$this->session->get("userid");
		$ufullname = $this->session->get('loginuserfulname');
		$toinsetsession = $this->session->getSessionID();
		$server = $_SERVER;
		unset($server['CONTEXT_DOCUMENT_ROOT']);
		unset($server['PATH']);
		unset($server['SystemRoot']);
		unset($server['SERVER_ADMIN']);
		unset($server['DOCUMENT_ROOT']);
		unset($server['SERVER_SOFTWARE']);
		unset($server['SERVER_SIGNATURE']);
		$ser = serialize($server);
		$query = "INSERT INTO hms_patient_eventlog(EVL_EVTCODE,EVL_USERID,EVL_FULLNAME,EVL_ACTIVITIES,EVL_IP,EVL_SESSION_ID,EVL_BROWSER,EVL_RAW) VALUES(".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('g').")";
		if($act == "1"){
			$type ='001';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}else if($act == "0"){
			$userid = ($userid == "0")?"-1":$userid;
			$type ='002';
			$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
		}
		
        $stmt = $this->connect->Execute($query,array($type,$userid,$ufullname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$ser));
          print $this->connect->ErrorMsg();
       }
  
	}
?>