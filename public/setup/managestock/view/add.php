 
       
 <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-box"></i>Manage Drivers</h4>
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

                                <h4 class="mt-0 header-title">ADD DRIVERS</h4>
                                <p class="text-muted m-b-30 font-14"></p>

                 
     <?php $engine->msgBox($msg,$status);?>
             
                  <!-- <form id='valiform'> -->
                    <div class="form-group row">
                                  
                                <div class="col-lg-4">
                                  <label for="name">Full Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="name" placeholder="Enter Fullname" name="name"/>
                                        <span id="name-feedback" class="alert-danger"></span><br>
                                    </div>
                                 

                                <div class="col-lg-4">
                                <label for="status">Status</label>
                                 <select class="custom-select" name="status" placeholder="select status">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            <!-- <option value="3">Three</option> -->
                                     </select>
                               </div>

                                  <div class="col-lg-4">
                                    <label for="usrname">Username<span class="alert-danger">*</span></label>
                                        <input  class="form-control" id="usrname" name="usrname" placeholder="username"/>
                                        <span id="usrname-feedback" class="alert-danger"></span><br>
                                   </div>
                          
                       </div>
                    <!-- </div> -->

             
                      
                              <div class="form-group row">

                                <div class="col-lg-4">
                                  <label for="contact">contact<span class="danger">*</span></label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact"/>
                                    <span id="contact-feedback" class="alert-danger"></span><br>
                                     </div>
                                    
                                <div class="col-lg-4">
                                  <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"/>
                                      <span id="status-feedback" class="alert-danger"></span><br>
                                     </div>



                                 <div class="col-lg-4">

                                      <label class="label-control "for="Password">Password<span class="alert-danger">*</span></label>
                                        <input type="Password" class="form-control" id="Password" name="Password" placeholder="Enter Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>
                                  
                                  
                               </div>




                      <div class="form-group row">

                         <!--  <div class="col-lg-4"> 
                              <label for="status">Role<span class="alert-danger">*</span></label>
                               <select name="role" id="role" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">     
                                <option value="0">Admin</option>  
                                <option value="1">Driver</option>
                                <option value="2">Branch C.o</option> 
                                <option value="3">Unit C.o</option>  
  
  


                             </select> 
                            
                            </div>
                             
                                -->

                          <div class="col-lg-4"> 
                                <label for="status">Command<span class="alert-danger">*</span></label>
                                <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command"> 
                                <?php foreach ($comnds as $key => $value) {?>
                                  
                                <option value="<?php echo $value['COM_CODE'] ?>"><?php echo $value['COM_NAME'] ?></option>


                                
                                <?php } ?> 
                             </select> 
                            
                             </div>
            


                            <div class="col-lg-4"> 
                                <label for="status">Unit<span class="alert-danger">*</span></label>
                                <select class="form-control select2 units" name="unit" id="unit">     
                                <option value="0">Select Unit</option>  

                             </select> 
                            
                             </div>
                           


                            <div class="col-lg-4"> 
                                <label for="status">vehicle(s)<span class="alert-danger">*</span></label>
                                <select  name="Vehichle" id="Vehichle" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">     
                                <option value="vh001">Select Unit</option>  

                             </select> 
                            
                             </div>
                              


                           
                        </div>
                      <!-- </div> -->
                      <!-- </div> -->
                 
                          <div class="form-group row">

                                  <div class="col-lg-4">
                                      <label class="label-control">TAG<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control" id="tag" name="tag"
                                        placeholder="Enter Tag Number">
                                        <span id="name-feedback"></span><br>
                                     </div>
                                  
                                    
                             
                               

                             <div class="col-lg-4"> 
                              <label for="status">Unit C.O<span class="alert-danger">*</span></label>
                               <select class="form-control select2" name="uco" id="uco">     
                                <option value="qerwi">Select Unit</option>  

                             </select> 
                            
                             </div>
            
                          
                          <div class="col-lg-4"> 
                              <label for="status">Office/department<span class="alert-danger">*</span></label>
                               <select class="form-control select2" name="office" id="office">     
                                <option value="qerwi">Select Unit</option>  

                             </select> 
                            
                             </div>


                            
                            </div>
                      
                               <div class="form-group row float-right">
                                   <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('saveuser');">Save</button>
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
        <!-- end wrapper -->

     <!-- <script type="text/javascript">
     $(function(){
       // alert("bommmmmmmmm");
       var form=$("#myform");
       enableFastFeedback(form);
        // alert("bommmmmmmmm1");
        
           form.submit(function(event) {
           var name=$('#name').val();
           var Password=$('#Password').val();
           var contact=$('#contact').val();
           var usrname=$('#usrname').val();
           var unit=$('#unit').prop(":selected");
           
     
           
            validateName(name, event);
            validatePassword(Password, event);
            validateContact(contact, event);
            validateUsername(usrname, event);
            validateUnit(selected, event);
            validateContact(contact, event);
            
        });
     });

                  
                  //FASTFEEDBACK
       function enableFastFeedback(formElement){
          
         var nameInput=formElement.find("#name");
         // alert("bommmmmmmmm2");
         var passwordInput=formElement.find("#Password");
         var contactInput=formElement.find("#contact");
         var unitInput=formElement.find("#name");
         var usernameInput=formElement.find("#name");

        nameInput.blur(function(event){
         var name = $(this).val();
          validateName(name, event); 

          if(!isValidName(name)){

           $(this).css({"box-shadow": "0 0 4px #811", "border": "2px solid #600"});

          }else{ 
             $(this).css({"box-shadow": "0 0 4px #181", "border": "2px solid #060"});
              
              }

        });
        


       }



                //NAME
     function validateName(name, event){
         if(!isValidName(name)){

            $('#name-feedback').text("Please Enter Your Fullname not less than 5 letters");
            event.preventDefault();

         }else{

             $('#name-feedback').text("");

         }


        }



          //PASSWORD
     function validatePassword(Password, event){
         if(!validPassword(Password)){

            $('#Password-feedback').text("Please Enter Your Password not less than 5 characters and with numbers");
            event.preventDefault();

         }else{

             $('#Password-feedback').text("");

         }


        }
            
                     //CONTACT

       function validateContact(contact, event){
         if(!isValidContact(contact)){

            $('#contact-feedback').text("Please Enter Your contact not less than 10 characters");
            event.preventDefault();

         }else{

             $('#contact-feedback').text("");

         }


        }



                 //USERNAME

       function validateUsername(usrname, event){
         if(!ValidUsername(usrname)){

            $('#usrname-feedback').text("Please Enter Your Username not less than 5 characters");
            event.preventDefault();

         }else{

             $('#usrname-feedback').text("");

         }


        }


                      //UNIT

       function validateUnit(isSelected, event){
         if(!isSelected){

            $('#unit-feedback').text("Please choose your Unit");
            event.preventDefault();

         }else{

             $('#unit-feedback').text("");

         }


        }
       







function isValidName(name){
             return name.length >=5;
          
           }
    function validPassword(Password){
             return Password.length >=6 && /.*[0-9].*/.test(Password);
          
           }
function isValidContact(contact){
             return contact.length >=10;
}




function ValidUsername(usrname){
             return usrname.length >=5;
}




  </script>
      -->


