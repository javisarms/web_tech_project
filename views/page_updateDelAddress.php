<?php
	require_once ('init.php');
	$object = new User;
	$object->connect();
	$user = $object->getByID('users', $_SESSION['uid']);
	$bAdd = null;
	$dAdd = null;

	if(empty($user['delivery_adress_id'] ==  false))
	{
		$dAdd = $object->getByID('user_addresses', $user['delivery_adress_id']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<style type="text/css">
		input[type=text] 
		{
		    width: 90%;
		    height: 25px;
		}
	</style>
</head>
<body>
	<div class="form">
		<div class = "cont">
			<!-- Delivery address -->
			<div class="col-12">
				<?php if ($dAdd != null) {?>
					<form action="../functions/func_updateDelAddress.php" method="POST">
					  <h1>Delivery address</h1>
					  <p>Please fill out all fields</p>
					  <h3>Name:</h3>
					  <input type="text" name="name" placeholder="<?php echo ($dAdd['human_name']) ?>"><br><br>
					  <h3>Address 1:</h3>
					  <input type="text" name="add1" placeholder="<?php echo ($dAdd['address_one']) ?>"> <br><br>
					  <h3>Address 2:</h3>
					  <input type="text" name="add2" placeholder="<?php echo ($dAdd['address_two']) ?>"><br><br>
					  <h3>Postal Code:</h3>
					  <input type="text" name="post" placeholder="<?php echo ($dAdd['postal_code']) ?>"><br><br>
					  <h3>City:</h3>
					  <input type="text" name="city" placeholder="<?php echo ($dAdd['city']) ?>"><br><br>
					  <h3>Country:</h3>
					  <input type="text" name="country" placeholder="<?php echo ($dAdd['country']) ?>"><br><br><br>
					  <input type="submit" value="Edit" name="submit">
					</form>
				<?php } else { ?>
					<form action="../functions/func_updateDelAddress.php" method="POST">
					  <h1>Delivery address</h1>
					  <p>Please fill out all fields</p>
					  <h3>Name:</h3>
					  <input type="text" name="name"><br><br>
					  <h3>Address 1:</h3>
					  <input type="text" name="add1"> <br><br>
					  <h3>Address 2:</h3>
					  <input type="text" name="add2"><br><br>
					  <h3>Postal Code:</h3>
					  <input type="text" name="post"><br><br>
					  <h3>City:</h3>
					  <input type="text" name="city"><br><br>
					  <h3>Country:</h3>
					  <input type="text" name="country"><br><br><br>
					  <input type="submit" value="Edit" name="submit">
					</form>
				<?php } ?>
			</div>
		</div>
		<br><br>
	</div>
</body>
</html>