<?

$host = "localhost";
$user_name = "hongrutai";
$pass_word = "bglgems";
$db = "BGL";

//mysqli_connect ($host , $user_name , $pass_word) or die ("NO HOST");
$link = mysqli_connect ($host , $user_name , $pass_word) or die ("NO HOST");
mysqli_query("set NAMES utf8");


/*
$host = "localhost";
$user_name = "atwebsite_bgl";
$pass_word = "bgl_2011";
$db = "atwebsite_bgl";
mysqli_connect ($host , $user_name , $pass_word) or die ("NO HOST");
mysqli_query("set NAMES utf8");

$host = "localhost";
$user_name = "root";
$pass_word = "QWERasdf1234";
$db = "bgl_2011";
mysqli_connect ($host , $user_name , $pass_word) or die ("NO HOST");
mysqli_query("set NAMES utf8");
*/
?>
