<?php 
require_once ('../core/init.php');

$object = new User;
if(isset($_POST['submit']))
{
	//protects from malicious injections
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pw = mysqli_real_escape_string($conn, $_POST['pw']);

	//Validation
	if(empty($email) || empty($pw))
	{
		header("Location: ../logIn.php?login=empty");
		exit();
	}

	else
	{
		$query = "SELECT * FROM users WHERE email='$email'";
		$st = $object->connect()->query($query);

		if ($st->rowCount())
		{
			if ($row = $st->fetch()) 
			{
				//Dehashing pw
				$hashedPWC = password_verify($pwd, $row['password']);

				if($hashedPWC == true)
				{
					//Succesful log-in
					$_SESSION['uid'] = $row['id'];
					$_SESSION['uname'] = $row['username'];
					$_SESSION['uemail'] = $row['email'];
					$_SESSION['ubadd'] = $row['billing_adress_id'];
					$_SESSION['udadd'] = $row['delivery_adress_id'];
					header("Location: ../products.php?login=success");
					exit();

				}

				elseif($hashedPWC == false)
				{
					header("Location: ../logIn.php?login=error");
					exit();
				}
			}
		}

		else
		{
			header("Location: ../logIn.php?login=error");
			exit();
		}
	}

	{
		header("Location: ../logIn.php?login=error");
		exit();
	}
}