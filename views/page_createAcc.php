<?php
require_once ('init.php');
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'>
				<form action="../functions/func_CreateAcc.php" method="POST">
				  <h1>Create Account</h1>
				  <h3>Email:</h3>
				  <input type="text" name="email"><br><br>
				  <h3>Username:</h3>
				  <input type="text" name="uname"><br><br>
				  <h3>Password:</h3>
				  <input type="password" name="pw"><br><br><br>
				  <input type="submit" value="Sign-up" name="submit">
				  <a class="button" href="Products.html">Back</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>