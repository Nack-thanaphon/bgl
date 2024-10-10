<?php
$db = "BGL";
$link = mysqli_connect("localhost", "aree", "Ak@072039", $db) or die("Could not connect: " . mysqli_connect_error());
mysqli_query($link, "set NAMES UTF8");
