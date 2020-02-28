<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 17-Apr-19
 * Time: 10:16 AM
 */

include("../../../../config.php");
include SPATH_LIBRARIES.DS."engine.Class.php";
$engine = new engineClass();
$compid = $engine->getCompCode();
echo $branch."test";
$stmt=$sql->Execute($sql->Prepare("SELECT MF_CODE,MF_CARNUMBER,MF_CARTYPE FROM area_vehicles_primary WHERE MF_CAR_STATUS='0' AND MF_STATUS = '1' AND MF_BRANCHCODE = ".$sql->Param('a')."  AND MF_COMPID = ".$sql->Param('a')." "),array($branch,$compid));
print $sql->errormsg();
if($stmt->RecordCount()>0){
    $result.='<option value="" >Select Fleet</option>';

    while($obj = $stmt->FetchNextObject()){
        $result.='<option value="'.$obj->MF_CODE.'">'.$obj->MF_CARTYPE." - ".$obj->MF_CARNUMBER.'</option>';
    }

}else{
    $result.='<option value="">Select Fleet</option>';
}
echo $result;


?>