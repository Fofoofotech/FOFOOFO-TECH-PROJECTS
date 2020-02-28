<?php
/**
 * Created by Godwins.
 * User: school user
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

$compandetails=$engine->getActorDetails();
$actor_id = $session->get("actorid");
$errorfile = '';
$insertarray = array();
$wrongnumbers = array();
$startdate = date("Y-m-d H:m:s");
$crypt = new cryptCls();
$code=new  codesClass();
$actorid = $session->get("userid");
$actorname = $engine->getActorName();
$pgnate = new OS_Paginations();
// $actorgroup = $engine->getUsergroup();

switch ($viewpage){

  case "saveuser":
 
  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    // echo $adminusername;exit;


  if(!empty($fname && $contact && $email && $Password && $adminusername )){

    

      // echo $name.'<br>'.$contact.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag;exit;

      $fr = substr($fname,0,1);
      $usrcode = $engine->getUserCode();
      $finalcode = strtoupper($fr).$usrcode;

     
      
     
      //Set Password
      $inputpwd = $crypt->loginPassword($adminusername,$Password);


      //Check if username is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT USR_USERNAME FROM fpay_user WHERE USR_USERNAME = ? AND USR_STATUS !='2' "),array($adminusername));
      print $sql->ErrorMsg();
      if($stmt){
          if($stmt->RecordCount() == 0){

      $sql->Execute("INSERT INTO fpay_user(USR_CODE,USR_NAME,USR_PASSWORD,USR_USERNAME,USR_EMAIL,USR_CONTACT,USR_USERTYPE,USR_STATUS) VALUES(?,?,?,?,?,?,?,?)",array($finalcode,$fname,$inputpwd,$adminusername,$email,$contact,$acceslevel,$status));
      print $sql->ErrorMsg();
      $insertedid = $sql->Insert_ID();



       
       $activity = 'New Admin User '.$fname.' Has Been Created With  Username :  '.$adminusername.' by :'.$actorname;
             $engine->setEventLog('004',$activity);
       
           $msg = "Success: Admin User captured successfully.";
                 $status = "success";
                 $view ='list';
        }else{
           $msg = "Failed. Username [".$adminusername."] already exists.";
                   $status = "error";
                   $view ='add';
            }
        
         }
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $view ='add';
         }

  }

// }
break;



    case "delete":
      $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    if(isset($keys) && !empty($keys)){
      // echo $ekeys;exit;
      $objusr = $engine->geAllUsersDetails($ekeys);
      
       $sql->Execute("UPDATE fpay_user SET USR_DELETE_STATUS = '2', USR_STATUS = '2', USR_DELETE_DATE = ".$sql->Param('a')." WHERE USR_CODE = ".$sql->Param('b')." ",array($startdate,$keys)); 
      
          $activity = 'User deleted. User fullname : '.$objusr->USR_NAME.' with username: '.$objusr->USR_USERNAME.' User Code: '.$objusr->USR_CODE.' by '.$actorname;
              $engine->setEventLog('008',$activity);

               $msg = "Success: User successfully deleted.";
                 $status = "success";
                 $view ='list';
    }
  }
  break;

 


case "resetpwd":
 $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);
  if(isset($keys) && !empty($keys))
  {
      if(!empty($Password1) && ($Password1 == $Password2)){
      //Get username
      $objusr = $engine->geAllUsersDetails($ekeys);
      $username = $objusr->USR_USERNAME;//exit;
      
     $passwd = $crypt->loginPassword($usrname,$Password1);
      
       $sql->Execute("UPDATE fpay_user SET USR_PASSWORD = ".$sql->Param('a').",USR_CHANGE_PASSWORD_STATUS = '0' WHERE USR_CODE = ".$sql->Param('a')." ",array($passwd,$keys));
  print $sql->ErrorMsg();
    
    $activity = 'Password reset for : '.$objusr->USR_NAME.' with username: '.$objusr->USR_USERNAME.' User Code: '.$objusr->USR_CODE.' by '.$actorname;
     $engine->setEventLog('007',$activity);
  
           $msg = "Success: Password successfully reset.";
                 $status = "success";
                 $target ='list';
    }else{
             $msg = "Failed. Password mismatch. Re-enter the password.";
                 $status = "error";
                 $target ="reset";
      
       }  
  }
}
  break;

    

 
        case'edit':

            // die($keys);
           $estmt=$sql->Execute($sql->Prepare("SELECT * FROM fpay_user WHERE USR_CODE=".$sql->Param('a')." "),array($keys));
            $edobj=$estmt->FetchNextObject();                             
            $name=$edobj->USR_NAME;
            $usrname=$edobj->USR_USERNAME;
            $contact=$edobj->USR_CONTACT;
            // $Password=$edobj->USR_PLAINPASS;
            $email=$edobj->USR_EMAIL;
            $type=$edobj->USR_USERTYPE;
            $Alevel=$edobj->USR_USERTYPE;
            // $edobj->USR_CODE;
          

       
    break;
    
    case'update':
   // echo$keys; exit;

   $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    if(!empty($name || $contact)){
        
           $stmt=$sql->Execute($sql->Prepare("UPDATE fpay_user SET USR_NAME=?,USR_CONTACT=?,
           USR_EMAIL=?,USR_USERTYPE=? WHERE USR_CODE=? "),array($name,$contact,$email,$type,$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){
                   $activity = 'User edited with full name : '.$name.'By : '.$actorname;
                   $engine->setEventLog('006',$activity);
                   $msg = "Success: User edited successfully.";
                   $status = "success";
                   $target ='';
                }

            

             }else{
                 $msg = 'Unsuccessful: Please you cannot update. All Fields are Required';
                 $status = 'error'; $target ='add';
                 }
   
         }     


break;

}//case view ends
 



if(!empty($fdsearch)){

    $query = "SELECT * FROM fpay_user WHERE USR_STATUS AND (USR_NAME LIKE ".$sql->Param('a')." OR USR_USERNAME LIKE ".$sql->Param('b')." OR USR_CONTACT LIKE ".$sql->Param('b').") ORDER BY USR_NAME ASC";
    $input = array('%'.$fdsearch.'%', '%'.$fdsearch.'%',$actor_id);
}else{
    $query = "SELECT USR_ID,USR_CODE,USR_CONTACT,USR_NAME,USR_USERNAME,USR_PLAINPASS,USR_EMAIL,USR_STATUS,USR_USERTYPE FROM fpay_user WHERE USR_USERTYPE !='2'  AND USR_STATUS='1'  ORDER BY USR_NAME ASC";
     $input = array();

    
    
}

if(!isset($limit)){
    $limit = $session->get("limited");
}else if(empty($limit)){
    $limit = 20;
}
$session->set('limited', $limit);
$lenght = 10;
$paging = $pgnate->OS_Pagination($sql, $query, $limit, $lenght, 'index.php?action=index&pg='.$pg.'&option='.$option, $input);


$comnds=$sql->GETALL($sql->Prepare("SELECT COM_CODE,COM_NAME FROM pol_commands WHERE COM_STATUS='1'"),array());

include('model/js.php')

?>
