<?php

/**
 * loginuser short summary.
 *
 * loginuser description.
 *
 * @version 1.0
 * @author Tiller
 */

class loginclient extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql,$session;
        $this->sql=$sql;
        $this->session=$session;
    }
    function Init(){
        $sql=$this->sql;
        $engine=new engineClass();
        $crypt = new cryptCls();
        $passwordkey = $crypt->loginPassword($this->momonumber,$this->password);

        $stmt = $sql->Execute($sql->Prepare("SELECT * FROM fpay_clients WHERE CLNT_STATUS = '1' AND CLNT_PHONE=? AND CLNT_PASSWORD=? "),array($this->momonumber,$passwordkey));
        print $this->sql->ErrorMsg();

        // var_dump($stmt);exit;

        if($stmt->RecordCount() == 1){
            $arr = $stmt->FetchNextObject();
            $userid = $arr->CLNT_CODE;
            $accstatus = $arr->CLNT_STATUS;
            $userfullname = $arr->CLNT_FULLNAME;
            $userphone = $arr->CLNT_PHONE;
            $email = $arr->AG_EMAIL;
            $photo = $arr->CLNT_EMAIL;
           
            $this->response(array('data'=>'success','msg'=>'New Client Login Successfull'),200);
               return true;
             }else{

                $this->response(array('data'=>'error','msg'=>'Login Failed..!! Invald Userame Or Password'), 201);
                return false;
        }
    }

}