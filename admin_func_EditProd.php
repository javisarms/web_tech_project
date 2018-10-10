<?php
require_once ('core/init.php');
$email = $_SESSION['uemail'];
$object = new Product;
$object->connect();
$id = $_GET['id'];

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
			header("Location: index.php?error=empty");
			exit();	
		}

		else
		{
			$object->updateProd($id, $name, $description, $price, $url, $r_id);
			header("Location: index.php?edit=success");
			exit();	
		}
	}

	else
	{
		header("Location: index.php");
		exit();	
	}
}

else
{
	header("Location: index.php");
	exit();	
}