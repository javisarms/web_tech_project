<?php
require_once ('core/init.php');
$object = new Product;
$object->connect();
$email = $_SESSION['uemail'];
$pid = $_GET['id'];

if ($email == "admin@example.com") 
{
	if (isset($_POST['submit'])) 
	{
		$object->delete($pid);
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