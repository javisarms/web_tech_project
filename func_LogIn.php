<?php 
require_once ('core/init.php');
$object = new User;

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$pw = $_POST['pw'];

	//Validation if empty
	if(empty($email) || empty($pw))
	{
		header("Location: page_logIn.php?login=empty");
		exit();
	}

	else
	{
		$query = "SELECT * FROM users WHERE email='$email'";
		$st = $object->connect()->query($query);

		if ($st->rowCount()) //If email query returned anything
		{
			if ($row = $st->fetch()) 
			{
				//Dehashing pw
				$PWC = password_verify($pw, $row['password']); //verifies password, returns boolean

				if($PWC == false)
				{
					//Succesful log-in
					$_SESSION['uid'] = $row['id'];
					$_SESSION['uname'] = $row['username'];
					$_SESSION['uemail'] = $row['email'];
					$_SESSION['ubadd'] = $row['billing_adress_id'];
					$_SESSION['udadd'] = $row['delivery_adress_id'];
					header("Location: page_products.php?login=success");
					exit();

				}

				elseif($PWC == true)
				{
					header("Location: page_logIn.php?login=error");
					exit();
				}
			}
		}

		else
		{
			header("Location: page_logIn.php?login=error");
			exit();
		}
	}
}