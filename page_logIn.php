  <?php
require_once ('core/init.php');
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
	<div class="form">
		<div class = "cont">
			<div class='col-12'> 
				<form action="func_LogIn.php" method="POST">
				  <h1>Log-in</h1>
				  <h3>Email:</h3>
				  <input type="text" name="email"><br><br>
				  <h3>Password:</h3>
				  <input type="password" name="pw"><br><br><br>
				  <input type="submit" value="Log-in" name="submit">
				  <a class="button" href="page_products.html">Back</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>