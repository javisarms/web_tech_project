<?php

class Product extends DB 
{
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

	public function delete($id)
	{
		$query = "DELETE FROM products WHERE id=?";
		$st = $this->connect()->prepare($query);
		return $st->execute([$id]);
	}

	public function updateProd($id, $name, $description, $unit_price, $i_url, $r_id) 
	{
        $query = "UPDATE products SET name=?, description=?, unit_price=?, image_url=?, range_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$name, $description, $unit_price, $i_url, $r_id, $id]);
    }
}