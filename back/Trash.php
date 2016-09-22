<?php  include'./iframeImporter.php'; 

$productID="";
$productName="";
$productImage="";

$sqlProduct="SELECT `ProductID`,`ProductName`,`Picture` FROM `product` WHERE `active`=0 " ;
$queryProduct=mysqli_query($con,$sqlProduct);
$rowProduct=mysqli_num_rows($queryProduct);

$customerID="";
$sqlCustomer="SELECT * FROM `Customer` WHERE `active`='0'";
$query=mysqli_query($con,$sqlCustomer);
$rowCustomer=mysqli_num_rows($query);



?>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Products</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
<?php
      if($rowProduct!=0){
		while ($rs=mysqli_fetch_assoc($queryProduct)) {
			$productID=$rs['ProductID'];
			$ProductName=$rs['ProductName'];
			$productImage=$rs['Picture'];
      $productImage="../images/".$productImage;
      	echo '<div id="ProductDisplay">';
      	echo "<img class='img img-rounded' src='$productImage'>";
      	echo "<h3 id='hide' style='margin-top:-36px;display:none;'></h3>";
      	echo "<a href='restore.php?id=$productID'><button class='btn btn-success'>Restore</button></a>";
      	echo "<a href='permanent.php?id=$productID'><button class='btn btn-danger'>Delete Permanently</button></a>";
        echo "</div>";
      	}
	}
	else{
    echo "No Deactivated Products";
	}

// onmouseleave='closeProductName()' onmouseenter='displayProductName()'
?>
     

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Customers</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      <?php
if($rowCustomer!=0){


echo '<table class="table table-bordered">';
echo '<tr><td>Id</td><td>Title</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Telephone</td></</tr>';


  while($rs=mysqli_fetch_assoc($query)){
    $id=$rs['CustomerID'];
    $fname=$rs['FirstName'];
    $lname=$rs['LastName'];
    $email=$rs['Email'];
    $phone=$rs['Telephone'];
    $title=$rs['TitleID'];

    echo "<tr><td>$id</td><td>$title</td><td>$fname</td><td>$lname</td><td>$email</td><td>$phone</td><td>
    <a href='restore.php?pid=$id'><button class='btn btn-success' title='Restore the customer'><i class='fa fa-plus'></i></button></a>
    
    <a href='permanent.php?pid=$id'><button class='btn btn-danger' title='Delete Permanently'><i class='fa fa-trash-o'></i></button></a>
    </td></tr>";

    
  }

}else{

  echo "There are no Deactivated Customers";
}

echo "</table>";
      ?></div>
    </div>
  </div>
</div>


<?php mysqli_close($con);?>



