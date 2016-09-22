<?php  include'./iframeImporter.php';


$sql="SELECT * FROM `Customer` WHERE `active`='1'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);


if($row!=0){

echo '<h3>Customers</h3>';
echo '<p>Ordered by Id</p>';
echo '<table class="table table-bordered">';
echo '<tr><td>Id</td><td>Title</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Telephone</td><td>Deactivate</td></tr>';


	while($rs=mysqli_fetch_assoc($query)){
		$id=$rs['CustomerID'];
		$fname=$rs['FirstName'];
		$lname=$rs['LastName'];
		$email=$rs['Email'];
		$phone=$rs['Telephone'];
		$title=$rs['TitleID'];

		echo "<tr><td>$id</td><td>$title</td><td>$fname</td><td>$lname</td><td>$email</td><td>$phone</td><td>
		<a href='deactivate.php?pid=$id'><button class='btn btn-warning' title='Deactivate the Customer'><i class='fa fa-times'></i></button></a>
		</td></tr>";

		
	}

}else{

	echo "There are no cutomers registered";
}

echo "</table>";

mysqli_close($con);
?>












