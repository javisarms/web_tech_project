<?php

class Order extends DB 
{
	public function getCartByUserID($uid)
	{
		$query = "SELECT * FROM orders WHERE user_id=? AND status=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$uid, 'CART']);

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

	public function getBilledByUserID($uid)
	{
		$query = "SELECT * FROM orders WHERE user_id=? AND status=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$uid, 'BILLED']);

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

	public function getProductsByOrderID($oid)
	{
		$query = "SELECT * FROM order_products WHERE order_id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$oid]);

		$arr = array();

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				$pid = $row['product_id'];
				$product = $this->getByID('products', $pid);
				array_push($arr, $product);
			}
		}

		return $arr;
	}

	//individual items

	public function getOrderIDfromPID($pid)
	{
		$query = "SELECT * FROM order_products WHERE product_id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$pid]);

		$arr = array();

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				$oid = $row['order_id'];
				array_push($arr, $oid);
			}
		}

		return $arr;
	}

	public function getOrdersBasedOnProd($arrid, $uid) //Get each order based on the order ids provided on the method above and double check with the user's id
	{
		$arr = array();

		foreach ($arrid as $oid) 
		{
			$query = "SELECT * FROM orders WHERE id=? AND user_id=?";
			$st = $this->connect()->prepare($query);
			$st->execute([$oid, $uid]);

			if ($st->rowCount())
			{
				while ($row = $st->fetch())
				{
					array_push($arr, $row);
				}
			}
		}

		return $arr; //returns an array of all the orders based on the product id and user id
	}
}