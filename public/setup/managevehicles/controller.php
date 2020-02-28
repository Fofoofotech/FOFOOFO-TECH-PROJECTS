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
// $actorgroup = $engine->getUsergroup();

switch ($viewpage){

  case "saveuser":
  echo $Vehichle.'<br>'.$unit.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag;exit;
  echo "bravoooooooooooooo";exit;
  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


  if(!empty($name && $contact  && $Password && $usrname && $status && $tag && $Command && $unit && $Vehichle )){

      // echo $name.'<br>'.$contact.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag;exit;

      $fr = substr($name,0,1);
      $usrcode = $engine->getUserCode();
      $finalcode = strtoupper($fr).$usrcode;

     
      
     
      //Set Password
      $inputpwd = $crypt->loginPassword($usrname,$Password);

      $drvcode=$code->genericCodeGeneratorbis('pol_drivers', 'DRV','DV_CODE');

      //Check if username is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT DV_USRNAME FROM pol_drivers WHERE DV_USRNAME = ".$sql->Param('a')." "),array($usrname));
      print $sql->ErrorMsg();
      if($stmt){
          if($stmt->RecordCount() == 0){

      $sql->Execute("INSERT INTO pol_drivers(DV_CODE,DV_TAGNUM,DV_FIRSTNAME,DV_MOBILE,DV_EMAIL,DV_USRNAME,DV_STATUS,DV_UNITCODE,DV_VIHICLECODE,DV_CREATEDDATE,DV_COMMANDCODE,DV_PASSWORD,DV_OFFICE_CODE,DV_UNIT_CO_CODE) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)",array($drvcode,$tag,$name,$contact,$email,$usrname,$status,$unit,$Vehichle,$startdate,$Command,$inputpwd,$office,$uco));
      print $sql->ErrorMsg();
      $insertedid = $sql->Insert_ID();


       
       $activity = 'New Driver created with full name: '.$name.' user code: '.$drvcode.' username: '.$usrname;
             $engine->setEventLog('004',$activity);
       
           $msg = "Success: Driver captured successfully.";
                 $status = "success";
                 $view ='list';
        }else{
           $msg = "Failed. Driver already exists.";
                   $status = "error";
                   $view ='adduser';
            }
        
         }
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $view ='adduser';
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
      
       $sql->Execute("UPDATE pol_drivers SET DV_STATUS = '2' WHERE DV_CODE = ".$sql->Param('b')." ",array($keys)); 
      
          $activity = 'Driver deleted. Driver fullname : '.$objusr->DV_FIRSTNAME.' with username: '.$objusr->DV_USRNAME.' User Code: '.$objusr->DV_CODE.' by '.$actorname;
              $engine->setEventLog('008',$activity);

               $msg = "Success: Driver successfully deleted.";
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
        $estmt=$sql->Execute($sql->Prepare("SELECT DV_CODE,DV_TAGNUM,DV_FIRSTNAME,DV_MOBILE,DV_EMAIL,DV_USRNAME,DV_STATUS,DV_UNITCODE,DV_VIHICLECODE,DV_CREATEDDATE,DV_COMMANDCODE,DV_PASSWORD,DV_OFFICE_CODE,DV_UNIT_CO_CODE FROM pol_drivers WHERE DV_CODE=".$sql->Param('a')." "),array($keys));
       $edobj=$estmt->FetchNextObject();                             
       $name=$edobj->DV_FIRSTNAME;
       $usrname=$edobj->DV_USRNAME;
       $contact=$edobj->DV_MOBILE;
       // $Password=$edobj->USR_PLAINPASS;
       $email=$edobj->DV_EMAIL;
       $type=$edobj->USR_USERTYPE;
       $Alevel=$edobj->USR_USERTYPE;
       $unit=$edobj->DV_UNITCODE;
       $Vehichle=$edobj->DV_VIHICLECODE;
       $Command=$edobj->DV_COMMANDCODE;
       // $inputpwd=$edobj->USR_USERTYPE;
       $office=$edobj->DV_OFFICE_CODE;
       $uco=$edobj->USR_USERTYPE;
       // $edobj->USR_CODE;
     

       
    break;
    
    case'update':
   // echo$keys; exit;

   $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);

    if(!empty($name || $unit || $email)){
        
           $stmt=$sql->Execute($sql->Prepare("UPDATE pol_drivers SET DV_FIRSTNAME=?,DV_MOBILE=?,
           DV_EMAIL=?,DV_UNITCODE=? WHERE DV_CODE=? "),array($name,$contact,$email,$type,$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){
                   $activity = 'Driver edited with full name: '.$name;
                   $engine->setEventLog('006',$activity);
                   $msg = "Success: Driver edited successfully.";
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

    $query = "SELECT USR_ID,USR_CONTACT,USR_NAME,USR_USERNAME,USR_PLAINPASS,USR_EMAIL,USR_STATUS FROM pol_drivers WHERE USR_STATUS AND (USR_NAME LIKE ".$sql->Param('a')." OR USR_USERNAME LIKE ".$sql->Param('b')." OR USR_CONTACT LIKE ".$sql->Param('b').") ORDER BY USR_NAME ASC";
    $input = array('%'.$fdsearch.'%', '%'.$fdsearch.'%', $actor_id);
}else{
    $query = "SELECT DV_CODE,DV_TAGNUM,DV_FIRSTNAME,DV_MOBILE,DV_EMAIL,DV_USRNAME,DV_STATUS,DV_UNITCODE,DV_VIHICLECODE,DV_CREATEDDATE,DV_COMMANDCODE,DV_PASSWORD,DV_OFFICE_CODE,DV_UNIT_CO_CODE FROM pol_drivers WHERE USR_USERTYPE !='5'  AND USR_STATUS='1'  ORDER BY USR_NAME ASC";
    
}

if(!isset($limit)){
    $limit = $session->get("limited");
}else if(empty($limit)){
    $limit = 20;
}
$session->set('limited', $limit);
$lenght = 10;
$paging = new OS_Pagination($sql, $query, $limit, $lenght, 'index.php?action=index&pg='.$pg.'&option='.$option, $input);


$comnds=$sql->GETALL($sql->Prepare("SELECT COM_CODE,COM_NAME FROM pol_commands WHERE COM_STATUS='1'"),array());

include('model/js.php')

?>
