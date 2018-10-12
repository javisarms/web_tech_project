<?php 
	require_once ('core/init.php');
	$id = $_GET['id'];
	$object = new User;
	$object->connect();
	$product = $object->getByID('products',$id);
	$c_url = "func_AddToCart.php?id=" . $id;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Culture</title>
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	  <div class = "cont">
	  	<div class="row">
	  		<div class="col-6">
	           <img style="width: 500px; height: 500px;" src="<?php echo ($product['image_url'])?>">
	           <br>
	  		</div>
	  		<div class="col-6">
	  			<h1>
	  			    <?php echo ($product['name'])?>
	  			</h1>
	  			<h3>
	  				<?php echo ($product['description'])?> | Price: <?php echo ($product['unit_price'])?>€
	  			</h3>
	  			<br>
	  			<?php if (empty($_SESSION['uemail']) == true) { ?>

	  			<?php } else {?>
	  			<form action="<?php echo ($c_url)?>" method="POST">
	  				<p>Quantity:</p>
	  				<input type="number" min="0" step="1" name="quantity"><br><br><br>
	  				<input type="submit" value="Add to cart" name="submit">
	  			</form>
	  			<?php } ?>
	  			<br>
	  		</div>
	  	</div>	
	  </div>
	
</body>
</html>
