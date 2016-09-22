<?php 

include'variables.php';
$customerID=0;
if(isset($_GET['id'])){
 	$customerID=$_GET['id'];
}
if($customerID!=0){
	$sql="UPDATE `customer` SET `active`='0' WHERE `CustomerID` = '$customerID'";
	$query=mysqli_query($con,$sql);
	mysqli_close($con);
	header("Location:logout.php");
}
?>