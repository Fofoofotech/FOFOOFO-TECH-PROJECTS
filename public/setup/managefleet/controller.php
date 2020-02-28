<?php

$compandetails =$engine->getActorDetails();
$actor_id = $session->get("actorid");
$startdate = date("Y-m-d H:m:s");
$crypt = new cryptCls();
$code=new  codesClass();
$actorid = $session->get("userid");
$actorname = $engine->getActorName();
$pgnate = new OS_Paginations();
// $attachpic = new upload();

switch($viewpage){

    // 20 JUL 2019 TILLER
   

    case "save":

//   echo $Command.'<br>'.$unit.'<br>'.$type.'<br>'.$Password.'<br>'.$usrname.'<br>'.$tag.'<br>'.$rank.'<br>'.$arm .'<br>'.$sname.'<br>'.$fname.'<br>'.$dstatus.'<br>'.$mobile.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname.'<br>'.$fname;exit;


  $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


        if(!empty($vname && $vnum && $arm || $unit || $Command)){

      $unit=$_POST['unit'];
      $Command=$_POST['Command'];
      $arm=$_POST['arm'];
      $ftype=$_POST['ftype'];
      $department=$_POST['department'];

      $armarray=explode("@@",$arm);
      $unitarray=explode("@@",$unit);
      $Commandarray=explode("@@",$Command);
      $department1=explode("@@",$department);
      $fuelarray=explode("@@",$ftype);


      $department2=$department1[0];
      $department3=$department1[1];
      
     

                    //Check if vehicle is unique
      $stmt = $sql->Execute($sql->Prepare("SELECT VH_NUMBER FROM pol_vehicles WHERE VH_NUMBER = ? "),array($vnum));
      print $sql->ErrorMsg();

      if($stmt){ 

          if($stmt->RecordCount() == 0){

                $vehiclecode=$code->genericCodeGeneratorbis('pol_vehicles','VHL-','VH_CODE');
  
                $insert=$sql->Execute($sql->Prepare("INSERT INTO pol_vehicles(VH_CODE,VH_NUMBER,VH_NAME,VH_MODLE,VH_CHASSIS,VH_FUEL_VOLUME,VH_FUELNAME,VH_FUELCODE,VH_COMMANDCODE,VH_COMMANDNAME,VH_UNITNAME,VH_UNITCODE,VH_DEPARTMENTCODE,VH_DEPARTMENTNAME,VH_ARMCODE,VH_ARM)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"),array($vehiclecode,$vnum,$vname,$modle,$chasis,$fuel,$fuelarray[1],$fuelarray[0],$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$department2,$department3,$armarray[0],$armarray[1]));
                 print $sql->ErrorMsg();
      
                 
                  $activity = '[ New Vehicle : '.$modle.' '.$vname.' With Unit : '.$unitarray[1].' Has Been Created By : '.$actorname.']';
                   $engine->setEventLog('017',$activity);
       
                   $msg = "Success: Vehicle captured successfully.";
                   $status = "success";
                   $target ='';
            }else{
               
                   $msg = "Failed. Vehicle already exists.";
                   $status = "error";
                   $target ='add';
            }
        
         }
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $target ='add';
         }

  }
   
        break;




    case "edit":
       
        $stmtdata = $sql->Execute($sql->Prepare("SELECT * FROM pol_vehicles WHERE VH_CODE=".$sql->Param('a')." "),array($keys));

        $edobj = $stmtdata->FetchNextObject();

        $vnum=$edobj->VH_NUMBER;
        $vname=$edobj->VH_NAME;
        $modle=$edobj->VH_MODLE;   
        $chassis=$edobj->VH_CHASSIS;
        $status=$edobj->VH_STATUS;  
        $fuelvolume=$edobj->VH_FUEL_VOLUME;
        $ftype=$edobj->VH_FUELCODE;
        $unit=$edobj->VH_UNITCODE;
        $Command=$edobj->VH_COMMANDCODE;
        $arm=$edobj->VH_ARMCODE;
      


 break;





case "details":

  $printpath="public/setup/managedrivers/view/details.php?keys=".$keys;

  
    
