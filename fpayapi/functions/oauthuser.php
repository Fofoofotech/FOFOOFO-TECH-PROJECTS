<?php

/**
 * oauthuser short summary.
 *
 * oauthuser description.
 *
 * @version 1.0
 * @author tiller
 */
class oauthuser  extends REST
{
    function __construct(){
        parent::__construct();
        global $sql;
        $this->sql=$sql;
    }
    function Init(){
        $sql=$this->sql;
        $stmt = $sql->Execute($sql->Prepare("SELECT CLNT_TOKEN FROM fpay_tokens WHERE CLNT_TOKEN =".$sql->Param('a')." "),array($this->token));
        print $sql->ErrorMsg();        
      
        if ($stmt->RecordCount()>0){
            
            return true;
        }else{
              
            $this->response(array('data'=>'error','msg'=>'Please Provide A Valid client Token'), 401);
              return false;
        }
       
      
    }
}