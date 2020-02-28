<?php
include 'layout/header.php';
include "layout/top.php";
include "layout/menudrop.php";
?>
<form autocomplete="off" method="post" action="#" id="myform" name="myform" enctype="multipart/form-data" class="allform">
             <input type="hidden" name="viewpage" id="viewpage" value="<?php echo $viewpage; ?>" />
              <input type="hidden" value="<?php echo $target; ?>" name="target" id="target" />
               <input type="hidden" value="<?php echo $keys; ?>" name="keys" id="keys" />
               <input type="hidden" value="<?php echo $ekeys; ?>" name="ekeys" id="ekeys" />
			   <input id="microtime" name="microtime" value="<?php echo md5(microtime()); ?>" type="hidden" />
			   <input type="hidden" name="datefrom" value="<?php echo $datefrom;?>" id="datefrom" />
                <input type="hidden" name="dateto" value="<?php echo $dateto; ?>" id="dateto"  />
               <input id="action_search" name="action_search" value="" type="hidden" />
                 
                
 
<?php

switch(strtolower($pg)){

	 case md5('Setup'):
	    include ("Setup/platform.php");
		break; 
		
    	case md5("System"):
		include("system/platform.php");
	   break;

	   case md5("Reports"):
		include("reports/platform.php");
	   break;
	
	default:
		include("dashboard/dashboard.php");
		// $load = "dashboard";
	break;
}


?>


</form>

<?php include 'layout/footer.php'; ?>