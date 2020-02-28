<?php

include '../../../../config.php';

$key=$_POST['keys'];
$discode=$_POST['unitcode'];
$code=explode("@@",$discode);
$newdiscode=$code[0];
// echo($newdiscode);exit;

$units = $sql->Execute($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_COM_CODE =".$sql->Param('1')." AND UNT_STATUS={$sql->Param('a')} "),array($newdiscode,'1'));
  
  // var_dump($units);exit;

$estmt=$sql->Execute($sql->Prepare("SELECT * FROM pol_vehicles WHERE VH_CODE=? "),array($key));
         print $sql->ErrorMsg();

       $edobj=$estmt->FetchNextObject();                             
        
       $unit=$edobj->VH_UNITCODE;
       






if($units->RecordCount()>0){?>
  
  <?php  while($obj=$units->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->UNT_CODE."@@".$obj->UNT_NAME?>"<?php echo (($unit == $obj->UNT_CODE)?"selected":"");?>><?php echo $obj->UNT_NAME;?></option>
   
    
 <?php    }
    }else{
echo false ;
    }
    