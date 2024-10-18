<?php
// $db = "news";
// $host = "localhost";
// $user = "aree";
// $password = "Ak@072039";

$host = "localhost";
$user_name = "Aree";
$pass_word = "Ak@072039";
$db = "BGL";

// Create connection
$link = mysqli_connect($host, $user_name, $pass_word, $db);

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set to UTF-8
mysqli_query($link, "SET NAMES UTF8");