<?php 
// echo "bravoooooooooo";exit;
include "controller.php";
switch($target){
	case 'add':
	// die("sdsdsd");
	include("view/add.php");
	break;
	case 'delete':
	include("view/list.php");
	break;
	case 'edit':
	include("view/edit.php");
	break;
	case 'reset':
	include("view/reset.php");
	break;
	case 'details':
	include("view/preview.php");
	break;
	default:
	include("view/list.php");
	break;
}	

?>