
<!DOCTYPE HTML>
<html>
<?php

 include 'title.php';
 include 'header.php';
 include_once'variables.php';


			if(isset($_GET['po'])){
echo"<script>";
echo "alert('Your order was placed successfully')";
echo "</script>";
			}
$productID="";

$customerID="";
if(isset($_SESSION['fName'])){
	$customerID=$_SESSION['CustomerID'];
}
 //if(isset($_GET['id'])){
 //	$productID=$_GET['id'];
 //}

$name="";
$Description="";
$price="";
$stock="";
$Category="";
$picture="";
$total=0;
$delivery=0;
$no_of_products="";
$cartID="";

				echo '	<div class="row">
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
<div class="container">
	<div class="check">	 
			 
		 <div class="col-md-9 cart-items">
			 <h1>My Shopping Bag</h1>
				
';
$sqlPro="SELECT * FROM `cart` WHERE `customerID`='$customerID'";
$queryPro=mysqli_query($con,$sqlPro);
if(mysqli_num_rows($queryPro)!=0){
	while ($rs=mysqli_fetch_assoc($queryPro)) {
		$cartID=$rs['CartID'];
		$productID=$rs['ProductID'];
		$no_of_products=$rs['No_Of_Product'];
if($productID!=""){

$sql="SELECT * FROM `product` WHERE `ProductID`='$productID';";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);

	while ($rs=mysqli_fetch_assoc($query)) {
		$name=$rs['ProductName'];
		$Description=$rs['Description'];
		$stock=$rs['UnitStock'];
		$Category=$rs['CategoryName'];
		$picture=$rs['Picture'];
		$price=$rs['UnitPrice'];
		$total+=$price;
		$picture="../images/".$picture;
		echo '<div class="cart-header">
				 <div class="close1"> </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">';
					    echo "<img src='$picture' class='img-responsive'/>";
						echo '</div>
					   <div class="cart-item-info">';
						echo "<h3><a href='#''>$name</a><a href='removeCart.php?id=$productID' style='float:right;
    margin-right: 40px;' title='Remove Product'><buttton class='btn btn-danger'><i class='fa fa-trash-o'></i></button></a><span>Model No: md$productID</span></h3>
						<ul class='qty'>
							<li><p>Stock : $stock</p></li>
							<li><p>Quantity : <input type='number' name='newQty' value=$no_of_products min='1' max='$stock'</p></li>
						</ul>";
						
							 echo '<div class="delivery">
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>

		</div>';
}

}else{
	echo "Database under service Try Again Later";
}

}
}else{
	echo '<div class="panel panel-warning">
  <div class="panel-heading">Your shoping bag is empty</div>
</div>';
}

if($total>10){
	$delivery=$total*0.01;
}

$fTotal=$total+$delivery;
echo "</div>";
echo '<div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>';
				 echo "<span class='total1'>KES $total</span>";
				 echo '<span>Discount</span>
				 <span class="total1">KES 0.0</span>
				 <span>Delivery Charges</span>';
				 echo "<span class='total1'>KES $delivery</span>";
				 echo '<div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>';
			   echo "<li class='last_price'><span>KES  $fTotal</span></li>";
			   echo'
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" role="menuitem" tabindex="-1" data-toggle="modal" data-target="#orderModal" href="">Place Order</a>
			 <a class="order" href="wishlist.php?id=$cartID">Add to Wishlist</a>
			 
			</div>';

echo '<div class="modal fade" id="orderModal" role="dialog">
    <div class="modal-dialog" ng-app="">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity:0.9;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Finalize your Order</h4>
        </div>
       	<div class="modal-body">';
        echo "<form action='placeOrder.php?del=$delivery&amt=$fTotal' method='POST'>";
        		echo'<table class="table table-hover">';
     	
     	echo "<tr><td>Total Cost of Order in KES</td><td><input type='text' name='total' value='$fTotal' readonly></td></tr>";
     	echo "<tr><td>Choose a method of payment</td><td><select name='payment'>
     	<option>MPesa</option>
     	<option>Credit Card</option>
     	<option>Pay on Delivery</option>
     	</select></td></tr>";
     	echo "<tr><td>Choose the Shipping Company</td><td><select name='shipper'>
     	<option>unlimited Delivery ltf</option>
     	<option>Fast forward</option>
     	<option>None I will pick it</option>
     	</select></td></tr>";
     	echo "<tr><td>Shipping Address</td><td><input type='text' name='shipAdd'></td></tr>";
     	echo "<tr><td>Delivery total cost in KES</td><td><input type='text' name='shipbill' value='$delivery' readonly></td></tr>";
     	echo "<tr><td><button type='submit' name='porder' class='btn btn-success'>Confirm Order</button></td><td></td><td><button class='btn btn-danger' data-dismiss='modal'>Cancel Order</button></td></tr>";
     	echo '</table>
        	</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>';

?>
	 		
		 </div>
		 
		
			<div class="clearfix"> </div>
	 </div>
	 </div>


<?php include_once 'footer.php';
mysqli_close($con);
 ?>
</body>
</html>