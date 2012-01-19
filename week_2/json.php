<?php
$obj = new stdClass();
$obj->fname = "Bob";
$obj->lname = "Rogers";

$obj2 = new stdClass();
$obj2->fname = "Bob";
$obj2->lname = "Smith";

$arr = array($obj, $obj2);

echo json_encode($arr);
?>