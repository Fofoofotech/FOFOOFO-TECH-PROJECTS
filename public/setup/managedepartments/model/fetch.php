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
$newdiscode=$code[0];
// echo($newdiscode);exit;

$units = $sql->Execute($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_COM_CODE =".$sql->Param('1')." AND UNT_STATUS={$sql->Param('a')} "),array($newdiscode,'1'));
  
  // var_dump($units);exit;

if($units->RecordCount()>0){?>
   <option value="">--Select Unit--</option>
  <?php  while($obj=$units->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->UNT_CODE."@@".$obj->UNT_NAME?>"><?php echo $obj->UNT_NAME;?></option>
    
 <?php    }
    }else{
echo false ;
    }
    ?>
