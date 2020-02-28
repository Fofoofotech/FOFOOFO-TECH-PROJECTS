 
     



<style>
a {
    cursor:;
}
.disabledTab {
    cursor: not-allowed;
}
/* Clicks are not permitted and change the opacity. */
li.disabledTab > a[data-toggle="tab"] {
    pointer-events: none;
    /* filter: alpha(opacity=65);*/
    -webkit-box-shadow: none;

    box-shadow: none;/*opacity: .65;*/
}
 #previoz, #nextinfo{
    margin-left: 10px;
}
</style>








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
                               

                                <h4 class="mt-0 header-title"><b>EDIT DRIVER</b></h4>

   <div class="btn-group pull-right" style="margin-bottom:5px;">
        <span>
            <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('reset');" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-arrow-left"></i> Back </button>

            <a class="btn btn-info btn-square" id="nextinfo">Next</a>

            <a class="btn btn-warning btn-square" style="display:none;" id="previoz">Previous</a>
       <!--     
        <button type="submit" id="savem" style="display: none;" onclick="document.getElementById('viewpage').value='save';document.myform.submit();" class="btn btn-success"> Save </button>
        
       -->

        <!-- <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button> -->
       </span>
            
  </div>
                                <p class="text-muted m-b-30 font-14"></p>

   
          <?php 

            if (isset($msg)){
                $engine->msgBox($msg,$status);
            }
            
             ?>



                          <!-- Nav tabs -->
             <div style="margin-top: 150px;margin-bottom: 50px">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                                    <li class="nav-item disabledTab">
                                        <a class="nav-link active" id="tab1" data-toggle="tab" href="#personal" role="tab">Personal Credentials</a>

                                    </li>

                                    <li class="nav-item disabledTab">
                                        <a class="nav-link" id="tab2" data-toggle="tab" href="#serv" role="tab">Sevice Credentials</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages2" role="tab">Messages</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#settings2" role="tab">Settings</a>
                                    </li> -->
                                </ul>
                           </div>
                                <!-- Tab panes -->






    <div class="tab-content">
             <div class="tab-pane active p-3" id="personal" role="tabpanel">
                                     <div class="form-group row">
                                  
                                <div class="col-lg-4">
                                  <label for="sname">Surname Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="sname" placeholder="Enter Fullname" name="sname" value="<?php echo $sname;?>" />
                                        <span id="sname-feedback"></span><br>
                                    </div>
                                 

                                 <div class="col-lg-4">
                                  <label for="name">First Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="fname" placeholder="Enter Fullname" name="fname" value="<?php echo $fname;?>"/>
                                        <span id="fname-feedback"></span><br>
                                    </div>
                                 





                                 <div class="col-lg-4" style="margin-top:-7px">
                                <!-- <div class="form-group"> -->
                                <label for="em">Upload Drivers Photo (JPG) <span style="color:#F00">*</span>:</label>
                               <!-- <div  id="pic" style="margin-top:22px;"> -->

                               <!-- <div class="id-photo"> -->
                                <!--  <img src="media/img/avatar.png" alt="" id="prevphotos" style="width:50% !important; margin:0px !important;"> -->
                                 <label class="btn btn-info btn-block id-container" for="image">
                                 <input id="image" type="file"  onchange="readURL(this);" name = "picturename" >
                                  <i class="fa fa-pencil"></i>Upload Picture</label>
                                 <span  class='label label-info' id="upload-file-info"></span>
                                <!-- </div> -->

                               <!-- </div> -->

                                <span id="image-feedback"></span><br>
                                </div>


                                 <!--  <div class="col-lg-4">
                                    <label for="usrname">Username<span class="alert-danger">*</span></label>
                                        <input  class="form-control" id="usrname" name="usrname" placeholder="username"/>
                                        <span id="usrname-feedback" class="alert-danger"></span><br>
                                   </div> -->
                          
                       </div>
                    <!-- </div> -->

             
                      
                              <div class="form-group row">

                                <div class="col-lg-4">
                                  <label for="contact">contact <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Phone Number" value="<?php echo $contact;?>"/>
                                    <span id="mobile-feedback" style="color:red"></span><br>
                                     </div>
                                    
                                <div class="col-lg-4">
                                  <label>Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $email;?>"/>
                                      <span id="email-feedback"></span><br>
                                  </div>


                               <div class="col-lg-4">
                                <label for="status">Status <span style="color:red">*</span></label>
                                 <select class="custom-select" name="dstatus" id="stat" placeholder="select status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="1"<?php echo (($status == '1')?"selected":"");?>>Active</option>
                                            <option value="0"<?php echo (($status == '0')?"selected":"");?>>Inactive</option>
                                            <!-- <option value="3">Three</option> -->
                                     </select>
                                     <span id="stat-feedback"></span><br>
                               </div>
                                <!--  <div class="col-lg-4">

                                      <label class="label-control "for="Password">Password<span class="alert-danger">*</span></label>
                                        <input type="Password" class="form-control" id="Password" name="Password" placeholder="Enter Password"/>
                                                <span id="Password-feedback" class="alert-danger"></span><br>
                                     </div>
                                   -->
                                  
                               </div>

                                  <div class="form-group row">


                       

                                   </div>

                      </div>



 <div class="tab-pane p-3" id="serv" role="tabpanel">




                      <div class="form-group row">

                       <div class="col-lg-4"> 
                             <label for="arm">Arm of Service<span class="alert-danger">*</span></label>
                               <select class="form-control select2 arm" name="arm" id="arm" placeholder="Choose Arm">  
                                <option value="" disabled selected>Select</option>
                                <?php foreach ($polarm as $key => $value) { ?>
                                  
                                <option value="<?php echo $value['ARM_CODE']."@@".$value['ARM_NAME'] ?>"   <?php echo (($arm ==  $value['ARM_CODE']  )?"selected":"");?>  ><?php echo $value['ARM_NAME'] ?></option>

  
                                <?php } ?> 
                                
                             </select> 
                            
                            </div>




                        <div class="col-lg-4"  id="army" style="display: none;"> 
                           <label for="rankarmy">Rank (Army):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranks" name="rank" id="rankarmy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                <optgroup label="Commissioned Officers">
                               <?php foreach ($armyrank as $key => $value) { if ($value['RANK_OPT']==1) {
                                 
                                ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>"  <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?>   ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 

                                </optgroup>

                                 <optgroup label="Enlisted Officers">
                                 
                                 <?php foreach ($armyrank as $key => $value) { if ($value['RANK_OPT']==2) {
                                 
                                  ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>"  <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?>   ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 


                                 </optgroup>
                                
                                
                             </select> 
                            
                            </div>
                                  
                         

                                     

                          <div class="col-lg-4" id="navy" style="display: none;"> 
                           <label for="rankarmy">Rank (Navy):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 ranknavy" name="rank" id="ranknavy" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                
                                <optgroup label="Commissioned Officers">
                               <?php foreach ($airforcerank as $key => $value) { if ($value['RANK_OPT']==1) {
                                 
                                ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>"  <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?>  ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 

                                </optgroup>

                                 <optgroup label="Enlisted Officers">
                                 
                                 <?php foreach ($airforcerank as $key => $value) { if ($value['RANK_OPT']==2) {
                                 
                                  ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>"  <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?> ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 


                                 </optgroup>
                                



                                
                             </select> 
                            
                            </div>
                                  
                          
                        <div class="col-lg-4" id="airforce" style="display: none;"> 
                           <label for="rankairforce">Rank (AirForce):<span class="alert-danger">*</span></label>
                         <select class="form-control select2 rankairforce" name="rank" id="rankairforce" placeholder="Choose Rank">  
                                <option value="" disabled selected>Select</option>
                                                                <optgroup label="Commissioned Officers">
                               <?php foreach ($navyrank as $key => $value) { if ($value['RANK_OPT']==1) {
                                 
                                ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>" <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?>  ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 

                                </optgroup>

                                 <optgroup label="Enlisted Officers">
                                 
                                 <?php foreach ($navyrank as $key => $value) { if ($value['RANK_OPT']==2) {
                                 
                                  ?>
                                  
                                <option value="<?php echo $value['RANK_CODE']."@@".$value['RANK_NAME'] ?>" <?php echo (($rank ==  $value['RANK_CODE']  )?"selected":"");?>   ><?php echo $value['RANK_NAME'] ?></option>


                                
                                <?php }} ?> 


                                 </optgroup>
                                
                                </optgroup>
                              
                                
                                
                             </select> 
                            
                            </div>

                   
            <!--  -->
                         <div class="col-lg-4"> 
                                <label for="Command">Command<span class="alert-danger">*</span></label>
                                <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command"> 
                                 <option value="" disabled selected>Select Command</option>  

                                <?php foreach ($comnds as $key => $value) { ?>
                                  
                                <option value="<?php echo $value['COM_CODE']."@@".$value['COM_NAME'] ?>" <?php echo (($Command ==  $value['COM_CODE']  )?"selected":"");?>  ><?php echo $value['COM_NAME'] ?></option>


                                
                                <?php } ?> 
                             </select> 
                            
                             </div>

                          
                                  

                       </div>




            

                      <div class="form-group row">

                        <div class="col-lg-4"> 
                                <label for="unit">Unit<span class="alert-danger">*</span></label>
                                <select class="form-control select2 units" name="unit" id="unit">     
                                <option value="" disabled selected>Select Unit</option>  

                             </select> 
                            
                             </div>


                           
                       <div class="col-lg-4"> 
                                <label for="office">Office/department<span class="alert-danger">*</span></label>
                                 <select class="form-control select2" name="department" id="department">     
                                 <option value="">Select Unit</option>  

                                 </select> 
                            
                             </div>



                           <!--  <div class="col-lg-4"> 
                                <label for="Vehichle">vehicle(s)<span class="alert-danger">*</span></label>
                                <select  name="Vehichle" id="Vehichle" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">     
                                <option value="vh001">Select Unit</option>  

                             </select> 
                            
                             </div>
                              
 -->

                           
                        </div>
                      <!-- </div> -->
                      <!-- </div> -->
                 
<!--               <div class="form-group row">                                                                                                       
                               

                             <div class="col-lg-4"> 
                              <label for="uco">Unit C.O<span class="alert-danger">*</span></label>
                               <select class="form-control select2" name="uco" id="uco">     
                                <option value="">Select Unit</option>  

                             </select> 
                            
                             </div>
            
                          
                           
                         </div> -->

                          <div class="form-group row float-right">
                                   <div class="">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('update');">Update</button>
                                     <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
                                  </div>
                            </div>
                            
                           </div>
                              
                  
                      <!--  </form> -->

                     </div> <!-- end of tabb content -->

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


    //PICTURE MANUPLATION
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









  

  $('#previoz').on('click',function(){
        document.getElementById('tab2').classList.remove('active');
         document.getElementById('tab1').classList.add('active');
             // $("a").removeAttr("href");
              $('#nextinfo').show();
              $('#previoz').hide();
              $('#personal').show();
              $('#serv').hide();
   });




   $('#nextinfo').on('click',function(){ 

    // alert('hdhdhh');fname
    var sname=$('#sname').val();
    var mobile=$('#mobile').val();
    var fname=$('#fname').val();
    var status=$('#stat option:selected').val();
    var cartypz=$('#cartype option:selected').val();
    var errorFound = false ;

   var email_regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  // var phone_regex=/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
   var phone_regex=/^\d{10}$/;

    if (sname==="") {

      $('#sname-feedback').text("Please Enter Surname");
      $('#sname-feedback').css('color', 'red');
            event.preventDefault();
            errorFound = true ; 

  }else{

      $('#sname-feedback').text("");

  }


if(mobile.match(phone_regex)) {
  // alert('valid');

   $('#mobile-feedback').html('Valid');
   $('#mobile-feedback').css('color', 'green');


  
    
    }else{
     

     // alert('not valid');
      $('#mobile-feedback').text("Please Enter A Valid Mobile number");
      $('#mobile-feedback').css('color', 'red');
      event.preventDefault();
      errorFound = true ;
     // $('#mobile-feedback').text("");
    
  }



 if (fname==="") {

      $('#fname-feedback').text("Please Enter Firstname");
      $('#fname-feedback').css('color', 'red');
            event.preventDefault();
            errorFound = true ; 

  }else{

 $('#fname-feedback').text("");

  }


if (status==="") {

      $('#stat-feedback').text("Please select Status");
      $('#stat-feedback').css('color', 'red');
            event.preventDefault();
            errorFound = true ; 

  }else{

 $('#stat-feedback').text("");

  }


  if(errorFound){

    // alert("error found") ;
    return ;

  }else{
        
        // alert("No error found");
    
         document.getElementById('tab2').classList.add('active');
         document.getElementById('tab1').classList.remove('active');
             // $("a").removeAttr("href");
              $('#nextinfo').hide();
              $('#previoz').show();
              $('#personal').hide();
              $('#serv').show();
  }

    
          });



 $(document).ready(function() {
      

var armvibes=$('#arm').val();
// alert(armvibes);

    if (armvibes =='AR0001@@Army') {

     $('#army').show();
     $('#navy').hide();
      $('#airforce').hide();

     }

    if (armvibes =='AI0003@@Airforce') {

     $('#airforce').show();
     $('#army').hide();
     $('#navy').hide();
   
     }

      if (armvibes =='CI0004@@Civilian') {

     $('#airforce').hide();
     $('#army').hide();
     $('#navy').hide();
     
     }

      if (armvibes =='NA0002@@Navy') {
       
        $('#navy').show();
        $('#army').hide();
        $('#airforce').hide();
       

    }else{
    
           return false;

   }

    




    } );




$(document).ready(function() {
        

 alert('newunitcode');
var unitcode=$('.Commands').val();
var keys=$('#keys').val();

// var code=unitcode.split('@@');

// var newunitcode=code[0];
// alert(keys);

getunits(unitcode);






      function getunits(unitcode){
    $.ajax({
                method:'POST',
                url:'public/setup/managedrivers/model/fetch.php',
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
                url:'public/setup/managedrivers/model/fetchdepartment.php',
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






    } );






     // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();


    //         reader.onload = function (e) {
    //             $('#prevphotos')
    //                 .attr('src', e.target.result)

    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // // $(document).ready(function() {
    // //
    // //     $('#example').DataTable( {
    // //         alert("asdasdasda")
    // //         "paging":   false,
    // //         "ordering": false,
    // //         "info":     false
    // //     } );
    // // } );
    // $(document).ready(function() {
    //     $('#example').DataTable();

    // } );
</script>
