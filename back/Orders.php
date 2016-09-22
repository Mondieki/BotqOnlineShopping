<?php  include'./iframeImporter.php';


$sql="SELECT * FROM `customerorders` ORDER BY `OrderDate`";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);


if($row!=0){

echo '<h3>Orders</h3>';
echo '<p>Ordered by Date</p>';
echo '<table class="table table-bordered">';
echo '<tr><td>Id</td><td>Date</td><td>Customer ID</td><td>Order Amount</td><td>Billing Address</td><td>Shipping Amount</td><td>Payment Method</td><td>Shipping Company</td></tr>';


	while($rs=mysqli_fetch_assoc($query)){
		$id=$rs['OrderID'];
		$cID=$rs['CustomerID'];
		$date=$rs['OrderDate'];
		$amount=$rs['OrderAmount'];
		$address=$rs['BillingAddress'];
		$shipamount=$rs['ShippingAmount'];
		$payment=$rs['PaymentMethod'];
		$shipper=$rs['Shipper'];
		// $name="";
		// while($r=mysqli_fetch_assoc(mysqli_query($con,"SELECT `FirstName` FROM `customer` WHERE `CustomerID`='$cID'"))){
		// 	$name=$r['FirstName'];
		// }
		// echo $name;
		echo "<tr><td>$id</td><td>$date</td><td>$cID</td><td>$amount</td><td>$address</td><td>$shipamount</td><td>$payment</td><td>$shipper</td></tr>";
		

		
	}

}else{

	echo "There are no Orders to view";
}

echo "</table>";

mysqli_close($con);
?>












