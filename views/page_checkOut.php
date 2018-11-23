  <?php
require_once ('init.php');
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
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
	<style>
		input[type=text] 
		{
		    width: 80%;
		    height: 25px;
		}

		.but {
			margin-left: 55px;
		}

		.cont {
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'>
				<h1 class = "first-word">Checkout</h1>
				<form action="../functions/func_CheckOut.php" method="POST">
					<div class="but">
						<!-- Buttons if delivery address and billing address exist -->
						<?php if (empty($user['billing_adress_id'] ==  false)) {?>
							<input type="checkbox" name="ubad" onclick="hide('billing')"> Use your account's billing address 
						<?php } ?>
						<?php if (empty($user['delivery_adress_id'] ==  false)) {?>
							<input type="checkbox" name="udad" onclick="hide('delivery')"> Use your account's delivery address <br>
						<?php } ?>
					</div>

					<!-- Billing -->
					<div id="billing" class="col-6">
						<h1>Billing address</h1>
						<h5>Please fill out all fields</h5>
						<h3>Name:</h3>
						<input type="text" name="bname"><br><br>
						<h3>Address 1:</h3>
						<input type="text" name="badd1"> <br><br>
						<h3>Address 2:</h3>
						<input type="text" name="badd2"><br><br>
						<h3>Postal Code:</h3>
						<input type="text" name="bpost"><br><br>
						<h3>City:</h3>
						<input type="text" name="bcity"><br><br>
						<h3>Country:</h3>
						<input type="text" name="bcountry"><br><br><br>
					</div>
					

					<!-- Delivery -->
					<div id="delivery" class="col-6">
						<h1>Delivery address</h1>
						<h5>Please fill out all fields</h5>
						<input type="checkbox" name="same" onclick="hide('del2')"> Use billing address as delivery address
						<div id="del2">
							<h3>Name:</h3>
							<input type="text" name="dname"><br><br>
							<h3>Address 1:</h3>
							<input type="text" name="dadd1"> <br><br>
							<h3>Address 2:</h3>
							<input type="text" name="dadd2"><br><br>
							<h3>Postal Code:</h3>
							<input type="text" name="dpost"><br><br>
							<h3>City:</h3>
							<input type="text" name="dcity"><br><br>
							<h3>Country:</h3>
							<input type="text" name="dcountry"><br><br><br>
						</div>
					</div>
					<br><br>
					<center><input type="submit" value="Checkout" name="submit"></center>
					
				</form>
			</div>
		</div>
	</div>

	<script>
		function hide(id) {
		    var x = document.getElementById(id);
		    if (x.style.display === "none") {
		        x.style.display = "block";
		    } else {
		        x.style.display = "none";
		    }
		}
	</script>
</body>
</html>