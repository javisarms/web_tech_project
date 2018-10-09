<?php
require_once ('core/init.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>New Product</title>
	<link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<form>
			  <h1>New Product</h1>
			  <h3>Name:</h3>
			  <input type="text" name="name"><br><br>
			  <h3>Description:</h3>
			  <input type="text" name="desc"><br><br><br>
			  <input type="submit" value="Create">
			  <a class="button" href="Products.html">Back</a>
			</form>
		</div>
	</div>
</body>
</html>