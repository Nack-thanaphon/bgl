<?php include "chksession.php";?>
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
function ChkFrom(){
	if(document.form_changpwd.password.value == "") {
		alert("โปรดกรอก Password ค่ะ");
		document.form_changpwd.password.focus();
		return false ;
	}
	if(document.form_changpwd.password.value.length < 5) {
		alert("Password ความยาว 5-10 ตัวอักษร");
		document.form_changpwd.password.focus();
		return false ;
	}
	if(document.form_changpwd.confirm_password.value == "") {
		alert("โปรดกรอก Confirm Password ค่ะ");
		document.form_changpwd.confirm_password.focus();
		return false ;
	}
	if(document.form_changpwd.password.value != document.form_changpwd.confirm_password.value) {
		alert("Password ไม่ตรงกันค่ะ");
		document.form_changpwd.confirm_password.focus();
		return false ;
	}
	if(document.form_changpwd.now_password.value == "") {
		alert("โปรดกรอก Password ปัจจุบันค่ะ");
		document.form_changpwd.now_password.focus();
		return false ;
	}else{
		return true ;
	}
}
</script>

</head>
<body>
<a name="top"></a>
<?php include "header.php";?>
<!-- menu -->
<div id="myslidemenu" class="menu">
    <ul class="primary-menu">
        <li><a href="dashboard.php">หน้าแรก</a></li>
        <li class="drop"><a href="">ใบรับรอง »</a>
            <ul>
                <li><a href="certificate_display.php"><span></span>ใบรับรอง</a></li>    
                <li><a href="certificate_add.php"><span></span>เพิ่มใบรับรอง</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">ข่าวสาร »</a>
            <ul>
                <li><a href="news_display.php"><span></span>ข่าวสาร</a></li>    
                <li><a href="news_add.php"><span></span>เพิ่มข่าวสาร</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">ความรู้ทั่วไป »</a>
            <ul>
                <li><a href="article_display.php"><span></span>ความรู้ทั่วไป</a></li>    
                <li><a href="article_add.php"><span></span>เพิ่มความรู้ทั่วไป</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">Lab Update »</a>
            <ul>
                <li><a href="lab_display.php"><span></span>Lab Update</a></li>    
                <li><a href="lab_add.php"><span></span>เพิ่ม Lab</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">Banner »</a>
            <ul>
                <li><a href="banner_display.php"><span></span>Banner</a></li>    
                <li><a href="banner_add.php"><span></span>เพิ่ม Banner</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">Gallery »</a>
            <ul>
                <li><a href="gallery_display.php"><span></span>Gallery</a></li>    
                <li><a href="gallery_add.php"><span></span>เพิ่ม Gallery</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">ผู้ดูแลระบบ »</a>
            <ul>
                <li><a href="user_display.php"><span></span>ผู้ดูแลระบบ</a></li>    
                <li><a href="user_add.php"><span></span>เพิ่มผู้ดูแลระบบ</a></li>
            </ul>
        </li>
        <li class="last drop"><a href="">ข้อมูลส่วนตัว »</a>
            <ul>
                <li><a href="edit_profile.php"><span></span>แก้ไขข้อมูลส่วนตัว</a></li>    
                <li><a href="user_changepwd.php"><span></span>เปลี่ยนรหัสผ่าน</a></li>    
                <li><a href="logout.php"><span></span>ออกจากระบบ</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- end menu -->

<div id="hld">
<div class="wrapper">
    
        <div class="block">
            <div class="block_head">
            <div class="bheadl"></div>
            <div class="bheadr"></div>
                <h2>เปลี่ยนรหัสผ่าน</h2>
			</div>
            
        <div class="block_content">
<?php
$message = $_REQUEST['message'];
if($message == "success"){
	echo('<div class="message success"><p>เปลี่ยนรหัสผ่านเรียบร้อยแล้วค่ะ</p></div>');
}else if($message == "warning"){
	echo('<div class="message warning"><p>Password ปัจจุบันไม่ถูกต้องค่ะ</p></div>');
}else if($message == "error"){
	echo('<div class="message errormsg"><p>ไม่สามารถเปลี่ยนรหัสผ่านได้ค่ะ</p></div>');
}else if($message == "info" or $message == ""){
	echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
}
?>
        <form id="form_changpwd" name="form_changpwd" method="post" action="user_changpwd_record.php" onsubmit="return ChkFrom();">
          <h3>ข้อมูลเข้าใช้งานระบบ</h3>
          <p>
            <label>Username:</label><br />
            <input name="username" type="text" disabled="disabled" class="text small" id="username" value="<?php echo"$print_username"; ?>" maxlength="15" />
            <span class="note error">* Username ไม่สามารถแก้ไขได้</span>
          </p>
          <p>
            <label>Password:</label><br />
            <input name="password" type="password" class="text small" id="password" maxlength="10" /> 
            <span class="note error">* Password ความยาว 5 - 10 ตัวอักษร </span>
          </p>
          <p>
            <label>Confirm Password:</label><br />
            <input name="confirm_password" type="password" class="text small" id="confirm_password" maxlength="10" /> 
            <span class="note error">*</span>
          </p>
          <p>
            <label>Password ปัจจุบัน:</label><br />
            <input name="now_password" type="password" class="text small" id="now_password" maxlength="10" /> 
            <span class="note error">* ส่งรหัสผ่านนี้ไปยังอีเมลล์ของผู้ดูแลระบบ</span>
          </p>
          <hr />
          <p>
            <input type="submit" class="submit small" value="บันทึก" />
            <input name="Reset" type="reset" class="submit small" value="ยกเลิก" />
          </p>
		</form>
        </div>
        <div class="bendl"></div>
        <div class="bendr"></div>
        </div>
        
    </div>
</div>
<?php include "footer.php";?>
</body>
</html>
