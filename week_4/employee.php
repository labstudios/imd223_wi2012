<?php

class Employee
{
	const BUSINESS = "Bob's Burgers";
	public static $numEmployees = 0;
	private $fname = "";
	private $lname = "";
	private $title = "";
	private $empNum = 100;
	
	public function Employee($name = "")
	{
		self::$numEmployees++;
		$names = self::processName($name);
		$this->fname = $names->firstName;
		$this->lname = $names->lastName;
		$this->empNum += self::$numEmployees;
	}
	
	public static function processName($name)
	{
		$name = ucwords($name);
		$names = explode(" ", $name);
		
		$retNames = array("firstName" => $names[0], "lastName" => $names[count($names) - 1]);
		
		return (Object) $retNames;
	}
	
	private function capString($str, $throwError = true)
	{
		$test = (int) $str;
		 if(is_string($str) && !$test)
		 {
		 	$str = ucwords($str);
		 	return $str;
		 }
		 else if($throwError)
		 {
		 	throw new ErrorException("Dude, I am not a number.", 96);
		 	return null;
		 }
		 else
		 {
		 	return null;
		 }
		 
	}
	
	public static function outInfo($info)
	{
		echo "<pre>" .print_r($info, true). "</pre>";
	}
	
	public function intro()
	{
		echo "Hello, my name is $this->fname $this->lname and I work for ".self::BUSINESS.".";
		if($this->title != "")
		{
			echo " I am the $this->title.";
		}
	}
	
	protected function setTitle($str)
	{
		 $this->title = $this->capString($str);
	}
	
	protected function getTitle()
	{
		return $this->title;
	}
	
	public function getEmployeeNumber()
	{
		return $this->empNum;
	}
	
	public function __get($key)
	{
		switch($key)
		{
			case "asdf":
				return "blarg<br /><br />";
			break;
			case "firstName":
				return $this->fname;
			break;
			case "lastName":
				return $this->lname;
			break;
			case "jobTitle":
				return $this->getTitle();
			break;
			case "employeeNumber":
				return $this->getEmployeeNumber();
			break;
			default:
				//the following line retains default object functionality.
				//return $this->$key;
				//the following lines will not allow use of new variables in the object
				throw new ErrorException("Variable $key is not a part of the class.", 96);
				return null;
			break;
		}
	}
	
	public function __set($key, $val)
	{
		switch($key)
		{
			case "firstName":
				$this->fname = $this->capString($val);
			break;
			case "lastName":
				$this->lname = $this->capString($val);
			break;
			case "jobTitle":
				$this->setTitle($val);
			break;
			default:
				//the following line retains default object functionality.
				//$this->$key = $val;
				//the following line will not allow use of new variables in the object
				throw new ErrorException("Variable $key is not a part of the class.", 96);
			break;
		}
	}
	
	public function __destruct()
	{
		
	}
	
}

class BurgerFlipper extends Employee
{
	
	public function BurgerFlipper($name = "")
	{
		parent::Employee($name);
		$this->setTitle("Burger Flipper");
	}
	
	public function __set($key, $val)
	{
		switch($key)
		{
			case "jobTitle":
				//sorry. you're still a burger flipper
			break;
			default:
				parent::__set($key, $val);
			break;
		}
	}
}


















?>