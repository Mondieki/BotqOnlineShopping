<?php  include'./iframeImporter.php';  ?>

<form action="addItem.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

<table class="table table-bordered" id="addItemTable">
	<thead><h4 style="margin-left: 20%;margin-top: 2%;">Add a new Item</h4></thead>
	<tr><td>Category</td><td><select name="category">
			<option>Men</option>
			<option>Women</option>
			<option>Kids</option>
		</select></td></tr>
		<tr><td>Sub Category</td><td>
		<select >
			<?php
				$sql="SELECT * FROM `category`";
				$query=mysqli_query($con,$sql);
				$row=mysqli_num_rows($query);
				if($row!=0){
					while($rs=mysqli_fetch_assoc($query)){
						$mainCategory=$rs['mainCategory'];
						$subCategory=$rs['subCategory'];
						$Description=$rs['Description'];
						$cateID=$rs['CategoryID'];
						echo "<option>$subCategory</option>";
					}
				}
			?>
		</select>
		</td>
	</tr>
	<tr><td>Name</td><td><input type="text" name="itemName" placeholder="Like V neck"></td></tr>
	<tr><td>Description</td><td><input type="text" name="itemDes" placeholder="Like new Polo design v neck shirts"></td></tr>
	<tr><td>Price</td><td><input type="text" name="itemPrice" placeholder="in KSH"></td></tr>
	<tr><td>Quantity</td><td><input type="text" name="itemQuantity" placeholder="the in Available stock "></td></tr>
	<tr><td>Picture</td><td><input type="file" name="itemImage"></td></tr>
	<tr><td><button type="submit" name="submit" class="btn btn-success">Add Item</button></td><td><button type="reset" class="btn btn-warning">Clear</button></td></tr>

</table>

</form>
<?php
include_once'variables.php';

if ( isset( $_POST['submit'] ) ) {
    
$category=$_POST['category'];
$ItemName=$_POST['itemName'];
$des=$_POST['itemDes'];
$price=$_POST['itemPrice'];
$Quantity=$_POST['itemQuantity'];

	if(($ItemName!="") && ($des!="")&&($price!="")&&($Quantity!="")){
    $name = $_FILES['itemImage']['name'];
    $extension=strtolower(substr($name, -3));
    $size = $_FILES['itemImage']['size'];
    $type = $_FILES['itemImage']['type'];
    $temp_name = $_FILES['itemImage']['tmp_name'];


    
    //moving file to specified location
    if($extension=='jpg'||$extension=='png'){
    $location = '../images/';
    if(move_uploaded_file($temp_name, $location.$name)){
        $path=$location.$name;
        $addItem="INSERT INTO `product` (`ProductID`, `ProductName`, `Description`, `UnitPrice`, `UnitStock`, `CategoryName`, `Picture`, `active`) VALUES (NULL, '$ItemName', '$des', '$price', '$Quantity', '$category', '$name','1');";
        mysqli_query($con,$addItem);
        echo "<script>";
		echo "alert(' $ItemName has been added')";
		echo "</script>";

    }
}else{
	echo "<script>";
	echo "alert('Choose a good image format')";
	echo "</script>";
}
}else{
	echo "<script>";
	echo "alert('Enter all the fields of the new item')";
	echo "</script>";
}
mysqli_close($con);
//close issets
}


?>













