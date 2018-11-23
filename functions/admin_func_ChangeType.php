<?php
require_once ('init.php');
$object = new Order;
$object->connect();
$email = $_SESSION['uemail'];
$oid = $_GET['id'];
$order = $object->getByID('orders', $oid);


if ($email == "admin@example.com") 
{
	if (isset($_POST['submit'])) 
	{
		if ($order['status'] == "CART") {
			$object->checkOutType($oid);
		}

		else {
			$object->checkOutTypeCart($oid);
		}
		
		header("Location: ../views/admin_page_orders.php");
	}

	else
	{
		header("Location: ../views/admin_page_orders.php?error=access");
		exit();	
	}
}

else
{
	header("Location: ../views/admin_page_orders.php?error=access");
	exit();	
}