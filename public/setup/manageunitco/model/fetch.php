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
$key=$_POST['keys'];
$discode=$_POST['unitcode'];
$code=explode("@@",$discode);
$newdiscode=$code[0];
// echo($newdiscode);exit;

$units = $sql->Execute($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_COM_CODE =".$sql->Param('1')." AND UNT_STATUS={$sql->Param('a')} "),array($newdiscode,'1'));
  
  // var_dump($units);exit;


 $estmt=$sql->Execute($sql->Prepare("SELECT UNCO_CODE,UNCO_TAGNUM,UNCO_NAME,UNCO_MOBILE,UNCO_EMAIL,UNCO_UNITNAME,UNCO_UNITCODE,UNCO_STATUS,UNCO_RANK,UNCO_ARM,UNCO_COMMANDCODE,UNCO_COMMANDNAME,UNCO_DEPARTMENTCODE,UNCO_DEPARTMENTNAME FROM pol_unit_cos WHERE UNCO_CODE=? "),array($key));
         print $sql->ErrorMsg();
          // print_r($estmt);


       $edobj=$estmt->FetchNextObject();                             
       $name=$edobj->UNCO_NAME;
       $unit=$edobj->UNCO_UNITCODE;
       $rank=$edobj->UNCO_RANK;
       $Command=$edobj->UNCO_COMMANDCODE;
       $arm=$edobj->UNCO_ARM;
       $email=$edobj->UNCO_EMAIL;
       $contact=$edobj->UNCO_MOBILE;
       
     







if($units->RecordCount()>0){?>
   <!-- <option value="">--Select Unit--</option> -->
  <?php  while($obj=$units->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->UNT_CODE."@@".$obj->UNT_NAME?>" <?php echo (($unit == $obj->UNT_CODE)?"selected":"");?>><?php echo $obj->UNT_NAME;?></option>
    <!-- <option disabled selected>-Select Unit-</option>> -->
    
 <?php    }
    }else{
echo false ;
    }
    