<?php
/**
 * Created by Godwins.
 * User: school user
 * Date: 1/11/2018
 * Time: 5:15 PM
 */


$compandetails =$engine->getActorDetails();
$actor_id = $session->get("actorid");
$valid = true;
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

  case "save":

  // echo $Command.'<br>'.$unit.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag;exit;

  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


  if(!empty($name &&  $Command || $unit)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      
      $dpcode=$code->genericCodeGeneratorbis('pol_department','DP','DP_CODE');

      //Check if username is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT DP_NAME FROM pol_department WHERE DP_NAME = ".$sql->Param('a')." "),array($name));
      print $sql->ErrorMsg();
      if($stmt){
          if($stmt->RecordCount() == 0){

      $sql->Execute("INSERT INTO pol_department(DP_CODE,DP_NAME,DP_COMND_CODE,DP_UNIT_NAME,DP_INMPUTEDDATE,DP_UNIT_CODE,DP_COMND_NAME) VALUES(?,?,?,?,?,?,?)",array($dpcode,$name,$Commandarray[0],$unitarray[1],$startdate,$unitarray[0],$Commandarray[1]));
      print $sql->ErrorMsg();
      // $insertedid = $sql->Insert_ID();


       
       $activity = 'New Department created with Department: '.$name.' Department code: '.$dpcode.' username: '.$actorname;
             $engine->setEventLog('004',$activity);
       
           $msg = "Success: Department captured successfully.";
                 $status = "success";
                 $target ='';
        }else{
           $msg = "Failed. Department already exists.";
                   $status = "error";
                   $target ='adduser';
            }
        
         }
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $target ='adduser';
         }

  }

// }
break;



    case "delete":
         // echo $keys;exit;
      $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    if(isset($keys) && !empty($keys)){
      // echo $ekeys;exit;
      // $objusr = $engine->geAllUsersDetails($ekeys);
      
       $sql->Execute("UPDATE pol_department SET DP_STATUS = '2' WHERE DP_CODE = ".$sql->Param('b')." ",array($keys)); 
      
          $activity = 'Department deleted. Department : '.$objusr->DP_NAME.' DP_CODE: '.$objusr->DP_CODE.' by '.$actorname;
              $engine->setEventLog('008',$activity);

               $msg = "Success: Department successfully deleted.";
                 $status = "success";
                 $target ='';
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
      $objdrv = $engine->getdriverDetails($keys);
      $username = $objdrv->DV_USRNAME;//exit;
      
     $passwd = $crypt->loginPassword($usrname,$Password1);
      
       $sql->Execute("UPDATE pol_drivers SET DV_PASSWORD = ".$sql->Param('a').",DV_PASSWRD_CHANGE_STATUS = '2' WHERE DV_CODE = ".$sql->Param('a')." ",array($passwd,$keys));
  print $sql->ErrorMsg();
    
    $activity = 'Password reset for : '.$objdrv->DV_FIRSTNAME.' with username: '.$objdrv->DV_USRNAME.' User Code: '.$objdrv->DV_CODE.' by '.$actorname;
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



         //die($keys);
        $estmt=$sql->Execute($sql->Prepare("SELECT DP_CODE,DP_NAME,DP_COMND_CODE,DP_UNIT_NAME,DP_INMPUTEDDATE,DP_UNIT_CODE,DP_COMND_NAME FROM pol_department WHERE DP_CODE=".$sql->Param('a')." "),array($keys));
       $edobj=$estmt->FetchNextObject();                             
       $name=$edobj->DP_NAME;
       $unit=$edobj->DP_UNIT_NAME;
       $Command=$edobj->DP_COMND_NAME;
      
     

       
    break;
    
    case'update':
   // echo$keys; exit;
   $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    if(!empty($name || $unit || $email)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      
        
           $stmt=$sql->Execute($sql->Prepare("UPDATE pol_department SET DP_NAME=?,DP_COMND_CODE=?,DP_COMND_NAME=?,
           DP_UNIT_NAME=?,DP_UNIT_CODE=? WHERE DP_CODE=? "),array($name,$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){
                   $activity = 'Department edited with name: '.$name;
                   $engine->setEventLog('006',$activity);
                   $msg = "Success: Department edited successfully.";
                   $status = "success";
                   $target ='';
                }

            

             }else{
                 $msg = 'Unsuccessful: Please you cannot update. All Fields are Required';
                 $status = 'error'; $target ='edit';
                 }
   
         }     


break;



case "reset":
  
  $fdsearch="";
  break;
  




}//case view ends
 



if(!empty($fdsearch)){

    $query = "SELECT DP_CODE,DP_NAME,DP_COMND_CODE,DP_UNIT_NAME,DP_INMPUTEDDATE,DP_UNIT_CODE,DP_COMND_NAME FROM pol_department WHERE DP_STATUS='1' AND (DP_NAME LIKE ".$sql->Param('a')." OR DP_COMND_NAME LIKE ".$sql->Param('b')." OR DP_UNIT_NAME LIKE ".$sql->Param('b').") ORDER BY DP_NAME ASC";
    $input = array('%'.$fdsearch.'%', '%'.$fdsearch.'%', $actor_id);
}else{
    $query = "SELECT DP_CODE,DP_NAME,DP_COMND_CODE,DP_UNIT_NAME,DP_INMPUTEDDATE,DP_UNIT_CODE,DP_COMND_NAME FROM pol_department WHERE DP_STATUS='1'  ORDER BY DP_NAME ASC";
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
