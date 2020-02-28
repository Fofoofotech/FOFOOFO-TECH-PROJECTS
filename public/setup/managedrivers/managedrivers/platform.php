<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 29-Jan-19
 * Time: 9:18 AM
 */

include("controller.php");
switch($view){

    case "add":
        include("views/add.php");
        break;

    case "edit":
        include("views/edit.php");
        break;

    case "manage":
        include("views/managedriver.php");
        break;

    case "chgpwd":
        include("views/changepassword.php");
        break;

    default:

        include("views/list.php");
        break;
}
?>
