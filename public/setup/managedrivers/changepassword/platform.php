<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 31-Jan-19
 * Time: 10:33 AM
 */


include("controller.php");
    switch($view){
		case "back":
			include("public/Agents/manageagent/platform.php");
	  	break;
        default:
			include("views/chpassword.php");
        break;
    }
?>


