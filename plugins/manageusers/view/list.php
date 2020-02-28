<?php $rs = $paging->paginate(); ?>
              <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Static Table
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Data Table</a></li>
                        <li class="active">Static Table</li>
                    </ol>
                </div>
            </div>
            <!-- page head end-->


<?php $engine->msgBox($msg,$status); ?>
<div class="wrapper">
      <div class="row">
                    <div class="col-lg-12">
                            <!-- <div class="row"> -->
          <div class="col-sm-4">
            <div id="pager"> <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?> <?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>'); ?>
              <input name="page" type="text" class="pagedisplay short" style="width: 30px;" value="<?php echo $paging->renderNavNum(); ?>" readonly />
              <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?> <?php echo $paging->renderLast('<span class="fa fa-angle-double-right"></span>');?>
              <?php $paging->limitList($limit, 'myform');?>
            </div>
          </div>
          <div class="col-sm-4 col-xs-6">
            <div class="row">
              <div class="col-sm-10">
                <div class="input-group">
                  <input type="text" tabindex="1" value="<?php echo isset($fdsearch)?$fdsearch:''; ?>" class="form-control square-input" name="fdsearch" placeholder="Type to Search" />
                  <span class="input-group-btn">
                  <button type="submit" onclick="$('#target').value='';" class="btn btn-default btn-gyn-search"> <i class="fa fa-search"></i> </button>
                  </span> </div>
              </div>
              <div class="col-sm-2">
                <div class="btn-group">
                  <button type="submit" onclick="document.getElementById('target').value='';document.getElementById('viewpage').value='reset';document.myform.submit;" class="btn btn-primary gyn-teal square"> <i class="fa fa-refresh"></i> </button>
                </div>
              </div>
            </div>

          </div>
          <div class="add-search col-sm-2"> </div>
          <div class="add-search col-sm-2">
            <button type="submit" onClick="document.getElementById('target').value='add';document.myform.submit();"
                id="savebtn" class="btn btn-success gyn-lime square"><i class="fa fa-plus-circle"></i> Add Clients </button>
          </div>
        </div>
     
     </div>
      <!--end of row -->

          <!-- <div class="btn mb-3">
            <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?> <?php echo $paging->renderPrev('<span class="fa fa-arrow-circle-left"></span>','<span class="fa fa-arrow-circle-left"></span>'); ?>
              <input name="page" type="text" class="pagedisplay short" style="width: 30px;" value="<?php echo $paging->renderNavNum(); ?>" readonly />
              <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?> <?php echo $paging->renderLast('<span class="fa fa-angle-double-right"></span>');?>
              <?php $paging->limitList($limit, 'myform');?>
            
          </div>       -->
          
          <div class="row">
          <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            Hover Table
                        </header>
                                <table id="basic-datatable" class="table table-hover dt-responsive nowrap table-centered">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                            <th> Name</th>
                                            <th>Contact</th>
                                            <th>Username</th>
                                             <th>User Email</th>
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
                                      if ($obj->USR_STATUS=='1'){ echo '<span class="label label-success label-mini">Active</span>';
                                            }else{
                                                echo '<span class="label label-danger label-mini">Inactive</span>'; 
                                            }  
                                        
                                      ?>

                                      </td>
                                      <td class="hidden-xs">
                                      <span>
                                 <button type="submit" class="btn btn-primary btn-xs" onclick="document.getElementById('target').value='edit';document.myform.submit();
                                                    document.getElementById('viewpage').value='edit';
                                                     document.getElementById('keys').value='<?php echo $obj->USR_ID ?>';"><i class="fa fa-pencil"></i>Edit</button>
                                
                                 <button class="btn btn-danger btn-xs" onclick="if(confirm('Are You Sure You Want to Delete This User ? '))
                                               document.getElementById('viewpage').value='delete';
                                             document.getElementById('keys').value='<?php echo $obj->USR_ID ?>';"><i class="fa fa-trash-o "></i>Delete</button>
                                 
                                 </span>

                                    </td>

                                


                                      </tr>   
                                      
                                     <?php   }
                                    }else{
                                        echo '<tr><td colspan="6" align="center">No records found</td></tr>';
                                    }
                                        ?>
                                       
                                                   
                                    </tbody>
                                </table>
                             </section>
                             <!-- end of section -->
                          </div>
                        </div>
                  </div> <!-- end col -->
              </div>
                <!-- end row -->
                </div>
            <!--body wrapper end-->

        