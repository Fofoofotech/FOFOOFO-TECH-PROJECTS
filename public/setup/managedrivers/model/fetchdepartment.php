<?php

include '../../../../config.php';
include SPATH_LIBRARIES.DS."engine.Class.php";
include SPATH_LIBRARIES.DS."doctors.Class.php";
//$encaes = new encAESClass($saltencrypt,'CBC',$pepperdecrypt);
// $engine = new engineClass();
//$doc = new doctorClass();
// $day = Date("Y-m-d");
// $usrcode = $engine->getActorCode();
// $usrname = $engine->getActorName();
// $actor = $engine->getActorDetails();

$discode=$_POST['unitcode'];
$code=explode("@@",$discode);
$commandcode=$code[0];
 // echo($commandcode);exit;
$key=$_POST['keys'];

$dpmnt = $sql->Execute($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_COMND_CODE =? AND DP_STATUS=? "),array($commandcode,'1'));
  
  // var_dump($units);exit;

$estmt=$sql->Execute($sql->Prepare("SELECT DR_CODE,DR_FIRSTNAME,DR_SURNAME,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK FROM pol_drivers WHERE DR_CODE=? "),array($key));
         print $sql->ErrorMsg();
           print_r($estmt);


       $edobj=$estmt->FetchNextObject();                             
       $department=$edobj->DR_DEPARTMENTCODE;
       $sname=$edobj->DR_SURNAME;
       $unit=$edobj->DR_UNITCODE;
       $rank=$edobj->DR_RANKCODE;
       $Command=$edobj->DR_COMMANDCODE;
       $arm=$edobj->DR_ARMCODE;
       $email=$edobj->DR_EMAIL;
       $contact=$edobj->DR_CONTACT;
       $status=$edobj->DR_STATUS;
       $tag=$edobj->DR_TAG;
       


if($dpmnt->RecordCount()>0){?>
   <!-- <option disabled selected>--Select Department--</option> -->
  <?php  while($obj=$dpmnt->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->DP_CODE."@@".$obj->DP_NAME?>" <?php echo (($department == $obj->DP_CODE)?"selected":"");?> ><?php echo $obj->DP_NAME;?></option>
    
 <?php    }
    }else{
echo false ;
    }
    ?>
