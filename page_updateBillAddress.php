<?php
	require_once ('core/init.php');
	$object = new User;
	$object->connect();
	$user = $object->getByID('users', $_SESSION['uid']);
	$bAdd = null;
	$dAdd = null;

	if(empty($user['billing_adress_id'] ==  false))
	{
		$bAdd = $object->getByID('user_addresses', $user['billing_adress_id']);
	}

	if(empty($user['delivery_adress_id'] ==  false))
	{
		$dAdd = $object->getByID('user_addresses', $user['delivery_adress_id']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link rel="stylesheet" type="text/css" href="./styles/styles.css">
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
			<!-- Billing address -->
			<div class='col-12'>
				<?php if ($bAdd != null) {?>
					<form action="func_updateBillAddress.php" method="POST">
					  <h1>Billing address</h1>
					  <p>Please fill out all fields</p>
					  <h3>Name:</h3>
					  <input type="text" name="name" placeholder="<?php echo ($bAdd['human_name']) ?>"><br><br>
					  <h3>Address 1:</h3>
					  <input type="text" name="add1" placeholder="<?php echo ($bAdd['address_one']) ?>"> <br><br>
					  <h3>Address 2:</h3>
					  <input type="text" name="add2" placeholder="<?php echo ($bAdd['address_two']) ?>"><br><br>
					  <h3>Postal Code:</h3>
					  <input type="text" name="post" placeholder="<?php echo ($bAdd['postal_code']) ?>"><br><br>
					  <h3>City:</h3>
					  <input type="text" name="city" placeholder="<?php echo ($bAdd['city']) ?>"><br><br>
					  <h3>Country:</h3>
					  <input type="text" name="country" placeholder="<?php echo ($bAdd['country']) ?>"><br><br><br>
					  <input type="submit" value="Edit" name="submit">
					</form>
				<?php } else { ?>
					<form action="func_updateBillAddress.php" method="POST">
					  <h1>Billing address</h1>
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