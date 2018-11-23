<?php
require_once ('init.php');
$object = new Order;
$object->connect();
$orders = $object->getBilledByUserID($_SESSION['uid']); // returns an array of all billed orders
 ?>

 <?php if(empty($orders) == true) {?>
 <!DOCTYPE html>
 <html>
   <head>
     <title>Cart</title>
     <link rel="stylesheet" href="../styles/styles.css">
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
    <link rel="stylesheet" href="../styles/styles.css">
   </head>
 <body>
  <div class="cont">
     <h1 class = "first-word">Your orders</h1>
     <div class=".grid-container">
       <?php foreach ($orders as $order) {?>
        <?php $bAdd = $object->getByID('order_addresses', $order['billing_adress_id']) ?>
        <?php $dAdd = $object->getByID('order_addresses', $order['delivery_adress_id'])?>
        <div class = "row">
          <h3 style="padding-left: 55px;">Order ID: <?php echo ($order['id'])?> | Status: <?php echo ($order['status'])?> | Amount: <?php echo ($order['amount'])?>€</h3>

          <!-- Delivery add -->
          <div style="padding-left: 55px;">
            <?php if (empty($dAdd['address_two']) == false) { ?>
              <p><b>Delivery address:</b> <?php echo ($dAdd['human_name'])?>, <?php echo ($dAdd['address_one'])?>, <?php echo ($dAdd['address_two'])?>, <?php echo ($dAdd['postal_code']) ?>, <?php echo ($dAdd['city']) ?>, <?php echo ($dAdd['country']) ?>
              </p>
            <?php } else {?>
              <p><b>Delivery address:</b> <?php echo ($dAdd['human_name'])?>, <?php echo ($dAdd['address_one'])?>, <?php echo ($dAdd['postal_code']) ?>, <?php echo ($dAdd['city']) ?>, <?php echo ($dAdd['country']) ?>
            <?php } ?>
          </div>

          <!-- Billing Address: -->
          <div style="padding-left: 55px;">
            <?php if (empty($dAdd['address_two']) == false) { ?>
              <p><b>Billing address:</b> <?php echo ($dAdd['human_name'])?>, <?php echo ($dAdd['address_one'])?>, <?php echo ($dAdd['address_two'])?>, <?php echo ($dAdd['postal_code']) ?>, <?php echo ($dAdd['city']) ?>, <?php echo ($dAdd['country']) ?>
              </p>
            <?php } else {?>
              <p><b>Billing address:</b> <?php echo ($bAdd['human_name'])?>, <?php echo ($bAdd['address_one'])?>, <?php echo ($bAdd['postal_code']) ?>, <?php echo ($bAdd['city']) ?>, <?php echo ($bAdd['country']) ?>
            <?php } ?>
          </div>

          <!-- Products info -->
          <?php  $products = $object->getProductsByOrderID($order['id']); ?>
          <?php  foreach($products as $product) {?>
            <?php $p_order = $object->getPOrderfromPIDPOID($product['id'],$order['id']); ?>
            <div class="col-4">
              <div class="product_img">
               <?php $p_url = "page_product.php?id=" . $product['id'];?>
               <a href="<?php echo ($p_url)?>">
                  <img style="width: 300px; height: 300px;" src="<?php echo ("../" . $product['image_url'])?>" href="Product.html">
               </a>
                  <br>
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