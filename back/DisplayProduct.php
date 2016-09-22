<?php  include'./iframeImporter.php';  
$category="";
if(isset($_GET['category'])){
	$category=$_GET['category'];
}

$sql="SELECT * FROM `product` WHERE `CategoryName`='$category' AND `active`=1";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);

if($row==0){
	echo "There are no products in this category";
}
else{
	while ($rs=mysqli_fetch_assoc($query)) {
		$image=$rs['Picture'];
		$image = '../images/'.$image;
		$id=$rs['ProductID'];
		$productName = $rs ['ProductName'];
		echo '<div id="ProductDisplay">';
		echo  "<div class=name>$productName</div>";
		echo "<img src='$image' class='img-rounded'>";
		echo "<a href='./ViewProduct.php?id={$id}'><button class='btn btn-primary'>View</button></a>";
		echo "<a href='./ModifyProduct.php?id={$id}'><button class='btn btn-info'>Modify</button></a>";
		echo '</div>';

	}
}
mysqli_close($con);	
?>









