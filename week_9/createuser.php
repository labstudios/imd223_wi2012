<?php
require_once("user.php");
$user = new User();
$user->username = "bob";
$user->password = "pass123";
$user->save();
?>