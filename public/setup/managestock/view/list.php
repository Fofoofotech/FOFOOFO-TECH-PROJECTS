<?php $rs = $paging->paginate(); ?>

              <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-duplicate"></i> Manage DRIVERS</h4>
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
                        <div class="card">
                            <div class="card-body">

                          <p> <div class="mt-0 header-title m-b-30">DRIVERS</div></p>



      <div class="input-group" >
             
                            <!-- <div class="row"> -->
          <div class="col-sm-2 mo-mb-2">
            <div id="pager"> <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?> <?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>'); ?>
              <input name="page" type="text" class="pagedisplay short" style="width: 30px;" value="<?php echo $paging->renderNavNum(); ?>" readonly />
              <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?> <?php echo $paging->renderLast('<span class="fa fa-angle-double-right"></span>');?>
              <?php $paging->limitList($limit, 'myform');?>
            </div>
          </div>

          <div class="col-sm-3 mo-mb-2">
             <div class="input-group">
                  <input type="text" tabindex="1" value="<?php echo isset($fdsearch)?$fdsearch:''; ?>" class="form-control square-input" name="fdsearch" placeholder="Type to Search" />
                  <span class="input-group-btn">
                  <button type="submit" onclick="$('#target').value='';" class="btn btn-default btn-gyn-search"> <i class="fa fa-search"></i> </button>
                  </span>
               </div>
           </div>


              <div class="col-sm-2">
                <div class="btn-group">
                  <button type="submit" onclick="document.getElementById('target').value='';document.getElementById('viewpage').value='reset';document.myform.submit;" class="btn btn-primary gyn-teal square"> <i class="fa fa-refresh"></i> </button>
                </div>
              </div>
            

        </div>

         
          <div class="form-group row float-right" style="margin-right:20px; padding-top:90px">
      
            <button type="submit" onclick="document.getElementById('target').value='add';document.myform.submit();"
            class="btn btn-success waves-effect waves-light"><i class="fa fa-plus-circle"></i> Add Driver </button>
          </div>
     
          <p>

            <?php $engine->msgBox($msg,$status); ?>
         
          <div class="col-lg-12" style="padding-top: 60px">
                  
                       
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                            <th> Name</th>
                                            <th>Contact</th>
                                            <th>Username</th>
                                            <th>Driver Tag</th>
                                            <th>Status</th>
                                            <!-- <th>Created Date</th>  -->
                                            <th>Action</th> 
                                            
                                           
                                        </tr>
                                    </thead>
                                
                                
                                    <tbody>
                                    <?php
                                    if($paging->total_rows > 0){
                                        $page = (empty($page))? 1:$page;
                                        $num = (isset($page))? ($limit*($page-1))+1:1;
                                        $n=1;
                                        while(!$rs->EOF){
                                            $obj = $rs->FetchNextObject();
                                      ?>   
                                      <tr>
                                      <td><?php echo $n++; ?> </td>
                                      <td><?php echo $obj->USR_NAME?></td>
                                      <td><?php echo $obj->USR_CONTACT?></td>
                                      <td><?php echo $obj->USR_USERNAME?></td>
                                      <td><?php echo $obj->USR_EMAIL?></td>
                                      
                                      <td>
                                      <?php 
                                    //   echo $obj->CLT_STATUS;
                                      if ($obj->USR_STATUS=='1'){ echo '<span class="badge badge-primary">Active</span>';
                                            }else{
                                                echo '<span class="badge badge-danger">Inactive</span>'; 
                                            }  
                                        
                                      ?>

                                      </td>

                             <td class="hidden-xs">

                              <div class="btn-group m-b-10">
                                        <button type="button" class="btn btn-info btn-sm">Actions</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(79px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <button class="dropdown-item"  type="submit" onclick="$('#target').val('edit');$('#keys').val('<?php echo $obj->USR_CODE; ?>');$('#viewpage').val('edit');">Edit</button>

                                           <button type="button" class="dropdown-item" onClick="deleteuser('<?php echo $obj->USR_CODE; ?>','<?php echo $obj->USR_ID; ?>');">Delete</button>
                                 
                                            <button class="dropdown-item"  type="submit" onclick="$('#target').val('reset');$('#keys').val('<?php echo $obj->USR_CODE; ?>');$('#ekeys').val('<?php echo $obj->USR_ID; ?>');">Reset Password</button>

                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a> -->
                                        </div>
                                    </div>
                                <!-- <span>
                                 <button type="submit" class="btn btn-primary btn-sm" onclick="$('#target').val('edit');$('#keys').val('<');$('#viewpage').val('edit');"><i class="fa fa-pencil"></i>Edit</button>
                                
                                 <button type="button" class="btn btn-danger btn-sm " onClick="deleteuser('<','<');"><i class="fa fa-trash-o "></i>Delete</button>
                                 
                                 </span> -->

                              </td>

                                


                                      </tr>   
                                      
                                     <?php   }
                                    }else{
                                        echo '<tr><td colspan="6" align="center">No records found</td></tr>';
                                    }
                                        ?>
                                       
                                                   
                                    </tbody>
                                </table>
                          
                             <!-- end of section -->
                         
                        </div>
                     </p>


                             </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
                 

<script type="text/javascript">
 

        //Parameter
       function deleteuser(keys,ekeys) {
            swal({
                title: 'Are you sure to Delete this User?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
              }).then(function () {
               
                swal(

                    'Deleted!',
                    'User has been deleted.',
                    'success'
                ),
                        $('#keys').val(keys);
                          $('#ekeys').val(ekeys);
                        $('#viewpage').val('delete');
                        $('#myform').submit();
                

            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary data is safe :)',
                        'error'
                    )
                }
            } )
        };


 //Warning Message
 //    function deleteuser(keys) {

 //            swal({
 //                title: 'Are you sure?',
 //                text: "You won't be able to revert this!",
 //                type: 'warning',
 //                showCancelButton: true,
 //                confirmButtonClass: 'btn btn-success',
 //                cancelButtonClass: 'btn btn-danger m-l-10',
 //                confirmButtonText: 'Yes, delete it!'
 //            }).then(function () {
 //                 $('#keys').val(keys);
 //                         $('#ekeys').val(ekeys);
 //                         $('#viewpage').val('delete');
 //                         $('#myform').submit();
 //            })
 //          };



// function deleteuser(keys,ekeys) {

//   // alert('woooooo');
//     swal({
//     title: "Warning",
//     text: "Are you sure you want to delete this User?",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: '#d9534f',
//     confirmButtonText: "Yes, Delete!",
//     closeOnConfirm: false
//   }, if(res){function(){
//     $('#keys').val(keys);
//     $('#ekeys').val(ekeys);
//     $('#viewpage').val('delete');
//     $('#myform').submit()
//   }});
// }

</script>