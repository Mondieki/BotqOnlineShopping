<?php

session_start();
$_SESSION['fName']="";
$_SESSION['CustomerID']="";
session_destroy();
header('Location:index.php');
?>