break;      




 case'update':
    

      $duplicatekeeper = $session->get("post_key");
      if($microtime != $duplicatekeeper){
      $session->set("post_key",$microtime);

      if(!empty($vname && $vnum && $arm || $unit || $Command)){

        $unit=$_POST['unit'];
        $Command=$_POST['Command'];
        $arm=$_POST['arm'];
        $ftype=$_POST['ftype'];
        $department=$_POST['department'];
  
        $armarray=explode("@@",$arm);
        $unitarray=explode("@@",$unit);
        $Commandarray=explode("@@",$Command);
        $department1=explode("@@",$department);
        $fuelarray=explode("@@",$ftype);
  
  
        $department2=$department1[0];
        $department3=$department1[1];
        
     
       
       $stmt=$sql->Execute($sql->Prepare("UPDATE pol_vehicles SET VH_NUMBER=?,VH_NAME=?,VH_MODLE=?,VH_CHASSIS=?,VH_FUEL_VOLUME=?,VH_FUELNAME=?,VH_FUELCODE=?,VH_COMMANDCODE=?,VH_COMMANDNAME=?,VH_UNITNAME=?,VH_UNITCODE=?,VH_DEPARTMENTCODE=?,VH_DEPARTMENTNAME=?,VH_ARMCODE=?,VH_ARM=? WHERE VH_CODE=? "),array($vnum,$vname,$modle,$chasis,$fuel,$fuelarray[1],$fuelarray[0],$Commandarray[0],$Commandarray[1],$unitarray[1],$unitarray[0],$department2,$department3,$armarray[0],$armarray[1],$keys));
            print $sql->ErrorMsg();
            //  var_dump( $stmt); exit();

              if ($stmt=true){

                   $activity = 'Vehicle : '.$modle.' '.$vname.' With Unit : '.$unitarray[1].' Has Been Updated By : '.$actorname;
                   $engine->setEventLog('018',$activity);
                   $msg = "Success: Vehicle Edited successfully.";
                   $status = "success";
                   $target ='';
                }

            

             }else{
                 $msg = 'Unsuccessful: Please you cannot update. All Fields are Required';
                 $status = 'error'; $target ='edit';
                 }
   
         }     


break;





    case "delete":

        

 $duplicatekeeper = $session->get("post_key");
  if($microtime != $duplicatekeeper){
    $session->set("post_key",$microtime);


        $stmtuser = $sql->Execute($sql->Prepare("SELECT * FROM pol_vehicles WHERE VH_CODE=".$sql->Param('a')." "),array($keys));

        $obj = $stmtuser->FetchNextObject();
        $vname = $obj->VH_NAME;
        $vmodle = $obj->VH_MODLE;
        $drtunit = $obj->VH_UNITNAME;

        // $newagentid = $agentidcode."_del_".$agentdelid;
        $stmt = $sql->Execute($sql->Prepare("UPDATE pol_vehicles SET VH_STATUS='4' WHERE VH_CODE=".$sql->Param('a')." "),array($keys));

        $msg = "Vehicle Profile Deleted Successfully.";
        $status = "success";
        $view="";


        $activity = '[ Vehicle : '.$vmodle.' '.$vname.', with Unit : '.$drtunit.' has Been Deleted by : '.$actorname.']';
        $engine->setEventLog('019',$activity);

        }

        break;

    case "reset":

        // $fdsearch="";
        break;


}


if(!empty($fdsearch)){

    echo'serching';

    $query = "SELECT * FROM pol_vehicles WHERE VH_STATUS !='4' AND VH_NUMBER LIKE ? OR VH_NAME LIKE ? ";
    $input = array('%'.$fdsearch.'%','%'.$fdsearch.'%');

}else{

    $query = "SELECT * FROM pol_vehicles WHERE VH_STATUS !='4' ";
    $input = array();
}


$comnds=$sql->GETALL($sql->Prepare("SELECT COM_CODE,COM_NAME FROM pol_commands WHERE COM_STATUS='1'"),array());
$dptnmt=$sql->GETALL($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_STATUS='1'"),array());
$unntsz=$sql->GETALL($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_STATUS='1'"),array());

$armyrank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='AR0001'"),array());
$airforcerank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='NA0002'"),array());

$navyrank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='AI0003'"),array());

$polarm=$sql->GETALL($sql->Prepare("SELECT ARM_NAME,ARM_CODE FROM pol_arm WHERE ARM_STATUS='1' AND ARM_CODE!='CI0004'"),array());

$fuel=$sql->GETALL($sql->Prepare("SELECT FUEL_CODE,FUEL_NAME FROM pol_fuel WHERE FUEL_STATUS='1'"),array());



if(!isset($limit)){
    $limit = $session->get("limited");
}elseif(empty($limit)){
    $limit =20;
}
$session->set("limited",$limit);
$lenght = 10;
$paging = $pgnate->OS_Pagination($sql,$query,$limit,$lenght,'pg=ad2376beebecdcf7846ba973fa1a005b&option=905c524e71dfa8d56af39437e8c2607e',$input);






include('model/js.php');
?>