 
     



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
                            <h4 class="page-title"> <i class="mdi mdi-gas-station"></i>FUEL REQUEST</h4>
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
                               

                                <h4 class="mt-0 header-title"><b>[ REQUEST ]</b></h4>

   <div class="btn-group pull-right" style="margin-bottom:5px;">
        <span>
            <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('reset')" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-times"></i> Cancel </button>

            <a class="btn btn-info btn-square nextinfo" id="nextinfo"><i class="fa fa-arrow-right"></i> Next</a>

            <a class="btn btn-warning btn-square" style="display:none;" id="previoz"> <i class="fa fa-arrow-left"></i> Previous</a>
           
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
                                 <a class="nav-link active" id="tab1" data-toggle="tab" href="#personal" role="tab">Requester/Driver-Vehicle         Credentials</a>

                                    </li>

                                    <li class="nav-item disabledTab">
                                        <a class="nav-link" id="tab2" data-toggle="tab" href="#serv" role="tab">Fuel-Request Details</a>
                                    </li>

                                   
                                </ul>
                           </div>
                             






    <div class="tab-content">
             <div class="tab-pane active p-3" id="personal" role="tabpanel">
                                     <div class="form-group row">
                                  
                              
                                     <div class="col-lg-4"> 
                                                <label for="driver"> Driver Name<span class="alert-danger">*</span></label>
                                                    <select class="form-control select2" name="driver" id="driver" placeholder="choose Driver"> 
                                                        <option value="" disabled selected>Select Driver</option>  

                                                        <?php foreach ($drivers as $dkey => $dvalue) {?>
                                                        
                                                        <option value="<?php echo $dvalue['DR_CODE']?>"><?php echo $dvalue['DR_FIRSTNAME'].''.$dvalue['DR_SURNAME'] ?></option>

                                                        <?php } ?> 
                                                    </select> 
                            
                                           </div>

                                 

                               
                                           <div class="col-lg-4"> 

                                                <label for="ftype"> Vehicle <span class="alert-danger">*</span></label>
                                                    <select class="form-control select2" name="vehicle" id="vehicle" placeholder="choose Fuel-Type"> 
                                                        <option value="" disabled selected>Select Vehicle</option>  

                                                        <?php foreach ($vehicles as $vkey => $vvalue) {?>
                                                        
                                                        <option value="<?php echo $vvalue['VH_CODE'] ?>"><?php echo $vvalue['VH_NAME'].' '.$vvalue['VH_MODLE']?></option>

                                                        <?php } ?> 
                                                    </select> 
                            
                                           </div>



                                           <div class="col-lg-4"> 
                                                <label for="ftype"> Fuel-Type <span class="alert-danger">*</span></label>
                                                    <select class="form-control select2" name="ftype" id="ftype" placeholder="choose Fuel-Type"> 
                                                        <option value="" disabled selected>Select Fuel-Type</option>  

                                                        <?php foreach ($fuel as $fkey => $fvalue) {?>
                                                        
                                                        <option value="<?php echo $fvalue['FUEL_CODE']."@@".$fvalue['FUEL_NAME'] ?>"><?php echo $fvalue['FUEL_NAME'] ?></option>

                                                        <?php } ?> 
                                                    </select> 
                             
                                           </div>







                          
                       </div>
                   
                       <div class="form-group row">

                            <div class="col-lg-4">
                                        <label for="name">Fuel Volume [ In litres ] <span class="alert-danger">*</span></label>
                                                <input type="text" class="form-control"  id="fvolume" placeholder="Enter Fuel Volume" name="fvolume"/>
                                                <span id="name-feedback" class="alert-danger"></span><br>
                                            </div>
                            
                            </div> 
                              
                                
                      </div>



 <div class="tab-pane p-3" id="serv" role="tabpanel">
   
   <div class="container-sm" style="padding:100px;border:100px;" border>

  
  
    <div class="row" id="fueldetails">

       </div> <!--  end of details  -->
                            
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

// alert('hdhdhh');


  

  $('#previoz').on('click',function(){

      

        document.getElementById('tab2').classList.remove('active');
         document.getElementById('tab1').classList.add('active');
             // $("a").removeAttr("href");
              $('#nextinfo').show();
              $('#previoz').hide();
              $('#personal').show();
              $('#serv').hide();
   });




   $('.nextinfo').on('click',function(){ 

    // alert('gkjgkjkjgkgkj');

    // alert('hdhdhh');
    var fuelvolume=$('#fvolume').val();
    var vehicle=$('#vehicle option:selected').val();
    var driver=$('#driver option:selected').val();
    var fuelname=$('#ftype option:selected').val();

       alert(vehicle);
 
    var errorFound = false ;

   

    if (vehicle==="") {

        //$('#vname-feedback').html("Please Enter Vehicle--Name").css('color','red');
      $('#vehicle').css('border-color', 'red');
      event.preventDefault();
      errorFound = true ; 

    }else{

    //   $('#vname-feedback').text("");
      $('#vehicle').css('border-color', 'green');

    }


    if (driver==="") {

        //$('#vname-feedback').html("Please Enter Vehicle--Name").css('color','red');
        $('#driver').css('border-color', 'red');
        event.preventDefault();
        errorFound = true ; 

        }else{

        // $('#vname-feedback').text("");
        $('#driver').css('border-color', 'green');

     } 

     if (driver==="") {

        //$('#vname-feedback').html("Please Enter Vehicle--Name").css('color','red');
        $('#driver').css('border-color', 'red');
        event.preventDefault();
        errorFound = true ; 

        }else{

        // $('#vname-feedback').text("");
        $('#driver').css('border-color', 'green');

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

            //   alert(driver+'  -- '+vehicle) ;

              requestdetails(driver,vehicle)
              

              
  }




  

    
          });



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
