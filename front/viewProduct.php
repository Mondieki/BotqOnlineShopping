
<!DOCTYPE HTML>
<html>
<?php
 include 'title.php';
 include 'header.php';
include_once'variables.php';

	$category="";
	if(isset($_GET['category'])){
		$category=$_GET['category'];

	}
	$sort="";
	$sqlProduct="";
	$sqlProduct1="";
	if(isset($_GET['sort'])){
		$sort=$_GET['sort'];
		$sqlProduct1="SELECT * FROM `product` WHERE `active`=1 ORDER BY";
	}else{
		$sqlProduct1="SELECT * FROM `product` WHERE `active`=1; ";
	}
	if($category=="Arrival"){
		$query1=mysqli_query($con,$sqlProduct1);
		$row1=mysqli_num_rows($query1);
		if($row1>5){
		$arrivals=$row1-5;
		}else{
			echo "No new Arrivals";
		}
		if(isset($_GET['sort'])){
			$sort=$_GET['sort'];
			$sqlProduct="SELECT * FROM `product` WHERE `active`=1 AND `ProductID`>'$arrivals' ORDER BY `$sort`";
		}else{
			$sqlProduct="SELECT * FROM `product` WHERE `active`=1 AND `ProductID`>'$arrivals'; ";
		}
	}else{
	if(isset($_GET['sort'])){
		$sort=$_GET['sort'];
		$sqlProduct="SELECT * FROM `product` WHERE `CategoryName`='$category' AND `active`=1 ORDER BY `$sort`";
	}else{
		$sqlProduct="SELECT * FROM `product` WHERE `CategoryName`='$category' AND `active`=1; ";
	}	
	}
	if(isset($_GET['search'])){
		if($_GET['search']=="yes"){
			if(isset($_POST['btnsearch'])){
				$searchTerm=$_POST['term'];
				$sqlProduct="SELECT * FROM `product` WHERE `active`='1' and `ProductName` LIKE '%$searchTerm%'";
			}
		}
	}
	$productID="";
	$productName="";
	$productImg="";
	$query=mysqli_query($con,$sqlProduct);
	$row=mysqli_num_rows($query);



?>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>
		 </ul> 
	</div>
</div>
</div>
<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start sidebar -->
	<div class="col-md-3 s-d">
	  <div class="w_sidebar">
		<h3>filter by</h3>
		<section  class="sky-form">
					<h4>Sub categories</h4>
						<div class="row1 scroll-pane">
							<div class="col col-4">
<?php 
	$sql="SELECT `subCategory` FROM `category` WHERE `mainCategory`='$category' ORDER BY `subCategory`;";
	$queryCat=mysqli_query($con,$sql);
	$rowCat=mysqli_num_rows($queryCat);
	if($rowCat!=0){
		while($cats=mysqli_fetch_assoc($queryCat)){
			$subcategory=$cats['subCategory'];
			echo '<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>'.$subcategory.'</label>';
		}
	}else{
		echo "No Sub categories Available";
	}
?>
							</div>
						</div>
		</section>
		<section class="sky-form">
			<h4>colour</h4>
			<ul class="w_nav2">
				<li><a class="color1" href="#"></a></li>
				<li><a class="color2" href="#"></a></li>
				<li><a class="color3" href="#"></a></li>
				<li><a class="color4" href="#"></a></li>
				<li><a class="color5" href="#"></a></li>
				<li><a class="color6" href="#"></a></li>
				<li><a class="color7" href="#"></a></li>
				<li><a class="color8" href="#"></a></li>
				<li><a class="color9" href="#"></a></li>
				<li><a class="color10" href="#"></a></li>
				<li><a class="color12" href="#"></a></li>
				<li><a class="color13" href="#"></a></li>
				<li><a class="color14" href="#"></a></li>
				<li><a class="color15" href="#"></a></li>
				<li><a class="color5" href="#"></a></li>
				<li><a class="color6" href="#"></a></li>
				<li><a class="color7" href="#"></a></li>
				<li><a class="color8" href="#"></a></li>
				<li><a class="color9" href="#"></a></li>
				<li><a class="color10" href="#"></a></li>
			</ul>
		</section>
	</div>
   </div>
	<!-- start content -->
		<!-- DOWNLOAD PDF-->
	<div class="pdf">
		<div class="pdfmessage">
			<p>
				Would you like a brochure?
				<a href="javascript:genPDF()">
					<button class="btn btn-success" type="button" onclick="document.getElementById('chngTxt').innerHTML = 'Downloading...'">
						<p id="chngTxt">Download PDF</p>
					</button>
				</href>
			</p>
		</div>
	</div>
	<!-- End of PDF Div-->

	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4>Viewing - <span><?=$row;?> items</span> </h4></a>
			<ul class="w_nav">
						<li>Sort By: </li>
		     			<li><a href="viewProduct.php?category=<?php echo $category; ?>&sort=ProductName"><button class="btn btn-default">Name</button></a></li> |
		     			<li><a href="viewProduct.php?category=<?php echo $category; ?>&sort=UnitPrice"><button class="btn btn-default">Price</button></a></li> |
		     			<li><a href="viewProduct.php?category=<?php echo $category; ?>&sort=Description"><button class="btn btn-default">Latest Update</button></a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
