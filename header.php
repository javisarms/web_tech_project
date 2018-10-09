<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php if (empty($_SESSION['uemail']) == false){?>
		<div class="nav">
		  <a href="index.php">Home</a>
		  <a href="page_products.php">Products</a>
		  <a href="page_myCart.php">My Cart</a>
		  <a href="page_myOrders.php">My Orders</a>
		  <a href="page_addProd.php" style="float:right">Add Product</a>
		  <a href="#" style="float:right">My Account</a>
		  <a href="func_LogOut.php" style="float:right">Logout</a>
		</div>
	<?php } else if (empty($_SESSION['uemail']) == true) {?>
		<div class="nav">
		  <a href="index.php">Home</a>
		  <a href="page_products.php">Products</a>
		  <a href="page_createAcc.php" style="float:right">Sign-up</a>
		  <a href="page_logIn.php" style="float:right">Log-in</a>
		</div>
	<?php } ?>

</body>
</html>