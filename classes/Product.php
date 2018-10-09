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
}