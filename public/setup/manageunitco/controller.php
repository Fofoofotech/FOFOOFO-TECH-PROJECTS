<?php
/**
 * Created by Godwins.
 * User: polqerwi user
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

  // echo $Command.'<br>'.$unit.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag.'<br>'.$rank.'<br>'.$arm ;exit;


  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


  if(!empty($name && $Command && $contact && $tag && $rank && $arm || $unit || $department)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      $department1=explode("@@",$department);
      
      $ucocode=$code->genericCodeGeneratorbis('pol_unit_cos','UCO','UNCO_CODE');

      //Check if username is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT UNCO_NAME FROM pol_unit_cos WHERE UNCO_NAME = ".$sql->Param('a')." "),array($name));
      print $sql->ErrorMsg();
      if($stmt){
          if($stmt->RecordCount() == 0){

     $insert= $sql->Execute($sql->Prepare("INSERT INTO pol_unit_cos(UNCO_CODE,UNCO_TAGNUM,UNCO_NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"),array($ucocode,$tag,$name,$contact,$email,$unitarray[1],$unitarray[0],$status,$rank,$arm,$Commandarray[0],$Commandarray[1],$department1[0],$department1[1]));
      print $sql->ErrorMsg();
      // $insertedid = $sql->Insert_ID();


       
       $activity = 'New Unit C.O created with Name: '.$name.' Unit code: '.$ucocode.' username: '.$actorname;
             $engine->setEventLog('014',$activity);
       
           $msg = "Success: Unit C.O captured successfully.";
                 $status = "success";
                 $target ='';
        }else{
           $msg = "Failed. Unit C.O already exists.";
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
      
           $estmt=$sql->Execute($sql->Prepare("SELECT UNCO_CODE,UNCO_TAGNUM,UNCO_NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME FROM pol_unit_cos WHERE UNCO_CODE=? "),array($keys));
            print $sql->ErrorMsg();
           $edobj=$estmt->FetchNextObject();                             
           $name=$edobj->UNCO_NAME;
           $unit=$edobj->UNCO_UNITCODE;
           $rank=$edobj->UNCO_RANK;
           $Command=$edobj->UNCO_COMMANDCODE;
           $arm=$edobj->UNCO_ARM;
           $email=$edobj->UNCO_EMAIL;
           $contact=$edobj->UNCO_MOBILE;
           $status=$edobj->UNCO_STATUS;




          $sql->Execute("UPDATE pol_unit_cos SET UNCO_STATUS = '2' WHERE UNCO_CODE = ".$sql->Param('b')." ",array($keys)); 
      
          $activity = 'Department deleted. Department : '.$name.' with CODE: '.$Keys.' by '.$actorname;
              $engine->setEventLog('016',$activity);

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
      
       $sql->Execute("UPDATE pol_unit_cos SET DV_PASSWORD = ".$sql->Param('a').",DV_PASSWRD_CHANGE_STATUS = '2' WHERE DV_CODE = ".$sql->Param('a')." ",array($passwd,$keys));
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



         // die($keys);
       $estmt=$sql->Execute($sql->Prepare("SELECT UNCO_CODE,UNCO_TAGNUM,UNCO_NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME FROM pol_unit_cos WHERE UNCO_CODE=? "),array($keys));
         print $sql->ErrorMsg();
       $edobj=$estmt->FetchNextObject();                             
       $name=$edobj->UNCO_NAME;
       $unit=$edobj->UNCO_UNITCODE;
       $rank=$edobj->UNCO_RANK;
       $Command=$edobj->UNCO_COMMANDCODE;
       $arm=$edobj->UNCO_ARM;
       $email=$edobj->UNCO_EMAIL;
       $contact=$edobj->UNCO_MOBILE;
       $status=$edobj->UNCO_STATUS;
       
         break;
    
    case'update':
    // echo$keys; exit;
    // echo $status;//exit;

      $duplicatekeeper = $session->get("post_key");
      if($microtime != $duplicatekeeper){
      $session->set("post_key",$microtime);

      if(!empty($name || $unit || $email)){

      $department=$_POST['department'];
      $unit=$_POST['unit'];
      $Command=$_POST['Command'];

      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      $department1=explode("@@",$department);
      
      
        
       $stmt=$sql->Execute($sql->Prepare("UPDATE pol_unit_cos SET UNCO_NAME=?,UNCO_MOBILE=?,UNCO_EMAIL=?,UNCO_RANK=?,UNCO_ARM=?,UNCO_COMMANDCODE=?,UNCO_COMMANDNAME=?,UNCO_UNITNAME=?,UNCO_UNITCODE=?,UNCO_DEPARTMENTNAME=?,UNCO_DEPARTMENTCODE=?,UNCO_STATUS=? WHERE UNCO_CODE=? "),array($name,$contact,$email,$rank,$arm,$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$department1[1],$department1[0],$status,$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){
                   $activity = 'Department edited with name: '.$name;
                   $engine->setEventLog('015',$activity);
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

    $query = "SELECT DP_CODE,DP_NAME,DP_COMND_CODE,DP_UNIT_NAME,DP_INMPUTEDDATE,DP_UNIT_CODE,DP_COMND_NAME FROM pol_unit_cos WHERE DP_STATUS='1' AND (DP_NAME LIKE ".$sql->Param('a')." OR DP_COMND_NAME LIKE ".$sql->Param('b')." OR DP_UNIT_NAME LIKE ".$sql->Param('b').") ORDER BY DP_NAME ASC";
    $input = array('%'.$fdsearch.'%', '%'.$fdsearch.'%', $actor_id);
}else{
    $query = "SELECT UNCO_CODE,UNCO_TAGNUM,CONCAT(UNCO_RANK,' ',UNCO_NAME) AS NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME FROM pol_unit_cos WHERE UNCO_STATUS!='2'  ORDER BY UNCO_NAME ASPC";

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
$dptnmt=$sql->GETALL($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_STATUS='1'"),array());
$unntsz=$sql->GETALL($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_STATUS='1'"),array());


include('model/js.php')

?>
<script type="text/javascript">
  document.ready()



</script>