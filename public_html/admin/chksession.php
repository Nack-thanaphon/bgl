<?php 	session_start();
	$sess_userid=session_id();
	$sess_username=$_SESSION["sess_username"];
		if ($sess_userid<>session_id() or $sess_username=="") {
			echo ('<meta http-equiv="refresh" content="0;URL=index.php">');
			exit();
		}
?>