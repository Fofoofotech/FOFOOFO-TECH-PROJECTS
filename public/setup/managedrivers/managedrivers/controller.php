<?php

//print_r($_POST);
$innerdashmenu = $menus->getMenuViewAccessRightInnerDashDriver();
$crypt = new cryptCls();
//$compid = $engine->getActorDetails()->USR_FACICODE;
//echo $compid;exit;
$compid = $engine->getCompCode();

//echo $compid;exit;

$compalias = $engine->getFacilityDetails()->FACI_ALIAS;
$compbranchid = $engine->getActorDetails()->USR_BRANCHCODE;
$actor_id = $session->get("userid");
$actorname = $engine->getActorName();
$actorcode = $engine->getActorCode();
//$actorname = $engine->getActorName();
$startdate = date("Y-m-d H:m:s");
$tokenid = $engine->generateAPIKey();
$agentauth = $engine->getCompAgentAuth($compid);
//echo $compalias;exit;

switch($viewpage){

    // 20 AUG 2018 JOSEPH ADORBOE
    case "resetpassword":
        //echo 'test';
        //exit();
        $duplicatekeeper = $session->get("post_key");
        if($microtime != $duplicatekeeper){

            $session->set("post_key",$microtime);
            if(empty($usrpwd)  ){

                $msg = "Failed. Required field(s) can't be empty!.";
                $status = "error";
                $view ='chgpwd';

            }else{

                $inputpwd = $crypt->loginPassword($inputusername,$usrpwd);

                // f8f8456cab858fa86414e552d04302e082efaada94c176d24e5cf1be2c986607
                $stmtp = $sql->Execute($sql->Prepare("UPDATE area_agent_connect SET USR_PASSWORD  = ".$sql->Param('1').",  USR_ACTOR = ".$sql->Param('2')." ,USR_PLAYERID = ".$sql->Param('3')."  WHERE USR_CODE = ".$sql->Param('a')." "),array($inputpwd,$actorname,$actorcode,$agentcode));



                $msg = "Agent Password Change Successfully.";
                $status = "success";
                $view="";


                $activity = 'Agent Password Changed for : '.$agentcode.' by '.$actorname;
                $engine->setEventLog('048',$activity);

                $view ='';

            }
        }



        break;



    case "saveagent":
       // echo $dob;exit;

        //Build username
        $inputusername = $inputusername.'@'.$compalias;

$inputpwd = $crypt->loginPassword($inputusername,$usrpwd);
        $duplicatekeeper = $session->get("post_key");
        if($microtime != $duplicatekeeper){
            $session->set("post_key",$microtime);
            if(!empty($inputfname) && !empty($inputlastname) && !empty($phonenumber) || empty($branch)){


                $stmt = $sql->Execute($sql->Prepare("SELECT DR_USERNAME FROM area_drivers WHERE DR_COMPID = ".$sql->Param('a')." AND DR_USERNAME=".$sql->Param('b')." "),array($compid,$inputusername));

                if($stmt->RecordCount()>0){
                    $msg = "Failed, Driver Name Exist already.";
                    $status = "error";
                    $view="add";
                }else {

                    if (!empty($branch)) {


                        $stmt1 = $sql->Execute($sql->Prepare("SELECT MAX(DR_ID) AS DRCODE FROM area_drivers
"));
                        print $sql->ErrorMsg();
                        $obj1 = $stmt1->FetchNextObject();

                        $cod = $obj1->DRCODE;
                        $code = $cod + 1;
                        $drivercode = 'DR' . $code;


                        if ($agentauth == 1) {
                            $agentuserstate = '1';
                            $agentstatus = '1';
                        } elseif ($agentauth == 0) {

                            $agentuserstate = '2';
                            $agentstatus = '2';
                        }


                        $agentdob = date("Y-m-d", strtotime($dob));
                        $stmt = $sql->Execute($sql->Prepare("INSERT INTO area_drivers (DR_CODE,DR_FIRSTNAME,DR_OTHERNAME,DR_SURNAME,DR_DOB,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_ADDRESS,DR_COMPID,DR_UNAME,DR_PICNAME,DR_SIZE,DR_ACTORID,DR_COMPBRANCH,DR_STATUS,DR_USERNAME,DR_PASSWORD,DR_CARTYPE)VALUES(" . $sql->Param('a') . "," . $sql->Param('b') . ", " . $sql->Param('c') . "," . $sql->Param('d') . ", " . $sql->Param('e') . ", " . $sql->Param('f') . "," . $sql->Param('g') . "," . $sql->Param('h') . ", " . $sql->Param('i') . "," . $sql->Param('j') . ", " . $sql->Param('k') . ", " . $sql->Param('l') . "," . $sql->Param('m') . "," . $sql->Param('n') . ", " . $sql->Param('o') . "," . $sql->Param('p') . ", " . $sql->Param('q') . ", " . $sql->Param('r') . "," . $sql->Param('s') . ")"), array($drivercode, $inputfname, $middlename, $inputlastname, $agentdob, $gender, $email, $phonenumber, $address, $compid, $neu_name, $_name_, $_size_, $actor_id, $branch, $agentstatus, $inputusername,$inputpwd,$carstype));


                        $stmtfleets = $sql->Execute($sql->Prepare("UPDATE area_vehicles_primary SET MF_CAR_STATUS='1' WHERE MF_CODE=".$sql->Param('a')." "),array($carstype));


                        //INSERT INTO FLEET SECONDARY TABLE


                        //	$id = $sql->Insert_ID();
                        $tablerowid = $sql->insert_ID();

                        if (is_uploaded_file($_FILES['picturename']['tmp_name'])) {
                            $ext = array('image/pjpeg', 'image/jpeg', 'image/jpg', 'image/png', 'image/x-png', 'image/gif');
                            $rand_numb = md5(uniqid(microtime()));
                            $neu_name = $rand_numb . $_FILES['picturename']['name'];
                            $_name_ = $_FILES['picturename']['name'];
                            $_type_ = $_FILES['picturename']['type'];
                            $_tmp_name_ = $_FILES['picturename']['tmp_name'];
                            $_size_ = $_FILES['picturename']['size'] / 1024;

                            if (in_array($_type_, $ext)) {


                                if (@move_uploaded_file($_tmp_name_, SHOST_AGENTTPHOTO . $neu_name)) {
                                    //echo "bravooooooooooooooooooo";exit;
                                    $stmt = $sql->Execute($sql->Prepare("UPDATE area_drivers SET 
                                  DR_UNAME =" . $sql->Param('a') . ",DR_PICNAME =" . $sql->Param('b') . ",
                                  DR_SIZE =" . $sql->Param('c') . " WHERE DR_CODE =" . $sql->Param('d') . " "),
                                        array($neu_name, $_name_, $_size_, $drivercode));
                                    print $sql->ErrorMsg();

                                }
                            }
                        }


//                        if (is_array($_POST['selectedzones'])) {
//                            foreach ($_POST['selectedzones'] as $index => $value) {
//                                $stmt = $sql->Execute($sql->Prepare("INSERT INTO area_driverzones (DRZ_AGCODE,DRZ_ZONECODE, DRZ_COMPID) VALUES (" . $sql->Param('a') . "," . $sql->Param('b') . "," . $sql->Param('c') . " )"), array($drivercode, $value, $compid));
//
//                            }
//                        }

                        //$stmtp = $sql->Execute($sql->Prepare("INSERT INTO area_agent_connect (USR_CODE,USR_FACICODE, USR_SURNAME,USR_OTHERNAME,USR_PASSWORD,USR_USERNAME,USR_EMAIL,USR_PHONENO,USR_ADDRESS,USR_COMPBRANCH,USR_ACTOR,USR_TOKEN,USR_STATE) VALUES (" . $sql->Param('a') . "," . $sql->Param('b') . "," . $sql->Param('c') . "," . $sql->Param('d') . "," . $sql->Param('e') . "," . $sql->Param('f') . "," . $sql->Param('g') . "," . $sql->Param('h') . "," . $sql->Param('i') . "," . $sql->Param('j') . "," . $sql->Param('k') . "," . $sql->Param('l') . "," . $sql->Param('m') . " )"), array($agentcode, $compid, $inputlastname, $inputfname, $inputpwd, $inputusername, $email, $phonenumber, $address, $branch, $actor_id, $tokenid, $agentuserstate));


                        $faccodein = $compid;

                        $msg = "New Drivers Profile Created Successfully.";
                        $status = "success";
                        $view = "";


                        $activity = 'New Driver Profile Created with the name: ' . $inputfname . " " . $middlename . " " . $inputlastname . ' by ' . $actorname;
                        $engine->setEventLog('084', $activity);
                        $code = '084';
                        $menudetailscode = '0031';
                        $desc = 'New Driver Profile Created Successfully.';

                        //$engine->setNotification($code, $desc, $menudetailscode, $tablerowid, $sentto = "", $faccodein = "");

                        $view = '';
                    }else {
                        $msg = "Please You cannot save. Add Branch";
                        $status = "error";
                    }

                }//


            }

        }

        break;

    case "managedriver":


        $stmtdata = $sql->Execute($sql->Prepare("SELECT DR_FIRSTNAME,DR_OTHERNAME,DR_SURNAME,DR_CONTACT,DR_UNAME,DR_DOB,DR_ADDRESS,DR_USERNAME FROM area_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $obj = $stmtdata->FetchNextObject();
        $drivercode =  $obj->DR_CODE;
        $session->set('drivercode',$drivercode);
        $fname =  $obj->DR_FIRSTNAME;
        $midname =  $obj->DR_OTHERNAME;
        $surname =  $obj->DR_SURNAME;
        $contactno =  $obj->DR_CONTACT;
        $drivercode =  $obj->DR_CODE;
        $img = $obj->DR_UNAME;
        $agentdob = date("d/m/Y",strtotime($obj->DR_DOB));
        $address = $obj->DR_ADDRESS;
        //$agentzone = $obj->ZON_NAME;
        $agentid = $obj->DR_USERNAME;

        $stmttrans = $sql->Execute($sql->Prepare("SELECT VHZ_ZONECODE FROM area_vehicle_zone LEFT JOIN area_drivers ON VHZ_VEHICHLE_CODE = DR_CARTYPE WHERE DR_CODE = ".$sql->Param('a')." "),array($keys));
        $objx = $stmttrans->FetchNextObject();
        $zonesbatch = $objx->VHZ_ZONECODE;

        $zonetest = explode(",",$zonesbatch);
         //$zonetest2 = "'".implode(" ' ",$zonesbatch)." ' ";

        $zonetest2 = '"'.implode('","', $zonetest).'"';

        $stmtzones= $sql->GetAll($sql->Prepare("SELECT ZON_NAME from area_zones WHERE ZON_CODE IN ($zonetest2)"), array());

//print_r($stmtzones);exit;
        break;

    case "deleteagent":


        $stmtuser = $sql->Execute($sql->Prepare("SELECT USR_USERID,USR_USERNAME FROM area_agent_connect WHERE USR_CODE=".$sql->Param('a')." "),array($keys));

        $obj = $stmtuser->FetchNextObject();
        $agentidcode = $obj->USR_USERNAME;
        $agentdelid = $obj->USR_USERID;


        $newagentid = $agentidcode."_del_".$agentdelid;
        $stmt = $sql->Execute($sql->Prepare("UPDATE area_agents SET AG_STATUS='0' WHERE AG_CODE=".$sql->Param('a')." "),array($keys));


        $stmtp = $sql->Execute($sql->Prepare("UPDATE area_agent_connect SET USR_USERNAME=".$sql->Param('a')." WHERE USR_CODE=".$sql->Param('a')." "),array($newagentid,$keys));



        $msg = "Agent Profile Deleted Successfully.";
        $status = "success";
        $view="";


        $activity = 'Agent '. $agentidcode .' Profile Deleted Successfully by' .$actorname;
        $engine->setEventLog('051',$activity);

        //$desc='New Agent Profile Created Successfully.';

        //$engine->setNotification($code,$desc,$menudetailscode,$tablerowid,$sentto="",$faccodein="");

        break;

    case "reset":

        $fdsearch="";
        break;


}

//if($viewpage == 'searchinvtype' && !empty($inputstatus) ){
/*if(!empty($fdsearch)){
    $query = "SELECT AG_CODE,AG_FIRSTNAME,AG_OTHERNAME,AG_SURNAME,AG_CONTACT, USR_USERNAME,AG_STATUS FROM area_agents LEFT JOINJOIN area_agent_connect ON AG_CODE = USR_CODE WHERE AG_COMPID=".$sql->Param('a')." AND AG_STATUS = ".$sql->Param('a')." AND AG_FIRSTNAME LIKE ".$sql->Param('a')." OR AG_SURNAME LIKE ".$sql->Param('a')." OR AG_CONTACT LIKE ".$sql->Param('a')." OR USR_USERNAME LIKE ".$sql->Param('a')." ";
    $input = array($compid,$inputstatus,'%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%');
}else{
    $query = "SELECT AG_CODE,AG_FIRSTNAME,AG_OTHERNAME,AG_SURNAME,AG_CONTACT, USR_USERNAME,AG_STATUS FROM area_agents LEFT JOIN area_agent_connect ON AG_CODE = USR_CODE WHERE AG_COMPID=".$sql->Param('a')." AND AG_STATUS = ".$sql->Param('b')." ";
    $input = array($compid,$inputstatus);
}
}elseif(!empty($fdsearch)){
*/
if(!empty($fdsearch)){
    $query = "SELECT DR_CODE,DR_FIRSTNAME,DR_OTHERNAME,DR_SURNAME,DR_CONTACT, DR_USERNAME,DR_STATUS FROM area_drivers WHERE DR_COMPID=".$sql->Param('a')." AND DR_FIRSTNAME LIKE ".$sql->Param('a')." OR DR_SURNAME LIKE ".$sql->Param('a')." OR DR_CONTACT LIKE ".$sql->Param('a')." OR DR_USERNAME LIKE ".$sql->Param('a')." ";
    $input = array($compid,'%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%');
}else{
    $query = "SELECT DR_CODE,DR_FIRSTNAME,DR_OTHERNAME,DR_SURNAME,DR_CONTACT, DR_USERNAME,DR_STATUS FROM area_drivers WHERE DR_COMPID=".$sql->Param('a')." ";
    $input = array($compid);
}




$stmtcommission = $sql->Execute($sql->Prepare("SELECT * from areab_commissions where COM_STATUS='1' AND COM_INSTCODE=".$sql->Param('a')." "), array($compid));
$stmtbranches = $sql->GetAll($sql->Prepare("SELECT BRN_CODE,BRN_NAME from area_set_branch where BRN_CODE IN ({$branchcode})"), array());
//die(var_dump($stmtbranches));
$stmtreg = $coder->getRegions();

$stmtbranchlist = $sql->Execute($sql->Prepare("SELECT BRN_CODE,BRN_NAME from area_set_branch WHERE BRN_INSTCODE=".$sql->Param('a')." "), array($compid));




if(!isset($limit)){
    $limit = $session->get("limited");
}else if(empty($limit)){
    $limit =20;
}
$session->set("limited",$limit);
$lenght = 10;
$paging = new OS_Pagination($sql,$query,$limit,$lenght,'pg=8e64a609e66214066595e6300aaab281&option=905c524e71dfa8d56af39437e8c2607e&uiid=c7e0e599d2520ee7fda7a45375e0e1b5',$input);






include('model/js.php');
?>