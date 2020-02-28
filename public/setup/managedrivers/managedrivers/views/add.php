<div class="main-content">
    <div class="page-wrapper">
        <?php $engine->msgBox($msg,$status); ?>
        <div class="page form">
            <div class="moduletitle">
                <div class="moduletitleupper">Add Driver
                    <span class="pull-right ">
                        <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='';document.myform.submit();" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-arrow-left"></i> Back </button>
                    <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='saveagent';document.myform.submit;" class="btn btn-info"><i class="fa fa-save"></i> Save </button>
                    </span>
                </div>
            </div>
            <div class="col-sm-12">


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

                            <input type="text" placeholder="dd-mm-yyyy" class="form-control " id="dob" name="dob" value="<?php echo $dob; ?>" >
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

                        <div class="col-sm-4">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="address">
                        </div>

                        <div class="col-sm-4">
                            <label for="cartype">Branch: <span class="required">*</span></label>
                            <select id="branch" name="branch" class="form-control" >
                                <option value="" >Select Branch</option>
                                <?php
                                while($objx = $stmtbranchlist->FetchNextObject()){
                                    ?>
                                    <option value="<?php echo $objx->BRN_CODE ?>" <?php echo (($branch == $objx->BRN_CODE)?'Selected':'') ?>><?php echo $objx->BRN_NAME ;?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label for="carstype">Fleet:</label>

                            <select  type="text" class="form-control select2" id="carstype" name="carstype" >
                                <option value="" disabled selected>Select Fleet</option>

                            </select>

                        </div>

                        <div class="col-sm-4 uniq-user">
                            <label for="username">Username<span class="required">*</span></label>
                            <div class="uniq-left">
                                <input type="text" class="form-control" id="inputusername" name="inputusername" autocomplete="off" value="<?php echo $inputusername ; ?>" required>
                            </div>
                            <div class="uniq-right">
                                <input type="text" class="form-control" id="alias" name="alias" value="<?php echo '@'.$compalias; ?>" readonly>
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <label for="carno">Password.:</label>
                            <input type="password" class="form-control" id="usrpwd" value="<?php echo $usrpwd; ?>" name="usrpwd">
                        </div>


                    </div>



                </div>










<!--                <div class="btn-group" style="margin-top:20px;float:right;">-->
<!--                    <div class="col-sm-12">-->
<!---->
<!---->
<!--                    </div>-->
<!--                </div>-->
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
    // $(document).ready(function() {
    //     $('#example').DataTable();
    //
    // } );
</script>


