 
<form method="post" action="" id="listform" name="listform" autocomplete="off">


  <?php 
         if (isset($msg)) {
         	 $engine->msgBox($msg,$status);
         }
  ?>
 
    <input type="hidden" name="action_key" id="action_key" value="<?php echo md5(microtime());?>" />
    <input type="hidden" value="" name="viewpage" id="viewpage" />
    <input type="hidden" value="" name="rejectreason" id="rejectreason" />
 		<input type="hidden" value="" name="target" id="target" />
  	<input type="hidden" value="<?php echo $keys;?>" name="keys" id="keys" />
  


 <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <!--  <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                            <h4 class="page-title"> <i class="dripicons-duplicate"></i>DETAILS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

        <div class="card-box table-responsive">
        <table width="1181" border="0">
  <tr>
	<td width="200">&nbsp;</td>
	<td width="221"><h4>&nbsp;</h4></td>
		
    <td width="83">&nbsp;</td>
    
    <!-- <td width="80">    
		
			<button class="btn btn-icon waves-effect waves-light btn-success m-b-5" type="button" onClick="document.getElementById('target').value='';document.getElementById('viewpage').value='authorise';document.listform.submit()">Authorize</button>
			
		</td>
<td width="62">

<button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"  data-target="#modal-fullscreen" type="button" onClick="document.getElementById('target').value='';document.getElementById('viewpage').value='reject1';document.listform.submit()">Reject</button>

<button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" data-toggle="modal"  data-target="#modal-fullscreen" type="button">Reject</button>

</td>
    -->
   <!--  <td width="109"> <button class="btn btn-primary waves-effect waves-light w-xs m-b-5" type="button" onclick="clicktoPrint()"><i class="glyphicon glyphicon-export"></i> To PDF </button>
</td> -->
    <td width="67"><button class="btn btn-warning waves-effect waves-light m-b-5" type="button" onclick="clicktoPrint()"><i class="fa fa-print"></i> Print </button>  </td>
    <td width="18">&nbsp;</td>
<td width="273">  <button type="submit" onclick="document.getElementById('target').value='list';$('#viewpage').val('reset');" class="btn btn-danger" style="margin-right: 5px"><i class="fa fa-arrow-left"></i> Back </button>

</td>
  </tr>



</table>
        	<div align="center">
              <iframe allowtransparency="1" frameborder="0" src="<?php echo $printpath; ?>" id="printframe" name="printframe" style="width:915px; height:500px; border:1px #000000 solid; padding:20px 0px 30px 10px;" ></iframe>
          </div>					
     </div>



                              





                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
  </form>
                