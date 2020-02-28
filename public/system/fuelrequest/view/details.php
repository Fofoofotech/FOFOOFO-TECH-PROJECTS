<?php
include("../../../../config.php");
include(JPATH_LIBRARIES."/engine.Class.php");

// $engine = new engine();
// //$ministry_name = $engine->getMinistryName();
// $department_name = $engine->getDeptName();
// $cardcategory= $engine->getCardCategoryName();
// $cardtype= $engine->getCardTypeName();
// //$picname= $engine->gogpic();


        $stmtdata = $sql->Execute($sql->Prepare("SELECT DR_CODE,DR_FIRSTNAME,DR_SURNAME,DR_GENDER,DR_EMAIL,DR_CONTACT,DR_STATUS,DR_ACTORNAME,DR_TAG,DR_COMMANDCODE,DR_COMMANDNAME,DR_UNITNAME,DR_UNITCODE,DR_DEPARTMENTCODE,DR_DEPARTMENTNAME,DR_ARMCODE,DR_ARM,DR_RANKCODE,DR_RANK,DR_INPUTEDDATE FROM pol_drivers WHERE DR_CODE=".$sql->Param('a')." "),array($keys));

print $sql->ErrorMsg();


// var_dump( $stmtdata);exit;
$obj=$stmtdata->FetchNextObject();
 $rankz=$obj->DR_RANK;
 $staz=$obj->DR_STATUS;

 if ($staz=='1') {
   $status='Active';
 }elseif ($staz=='0') {
   $status='Inactive';
   # code...
 }elseif ($staz=='2') {
   $status='Approved';
   # code...
 }elseif ($staz=='3') {
   $status='Rejected';
   # code...
 }elseif ($staz=='4') {
   $status='deleted';
   # code...
 }


?>
 
<html>
<head>
<link href="../../../../media/css/print.css" rel="stylesheet" type="text/css" media="all">
</head>
 

<body>


  <table width="882" border="0">
  <tr>
    <td>&nbsp;</td>
    <td width="141" rowspan="5" valign="top"><div style="width:138px; height:100px; border:0px #000000 solid">
								  
								  
									 <img alt="image" src="../../../../media/images/gafx.jpg"  width="138px" height="138px"/><br>
                                     <h4 class="header-title"><span class="fieldsetct"><?php echo '@ '.date("F d, Y");?></span></h4>
									</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:center;"><h4 class="header-title">GAF POL SYSTEM</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:center;"><h4 class="header-title"><u>Driver Details</u></h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="42" height="20">&nbsp;</td>
    <td width="289"></td>
    <td width="114">&nbsp;</td>
    <td width="274">&nbsp;</td>
    </tr>

    <!-- <tr>
  
    <td>&nbsp;</td>
    <td><h5 class="header-title">Organization:</h5></td>
    <td><h6 class="header-title"><?php echo $obj->CR_ORGANISATION; ?></h6></td>
    <td><h5 class="header-title">Card Category:</h5></td>
    <td><h6 class="header-title"><?php echo $cardcategory[$obj->CR_CARDCATEGORY]; ?></h6></td>
    </tr>-->
    
 <!--  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Request Type: </h5></td>
    <td><h6 class="header-title">
      <?php echo $obj->CR_REQUESTTYPE; ?></h5>
    </h6></td>
    <td><h5 class="header-title">Card Type:</h5></td>
    <td><h6 class="header-title"><?php echo $obj->CR_CARDTYPE; ; ?></h6></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Card Category: </h5></td>
    <td><h6 class="header-title">
      <?php echo $obj->CR_CARDCATEGORY; ?></h5>
    </h6></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>      <h5 class="header-title">&nbsp;</h5></
    </tr>
  <tr>
    <td colspan="5"><hr></td>
    </tr> -->

 <tr>
    <td width="42" height="20">&nbsp;</td>
    <td width="289"></td>
    <td width="114">&nbsp;</td>
    <td width="274">&nbsp;</td>
    </tr>

