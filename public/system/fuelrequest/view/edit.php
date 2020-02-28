 
     



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
                            <h4 class="page-title"> <i class="dripicons-box"></i>MANAGE FLEET</h4>
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
                               

                                <h4 class="mt-0 header-title">[EDIT VEHICLES]</h4>

   <div class="btn-group pull-right" style="margin-bottom:5px;">
        <span>
            <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('reset')" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-arrow-left"></i> Back </button>

            <a class="btn btn-info btn-square" id="nextinfo">Next</a>

            <a class="btn btn-warning btn-square" style="display:none;" id="previoz">Previous</a>
           
        <button type="submit" id="savem" style="display: none;" onclick="document.getElementById('viewpage').value='save';document.myform.submit();" class="btn btn-success"> Save </button>
        
      

        <!-- <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button> -->
       </span>
            
  </div>
                                <p class="text-muted m-b-30 font-14"></p>

   <div style="margin-top: 110px">
          <?php 

            if (isset($msg)){
                $engine->msgBox($msg,$status);
            }
            
             ?>

    </div>

                          <!-- Nav tabs -->
             <div style="margin-top: 150px;margin-bottom: 50px">
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                                    <li class="nav-item disabledTab">
                                        <a class="nav-link active" id="tab1" data-toggle="tab" href="#personal" role="tab">Vehicle Credentials</a>

                                    </li>

                                    <li class="nav-item disabledTab">
                                        <a class="nav-link" id="tab2" data-toggle="tab" href="#serv" role="tab">Assign Vehicle</a>
                                    </li>

                                   
                                </ul>
                           </div>
                             






    <div class="tab-content">
             <div class="tab-pane active p-3" id="personal" role="tabpanel">
                                     <div class="form-group row">
                                  
                                <div class="col-lg-4">
                                  <label for="sname">vehicle Name<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="vname" placeholder="Enter Vehcle Name" name="vname" value="<?php echo $vname ?>"/>
                                        <span id="vname-feedback"></span><br> 
                                    </div>
                                 

                                 <div class="col-lg-4">
                                  <label for="name">Vehicle Number<span class="alert-danger">*</span></label>
                                        <input type="text" class="form-control"  id="vnum" placeholder="Enter Number" name="vnum" value="<?php echo $vnum ?>"/>
                                        <span id="vnum-feedback"></span><br>
                                    </div>
                                 






                              <div class="col-lg-4">
                                <label for="modle">Modle<span style="color:red">*</span></label>
                                 <input class="custom-select" name="modle" id="modle" placeholder="select modle" value="<?php echo $modle; ?>">
                                   <span id="modle-feedback"></span><br>
                               </div>


                          
                       </div>
                   
             
                      
                              <div class="form-group row">

                                      
                                            <div class="col-lg-4">
                                            <label>Fuel Consumption</label>
                                                    <input type="text" class="form-control" id="fuel" name="fuel" placeholder="Enter Fuel Consumption" value="<?php echo $fuelvolume; ?>"/>
                                                <span id="fuel-feedback"></span><br>
                                            </div>

                                            <div class="col-lg-4"> 
                                                <label for="ftype">Fuel-Type<span class="alert-danger">*</span></label>
                                                    <select class="form-control select2" name="ftype" id="ftype" placeholder="choose Fuel-Type"> 
                                                        <option value="" disabled selected>Select Fuel-Type</option>  

                                                        <?php foreach ($fuel as $fkey => $fvalue) {  echo $fvalue;?>

                                                        
                                                        
                                                         <option value="<?php echo $fvalue['FUEL_CODE']."@@".$fvalue['FUEL_NAME']?>" <?php echo (($ftype==$fvalue['FUEL_CODE']) ?'selected':'');?> ><?php echo $fvalue['FUEL_NAME'] ?></option>

                                                        <?php } ?> 
                                                    </select> 
                            
                                          </div>






                                          <div class="col-lg-4">
                                                <label for="make">Chasis : <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Enter Vehicle Chasis" value="<?php echo $chassis; ?>"/>
                                                 <span id="make-feedback" style="color:red"></span><br>
                                         </div>


                                       
                                        
                                  
                               </div>


                               <div class="form-group row">

                               <div class="col-lg-4">
                                            <label for="status">Status : <span style="color:red">*</span></label>
                                            <select type="text" class="custom-select" name="dstatus" id="stat" placeholder="select status">
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="1" <?php echo (($status == '1')?"selected":"");?>>Active</option>
                                                        <option value="2" <?php echo (($status == '2')?"selected":"");?>>Inactive</option>
                                                        <!-- <option value="3">Three</option> -->
                                                </select>
                                                <span id="stat-feedback"></span><br>
                                        </div>

                                   
                               </div>

        

                                
                      </div>



 <div class="tab-pane p-3" id="serv" role="tabpanel">




                      <div class="form-group row">

                            <div class="col-lg-4"> 
                               <label for="arm">Arm of Service<span class="alert-danger">*</span></label>
                                    <select class="form-control select2 arm" name="arm" id="arm" placeholder="Choose Arm">  
                                        <option value="" disabled selected>Select</option>
                                        <?php foreach ($polarm as $key => $value) { ?>
                                        
                                        <option value="<?php echo $value['ARM_CODE']."@@".$value['ARM_NAME'] ?>"   <?php echo (($arm ==  $value['ARM_CODE']  )?"selected":"");?> ><?php echo $value['ARM_NAME'] ?></option>

        
                                        <?php } ?> 
                                        
                                    </select> 
                                    
                            </div>


                            <div class="col-lg-4"> 
                                 <label for="Command">Command<span class="alert-danger">*</span></label>
                                     <select class="form-control select2 Commands" name="Command" id="Command" placeholder="choose Command"> 
                                        <option value="" disabled selected>Select Command</option>  

                                        <?php foreach ($comnds as $key => $value) {?>
                                        
                                        <option value="<?php echo $value['COM_CODE']."@@".$value['COM_NAME'] ?>" <?php echo (($Command ==  $value['COM_CODE']  )?"selected":"");?> ><?php echo $value['COM_NAME'] ?></option>

                                        <?php } ?> 
                                    </select> 
                            
                             </div>

                            <div class="col-lg-4"> 
                                <label for="unit">Unit<span class="alert-danger">*</span></label>
                                  <select class="form-control select2 units" name="unit" id="unit">     
                                    <option value="" disabled selected>Select Unit</option>  

                                  </select> 
                            
                            </div>

                       
                       </div>
            

                      <div class="form-group row">

                     
                            <div class="col-lg-4"> 
                                        <label for="office">Office/department<span class="alert-danger">*</span></label>
                                        <select class="form-control select2" name="department" id="department">     
                                        <option value="">Select Unit</option>  

                                        </select> 
                                    
                                </div>


                      </div>
                    

                          <div class="form-group row float-right">
                                   <div class="">
                                    <button type="submit" class="btn btn-primary" onclick="$('#viewpage').val('update');">Update</button>
                                     <!-- <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button> -->
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

    var vname=$('#vname').val();
    var vnum=$('#vnum').val();
    var modle=$('#modle').val();
    var make=$('#make').val();
    var fuel=$('#fuel').val();
    var status=$('#stat option:selected').val();
    // var make=$('#cartype option:selected').val();
    var errorFound = false ;

   

    if (vname==="") {

    //   $('#vname-feedback').html("Please Enter Vehicle--Name").css('color','red');
      $('#vname').css('border-color', 'red');
            event.preventDefault();
            errorFound = true ; 

  }else{

      $('#vname-feedback').text("");
      $('#vname').css('border-color', 'green');

  }

  



  if (modle==="") {

//   $('#fname-feedback').text("Please Enter Firstname");
  $('#modle').css('border-color','red');
        event.preventDefault();
        errorFound = true ; 

        }else{

        $('#modle').css('border-color','green');

   }



   if (make==="") {

//   $('#fname-feedback').text("Please Enter Firstname");
  $('#make').css('border-color','red');
        event.preventDefault();
        errorFound = true ; 

        }else{

        $('#make').css('border-color','green');

   }



 if (vnum==="") {

    //   $('#fname-feedback').text("Please Enter Firstname");
      $('#vnum').css('border-color','red');
            event.preventDefault();
            errorFound = true ; 

  }else{

    $('#vnum').css('border-color','green');

  }



  if (fuel==="") {

//   $('#fname-feedback').text("Please Enter Firstname");
  $('#fuel').css('border-color','red');
        event.preventDefault();
        errorFound = true ; 

}else{

$('#fuel').css('border-color','green');

}


if (status==="") {

    
      $('#stat').css('border-color','red');
            event.preventDefault();
            errorFound = true ; 

  }else{

        $('#stat-feedback').text("");
        $('#stat').css('border-color','green');
  
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
        
            var unitcode=$('.Commands').val();
            var keys=$('#keys').val();
    
            getunits(unitcode);
       
  
             function getunits(unitcode){
           $.ajax({
                       method:'POST',
                       url:'public/setup/managefleet/model/fetch.php',
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
                       url:'public/setup/managefleet/model/fetchdepartment.php',
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

       </script>
