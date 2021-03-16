<?php 
	include ("header.php");
	include "dbconnect.php";
?>

<form method="get" action="" class="form-inline">
	<input type="text" name="keyword" placeholder="Enter Matric Number"
	class="form-control">
	<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
</form>
<hr>
<?php
if(isset($_GET['keyword'])){
	//cari dari db
	$keyword=$_GET['keyword'];

	//sql search
	$sql="SELECT matric_number, name
		FROM reject
		WHERE matric_number LIKE '%$keyword%' ";
	//echo "$sql <br>";
	//execute sql
	$result=mysqli_query($conn, $sql);

	//carian tak dijumpai
	if(mysqli_num_rows($result)==0){
		echo "Student matric number $keyword not found<br>";
	}else{ ?>
		<table class="table table-striped table-bordered">
			<tr><td>Matric Number</td>
				<td>Name</td>
				<td>Action</td>
			</tr>
	<?php
		//fetch by record
		while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['matric_number']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>";

			//formsearch-tempahan
			$matric_number=$row['matric_number'];
			echo "<a href='formupdate-tempahan.php'
					class='btn btn-warning'>
					<i class='fa fa-edit'></i></a>";
			echo "<a href='delete_approve.php'
					class='btn btn-danger'>
					<i class='fa fa-trash'></i></a>";
			echo "</td>
					</tr>";
		}//end loop
	}

}//end if isset
?>
</table>

<?php
	include ("footer.php");
?>n