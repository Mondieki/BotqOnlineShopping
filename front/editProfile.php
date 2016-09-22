<?php 
session_start();
include'variables.php';

$orpass="";
$customerID=0;
$message="";
if(isset($_GET['id'])){
 	$customerID=$_GET['id'];
}
if(isset($_GET['pass'])){
	$orpass=$_GET['pass'];
}

if(isset($_POST['editsubmit'])){
	$newfname=$_POST['newfname'];
	$newlname=$_POST['newlname'];
	$newphone=$_POST['newphone'];
	$password=$_POST['password'];
	$conpass=$_POST['confirmpassword'];
	$oldpass=$_POST['oldpassword'];
	if($oldpass!=""){
		if($orpass==md5($oldpass)){
			if($password==$conpass){
				$pass=md5($password);
				$sql="UPDATE `customer` SET `FirstName` = '$newfname', `LastName` = '$newlname', `Password` = '$pass', `        Telephone` = '$newphone' WHERE `CustomerID` = '$customerID';";
		        $query=mysqli_query($con,$sql);
		        header("Location:index.php");

		    }
		}
	}else{

		echo "Passwords do not match";
	}
}

if(isset($_GET['delete'])){
	if($_GET['delete']=='yes'){
		mysqli_query($con,"DELETE FROM `customer` WHERE `CustomerID`='$customerID';");
		header("Location:index.php");
	}
}
mysqli_close($con);

?>