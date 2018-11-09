<?php
require_once ('core/init.php');
$object = new Order;
$object->connect();
$uid = $_SESSION['uid'];
$user = $object->getByID('users', $uid);
$order = $object->getCurrentCart($uid);
$oid = $order['id'];

if(isset($_POST['submit'])) {
	$bname;
	$badd1;
	$badd2;
	$bpost;
	$bcity;
	$bcountry;

	$dname;
	$dadd1;
	$dadd2;
	$dpost;
	$dcity;
	$dcountry;

	//If user clicked on 'use billing address'
	if (isset($_POST['ubad'])) {
		$bdid = $user['billing_adress_id'];
		$ub = $object->getByID('user_addresses',$bdid);
		$bname = $ub['human_name'];
		$badd1 = $ub['address_one'];
		$badd2 = $ub['address_two'];
		$bpost = $ub['postal_code'];
		$bcity = $ub['city'];
		$bcountry = $ub['country'];
	}

	else {
		$bname = $_POST['bname'];
		$badd1 = $_POST['badd1'];
		$badd2 = $_POST['badd2'];
		$bpost = $_POST['bpost'];
		$bcity = $_POST['bcity'];
		$bcountry = $_POST['bcountry'];
	}

	//If user clicked on 'use del add'
	if (isset($_POST['udad'])) {
		$ddid = $user['delivery_adress_id'];
		$ud = $object->getByID('user_addresses',$ddid);
		$dname = $ud['human_name'];
		$dadd1 = $ud['address_one'];
		$dadd2 = $ud['address_two'];
		$dpost = $ud['postal_code'];
		$dcity = $ud['city'];
		$dcountry = $ud['country'];
	}

	else {
		$dname = $_POST['dname'];
		$dadd1 = $_POST['dadd1'];
		$dadd2 = $_POST['dadd2'];
		$dpost = $_POST['dpost'];
		$dcity = $_POST['dcity'];
		$dcountry = $_POST['dcountry'];
	}

	//Write addresses into the tables

	//Write billing address
	$write = "INSERT INTO order_addresses (human_name, address_one, address_two, postal_code, city, country) 
	VALUES ('$bname', '$badd1', '$badd2', '$bpost', '$bcity', '$bcountry')";
	$st = $object->connect()->exec($write);
	$writtenBADD = $object->getLast('order_addresses');
	$futBID = $writtenBADD['id'];

	//Update order billing id
	$object->updateBillingAd($oid, $futBID);

	if (isset($_POST['same'])) {
		$object->updateDeliveryAd($oid, $futBID);
	}

	else {
		//Write delivery into tables
		$write = "INSERT INTO order_addresses (human_name, address_one, address_two, postal_code, city, country) 
		VALUES ('$dname', '$dadd1', '$dadd2', '$dpost', '$dcity', '$dcountry')";
		$st = $object->connect()->exec($write);
		$writtenDADD = $object->getLast('order_addresses');
		$futDID = $writtenDADD['id'];
		$object->updateDeliveryAd($oid, $futDID);
	}

	//Finally change status of order
	$object->checkOutType($oid);
	$object->checkOutStatus($oid);

	header("Location: page_myOrders.php?updateAdd=success");
	exit();	

}