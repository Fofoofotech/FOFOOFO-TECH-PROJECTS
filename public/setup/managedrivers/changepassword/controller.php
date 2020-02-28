<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 31-Jan-19
 * Time: 10:34 AM
 */

$crypt = new cryptCls();
$compid = $engine->getActorDetails()->USR_FACICODE;
$compalias = $engine->getFacilityDetails()->FACI_ALIAS;
$compbranchid = $engine->getActorDetails()->USR_BRANCHCODE;
$actor_id = $session->get("userid");
$actorname = $engine->getActorName();
$actorcode = $engine->getActorCode();
$actorname = $engine->getActorName();
$startdate = date("Y-m-d H:m:s");
$tokenid = $engine->generateAPIKey();
//echo $compalias;exit;

switch($viewpage) {


    case "resetpassword":

        $duplicatekeeper = $session->get("post_key");
        if($microtime != $duplicatekeeper){

            $session->set("post_key",$microtime);
            if(empty($usrpwd)  ){

                $msg = "Failed. Required field(s) can't be empty!.";
                $status = "error";
               // $view ='chgpwd';

            }else{
                $stmt = $sql->Execute($sql->Prepare("SELECT DR_USERNAME FROM area_drivers WHERE DR_CODE = ".$sql->Param('a')." "),array($drivercode));
                print $sql->ErrorMsg();

                $obj = $stmt->FetchNextObject();

                $inputpwd = $crypt->loginPassword($obj->DR_USERNAME,$usrpwd);


                $stmtp = $sql->Execute($sql->Prepare("UPDATE area_drivers SET DR_PASSWORD  = ".$sql->Param('1')." WHERE DR_CODE = ".$sql->Param('a')." "),array($inputpwd,$drivercode));



                $msg = "Driver Password Change Successfully.";
                $status = "success";
                $view="";


                $activity = 'Driver Password Changed for : '.$agentcode.' by '.$actorname;
                $engine->setEventLog('048',$activity);

                $view ='back';

            }
        }



        break;






}



$newkeys = $crypt->decrypt($drivercode);
$stmtdata = $sql->Execute($sql->Prepare("SELECT * FROM area_drivers WHERE DR_CODE = ".$sql->Param('a')." "),array($newkeys));

$obj = $stmtdata->FetchNextObject();
$agentcode =  $obj->DR_CODE;
$fname =  $obj->DR_FIRSTNAME;
$midname =  $obj->DR_OTHERNAME;
$surname =  $obj->DR_SURNAME;
$contactno =  $obj->AG_CONTACT;
$agentcode =  $obj->DR_CODE;
$img = $obj->DR_UNAME;

?>