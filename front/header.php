<!-- header_top -->
<?php 
error_reporting(0);
session_start(); ?>
<body onload="loseLogin()">
<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">help</a></li>|
					<li><a href="contact.php">Contact</a></li>|
					<li><a href="#">Delivery information</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span><i class="fa fa-phone" aria-hidden="true">CALL US</i></span></h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>

<!-- header -->
<div class="header_bg">
	<div class="container">
		<div class="header">
			<div class="head-t">
		<div class="logo">
			<a href="index.php">
				<img src="../images/logo.jpg" class="img-responsive" alt=""/>
			 </a>
		</div>
		<!-- start header_right -->
		<div class="header_right">
			<div class="rgt-bottom">
				<div class="log">
					<div class="login" >
						<div id="loginContainer"><a href="login.php" id="loginButton"><span>Login</span></a>
						    <div id="loginBox">                
						        <form id="loginForm" method="POST" action="index.php">
						                <fieldset id="body">
						                	<fieldset>
						                          <label for="email">Email Address</label>
						                          <input type="text" name="email" id="email">
						                    </fieldset>
						                    <fieldset>
						                            <label for="password">Password</label>
						                            <input type="password" name="password" id="password">
						                     </fieldset>
						                    <input type="submit" id="login" name="Submit"value="Sign in">
						            	</fieldset>
						            <span><a href="#">Forgot your password?</a></span>
								</form>
								
		<?php
			include_once'variables.php';

			$customerID="";
if(isset($_SESSION['fName'])){
	$customerID=$_SESSION['CustomerID'];
}
			$sqlProducts="SELECT `CartID` FROM `cart` WHERE `CustomerID`='$customerID'";
			$queryProducts=mysqli_query($con,$sqlProducts);
			$products=mysqli_num_rows($queryProducts);
			if ( isset( $_POST['Submit'] ) ) {
			$email=$_POST['email'];
			$password=$_POST['password'];
			$password=md5($password);
			$query="SELECT * FROM administrators WHERE `Email`='$email'";
			$result=mysqli_query($con,$query);
			$row=mysqli_num_rows($result);

			if($row==1){
				while($re=mysqli_fetch_assoc($result)){
					$dbpass=$re['Password'];
					$fname=$re['FirstName'];
					$lname=$re['LastName'];
					$image=$re['image'];
				}
				if($dbpass==$password){
					$_SESSION['firstName']=$fname;
					$_SESSION['lastName']=$lname;
					$_SESSION['image']=$image;
					echo "<script> window.location.href='../back/index.php'; </script>";
					//header('Location:../back/index.php');
				}else{
					echo "<script>";
					echo "alert('Wrong Password')";
					echo"</script>";
				}
			}else {
			$email=$_POST['email'];
			$email=strtolower($email);
			$password=$_POST['password'];
			$password=md5($password);
			$query="SELECT * FROM `customer` WHERE `Email`='$email'";
			$result=mysqli_query($con,$query);
			$row=mysqli_num_rows($result);

			if($row!=0){
				$fcname="";
				$customerID="";
				while($re=mysqli_fetch_assoc($result)){
					$dbpass=$re['Password'];
					$fname=$re['FirstName'];
					$customerID=$re['CustomerID'];
				}
				if($dbpass==$password){
					$_SESSION['fName']=$fname;
					$_SESSION['CustomerID']=$customerID;
					header("Location:index.php");
				}else{
					echo "<script>";
					echo "alert('Wrong Password')";
					echo"</script>";
				}
			}else{
				echo "<script>";
				echo "alert('Unknown Email Address ')";
				echo"</script>";
			}
			//close the isset
			}
		}
		?>					
							</div>
						</div>
					</div>
				</div>
				<div class="reg">
				<?php
				 
				if(isset($_SESSION['fName']))
				{
					$st_name=$_SESSION['fName'];
					if($_SESSION['fName']!="")
					{
	echo '<div class="dropdown" id="registerButton">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">'.$st_name.' 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <button style="width:100%;" role="menuitem" tabindex="-1" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Profile</button>
      <a role="menuitem" tabindex="-1" href="logout.php"><button style="width:100%;" class="btn btn-danger">Log out</button></a>
    </ul>
  </div>';
  //echo "<a id='registerButton' href='logout.php'><button class='btn btn-danger'>Log out</button></a>";
					}
					else
					{
						echo "<a id='registerButton' href='register.php'>REGISTER</a>";

					}
				}
					else
					{
						echo "<a id='registerButton' href='register.php'>REGISTER</a>";
					}
					
				 ?>
				 
				</div>
			<div class="cart box_1">
				<a href="checkout.php" title="View Cart" style="margin-right: 20px;float: right;text-decoration:none;color:black;"><i class="fa fa-shopping-cart"></i>  <?=$products;?> Item(s)</a>
				<div class="clearfix"> </div>
			</div>
			<div class="create_btn">
				<a href="checkout.php">CHECKOUT</a>
			</div>
			<!-- Single button -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" ng-app="">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity:0.9;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit your Profile</h4>
        </div>
        <div class="modal-body">
