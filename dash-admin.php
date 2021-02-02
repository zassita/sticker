<?php
include "checksession.php";
//dash-admin.php
include ("header.php");
?>

<h2>Welcome admin <?php echo $_SESSION['fullname'] ?></h2>
<a href="listingcars.php">FULLTIME(CAR)</a><br>
<a href="listingmotors.php">FULLTIME(MOTORCYCLE)</a>
<br>
<a href="logout.php">Logout</a><br>

<?php
include ("footer.php");
?>