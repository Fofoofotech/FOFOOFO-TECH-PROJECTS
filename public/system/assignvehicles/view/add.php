 
       
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

                                <h4 class="mt-0 header-title"> ASSIGN </h4>
                              

                                <div class="btn-group pull-right">
                                        <span>
                                            <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('')" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-close"></i> Cancel </button>
                                
                                       </span>
            
                              </div>
                            
                            <p style="margin-bottom:70px;"></p>
                 
     <?php if(isset($msg)){$engine->msgBox($msg,$status);}?>
             
                  <!-- <form id='valiform'> -->
                    <div class="form-group row">
                                  
                             <div class="col-lg-4"> 
                                        <label for="arm">Vehicle<span class="alert-danger">*</span></label>
                                                <select class="select2 form-control select2-multiple " multiple="multiple" multiple data-placeholder="Choose Vehicle ..." name="vehicle[]">  
                                                    
                                                    <?php foreach ($fleets as $key => $value) { ?>
                                                    
                                                    <option value="<?php echo $value['VH_CODE']."@@".$value['VH_NAME'] ?>"><?php echo $value['VH_NAME'] ?></option>

                    
                                                    <?php } ?> 
                                                    
                                                </select> 
                                    
                               </div>

                              
                          
                       </div>
                    <!-- </div> -->

             
                      
                           
                               <div class="form-group row float-right">
                                   <div class="">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('save');">Assign</button>
                                     
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


