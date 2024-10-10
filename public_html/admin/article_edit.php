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
	if(document.form_add.article_name.value == "") {
		alert("โปรดกรอกหัวข้อความรู้ทั่วไปค่ะ");
		document.form_add.article_name.focus();
		return false ;
	}
	else{
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
        <li class="drop active"><a href="">ความรู้ทั่วไป »</a>
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
                <h2>เพิ่มความรู้ทั่วไป</h2>
                <ul>
                    <li><a href="article_display.php"><span></span>ความรู้ทั่วไป</a></li>    
                    <li><a href="article_add.php"><span></span>เพิ่มความรู้ทั่วไป</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$article_id = $_REQUEST['article_id'];
$message = $_REQUEST['message'];
if($message == "success"){
	echo('<div class="message success"><p>แก้ไขข้อมูลเรียบร้อยแล้วค่ะ</p></div>');
}else if($message == "error"){
	echo('<div class="message errormsg"><p>ไม่สามารถแก้ไขข้อมูลได้ค่ะ</p></div>');
}else if($message == "info" or $message == ""){
	echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
}

$sql = "select * from article where article_id = '$article_id'";
$result = mysqli_db_query ($db,$sql);
$row = mysqli_fetch_array($result);
	$article_id = $row['article_id'];
	$article_name = $row['article_name'];
	$article_file = $row['article_file'];
	$article_status = $row['article_status'];
		if ($article_file != ""){
			$ext = strtolower(end(explode('.', $article_file)));
			$article_file_print = "<p><a href='../file_article/$article_file' target='_blank'><img src='images_admin/$ext.png' /> ดาวน์โหลดเอกสาร</a></p>";
		} else {
			$article_file_print = "";
		}

?>
        <form id="form_add" name="form_add" method="post" action="article_edit_record.php" enctype="multipart/form-data" onsubmit="return ChkFrom();">
          <p>
            <label>หัวข้อความรู้ทั่วไป:</label><br />
            <input name="article_name" type="text" class="text medium" id="article_name" value="<?php echo "$article_name";?>" maxlength="100" />
            <span class="note error">*</span>
          </p>
          <p class="fileupload">
            <label>ไฟล์ความรู้ทั่วไป:<span class="note">(*.doc, *.xls, *. pdf)</span></label><br />
            <?php echo"$article_file_print";?>
            <input name="fileupload" type="file" id="fileupload" /><input type="hidden" name="MAX_FILE_SIZE" value="9000000">
          </p>
          <p class="clear"></p>
          <hr />
          <p>
            <input type="submit" class="submit small" value="บันทึก" />
            <input name="Reset" type="reset" class="submit small" value="ยกเลิก" />
            <input name="article_id" type="hidden" id="article_id" value="<?php echo"$article_id";?>" />
            <input name="file_del" type="hidden" id="file_del" value="<?php echo"$article_file";?>" />
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
