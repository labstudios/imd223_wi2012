<?php
	require_once("employee.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Using Employee</title>
    <style>
    	body{
    		font-size: 25px;
    	}
    </style>
</head>
<body>
    <?php
    	$employee = new Employee("Bob jones");
    	$employee2 = new BurgerFlipper("Fred flinstone");
    	$employee3 = new BurgerFlipper("barney Rubble");
    	$employee4 = new BurgerFlipper("Ted Barns");
    	
    	$employee->firstName = "Fred";
    	/*$employee->myVar = 58;
    	echo $employee->myVar;*/
    	/*echo $employee->asdf;
    	echo $employee->bob;
    	echo $employee->jureb;*/
    	
    	
    	$employee->jobTitle = "Owner";
    	$employee2->jobTitle = "Master Chef";
    	$employee2->lastName = "Rubble";
    	//$employee2->setTitle("Burger Flipper");
    	//echo $employee->lname;
    	//echo Employee::$numEmployees;
    	
    	//$newName = Employee::processName("brent allen");
    	//Employee::outInfo($employee);
    	$employee->intro();
    	echo "<br />".$employee->getEmployeeNumber()."<br />";
    	$employee2->intro();
    	echo "<br />".$employee2->getEmployeeNumber()."<br />";
    	$employee3->intro();
    	echo "<br />".$employee3->getEmployeeNumber()."<br />";
    	$employee4->intro();
    	echo "<br />".$employee4->getEmployeeNumber()."<br />";
    ?>
</body>
</html>