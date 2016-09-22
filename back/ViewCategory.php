<?php  include_once 'iframeImporter.php';?>
<h3>Categories Available</h3>
<table class="table table-bordered">
			<tr><td>Main Category</td><td>Sub category</td><td>Description</td><td></td></tr>
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
						echo "<form method='POST' action='backCategory.php?id=$cateID'>";
						echo "<tr><td>$mainCategory</td><td><input type='text' name='newCat' value=$subCategory></td><td><textarea name='newDes'>$Description</textarea></td><td><button type='submit' class='btn btn-warning'><i class='fa fa-pencil'></i></button></form>
						<a href='backCategory.php?id=$cateID&&type=delete'><button class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a></td></tr>";
					}
				}
			 ?>
		</table>