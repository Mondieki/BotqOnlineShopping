<!DOCTYPE HTML>
<html>
<?php 
	  include 'title.php';
	  include 'header.php';
	  require 'variables.php';
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
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>new user? <span1> create an account </span1></h2>
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
				supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form" ng-app="registration">
		 <!-- Form -->
			<form id="registration_form" action="login.php" method="post" name="register" ng-controller="ctrl">
				<div>
					<label>
						<?php 
							$title="SELECT * FROM `title`";
							$qtitle=mysqli_query($con,$title);
							$rowtitle=mysqli_num_rows($qtitle);
							echo "<select name='title'>";
							if($rowtitle!=0){
								while ($rs=mysqli_fetch_assoc($qtitle)) {
									$titleid=$rs['TitleID'];
									$abb=$rs['Abbreviation'];
									echo "<option>$abb</option>";
								}
							}	
							echo "</select>";
						 ?>
					</label>
				</div>
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;" placeholder="first name:" type="text" name="F_Name" tabindex="1" required autofocus> 
					
						</label>
				</div>
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;"  placeholder="last name:" type="text" name="L_Name"tabindex="2" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;"  placeholder="Email address:" type="email" name="Uemail" tabindex="3" required>
					</label>
				</div>
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;" placeholder="telephone:" type="text" name="UPhone" tabindex="3" required>
					</label>
				</div>
				<!--<div class="sky-form">
					<div class="sky_form1">
						<ul>
							<li><label class="radio left"><input type="radio" name="radio" checked=""><i></i>Male</label></li>
							<li><label class="radio"><input type="radio" name="radio"><i></i>Female</label></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>-->
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;" placeholder="password" type="password" id="password" name="fpass" tabindex="4" required>
					</label>
				</div>						
				<div>
					<label>
						<input style="float:left;width:52%;margin-bottom:10px;" placeholder="retype password" type="password" tabindex="4" name="spass" required>
						<!-- <span style="float:left;width:45%; margin-left:2%;"></span> -->
					</label>
				</div>	
				<div>
					<button style="float:left;width:50%;margin-bottom:10px;" id="register-submit" name="submit" class="btn btn-success" type="submit">Create an Account</button>
				</div>
				<div class="sky-form">
					<label style="float:left;width:80%;margin-bottom:10px;" class="checkbox">By creating this account you agree to BotiKE.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<?php
		
		//session_start();
		
	
	?>

	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
	<p>Already have an account? <a href="login.php"><button class="btn btn-info">Log In</button></a> here.</p>
</div>
<div class="foot-top">
	<div class="container">
		<div class="col-md-6 s-c">
			<li>
				<div class="fooll">
					<h5>follow us on</h5>
				</div>
			</li>
			<li>
				<div class="social-ic">
					<ul>
						<li><a href="#"><i class="facebok"> </i></a></li>
						<li><a href="#"><i class="twiter"> </i></a></li>
						<li><a href="#"><i class="goog"> </i></a></li>
						<li><a href="#"><i class="be"> </i></a></li>
						<li><a href="#"><i class="pp"> </i></a></li>
							<div class="clearfix"></div>	
					</ul>
				</div>
			</li>
				<div class="clearfix"> </div>
		</div>
		<div class="col-md-6 s-c">
			<div class="stay">
						<div class="stay-left">
							<form>
								<input type="text" placeholder="Enter your email to join our newsletter" required="">
							</form>
						</div>
						<div class="btn-1">
							<form>
								<input type="submit" value="join">
							</form>
						</div>
							<div class="clearfix"> </div>
			</div>
		</div>
			<div class="clearfix"> </div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="col-md-3 cust">
			<h4>CUSTOMER CARE</h4>
				<li><a href="#">Help Center</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="buy.php">How To Buy</a></li>
				<li><a href="#">Delivery</a></li>
		</div>
		<div class="col-md-2 abt">
			<h4>ABOUT US</h4>
				<li><a href="#">Our Stories</a></li>
				<li><a href="#">Press</a></li>
				<li><a href="#">Career</a></li>
				<li><a href="contact.php">Contact</a></li>
		</div>
		<div class="col-md-2 myac">
			<h4>MY ACCOUNT</h4>
				<li><a href="register.php">Register</a></li>
				<li><a href="#">My Cart</a></li>
				<li><a href="#">Order History</a></li>
				<li><a href="buy.php">Payment</a></li>
		</div>
		<div class="col-md-5 our-st">
			<div class="our-left">
				<h4>OUR STORES</h4>
			</div>
			<div class="our-left1">
				<div class="cr_btn">
					<a href="#">SOLO</a>
				</div>
			</div>
			<div class="our-left1">
				<div class="cr_btn1">
					<a href="#">BOGOR</a>
				</div>
			</div>
			<div class="clearfix"> </div>
				<li><i class="add"> </i>Jl. Haji Muhidin, Blok G no.69</li>
				<li><i class="phone"> </i>025-2839341</li>
				<li><a href="mailto:info@example.com"><i class="mail"> </i>info@sitename.com </a></li>
			
		</div>
		<div class="clearfix"> </div>
			<p>Copyrights © 2015 Gretong. All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
</body>
</html>
