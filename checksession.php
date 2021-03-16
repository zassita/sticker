<?php
//checksession.php
session_start();
if (isset($_SESSION['sessionid']) &&
	$_SESSION['email']=='email'){
}else{
	header ("Location: loginadmin.php?msg=Admin must login first");
}
?>