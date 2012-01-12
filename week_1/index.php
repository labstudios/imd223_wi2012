<?php
include("header.php");

echo mult(5, 17)."<br />";
echo cap("bob")."<br />";

$age = "15";
$years = 12;

echo $age + $years;
echo "<br /> In $years years I will be ".($age + $years).". But now I am only $age.";
echo "<br /><br />\r\n\r\n\r\n";

$numbers = array(23, 98, "102", 85, "2",97);
$employee = array('firstName' => "bob", 'lastName' => "pears");

$numbers[] = 90;
$employee['job'] = "janitor";

$employee = (Object) $employee;
for($i = 0; $i < count($numbers); ++$i)
{
	echo $numbers[$i]."<br />";
}


foreach($employee as $key => $val)
{
	echo cap($key).": ".cap($val)." <br />";
}

echo "<br />$employee->firstName<br />";
?>

<pre>
<?php 
var_dump($numbers);
print_r($employee);
?>
</pre>

<?php include("footer.php");