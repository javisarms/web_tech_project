<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<?php if (empty($_SESSION['uemail']) == false){?>
		<?php if ($_SESSION['uemail'] == "admin@example.com") {?>
			<div class="nav">
			  <a href="index.php">Home</a>
			  <a href="admin_page_addProd.php">Add Product</a>
			  <a href="func_LogOut.php" style="float:right">Logout</a>
			</div>
		<?php } else { ?>
			<div class="nav">
			  <a href="index.php">Home</a>
			  <a href="page_products.php">Products</a>
			  <a href="page_myCart.php">My Cart</a>
			  <a href="page_myOrders.php">My Orders</a>
			  <a href="func_LogOut.php" style="float:right">Logout</a>
			  <a href="#" style="float:right">My Account</a>
			</div>
		<?php } ?>
		
	<?php } else if (empty($_SESSION['uemail']) == true) {?>
		<div class="nav">
		  <a href="index.php">Home</a>
		  <a href="page_products.php">Products</a>
		  <a href="page_createAcc.php" style="float:right">Sign up</a>
		  <a href="page_logIn.php" style="float:right">Login</a>
		</div>
	<?php } ?>

</body>
</html>