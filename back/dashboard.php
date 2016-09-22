<?php  include'./iframeImporter.php';  ?>
<?php

$customer=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `customer`"));
$order=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `customerorders`"));
$admins=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `administrators`"));
$product=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `product`"));
$category=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `category`"));


?>
<link rel="stylesheet" type="text/css" href="../css/back/materialize.min.css">
<style type="text/css">

#viewDash{
  width:45%;
  float: left;
  margin-left: 2%;
  margin-top: 10px;
}
</style>
<div id="viewDash">
<div class="card small blue-grey darken-1">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../images/customers2.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Customers<i class="material-icons right"></i></span>
      <p style="font-size:25px;"><?php echo $customer;?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Customers<i class="material-icons right">close</i></span>
      <p>This is a list of the cutomers registered in the website</p>
    </div>
</div>
</div>

<div id="viewDash">
<div class="card small">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../images/adminproducts.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Products<i class="material-icons right"></i></span>
      <p style="font-size:25px;"><?php echo $product;?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Products<i class="material-icons right">close</i></span>
      <p>This is the number of products current in the website including the deactivated products</p>
    </div>
</div>
</div>

<div id="viewDash">
<div class="card small">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../images/adminorder.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Orders<i class="material-icons right"></i></span>
      <p style="font-size:25px;"><?php echo $order;?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Orders<i class="material-icons right">close</i></span>
      <p>This is number of orders placed in the website</p>
    </div>
</div>
</div>

<div id="viewDash">
<div class="card small">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../images/adminproducts2.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Sub Categories<i class="material-icons right"></i></span>
      <p style="font-size:25px;"><?php echo $category;?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Sub Category<i class="material-icons right">close</i></span>
      <p>This is number of Sub categories under the three main category i.e Men, Women and Kids</p>
    </div>
</div>
</div>

<div id="viewDash">
<div class="card small">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="../images/administrators_lg.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Administrators<i class="material-icons right"></i></span>
      <p style="font-size:25px;"><?php echo $admins;?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Administrators<i class="material-icons right">close</i></span>
      <p>This is number of Administrators running the website</p>
    </div>
</div>
</div>
<script type="text/javascript" src="../js/front/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/front/jquery.min.js"></script>
<script type="text/javascript" src="../js/back/materialize.js"></script>




