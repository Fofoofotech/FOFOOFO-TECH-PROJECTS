
         <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Add User
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Form</a></li>
                        <li class="active">Form Layout</li>
                    </ol>
                </div>
            </div>
            <!-- page head end-->


                <?php $engine->msgBox($msg,$status); ?>
         
         <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                     <header class="panel-heading">
                      Enter User Details Below
                     </header>
                <div class="panel-body">
                    <form  role="form">
    
                    <div class="row"> 
                    <div class="form-group row">
                       <div class="col-lg-12 ">
                     
                             <label class="col-sm-1 col-sm-1 control-label">Full Name</label>
                                     <div class="col-lg-5">
                                        <input type="text" class="form-control round-input" placeholder="Enter Fullname" name="name">
                                    </div>
                                 
                                   <label class="col-sm-1 col-sm-1 control-label">User Type</label>
                                   <div class="col-lg-5">
                                    <select class="form-control round-input" name="type">
                                        <option value="0" <?php echo ($status=='0')?'selected':''?>>Admin</option>
                                       <option value="1" <?php echo ($status=='1')?'selected':''?> >Finance</option>
                                       <option value="2" <?php echo ($status=='2')?'selected':''?> >Teacher</option>
                                       <option value="3" <?php echo ($status=='3')?'selected':''?> >Parent</option>
                                       <option value="4" <?php echo ($status=='4')?'selected':''?> >Student</option>
                                     </select>
                                   </div>  
                             </div>  
                        </div>
                    <!-- </div> -->

                <!-- <div class="row"> -->
                 <div class="form-group row">
                       <div class="col-lg-12">
                                <!-- <div class="input-group col-lg-12 "> -->
                                        <label class="col-sm-1 col-sm-1 control-label">Username</label>
                                        <div class="col-lg-5">
                                          <input  class="form-control round-input" id="validationCustomUsername" name="usrname" placeholder="Username" required>
                                        </div>
                                   
                                        <label class="col-sm-1 col-sm-1 control-label">Email</label>
                                        <div class="col-lg-5">
                                        <input type="text" class="form-control round-input" class="validationCustom01"  name="email" placeholder="Enter Email">
                                      
                                        </div>

                                 </div>
                             </div>
                      <!-- </div> -->

                      <div class="form-group row">
                            <div class="col-lg-12">
                                        <label class="col-sm-1 col-sm-1 control-label">contact</label>
                                    <div class="col-lg-5">
                                        <input type="text" class="form-control round-input" id="validationCustom01" name="contact" placeholder="Enter contact">
                                     </div>
                                    
                                        <label class="col-sm-1 col-sm-1 control-label">Password</label>
                                    <div class="col-lg-5">
                                        <input type="password" class="form-control round-input" id="validationCustom01" name="usrpwd" placeholder="Enter password">
                                        </div>
                                    </div>
                              </div>
                            

                                  
                                    
                        <div class="form-group row">
                               <div class="col-lg-12">
                                   <label class="col-sm-1 col-sm-1 control-label">Access Level</label>
                                <div class="col-lg-5">
                                    <select class="form-control round-input" name="Alevel" >
                                        <option value="1" <?php echo ($status=='1')?'selected':''?>>High</option>
                                       <option value="0" <?php echo ($status=='0')?'selected':''?> >Micro</option>
                                    </select>
                                </div>                        
                            </div>  
                        </div>      

                               <div class="form-group row">
                                   <div class="col-sm-3">
                                    <button class="btn btn-primary" type="submit" name="submit" onclick="document.getElementById('viewpage').value='add';document.myform.submit();">Submit form</button>
                                  </div>
                               </div>
                        </form>
                    </section>
                      </div>
               <!-- col-lg --> 
                 </div>
                <!-- end row -->    
            </div>
            <!-- wrapper end  -->