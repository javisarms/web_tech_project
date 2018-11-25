<?php

/**
 * This class is the daughter of the DB class.
 * All methods here deals with products.
 */
class Product extends DB 
{
	/**
	 * This allows one to search through the products
	 * @param  [String] $search [the query]
	 * @return data of the row
	 */
	public function search($search)
	{
		$query = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
		$st = $this->connect()->query($query);

		$arr = array();

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				array_push($arr, $row);
			}

			return $arr;
		}

		else
		{
			return "There are currently no items available";
		}
	}

	/**
	 * This deletes a row from the table
	 * @param  [int] $id [the id of the product]
	 */
	public function delete($id)
	{
		$query = "DELETE FROM products WHERE id=?";
		$st = $this->connect()->prepare($query);
		return $st->execute([$id]);
	}

	/**
	 * This updates a current product.
	 * @param  [int] $id          [the product id]
	 * @param  [string] $name        [the product name]
	 * @param  [string] $description [the product description]
	 * @param  [int] $unit_price  [the product price]
	 * @param  [string] $i_url       [the product image url]
	 * @param  [int] $r_id        [the product range id]
	 */
	public function updateProd($id, $name, $description, $unit_price, $i_url, $r_id) 
	{
        $query = "UPDATE products SET name=?, description=?, unit_price=?, image_url=?, range_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$name, $description, $unit_price, $i_url, $r_id, $id]);
    }
}