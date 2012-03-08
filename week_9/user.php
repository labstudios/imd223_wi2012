<?php
require_once("musicstore.php");
class User extends MusicStore
{
	protected $table = "users";
	
	/**
	 * Attempts to log in a user with the provided name and password
	 * @parameter	username	String	the user's username
	 * @parameter	password	String	the user's password
	 * @retrurn		User/false	Returns the user object on success, false otherwise
	*/
	public static function login($username, $password)
	{
		//see if the user exists
		$db = new Database();
		$user = $db->getItem("SELECT * FROM `users` WHERE `username` = '$username'");
		if($user)
		{
			//see if the password matches
			if(self::verifyEncryption($password, $user->password))
			{
				$uobj = new User($user->id);
				if(session_id() == "")
				{
					session_start();
				}
				$_SESSION['uid'] = $uobj->id;
				return $uobj;
			}
		}
		return false;
	}
	
	/**
	 * Checks to see if someone is currently logged in
	 * @return the user object if logged in, false otherwise
	*/
	public static function isLoggedIn()
	{
		if(session_id() == "")
		{
			session_start();
		}
		if(isset($_SESSION['uid']) && $_SESSION['uid'] != null)
		{
			return new User($_SESSION['uid']);
		}
		return false;
	}
	
	/**
	 * Encrypts data
	 * @return 	String	the encrypted data
	*/
	public static function encrypt($str)
	{
		return crypt($str);
	}
	
	/**
	 * Checks the password against the encryption
	 * @param	pass	String	the password we are testing
	 * $param	enc		String	the encrytion to check against
	*/
	public static function verifyEncryption($pass, $enc)
	{
		$hash = crypt($pass, $enc);
		return $hash == $enc;
	}
	
	public function __get($key)
	{
		switch($key)
		{
			case "id":
				return $this->data->id;
			break;
			case "user":
			case "name":
			case "username":
				return $this->data->username;
			break;
			case "password":
				return null;
			break;
		}
	}
	
	public function __set($key, $val)
	{
		switch($key)
		{
			case "id":
				//do nothing
			break;
			case "user":
			case "name":
			case "username":
				$this->data->username = $this->sanitize($val);
			break;
			case "password":
				$this->data->password = self::encrypt($val);
			break;
		}
	}
	
	public function save()
	{
		$this->insert($this->table, $this->data, false);
	}
}
