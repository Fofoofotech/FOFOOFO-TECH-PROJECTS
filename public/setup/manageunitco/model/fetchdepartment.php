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

$estmt=$sql->Execute($sql->Prepare("SELECT UNCO_CODE,UNCO_TAGNUM,UNCO_NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME FROM pol_unit_cos WHERE UNCO_CODE=? "),array($key));
         print $sql->ErrorMsg();
           print_r($estmt);


       $edobj=$estmt->FetchNextObject();                             
       $name=$edobj->UNCO_NAME;
       $unit=$edobj->UNCO_UNITCODE;
       $rank=$edobj->UNCO_RANK;
       $Command=$edobj->UNCO_COMMANDCODE;
       $arm=$edobj->UNCO_ARM;
       $email=$edobj->UNCO_EMAIL;
       $contact=$edobj->UNCO_MOBILE;
       $department=$edobj->UNCO_DEPARTMENTCODE;




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
