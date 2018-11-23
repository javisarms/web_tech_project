<?php 
require_once ('init.php');
$object = new User;
$object->connect();
$uid = $_SESSION['uid'];

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$post = $_POST['post'];
	$city = $_POST['city'];
	$country = $_POST['country'];

	//Validation if empty
	if(empty($name) || empty($add1) || empty($post) || empty($city) || empty($country))
	{
		header("Location: ../views/page_updateDelAddress.php?updateAdd=empty");
		exit();
	}

	else
	{
		//Add to user_address first

		//If add2 is empty
		if(empty($add2))
		{
			$write = "INSERT INTO user_addresses (human_name, address_one, address_two, postal_code, city, country) 
			VALUES ('$name', '$add1', '$add2', '$post', '$city', '$country')";
			$st = $object->connect()->exec($write);
		}

		else
		{
			$write = "INSERT INTO user_addresses (human_name, address_one, postal_code, city, country) 
			VALUES ('$name', '$add1', '$post', '$city', '$country')";
			$st = $object->connect()->exec($write);
		}

		//Then update user address
		$add = $object->getLast('user_addresses'); //gets the row just inserted above
		$did = $add['id'];
		$object->updateDelAddress($did, $uid);

		header("Location: ../views/page_myAccount.php?updateAdd=success");
		exit();	

	}
}

else
{
	header("Location: ../views/page_updateDelAddress.php?updateAdd=error");
	exit();	
}