<?php 
session_start();
include_once'variables.php';

$productID="";
$customerID="";
$No_Of_Product=0;
if(isset($_GET['id'])){
	$productID=$_GET['id'];
}
$customerID="";
if(isset($_SESSION['fName'])){
	$customerID=$_SESSION['CustomerID'];
}
$category="";
if($productID!=""){
$sqlCategory="SELECT `CategoryName` FROM `product` WHERE `ProductID`='$productID'";
$query=mysqli_query($con,$sqlCategory);
if($productID!=0){
	while($rs=mysqli_fetch_assoc($query)){
		$category=$rs['CategoryName'];
	}
}
$sqlAddCart="";
$sqlCheck="SELECT * FROM `cart` WHERE `ProductID`='$productID'";
$queryCheckCart=mysqli_query($con,$sqlCheck);
$row=mysqli_num_rows($queryCheckCart);
$noAvailble=1;
if($row==0){
	$No_Of_Product=1;
	$sqlAddCart="INSERT INTO `cart` (`CartID`, `No_Of_Product`, `ProductID`, `CustomerID`) VALUES (NULL, '$No_Of_Product', '$productID', '$customerID');";
}else if($row>0){
	$cartid="";
	while($rs=mysqli_fetch_assoc($queryCheckCart)){
		$noAvailble=$rs['No_Of_Product'];
		$cartid=$rs['CartID'];
	}
	$No_Of_Product=$noAvailble+1;
	$sqlAddCart="UPDATE `cart` SET `No_Of_Product`='$No_Of_Product' WHERE `CartID`=$cartid";
}

echo $sqlAddCart;
$queryAddCart=mysqli_query($con,$sqlAddCart);
header("Location:viewProduct.php?category=$category");
}else{
	header("Location:viewProduct?category=Men");
}
mysqli_close($con);

?>


