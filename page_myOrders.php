<?php
require_once ('core/init.php');
$object = new Order;
$object->connect();
$orders = $object->getBilledByUserID($_SESSION['uid']); // returns an array of all orders
 ?>

 <?php if(empty($orders) == true) {?>
 <!DOCTYPE html>
 <html>
   <head>
     <title>Cart</title>
     <link rel="stylesheet" href="./styles/styles.css">
   </head>
 <body>
   <div class="cont">
     <h1 class = "first-word">Your do not have any billed orders.</h1>
   </div>
 </body>
 </html>

 <?php } else if(empty($orders) == false) {?> 
 <!DOCTYPE html>
 <html>
   <head>
    <title>Cart</title>
    <link rel="stylesheet" href="./styles/styles.css">
   </head>
 <body>
  <div class="cont">
     <h1 class = "first-word">Your billed orders</h1>
     <div class=".grid-container">
       <?php foreach ($orders as $order) {?>
        <div class = "row">
          <h3 style="padding-left: 55px;">Order ID: <?php echo ($order['id'])?> | Status: <?php echo ($order['status'])?> | Amount: <?php echo ($order['amount'])?>€</h3>
          <?php  $products = $object->getProductsByOrderID($order['id']); ?>
          <?php  foreach($products as $product) {?>
            <div class="col-4">
              <div class="product_img">
               <?php $p_url = "page_product.php?id=" . $product['id'];?>
               <a href="<?php echo ($p_url)?>">
                  <img style="width: 300px; height: 300px;" src="<?php echo ($product['image_url'])?>" href="Product.html">
               </a>
                  <br>
              </div>
              <p>
                <medium><?php echo ($product['name'])?></medium>
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