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
	if(document.form_add.news_title.value == "") {
		alert("โปรดกรอกหัวข้อข่าวค่ะ");
		document.form_add.news_title.focus();
		return false ;
	}
	if(document.form_add.news_descriptions.value == "") {
		alert("โปรดกรอกคำอธิบายข่าวค่ะ");
		document.form_add.news_descriptions.focus();
		return false ;
	}
	if(document.form_add.news_date.value == "") {
		alert("โปรดกรอกวันที่ค่ะ");
		document.form_add.news_date.focus();
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
        <li class="drop active"><a href="">ข่าวสาร »</a>
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
                <h2>แก้ไขข่าว</h2>
                <ul>
                    <li><a href="news_display.php">ข่าวสาร</a></li>
                    <li><a href="news_add.php">เพิ่มข่าว</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$news_id = $_REQUEST['news_id'];
$message = $_REQUEST['message'];
if($message == "success"){
	echo('<div class="message success"><p>แก้ไขข้อมูลเรียบร้อยแล้วค่ะ</p></div>');
}else if($message == "error"){
	echo('<div class="message errormsg"><p>ไม่สามารถแก้ไขข้อมูลได้ค่ะ</p></div>');
}else if($message == "info" or $message == ""){
	echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
}
$sql = "select * from news where news_id = '$news_id'";
$result = mysqli_query ($db,$sql);
$row = mysqli_fetch_array($result);
	$news_id = $row['news_id'];
	$news_order = $row['news_order'];
	$news_type = $row['news_type'];
	$news_title = $row['news_title'];
	$news_descriptions = $row['news_descriptions'];
	$news_picture = $row['news_picture'];
	$news_date = $row['news_date'];
	$news_url = $row['news_url'];
	$news_detail_file = $row['news_detail_file'];
	$news_detail_picture = $row['news_detail_picture'];
	$news_detail_format = $row['news_detail_format'];
	$news_detail_descriptions = $row['news_detail_descriptions'];
	$news_status = $row['news_status'];
	$news_index = $row['news_index'];		
	list($y, $m, $d ) = explode("-", $news_date);
		if($m=="01"){
			$month="Jan";
		}else if($m=="02") {
			$month="Feb";
		}else if($m=="03") {
			$month="Mar";
		}else if($m=="04") {
			$month="Apr";
		}else if($m=="05") {
			$month="May";
		}else if($m=="06") {
			$month="Jun";
		}else if($m=="07") {
			$month="Jul";
		}else if($m=="08") {
			$month="Aug";
		}else if($m=="09") {
			$month="Sep";
		}else if($m=="10") {
			$month="Oct";
		}else if($m=="11") {
			$month="Nov";
		}else if($m=="12") {
			$month="Dec";
		}
	$date_print = $d." ".$month." ".$y;
		if ($news_date == "0000-00-00"){
			$date_print = "";
		} else {
			$date_print = "$date_print";
		}
		if ($news_picture != ""){
			$news_picture_print = "<img src='../thumbnail_news/$news_picture' /></br>";
		} else {
			$news_picture_print = "<img src='images_admin/no_picture.jpg' />";
		}
		if ($news_detail_file != ""){
			$ext = strtolower(end(explode('.', $news_detail_file)));
			$news_detail_file_print = "<p><a href='../file_news/$news_detail_file' target='_blank'><img src='images_admin/$ext.png' /> ดาวน์โหลดเอกสาร</a></p>";
		} else {
			$news_detail_file_print = "";
		}
		if ($news_detail_picture != ""){
			$news_detail_picture_print = "<img src='../picture_news/$news_detail_picture' /></br>";
		} else {
			$news_detail_picture_print = "<img src='images_admin/no_picture.jpg' />";
		}
?>
        <form id="form_add" name="form_add" method="post" action="news_edit_record.php" enctype="multipart/form-data" onsubmit="return ChkFrom();">
        <h3>หัวข้อข่าว</h3>
          <p>
            <label>ประเภทข่าว:</label><br />
            <select name="news_type" id="news_type">
            <?php
            	if($news_type == "ข่าวประชาสัมพันธ์"){
					$news_type1 = ('selected="selected"');
				}else if($news_type == "ข่าวอบรม"){
					$news_type2 = ('selected="selected"');
				}else if($news_type == "ข่าวกิจกรรม"){
					$news_type3 = ('selected="selected"');
				}
			?>
                <option value="ข่าวประชาสัมพันธ์" <?php echo "$news_type1";?> >ข่าวประชาสัมพันธ์</option>
                <option value="ข่าวอบรม" <?php echo "$news_type2";?> >ข่าวอบรม</option>
                <option value="ข่าวกิจกรรม" <?php echo "$news_type3";?> >ข่าวกิจกรรม</option>
            </select>
            <span class="note error">*</span>
          </p>
          <p>
            <label>หัวข้อข่าว:</label><br />
            <input name="news_title" type="text" class="text medium" id="news_title" value="<?php echo"$news_title";?>" maxlength="200" />
            <span class="note error">*</span>
          </p>
          <p>
            <label>คำอธิบาย:</label><br />
            <input name="news_descriptions" type="text" class="text big" id="news_descriptions" value="<?php echo"$news_descriptions";?>" />
            <span class="note error">*</span>
          </p>
          <p>
            <label>Date:</label> 
            <input name="news_date" type="text" class="text date_picker" id="news_date" value="<?php echo"$date_print";?>" />
            <span class="note error">*</span>
          </p>
          <p class="fileupload">
          <?php echo"$news_picture_print";?><br />
            <label>รูปภาพแสดงหน้าข่าว:</label><br />
            <input name="fileupload" type="file" id="fileupload" /><input type="hidden" name="MAX_FILE_SIZE" value="9000000">
            <span class="note error" style="padding-left:94px" >* รูปภาพขนาด 250x100 px</span>
          </p>
          <hr />
          <p>
          <h3>รายละเอียดข่าว<span class="note">(URL ลิงค์แสดงรายละเอียดข่าวเว็บไซต์อื่น)</span></h3>
            <label>URL:</label><br />
            <input name="news_url" type="text" class="text medium" id="news_url" value="<?php echo"$news_url";?>" maxlength="255" />
            <span class="note error">*</span><br /><br />
          </p>
          <hr />
          <h3>รายละเอียดข่าว<span class="note">(*.doc, *.xls, *. pdf)</span></h3>
          <?php echo"$news_detail_file_print";?>
          <p class="fileupload">
            <label>ไฟล์รายละเอียดข่าว:</label><br />
            <input name="fileupload3" type="file" id="fileupload3" /><input type="hidden" name="MAX_FILE_SIZE" value="9000000">
          </p>
          <hr />
          <h3>รายละเอียดข่าว<span class="note">(โปรดกรอกข้อมูลรายละเอียดข่าว หากท่านไม่ได้ กรอก URL ลิงค์แสดงรายละเอียดข่าวเว็บไซต์อื่นหรือแนบไฟล์รายละเอียดข่าว)</span></h3>
          <p class="fileupload">
            <?php echo"$news_detail_picture_print";?><br />
            <label>รูปภาพข่าว:</label><br />
            <input name="fileupload2" type="file" id="fileupload2" /><input type="hidden" name="MAX_FILE_SIZE" value="9000000">
            <span class="note error" style="padding-left:94px">รูปภาพกว้างไม่เกิน 400 px</span>
          </p>
          <p>
            <?php
            	if($news_detail_format == "fl alignleft"){
					$img_left = ('checked="CHECKED"');
				}else if($news_detail_format == "fr alignright"){
					$img_right = ('checked="CHECKED"');
				}
			?>
            <label for="cbdemo1" style="padding-right:25px">รูปแบบแสดงรูปภาพข่าว</label>
            <input name="news_detail_format" type="radio" class="radio" value="fl alignleft" <?php echo "$img_left";?> />
            <label for="cbdemo1" style="padding-right:25px"> รูปอยู่ตำแหน่งซ้าย</label>
            <input name="news_detail_format" type="radio" class="radio" value="fr alignright" <?php echo "$img_right";?> />
            <label for="cbdemo1" style="padding-right:25px"> รูปอยู่ตำแหน่งขวา</label>
          </p>
          <p>
            <label>รายละเอียดข่าว:</label><br />
            <textarea name="news_detail_descriptions" class="wysiwyg" id="news_detail_descriptions"><?php echo"$news_detail_descriptions";?></textarea>
          </p>
          <hr />
          <p>
            <input type="submit" class="submit small" value="บันทึก" />
            <input name="Reset" type="reset" class="submit small" value="ยกเลิก" />
            <input name="news_id" type="hidden" id="news_id" value="<?php echo"$news_id";?>" />
            <input name="Photo_Del" type="hidden" id="Photo_Del" value="<?php echo"$news_picture";?>" />
            <input name="Photo_Del2" type="hidden" id="Photo_Del2" value="<?php echo"$news_detail_picture";?>" />
            <input name="Photo_Del3" type="hidden" id="Photo_Del3" value="<?php echo"$news_detail_file";?>" />
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
