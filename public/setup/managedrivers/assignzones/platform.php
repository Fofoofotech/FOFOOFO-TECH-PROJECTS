<?php
/**
 * Created by PhpStorm.
 * User: NanaEben
 * Date: 31-Jan-19
 * Time: 10:40 AM
 */


include("controller.php");
switch($view){

    default:
        include("views/assignzone.php");
        break;
}



?>