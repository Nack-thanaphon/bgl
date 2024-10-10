<?php
$db = "BGL";
$host = "localhost";
$user = "aree";
$password = "Ak@072039";

// Create connection
$link = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

// Set character set to UTF-8
mysqli_query($link, "SET NAMES UTF8");
