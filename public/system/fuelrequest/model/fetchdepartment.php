<?php

include '../../../../config.php';





     $actor_contact=$session->get('contact');
     $actor_unit=$session->get('unit');
     $actor_department=$session->get('department');
     $actor_rank=$session->get('rank');
     $actor_fullname=$actor_rank.' '.$session->get('loginuserfulname');

     $driver=$_POST['driver'];
     $vehicle=$_POST['vehicle'];//exit;

     $final_data = array();

// if (!empty( $driver&& $vehicle)) {

  $vehicle_data = $sql->GETALL($sql->Prepare("SELECT * FROM pol_vehicles WHERE VH_CODE =? AND VH_STATUS=? "),array($vehicle,'1'));
  print $sql->ErrorMsg();

        foreach ($vehicle_data as $vhkey => $vhvalue) {
            
            $vehicle_num=$vhvalue['VH_NUMBER'];
            $vehicle_name=$vhvalue['VH_NAME'].' '.$vhvalue['VH_MODLE'];
            $comandname=$vhvalue['VH_COMMANDNAME'];
            $unitname=$vhvalue['VH_UNITNAME'];
            $department=$vhvalue['VH_DEPARTMENTNAME'];
            $chassis=$vhvalue['VH_CHASSIS'];
            $vehicle_arm=$vhvalue['VH_ARM'];
           
           }
    
  
      $driver_data=$sql->GETALL($sql->Prepare("SELECT * FROM pol_drivers WHERE DR_CODE=? AND DR_STATUS='1' "),array($driver));
           print $sql->ErrorMsg();
          //  $fuel=$sql->GETALL($sql->Prepare("SELECT FUEL_CODE,FUEL_NAME FROM pol_fuel WHERE FUEL_STATUS='1'"),array());
          foreach ($driver_data as $dvkey => $dvvalue) {
     
                $driver_tag=$dvvalue['DR_TAG'];
                $driver_name=$dvvalue['DR_FIRSTNAME'].' '.$dvvalue['DR_SURNAME'];
                $contact=$dvvalue['DR_CONTACT'];
                $dr_unit=$dvvalue['DR_UNITNAME'];
                $dr_department=$dvvalue['DR_DEPARTMENTNAME'];
                $rank=$dvvalue['DR_RANK'];
                $email=$dvvalue['DR_EMAIL'];
                $gender=$dvvalue['DR_GENDER'];
                $driver_arm=$dvvalue['DR_ARM'];
                $picname=$dvvalue['DR_PICNAME'];
                $picsize=$dvvalue['DR_SIZE'];
        }
       
        
    
           $final_data=['vehicle_data'=>$vehicle_data,'driver_data'=>$driver_data];
         // echo json_encode($final_data);
  ?>
        
        <div class="col-12">
                      <hr class="font-16">
                      <h4 class="pull-left font-16"> @ <span> <?php echo date('d/M/Y');?></span></h4> <br>
                   		<span style="margin-left:30%;"><img alt="image"  src="<?php echo $default_logo;?>"  width="138px" height="138px"/></span> 
                         
                           <br>
                 </div >

                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="pull-right font-16"><strong>Fuel Request Details</strong></h4>
                                        <!-- <h3 class="mt-0"> -->
                                       
                                        <h4 class="pull-left font-16"><strong>P.O.L</strong></h4>
                                        
                                            <!-- <img src="assets/images/logo_dark.png" alt="POL" height="26" /> -->
                                        <!-- </h3> -->
                                    </div><br>  
                                    
                                  <hr class="font-16"> 


                                    <div class="p-2">
                                            <h3 class="panel-title font-20 center alert-info"><strong><u>Driver Details</u></strong></h3>
                                        </div> 
                                    <div class="row">
                                        <div class="col-4">
                                            <address>
                                                    <strong> Driver : </strong>  <span> <?php echo $driver_name;?></span> <br><br>
                                                    <strong> Rank   : </strong>   <span> <?php echo $rank;?></span> <br><br>
                                                    <strong> Tag   : </strong>   <span> <?php echo $driver_tag?$driver_tag:'N/A';?></span> <br><br>
                                                   
                                                </address>
                                        </div>


                                        <div class="col-4">
                                            <address>
                                                   <strong> Contact : </strong>  <span> <?php echo $contact;?></span> <br><br>
                                                   <strong> Email   : </strong>   <span> <?php echo $email;?></span> <br><br>
                                                   <strong> Gender  : </strong>   <span> <?php echo $gender ? $gender:'N/A';?></span> <br><br>
                                                    
                                                   
                                                </address>
                                        </div>


                                        <div class="col-4">
                                            <address>
                                                <strong> Driver Unit : </strong>  <span> <?php echo $dr_unit;?></span> <br><br>
                                                <strong> Department   : </strong>   <span> <?php echo $dr_department;?></span> <br><br>
                                                <strong> Arm   : </strong>   <span> <?php echo $vehicle_arm;?></span> <br><br>
                                            </address>
                                        </div>
                                    </div>

                                  <hr>

                                    
                                  <div class="p-2" align-center>
                                            <h3 class="panel-title font-20 center alert-info" ><strong><u>Vehicle Details</u></strong></h3>
                                        </div> 

                                    <div class="row">
                                    
                                      <div class="col-4">
                                              <address>
                                                      <strong> Vehicle : </strong>  <span> <?php echo $vehicle_name;?></span> <br><br>
                                                      <strong> Registration N0. : </strong>   <span> <?php echo $vehicle_num;?></span> <br><br>
                                                      <strong> Chassis   : </strong>   <span> <?php echo $chassis?$chassis:'N/A';?></span> <br><br>
                                                    
                                                  </address>
                                          </div>


                                          <div class="col-4">
                                              <address>
                                                    <strong> Contact : </strong>  <span> <?php echo $contact;?></span> <br><br>
                                                    <strong> Email   : </strong>   <span> <?php echo $email;?></span> <br><br>
                                                    <strong> Gender  : </strong>   <span> <?php echo $gender ? $gender:'N/A';?></span> <br><br>
                                                      
                                                    
                                                  </address>
                                          </div>
                                  </div>   <!-- END OF SECOND ROW -->
                                  <hr>



                                </div>
                            </div>

                            <div class="col-12">

                                <div class="row">
                               
                                    <!-- <div class="panel panel-default"> -->
                                       <div class="p-2">
                                            <h3 class="panel-title font-20 alert-primary"><strong>Fuel Request summary</strong></h3>
                                        </div> 
                                      
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Requester Name</strong></td>
                                                            <td><strong>Unit</strong></td>
                                                            <td><strong>Department</strong></td>
                                                            <td ><strong>Contact</strong>
                                                            <td ><strong class="alert-warning"><u> Fuel Details</u></strong>
                                                            </td>
                                                            <!-- <td><strong>Totals</strong></td> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        <tr>
                                                            <td> <?php echo $actor_fullname ? $actor_fullname:'N/A';?></td>
                                                            <td><?php echo $actor_unit ? $actor_unit:'N/A';?></td>
                                                            <td><?php echo $actor_department? $actor_department:'N/A';?></td>
                                                            <td><?php echo $actor_contact ? $actor_contact:'N/A';?></td>
                                                            <td><span class="fa fa-arrow-down"></span></td>
                                                        </tr>
                                                       
                                                       
                                                        <tr>
                                                          <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center">
                                                                <strong>Fuel Type :</strong></td>
                                                            <td class="thick-line">Diesel</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Fuel Quantity :</strong></td>
                                                            <td class="no-line ">100 L</td>
                                                        </tr>
                                                      
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="pull-right">
                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                                </div>
                                            </div>
                                        
                                    <!-- </div> -->

                                </div>
                            </div>
                            <!-- end row -->
 

         <?php //} ;?>


      
   
