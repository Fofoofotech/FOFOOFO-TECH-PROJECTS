<?php
/**
 * Created by PhpStorm.
 * User: Adusei
 * Date: 7/31/2018
 * Time: 5:15 PM
 */


$compandetails =$engine->getActorDetails();
$actor_id = $session->get("actorid");
$valid = true;
$errorfile = '';
$insertarray = array();
$wrongnumbers = array();
$crypt = new cryptCls();
$code=new  codesClass();

switch ($viewpage){

    case "add":
//        var_dump($_POST['contactno']);
    //   die("rewrrew");
  if(!empty($name) && !empty($usrname) && !empty($contact) && !empty($usrpwd) && !empty($email) && !empty($type) && !empty($Alevel)){
      die("rewrrew");
    $inputpwd = $crypt->loginPassword($usrname,$usrpwd);
    // die($inputpwd );
      
  $cstmt=$sql->Execute($sql->Prepare("SELECT USR_CONTACT FROM sch_adminuser WHERE USR_CONTACT=".$sql->Param('a')." "),array($contact));
  $stmt=$sql->Execute($sql->Prepare("SELECT USR_USERNAME FROM sch_adminuser WHERE USR_USERNAME=".$sql->Param('a')." "),array($usrname));
   
  if($stmt->RecordCount() > 0){
    $msg = 'Unsuccessful: Sorry username Already Exit';
    $status = 'error'; $view = 'add';

  }elseif($cstmt->RecordCount() > 0){
    $msg = 'Unsuccessful: Sorry Client Already Exit';
    $status = 'error'; $view = 'add';

  
  }else{
    $cltcos=$code->generateCode_bk('sch_adminuser', 'USR', 'USR_CODE');
    $stmt = $sql->Execute($sql->Prepare("INSERT INTO sch_adminuser (USR_NAME,USR_USERNAME,USR_CONTACT,USR_PLAINPASS,USR_EMAIL,
                                                      USR_USERTYPE,USR_ACCESSLEVEL,USR_PASSWORD,USR_STATUS,USR_CODE)
                                          VALUES({$sql->Param('a')},{$sql->Param('b')},{$sql->Param('c')},{$sql->Param('d')},{$sql->Param('e')},
                                        {$sql->Param('f')},{$sql->Param('g')},{$sql->Param('h')},{$sql->Param('i')},{$sql->Param('j')} )"),
                                        array($name,$usrname,$contact,$usrpwd,$email,$type,$Alevel,$inputpwd, '1',$cltcos));
                                      
    if ($stmt==true){
       $msg = 'Success: new user saved successfully.';
                $status = 'success'; $view='list';

    }else{
        $msg = 'Unsuccessful: Couldnt save User Something Went Wrong';
        $status = 'error'; $view = 'add';
    }

  }
    
    
    }


break;



    case "delete":
    //   die($keys);   
$stmt=$sql->Execute($sql->Prepare("DELETE FROM sch_adminuser WHERE USR_ID =".$sql->Param('a')." "),array($keys));
       
    
    if($stmt==true){
     
            $msg = 'Success: User Deleted successfully.';
            $status = 'success'; $view='list';

     }else{
        print $sql->ErrorMsg();
           $msg = 'Unsuccessful: Something Went Wrong Can Not Delete User ';
          $status = 'error'; $view = 'list';
}

        


        break;


        case'edit':
        // die($keys);
        $stmt=$sql->Execute($sql->Prepare("SELECT USR_NAME,USR_USERNAME,USR_CONTACT,USR_PLAINPASS,USR_EMAIL,
        USR_USERTYPE,USR_ACCESSLEVEL,USR_PASSWORD,USR_STATUS,USR_CODE FROM sch_adminuser WHERE USR_ID=".$sql->Param('a')." "),array($keys));
                                          


    break;



}
    
if(!empty($fdsearch)){

    $query = "SELECT USR_ID,USR_CONTACT,USR_NAME,USR_USERNAME,USR_PLAINPASS,USR_EMAIL,USR_STATUS FROM sch_adminuser WHERE USR_STATUS AND (USR_NAME LIKE ".$sql->Param('a')." OR USR_USERNAME LIKE ".$sql->Param('b')." OR USR_CONTACT LIKE ".$sql->Param('b').") ORDER BY USR_NAME ASC";
    $input = array('%'.$fdsearch.'%', '%'.$fdsearch.'%', $actor_id);
}else{
    $query = "SELECT USR_ID,USR_CONTACT,USR_NAME,USR_USERNAME,USR_PLAINPASS,USR_EMAIL,USR_STATUS FROM sch_adminuser WHERE USR_STATUS='1' ORDER BY USR_NAME ASC";
    
}

if(!isset($limit)){
    $limit = $session->get("limited");
}else if(empty($limit)){
    $limit = 20;
}
$session->set('limited', $limit);
$lenght = 10;
$paging = new OS_Pagination($sql, $query, $limit, $lenght, 'index.php?action=index&pg='.$pg.'&option='.$option, $input);

?>