<?php 
	$rs="";
	if($row!=0){
		while($rs=mysqli_fetch_assoc($query)){
			$productID=$rs['ProductID'];
			$productName=$rs['ProductName'];
			$productImg=$rs['Picture'];
			$price=number_format($rs['UnitPrice']);
			$productImg = '../images/'.$productImg;
			echo '<div class="viewProduct" style="text-align: center;width:31%;margin-top: 10px;float: left;">';
			echo  "<a id='linkImg' href='details.php?id=$productID'>
			<img src='$productImg' class='img img-rounded' width='250' height='150'></a>";
			echo "<a id='linkAnchor' href='details.php?id=$productID'>$productName</a>";
			echo "<div><p style='float:left;width:80%;margin-top:10px;'>KES $price</p>";
			echo "<a style='float:left;width:20%;' id='linkCart' href='cartV2.php?id=$productID'><button style='color:black;' class='btn btn-info'><i class='fa fa-cart-plus'></i></button></a></div></div>";
		}
	}
	else{
		echo "No Products in this Category";
	}
?>
<!-- 
		<div class="viewProduct" style="
	text-align: center;
	width:23%;
	margin-right: 2%;
	margin-top: 10px;
	float: left;">
			<a id="linkImg" href="details.php"><img src="../images/1.jpg" class="img img-rounded" width="200" height="140"></a>
			<a id="linkAnchor" href="details.php">The New Boots</a>
			<a id="linkCart" href="cart.php"><button class="btn btn-info">Add to Cart</button></a>
		</div> -->

	<!-- end content -->
	</div>
</div>
</div>


<!-- PDF-->
<script type="text/javascript">
	function genPDF()
	{
		var cat="Category: <?php echo $category; ?>";
		var prodname="Name: <?php echo $productName; ?>";
		var prodprice="Price: <?php echo $price; ?>";
				var logo='data:image/jpeg;base64,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';
		var doc=new jsPDF();
		doc.setFontType("bold");
		doc.setFontSize(16);
		doc.setTextColor(255, 0, 0);
		doc.text(60,20,"BOTQ ONLINE CLOTHING STORE");
		doc.setLineWidth(0.5);
		doc.line(0, 25, 210, 25);
		//doc.setLineWidth(1);
		//doc.line(0, 28, 210, 30);
		//doc.setDrawColor(255,0,0);';
		doc.addImage(logo, 'JPEG', 15, 40, 38, 22);
		doc.setLineWidth(0.5);
		doc.line(0, 25, 210, 25);
		//doc.setLineWidth(0.1);//vertical lines
		//doc.line(100, 25, 100, 210);//vertical lines
		doc.setFontType("normal");
		doc.setFontSize(12);
		doc.setTextColor(0);
		doc.text(20,80,cat);
		doc.text(20,90,prodname);
		doc.text(20,100,prodprice);
		doc.save("BOTQ Catalogue.pdf");
	}
</script>
<!-- End of PDF-->
<?php include_once'footer.php';
	mysqli_close($con); ?>
</body>
</html>