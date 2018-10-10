<?php
require_once ('core/init.php');
$object = new Order;
$object->connect();
$orders = $object->getCartByUserID($_SESSION['uid']); // returns an array of all orders
 ?>

 <?php if(empty($orders) == true) {?>
 <!-- nothing in cart-->
 <!DOCTYPE html>
 <html>
   <head>
     <title>Cart</title>
     <link rel="stylesheet" href="./styles/styles.css">
   </head>
 <body>
   <div class="cont">
     <h1 class = "first-word">Your cart is empty.</h1>
   </div>
 </body>
 </html>

 <?php } else if(empty($orders) == false) {?> 
 <!-- //something in cart-->
 <!DOCTYPE html>
 <html>
   <head>
    <title>Cart</title>
    <link rel="stylesheet" href="./styles/styles.css">
   </head>
 <body>
  <div class="cont">
     <h1 class = "first-word">Your cart</h1>
     <div class=".grid-container">
       <?php foreach ($orders as $order) {?>
        <div class = "row">
          <h3 style="padding-left: 55px;">Total Amount: <?php echo ($order['amount'])?>€</h3>
          <?php  $products = $object->getProductsByOrderID($order['id']); ?>
          <?php  foreach($products as $product) {?>
            <?php $p_order = $object->getPOrderfromPIDPOID($product['id'],$order['id']); ?>
            <div class="col-4">
              <div class="product_img"> <!-- should also show quantity -->
               <?php $p_url = "page_product.php?id=" . $product['id'];?>
               <a href="<?php echo ($p_url)?>">
                  <img style="width: 300px; height: 300px;" src="<?php echo ($product['image_url'])?>" href="Product.html">
               </a>
              </div>
              <p>
                <medium><?php echo ($product['name'])?></medium> <br>
                <small><?php echo ($product['unit_price'])?>€ | </small>
                <small>Quantity: <?php echo ($p_order['quantity'])?></small>
                <br>
              </p>
              <br>
            </div>
          <?php } ?>
        </div>
       <?php } ?>
    </div>
   </div>
 </body>
 </html>

 <?php } ?>