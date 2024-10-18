<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$password1 = $_REQUEST['password'] ;
$now_password = $_REQUEST['now_password'] ;
$pass_chk = md5($now_password);

if($password1 != ""){
$user_sql = "select * from user where username = '$sess_username'";
$user_result =  mysqli_query($link,$user_sql);
$user_row = mysqli_fetch_array($user_result) ;
	$username = $user_row['username'];
	$password = $user_row['password'];

	if ($password != $pass_chk) {
		echo ('<meta http-equiv="refresh" content="0;URL=user_changepwd.php?message=warning">');
	exit();
	} else {
		$pwd_new = md5($password1);
		$sql_pwd = "update user set password = '$pwd_new' where username = '$sess_username'";
		$result_pwd = mysqli_query($link,$sql_pwd);
			if ($result_pwd) {
			/* send mail */
			$strTo = "$email";
			$strSubject = "แจ้งการเปลี่ยนรหัสผ่านใหม่";
			$strMessage = "เรียนคุณ $username <br>
			<b>แจ้งการเปลี่ยนรหัสผ่านใหม่</b><br><br>
			Username: $username <br>
			Password: $password1 <br>";
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
			echo ('<meta http-equiv="refresh" content="0;URL=user_changepwd.php?message=success">');
			}else{
				echo ('<meta http-equiv="refresh" content="0;URL=user_changepwd.php?message=info">');
			}
	}
}
?>