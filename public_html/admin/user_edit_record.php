<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$user_id = $_REQUEST['user_id'];
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

if ($first_name != "" and $last_name != "" and $email != "") {		
	$sql = "update user set first_name='$first_name', last_name='$last_name', email='$email', phone='$phone' where user_id = '$user_id'";	
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=user_edit.php?Page_p='.$Page_p.'&user_id='.$user_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=user_edit.php?Page_p='.$Page_p.'&user_id='.$user_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=user_edit.php?Page_p='.$Page_p.'&user_id='.$user_id.'&message=info">');
}
?>