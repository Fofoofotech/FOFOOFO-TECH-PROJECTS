<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 31-Jan-19
 * Time: 10:41 AM
 */


?>

<div class="main-content">
    <div class="page-wrapper">
        <div class="page form">
            <div class="moduletitle">
                <div class="moduletitleupper"><?php echo $inputfname." ".$middlename." ".$inputlastname; ?> (Agent Zones)
                    <input type="hidden" name="compcode" id="compcode" value="<?php echo $compid; ?>" />
                    <input type="hidden" name="agentcodes" id="agentcodes" value="<?php echo $agentkeys; ?>" />

                    <span class="pull-right">
                    <button type="submit" onclick="document.getElementById('view').value='';document.getElementById('viewpage').value='savezone';document.myform.submit();" class="btn btn-info"> Save </button>
                    <button type=button onClick="self.close();" class="btn btn-dark btn-square">Cancel</button>
                    </span>
                </div>
            </div>

            <div class="col-sm-12 paddingclose personalinfo">

                <div class="col-sm-10 paddingclose">
                    <div class="form-group">

                        <div class="col-sm-12 personalinfo-info">

                            Already Assigned Zones

                            <table class="table table-striped table-bordered table-hover table-full-width">
                                <thead>
                                <tr>
                                    <th>
                                        Zone Name
                                    </th>
                                    <th>
                                        Action
                                    </th>


                                </tr>
                                </thead>
                                <tbody >
                                <!--                            <td>-->
                                <!--                                <input type="checkbox" value="'.$objs->AGZ_ZONECODE.'" name="oldzonesid['.$objs->AGZ_ZONECODE.']" id="" checked>-->
                                <!--                            </td>-->
                                <?php


                                if($stmtzonelist->RecordCount()>0){
                                $num = 1;
                                while($objs = $stmtzonelist->FetchNextObject()){

                                ?>
                                <tr class="delete_mem<?php echo $objs->AGZ_ZONECODE ?>">
                                    <?php		echo '
                                   
                                    <td>
                                      '.$objs->ZON_NAME.'
                                    </td>';?>
                                    <td><span class="action"><a href="#" id="<?php echo $objs->AGZ_ZONECODE; ?>" class="delete" title="Remove" style="color:red;">&nbsp;X</a></span>
                                    </td>

                                    <?php echo '  </tr>';
                                    }
                                    }

                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>



                <div class="col-sm-10 paddingclose">
                    <div class="form-group">

                        <div class="col-sm-12 personalinfo-info">

                            Assign New Zones

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="bgroup">Region:</label>
                                    <select id="region" name="region" class="form-control" >
                                        <option value="" disabled selected>Region</option>
                                        <?php
                                        while($objpos = $stmtreg->FetchNextObject()){
                                            ?>
                                            <option value="<?php echo $objpos->REG_CODE ?>" <?php echo (($region == $objpos->REG_CODE)?'Selected':'') ?>><?php echo $objpos->REG_NAME ;?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="allergies">District:</label>
                                    <select name="district" id="district" class="form-control" >
                                        <option>Select District</option>


                                    </select>
                                </div>
                                <!--<div class="col-sm-4">
                                    <label for="conditions">Zones:</label>
                                    <input type="text" class="form-control" id="conditions" name="conditions">
                                </div>-->
                            </div>

                        </div>
                    </div>


                    <div class="form-group">

                        <!-- <div class="col-sm-6">
                             <label for="allergies">District:</label>
                             <input type="text" class="form-control" id="allergies" name="allergies">
                         </div>-->

                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                                <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        Zone Name
                                    </th>


                                </tr>
                                </thead>
                                <tbody id="zonetab">


                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

