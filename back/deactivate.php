<?php 

include_once'variables.php';
$customerID="";
$productID="";
if(isset($_GET['id'])){
	$productID=$_GET['id'];
}else if(isset($_GET['pid'])){
	$customerID=$_GET['pid'];
}

if($productID!=""){
$sqlCategory="SELECT `CategoryName` FROM `product` WHERE `ProductID`='$productID'";	
$sql="UPDATE `product` SET `active`=0 WHERE `ProductID`='$productID'";
mysqli_query($con,$sql);
$category="";
$queryCategory=mysqli_query($con,$sqlCategory);
$row=mysqli_num_rows($queryCategory);
if($row!=0){
	while($rs=mysqli_fetch_assoc($queryCategory)){
		$category=$rs['CategoryName'];
	}
}
header("Location:DisplayProduct.php?category=$category");
}else if($customerID!=""){
$sql="UPDATE `customer` SET `active`=0 WHERE `CustomerID`='$customerID'";
mysqli_query($con,$sql);
mysqli_close($con);
header('Location:Customers.php');
echo $customerID;
}else{
die("Nothing selected");
}

mysqli_close($con);
?>
