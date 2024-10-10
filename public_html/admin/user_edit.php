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
function emailValidator(elem){ 
	var emailExp = /^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)$/;
	if(elem.match(emailExp)){
		return false;
	}else{
		return true;
	}
}
function ChkFrom(){
	if(document.form_edit.first_name.value == "") {
		alert("โปรดกรอกชื่อค่ะ");
		document.form_edit.first_name.focus();
		return false ;
	}
	if(document.form_edit.last_name.value == "") {
		alert("โปรดกรอกนามสกุลค่ะ");
		document.form_edit.last_name.focus();
		return false ;
	}
	if(document.form_edit.email.value == "") {
		alert("โปรดกรอกอีเมลล์ค่ะ");
		document.form_edit.email.focus();
		return false ;
	}
	if (emailValidator(document.form_edit.email.value)) {
		alert("รูปแบบอีเมลล์ไม่ถูกต้อง");
		document.form_edit.email.focus();
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
        <li class="drop active"><a href="">ผู้ดูแลระบบ »</a>
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
                <h2>แก้ไขผู้ดูแลระบบ</h2>
                <ul>
                    <li><a href="user_display.php">ผู้ดูแลระบบ</a></li>
                    <li><a href="user_add.php">เพิ่ิมผู้ดูแลระบบ</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$user_id = $_REQUEST['user_id'];
$message = $_REQUEST['message'];
if($message == "success"){
	echo('<div class="message success"><p>แก้ไขข้อมูลเรียบร้อยแล้วค่ะ</p></div>');
}else if($message == "error"){
	echo('<div class="message errormsg"><p>ไม่สามารถแก้ไขข้อมูลได้ค่ะ</p></div>');
}else if($message == "info" or $message == ""){
	echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
}

$sql = "select * from user where user_id = '$user_id'";
$result = mysqli_query ($db,$sql);
$row = mysqli_fetch_array($result);
	$user_id = $row['user_id'];
	$username = $row['username'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$phone = $row['phone'];
?>
        <form id="form_edit" name="form_edit" method="post" action="user_edit_record.php" onsubmit="return ChkFrom();">
          <h3>ข้อมูลส่วนตัว <?php echo "$username";?></h3>
          <p>
            <label>ชื่อ:</label><br />
            <input name="first_name" type="text" class="text medium" id="first_name" value="<?php echo "$first_name";?>" maxlength="40" /> 
            <span class="note error">*</span>
          </p>
          <p>
            <label>นามสกุล:</label><br />
            <input name="last_name" type="text" class="text medium" id="last_name" value="<?php echo "$last_name";?>" maxlength="40" /> 
            <span class="note error">*</span>
          </p>
          <p>
            <label>อีเมลล์:</label><br />
            <input name="email" type="text" class="text medium" id="email" value="<?php echo "$email";?>" maxlength="60" />
            <span class="note error">* ระบบจะส่ง Password ทาง e-mail นี้</span>
          </p>
          <p>
            <label>เบอร์โทร:</label><br />
            <input name="phone" type="text" class="text small" id="phone" value="<?php echo "$phone";?>" maxlength="20" />
          <hr />
          <p>
            <input type="submit" class="submit small" value="บันทึก" />
            <input name="Reset" type="reset" class="submit small" value="ยกเลิก" />
            <input name="user_id" type="hidden" id="user_id" value="<?php echo"$user_id";?>" />
            <input name="Page_p" type="hidden" id="Page_p" value="<?php echo"$Page_p";?>" />
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
