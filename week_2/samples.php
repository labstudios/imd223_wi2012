<?php
function preout($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

	//-----------------------using $_GET and isset()
	//check to see if we have $_GET['msg'] passed in
	if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
	else
	{
		echo "I have no messages today, Dave.";
	}
	//-----------------------END using $_GET and isset()
?>
<br />
<br />
<br />

<?php
	//-----------------------date and time
	//Uncomment one of the two lines below to pull back UTC time 7 hours
	//$time = strtotime("-7 hours");
	//$time = time() - (7*60*60);
	//or just set the time zone
	//echo "Today is " . date("F j, Y g:i:s a e", $time);
	//or set the script to a proper time zone first
	date_default_timezone_set("America/Denver");
	echo "Today is " . date("F j, Y g:i:s a e");
	//-----------------------END date and time
?>
<br />
<br />
<br />
<?php
	//-----------------------A few string functions
	$str = "Hello, I am a string. Pleased to meet you.\r\n";
	
	echo strlen($str);
	
	$words = explode(" ",$str);
	preout($words);
	preout(implode(" ",$words));
	//-----------------------END A few string functions
	//-----------------------A few array functions
	$arr = array(23, 56, 78, "bob", 49);
	$arr[] = 145;
	array_push($arr, 56, 29, 67);
	
	$myvar = array_pop($arr);
	sort($arr, SORT_NUMERIC);
	
	array_splice($arr, 5, 1);
	preout($arr);
	//-----------------------END a few array functions
?>