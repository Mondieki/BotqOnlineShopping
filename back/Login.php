<?php 
session_start();
if(isset($_SESSION['admName'])!=""){
	die("<script>window.location.href='index.php'</script>");
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
            <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

</head>

<style type="text/css">
	*
	{
		background-color: #F5F5F5;
	}
	.title
	{
		margin-left: 38%;
		font-family: "algerian";
		font-size: 50px;
		font-weight: 20px;
	}
	.row
	{
		margin-left: 2%;
		margin-top: 15%;
	}

</style>
  <div class="row">
  <h2 class="title">Admin Login</h2>
  <form action="Login.php" method="post">
    <div class="input-field col s5">
      <input id="first_name2" name="email" type="email" class="validate">
      <label class="active" for="first_name2">Email</label>
    </div>
    <div class="input-field col s5">
      <input  id="first_name2" name="Passw" type="password" class="validate">
      <label class="active" for="first_name2">Password</label>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-top:25px;">Submit
    <!-- <i class="material-icons right">send</i> -->
  </button>
  </form>
  </div>

  <?php
    require_once 'variables.php';
				
			if ( isset( $_POST['action'] ) ) {
			$email=$_POST['email'];
			$password=$_POST['Passw'];
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
					$_SESSION['admName']=$fname;
					$_SESSION['admlName']=$lname;
					$_SESSION['image']=$image;
					echo "<script> window.location.href='../back/index.php'; </script>";
					//header('Location:../back/index.php');
				}else{
					echo "<script>";
					echo "alert('Wrong Password')";
					echo"</script>";
				}
			}else{
				echo "Unknown identity";
			}
		}
			?>
  		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  </html>
