<?php

include '../../../../config.php';


$discode=$_POST['unitcode'];//exit;
$code=explode("@@",$discode);
$commandcode=$code[0];
 // echo($commandcode);exit;
$key=$_POST['keys'];//exit;

$dpmnt = $sql->Execute($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_COMND_CODE =? AND DP_STATUS=? "),array($commandcode,'1'));
  
  // var_dump($dpmnt);exit;

$estmt=$sql->Execute($sql->Prepare("SELECT * FROM pol_vehicles WHERE VH_CODE=? "),array($key));
         print $sql->ErrorMsg();
         $edobj=$estmt->FetchNextObject();                                    
         $department=$edobj->VH_DEPARTMENTCODE;//exit;
       


if($dpmnt->RecordCount()>0){?>
  
  <?php  while($obj=$dpmnt->FetchNextObject()){
?>  
    <option value ="<?php echo $obj->DP_CODE."@@".$obj->DP_NAME?>"<?php echo (($department===$obj->DP_CODE)?"selected":"");?>><?php echo $obj->DP_NAME;?></option>
    
 <?php    }
    }else{
echo false ;
    }
    ?>
