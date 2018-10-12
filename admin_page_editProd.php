<?php
require_once ('core/init.php');
$pid = $_GET['id'];
$object = new Product;
$object->connect();
$product = $object->getByID('products', $pid);

$pname = $product['name'];
$pdesc = $product['description'];
$pprice = $product['unit_price'];
$piurl = $product['image_url'];
$prid = $product['range_id'];

$purl = "admin_func_EditProd.php?id=" . $pid;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'>
				<form action="<?php echo ($purl) ?>" method="POST">
				  <h1>Edit product ID: <?php echo ($pid); ?></h1>
				  <p>Please fill out all fields</p>
				  <h3>Title:</h3>
				  <input type="text" name="name" placeholder="<?php echo ($pname) ?>"><br><br>
				  <h3>Artist:</h3>
				  <input type="text" name="artist" placeholder="<?php echo ($pdesc) ?>"> <br><br>
				  <h3>Price:</h3>
				  <input type="number" min="0" name="price" style="width: 1060px; height: 25px;" placeholder="<?php echo ($pprice) ?>"><br><br>
				  <h3>Image URL:</h3>
				  <input type="text" name="i_url" placeholder="<?php echo ($piurl) ?>"><br><br>
				  <h3>Range ID:</h3>
				  <input type="number" min="1" max="3" name="r_id" style="width: 1060px; height: 25px;" placeholder="<?php echo ($prid) ?>"><br><br><br>
				  <input type="submit" value="Edit" name="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>