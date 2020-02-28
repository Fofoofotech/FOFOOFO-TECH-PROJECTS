<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 29-Jan-19
 * Time: 10:44 AM
 */

?>

<div class="main-content">
    <input type="hidden" class="form-control" id="patientnum" name="patientnum" value="<?php echo $patientnum; ?>" >
    <input type="hidden" name="compcode" id="compcode" value="<?php echo $compid; ?>" />
    <input type="hidden" name="selectedzones[]" id="selectedzones" />


    <div class="page-wrapper">
        <?php $engine->msgBox($msg,$status); ?>


        <div class="btn-group pull-right">
            <div class="col-sm-4">

        <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='saveagent';document.myform.submit();" class="btn btn-info"> Save </button>
</div>
<div class="col-sm-6">
        <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
        </div>
            
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#personal">1. Personal Information</a></li>
            <!--<li><a data-toggle="tab" href="#other">2. Guarantor's Information</a></li>-->
            <li><a data-toggle="tab" href="#health">2. Zone & User Credentials</a></li>
            <!--<li><a data-toggle="tab" href="#family">4. Family</a></li>-->
        </ul>


        <div class="page form">
            <div class="tab-content">
                <div id="personal" class="tab-pane fade in active">
                    <h3>Personal Information</h3>
                    <div class="col-sm-2">
                        <div class="id-photo">
                            <img src="media/img/avatar.png" alt="" id="prevphotos" style="width:100% !important; margin:0px !important;">
                            <label class="btn btn-info btn-block id-container" for="image">
                                <input id="image" type="file" style="display:none;" onchange="readURL(this);" name = "picturename" >
                                <i class="fa fa-pencil"></i> Edit &nbsp; &nbsp;</label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="fname">First Name: <small class="required"> *</small></label>
                                <input type="text" class="form-control" id="inputfname" name="inputfname" value="<?php echo $inputfname; ?>" >
                            </div>

                            <div class="col-sm-4">
                                <label for="lastname">Middle Name:</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $middlename; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="dob">Last Name: <small class="required"> *</small></label>
                                <input type="text" class="form-control" id="inputlastname" value="<?php echo $inputlastname; ?>" name="inputlastname">
                            </div>
                            <div class="col-sm-4">
                                <label for="nationality">Date of Birth:</label>
                           
                            <input type="text" class="form-control datepicker" id="dob" name="dob" value="<?php echo $dob; ?>" >
                            </div>

                            <div class="col-sm-4">


                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender" class="form-control" >
                                    <option value="" >Gender</option>
                                    <option value="M" <?php echo (($gender == 'M')?"selected":"");?>>Male</option>
                                    <option value="F" <?php echo (($gender == 'F')?"selected":"");?>>Female</option>

                                </select>

                            </div>

                            <div class="col-sm-4">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" value="<?php echo $email; ?>" id="email" name="email" >

                            </div>

                            <div class="col-sm-4">
                                <label for="phonenumber">Phone Number: <small class="required"> *</small></label>
                                <input type="tel" class="form-control" id="phonenumber" value="<?php echo $phonenumber; ?>" name="phonenumber">
                            </div>

                            <div class="col-sm-8">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="address">
                            </div>

                            <div class="col-sm-6">
                                <label for="cartype">Car Type:</label>
                                <select id="cartype" name="cartype" class="form-control" >
                                    <option value="" >Select Type</option>
                                    <option value="M" <?php echo (($cartype == 'M')?"selected":"");?>>Tricycle</option>
                                    <option value="T" <?php echo (($cartype == 'T')?"selected":"");?>>Truck</option>
                                    <option value="C" <?php echo (($cartype == 'C')?"selected":"");?>>Car</option>

                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="carno">Car No.:</label>
                                <input type="text" class="form-control" id="carno" value="<?php echo $carno; ?>" name="carno">
                            </div>


                        </div>



                    </div>
                </div>
                <div id="other" class="tab-pane fade">
                    <h4>Guarantor's Information</h4>
                    <p>

                    <div class="col-sm-12">



                        <div class="form-group">
                            <h5>First Guarantor</h5>
                            <div class="col-sm-4">
                                <label for="phonenumber"> Name:</label>
                                <input type="tel" class="form-control" id="gurfirstname" value="<?php echo $gurfirstname; ?>" name="gurfirstname">
                            </div>
                            <div class="col-sm-4">
                                <label for="altphonenumber">Email:</label>
                                <input type="tel" class="form-control" id="guremail" value="<?php echo $guremail; ?>" name="guremail">
                            </div>

                            <div class="col-sm-4">
                                <label for="specialisation">Contact:</label>
                                <input type="text" class="form-control" value="<?php echo $contactno; ?>" id="contactno" name="contactno">
                            </div>


                        </div>


                        <div class="form-group">
                            <h5>Second Guarantor</h5>
                            <div class="col-sm-4">
                                <label for="phonenumber">Name:</label>
                                <input type="tel" class="form-control" id="gursecondname" value="<?php echo $gursecondname; ?>" name="gursecondname">
                            </div>

                            <div class="col-sm-4">
                                <label for="phonenumber">Email:</label>
                                <input type="tel" class="form-control" id="gursecondemail" value="<?php echo $gursecondemail; ?>" name="gursecondemail">
                            </div>
                            <div class="col-sm-4">
                                <label for="altphonenumber">Contact:</label>
                                <input type="tel" class="form-control" id="gursecondcontact" value="<?php echo $gursecondcontact; ?>" name="gursecondcontact">
                            </div>




                        </div>

                        <!--<div class="form-group">

             <div class="col-sm-4">
                    <label for="specialisation">Phone Number:</label>
                    <input type="text" class="form-control" value="<?php //echo $contactno; ?>" id="contactno" name="contactno" >
                </div>

                <div class="col-sm-4">
                    <label for="phonenumber">Alternative Phone Number:</label>
                    <input type="tel" class="form-control" id="altphonenumber" value="<?php //echo $altphonenumber; ?>" name="altphonenumber">
                </div>
                <div class="col-sm-4">
                    <label for="altphonenumber">Email:</label>
                    <input type="tel" class="form-control" id="guremail" value="<?php //echo $guremail; ?>" name="guremail">
                </div>




            </div>-->




                    </div>

                    </p>
                </div>
                <div id="health" class="tab-pane fade">
                    <h4>Zone & User Creandentials</h4>
                    <p>
                    <div class="col-sm-12">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="bgroup">Username / Driver's ID: <small class="required"> *</small></label>
                                <input type="text" class="form-control" id="inputusername" name="inputusername" value="<?php echo $inputusername;?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="allergies">Password:</label>
                                <input type="text" class="form-control" id="usrpwd" name="usrpwd" value="<?php echo $usrpwd;?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="bgroup">Branch:</label>
                                <select id="branch" name="branch" class="form-control" >
                                    <option value="" disabled selected>Branches</option>
                                    <?php
                                    foreach($stmtbranches as $branch){
                                        ?>
                                        <option value="<?php echo $branch['BRN_CODE'] ?>" <?php echo (($branch == $branch['BRN_CODE'])?'Selected':'') ?>><?php echo $branch['BRN_NAME'] ;?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <!--
                            <div class="col-sm-6">
                                <label for="allergies">District:</label>
                                <select name="district" id="district" class="form-control" >
                                    <option>Select District</option>


                                </select>
                            </div>
                            -->
                            <!--  <div class="col-sm-6">
                    <label for="bgroup">Region:</label>
                   <select id="region" name="region" class="form-control" >
                    <option value="" disabled selected>Region</option>
                     <?php
                            while($objpos = $stmtreg->FetchNextObject()){
                                ?>
                                     <option value="<?php echo $objpos->REG_CODE ?>" <?php echo (($region == $objpos->REG_CODE)?'Selected':'') ?>><?php echo $objpos->REG_NAME ;?></option>
                                     <?php } ?>

                  </select>
                </div>
                <div class="col-sm-6">
                    <label for="allergies">District:</label>
                    <select name="district" id="district" class="form-control" >
                                     <option>Select District</option>


                                 </select>
                </div> -->
                            <!--<div class="col-sm-4">
                                <label for="conditions">Zones:</label>
                                <input type="text" class="form-control" id="conditions" name="conditions">
                            </div>-->
                        </div>


                        <div class="form-group">

                            <!-- <div class="col-sm-6">
                                 <label for="allergies">District:</label>
                                 <input type="text" class="form-control" id="allergies" name="allergies">
                             </div>-->
                            <div class="col-sm-6"></div><div class="col-sm-6"></div><div class="col-sm-6"></div>
                            <div class="col-sm-4"></div>

                            <div class="col-sm-2" id="search"><input type="text" class="form-control" name="search" onkeyup="searchZones(this.value)" placeholder="Search" ></div>
                            <div id="zonetab" class="col-sm-12">

                            </div>



                        </div>





                    </div>

                    </p>
                </div>


            </div>
        </div>
    </div>



</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
                $('#prevphotos')
                    .attr('src', e.target.result)

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    // $(document).ready(function() {
    //
    //     $('#example').DataTable( {
    //         alert("asdasdasda")
    //         "paging":   false,
    //         "ordering": false,
    //         "info":     false
    //     } );
    // } );
    $(document).ready(function() {
        $('#example').DataTable();

    } );
</script>
