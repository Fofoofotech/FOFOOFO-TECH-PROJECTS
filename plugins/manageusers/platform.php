<?php 
include "controller.php";
switch($target){
	case 'add':
	include("view/add.php");
	break;
	case 'delete':
	include("view/list.php");
	break;
	case 'edit':
	include("view/edit.php");
	break;
	default:
	include("view/list.php");
	break;
}	

?>