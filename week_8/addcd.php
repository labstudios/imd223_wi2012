<?php
require_once("header.php");
$cd = new CD();
$cd->title = $_POST['title'];
$cd->cost = $_POST['price'];
$cd->genre = $_POST['genre'];
$cd->artists = $_POST['artists'];
$cd->save();
include("form.php");
?>