<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

if ($first_name != "" and $last_name != "" and $email != "") {		
	$sql = "update user set first_name='$first_name', last_name='$last_name', email='$email', phone='$phone' where username = '$sess_username'";
	$result = mysqli_db_query($db,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=edit_profile.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=edit_profile.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=edit_profile.php?message=info">');
}
?>