 <?php include_once'./iframeImporter.php'; ?>

<form class="form-horizontal" name="addAdministrator" method="POST" action="Add_Admin.php" enctype="multipart/form-data">

<table class="table table-bordered" id="addAdmin">
      <thead><h4 style="margin-left: 20%;">Add an Administrator</h4></thead>
      <tr><td>First Name</td><td><input type="text" name="firstName" placeholder="Barack"></td></tr>
      <tr><td>Last Name</td><td><input type="text" name="lastName" placeholder="Obama"></td></tr>
      <tr><td>Email</td><td><input type="text" id="inputEmail" placeholder="Email" name="email"></td></tr>
      <tr><td>Password</td><td><input type="password" id="inputPassword" placeholder="Password" name="password"></td></tr>
      <tr><td>Confirm Password</td><td><input type="password" id="inputPassword" placeholder="Confirm Password" name="repassword"></td></tr>
      <tr><td>TelePhone Number</td><td><input type="number" placeholder="Ignore +254" name="phone"> </td></tr>
      <tr><td>Profile Picture</td><td><input type="file" name="images"></td></tr>
      <tr><td><button type="submit" name="Submit" class="btn btn-primary">Add Administrator</button></td><td><button type="reset" class="btn btn-warning">Clear Information</button></td></tr>
</table>
</form>

<?php
include_once("variables.php");
if ( isset( $_POST['Submit'] ) ) {
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$email=$_POST['email'];
$fpass=$_POST['password'];
$spass=$_POST['repassword'];
$phone=$_POST['phone'];
if(($fname=="") || ($lname=="") ||($email=="") ||($phone=="")){
    echo "<p>Enter the credentials of the new administrator</p>";
}else{


$password="";

if($fpass==$spass){
	if($fpass!=null){
		$password=md5($fpass);
	}
}else{
    die("Passwords don't match");
}

    $name = $_FILES['images']['name']; 
    $extension=strtolower(substr($name, -3));
    $size = $_FILES['images']['size'];
    $type = $_FILES['images']['type'];
    $temp_name = $_FILES['images']['tmp_name'];


    
    //moving file to specified location
    if($extension=='jpg'||$extension=='png'){
    $location ='../images/';
    if(move_uploaded_file($temp_name, $location.$name)){

        $path=$location.$name;
        $addAdmin="INSERT INTO `cyanide`.`Administrators` (`AdmID`, `FirstName`, `LastName`, `Email`, `Password`, `Phone`, `image`, `lastLogin`) VALUES (NULL,'$fname', '$lname', '$email', '$password', '$phone', '$name', null);";
        mysqli_query($con,$addAdmin);

        echo "<script>";
        echo "alert(' $fname $lname has been added as an Administrator ')";
        echo "</script>";
    }else{
    	echo "<script>";
        echo "alert(' There is a problem with the image uploading')";
        echo "</script>";
    }
}else{
		echo "<script>";
        echo "alert(' $fname get a jpg or png image format')";
        echo "</script>";
}
}
mysqli_close($con);
}

?>









