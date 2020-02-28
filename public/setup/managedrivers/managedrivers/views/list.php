<?php


$rs = $paging->paginate();
?>

<div class="main-content">

    <div class="page-wrapper">




        <!-- <div class="page-lable lblcolor-page">Table</div>-->
        <div class="page form">
            <div class="moduletitle" style="margin-bottom:0px;">
                <div class="moduletitleupper">Manage Drivers</div>
            </div>
            <?php $engine->msgBox($msg,$status);
            ?>
            <div class="pagination-tab">
                <div class="table-title">
                    <div class="col-sm-2">
                        <div id="pager">
                            <?php echo $paging->renderFirst('<span class="fa fa-angle-double-left"></span>');?>
                            <?php echo $paging->renderPrev('','<span class="fa fa-arrow-circle-left"></span>');?>
                            <input name="page" type="text" class="pagedisplay short" value="<?php echo $paging->renderNavNum();?>" readonly />
                            <?php echo $paging->renderNext('<span class="fa fa-arrow-circle-right"></span>','<span class="fa fa-arrow-circle-right"></span>');?>
                            <?php echo $paging->renderLast('<span class="fa fa-angle-double-right"></span>');?>
                            <?php $paging->limitList($limit,"myform");?>
                        </div>


                    </div>



                    <div class="col-sm-2 pagerdetails">
                        <div style="font-size:12px; line-height:2.8em">
                            <?php echo $paging->renderNavNum();?>of <?php echo $paging->max_pages; ?> pages
                            <span class="separator">|</span>
                            Total <?php  echo $paging->total_rows; ?> records
                        </div>

                    </div>


                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" tabindex="1" value="<?php echo $fdsearch; ?>" class="form-control square-input" name="fdsearch" placeholder="Enter Driver's Name Search"
                            />
                            <span class="input-group-btn">
                                            <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='searchitem';document.myform.submit();" class="btn btn-default btn-gyn-search"> <i class="fa fa-search"></i> </button>
                                        </span>

                        </div>



                    </div>






                    <div class="col-sm-3">
                        <div class="input-group">
                            <button type="submit" onclick="document.getElementById('view').value='';
                        	        document.getElementById('viewpage').value='reset';document.myform.submit;" class="btn btn-success btn-square"> <i class="fa fa-refresh"></i> </button>
                        </div>
                    </div>

                    <?php if ($agentauth == 1){?>

                        <div class="col-sm-2">

                            <select class=" form-control selctoptform" id="selid" name="inputstatus" tabindex="-1" data-placeholder="All Status" onChange="document.getElementById('viewpage').value='searchinvtype';document.myform.submit()">
                                <option value="">ALL </option>
                                <option value="-1" <?php echo (($inputstatus == -1)?'selected="selected"':''); ?>>Rejected</option>
                                <option value="1" <?php echo (($inputstatus == 1)?'selected="selected"':''); ?>>Pending</option>
                                <option value="2" <?php echo (($inputstatus == 2)?'selected="selected"':''); ?>>Approved</option>


                            </select>

                        </div>
                    <?php } ?>
                    <div class="pagination-right">


                        <button type="submit"  onclick="document.getElementById('view').value = 'add'; document.myform.submit();"  class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Add Driver</button>
                    </div>
                </div>
            </div>




            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID / Username</th>
                    <th>Full Name </th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                if($paging->total_rows > 0 ){
                    $page = (empty($page))? 1:$page;
                    $num = (isset($page))? ($limit*($page-1))+1:1;
                    while(!$rs->EOF){
                        $obj = $rs->FetchNextObject();
                        $delievery = $obj->DR_STATUS;

                        $delstatus = "";
                        $saltypestatus="";

                        if ($delievery == '1') {
                            $delstatus = '<span class="badge badge-secondary">Pending</span>';
                        }elseif ($delievery == '2') {
                            $delstatus = '<span class="badge badge-success">Approved</span>';
                        }elseif ($delievery == '-1') {
                            $delstatus = '<span class="badge badge-primary">Rejected</span>';
                        }elseif ($delievery == '0') {
                            $delstatus = '<span class="badge badge-warning">Deleted</span>';
                        }


                        echo '<tr>
				   
                        <td>'.$num++.'</td>
						<td>'.$obj->DR_USERNAME.'</td>
                        <td>'.$obj->DR_FIRSTNAME." ".$obj->DR_OTHERNAME." ".$obj->DR_SURNAME.'</td>
						<td>'.$obj->DR_CONTACT.'</td>
						<td>'.$delstatus.'</td>
						<td>
							 
							
							
							<div class="btn-group">
                                <button type="button" class="btn btn-info btn-square" >Options</button>
                                <button type="button" class="btn btn-info btn-square dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><button type="submit"  onclick="document.getElementById(\'view\').value=\'manage\';document.getElementById(\'keys\').value=\''.$obj->DR_CODE.'\';document.getElementById(\'viewpage\').value=\'managedriver\';document.myform.submit;">Manage Driver</button></li>
<li><button type="submit"   onclick="if(confirm(\'Are You Sure You Want to Delete This Agent ? \')){document.getElementById(\'view\').value=\'\';document.getElementById(\'keys\').value=\''.$obj->DR_CODE.'\';document.getElementById(\'viewpage\').value=\'deleteagent\';document.myform.submit;}">Delete Driver</button></li>
                                  
									
                                </ul>
                            </div>
														
						</td>
                    </tr>';
                    }}
                ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<!-- Modal -->
<div id="addDesp" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Agent</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" >
                        </div>

                        <div class="col-sm-5">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" disabled>
                        </div>

                        <div class="col-sm-5">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" disabled>
                        </div>
                    </div>






                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-square" data-dismiss="modal">Save</button>
                <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
            </div>
        </div>

    </div>
</div>