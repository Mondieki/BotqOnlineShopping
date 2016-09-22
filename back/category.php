<?php include_once'iframeImporter.php'; ?>
<script type="text/javascript">
function showcategory(){
	var showCategory=document.getElementById('showCategory');
	if(showCategory.style.display==""){
		showCategory.style.display="none"
	}else{
		showCategory.style.display=""
	}
}
</script>
<div>

	<h2 style="text-align:center;">Add a category </h2>
	
	<form action="category.php" method="POST">
		<table class="table table-bordered">
			<tr><td>Main Catregory</td><td><select name="mainCategory">
				<option>Men</option>
				<option>Women</option>
				<option>Kids</option>
			</select></td></tr>

			<tr><td>Sub category</td><td><input type="text" name="subCategory"></td></tr>
			<tr><td>Description</td><td><textarea name="description"></textarea></td></tr>
			<tr><td><button class="btn btn-success" type="submit" name="addCategory">Add Category</button></td><td><button class="btn btn-warning" type="reset">Clear table</button></a></td></tr>
		</table>
	</form>
	
</div>
<?php  

if(isset($_POST['addCategory'])){
$Des=$_POST['description'];
$subCate=$_POST['subCategory'];
$mainCate=$_POST['mainCategory'];


$sql="INSERT INTO `category` (`CategoryID`, `mainCategory`, `subCategory`, `Description`) VALUES (NULL, '$mainCate', '$subCate', '$Des');";
echo "this does not work";
$query=mysqli_query($con,$sql);
header("Location:category.php");
}

?>









