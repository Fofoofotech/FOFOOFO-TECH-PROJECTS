<div class="main-content">
    <div class="page-wrapper">
        <div class="page form">
            <div class="moduletitle">
                <div class="moduletitleupper">Driver Details

                    <div class=" pull-right">
                        <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='';document.myform.submit();" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-arrow-left"></i> Back </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 paddingclose personalinfo">
                <div class="col-sm-2">
                    <div class="id-photo">
                        <img src="media/uploaded/agentphotos/<?php echo $img;?>" alt="" id="prevphoto" style="width:100% !important; margin:0px !important;">
                    </div>
                </div>
                <div class="col-sm-10 paddingclose">
                    <div class="form-group">
                        <div class="moduletitleupper">General Information </div>
                        <div class="col-sm-12 personalinfo-info">

                            <table class="table personalinfo-table">
                                <tr>
                                    <td>
                                        <b>Driver ID/Username #:</b>  <?php  echo $agentid;?>
                                    </td>
                                    <td>
                                        <b>Full Name:</b> <?php  echo $fname." ".$midname." ".$surname;?>
                                    </td>
                                    <td>
                                        <b>Date Of Birth:</b> <?php  echo $agentdob; ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Phone Number:</b> <?php  echo $contactno; ?></td>
                                    <td>
                                        <b>Postal Address:</b> <?php  echo $address; ?></td>

                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 alegyinfo">
                <div class="col-sm-2"></div>
                <div class="col-sm-10 paddingclose">
                    <div class="form-group">

                        <div class="col-sm-12 personalinfo-info">

                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Driver's & Vehicle Zones</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
foreach ( $stmtzones as $value) {

    echo '<tr>
                
                        
                        <td>'.$value['ZON_NAME'].'</td>
						
                    </tr>';


}


                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>


            <div class="container-fluid">
                <div class="row-fluid">


                    <?php
                    //print_r($innerdashmenu);
                    if(is_array($innerdashmenu)){

                        foreach($innerdashmenu as $value){

                            $linkview = 'index.php?pg='.md5($value[0]).'&amp;option='.md5($value[1]).'&amp;drivercode='.$crypt->encrypt($keys).'&uiid='.md5('1_pop');
                            echo '<div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="#" onClick="CallWindow(\''.$linkview.'\')" class="list-group-item">
						
                        '.(($value[3] == 1)?(($usertype == 2)?(($engine->getTotalNotification($value[4],1) > 0)?'<span class="badge" >'.$engine->getTotalNotification($value[4],1).'</span>':''):(($engine->getTotalNotification($value[4],2) > 0)?'<span class="badge">'.$engine->getTotalNotification($value[4],2).'</span>':'')):'').'
                        <div class="tile-card">
                            <img src="media/img/icons/'.$value[2].'" alt="Avatar">
                            <div class="tile-card-text">
                                <span>'.$value[1].'</span>
                            </div>
                        </div>
                        </a>
                    </div>';
                        }} ?>

                    <!--
                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Agents') .'&option='. md5('Manage Update').'&uiid='.$uiid.'&agentkeys='.$keys; ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/106-administrator.png" alt="Avatar">
                                <div class="tile-card-text">
                                    <span>Edit Details</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Bank') .'&option='. md5('Client Report').'&uiid='.$uiid ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/folder.png" alt="Report">
                                <div class="tile-card-text">
                                    <span>Commission Report</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Bank') .'&option='. md5('Discount').'&uiid='.$uiid ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/119-report.png" alt="Discount">
                                <div class="tile-card-text">
                                    <span>Collection Report</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Agents') .'&option='. md5('AgentZones').'&uiid='.$uiid.'&agentkeys='.$keys; ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/maps-and-flags.png" alt="Agent Zone">
                                <div class="tile-card-text">
                                    <span>Assign Zone</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Bank') .'&option='. md5('Discount').'&uiid='.$uiid ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/108-mange-users.png" alt="Discount">
                                <div class="tile-card-text">
                                    <span>Agent Clients</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Agents') .'&option='. md5('TrackAgent').'&uiid='.$uiid .'&agentkeys='.$keys;?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/placeholder.png" alt="Track Agent">
                                <div class="tile-card-text">
                                    <span>Track Agent</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.$pg.'&option='. md5('TrackCollection').'&uiid='.$uiid.'&agentkeys='.$keys ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/shopping-store.png" alt="Discount">
                                <div class="tile-card-text">
                                    <span>Track Collection</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-2 dashcard ctrlnotification" id="ctrlnotification">
                        <a href="<?php //echo 'index.php?pg='.md5('Agents') .'&option='. md5('ChangePassword').'&uiid='.$uiid.'&agentkeys='.$keys; ?>" class="list-group-item">
                            <div class="tile-card">
                                <img src="media/img/icons/060-radiation.png" alt="Discount">
                                <div class="tile-card-text">
                                    <span>Change Password</span>
                                </div>
                            </div>
                        </a>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
</div>