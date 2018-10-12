<?php 
require_once ('core/init.php');
$object = new User;

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$pw = $_POST['pw'];

	if(empty($email) || empty($uname) ||empty($pw))
	{
		header("Location: page_createAcc.php?signup=empty");
		exit();
	}

	else 
	{
		//If valid email

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			header("Location: page_createAcc.php?signup=email");
			exit();
		}

		else
		{
			$user = object->getByID($email);
			$_SESSION['uname'] = $uname;
			$_SESSION['uemail'] = $email;
			$_SESSION['uid'] = $user['id'];
			$write = "INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$pw')";
			$st = $object->connect()->exec($write);
			header("Location: page_products.php?signup=success");
			exit();
		}

	}
}

else
{
	header("Location: page_createAcc.php");
	exit();
}