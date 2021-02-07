<?php
session_start();//
// verify.php
include "dbconnect.php";
$matric=$_POST['matric'];
$password=md5($_POST['katalaluan']);

$sql="SELECT u.*, s.* FROM user AS u
	  JOIN student_info AS s
	  ON u.matric_number = s.matric_number
	  WHERE u.matric_number = '$matric'
	  AND password = '$password' ";
	  
$rs=mysqli_query($conn,$sql);
// echo "Mysql error:".mysqli_error($conn);
if(mysqli_num_rows($rs)==1){//jumpa user
	$record=mysqli_fetch_array($rs);

	//session data
	$_SESSION['sessionid']=session_id();
	$_SESSION['userid']=$record['id'];
	$_SESSION['matric']=$record['matric_number'];
	$_SESSION['address']=$record['address'];
	$_SESSION['phone']=$record['phone'];
	$_SESSION['fullname']=$record['name'];
	$_SESSION['program']=$record['program'];
	$_SESSION['fakulti']=$record['fakulti'];

	header("Location: dash-student.php?msg=Login failed");

	//admin image file

	echo "1 user found";
	echo "Admin name ".$record['name'];
}else{
	//redirect login.php
	header ("Location: login.php?msg=Login failed");
	echo "Matric & password not match";
}
?>