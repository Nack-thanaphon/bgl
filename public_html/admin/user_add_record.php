<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$md5pwd = md5($password);
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$date_today = date('Y-m-d');
$status_y = $_REQUEST['status'];
	if($status_y = "y"){
		$status = "y";
	}else{
		$status = "n";
	}
$sendmail = $_REQUEST['sendmail'];

if($sendmail = "y"){
	$strTo = "$email";	
	$strSubject = "แจ้ง Username Password เข้าใช้งานในระบบ";
	$strMessage = "แจ้ง Username Password เข้าใช้งานในระบบ<br><br>
					Username : $username <br><br>
					Password : $password <br><br>";
	$strSid = md5(uniqid(time()));
	
	$strHeader = "";
	$strHeader .= "From:Administrator <bgl@gmail.com>\nReply-To: bgl@gmail.com\n";
	$strHeader .= "MIME-Version: 1.0\n";
	$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
	$strHeader .= "This is a multi-part message in MIME format.\n";
	$strHeader .= "--".$strSid."\n";
	$strHeader .= "Content-type: text/html; charset=utf-8\n";
	$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
	$strHeader .= $strMessage."\n\n";
	@mail($strTo,$strSubject,null,$strHeader);
}
	
if ($username != "" and $password != ""  and $first_name != "" and $last_name != "" and $email != "") {		
	$sql_user = "select * from user where username = '$username'";
	$result_user = mysqli_query($db,$sql_user);
	$num = mysql_num_rows($result_user) ;
		if ($num > 0) {
			echo ('<meta http-equiv="refresh" content="0;URL=user_add.php?message=warning">');
			exit();
		} 
		
	$sql_max = "select max(user_id) from user";
	$result_max = mysqli_query($db,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$user_id = $row_max[0]+1;
	
	$sql = "insert into user (user_id, username, password, first_name, last_name, email, phone, status, create_date) VALUES ('$user_id', '$username', '$md5pwd', '$first_name', '$last_name','$email','$phone','$status','$date_today')";
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=user_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=user_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=user_add.php?message=info">');
}
?>