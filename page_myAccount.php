<?php
	require_once ('core/init.php');
	$object = new User;
	$object->connect();
	$user = $object->getByID('users', $_SESSION['uid']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
</head>
<body>
	<div class="cont">
		<div class="row">
			<h1 class="first-word">My Account</h1>
			<div class="col-6">
				<h1>Username: <?php echo ($user['username']) ?></h1>
				<h1>Email: <?php echo ($user['email']) ?></h1> <br><br>
				<img src="Albums/disc.png" style="width: 350px; height: 350px">
			</div>
			<div class="col-6">
				<?php if (empty($user['billing_adress_id']) && empty($user['delivery_adress_id'])) { ?>
					<h3>You have not added any addresses.</h3>
					<br>
					<a href="page_updateDelAddress.php" class="button">Update Delivery Address</a>
					<a href="page_updateBillAddress.php" class="button">Update Billing Address</a>
				<?php } else if (empty($user['delivery_adress_id']) && empty($user['billing_adress_id']) == false) { ?>
					<?php $bAdd =  $object->getByID('user_addresses', $user['billing_adress_id'])?>
					<h3>Billing Address:</h3>
					<div style="padding-left: 20px;">
						<p>Name: <?php echo ($bAdd['human_name']) ?></p>
						<p>Address 1: <?php echo ($bAdd['address_one']) ?></p>
						<?php if (empty($bAdd['address_two']) == false) { ?>
							<p>Address 2: <?php echo ($bAdd['address_two']) ?></p>
						<?php } ?>
						<p>Postal Code: <?php echo ($bAdd['postal_code']) ?></p>
						<p>City: <?php echo ($bAdd['city']) ?></p>
						<p>Country: <?php echo ($bAdd['country']) ?></p>
						<h3>You have not added a delivery address.</h3>
					</div>
					<br>
					<a href="page_updateDelAddress.php" class="button">Update Delivery Address</a>
				<?php } else if (empty($user['billing_adress_id']) && empty($user['delivery_adress_id']) == false) {?>
					<?php $dAdd = $object->getByID('user_addresses', $user['delivery_adress_id']) ?>
					<h3>Delivery Address:</h3>
					<div style="padding-left: 20px;">
						<p>Name: <?php echo ($dAdd['human_name']) ?></p>
						<p>Address 1: <?php echo ($dAdd['address_one']) ?></p>
						<?php if (empty($dAdd['address_two']) == false) { ?>
							<p>Address 2: <?php echo ($dAdd['address_two']) ?></p>
						<?php } ?>
						<p>Postal Code: <?php echo ($dAdd['postal_code']) ?></p>
						<p>City: <?php echo ($dAdd['city']) ?></p>
						<p>Country: <?php echo ($dAdd['country']) ?></p>
						<h3>You have not added a billing address.</h3>
					</div>
					<br>
					<a href="page_updateBillAddress.php" class="button">Update Billing Address</a>
				<?php } else { ?>
					<?php $bAdd =  $object->getByID('user_addresses', $user['billing_adress_id'])?>
					<h3>Billing Address:</h3>
					<div style="padding-left: 20px;">
						<p>Name: <?php echo ($bAdd['human_name']) ?></p>
						<p>Address 1: <?php echo ($bAdd['address_one']) ?></p>
						<?php if (empty($bAdd['address_two']) == false) { ?>
							<p>Address 2: <?php echo ($bAdd['address_two']) ?></p>
						<?php } ?>
						<p>Postal Code: <?php echo ($bAdd['postal_code']) ?></p>
						<p>City: <?php echo ($bAdd['city']) ?></p>
						<p>Country: <?php echo ($bAdd['country']) ?></p>
					</div>
					<br>
					<?php $dAdd = $object->getByID('user_addresses', $user['delivery_adress_id']) ?>
					<h3>Delivery Address:</h3>
					<div style="padding-left: 20px;">
						<p>Name: <?php echo ($dAdd['human_name']) ?></p>
						<p>Address 1: <?php echo ($dAdd['address_one']) ?></p>
						<?php if (empty($dAdd['address_two']) == false) { ?>
							<p>Address 2: <?php echo ($dAdd['address_two']) ?></p>
						<?php } ?>
						<p>Postal Code: <?php echo ($dAdd['postal_code']) ?></p>
						<p>City: <?php echo ($dAdd['city']) ?></p>
						<p>Country: <?php echo ($dAdd['country']) ?></p>
					</div>
					<br>
					<a href="page_updateDelAddress.php" class="button">Update Delivery Address</a>
					<a href="page_updateBillAddress.php" class="button">Update Billing Address</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<br><br>
</body>
</html>