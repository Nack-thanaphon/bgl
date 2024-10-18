<?php
// $db = "news";
// $host = "localhost";
// $user = "aree";
// $password = "Ak@072039";

$host = "localhost";
$user_name = "Aree";
$pass_word = "Ak@072039";
$db = "gbl";

// Create connection
$link = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

// Set character set to UTF-8
mysqli_query($link, "SET NAMES UTF8");
