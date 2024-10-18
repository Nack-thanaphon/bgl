<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin BGL</title>
	<style type="text/css" media="all">
		@import url("css_admin/style.css");
		@import url("css_admin/jquery.wysiwyg.css");
		@import url("css_admin/facebox.css");
		@import url("css_admin/visualize.css");
		@import url("css_admin/date_input.css");
		@import url("css_admin/style.hf.css");
	</style>
	<script type="text/javascript" src="js_admin/jquery.js"></script>
	<script type="text/javascript" src="js_admin/jquery.img.preload.js"></script>
	<script type="text/javascript" src="js_admin/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js_admin/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js_admin/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="js_admin/facebox.js"></script>
	<script type="text/javascript" src="js_admin/jquery.select_skin.js"></script>
	<script type="text/javascript" src="js_admin/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js_admin/ajaxupload.js"></script>
	<script type="text/javascript" src="js_admin/jquery.pngfix.js"></script>
	<script type="text/javascript" src="js_admin/custom.js"></script>
	<script type="text/javascript" src="js_admin/jqueryslidemenu.js"></script>
	<script type="text/javascript">
		function ChkFromChk() {
			if (document.form_chk.username.value == "") {
				alert("โปรดกรอก Uername ค่ะ");
				document.form_chk.username.focus();
				return false;
			}
			if (document.form_chk.password.value == "") {
				alert("โปรดกรอก Confirm Password ค่ะ");
				document.form_chk.password.focus();
				return false;
			} else {
				return true;
			}
		}
	</script>

</head>

<body>
	<div id="hld">
		<div class="wrapper">
			<div class="block small center login">
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					<h2>เข้าสู่ระบบ</h2>
				</div>

				<div class="block_content" style="text-align:left;">
					<?php
					$name = $_REQUEST['username'];
					$pass = $_REQUEST['password'];
					include "../connections/config.inc.php";
					/* check user and pass */
					if ($name != "" and $pass != "") {
						/* select table user */
						$user_sql = "select * from user where username = '$name'";
						$result = mysqli_query($link, $user_sql) or die("Invalid query: " . mysqli_connect_error());
						$row = mysqli_fetch_array($result);
						$username = $row['username'];
						$password = $row['password'];
						$status = $row['status'];
						if ($status == "y") {
							/* check user */
							if (md5($pass) == $password and $name == $username) {
								$_SESSION["sess_userid"] = session_id();
								$_SESSION["sess_username"] = $name;
								echo ('<meta http-equiv="refresh" content="0;URL=dashboard.php">');
							} else {
								echo ('<div class="message errormsg"><p>Username หรือ password ไม่ถูกต้องค่ะ</p></div>');
							}
						} else {
							echo ('<div class="message errormsg"><p>ท่านไม่สามารถเข้าใช้งานในระบบได้ในขณะนี้ <br>กรุณาติดต่อผู้ดูแลระบบค่ะ</p></div>');
						}
					} else {
						echo ('<div class="message info"><p>โปรดกรอก Username, Password ให้ครบ</p></div>');
					}
					?>
					<form id="form_chk" name="form_chk" method="post" action="" onsubmit="return ChkFromChk();">
						<p>
							<label>Username:</label><br />
							<input name="username" type="text" class="text" id="username" />
						</p>

						<p>
							<label>Password:</label><br />
							<input name="password" type="password" class="text" id="password" />
						</p>

						<p>
							<input type="submit" class="submit" value="Login" />
						</p>
					</form>
				</div>
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>
		</div>
	</div>
</body>

</html>