<?php 

$sql="SELECT * FROM `customer` WHERE `CustomerID`='$customerID'";
$query=mysqli_query($con,$sql);
$row=mysqli_num_rows($query);
if($row==1){
	while ($rs=mysqli_fetch_assoc($query)) {
		$fname=$rs['FirstName'];
		$lname=$rs['LastName'];
		$email=$rs['Email'];
		$password=$rs['Password'];
		$telephone=$rs['Telephone'];
		$deactivate=$rs['active'];
		$title=$rs['TitleID'];

		//action="editProfile.php?pass='.$password.'&&id='.$customerID.'" 

		echo '<form name="myform" ng-model="myform" ng-controller="myformc" action="editProfile.php?pass='.$password.'&&id='.$customerID.'" method="POST"><table class="table table-hover">';
		echo "<tr><td>Title</td><td>$title</td></tr>";
		echo "<tr><td>First Name</td><td><input type='text' ng-model='ffname' name='newfname' value='$fname'></td></tr>";
		echo "<tr><td>Last Name</td><td><input type='text' name='newlname' value='$lname'></td></tr>";
		echo "<tr><td>Email</td><td>$email</td></tr>";
		echo "<tr><td>Telephone</td><td><input type='number' name='newphone' value='$telephone'></td></tr>";
		echo "<tr><td>Old password</td><td><input type='password' name='oldpassword'></td></tr>";
		echo "<tr><td>new Password</td><td><input type='password' name='password'></td></tr>";
		echo "<tr><td>Confirm Password</td><td><input type='password' name='confirmpassword'></td></tr>";
		echo "<tr><td><button id='savechanges' type='submit' name='editsubmit' class='btn btn-warning'>Save changes</button></td></tr>";
		echo "</table></form>";

	}
}else{
	echo "Please wait while loading";
}
?>	
		<div id="modalAjaxResponse"></div>
        </div>

        <div class="modal-footer">
<button role='menuitem' tabindex='-1' class='btn btn-info' data-toggle='modal' data-target='#myOrders' data-dismiss="modal">View Orders</button><button role='menuitem' tabindex='-1' class='btn btn-danger' data-toggle='modal' data-target='#deleteAcc' data-dismiss="modal">Deactivate Account</button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

   <div class="modal fade" id="myOrders" role="dialog">
    <div class="modal-dialog" ng-app="">
    
      <!-- Modal content-->
      <div class="modal-content" style="opacity:0.9;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">This are Your Orders made in this Website </h4>
        </div>
        <div class="modal-body">
        <table class="table table-bordered">
        	<p>Ordered by Date</p>
        	<tr><td>Date of Order</td><td>Total Amount</td><td>Address</td><td>Delivery cost</td><td>Mode of Payment</td><td>Shipping Company</td></tr>
<?php 

$sql1="SELECT * FROM `customerorders` WHERE `CustomerID`='$customerID' ORDER BY `OrderDate`";
$query1=mysqli_query($con,$sql1);
$row1=mysqli_num_rows($query1);
if($row1!=0){
	while ($rs=mysqli_fetch_assoc($query1)) {
		$orderId=$rs['OrderID'];
		$date=$rs['OrderDate'];
		$amount=$rs['OrderAmount'];
		$address=$rs['BillingAddress'];
		$delivery=$rs['shippingAmount'];
		$payment=$rs['PaymentMethod'];
		$shipper=$rs['Shipper'];
		echo "<tr><td>$date</td><td>$amount</td><td>$address</td><td>$delivery</td><td>$payment</td><td>$shipper</td></tr>";

	}
}else{
	echo "Please wait while loading";
}
?>	
		</table>
		<div id="modalAjaxResponse"></div>
        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteAcc" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account Deletion</h4>
        </div>
        <div class="modal-body">
          <p>You Will not be able to login again after your Session Expires</p>
          <a href='editProfile.php?id=<?php echo $customerID; ?>&delete=yes'><button style="background-color:red;">Yes Delete Me Permanently</button></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  
			<div class="clearfix"> </div>
		</div>
		<div class="search">
		    <form action="viewProduct.php?search=yes" method="POST">
		    	<input type="text" name="term" placeholder="search...">
				<button type="submit" name="btnsearch" class="btn btn-info"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
			</div>
		</div>

		<!-- the navbar  -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12" id="nav_container">
						<a href="index.php">HOME</a>
						<a href="viewProduct.php?category=Arrival">NEW ARRIVALS</a>
						<a href="viewProduct.php?category=Men">MEN</a>
						<a href="viewProduct.php?category=Women">WOMEN</a>
						<a href="viewProduct.php?category=Kids">KIDS</a>
				</div>
			</div>
		<!-- the end of the navbar -->
	</div>
</div>
