<?php
require_once ('init.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>New Product</title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'>
				<form action="../functions/admin_func_AddProduct.php" method="POST">
				  <h1>Add product</h1>
				  <h3>Title:</h3>
				  <input type="text" name="name" placeholder="Album (Year)"><br><br>
				  <h3>Artist:</h3>
				  <input type="text" name="artist"><br><br>
				  <h3>Price:</h3>
				  <input type="number" min="0" name="price" style="width: 1060px; height: 25px;"><br><br>
				  <h3>Image URL:</h3>
				  <input type="text" name="i_url"><br><br>
				  <h3>Range ID:</h3>
				  <input type="number" min="1" max="3" name="r_id" style="width: 1060px; height: 25px;"><br><br><br>
				  <input type="submit" value="Create" name="submit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>