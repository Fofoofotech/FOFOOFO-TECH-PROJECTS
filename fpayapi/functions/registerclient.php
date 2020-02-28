

<?php

/**
 * register short summary.
 *
 * register client description.
 *
 * @version 1.0
 * @author tiller
 */
class registerclient extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        $engine=new engineClass();
        $client=new clientClass();
        $crypt = new cryptCls();
        $sql=$this->sql;
     
        $thisdate = date('Y-m-d h:m:s');
        $data=array($this->clientname,$this->contact,$this->email,$this->password,$this->otpcode);
        // $data=[];
  
    if(count($data)>0){

      
                              
        $stmtcheck = $sql->Execute($sql->Prepare("SELECT CLNT_PHONE FROM fpay_clients WHERE CLNT_PHONE =?  "),array($this->contact));
        print $sql->ErrorMsg();  

        // $edobj = $stmtcheck->FetchNextObject();
        // echo  $edobj ->CLNT_PHONE;
                                    // CHECKING UNIQUE CLIENT DETAILS 
        if($stmtcheck->RecordCount() > 0){

            $this->response(array('data'=>'error','msg'=>'client Exist Already Try Using A Different MoMo Number'), 401);
            return false;

                          // INSERTING  CLIENT DATA VALUES
                    }else{

                              $password = $crypt->loginPassword($this->contact,$this->password);

                              $clientcode = $client->generateCode('fpay_clients','CLT-','CLNT_CODE');
                        
                                $stmtinsert=$this->sql->Execute("INSERT INTO fpay_clients(CLNT_CODE,CLNT_FULLNAME,CLNT_PHONE,CLNT_EMAIL,CLNT_PASSWORD,CLNT_PHONE_CODE) VALUES(?,?,?,?,?,?)",array($clientcode,$this->clientname,$this->contact,$this->email,$password,$this->otpcode));
                                print $sql->ErrorMsg();        
                            
                //  var_dump($stmt);exit; 
                        if($stmtinsert==true){
                            $eventype = '013';
                            $activity = 'A new client has been registered by agent with code ' . $this->agentcode;     
                            $engine->setEventLog($eventype, $this->agentcode, $this->agentname, $activity,$this->clientcompanycode);

                                $this->response(array('data'=>'success','msg'=>'New Client Registered Successfuly'),  200);
                                return true;
                            }else{
                                                
                                $this->response(array('data'=>'error','msg'=>'New Client Registered Fail'), 201);
                                return false;
                        }
                
                   }
                
        }else{
            $this->response(array('data'=>'error','msg'=>'Provided Fields Cannot be empty'), 404);
            return false;
    
        }

                

        }
        }
