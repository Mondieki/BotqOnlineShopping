<?php
session_start();
if($_SESSION['admName']==null){
	header('Location:login.php');
}
$image = '../images/'.$_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administration Panel</title>
	<link rel="icon" href="../images/webLogo.jpg" type="image/jpg" sizes="16x16"><!--Logo in the tab-->
	<link rel="stylesheet" type="text/css" href="../css/back/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/back/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts/font-awesome-4.6.2/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fonts/font-awesome-4.6.2/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/back/back.css">
<style type="text/css">

#newNav{
	width:20%;
	float: left;
}
#newNav ul{
	list-style: none;
}
#newNav a{
	width: 100%;
	margin-top: 5px;
}

</style>
</head>

<body>
<!-- Start  The header part -->
<div class="container-fluid">
	<div class="row" id="adm_header">
		<div class="col-xs-12 col-sm-4 col-md-8" id="header_heading">
			<h3>Administration Panel</h3>
		</div>
		<div class="col-xs-6 col-sm-2 col-md-2" id="header_user_image">
			<form style="margin-top:10px;" action="searchResults.php" target="contentViewer" method="POST"> 
				<input style="
    width: 80%;
    margin-top: 5px;
    font-size: 18px;
    background-color: white;
    float: left;
" type="text" name="term" placeholder="Search ...">
				<button type="submit" name="btnSearch" class="btn btn-info"><i class="fa fa-search"></i></button>
			</form>			
		</div>
		<div class="col-xs-6 col-sm-2 col-md-1" id="header_user_image">
			<img class="img-circle" width="80px" height="60px" src="<?php echo $image; ?>">
			
		</div>
		<div class="col-xs-6 col-sm-2 col-md-1" id="header_user_name" style="padding: 0px;">
			<p><?php $fname=$_SESSION['admName'];
					$lname=$_SESSION['admlName'];
					echo $fname;
					echo " ";
					echo $lname;?></p>

		</div>
	</div>
</div>
<!--End The header Part-->
<div class="row" style="width:100%;">
<!-- Start of the naviagtion drawer-->
<div class="container" id="newNav">
	<ul>
		<a class="waves-effect waves-light btn" href="dashboard.php" target="contentViewer"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle waves-effect waves-light btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addItem.php" target="contentViewer">Add Product</a></li>
            <li><a href="DisplayProduct.php?category=Men" target="contentViewer"><i class="fa fa-male" aria-hidden="true"></i> Men</a></li>
            <li><a href="DisplayProduct.php?category=Women" target="contentViewer"><i class="fa fa-female" aria-hidden="true"></i> Women</a></li>
            <li><a href="DisplayProduct.php?category=Kids" target="contentViewer"><i class="fa fa-truck" aria-hidden="true"></i> Kids</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle waves-effect waves-light btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="category.php" target="contentViewer">Add Category</a></li>
            <li><a href="ViewCategory.php" target="contentViewer">View Category</a></li>
          </ul>
        </li>
		<a class="waves-effect waves-light btn" href="Orders.php" target="contentViewer">Orders</a>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle waves-effect waves-light btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="View the website as a Customer">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a href="../front/index.php" target="blank">Homepage</a></li>
			<li><a href="../front/viewProduct.php?category=Men" target="blank">Men</a></li>
			<li><a href="../front/viewProduct.php?category=Women" target="blank">Women</a></li>
			<li><a href="../front/viewProduct.php?category=Kids" target="blank">Kids</a></li>
          </ul>
        </li>
		<a class="waves-effect waves-light btn" href="Customers.php" target="contentViewer">Customers</a>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle waves-effect waves-light btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Add_Admin.php" target="contentViewer">Add Administrator</a></li>
            <li><a href="deleteAdministrator.php" target="contentViewer">Delete Admministrator</a></li>
          </ul>
        </li>
		<a class="waves-effect waves-light btn" href="Trash.php" target="contentViewer">Recycle Bin</a>
		<a class="waves-effect waves-light btn" href="logout.php">Log Out</a>
	</ul>
</div>

<!--End of navigation drawer-->

	<div class="container" style="float:left;width:78%;margin-left:1%;">
    	<iframe name="contentViewer" id="contentView" src="./dashboard.php"></iframe>
	</div>

<script type="text/javascript" src="../js/front/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/front/jquery.min.js"></script>
<script type="text/javascript" src="../js/back/materialize.js"></script>
<script type="text/javascript" src="../js/back/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/back/back.js"></script>

</body>
</html>