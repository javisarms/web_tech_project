<?php 

/**
 * This class is the mother class. It has valuable methods
 * that can be used universally by all the other classes.
 */
class DB
 {
 	/**
 	 * This method connects to the database using
 	 * PDO.
 	 */
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

	/**
	 * This method gets a specific table from
	 * the data base and returns it as a PHP
	 * array.
	 * @param  String $table the name of the table
	 * @return array of table from the data
	 */
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

	/**
	 * This selects a particular row from a table
	 * given its ID.
	 * @param  String $table the name of the table
	 * @param  int $id the ID of the row
	 * @return data of the row
	 */
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

	/**
	 * This method gets the last row from
	 * a specific table.
	 * @param  String $table the name of the table
	 * @return data of the row
	 */
	public function getLast($table)
	{
		$query = "SELECT * FROM " . $table . " ORDER BY ID DESC LIMIT 1";
		$st = $this->connect()->prepare($query);
		$st->execute();

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				return $row;
			}
		}
	}
}