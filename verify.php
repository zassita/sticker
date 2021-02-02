<?php
session_start();//
// verify.php
include "dbconnect.php";
$matric=$_POST['matric'];
$password=md5($_POST['katalaluan']);

$sql="SELECT id,matric,fullname,accesslevel FROM users 
	WHERE matric='$matric' 
	AND password='$password'";
$rs=mysqli_query($conn,$sql);
//echo "Mysql error:".mysqli_error($conn);
if(mysqli_num_rows($rs)==1){//jumpa user
	$record=mysqli_fetch_array($rs);
	//session data
	$_SESSION['sessionid']=session_id();
	$_SESSION['userid']=$record['id'];//userid
	$_SESSION['fullname']=$record['fullname'];
	$_SESSION['matric']=$record['matric'];
	$_SESSION['accesslevel']=$record['accesslevel'];
	//admin image file

	//redirect dashboard
	if($record['accesslevel']=='admin'){
		header ("Location: dash-admin.php");
	}else if ($record['accesslevel']=='student'){
		header ("Location: dash-student.php");
	}
	echo "1 user found";
	echo "Admin name ".$record['fullname'];
}else{
	//redirect login.php
	header ("Location: login.php?msg=Login failed");
	echo "Matric & password not match";
}
?>