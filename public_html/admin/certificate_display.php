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
	if(document.form_chk.file_number.value == "") {
		alert("โปรดกรอก File Number ค่ะ");
		document.form_chk.file_number.focus();
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
                <h2>ใบรับรอง</h2>
                <ul>
                    <li><a href="certificate_display.php">ใบรับรอง</a></li>
                    <li><a href="certificate_add.php">เพิ่มใบรับรอง</a></li>
                </ul>
			</div>
            
        <div class="block_content">

        <form id="form_chk" name="form_chk" method="post" action="" enctype="multipart/form-data" onsubmit="return ChkFrom();">
            <p class="center" style="margin: 20px 0;">
                <label>File Number:</label>
                <input name="file_number" type="text" class="text small" id="file_number" maxlength="40" />
                <input name="file_check" type="hidden" value="1"/>
                <input type="submit" class="submit small" value="ค้นหา" />
            </p>
        </form>
        
<?php
include "../connections/config.inc.php";

$type = $_REQUEST['type'];
$dele = $_REQUEST['check'];

if ($type == "del"){
	$certificate_id = $_REQUEST['certificate_id'];
	$picture_del = $_REQUEST['picture_del'];
	$del_sql="delete from certificate where certificate_id = '$certificate_id'";
	$result_del =  mysqli_query($db,$del_sql);
		if($picture_del <> ""){
			$picture_del = "../thumbnail_certificate/".$picture_del ;
				if (file_exists($picture_del)){
					unlink($picture_del) ;
				}
		}

		if ($result_del) {
			echo('<div class="message success"><p>ลบข้อมูลเรียบร้อยค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถลบข้อมูลได้ค่ะ</p></div>');
		}
}

if ($type == "delall" and $dele != ""){
	for($i=0;$i<count($dele);$i++){
		$certificate_id=$dele[$i];
		$sql="select * from certificate where certificate_id = '$certificate_id'";
		$result=mysqli_query($db,$sql) ;
		$row=mysqli_fetch_array($result);
		$picture = $row['picture'] ;
			if($picture <> ""){
				if (file_exists ("../thumbnail_certificate/$picture")){
					unlink("../thumbnail_certificate/$picture") ;
				}
			}
		$del_sql="delete from certificate where certificate_id = '$certificate_id'";
		$result_del =  mysqli_query($db,$del_sql);
	}
		if ($result_del) {
			echo('<div class="message success"><p>ลบข้อมูลเรียบร้อยค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถลบข้อมูลได้ค่ะ</p></div>');
		}

} else if ($type == "delall" and $dele == ""){
	echo('<div class="message warning"><p>โปรดเลือกรายการที่ต้องการลบอย่างน้อย 1 รายการค่ะ</p></div>');
}
?>
        <form action="" method="post">
            <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                <thead>
                    <tr>
                        <th width="10"><input type="checkbox" class="check_all" /></th>
                        <th>File Number</th>
                        <th>Weight</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th class="center" width="60">แก้ไข/ลบ</th>
                    </tr>
                </thead>
                <tbody>

<?php
$file_check = $_REQUEST['file_check'];
if ($file_check == 1) {
?>  
              
<?php
$file_number_search = $_REQUEST['file_number'];
$Page_p = $_REQUEST['Page_p'];
$no = 1;
$sql="select * from certificate where file_number='$file_number_search' order by certificate_id desc" ;

$Per_Page =50;
if(!$Page_p)
$Page_p=1;
				
$Prev_Page = $Page_p-1;
$Next_Page = $Page_p+1;

$result=mysqli_query($db,$sql) ;
$Page_start = ($Per_Page*$Page_p)-$Per_Page;
$Num_Rows = mysql_num_rows($result);
				
if($Num_Rows<=$Per_Page)
$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
$Num_Pages =($Num_Rows/$Per_Page) ;
else
$Num_Pages =($Num_Rows/$Per_Page) +1;
			
$Num_Pages = (int)$Num_Pages;
			
 if(($Page_p>$Num_Pages) || ($Page_p<0))
print "";
$sql = "select * from certificate where file_number='$file_number_search' order by certificate_id desc LIMIT $Page_start , $Per_Page" ;		
$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
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
		if($type_certificate == "1"){
			$type_certificate_print = "Verbal";
		}else if($type_certificate == "2"){
			$type_certificate_print = "Short report";
		}else if($type_certificate == "3"){
			$type_certificate_print = "Full report";
		}
?>
                    <tr>
                        <td><input name="check[]" type="checkbox" id="check[]" value="<? echo"$certificate_id";?>"/></td>
                        <td><?php echo"$file_number";?></td>
                        <td><?php echo"$weight";?> Cts.</td>
                        <td><?php echo"$date_print";?></td>
                        <td><?php echo"$type_certificate_print";?></td>
                        <td class="delete"><a href="certificate_edit.php?Page_p=<?php echo"$Page_p";?>&certificate_id=<?php echo"$certificate_id";?>"><img src="images_admin/ico_edit.png" alt="" title="แก้ไข" width="16" height="16" /></a> <a href="certificate_display.php?Page_p=<?php echo"$Page_p";?>&certificate_id=<?php echo"$certificate_id";?>&picture_del=<?php echo"$picture";?>&type=del" onclick="return confirm ('ยืนยันลบข้อมูล')"><img src="images_admin/ico_delete.png" alt="" title="ลบ" width="16" height="16" /></a></td>
                    </tr>
<?php $no++; } ?>
<?php }else{ ?>

<?php
$no = 1;
$sql="select * from certificate order by certificate_id desc LIMIT 10" ;
$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
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
		if($type_certificate == "1"){
			$type_certificate_print = "Verbal";
		}else if($type_certificate == "2"){
			$type_certificate_print = "Short report";
		}else if($type_certificate == "3"){
			$type_certificate_print = "Full report";
		}
?>
                    <tr>
                        <td><input name="check[]" type="checkbox" id="check[]" value="<? echo"$certificate_id";?>"/></td>
                        <td><?php echo"$file_number";?></td>
                        <td><?php echo"$weight";?> Cts.</td>
                        <td><?php echo"$date_print";?></td>
                        <td><?php echo"$type_certificate_print";?></td>
                        <td class="delete"><a href="certificate_edit.php?Page_p=<?php echo"$Page_p";?>&certificate_id=<?php echo"$certificate_id";?>"><img src="images_admin/ico_edit.png" alt="" title="แก้ไข" width="16" height="16" /></a> <a href="certificate_display.php?Page_p=<?php echo"$Page_p";?>&certificate_id=<?php echo"$certificate_id";?>&picture_del=<?php echo"$picture";?>&type=del" onclick="return confirm ('ยืนยันลบข้อมูล')"><img src="images_admin/ico_delete.png" alt="" title="ลบ" width="16" height="16" /></a></td>
                    </tr>
<?php $no++; } ?>

<?php } ?>
                </tbody>
            </table>
        <div class="tableactions">
        	<input type="submit" class="submit tiny" value="ลบรายการทีเลือก" />
            <input name="type" type="hidden" id="type" value="delall" />
        </div>
		<div class="pagination right">
<?php if($Prev_Page)
	echo " <a href='$PHP_SELF?Page_p=$Prev_Page'>&laquo;</a> ";
	for($i=1; $i<$Num_Pages; $i++){
		if($i != $Page_p)
		echo " <a href='$PHP_SELF?Page_p=$i'>$i</a> ";
		else
	echo "<a href='#' class='active'>$i</a>";
	}
				
if($Page_p!=$Num_Pages)
	echo " <a href ='$PHP_SELF?Page_p=$Next_Page'>&raquo;</a> ";
?>
		</div>
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
