<?php
function mult($n1, $n2)
{
	$res = $n1 * $n2;
	return $res;
}

function cap($str)
{
	$firstChar = substr($str, 0, 1);
	$remain = substr($str, 1);
	$firstChar = strtoupper($firstChar);
	return $firstChar.$remain;
}

if(!isset($title))
{
	$title = "This is a page";
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>
<nav>
	<a href="/examples/imd223_wi2012/week_1/">Home</a>
	<a href="about.php">About</a>
</nav>
<div id="content">