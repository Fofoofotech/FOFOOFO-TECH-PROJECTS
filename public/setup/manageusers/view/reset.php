
 
       
  <div class="main-content container">
  
  <div class="row">
           <div class="col-12">
               <div class="project-list">
                   <div class="project-list-title">MANAGE BACK-END USERS</div>
                 

           </div>
           <!-- end page title end breadcrumb -->

       </div>
   </div>

         
            
   <div class="row">
        
        <div class="col-md-12">
           <div class="card card-default">
             <div class="card-header card-header-divider md-3">[:CHANGE PASSWORD]
                        
                <span class="pull-right">
                 <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('resetpwd');"><span class="icon s7-check"></span>Update</button>
                   <button type="submit" onClick="$('#target').val('list');" class="btn btn-dark btn-square"><span class="icon s7-close"></span>Cancel</button>
                </span>

             </div>
              <div class="card-body pl-sm-5">
                 
                  <?php $engine->msgBox($msg,$status); ?>
             
                  <!-- <form id='valiform'> -->
                    <div class="form-group row">
                                  
                                
                                 <div class="col-lg-4">

                                      <label class="label-control "for="Password1">old Password <font color="red">*</font></label>
                                        <input type="Password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>


                                        <div class="col-lg-4">

                                      <label class="label-control "for="Password1">New Password <font color="red">*</font></label>
                                        <input type="Password" class="form-control" id="newPassword1" name="newPassword1" placeholder="Enter New Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>
                                 

                                  
                                 <div class="col-lg-4">

                                      <label class="label-control "for="Password2">Repeat Password<span class="alert-danger">*</span></label>
                                        <input type="Password" class="form-control" id="repPassword" name="repPassword" placeholder="Repeat New Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>

                       </div>
                    <!-- </div> -->
                        
             
                      
    
                  
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


