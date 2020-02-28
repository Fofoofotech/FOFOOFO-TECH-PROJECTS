
       
 <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-box"></i>Manage Unit C.os</h4>
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

                                <h4 class="mt-0 header-title">ADD UNIT C.Os</h4>
                                <p class="text-muted m-b-30 font-14"></p>

                 
     <?php $engine->msgBox($msg,$status);?>
             
                  <!-- <form id='valiform'> -->

     <!-- <form id='valiform'> -->
       <div class="form-group row">


                      <div class="col-lg-4">
                                  <label for="name">Full Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="name" placeholder="Enter Fullname" name="name"/>
                                        <span id="name-feedback" class="alert-danger"></span><br>
                                    </div>




                       <div class="col-lg-4"> 
                             <label for="arm">Arm of Service<span class="alert-danger">*</span></label>
                               <select class="form-control select2 arm" name="arm" id="arm" placeholder="Choose Arm">  
                                <option value="" disabled selected>Select</option>
                                <option>Army</option>  
                                <option>Navy</option>
                                <option>Airforce</option>
                                <option>Civilian</option> 
                                  
                                
                             </select> 
                            
                            </div>

                        <div class="col-lg-4"  id="army" style="display: none;"> 
                           <label for="rankarmy">Rank (Army):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranks" name="rank" id="rankarmy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers">
                                <option>Field Marshal</option>  
                                <option>General</option>
                                <option>Lietenant General</option>
                                <option>Major General</option>
                                <option>Bregadier colonel</option>
                                <option>Lietenant colonel</option>
                                <option>Major</option> 
                                <option>Captain</option> 
                                <option>Lietenant</option> 
                                <option>2nd Lietenant</option> 
                                <!-- <option>Field Marshal</option>  -->
                                </optgroup>

                                 <optgroup label="Enlisted Officers" ="">
                                <option>Warrant Officer Class 1</option>  
                                <option>Warrant Officer Class 2</option>
                                <option>Staff Sergeant</option>
                                <option>Sergeant</option>
                                <option>Corporal</option>
                                <option>Lance Corporal</option>
                                <option>Private</option> 
                                </optgroup>
                                
                                
                             </select> 
                            
                            </div>
                                  
                         

                                     

                          <div class="col-lg-4" id="navy" style="display: none;"> 
                           <label for="rankarmy">Rank (Navy):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranknavy" name="rank" id="ranknavy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers">
                                <option>Admiral</option>  
                                <option>Vice Admiral</option>
                                <option>Rear Admiral</option>
                                <option>Commodore</option>
                                <option>Captain</option>
                                <option>Commander</option>
                                <option>Lieutenant Commander</option> 
                                <option>Lieutenant</option> 
                                <option>Sub Lietenant</option>  
                                </optgroup>

                                 <optgroup label="Enlisted Officers" ="">
                                <option>Chief Petty Officer</option>  
                                <option>Petty Officer First Class</option>
                                <option>Petty Officer Second Class</option>
                                <option>Leading Seaman</option>
                                </optgroup>
                                
                                
                             </select> 
                            
                            </div>
                                  
                          
                        <div class="col-lg-4" id="airforce" style="display: none;"> 
                           <label for="rankairforce">Rank (AirForce):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 rankairforce" name="rank" id="rankairforce" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers" ="">
                                <option>Air Chief Marshal</option>  
                                <option>Air Marshal</option>
                                <option>Air Vice-Marshal</option>
                                <option>Air Commodore</option>
                                <option>Group Captain</option>
                                <option>Wing Commander</option>
                                <option>Squadron Leader</option> 
                                <option>Flight Lietenant</option> 
                                <option>Flying Officer</option> 
                                <option>Pilot Officer</option> 
                                <!-- <option value="">Field Marshal</option>  -->
                                </optgroup>

                                 <optgroup label="Enlisted Officers" ="">
                                <option>Warrant Officer Class 1</option>  
                                <option>Warrant Officer Class 2</option>
                                <option>Staff Sergeant</option>
                                <option>Sergeant</option>
                                <option>Corporal</option>
                                <option>Lance Corporal</option>
                                <option>Private</option> 
                                </optgroup>
                              
                                
                                
                             </select> 
                            
                            </div>



                       </div>
                    <!-- end -->

             

                    <div class="form-group row">

                                <div class="col-lg-4">
                                  <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"/>
                                      <span id="status-feedback" class="alert-danger"></span><br>
                                 </div>

                                  
                                 
                                 

                                  <div class="col-lg-4">
                                      <label class="label-control">TAG<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control" id="tag" name="tag"
                                        placeholder="Enter Tag Number">
                                        <span id="name-feedback"></span><br>
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

                                      <label class="label-control "for="Password">Password<span class="alert-danger">*</span></label>
                                        <input type="Password" class="form-control" id="Password" name="Password" placeholder="Enter Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>
                                 

                            <div class="col-lg-4"> 
                                <label for="status">Command<span class="alert-danger">*</span></label>
                                <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command">
                                <option disabled selected>Select Command</option>   
                                
                                <?php foreach ($comnds as $key => $value) {?>
                                  
                                <option value="<?php echo $value['COM_CODE']."@@".$value['COM_NAME']?>"><?php echo $value['COM_NAME'] ?></option>
                                
                                <?php } ?> 
                             
                                </select> 
                            
                             </div>






                            <div class="col-lg-4"> 
                                <label for="status">Unit<span class="alert-danger">*</span></label>
                                <select class="form-control select2 units" name="unit" id="unit">     
                                <option disabled selected>Select Unit</option>  

                             </select> 
                            
                            </div>


                            
                                  
                          
                       </div>


                        <div class="form-group row">

                              <div class="col-lg-4"> 
                                <label for="status">Department<span class="alert-danger">*</span></label>
                                <select class="form-control select2 department" name="department" id="department">    
                                <option disabled selected>Select Department</option>  

                             </select> 
                            
                            </div>

                           
                          <div class="col-lg-4">
                                  <label for="contact">contact<span class="danger">*</span></label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact"/>
                                    <span id="contact-feedback" class="alert-danger"></span><br>
                           </div>


                          <div class="col-lg-4">
                                <label for="status">Status</label>
                               <select class="custom-select" name="status" placeholder="select status">
                                <option disabled selected>Select Status</option>  

                                            <option value="1">Enable</option>
                                            <option value="2">Disable</option>
                                            <!-- <option value="3">Three</option> -->
                                     </select>
                               </div>



                            </div>



                    <!-- </div> -->

             
                               <div class="form-group row float-right">
                                   <div class="">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('save');">Save</button>
                                     <button type=submit onClick="$('#target').val('list')" class="btn btn-dark btn-square">Cancel</button>
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