<tr>
    <td width="42" height="20">&nbsp;</td>
    <td width="289"></td>
    <td width="114">&nbsp;</td>
    <td width="274">&nbsp;</td>
    </tr>

    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
    </tr>
    

  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><h4 class="header-title">Personal Details</h4></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Name : </h5></td>
    <td><h6 class="header-title"><?php echo (!empty($rankz.' '.$obj->DR_SURNAME)?$rankz.' '.$obj->DR_SURNAME:"-----------------"); ?></h6></td>
    <td><h5 class="header-title">First Name : </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_FIRSTNAME; ?></h6></td>
    </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><span class="header-title"><h5>Gender : </h5></span></td>
    <td><span class="header-title"><?php echo (!empty($obj->DR_GENDER)?$obj->DR_GENDER:"-----------------"); ?></span></td>
    <td><h5 class="header-title">Contact :</h5></td>
    <td><h5 class="header-title"><?php echo $obj->DR_CONTACT;?></h5></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><h5 class="header-title">Email : </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_EMAIL; ?></h6></td>
    <td><h5 class="header-title">Status : </h5></td>
    <td><h6 class="header-title"><?php echo (!empty($status)?$status:"----------------"); ?></h6></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Createded By : </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_ACTORNAME; ?></h6></td>
    <td><h5 class="header-title">Createded Date : </h5></td>
    <td><h6 class="header-title"><?php echo date('d-M-Y',strtotime($obj->DR_INPUTEDDATE)); ?></h6></td>
  </tr>

  <!-- <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Status:</h5></td>
    <td><h6 class="header-title"><?php echo $obj->CR_POSITION; ?></h6></td>
    <td><h5 class="header-title">Date Of Birth:</h5></td>
    <td><h6 class="header-title"><?php echo date('d-M-Y',strtotime($obj->CR_DOB)); ?></h6></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Createded By:</h5></td>
    <td><h6 class="header-title"><?php echo (!empty($obj->CR_GENDER)?$obj->CR_GENDER:"---------------"); ?></h6></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr> -->



  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><hr></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><h4 class="header-title">Service Details</h4></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Arm: </h5></td>
    <td><h6 class="header-title"><?php echo (!empty($obj->DR_ARM)?$obj->DR_ARM:"-----------------"); ?></h6></td>
    <td><h5 class="header-title">Service Number: </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_TAG; ?></h6></td>
    </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><span class="header-title"><h5>Command: </h5></span></td>
    <td><span class="header-title"><?php echo (!empty($obj->DR_COMMANDNAME)?$obj->DR_COMMANDNAME:"-----------------"); ?></span></td>
    <td><h5 class="header-title">Unit :</h5></td>
    <td><h5 class="header-title"><?php echo $obj->DR_UNITNAME;?></h5></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><h5 class="header-title">Department : </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_DEPARTMENTNAME; ?></h6></td>

     <td><h5 class="header-title">Rank : </h5></td>
    <td><h6 class="header-title"><?php echo (!empty($rankz)?$rankz:"----------------"); ?></h6></td> 
    </tr>
 <!--  <tr>
    <td>&nbsp;</td>
    <td><h5 class="header-title">Createded By : </h5></td>
    <td><h6 class="header-title"><?php echo $obj->DR_ACTORNAME; ?></h6></td>
    <td><h5 class="header-title">Createded Date : </h5></td>
    <td><h6 class="header-title"><?php echo date('d-M-Y',strtotime($obj->DR_INPUTEDDATE)); ?></h6></td>
  </tr> -->

  <tr>
    <td colspan="5"><hr></td>
    </tr>




  <!-- <tr>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><h4 class="header-title">Attached Document</h4></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">
    <div class="fileinput-preview thumbnail" data-trigger="fileinput">
   
	<?php 
	$stmt=$sql->Execute($sql->Prepare("SELECT DOC_FILENAME FROM tc_document WHERE DOC_STATUS ='1' AND DOC_CODE='".$keys."'"));
print $sql->ErrorMsg();
while($objs=$stmt->FetchNextObject()){
	echo '<img src="../../../../media/docattached/cardrequest/'.$objs->DOC_FILENAME.'" width="600" height="400" ><br></br>';} ?>

  <?php if(isset($obj->CR_IDIMAGE)){?>
    <img src="../../../../media/docattached/kyc-pictures/<?php echo $obj->CR_IDIMAGE;?>" width="600" height="400"><br></br>
<?php }?>

    </div>
    </td>
    </tr> -->
  </table>

  
 

</body>
</html>