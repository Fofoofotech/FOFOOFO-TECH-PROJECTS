<?php

$compandetails =$engine->getActorDetails();
$actor_id = $session->get("actorid");
$startdate = date("Y-m-d H:m:s");
$crypt = new cryptCls();
$code=new  codesClass();
$actorid = $session->get("userid");
$actorname = $engine->getActorName();
$pgnate = new OS_Paginations();
// $attachpic = new upload();

switch($viewpage){

    // 20 JUL 2019 TILLER
    case "resetpassword":
        //echo 'test';
        //exit();
        $duplicatekeeper = $session->get("post_key");
        if($microtime != $duplicatekeeper){

            $session->set("post_key",$microtime);
            if(empty($usrpwd)  ){

                $msg = "Failed. Required field(s) can't be empty!.";
                $status = "error";
                $view ='chgpwd';

            }else{

                $inputpwd = $crypt->loginPassword($inputusername,$usrpwd);

                // f8f8456cab858fa86414e552d04302e082efaada94c176d24e5cf1be2c986607
                $stmtp = $sql->Execute($sql->Prepare("UPDATE area_agent_connect SET USR_PASSWORD  = ".$sql->Param('1').",  USR_ACTOR = ".$sql->Param('2')." ,USR_PLAYERID = ".$sql->Param('3')."  WHERE USR_CODE = ".$sql->Param('a')." "),array($inputpwd,$actorname,$actorcode,$agentcode));



                $msg = "Agent Password Change Successfully.";
                $status = "success";
                $view="";


                $activity = 'Agent Password Changed for : '.$agentcode.' by '.$actorname;
                $engine->setEventLog('048',$activity);

                $view ='';

            }
        }



        break;



    case "save":
// echo 'Jeusus is lord';exit;
//   echo $Command.'<br>'.$unit.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag.'<br>'.$rank.'<br>'.$arm .'<br>'.$sname.'<br>'.$fname.'<br>'.$dstatus.'<br>'.$mobile.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname;exit;


  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


        if(!empty($tag && $Command && $mobile && $rank && $arm || $unit || $department)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $rank=$_POST['rank'];
      $arm=$_POST['arm'];
      $rankarray=explode("@@",$rank);
      $armarray=explode("@@",$arm);
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      $department1=explode("@@",$department);
      
     

      //Check if username is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT DR_TAG FROM pol_drivers WHERE DR_TAG = ? "),array($tag));
      print $sql->ErrorMsg();

      if($stmt){ 

          if($stmt->RecordCount() == 0){

                // $picturez=$attachpic->uploadimage("picturename",DRIVER_IMAGES);q
       
                $ucocode=$code->genericCodeGeneratorbis('pol_drivers','DRV','DR_CODE');
  
               $insert=$sql->Execute($sql->Prepare("INSERT INTO pol_drivers(DR_CODE,DR_FIRSTNAME,DR_SURNAME,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK
               )VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"),array($ucocode,$fname,$sname,$genderz,$email,$mobile,$dstatus,$actorname,$tag,$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$department1[0],$department1[1],$armarray[0],$armarray[1],$rankarray[0],$rankarray[1]));
                 print $sql->ErrorMsg();
      // $insertedid = $sql->Insert_ID();


       
                  $activity = 'New Driver : '.$rankarray[1].' '.$sname.' With Unit : '.$unitarray[1].' Has Been Created By : '.$actorname;
                   $engine->setEventLog('005',$activity);
       
                   $msg = "Success: Driver captured successfully.";
                   $status = "success";
                   $target ='';
            }else{
               
                $msg = "Failed. Driver already exists.";
                   $status = "error";
                   $target ='add';
            }
        
         }
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $target ='add';
         }

  }
   
        break;

    case "edit":
       
       

        $stmtdata = $sql->Execute($sql->Prepare("SELECT DR_CODE,DR_FIRSTNAME,DR_SURNAME,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $edobj = $stmtdata->FetchNextObject();
        // $edobj=$estmt->FetchNextObject();                             
        $fname=$edobj->DR_FIRSTNAME;
        $sname=$edobj->DR_SURNAME;
       $unit=$edobj->DR_UNITCODE;
       $rank=$edobj->DR_RANKCODE;
       $Command=$edobj->DR_COMMANDCODE;
       $arm=$edobj->DR_ARMCODE;
       $email=$edobj->DR_EMAIL;
       $contact=$edobj->DR_CONTACT;
       $status=$edobj->DR_STATUS;
       $tag=$edobj->DR_TAG;
       


 break;



case "details":

  $printpath="public/setup/managedrivers/view/details.php?keys=".$keys;

  
    
break;      




 case'update':
    // echo$keys; //exit;
    // echo $status;//exit;

      $duplicatekeeper = $session->get("post_key");
      if($microtime != $duplicatekeeper){
      $session->set("post_key",$microtime);

      if(!empty($mobile || $unit || $sname)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $rank=$_POST['rank'];
      $arm=$_POST['arm'];
      $rankarray=explode("@@",$rank);
      $armarray=explode("@@",$arm);
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      $department1=explode("@@",$department);
      
     
      // DR_CODE,DR_FIRSTNAME,DR_SURNAME,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK
         
       $stmt=$sql->Execute($sql->Prepare("UPDATE pol_drivers SET DR_FIRSTNAME=?,DR_SURNAME=?,DR_EMAIL=?,DR_CONTACT=?,DR_STATUS=?,DR_COMMANDCODE=?,DR_COMMANDNAME=?,DR_UNITNAME=?,DR_UNITCODE=?,DR_DEPARTMENTCODE=?,DR_DEPARTMENTNAME=?,DR_ARMCODE=?,DR_ARM=?,DR_RANKCODE=?,DR_RANK=? WHERE DR_CODE=? "),array($fname,$sname,$email,$mobile,$dstatus,$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$department1[0],$department1[1],$armarray[0],$armarray[1],$rankarray[0],$rankarray[1],$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){

                   $activity = 'Driver : '.$rankarray[1].' '.$sname.' With Unit : '.$unitarray[1].' Has Been Updated By : '.$actorname;
                   $engine->setEventLog('013',$activity);
                   $msg = "Success: Driver Edited successfully.";
                   $status = "success";
                   $target ='';
                }

            

             }else{
                 $msg = 'Unsuccessful: Please you cannot update. All Fields are Required';
                 $status = 'error'; $target ='edit';
                 }
   
         }     


break;





    case "delete":

         // echo "we gonna delete ayyd".$keys; exit;


 $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


        $stmtuser = $sql->Execute($sql->Prepare("SELECT DR_SURNAME,DR_RANK,DR_UNITNAME FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $obj = $stmtuser->FetchNextObject();
        $drsuname = $obj->DR_SURNAME;
        $drtagz = $obj->DR_RANK;
        $drtunit = $obj->DR_UNITNAME;

        // $newagentid = $agentidcode."_del_".$agentdelid;
        $stmt = $sql->Execute($sql->Prepare("UPDATE pol_drivers SET DR_STATUS='4' WHERE DR_CODE=".$sql->Param('a')." "),array($keys));



        $msg = "Driver Profile Deleted Successfully.";
        $status = "success";
        $view="";


        $activity = 'Driver : '.$drtagz.' '.$drsuname.', with Unit : '.$drtunit.' has Been Deleted by : '.$actorname;
        $engine->setEventLog('012',$activity);

        }

        break;

    case "reset":

        $fdsearch="";
        break;


}


if(!empty($fdsearch)){
    $query = "SELECT DR_CODE,DR_FIRSTNAME,DR_OTHERNAME,DR_SURNAME,DR_CONTACT, DR_USERNAME,DR_STATUS FROM pol_drivers WHERE DR_COMPID=".$sql->Param('a')." AND DR_FIRSTNAME LIKE ".$sql->Param('a')." OR DR_SURNAME LIKE ".$sql->Param('a')." OR DR_CONTACT LIKE ".$sql->Param('a')." OR DR_USERNAME LIKE ".$sql->Param('a')." ";
    $input = array($compid,'%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%');
}else{
    $query = "SELECT DR_CODE,DR_FIRSTNAME,CONCAT(DR_RANK,' ',DR_SURNAME) AS NAMERANKZ,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK FROM pol_drivers WHERE DR_STATUS!='4' ";
    $input = array();
}


$comnds=$sql->GETALL($sql->Prepare("SELECT COM_CODE,COM_NAME FROM pol_commands WHERE COM_STATUS='1'"),array());
$dptnmt=$sql->GETALL($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_STATUS='1'"),array());
$unntsz=$sql->GETALL($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_STATUS='1'"),array());

$armyrank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='AR0001'"),array());
$airforcerank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='NA0002'"),array());

$navyrank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='AI0003'"),array());

$polarm=$sql->GETALL($sql->Prepare("SELECT ARM_NAME,ARM_CODE FROM pol_arm WHERE ARM_STATUS='1'"),array());



if(!isset($limit)){
    $limit = $session->get("limited");
}elseif(empty($limit)){
    $limit =20;
}
$session->set("limited",$limit);
$lenght = 10;
$paging = $pgnate->OS_Pagination($sql,$query,$limit,$lenght,'pg=ad2376beebecdcf7846ba973fa1a005b&option=905c524e71dfa8d56af39437e8c2607e',$input);






include('model/js.php');
?>