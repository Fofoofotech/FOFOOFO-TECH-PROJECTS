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

    

    case "save":

   
//   echo $driverzcode;//exit;

   $duplicatekeeper = $session->get("post_key");

     if($microtime != $duplicatekeeper){
     
         $session->set("post_key",$microtime);

          $vehicle=$_POST['vehicle'];

            if(!empty($vehicle)){

               foreach ($vehicle as $key =>$value) {
              
                 $vehiclevalue=explode("@@",$value);
                 
                 $carcode=$vehiclevalue[0];

                 $carname=$vehiclevalue[1];

                 $carnames[]=$carname;

                 $ucocode=$code->genericCodeGeneratorbis('pol_driver_vehicle_primary','D-V','DV_CODE');

                 $insert=$sql->Execute($sql->Prepare("INSERT INTO pol_driver_vehicle_primary(DV_CODE,DV_DRIVERCODE,DV_VEHICLE_NAME,DV_VEHICLE_CODE)VALUES(?,?,?,?)"),array($ucocode,$driverzcode,$carname,$carcode));
                 print $sql->ErrorMsg();

                  $insertsecondary=$sql->Execute($sql->Prepare("INSERT INTO pol_driver_vehicle_secondary(DV_CODE,DV_DRIVERCODE,DV_VEHICLE_NAME,DV_VEHICLE_CODE)VALUES(?,?,?,?)"),array($ucocode,$driverzcode,$carname,$carcode));
                 print $sql->ErrorMsg();

                $updatevehicle=$sql->Execute($sql->Prepare("UPDATE pol_vehicles SET VH_ASSIGN_STATUS='2',VH_DRIVERCODE=? WHERE VH_CODE=? "),array($driverzcode,$carcode));
                    print $sql->ErrorMsg();
     


               }

               var_dump($carnames);//exit;
               $cars=implode(",",$carnames);//exit;
            
                        $updatedriver=$sql->Execute($sql->Prepare("UPDATE pol_drivers SET DR_ASSIGN_STATUS='2' WHERE DR_CODE=? "),array($driverzcode));
                              print $sql->ErrorMsg();   
                        
                        $activity = '[ Driver  : '.$driverfulname.' , Has Been Assigned To Vehicle(S) : [ '.$cars.']  By : '.$actorname.']';
                            $engine->setEventLog('024',$activity);
       
                           $msg = "Success: Driver Has Been Assigned A Vehicles successfully.";
                           $status = "success";
                           $target ='';
          
      }else{
           $msg = "Failed. Required field(s) cannot be empty.";
                 $status = "error";
                 $target ='assign';
         }

  }
   
        break;






    case "assign":

        $stmtdata = $sql->Execute($sql->Prepare("SELECT * FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $edobj = $stmtdata->FetchNextObject();
        // $edobj=$estmt->FetchNextObject();  
        
       $driverzcode=$edobj->DR_CODE;
       $fname=$edobj->DR_FIRSTNAME;
       $sname=$edobj->DR_SURNAME;
       $unit=$edobj->DR_UNITCODE;
       $unitname=$edobj->DR_UNITNAME;
       $rank=$edobj->DR_RANKCODE;
       $rankname=$edobj->DR_RANK;
       $Command=$edobj->DR_COMMANDCODE;
       $arm=$edobj->DR_ARMCODE;
       $email=$edobj->DR_EMAIL;
       $contact=$edobj->DR_CONTACT;
       $status=$edobj->DR_STATUS;
       $tag=$edobj->DR_TAG;
       $driverfulname=$fname.' '.$sname;
       $drivdepartmentname=$edobj->DR_DEPARTMENTNAME; 
       $drivdepartmentcode=$edobj->DR_DEPARTMENTCODE;   



       if (isset($unit)) {

        $fleets=$sql->GETALL($sql->Prepare("SELECT VH_CODE,VH_NAME,VH_DEPARTMENTNAME,VH_MODLE FROM pol_vehicles WHERE VH_ASSIGN_STATUS='1'  AND (VH_UNITCODE=? OR VH_DEPARTMENTCODE=?)"),array($unit,$drivdepartmentcode));
       
    
       }


       
       

 break;



case "edit":


$stmtdriver = $sql->Execute($sql->Prepare("SELECT * FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

$edobj = $stmtdriver->FetchNextObject();
$driverzcode=$edobj->DR_CODE;
$rankname=$edobj->DR_RANK;
$unit=$edobj->DR_UNITCODE;
$drivdepartmentcode=$edobj->DR_DEPARTMENTCODE; 
$fname=$edobj->DR_FIRSTNAME;
$sname=$edobj->DR_SURNAME;
$driverfulname=$rankname.' '.$fname.' '.$sname;



if (isset($unit)) {

$fleets=$sql->GETALL($sql->Prepare("SELECT VH_CODE,VH_NAME,VH_DEPARTMENTNAME,VH_MODLE FROM pol_vehicles WHERE  (VH_UNITCODE=? OR VH_DEPARTMENTCODE=?)"),array($unit,$drivdepartmentcode));
    

$stmtdata = $sql->Execute($sql->Prepare("SELECT DV_CODE,DV_DRIVERCODE,DV_VEHICLE_NAME,DV_VEHICLE_CODE,DV_STATUS FROM pol_driver_vehicle_primary WHERE DV_DRIVERCODE=".$sql->Param('a')." "),array($driverzcode));
    print $sql->ErrorMsg();

     
       while ($edobj = $stmtdata->FetchNextObject()) {
         
            $vehicode[]=$edobj->DV_VEHICLE_CODE;

            $drivervehicode[]=$edobj->DV_CODE;
        } 
    }     

 break;





    case "details":

      $printpath="public/setup/managedrivers/view/details.php?keys=".$keys;

  
    
  break;      




   case'update':

 
      $duplicatekeeper = $session->get("post_key");
     
       if($microtime != $duplicatekeeper){
       $session->set("post_key",$microtime);

      if(isset($_POST['vehicle'])){

        $vehicle=$_POST['vehicle'];
    
          $deletedv=$sql->Execute($sql->Prepare("DELETE FROM pol_driver_vehicle_primary WHERE DV_DRIVERCODE = ? "),array($driverzcode));
                                                       
           foreach ($vehicle as $key =>$value) {
              
                 $vehiclevalue=explode("@@",$value);
                 
                 $carcode=$vehiclevalue[0];

                 $carname=$vehiclevalue[1];

                 $carnames[]=$carname;

                 $ucocode=$code->genericCodeGeneratorbis('pol_driver_vehicle_primary','D-V','DV_CODE');

                 $insert=$sql->Execute($sql->Prepare("INSERT INTO pol_driver_vehicle_primary(DV_CODE,DV_DRIVERCODE,DV_VEHICLE_NAME,DV_VEHICLE_CODE)VALUES(?,?,?,?)"),array($ucocode,$driverzcode,$carname,$carcode));
                 print $sql->ErrorMsg();

                  $insertsecondary=$sql->Execute($sql->Prepare("INSERT INTO pol_driver_vehicle_secondary(DV_CODE,DV_DRIVERCODE,DV_VEHICLE_NAME,DV_VEHICLE_CODE)VALUES(?,?,?,?)"),array($ucocode,$driverzcode,$carname,$carcode));
                 print $sql->ErrorMsg();

                    $updatevehicle=$sql->Execute($sql->Prepare("UPDATE pol_vehicles SET VH_ASSIGN_STATUS='2',VH_DRIVERCODE=? WHERE VH_CODE=? "),array($driverzcode,$carcode));
                        print $sql->ErrorMsg();

                               
               }   
              
               $cars=implode(",",$carnames);
               
                $activity = '[ Driver  : '.$driverfulname.' , Has Been Re-ssigned To  : [ '.$cars.' ] Vehicle(s) By : '.$actorname.']';
                $engine->setEventLog('024',$activity);

                $msg = "Success: Driver Has Been Re-Assigned To [".$cars."] Vehicle(s) successfully.";
                $status = "success";
                $target ='';

        }else{
            
            $deletevehicles=$sql->Execute($sql->Prepare("DELETE FROM pol_driver_vehicle_primary WHERE DV_DRIVERCODE = ? "),array($driverzcode));

                         // DRIVER HAS NO VEHICLE THEN IT SWITCHES TO ASSIGN      
            $updatevehicle=$sql->Execute($sql->Prepare("UPDATE pol_vehicles SET VH_ASSIGN_STATUS='1' WHERE VH_DRIVERCODE=? "),array($driverzcode));
            $updatedriver=$sql->Execute($sql->Prepare("UPDATE pol_drivers SET DR_ASSIGN_STATUS='1' WHERE DR_CODE=? "),array($driverzcode));
            

            $activity = '[ Driver  : '.$driverfulname.' , Has Been Re-ssigned To No Vehicle(s) By : '.$actorname.' ]';
            $engine->setEventLog('024',$activity);

           $msg = "Success: Driver Has Been Re-Assigned To No Vehicle(s) successfully.";
           $status = "success";
           $target ='';
        }
   
            

        }

break;





    case "delete":

     $duplicatekeeper = $session->get("post_key");
       if($microtime != $duplicatekeeper){
          $session->set("post_key",$microtime);


        $stmtuser = $sql->Execute($sql->Prepare("SELECT DR_SURNAME,DR_RANK,DR_UNITNAME FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $obj = $stmtuser->FetchNextObject();
        $drsuname = $obj->DR_SURNAME;
        $drtagz = $obj->DR_RANK;
        $drtunit = $obj->DR_UNITNAME;

        // $newagentid = $agentidcode."_del_".$agentdelid;
        $stmt = $sql->Execute($sql->Prepare("UPDATE pol_drivers SET DR_STATUS='4' WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

        $msg = "Driver Profile Deleted Successfully.";
        $status = "success";
        $view="";

        $activity = 'Driver : '.$drtagz.' '.$drsuname.', with Unit : '.$drtunit.' has Been Deleted by : '.$actorname;
        $engine->setEventLog('012',$activity);

        }

        break;

    case "reset":

        $fdsearch="";
        break;


}


   if(!empty($fdsearch)){

        $query = "SELECT DR_CODE,DR_FIRSTNAME,DR_ASSIGN_STATUS,CONCAT(DR_RANK,' ',DR_SURNAME) AS NAMERANKZ,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK FROM pol_drivers WHERE DR_STATUS!='4' AND DR_FIRSTNAME LIKE ".$sql->Param('a')." OR DR_SURNAME LIKE ".$sql->Param('a')." OR DR_TAG LIKE ".$sql->Param('a')." OR DR_RANK LIKE ".$sql->Param('a')."  ";
        $input = array('%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%','%'.$fdsearch.'%');

  }else{
        $query = "SELECT DR_CODE,DR_FIRSTNAME,DR_ASSIGN_STATUS,CONCAT(DR_RANK,' ',DR_SURNAME) AS NAMERANKZ,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK FROM pol_drivers WHERE DR_STATUS!='4' ";
        $input = array();
}



if(!isset($limit)){
    $limit = $session->get("limited");
}elseif(empty($limit)){
    $limit =20;
}
$session->set("limited",$limit);
$lenght = 10;
$paging = $pgnate->OS_Pagination($sql,$query,$limit,$lenght,'pg=ad2376beebecdcf7846ba973fa1a005b&option=905c524e71dfa8d56af39437e8c2607e',$input);


$comnds=$sql->GETALL($sql->Prepare("SELECT COM_CODE,COM_NAME FROM pol_commands WHERE COM_STATUS='1'"),array());
$dptnmt=$sql->GETALL($sql->Prepare("SELECT DP_CODE,DP_NAME FROM pol_department WHERE DP_STATUS='1'"),array());
$unntsz=$sql->GETALL($sql->Prepare("SELECT UNT_CODE,UNT_NAME FROM pol_units WHERE UNT_STATUS='1'"),array());

$armyrank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='AR0001'"),array());
$airforcerank=$sql->GETALL($sql->Prepare("SELECT RANK_CODE,RANK_NAME,RANK_OPT FROM pol_ranks WHERE RANK_STATUS='1' AND RANKARM_CODE='NA0002'"),array());
$polarm=$sql->GETALL($sql->Prepare("SELECT ARM_NAME,ARM_CODE FROM pol_arm WHERE ARM_STATUS='1'"),array());


include('model/js.php');
?>