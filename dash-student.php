<?php
include "checksession1.php";
//dash-admin.php
include ("header.php");
?>

<h2>Welcome admin <?php echo $_SESSION['fullname'] ?></h2>
<a href="insertcar.php">FULLTIME(CAR)</a><br>
<a href="insertmotor.php">FULLTIME(MOTORCYCLE)</a>
<br>
<a href="logout.php">Logout</a><br>

<?php
include ("footer.php");
?>