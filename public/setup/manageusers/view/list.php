<?php $rs = $pgnate->paginate(); ?>




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
                        <div class="card-header card-header-divider">[:List]</div>
                        <div class="card-body pl-sm-5">
                              <!-- <?php // var_dump($query); ?> -->

                          <p> <div class="mt-0 header-title m-b-30">Users</div></p>



      <div class="input-group">
                 <div class="col-sm-2 mo-mb-2">
                        <div id="pager">
                            <?php echo $pgnate->renderFirst('<span class="icon s7-angle-left-circle"></span>');?>
                            <?php echo $pgnate->renderPrev('','<span class="icon s7-angle-right-circle"></span>');?>
                            <input name="page" style="width:60px;" type="text" class="pagedisplay short" value="<?php echo $pgnate->renderNavNum();?>" readonly />
                            <?php echo $pgnate->renderNext('<span class="icon s7-angle-right-circle"></span>','<span class="icon s7-angle-right-circle"></span>');?>
                            <?php echo $pgnate->renderLast('<span class="icon s7-next"></span>');?>
                            <?php $pgnate->limitList($limit,"myform");?>
                        </div>


                    </div>



                    <div class="col-sm-3 pagerdetails">
                        <div style="font-size:12px; line-height:2.8em">
                            <?php echo $pgnate->renderNavNum();?>of <?php echo $pgnate->max_pages; ?> pages
                            <span class="separator">|</span>
                            Total <?php  echo $pgnate->total_rows; ?> records
                        </div>

                    </div>


                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" tabindex="1"  class="form-control form-control-sm" name="fdsearch" placeholder="Enter User Name Search"
                            />
                            <span class="input-group-btn">
                                            <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='searchitem';document.myform.submit();" class="btn btn-success btn-sm"> <i class="icon s7-search"></i> </button>
                                        </span>

                        </div>



                    </div>


                    <div class="col-sm-2">
                        <div class="input-group">
                            <button type="submit" onclick="document.getElementById('view').value='';
                                    document.getElementById('viewpage').value='reset';document.myform.submit;" class="btn btn-success btn-sm"> <i class="icon s7-refresh-2"></i> </button>
                        </div>
                    </div>

                 
                </div>
            <!-- </div> -->
         
          <div class="pull-right">
      
            <button type="submit" onclick="$('#target').val('add');" class="btn btn-success"><span class="icon s7-plus"></span> Add User </button>
            
         </div>
     
          <p>

          
          <div class="col-lg-12" style="padding-top: 60px">

          <?php $engine->msgBox($msg,$status); ?>
         
                  
                       
                                <table class="table table-hover">
                                   <thead>
                                 
                                        <tr>
                                        <b>
                                        <th>#</th>
                                            <th>NAME</th>
                                            <th>CONTACT</th>
                                            <th>USERNAME</th>
                                            <th> EMAIL</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th> 
                                            
                                            </b>
                                        </tr>

                                   
                                    </thead>
                                
                                
                                    <tbody>
                                     <?php
                                    if($pgnate->total_rows > 0){
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

                              <div class="btn-group btn-space">
                              <button class="btn btn-info" type="button">Actions</button>
                                    <button class="btn btn-info dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown"><span class="s7-angle-down"></span><span class="sr-only">Toggle Dropdown</span></button>

                                       <div class="dropdown-menu" role="menu">
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
         </div>

           
        <!-- end content -->
                 

    <script type="text/javascript">
 
//    alert('knknkfklflk');
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