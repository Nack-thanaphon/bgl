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
function isEng(elem){
	var alphaExp = /^[A-Za-z0-9]+$/;
		if(elem.match(alphaExp)){
			return false;
		}else
			return true;
}
function ChkFrom(){
	if(document.form_edit.file_number.value == "") {
		alert("โปรดกรอก File Number ค่ะ");
		document.form_edit.file_number.focus();
		return false ;
	}
	if (isEng(document.form_edit.file_number.value)) {
		alert("รูปแบบที่กรอก File Number ต้องเป็น A-Z, a-z, 0-9 เท่านั้น");
			document.form_edit.file_number.focus() ;
		return false ;
	}
	if(document.form_edit.file_number.value.length < 5) {
		alert("File Number ความยาวไม่น้อยกว่า 5 ตัวอักษร");
		document.form_edit.file_number.focus();
		return false ;
	}
	if(document.form_edit.file_number_pass.value == "") {
		alert("โปรดกรอก Password ค่ะ");
		document.form_edit.file_number_pass.focus();
		return false ;
	}
	if(document.form_edit.date.value == "") {
		alert("โปรดกรอก Date ค่ะ");
		document.form_edit.date.focus();
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
        <li class="drop active"><a href="">ใบรับรอง »</a>
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
                <h2>แก้ไขใบรับรอง</h2>
                <ul>
                    <li><a href="certificate_display.php">ใบรับรอง</a></li>
                    <li><a href="certificate_add.php">เพิ่มใบรับรอง</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$certificate_id = $_REQUEST['certificate_id'];
$message = $_REQUEST['message'];
if($message == "success"){
	echo('<div class="message success"><p>บันทึกข้อมูลเรียบร้อยแล้วค่ะ</p></div>');
}else if($message == "warning"){
	echo('<div class="message warning"><p>File Number ซ้ำ โปรดกรอก File Number ใหม่ค่ะ</p></div>');
}else if($message == "error"){
	echo('<div class="message errormsg"><p>ไม่สามารถบันทึกข้อมูลได้ค่ะ</p></div>');
}else if($message == "info" or $message == ""){
	echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
}
$sql = "select * from certificate where certificate_id = '$certificate_id'";
$result = mysqli_db_query ($db,$sql);
$row = mysqli_fetch_array($result);
	$certificate_id = $row['certificate_id'];
	$certificate_order = $row['certificate_order'];
	$type_certificate = $row['type_certificate'];
	$file_number = $row['file_number'];
	$date = $row['date'];
	$shape_and_cut = $row['shape_and_cut'];
	$weight = $row['weight'];
	$dimensions = $row['dimensions'];
	$color = $row['color'];
	$identification = $row['identification'];
	$magnification = $row['magnification'];
	$picture = $row['picture'];
	$conment = $row['conment'];
	list($y, $m, $d ) = explode("-", $date);
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
		if ($date == "0000-00-00"){
			$date_print = "";
		} else {
			$date_print = "$date_print";
		}
		if ($picture != ""){
			$picture_print = "<img src='../thumbnail_certificate/$picture' />";
		} else {
			$picture_print = "<img src='images_admin/no_picture.jpg' />";
		}
?>
        <form id="form_edit" name="form_edit" method="post" action="certificate_edit_record.php" enctype="multipart/form-data" onsubmit="return ChkFrom();">
          <p>
            <label>ประเภท:</label><br />
            <select name="type_certificate" id="type_certificate">
			<?php
                if($type_certificate == "1"){
                    $type_certificate1 = ('selected="selected"');
                }else if($type_certificate == "2"){
                    $type_certificate2 = ('selected="selected"');
                }else if($type_certificate == "3"){
                    $type_certificate3 = ('selected="selected"');
                }
            ?>
                <option value="1" <?php echo"$type_certificate1";?>>Verbal</option>
                <option value="2" <?php echo"$type_certificate2";?>>Short report</option>
                <option value="3" <?php echo"$type_certificate3";?>>Full report</option>
            </select>
            <span class="note error">*</span>
          </p>
          <p>
            <label>File Number:</label><br />
            <input name="file_number" type="text" class="text small" id="file_number" value="<?php echo "$file_number";?>" maxlength="40" />
            <span class="note error">*</span>
          </p>
          <p>
            <label>Date:</label><br />
            <input name="date" type="text" class="text date_picker" id="date" value="<?php echo "$date_print";?>" />
            <span class="note error">*</span>
          </p>
          <p>
            <label>Shape and Cut:</label><br />
            <input name="shape_and_cut" type="text" class="text medium" id="shape_and_cut" value="<?php echo "$shape_and_cut";?>" maxlength="40" /> 
          </p>
          <p>
            <label>Weight:</label><br />
            <input name="weight" type="text" class="text medium" id="weight" value="<?php echo "$weight";?>" maxlength="40" /> Cts.
          </p>
          <p>
            <label>Dimensions:</label><br />
            <input name="dimensions" type="text" class="text medium" id="dimensions" value="<?php echo "$dimensions";?>" maxlength="40" />
          </p>
          <p>
            <label>Color:</label><br />
            <input name="color" type="text" class="text medium" id="color" value="<?php echo "$color";?>" maxlength="40" />
          </p>
          <p>
            <label>Identification:</label><br />
            <input name="identification" type="text" class="text medium" id="identification" value="<?php echo "$identification";?>" maxlength="40" />
          </p>
          <p>
            <label>Magnification:</label><br />
            <input name="magnification" type="text" class="text medium" id="magnification" value="<?php echo "$magnification";?>" maxlength="40" />
          </p>
          <p class="fileupload">
            <label>รูปภาพ:</label><br />
            <?php echo"$picture_print";?><br /><br />
            <input name="fileupload" type="file" id="fileupload" />
            <span class="note error" style="padding-left:94px">* รูปภาพขนาดกว้าง 100 px</span>
          </p>
          <p>
            <label>Comments:</label><br />
            <textarea name="conment" cols="50" rows="5" id="conment"><?php echo "$conment";?></textarea>
          </p>
          <hr />
          <p>
            <input type="submit" class="submit small" value="บันทึก" />
            <input name="Reset" type="reset" class="submit small" value="ยกเลิก" />
            <input name="certificate_id" type="hidden" id="certificate_id" value="<?php echo"$certificate_id";?>" />
            <input name="Photo_Del" type="hidden" id="Photo_Del" value="<?php echo"$picture";?>" />
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
