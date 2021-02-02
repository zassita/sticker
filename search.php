<form class="form-inline">
	<input type="text" name="keyword"
	class="form-control"
	placeholder="Enter a student name">
	<button type="submit"
	class="btn btn-primary">Search</button>
</form>
<?php
//filename : listing.php
	
	include "dbconnect.php";
	$keyword=$_GET['keyword'];
	$sql="SELECT name, matricno
		 FROM listingcars
		 WHERE name LIKE '%$keyword%'";

	//execute sql command
	$result = mysqli_query($conn, $sql);
	?>
	<table class="table">
		<tr>
			<td>MatricNo</td>
			<td>Name</td>
		</tr>
	

	<?php

	//how many record fetched
	if(mysqli_num_rows($result)==0){
		while ($row=mysqli_fetch_array(  
			$result)){
			echo "<tr>";
			echo "<td> ".$row['matricno']."</td>";
			echo "<td> ".$row['name']."</td>";
			echo "</tr>";
		}//end while
	}//end if mum_rows
?>
</table>