<div class="main-content">
    <div class="page-wrapper">
        <?php $engine->msgBox($msg,$status); ?>
        <div class="page form">
            <input type="hidden" class="form-control" name="agentcode" value="<?php echo $agentcode; ?>" >
            <div class="moduletitle">
                <div class="moduletitleupper"> Driver's Password Reset for <?php  echo $fname." ".$midname." ".$surname;?>
                    <span class="pull-right">
                    <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
                        <!-- <button href= chaa type="submit" >Cancel</button> -->
                        <!-- <button class="form-tools" onclick="document.getElementById('view').value='back';document.myform.submit;" style="font-size:25px; padding-top:-10px;">&times;</button> -->
                    </span>
                </div>
            </div>

            <div class="col-sm-12 paddingclose personalinfo">
                <div class="col-sm-2">
                    <div class="id-photo">
                        <img src="media/uploaded/agentphotos/<?php echo $img;?>" alt="" id="prevphoto" style="width:100% !important; margin:0px !important;">
                    </div>
                </div>
                <div class="col-sm-10 paddingclose">
                    <div class="form-group">
                        <div class="moduletitleupper">Password Reset </div>
                        <div class="col-sm-12 personalinfo-info">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="fname">New Password:</label>
                                    <input type="text" class="form-control" id="usrpwd" name="usrpwd" value="<?php echo $usrpwd; ?>" >
                                </div>


                                <div class="col-sm-4">
                                    <label for="fname">Reset Password:</label>  <br />
                                    <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='resetpassword';document.myform.submit;" class="btn btn-success"><i class="fa fa-check"></i> Reset Password </button>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>