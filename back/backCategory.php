<?php 
include_once'variables.php';

$id="";
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
$type="";
if(isset($_GET['type'])){
	$type=$_GET['type'];
}

if($type==""){
if($id!=""){
	$newCat=$_POST['newCat'];
	$newDes=$_POST['newDes'];
	$sqlupdate="UPDATE `category` SET `subCategory` = '$newCat', `Description` = '$newDes' WHERE `CategoryID` = '$id';";
	$query=mysqli_query($con,$sqlupdate);
	header("Location:ViewCategory.php");
}
}
else{
	if($type=="delete"){
		$sql="DELETE FROM `category` WHERE `CategoryID` = '$id'";
		$query=mysqli_query($con,$sql);
		header("Location:ViewCategory.php");
	}
}

mysqli_close($con);


?>






