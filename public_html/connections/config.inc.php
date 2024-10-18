<?php

define('BASE_URL', 'http://10.201.1.10/~bgl/', true);

$host = "localhost";
$user = "aree";
$pass = "Ak@072039";
$db = "BGL";

// $host = "localhost";
// $user = "contactu_gbl";
// $pass = "FRpbtca3ABMtTBbjYqgx";
// $db = "contactu_gbl";




//mysqli_connect ($host , $user , $pass) or die ("NO HOST");
$link = mysqli_connect($host, $user, $pass, $db) or die("NO HOST");
mysqli_query($link, "set NAMES utf8");







/*
$host = "localhost";
$user = "atwebsite_bgl";
$pass = "bgl_2011";
$db = "atwebsite_bgl";
mysqli_connect ($host , $user , $pass) or die ("NO HOST");
mysqli_query($link,"set NAMES utf8");

$host = "localhost";
$user = "root";
$pass = "QWERasdf1234";
$db = "bgl_2011";
mysqli_connect ($host , $user , $pass) or die ("NO HOST");
mysqli_query($link,"set NAMES utf8");
*/
