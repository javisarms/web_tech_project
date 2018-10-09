<?php

class Order extends DB 
{
	public function getByUserID($uid)
	{
		$query = "SELECT * FROM users WHERE user_id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$email]);

		$arr = array();

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				array_push($arr, $row);
			}
		}

		return $arr;
	}

	public function getProducts($uid)
	{
		$orders = getByUserID($uid);
		$arr = array();

		foreach ($orders as $order) 
		{
			$oid = $order['id'];
			$product = $this->connect()->getProductByOrderID($oid);
			array_push($arr, $product);
		}

		return $arr;
	}

	public function getProductByOrderID($oid)
	{
		$query = "SELECT * FROM order_products WHERE order_id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$oid]);

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				$pid = $row['product_id'];
				$product = $this->connect()->getByID('products', $pid);
				return $product;
			}
		}
	}
}