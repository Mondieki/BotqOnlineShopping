<?php
include_once'variables.php';
$productID="";
if(isset($_GET['id'])){
	$productID=$_GET['id'];
}
if(isset($_POST['submit'])){
 $newName=$_POST['newName'];
 $newPrice=$_POST['newPrice'];
 $newStock=$_POST['newStock'];
 $newDes=$_POST['newDes'];
 $newCategory=$_POST['newCategory'];

    $name = $_FILES['newImage']['name'];
    if($name==""){
    	$sqlupdate="UPDATE `product` SET `ProductName` = '$newName',`CategoryName`='$newCategory', `Description` = '$newDes', `UnitPrice` = '$newPrice', `UnitStock` = '$newStock' WHERE `product`.`ProductID` = '$productID';";
        mysqli_query($con,$sqlupdate);
		header("Location: ViewProduct.php?id=$productID");
        echo "<script>";
		echo "alert(' $newName modified successfully')";
		echo "</script>";
    }else{
    $extension=strtolower(substr($name, -3));
    $size = $_FILES['newImage']['size'];
    $type = $_FILES['newImage']['type'];
    $temp_name = $_FILES['newImage']['tmp_name'];


    
    //moving file to specified location
    if($extension=='jpg'||$extension=='png'){
    $location = '../images/';
    if(move_uploaded_file($temp_name, $location.$name)){

        $path=$location.$name;
        $sqlupdate="UPDATE `product` SET `ProductName` = '$newName',`CategoryName`='$newCategory', `Description` = '$newDes', `UnitPrice` = '$newPrice', `UnitStock` = '$newStock',`Picture` = '$path' WHERE `product`.`ProductID` = '$productID';";
        mysqli_query($con,$sqlupdate);
        header("Location: ViewProduct.php?id=$productID");
        echo "<script>";
		echo "alert(' $newName modified successfully')";
		echo "</script>";
		header("Location:ViewProduct.php?id=$productID");

    }
  }
}
  mysqli_close($con);


}

?>
		
