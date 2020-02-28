<?php

class notificationClass extends engineClass {
	
	
	
	/*
	*@name: sendMail()
	*@desc: Send mail
	*@param: $emails => array()
	*@param: $fromName => Sender's name
	*@param: $fromMail => Sender's email address
	*@param: $subject => Email subject
	*@param: $message => Message you want to send accross
	*/
	public function sendMail($emails=array(), $fromName, $fromMail, $subject, $message){
		if((is_array($emails) && count($emails) > 0) && !empty($fromName) && !empty($fromMail) && !empty($subject) && !empty($message)){
			$sendto = implode(',', $emails);
			$headers  = 'From: '.$fromName.' <'.$fromMail.'>' . "\r\n";
			$headers .= 'Reply-To: '.$fromMail."\r\n";
			$headers .= 'Content-type: text/html' . "\r\n";
			$headers .= 'X-Mailer: PHP/'.phpversion()."\n";
			$headers .= 'MIME-Version: 1.0'."\n";
			return mail($sendto, $subject, $message, $headers);
		}else{
			return 'empty.';	
		}
	}
	

	/*
	*@name: sendSMS()
	*@desc: Send SMS
	*@param: $from => "Common Fund"
	*@param: $to => "Reciever's Phonenumber",
	*@param: $message => "Message Content"
	*/
	public function sendSMS($to, $message){
		if(!empty($to) && !empty($message)){
			$url = 'http://smartsmsgh.com:1401/send';
			$tokenUsername = '';
			$tokenPassword = '';
			$phoneNumber = $to; // Phone number of recepient 233545155292
			$senderName = 'COMMON FUND'; // Name of the sender
			$message = $message; // Message to be sent
			                                                            
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
			return $result;
		}else{
			return false;	
		}
	}

	/*
	 * @param: $message => "Message to be sent"
	 * @param: $to => "Any of the user levels"
	 * @param: $userType=>" 0 is District,1 is Regional,2 is Head"
	 * @param: $pageType=> " 0 is Project Page , 1 is Budget Page 2 is Report Page"*/


	public function sendSystemNotification($message,$to,$userType,$pageType){
        $from = $this->getActorUserLevel();
        $date = date('Y-m-d h:m:s');
        $stmt = $this->sql->Execute($this->sql->Prepare("INSERT INTO cf_notification(
                                                        NOTIF_MESSAGE,
                                                        NOTIF_DATE,
                                                        NOTIF_STATUS,
                                                        NOTIF_TO,
                                                        NOTIF_FROM,
														NOTIF_USERLEVELTYPE,
														NOTIF_PAGE
                                                        ) VALUES 
                                                        (
                                                          ".$this->sql->Param('a').",
                                                          ".$this->sql->Param('b').",
                                                          ".$this->sql->Param('c').",
                                                          ".$this->sql->Param('d').",
                                                          ".$this->sql->Param('e').",
														  ".$this->sql->Param('f').",
														  ".$this->sql->Param('w')."
                                                        )"),array($message,$date,"1",$to,$from,$userType,$pageType));
        print $this->sql->errorMsg();
    }

    public function LoadNotification($userlevel){
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT NOTIF_MESSAGE,NOTIF_STATUS,NOTIF_USERLEVELTYPE,NOTIF_PAGE,NOTIF_ID FROM cf_notification WHERE NOTIF_STATUS = '1' AND NOTIF_TO = ".$this->sql->Param('a')."  ORDER BY NOTIF_ID DESC LIMIT 3"),array($userlevel));
        if($stmt->RecordCount() > 0){
            $obj = $stmt->GetRows();
            return $obj;
        }
    }

    public function CountUnreadNotification($userlevel){
	    $stmt = $this->sql->Execute($this->sql->Prepare("SELECT COUNT(NOTIF_ID) AS TOTAL FROM cf_notification WHERE NOTIF_STATUS = '1' AND NOTIF_TO = ".$this->sql->Param('a')." "),array($userlevel));
	    if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            $total = $obj->TOTAL;
            return $total;
        }

    }


	
}