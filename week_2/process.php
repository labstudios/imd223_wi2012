<?php
	if($_POST)
	{
		echo "We have data. . . ";
	}
	else
	{
		echo "No data";
	}
	if(isset($_POST['uname']) && isset($_POST['pass']))
	{
		echo "Welcome, " . $_POST['uname']."! I see that your password is " . $_POST['pass']. "<br />";
		if(isset($_POST['happy']))
		{
			echo "I see you are happy!";
		}
	}
	
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
?>