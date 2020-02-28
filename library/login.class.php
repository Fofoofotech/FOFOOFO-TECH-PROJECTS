<?php
    /**
     *@desc this class handles all the client end log in details and methods
     *@desc this depands on the connect.php and Session.class.php
     */

	@define('USER_LOGIN_VAR', str_replace(' ', '', $uname));

	@define('USER_PASSW_VAR',$pwd);
	 @define('USER_DO_LOG',$doLogin);
	// @define('USER_CAPTCHA_TXT', $txtcaptha);



	class Login{
		private $session;
		private $redirect;
		private $hashkey;
		private $md5 = false;
		private $sha2 = false;
		private $remoteip;
		private $useragent;
		private $sessionid;
		private $result;
		private $connect;
		private $crypt;
    	private $jconfig;
// die("dfgdgfdgf");
// echo USER_DO_LOG;
		public function __construct(){
			global $sql,$session;
			$this->redirect ="index.php?action=login";
			$this->hashkey	=$_SERVER['HTTP_HOST'];
			$this->sha2=true;
			$this->remoteip = $_SERVER['REMOTE_ADDR'];
			$this->useragent = $_SERVER['HTTP_USER_AGENT'];
			$this->session	=$session;
			$this->connect = $sql;
			$this->crypt = new cryptCls();
     	    $this->sessionid = $this->session->getSessionID();
			$this->signin();

		}

		private function signin(){
			$passwrd = $this->crypt->loginPassword(USER_LOGIN_VAR,USER_PASSW_VAR);
	 	// die($passwrd);			

			if($this->session->get('hash_key'))
			{
			$this->confirmAuth();
			return;
			}
	
	//  echo USER_PASSW_VAR;
// die("$passwrd");
			if(isset($_POST['doLogin'])){
				$this->logout();
				}
				// die("lll");
			if(USER_LOGIN_VAR=="" || USER_PASSW_VAR == ""){
				$this->logout("empty");
			}
			
			// if(USER_CAPTCHA_TXT =="" ||($this->session->get('code') != USER_CAPTCHA_TXT)){
		
			//   $this->direct("captchax");
			// }

			if($this->md5){
			}else if($this->sha2){  
			   $passwrd = $this->crypt->loginPassword(USER_LOGIN_VAR,USER_PASSW_VAR);
			}else{
				$passwrd = USER_PASSW_VAR;
			}
	// 		echo $passwrd;
      // die($passwrd); 
		$query = "SELECT * FROM fpay_user WHERE USR_STATUS='1' AND USR_USERNAME=".$this->connect->Param('a')." AND USR_PASSWORD =".$this->  connect->Param('b')."";
		
	
	         $stmt = $this->connect->Prepare($query);
	         $stmt = $this->connect->Execute($stmt,array(USER_LOGIN_VAR,$passwrd));
			 print $this->connect->ErrorMsg();

			//  var_dump($stmt);exit;
			
			if($stmt){
			if($stmt->RecordCount() > 0){ 
				$arr = $stmt->FetchNextObject();
				$userid = $arr->USR_ID;
				$accstatus = $arr->USR_STATUS;
				$compname = $arr->USR_NAME;
				$infullname = $arr->USR_USERNAME;
				$tokenpswd = $arr->USR_PASSWORD;
				$user_unit = $arr->USR_UNIT;
				$user_contact = $arr->USR_CONTACT;
				$user_department = $arr->USR_DEPARTMENT;
				$user_rank = $arr->USR_RANK;
				
				
				if($accstatus !='1'){
					$this->logout("locked");
				}
				
				$this->storeAuth($userid,$infullname,$compname,$user_contact,$user_unit,$user_department,$user_rank);
				$this->setLog("1");
				header('Location: ' . $this->redirect);
					//actions
                 
				}else{
					
					$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  with USERNAME:".USER_LOGIN_VAR." and PASSWORD:".USER_PASSW_VAR;
					// $server = $_SERVER;
					$ufullname ='';
					$type ='003';
					// $ser = serialize($server);
					$query = "INSERT INTO fpay_eventlog (SEVL_EVTCODE,SEVL_USERID,SEVL_COMPNAME,SEVL_ACTIVITIES,SEVL_IP,SEVL_SESSION_ID,SEVL_BROWSER) 
						 VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",
						       ".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').")";
					   $stmt = $this->connect->Execute($query,array($type,'0',$ufullname,$activity,$this->remoteip,$toinsetsession,$this->useragent));

			        print $this->connect->ErrorMsg();
					$this->logout("wrong");
					//$this->direct("wrong");
					
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
			header('Location: ' .$this->redirect.'&attempt_in=120');
			}else if($direction=="out"){
			header('Location: ' .$this->redirect);
			}else if ( $direction =='captchax'){
			header('Location: ' .$this->redirect.'&attempt_in=11');
			}else{
			header('Location: ' .$this->redirect);
			}
			exit;

		}

		public function storeAuth($userid,$login,$compname,$user_contact,$user_unit,$user_department,$user_rank){
		$this->session->set('actorid', $userid);
		$this->session->set('contact', $user_contact);
		$this->session->set('unit', $user_unit);
		$this->session->set('department', $user_department);
		$this->session->set('rank', $user_rank);
		$this->session->set('loginuserfulname',$compname);
		$this->session->set('h1', $login);
		$this->session->set('random_seed', md5(uniqid(microtime())));
		$hashkey = md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent);
		$this->session->set('hash_key', $hashkey);
		$this->session->set("LAST_REQUEST_TIME",time());
		// $this->session->set('tokenusername', $tokenusr);
		// $this->session->set('tokenpassword', $tokenpswd);
		// $this->session->set('lang','en');
				}//end

					public function logout($msg="out")
	{

		$this->session->del('actorid');
		$this->session->del('loginuserfulname');
		$this->session->del('contact');
		$this->session->del('unit');
		$this->session->del('rank');
		// $this->session->del('department');
		// $this->session->del('department');
		

		$this->session->del('h1');
		$this->session->del('random_seed');
		$this->session->del('hash_key');
		$this->direct($msg);
	}//end

	public function confirmAuth(){

		$login = $this->session->get("h1");
		$hashkey = $this->session->get('hash_key');

		if(md5($this->hashkey . $login .$this->remoteip.$this->sessionid.$this->useragent) != $hashkey)
		{
			$this->logout();
		}else{
			//UPDATE SESSION
			$userid=$this->session->get("actorid");
		}

	}//end

 
 
		 private function setLog($act){ 
		$userid=$this->session->get("actorid");
		$compname = $this->session->get('loginuserfulname');
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

		$query = "INSERT INTO fpay_eventlog (SEVL_EVTCODE,SEVL_USERID,SEVL_COMPNAME,SEVL_ACTIVITIES,SEVL_IP,SEVL_SESSION_ID,SEVL_BROWSER,SEVL_RAW)
				 VALUES (".$this->connect->Param('a').",".$this->connect->Param('b').",".$this->connect->Param('c').",".$this->connect->Param('d').",
				       ".$this->connect->Param('e').",".$this->connect->Param('f').",".$this->connect->Param('g').",".$this->connect->Param('h').")";
		if($act == "1"){
		$type ='001';
		$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();

				}else if($act == "0"){
		$userid = ($userid == "0")?"-1":$userid;
		$type ='002';
		$activity = "From a REMOTE IP:".$this->remoteip." USERAGENT:".$this->useragent."  on SESSION ID:".$this->session->getSessionID();
			}

        $stmt = $this->connect->Execute($query,array($type,$userid,$compname,$activity,$this->remoteip,$toinsetsession,$this->useragent,$ser));
          print $this->connect->ErrorMsg();
       } 
	}
?>