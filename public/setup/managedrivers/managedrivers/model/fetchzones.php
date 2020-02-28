<?php
include("../../../../config.php");


$stmt=$sql->Execute($sql->Prepare("SELECT ZON_CODE,ZON_NAME,BRN_NAME FROM area_zones LEFT JOIN area_set_branch ON ZON_BRCODE = BRN_CODE WHERE ZON_BRCODE =".$sql->Param('a')." AND ZON_COMPCODE=".$sql->Param('b').""),array($branch,$compcode));


if($stmt->RecordCount()>0){

    while($objx = $stmt->FetchNextObject()){
        $result[] = array(
            "ZONE_CODE"=> $objx->ZON_CODE,
            "ZONE_NAME"=>$objx->ZON_NAME,
            "BRANCH_NAME"=>$objx->BRN_NAME

        ) ;
    }

}else{

}
echo json_encode($result);

?>