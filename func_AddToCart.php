<?php
require_once ('core/init.php');
$object = new Order;
$object->connect();
$uid = $_SESSION['uid'];
$order = $object->getCurrentCart($uid);

$pid = $_GET['id'];
$product = $object->getByID('products', $pid);
$price = $product['unit_price'];

if(isset($_POST['submit']))
{
	$quantity = $_POST['quantity'];

	if(empty($quantity))
	{
		header("Location: page_products.php?error=quant");
		exit();	
	}

	else
	{
		if ($order == null) //if user has no cart orders make a new one
		{
			$amount = $price * $quantity;

			//write new order
			$write = "INSERT INTO orders (user_id, type, status, amount) VALUES ('$uid', 'CART', 'CART', '$amount')";
			$st = $object->connect()->exec($write);

			//add product to product_orders
			$order = $object->getCurrentCart($uid);
			$oid = $order['id'];
			$write = "INSERT INTO order_products (order_id, product_id, quantity, unit_price) VALUES ('$oid', '$pid', '$quantity', '$price')";
			$st = $object->connect()->exec($write);
			header("Location: page_myCart.php?cart=success");
			exit();
		}

		else //add products to existing order number
		{	
			//update the amount of the cart
			$oid = $order['id'];
			$amount = $order['amount'];
			$amount += $price * $quantity;
			$object->updateAmount($oid, $amount);

			//add product to product_orders
			$write = "INSERT INTO order_products (order_id, product_id, quantity, unit_price) VALUES ('$oid', '$pid', '$quantity', '$price')";
			$st = $object->connect()->exec($write);
			header("Location: page_myCart.php?cart=success");
			exit();
		}
	}
}

else
{
	header("Location: page_products.php");
	exit();	
}