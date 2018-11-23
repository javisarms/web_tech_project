<?php
require_once ('init.php');
$email = $_SESSION['uemail'];
$object = new Product;
$object->connect();

if ($email == "admin@example.com") 
{
	if (isset($_POST['submit'])) 
	{
		$name = $_POST['name'];
		$description = $_POST['artist'];
		$price = $_POST['price'];
		$url = $_POST['i_url'];
		$r_id = $_POST['r_id'];

		if (empty($name) || empty($description) || empty($price) || empty($url) || empty($r_id)) 
		{
			header("Location: ../index.php?error=empty");
			exit();	
		}

		else
		{
			$write = "INSERT INTO products (name, description, unit_price, image_url, range_id) VALUES ('$name', '$description', '$price', '$url', '$r_id')";
			$st = $object->connect()->exec($write);
			header("Location: ../index.php?create=success");
			exit();	
		}
	}

	else
	{
		header("Location: ../index.php");
		exit();	
	}
}

else
{
	header("Location: ../index.php");
	exit();	
}