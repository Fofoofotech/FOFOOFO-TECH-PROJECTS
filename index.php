<?php
include "config.php";
include JPATH_LIBRARIES.DS."engine.Class.php";
include JPATH_LIBRARIES.DS."login.class.php";
include JPATH_LIBRARIES.DS."codes.Class.php";
include JPATH_LIBRARIES.DS."notification.Class.php";


$engine = new engineClass();
$crypt=new cryptCls();

if(isset($action) && strtolower($action) == 'login'){
	include('public/login/login.php');
	die();
}
$log = new Login();

if(isset($action) && strtolower($action) == 'logout'){
	$log->logout();
}
if(isset($doLogin) && $doLogin == 'systemPingPass'){
	header('Location: index.php?action=index&pg=dashboard');
	die('Please wait...redirecting page');
}
  
include("public/platform.php");
?>