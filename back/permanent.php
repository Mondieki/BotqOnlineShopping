<?php 


include_once'variables.php';

$productID="";
if(isset($_GET['id'])){
	$productID=$_GET['id'];
}
if($productID!=""){
$sql="DELETE FROM `product` WHERE `ProductID`='$productID';";
$query=mysqli_query($con,$sql);
}
$customerID="";
if(isset($_GET['pid'])){
	$customerID=$_GET['pid'];
}
if($customerID!=""){
$sqlCustomer="DELETE FROM `customer` WHERE `CustomerID` = '$customerID';";
$queryCustomer=mysqli_query($con,$sqlCustomer);
}
mysqli_close($con);
header('Location:Trash.php');


?>