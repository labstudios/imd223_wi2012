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
	
	public function setTitle($str)
	{
		 $test = (int) $str;
		 if(is_string($str) && !$test)
		 {
		 	$this->title = $str;
		 }
		 else
		 {
		 	throw new ErrorException("Dude, I am not a number.", 96);
		 }
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getEmployeeNumber()
	{
		return $this->empNum;
	}
	
	public function __destruct()
	{
		
	}
}

?>