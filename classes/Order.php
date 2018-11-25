  <?php

/**
 * This class is the daughter of the DB class.
 * All methods here deals with orders.
 */
class Order extends DB 
{
	/**
	 * Gets a user's cart
	 * @param  int $uid the user's id
	 * @return array of the user's cart
	 */
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

	/**
	 * Gets a user's billed orders
	 * @param  int $uid the user's id
	 * @return array of the user's billed orders
	 */
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

	/**
	 * This gets the product info based on
	 * the id of the order
	 * @param  int $oid the order id
	 * @return array of product data
	 */
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

	/**
	 * This methods selects the rows from order_prodcuts given the
	 * product_id and order_id.
	 * @param  int $pid the product id
	 * @param  int $oid the order id
	 * @return data of the row
	 */
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

	/**
	 * gets the user's current cart
	 * @param  [int] $uid [user id]
	 * @return [data] [of the cart]
	 */
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

	/**
	 * Updates the amount of the order
	 * @param  [int] $oid    [the order id]
	 * @param  [int] $amount [the amount]
	 */
	public function updateAmount($oid, $amount) 
	{
        $query = "UPDATE orders SET amount=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$amount,$oid]);
    }

    /**
     * Updates the billing address of the order
	 * @param  [int] $oid    [the order id]
     * @param  [int] $bid [the billing id]
     */
    public function updateBillingAd($oid, $bid) 
	{
        $query = "UPDATE orders SET billing_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$bid,$oid]);
    }

    /**
     * Updates the delivery address of the order
	 * @param  [int] $oid    [the order id]
     * @param  [int] $bid [the delivery id]
     */
    public function updateDeliveryAd($oid, $did) 
	{
        $query = "UPDATE orders SET delivery_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$did,$oid]);
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

    /**
     * updates the quantity of products in a cart
     * @param  [int] $quantity [the new quantity]
     * @param  [data] $prodTBA  [the product]
     */
    public function updateQuantity($quantity, $prodTBA)
    {
    	$query = "UPDATE order_products SET quantity=? WHERE id=?";
    	$st = $this->connect()->prepare($query);
    	return $st->execute([$quantity, $prodTBA['id']]);
    }

    /**
     * Changes the type of an order to 'ORDER'
     * @param  [int] $oid [the order id]
     */
    public function checkOutType($oid)
    {
    	$query = "UPDATE orders SET type='ORDER' WHERE id=?";
    	$st = $this->connect()->prepare($query);
    	return $st->execute([$oid]);
    }

    /**
     * Changes the type of an order to 'CART'
     * @param  [int] $oid [the order id]
     */
    public function checkOutTypeCart($oid)
    {
    	$query = "UPDATE orders SET type='CART' WHERE id=?";
    	$st = $this->connect()->prepare($query);
    	return $st->execute([$oid]);
    }

    /**
     * Changes the status of an order to 'BILLED'
     * @param  [int] $oid [the order id]
     */
    public function checkOutStatus($oid)
    {
    	$query = "UPDATE orders SET status='BILLED' WHERE id=?";
    	$st = $this->connect()->prepare($query);
    	return $st->execute([$oid]);
    }

}