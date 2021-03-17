<?php
session_start();//
// verify.php
include "dbconnect.php";
$email=$_POST['email'];
$password=md5($_POST['katalaluan']);

$sql="SELECT id,email FROM admin 
	WHERE email='$email' 
	AND password='$password'";
echo "Mysql error:".mysqli_error($conn);
$rs = mysqli_query($conn, $sql);
if(mysqli_num_rows($rs)==1){//jumpa user
	$record=mysqli_fetch_array($rs);
	//session data
	$_SESSION['sessionid']=session_id();
	$_SESSION['userid']=$record['id'];//userid
	$_SESSION['email']=$record['email'];
	
	header("Location: dash-admin.php");

}else{
	//redirect login.php
	header ("Location: loginadmin.php?msg=Login failed");
}
?>