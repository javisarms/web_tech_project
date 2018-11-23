<?php
 require_once ('init.php');
 $object = new Order;
 $object->connect();
 $orders = $object->getArray('orders');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="../styles/styles.css">
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
			   <th>User ID</th>
			   <th>Type</th>
			   <th>Status</th>
			   <th>Amount</th>
			   <th>Billing ID</th>
			   <th>Delivery ID</th>
			   <th>Change type</th>
			 </tr>
			 <?php foreach ($orders as $order) {?>
			 	<?php $ourl = "../functions/admin_func_ChangeType.php?id=" . $order['id']; ?>
			   <tr>
			     <td>
			       <?php echo ($order['id']); ?>
			     </td>
			     <td>
			       <?php echo ($order['user_id']); ?>
			     </td>
			     <td>
			       <?php echo ($order['type']); ?>
			     </td>
			     <td>
			       <?php echo ($order['status']); ?>
			     </td>
			     <td>
			       <?php echo ($order['amount']); ?>
			     </td>
			     <td>
			     	<?php if ($order['billing_adress_id'] == null) {
			     		echo ('None');
			     	} else {
			     		echo ($order['billing_adress_id']);
			     	} ?>
			     </td>
			     <td>
			       <?php if ($order['delivery_adress_id'] == null) {
			     		echo ('None');
			     	} else {
			     		echo ($order['delivery_adress_id']);
			     	} ?>
			     </td>
			     <td>
			     	<form action="<?php echo ($ourl); ?>" method="POST">
			     		<input type="submit" value="Change" name="submit">
			     	</form>
			     </td>
		    	</tr>
		     <?php } ?>
			</table>
		</div>
	</div>
</body>
</html>