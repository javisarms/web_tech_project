<?php 
require_once ('init.php');
$object = new User;
$object->connect();
$users = $object->getArray('users');

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$pw = $_POST['pw'];

	if(empty($email) || empty($uname) ||empty($pw))
	{
		header("Location: ../views/page_createAcc.php?signup=empty");
		exit();
	}

	else 
	{
		//If valid email

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			header("Location: ../views/page_createAcc.php?signup=email");
			exit();
		}

		else
		{
			//Check if email exists
			$emailcheck = true;
			foreach ($users as $use) 
			{
			    if ($email == $use['email']) 
			    {
			    	$emailcheck = false;
			    }
			}

			if ($emailcheck == true) 
			{
				//Check if username exists
				$unamecheck = true;
				foreach ($users as $use) 
				{
				    if ($uname == $use['username']) 
				    {
				    	$unamecheck = false;
				    }
				}

				if ($unamecheck == true) 
				{
					# Registration complete
					$_SESSION['uname'] = $uname;
					$_SESSION['uemail'] = $email;
					$write = "INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$pw')";
					$st = $object->connect()->exec($write);
					$user = $object->getByEmail($email);
					$_SESSION['uid'] = $user['id'];
					$_SESSION['ubadd'] = $user['billing_adress_id'];
					$_SESSION['udadd'] = $user['delivery_adress_id'];
					header("Location: ../views/page_products.php?signup=success");
					exit();
				}

				else
				{
					header("Location: ../views/page_createAcc.php?signup=username");
					exit();
				}
			}

			else
			{
				header("Location: ../views/page_createAcc.php?signup=email");
				exit();
			}

		}

	}
}

else
{
	header("Location: ../views/page_createAcc.php");
	exit();
}