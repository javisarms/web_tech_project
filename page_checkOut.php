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
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'>
				<form action="func_checkOut.php" method="POST">

					<!-- Buttons if delivery address and billing address exist -->
					<?php if () {?>

					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>