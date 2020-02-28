<?php

/**
 * logout short summary.
 *
 * logout description.
 *
 * @version 1.0
 * @author tiller
 */

class logoutclient extends REST
{
    public function __construct(){
        parent :: __construct();
        global $sql,$session;
        $this->sql=$sql;
        $this->session=$session;
    }
    function Init(){
        $sql=$this->sql;
        if($logout = true){
            $userid = $this->session->get('userid',$this->userid);

            $userid = $this->session->del('userid',$userid);
            $userfullname = $this->session->del('loginuserfulname',$this->userfullname);
            $usertoken = $this->session->del('token',$this->token);
            $this->session->del('h1');
            $this->session->del('random_seed');
            $this->session->del('hash_key');

            if(empty($userid) && empty($usertoken)){
                $this->response( array('data'=>'true','msg'=>'loged Out',200));
            }else{
                $this->response(array('data'=>'false','msg'=>'loged In',400));
            }
        }else{
            $this->response(array('data'=>'error','msg'=>'Pass Usercode',401));
        }

    }

}