<?php

/**
 * This class is the daughter of the DB class.
 * All methods here deals with users.
 */
class User extends DB 
{
	/**
	 * Gets a row from users based on an
	 * email provided.
	 * @param  [String] $email [the email]
	 * @return data of the user
	 */
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

	/**
	 * Updates the billing address of a user
	 * @param  [int] $badd [the billing address id]
	 * @param  [int] $uid  [the user's id]
	 */
	public function updateBillAddress($badd, $uid) 
	{
		$query = "UPDATE users SET billing_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$badd, $uid]);
	}

	/**
	 * Updates the delivery address of a user
	 * @param  [int] $badd [the delivery address id]
	 * @param  [int] $uid  [the user's id]
	 */
	public function updateDelAddress($dadd, $uid) 
	{
		$query = "UPDATE users SET delivery_adress_id=? WHERE id=?";
        $st = $this->connect()->prepare($query);
        return $st->execute([$dadd, $uid]);
	}
}