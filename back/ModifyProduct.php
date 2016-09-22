<?php
include_once'iframeImporter.php';

$productID="";
if(isset($_GET['id'])){
	$productID=$_GET['id'];
}

$name="";
$Description="";
$price="";
$stock="";
$Category="";
$picture="";
$active="";
if($productID!=""){

$sql="SELECT * FROM `product` WHERE `ProductID`='$productID';";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);

if($row==1){

	while ($rs=mysqli_fetch_assoc($query)) {
		$name=$rs['ProductName'];
		$Description=$rs['Description'];
		$price=$rs['UnitPrice'];
		$stock=$rs['UnitStock'];
		$Category=$rs['CategoryName'];
		$picture=$rs['Picture'];
		$picture='../images/'.$picture;
		$active=$rs=['active'];
	}

}else{
	echo "Database under service Try Again Later";
}

}else{
	echo "<script>";
	echo "alert('No item selected')";
	echo "</script>";
}



?>

<h4 style="text-align:center;margin-bottom:5px;"><a href="DisplayProduct.php?category=<?php echo $Category;?>" style="padding-right:50px;"><button class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</button></a>Modifying product  click to <a href="ViewProduct.php?id=<?php echo $productID; ?>"><button class="btn btn-info">View</button></a>
<a href="deactivate.php?id=<?=$productID;?>" style="float:right;"><button class="btn btn-danger">Remove Product</button></a></h4>
<form method="POST" action="modifycode.php?id=<?=$productID;?>" enctype="multipart/form-data">
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<table class="table">
			<tr><td>Name</td><td><input type="text" name="newName" value="<?=$name;?>"></td></tr>
			<tr><td>Category</td><td><select name="newCategory">
			<option><?=$Category;?></option>
			<option>Women</option>
			<option>Kids</option></select></td></tr>
			<tr><td>Price per Item </td><td><input type="number" name="newPrice" placeholder="Ksh <?=$price;?> /=" value="<?=$price?>"></td></tr>
			<tr><td>Unit in Stock</td><td><input type="number" name="newStock" placeholder="<?=$stock;?>" value="<?=$stock;?>"></td></tr>
		</table>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img class="img-rounded" src="<?=$picture;?>" style="width:480px;">
		<input type="file" name="newImage">
	</div>
	
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">Description of Item <a href=""></a></div>
			<div class="panel-body"><input style="width:100%;" type="text" name="newDes" value="<?=$Description;?>"></div>
			<div class="panel-footer"><input type="submit" name="submit" value="Edit Product"></div>
		</div>
	</div>
</div>
</form>







