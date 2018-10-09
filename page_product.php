<?php 
	require_once ('core/init.php');
	$id = $_GET['id'];
	$object = new User;
	$object->connect();
	$product = $object->getByID('products',$id);
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
	  			<a href="" class="button">Add to cart</a>
	  			<br>
	  		</div>
	  	</div>	
	  </div>
	
</body>
</html>
