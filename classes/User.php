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

	public function updateBillAddress($badd, $uid) 
	{
		$query = "UPDATE users SET billing_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$badd, $uid]);
	}

	public function updateDelAddress($dadd, $uid) 
	{
		$query = "UPDATE users SET delivery_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$dadd, $uid]);
	}
}