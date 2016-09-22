<?php 
session_start();
include_once'variables.php';
$customerID="";
if(isset($_SESSION['fName'])){
	$customerID=$_SESSION['CustomerID'];
}
if(isset($_POST['porder'])){
$shipamt="";
if(isset($_GET['del'])){
	$shipamt=$_GET['del'];
}
$amount="";
if(isset($_GET['amt'])){
	$amount=$_GET['amt'];
}
$add=$_POST['shipAdd'];
$shipper=$_POST['shipper'];
$paymethod=$_POST['payment'];
$date=date("Y-m-d");
if($customerID!=0){
$sqlo="INSERT INTO `customerorders` VALUES (NULL, '$customerID', '$date', '$amount', '$add', '$shipamt','$paymethod', '$shipper');";
$quer=mysqli_query($con,$sqlo);
$sql="DELETE FROM `cart` WHERE `CustomerID`='$customerID'";
$query=mysqli_query($con,$sql);

header("Location:checkout.php?po=1");;
}else{
	echo "You must be logged in ";
}
mysqli_close($con);
}
?>
