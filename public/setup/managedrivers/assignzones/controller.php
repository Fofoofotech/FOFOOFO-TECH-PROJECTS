<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 31-Jan-19
 * Time: 10:40 AM
 */


$crypt = new cryptCls();
$compid = $engine->getActorDetails()->USR_FACICODE;
$compalias = $engine->getFacilityDetails()->FACI_ALIAS;
$compbranchid = $engine->getActorDetails()->USR_BRANCHCODE;
$actor_id = $session->get("userid");
$actorname = $engine->getActorName();
$startdate = date("Y-m-d H:m:s");
$tokenid = $engine->generateAPIKey();
//echo $compalias;exit;
$agentkeys = $crypt->decrypt($agentkeys);









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


$stmtzonelist = $sql->Execute($sql->Prepare("SELECT AGZ_ZONECODE,ZON_NAME FROM area_agentzones JOIN area_zones ON AGZ_ZONECODE = ZON_CODE WHERE AGZ_AGCODE=".$sql->Param('a')." "), array($agentkeys));

?>