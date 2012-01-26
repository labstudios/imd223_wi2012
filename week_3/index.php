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
    	$employee2 = new Employee("Fred flinstone");
    	$employee3 = new Employee("barney Rubble");
    	$employee4 = new Employee("Ted Barns");
    	
    	$employee->setTitle("Owner");
    	$employee2->setTitle("Burger Flipper");
    	//echo $employee->lname;
    	//echo Employee::$numEmployees;
    	
    	//$newName = Employee::processName("brent allen");
    	//Employee::outInfo($employee);
    	$employee->intro();
    	echo "<br />".$employee->getEmployeeNumber()."<br />";
    	$employee2->intro();
    	echo "<br />".$employee2->getEmployeeNumber()."<br />";
    ?>
</body>
</html>