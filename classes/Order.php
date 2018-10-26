 <?php

class Order extends DB 
{
	public function getCartByUserID($uid)
	{
		$query = "SELECT * FROM orders WHERE user_id=? AND type=?";
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
		$query = "SELECT * FROM orders WHERE user_id=? AND type=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$uid, 'ORDER']);

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

	public function getPOrderfromPIDPOID($pid,$oid)
	{
		$query = "SELECT * FROM order_products WHERE product_id=? AND order_id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$pid,$oid]);

		if ($st->rowCount())
		{
			if ($row = $st->fetch())
			{
				return $row;
			}
		}
	}

	public function getCurrentCart($uid)
	{
		$query = "SELECT * FROM orders WHERE user_id=? AND status=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$uid,'CART']);

		if ($st->rowCount())
		{
			if ($row = $st->fetch())
			{
				return $row;
			}
		}

		else
		{
			return null;
		}
	}

	public function updateAmount($oid, $amount) 
	{
        $query = "UPDATE orders SET amount=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$amount,$oid]);
    }

    public function productExists($pid, $oid)
    {
    	$query = "SELECT * FROM order_products WHERE product_id=? AND order_id=?";
    	$st = $this->connect()->prepare($query);
    	$st->execute([$pid,$oid]);

    	if ($st->rowCount())
    	{
    		if ($row = $st->fetch())
    		{
    			return $row;
    		}
    	}

    	else
    	{
    		return null;
    	}

    }

    public function updateQuantity($quantity, $prodTBA)
    {
    	$query = "UPDATE order_products SET quantity=? WHERE id=?";
    	$st = $this->connect()->prepare($query);
    	return $st->execute([$quantity, $prodTBA['id']]);
    }
}