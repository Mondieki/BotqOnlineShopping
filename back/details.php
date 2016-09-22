<!DOCTYPE HTML>
<html>
<?php 
include 'title.php';
include 'header.php';
include_once'variables.php';

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
	echo "Database under maintenace Try Again Later";
}

}else{
	echo "<script>";
	echo "alert('No item selected')";
	echo "</script>";
}
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
	<!-- start content -->
			<div class="row single">
				<div class="col-md-12 det">
				  <div class="single_left">
					
					<img src="../images/1.jpg" width="420" class="img img-rounded">

				  <div class="desc1 span_3_of_2">
					<h3><?php=$name;?></h3>
					<br>
					<p>Hurry up while stock last</p>
						<div class="price">
							<span class="text">Price:</span>
							<span class="price-new">KES.<?php echo number_format($price);?></span>
						</div>
					<div class="btn_form">
						<a href="cartV2.php?id=$productID">add to cart</a>
					</div>
					<a href="#"><span>login to save in wishlist </span></a>
					
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
          	    <div class="single-bottom1">
					<h6>Details</h6>
					<?php=$Description;?>
					</div>
				<div class="single-bottom2">
					<h6>Related Products</h6>
						<div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="../images/w8.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							  <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
				     <div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="../images/w10.jpg" class="img-responsive " alt=""/>
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							   <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">$597.51</span>								
								<button class="button1"><span>Add to cart</span></button>
		                  </div>
						 <div class="clearfix"></div>
				     </div>
		   	  </div>
	       </div>	
	
		   <div class="clearfix"></div>		
	  </div>
	<!-- end content -->
</div>
</div>
>
<?php include_once'footer.php'; ?>

</body>
</html>