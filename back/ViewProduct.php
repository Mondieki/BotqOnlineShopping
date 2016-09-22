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
		$picture="../images/".$picture;
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
<div>

<h4 style="text-align:center;margin-bottom:5px;"><a href="DisplayProduct.php?category=<?php echo $Category;?>" style="padding-right:50px;"><button class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</button></a>Viewing product  click to <a href="ModifyProduct.php?id=<?=$productID; ?>"><button class="btn btn-warning">Modify</button></a></h4>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<table class="table">
			<tr><td>Name</td><td><?=$name;?></td></tr>
			<tr><td>Category</td><td><?=$Category;?></td></tr>
			<tr><td>Price per Item </td><td>Ksh <?=$price;?> /=</td></tr>
			<tr><td>Unit in Stock</td><td><?=$stock;?></td></tr>
			<tr><td>Sold Item(s)</td><td>3</td></tr>
		</table>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img class="img-rounded" src="<?=$picture;?>" style="width:480px;">
	</div>
	
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading">Description of Item</div>
			<div class="panel-body"><?php echo $Description; ?></div>
		</div>
	</div>
</div>
		







