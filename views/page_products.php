<?php
require_once ('init.php');
$object = new Product;
$object->connect();
$products = $object->getArray('products');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<div class="cont">
  <form action="page_search.php" method="POST" style="padding-top: 5px; padding-left: 45px;">
    <input type="text" name="search">
    <input type="submit" value="Search" style="height: 25px; padding-top: 3px;">
  </form>
	<h1 class = "first-word">Vinyl for sale</h1>
	 <div class=".grid-container">
    <?php foreach ($products as $product) {?>
       <div class="col-4">
         <div class="product_img">
          <?php $p_url = "page_product.php?id=" . $product['id'];?>
         	<a href="<?php echo ($p_url)?>">
             <img style="width: 300px; height: 300px;" src="<?php echo ("../" . $product['image_url'])?>" href="Product.html">
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