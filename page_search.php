<?php
require_once ('core/init.php');

$object = new Product;
$object->connect();
$search = $_POST['search'];
$products = $object->search($search);
 ?>

 <?php if(is_string($products)) {?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
 	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<div class="nav">
	    <a href="index.php">Home</a>
	    <a class="active" href="products.php">Products</a>
	    <a href="myCart.php">My Cart</a>
	    <a href="createAcc.php" style="float:right">Create Account</a>
	    <a href="logIn.php" style="float:right">Log-in</a>
	    <a href="addProd.php" style="float:right">Add Product</a>
  	</div>

	<div class="cont">
	  <form action="search.php" method="POST" style="padding-top: 5px; padding-left: 45px;">
	      <input type="text" name="search">
	      <input type="submit" value="Search" style="height: 25px; padding-top: 3px">
	  </form>

	  <h1 class = "first-word">The search garnered no results.</h1>
	</div>
</body>
</html>
 <?php } else{?>
 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title>Products</title>
 		<link rel="stylesheet" href="./styles/styles.css">
 	</head>
 	<body>
 		<div class="nav">
 	    <a href="index.php">Home</a>
 	    <a class="active" href="products.php">Products</a>
 	    <a href="myCart.php">My Cart</a>
 	    <a href="createAcc.php" style="float:right">Create Account</a>
 	    <a href="logIn.php" style="float:right">Log-in</a>
 	    <a href="addProd.php" style="float:right">Add Product</a>
 	  </div>

 	<div class="cont">
 	  <form action="search.php" method="POST" style="padding-top: 5px; padding-left: 45px;">
 	    <input type="text" name="search" placeholder="Search">
 	    <input type="submit" value="Search">
 	  </form>
 	  
 		<h1 class = "first-word">Search results:</h1>
 		<div class=".grid-container">
 	    <?php foreach ($products as $product) {?>
 	       <div class="col-4">
 	         <div class="product_img">
 	          <?php $p_url = "product.php?id=" . $product['id'];?>
 	         	<a href="<?php echo ($p_url)?>">
 	             <img style="width: 300px; height: 300px;" src="<?php echo ($product['image_url'])?>" href="Product.html">
 	         	</a>
 	             <br>
 	         </div>
 	         <p>
 	           <medium><?php echo ($product['name'])?></medium>
 	           <br>
 	           <small><?php echo ($product['description'])?></small>
 	           <br>
 	           <small id="price"><?php echo ($product['unit_price'])?>€</small>
 	         </p>
 	         <br>
 	       </div>
 	     <?php } ?>
 	   </div>
 	</div>
 		
 	</body>
 	</html>
 <?php } ?>