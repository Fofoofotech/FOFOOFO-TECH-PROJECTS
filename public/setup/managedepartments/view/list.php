<?php $rs = $pgnate->paginate(); ?>

              <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-duplicate"></i> MANAGE DEPARTMENTS</h4>
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

                          <p> <div class="mt-0 header-title m-b-30">DEPARTMENTS</div></p>



     <div class="input-group">
                 <div class="col-sm-2 mo-mb-2">
                        <div id="pager">
                            <?php echo $pgnate->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
                            <?php echo $pgnate->renderPrev('','<span class="fa fa-arrow-circle-left"></span>');?>
                            <input name="page" style="width:60px;" type="text" class="pagedisplay short" value="<?php echo $pgnate->renderNavNum();?>" readonly />
                            <?php echo $pgnate->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
                            <?php echo $pgnate->renderLast('<span class="fa fa-angle-double-right"></span>');?>
                            <?php $pgnate->limitList($limit,"myform");?>
                        </div>


                    </div>



                    <div class="col-sm-2 pagerdetails">
                        <div style="font-size:12px; line-height:2.8em">
                            <?php echo $pgnate->renderNavNum();?>of <?php echo $pgnate->max_pages; ?> pages
                            <span class="separator">|</span>
                            Total <?php  echo $pgnate->total_rows; ?> records
                        </div>

                    </div>


                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" tabindex="1"  class="form-control square-input" name="fdsearch" placeholder="Enter Vehicle Number/Name Search"
                            />
                            <span class="input-group-btn">
                                            <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='searchitem';document.myform.submit();" class="btn btn-default btn-gyn-search"> <i class="fa fa-search"></i> </button>
                                        </span>

                        </div>



                    </div>


                    <div class="col-sm-2">
                        <div class="input-group">
                            <button type="submit" onclick="document.getElementById('view').value='';
                                    document.getElementById('viewpage').value='reset';document.myform.submit;" class="btn btn-success btn-square"> <i class="fa fa-refresh"></i> </button>
                        </div>
                    </div>

                 
                </div>
            <!-- </div> -->






         
          <div class="form-group row float-right" style="margin-right:20px; padding-top:40px">
      
            <button type="submit" onclick="document.getElementById('target').value='add';document.myform.submit();"
            class="btn btn-success waves-effect waves-light"><i class="fa fa-plus-circle"></i>Add Department</button>
          </div>
     
          <p>

            <?php $engine->msgBox($msg,$status); ?>
         
          <div class="col-lg-12" style="padding-top: 60px">
                  
                       
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                            <th> Name</th>
                                            <th>command</th>
                                            <th>Unit</th>
                                            
                                            <!-- <th>Created Date</th>  -->
                                            <th>Action</th> 
                                            
                                           
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
                                      <td><?php echo $obj->DP_NAME?></td>
                                      <td><?php echo $obj->DP_COMND_NAME?></td>
                                       <td><?php echo $obj->DP_UNIT_NAME?></td>
                                      
                                      <!-- <td>
                                      <?php 
                                    //   echo $obj->CLT_STATUS;
                                      if ($obj->USR_STATUS=='1'){ echo '<span class="badge badge-primary">Active</span>';
                                            }else{
                                                echo '<span class="badge badge-danger">Inactive</span>'; 
                                            }  
                                        
                                      ?>

                                      </td> -->

                             <td class="hidden-xs">

                              <div class="btn-group m-b-10">
                                        <button type="button" class="btn btn-info btn-sm">Actions</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(79px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <button class="dropdown-item"  type="submit" onclick="$('#target').val('edit');$('#keys').val('<?php echo $obj->DP_CODE; ?>');$('#viewpage').val('edit');">Edit</button>

                                           <button type="button" class="dropdown-item" onClick="deleteuser('<?php echo $obj->DP_CODE;?>');">Delete</button>
                                 
                                            <!-- <button class="dropdown-item"  type="submit" onclick="$('#target').val('reset');$('#keys').val('<?php echo $obj->USR_CODE; ?>');$('#ekeys').val('<?php echo $obj->USR_ID; ?>');">Reset Password</button>
 -->
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
       function deleteuser(keys) {
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
                          // $('#ekeys').val(ekeys);
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



//  $('#fdserch').on('keyup',function(){
// // alert('kah');
//  $('#viewpage').val('');
//  $('#myform').submit();
                
//    });

</script>