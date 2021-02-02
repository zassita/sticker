<?php
include ("header.php");
?>
Login 
<form method="post" action="verify.php">
	Matric <input type="text" 
	name="matric"
	class="form-control">
	Password <input type="password" 
	name="katalaluan"
	class="form-control">
	<input type="submit" value="Login"
	class="btn btn-success">
</form>
<!-- login.php -->
<?php
	if (isset($_GET['msg'])){
		echo "<div class='alert alert-warning'>";
		echo $_GET['msg'];
		echo "</div>";
	}
	include ("footer.php");
?>