<?php
include "../connections/config.inc.php";
$sql_profile = "select * from user where username = '$sess_username' ";
$result_profile = mysqli_query ($db,$sql_profile);
$row_profile = mysqli_fetch_array($result_profile);
	$print_user_id = $row_profile['user_id'];
	$print_username = $row_profile['username'];
?>
<div class="bgheader">
    <div class="logo"><a href="index.php"></a></div>
</div>
