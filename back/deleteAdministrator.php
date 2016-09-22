<?php  include_once 'iframeImporter.php';?>
<h3>Delete an Administrator</h3>
<p>Ordered by First Name</p>
<table class="table table-bordered">
			<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>Phone Number</td><td></td></tr>
			<?php 

				$sql="SELECT * FROM `administrators` ORDER BY `FirstName`";
				$query=mysqli_query($con,$sql);
				$row=mysqli_num_rows($query);
				if($row!=0){
					while($rs=mysqli_fetch_assoc($query)){
						$ID=$rs['AdmID'];
						$fname=$rs['FirstName'];
						$lname=$rs['LastName'];
						$email=$rs['Email'];
						$phone=$rs['Phone'];	
						echo "<tr><td>$fname</td><td>$lname</td><td>$email</td><td>$phone</td><td><a href='deleteAdministrator.php?id=$ID'><button class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a></tr>";
					}
				}
			 ?>
</table>

<?php 

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="DELETE FROM `administrators` WHERE `AdmID`='$id';";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo "<script>window.location.href='deleteAdministrator.php'</script>";
}

?>
