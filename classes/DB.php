<?php 

//executes query, simplifies the querying process
class DB
 {
 	public function connect()
	{
		try
		{
			$dsn = 'mysql:host=localhost;dbname=webtech';
			$pdo = new PDO($dsn, 'root', 'root');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}

		catch(PDOxception $e)
		{
			echo "Connection failed: ".$e->getMessage();
		}
	}

	public function getArray($table)
	{
		$query = "SELECT * FROM " . $table;
		$st = $this->connect()->query($query);
		$arr = array();

		while ($row = $st->fetch())
		{
			array_push($arr, $row);
		}

		return $arr;
	}

	public function getByID($table, $id)
	{
		$query = "SELECT * FROM " . $table . " WHERE id=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$id]);

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				return $row;
			}
		}

		else
		{
			return "There is no data in the table";
		}
	}
}