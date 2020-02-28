
       
 <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-box"></i>Manage Department</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>
                 
         
        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">EDIT Department</h4>
                                <p class="text-muted m-b-30 font-14"></p>

                 
     <?php $engine->msgBox($msg,$status);?>
             
                  <!-- <form id='valiform'> -->
                    <div class="form-group row">
                                  
                                <div class="col-lg-4">
                                  <label for="name">Department Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="name" placeholder="Enter Fullname" name="name" value="<?php echo $name; ?>" />
                                        <span id="name-feedback" class="alert-danger"></span><br>
                                    </div>
                                 

                            <div class="col-lg-4"> 
                                <label for="status">Command<span class="alert-danger">*</span></label>
                                <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command" value="<?php echo $Command; ?>"> 
                                
                                <?php foreach ($comnds as $key => $value) {?>
                                  
                                <option value="<?php echo $value['COM_CODE']."@@".$value['COM_NAME']?>"><?php echo $value['COM_NAME'] ?></option>
                                
                                <?php } ?> 
                             
                                </select> 
                            
                             </div>






                            <div class="col-lg-4"> 
                                <label for="status">Unit<span class="alert-danger">*</span></label>
                                <select class="form-control select2 units" name="unit" id="unit" value="<?php echo $unit; ?>">     
                                <option value="0">Select Unit</option>  

                             </select> 
                            
                            </div>
                                  
                          
                       </div>
                    <!-- </div> -->

             
                               <div class="form-group row float-right">
                                   <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('update');">Save</button>
                                     <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
                                  </div>
                               </div>
                  
                      <!--  </form> -->


                              </div>
                      
    
                  
                      </div>
               <!-- col-lg --> 



                               </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- end container -->
        </div>
      