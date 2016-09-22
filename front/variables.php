<?php
$environment=$_SERVER['SERVER_NAME'];
$server="localhost";
$base_url="";
if($environment=="localhost"){
  $user="root";
  $password="";
  $database="cyanide";  
  $base_url=$environment."/".$database;

}
else 
{
   $user="83727";
   $password="juce8rAN";
   $database="db83727";
   $base_url=$environment."/".$user;
    
}


$con=mysqli_connect($server,$user,$password,$database) or die("NO server and database");


?>
