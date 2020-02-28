
       
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

                                <h4 class="mt-0 header-title">EDIT UNIT C.Os</h4>
                                <p class="text-muted m-b-30 font-14"></p>


          <?php 

            if ($msg) {
                $engine->msgBox($msg,$status);
            }
            
             ?>


       <div class="form-group row">


                      <div class="col-lg-4">
                                  <label for="name">Full Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="name" placeholder="Enter Fullname" name="name" value="<?php echo $name;?>" />
                                        <span id="name-feedback" class="alert-danger"></span><br>
                                    </div>




                       <div class="col-lg-4"> 
                             <label for="arm">Arm of Service<span class="alert-danger">*</span></label>
                               <select class="form-control select2 arm" name="arm" id="arm" placeholder="Choose Arm" value="<?php echo $arm;?>">  
                                <option  disabled selected>Select</option>
                                <option value="Army" <?php echo (($arm == 'Army')?"selected":"");?>>Army</option>  
                                <option value="Navy" <?php echo (($arm == 'Navy')?"selected":"");?>>Navy</option>
                                <option value="Airforce" <?php echo (($arm == 'Airforce')?"selected":"");?>>Airforce</option>
                                <option value="Civilian"  <?php echo (($arm == 'Civilian')?"selected":"");?>>Civilian</option> 
                                  
                                
                             </select> 
                            
                            </div>

                        <div class="col-lg-4"  id="army" style="display: none;"> 
                           <label for="rankarmy">Rank (Army):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranks" name="rank" id="rankarmy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers">
                                <option value="Field Marshal" <?php echo (($rank == 'Field Marshal')?"selected":"");?>>Field Marshal</option>  
                                <option value="General" <?php echo (($rank == 'General')?"selected":"");?>>General</option>
                                <option  value="Lietenant General" <?php echo (($rank == 'Lietenant General')?"selected":"");?>>Lietenant General</option>
                                <option  value="Major General"  <?php echo (($rank == 'Major General')?"selected":"");?>>Major General</option>
                                <option value="Bregadier colonel" <?php echo (($rank == 'Bregadier colonel')?"selected":"");?>>Bregadier colonel</option>
                                <option  value="Lietenant colonel" <?php echo (($rank == 'Lietenant colonel')?"selected":"");?>>Lietenant colonel</option>
                                <option  value="Major" <?php echo (($rank == 'Major')?"selected":"");?>>Major</option> 
                                <option value="Captain" <?php echo (($rank == 'Captain')?"selected":"");?>>Captain</option> 
                                <option value="Lietenant" <?php echo (($rank == 'Lietenant')?"selected":"");?>>Lietenant</option> 
                                <option value="2nd Lietenant" <?php echo (($rank == '2nd Lietenant')?"selected":"");?>>2nd Lietenant</option> 
                                <!-- <option <?php echo (($rank == 'Field Marshal')?"selected":"");?>>Field Marshal</option>  -->
                                </optgroup>

                                 <optgroup label="Enlisted Officers">
                                <option <?php echo (($rank == 'Warrant Officer Class 1 ')?"selected":"");?>>Warrant Officer Class 1</option>  
                                <option <?php echo (($rank == 'Warrant Officer Class 2')?"selected":"");?>>Warrant Officer Class 2</option>
                                <option <?php echo (($rank == 'Staff Sergeant')?"selected":"");?>>Staff Sergeant</option>
                                <option <?php echo (($rank == 'Sergeant')?"selected":"");?>>Sergeant</option>
                                <option <?php echo (($rank == 'Corporal')?"selected":"");?>>Corporal</option>
                                <option <?php echo (($rank == 'Lance Corporal')?"selected":"");?>>Lance Corporal</option>
                                <option <?php echo (($rank == 'Private')?"selected":"");?>>Private</option> 
                                </optgroup>
                                
                                
                             </select> 
                            
                            </div>
                                  
                         

                                     

                          <div class="col-lg-4" id="navy" style="display: none;"> 
                           <label for="rankarmy">Rank (Navy):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranknavy" name="rank" id="ranknavy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers">
                                <option <?php echo (($rank == 'Admiral')?"selected":"");?>>Admiral</option>  
                                <option <?php echo (($rank == 'Vice Admiral')?"selected":"");?>>Vice Admiral</option>
                                <option <?php echo (($rank == 'Rear Admiral')?"selected":"");?>>Rear Admiral</option>
                                <option <?php echo (($rank == 'Commodore')?"selected":"");?>>Commodore</option>
                                <option <?php echo (($rank == 'Captain')?"selected":"");?>>Captain</option>
                                <option <?php echo (($rank == 'Commander')?"selected":"");?>>Commander</option>
                                <option <?php echo (($rank == 'Lieutenant Commander')?"selected":"");?>>Lieutenant Commander</option> 
                                <option <?php echo (($rank == 'Lieutenant')?"selected":"");?>>Lieutenant</option> 
                                <option <?php echo (($rank == 'Sub Lietenant')?"selected":"");?>>Sub Lietenant</option>  
                                </optgroup>

                                 <optgroup label="Enlisted Officers" ="">
                                <option <?php echo (($rank == 'Chief Petty Officer')?"selected":"");?>>Chief Petty Officer</option>  
                                <option <?php echo (($rank == 'Petty Officer First Class')?"selected":"");?>>Petty Officer First Class</option>
                                <option <?php echo (($rank == 'Petty Officer Second Class')?"selected":"");?>>Petty Officer Second Class</option>
                                <option <?php echo (($rank == 'Leading Seaman')?"selected":"");?>>Leading Seaman</option>
                                </optgroup>
                                
                                
                             </select> 
                            
                            </div>
                                  
                          
                        <div class="col-lg-4" id="airforce" style="display: none;"> 
                           <label for="rankairforce">Rank (AirForce):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 rankairforce" name="rank" id="rankairforce" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers" ="">
                                <option <?php echo (($rank == 'Air Chief Marshal')?"selected":"");?>>Air Chief Marshal</option>  
                                <option <?php echo (($rank == 'Air Marshal')?"selected":"");?>>Air Marshal</option>
                                <option <?php echo (($rank == 'Air Vice-Marshal')?"selected":"");?>>Air Vice-Marshal</option>
                                <option <?php echo (($rank == 'Air Commodore')?"selected":"");?>>Air Commodore</option>
                                <option <?php echo (($rank == 'Group Captain')?"selected":"");?>>Group Captain</option>
                                <option <?php echo (($rank == 'Wing Commander')?"selected":"");?>>Wing Commander</option>
                                <option <?php echo (($rank == 'Squadron Leader')?"selected":"");?>>Squadron Leader</option> 
                                <option <?php echo (($rank == 'Flight Lietenant')?"selected":"");?>>Flight Lietenant</option> 
                                <option <?php echo (($rank == 'Flying Officer')?"selected":"");?>>Flying Officer</option> 
                                <option <?php echo (($rank == 'Pilot Officer')?"selected":"");?>>Pilot Officer</option> 
                                <!-- <option value="">Field Marshal</option>  -->
                                </optgroup>

                                 <optgroup label="Enlisted Officers" ="">
                                <option <?php echo (($rank == 'Warrant Officer Class 1')?"selected":"");?>>Warrant Officer Class 1</option>  
                                <option <?php echo (($rank == 'Warrant Officer Class 2')?"selected":"");?>>Warrant Officer Class 2</option>
                                <option <?php echo (($rank == 'Staff Sergeant')?"selected":"");?>>Staff Sergeant</option>
                                <option <?php echo (($rank == 'Sergeant')?"selected":"");?>>Sergeant</option>
                                <option <?php echo (($rank == 'Field Marshal')?"selected":"");?>>Corporal</option>
                                <option <?php echo (($rank == 'Corporal')?"selected":"");?>>Lance Corporal</option>
                                <option <?php echo (($rank == 'Private')?"selected":"");?>>Private</option> 
                                </optgroup>
                              
                                
                                
                             </select> 
                            
                            </div>



                       </div>
                    <!-- end -->

             

                    <div class="form-group row">

                                <div class="col-lg-4">
                                  <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $email?>" />
                                      <span id="status-feedback" class="alert-danger"></span><br>
                                 </div>

                                  
                                 
                           <div class="col-lg-4">
                                  <label for="contact">contact<span class="danger">*</span></label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact" value="<?php echo $contact?>"/>
                                    <span id="contact-feedback" class="alert-danger"></span><br>
                           </div>
       
                   <div class="col-lg-4"> 
                                <label for="status">Command<span class="alert-danger">*</span></label>
                                <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command">
                                <option disabled selected>Select Command</option>   
                                
                                <?php foreach ($comnds as $key => $value) {?>
                                  
                                <option value="<?php echo $value['COM_CODE']."@@".$value['COM_NAME']?>" <?php echo (($Command == $value['COM_CODE'])?"selected":"");?>><?php echo $value['COM_NAME'] ?></option>
                                
                                <?php } ?> 
                             
                                </select> 
                            
                             </div>

                                  
                          
                       </div>
                    <!-- </div> -->

                    <div class="form-group row">
                                  
                             
                        
                     <div class="col-lg-4"> 
                                <label for="status">Unit<span class="alert-danger">*</span></label>
                                <select class="form-control select2 units" name="unit" id="unit">     
                                <option disabled selected>Select Unit</option> 

                              <?php foreach ($unntsz as $key => $value) {?>
                                  
                                <option value="<?php echo $value['UNT_CODE']."@@".$value['UNT_NAME']?>" <?php echo (($unit == $value['UNT_CODE'])?"selected":"");?>><?php echo $value['UNT_NAME'] ?></option>
                                
                                <?php } ?> 
                              

                             </select> 
                            
                            </div>

                     <div class="col-lg-4"> 
                                <label for="status">Department<span class="alert-danger">*</span></label>
                                <select class="form-control select2 department" name="department" id="department">    
                                <option disabled selected>Select Department</option>  

                             </select> 
                            
                            </div>

                           
                         

                          <div class="col-lg-4">
                                <label for="status">Status</label>
                               <select class="custom-select" name="status" placeholder="select status">
                                <option disabled selected>Select Status</option>  

                                            <option value="1" <?php echo (($status == '1')?"selected":"");?>>Enable</option>
                                            <option value="0" <?php echo (($status == '0')?"selected":"");?>>Disable</option>
                                            <!-- <option value="3">Three</option> -->
                                     </select>
                               </div>

                            
                                  
                          
                       </div>



             
                               <div class="form-group row float-right">
                                   <div class="">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('update');">Save</button>
                                     <button type=submit onClick="$('#viewpage').val('reset');$('#target').val('');" class="btn btn-dark btn-square">Cancel</button>
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
<script type="text/javascript">
 $(document).ready(function(){
// alert('JESUS');
// var arms=$('#arm').val();
// alert(arms);
var armvibes=$('#arm').val();
// alert(armvibes);
    if (armvibes =='Army') {

     $('#army').show();
     $('#navy').hide();
      $('#airforce').hide();

     }

    if (armvibes =='Airforce') {

     $('#airforce').show();
     $('#army').hide();
     $('#navy').hide();
   
     }

      if (armvibes =='Civilian') {

     $('#airforce').hide();
     $('#army').hide();
     $('#navy').hide();
     
     }

      if (armvibes =='Navy') {
       
        $('#navy').show();
        $('#army').hide();
        $('#airforce').hide();
       

    }else{
    
           return false;

   }

});




  //GET UNITS AND DEPARTMENTS



  $(document).ready(function(){

    // alert('newunitcode');
var unitcode=$('.Commands').val();
var keys=$('#keys').val();

// var code=unitcode.split('@@');

// var newunitcode=code[0];
// alert(keys);

getunits(unitcode);






      function getunits(unitcode){
    $.ajax({
                method:'POST',
                url:'public/setup/manageunitco/model/fetch.php',
                data:{'unitcode':unitcode,'keys':keys},
                success: function(response){
                  if(!response){
                    $("#unit").html('<option >--No Unit available--</option>')
                    return
                  }
                  hasCompanies = true ;
               $('#unit').html(response);

                }
            })


     $.ajax({
                method:'POST',
                url:'public/setup/manageunitco/model/fetchdepartment.php',
                data:{'unitcode':unitcode,'keys':keys},
                success: function(response){
                  if(!response){
                    $("#department").html('<option >--No Department(s) available--</option>')
                    return
                  }
                  hasCompanies = true ;
               $('#department').html(response);

                }
            })
}







});


 



</script>
       

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


