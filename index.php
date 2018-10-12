<?php
require_once ('core/init.php');
$email = $_SESSION['uemail'];

if($email == "admin@example.com") {
	$object = new Product;
	$object->connect();
	$products = $object->getArray('products');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="./styles/styles.css">
	<style type="text/css">
		table, th, td 
		{
		    border: 1px solid black;
		    border-collapse: collapse;
		    padding: 7px;
		}

		.center 
		{
		    margin: auto;
		    width: 50%;
		    padding: 10px;
		}
	</style>
</head>
<body>
	<div class = "cont">
		<div class = "center">
			<h1>Product overview</h1>
			<table>
			 <tr>
			   <th>ID</th>
			   <th>Title</th>
			   <th>Artist</th>
			   <th>Price</th>
			   <th>Image URL</th>
			   <th> </th>
			   <th> </th>
			 </tr>
			 <?php foreach ($products as $product) {?>
			 	<?php $purl = "admin_func_DeleteProd.php?id=" . $product['id']; ?>
			 	<?php $eurl = "admin_page_editProd.php?id=" . $product['id']; ?>
			   <tr>
			     <td>
			       <?php echo ($product['id']); ?>
			     </td>
			     <td>
			       <?php echo ($product['name']); ?>
			     </td>
			     <td>
			       <?php echo ($product['description']); ?>
			     </td>
			     <td>
			       <?php echo ($product['unit_price']); ?>
			     </td>
			     <td>
			       <?php echo ($product['image_url']); ?>
			     </td>
			     <td>
			     	<a href="<?php echo ($eurl) ?>" class = "button">Edit</a>
			     </td>
			     <td>
			     	<form action="<?php echo ($purl); ?>" method="POST">
			     		<input type="submit" value="Delete" name="submit" style="border-color: #da3749; background-color: #da3749;">
			     	</form>
			     </td>
		    	</tr>
		     <?php } ?>
			</table>
		</div>
	</div>
</body>
</html>

<?php } else {?>

<!DOCTYPE html>
<html>
<head>
	<title>Noel's Vinyls</title>
	<link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
	<img class="banner" src="https://i.imgur.com/pPkMJAZ.jpg">
</body>
</html>

<?php } ?>