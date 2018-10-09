<?php

class User extends DB 
{
	public function getByEmail($email)
	{
		$query = "SELECT * FROM users WHERE email=?";
		$st = $this->connect()->prepare($query);
		$st->execute([$email]);

		if ($st->rowCount())
		{
			while ($row = $st->fetch())
			{
				return $row;
			}
		}
	}
}