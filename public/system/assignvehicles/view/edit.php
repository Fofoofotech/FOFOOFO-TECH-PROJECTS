 
       
 <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="mdi mdi-jeepney"></i>ASSIGN DRIVER [ VEHICLE(S) ] </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>

            <input type="hidden" name="driverfulname" value="<?php echo $driverfulname ?>">  
            <input type="hidden" name="driverzcode" value="<?php echo $driverzcode ?>">      
         
        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title"> RE-ASSIGN </h4>
                              

                                <div class="btn-group pull-right">
                                        <span>
                                            <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('')" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-close"></i> Cancel </button>
                                
                                       </span>
            
                              </div>
                            
                              <p style="margin-bottom:70px;"></p>
                 
                                  <?php if(isset($msg)){$engine->msgBox($msg,$status);}?>

                             <div class="form-group row">
                                  
                             <div class="col-lg-4"> 
                                        <label for="arm">Vehicle(s)<span class="alert-danger">*</span></label>
                                                <select class="select2 form-control select2-multiple" id="vehicle" multiple="multiple" multiple data-placeholder="Choose Vehicle..." name="vehicle[]">  
                                                    
                                                    <?php foreach ($fleets as $key => $value) { ?>
                                                    
                                                    <option value="<?php echo $value['VH_CODE']."@@".$value['VH_NAME'] ?> " <?php echo( in_array($value['VH_CODE'],$vehicode)?'selected':'' )?>  ><?php echo $value['VH_NAME'] ?></option>
                                             
                                                    <?php } ?> 
                                                    
                                                </select> 
                                    
                               </div>

                              
                          
                       </div>
                    <!-- </div> -->

             
                      
                           
                               <div class="form-group row float-right">
                                   <div class="">
                                    <button type="button" class="btn btn-primary" onclick="ReAssign();">Re-Assign</button>
                                     
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
       

