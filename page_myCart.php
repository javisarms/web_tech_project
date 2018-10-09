<?php
require_once ('core/init.php');
$object = new Orders;
$products = $object->connect()->getProducts($_SESSION['uid']); //returns all products the user has in cart
 ?>

<?php if(empty($orders) == true) {?>
//nothing in cart
<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
</head>
<body>
  <div class="cont">
    <h1 class = "first-word">Your cart is empty.</h1>
  </div>
</body>
</html>

<?php } else {?> 
//something in cart
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<div class="cont">
    <h1 class = "first-word">Your vinyl</h1>
    <div class=".grid-container">
      <?php foreach ($products as $product) {?>
         <div class="col-4">
           <div class="product_img">
            <?php $p_url = "product.php?id=" . $product['id'];?> //fix later, when clicked show the product with everything
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