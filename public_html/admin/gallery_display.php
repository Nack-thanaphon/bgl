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
        <li class="drop active"><a href="">Gallery »</a>
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
                <h2>รูปภาพ Gallery</h2>
                <ul>
                    <li><a href="gallery_display.php"><span></span>Gallery</a></li>    
                    <li><a href="gallery_add.php"><span></span>เพิ่มรูปภาพ Gallery</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$type = $_REQUEST['type'];
$dele = $_REQUEST['check'];
$gallery_id = $_REQUEST['gallery_id'];
$gallery_status = $_REQUEST['gallery_status'];
$file_del = $_REQUEST['file_del'];

if ($type == "del"){
	$del_sql="delete from gallery where gallery_id = '$gallery_id'";
	$result_del =  mysqli_query($link,$del_sql);
		if($file_del <> ""){
			$file_del="../file_gallery/".$file_del ;
				if (file_exists($file_del)){
					unlink($file_del) ;
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
		$gallery_id=$dele[$i];
		$sql="select * from gallery where gallery_id = '$gallery_id'";
		$result = mysqli_query($link,$sql) ;
		$row = mysqli_fetch_array($result);
		$gallery_picture = $row['gallery_picture'] ;
			if($gallery_picture <> ""){
				if (file_exists ("../file_gallery/$gallery_picture")){
					unlink("../file_gallery/$gallery_picture") ;
				}
			}
		$del_sql="delete from gallery where gallery_id = '$gallery_id'";
		$result_del =  mysqli_query($link,$del_sql);
	}
		if ($result_del) {
			echo('<div class="message success"><p>ลบข้อมูลเรียบร้อยค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถลบข้อมูลได้ค่ะ</p></div>');
		}

} else if ($type == "delall" and $dele == ""){
	echo('<div class="message warning"><p>โปรดเลือกรายการที่ต้องการลบอย่างน้อย 1 รายการค่ะ</p></div>');
}

if ($type == "status"){
	if ( $gallery_status == "n" ) {
		$status2 = "y";
	} else {
		$status2 = "n";
	}
	$update_status = "update gallery set gallery_status = '$status2' where gallery_id = '$gallery_id'";
	$status_result = mysqli_query($link,$update_status);
		if ($status_result) {
			echo('<div class="message success"><p>แก้ไขสถานะเรียบร้อยแล้ว</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถแก้ไขสถานะได้</p></div>');
		}
}	
?>
        <form action="" method="post">
            <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                <thead>
                    <tr>
                        <th width="40"><input type="checkbox" class="check_all" /></th>
                        <th width="593">หัวข้อรูปภาพ</th>
                        <th class="center" width="120">รูปภาพ</th>
                        <th class="center" width="40">วีดีโอ</th>
                        <th class="center" width="100">วันที่</th>
                        <th class="center" width="60">สถานะ</th>
                        <th class="center" width="80">แก้ไข/ลบ</th>
                    </tr>
                </thead>
                <tbody>
<?php
$Page_p = $_REQUEST['Page_p'];
$no = 1;
$sql="select * from gallery order by gallery_id desc" ;

$Per_Page =10;
if(!$Page_p)
$Page_p=1;
				
$Prev_Page = $Page_p-1;
$Next_Page = $Page_p+1;

$result=mysqli_query($link,$sql) ;
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
$sql = "select * from gallery order by gallery_id desc LIMIT $Page_start , $Per_Page" ;	
$result = mysqli_query($link,$sql);
	while($row = mysqli_fetch_array($result)){
	$gallery_id = $row['gallery_id'];
	$gallery_name = $row['gallery_name'];
	$gallery_date = $row['gallery_date'];
	$gallery_url = $row['gallery_url'];
		if ($gallery_url != ""){
			$gallery_url_print = "<img src='../images/youtube.png' />";
		} else {
			$gallery_url_print = "-";
		}
	$gallery_picture = $row['gallery_picture'];
		if ($gallery_picture != ""){
			$ext = strtolower(end(explode('.', $gallery_picture)));
			$gallery_picture_print = "<img src='../file_gallery/$gallery_picture' height='50' />";
		} else {
			$gallery_picture_print = "";
		}
	$gallery_status = $row['gallery_status'];
		if ($gallery_status == "y"){
			$status = "<img src='images_admin/ico_success.png' title='คลิก แสดงข้อมูลภายหลัง'/>";
		} else {
			$status = "<img src='images_admin/ico_error.png' title='คลิก แสดงข้อมูล' />";
		}
?>
                    <tr>
                        <td><input name="check[]" type="checkbox" id="check[]" value="<? echo"$gallery_id";?>"/></td>
                        <td><?php echo"$gallery_name";?></td>
                        <td class="center"><?php echo"$gallery_picture_print";?></td>
                        <td class="center"><?php echo"$gallery_url_print";?></td>
                        <td><?php echo"$gallery_date";?></td>
                        <td class="delete"><a href="gallery_display.php?Page_p=<?php echo"$Page_p";?>&gallery_id=<?php echo"$gallery_id";?>&gallery_status=<?php echo"$gallery_status";?>&type=status"><?php echo"$status";?></a></td>
                        <td class="delete"><a href="gallery_edit.php?Page_p=<?php echo"$Page_p";?>&gallery_id=<?php echo"$gallery_id";?>"><img src="images_admin/ico_edit.png" alt="" title="แก้ไข" width="16" height="16" /></a>
                        <a href="gallery_display.php?Page_p=<?php echo"$Page_p";?>&gallery_id=<?php echo"$gallery_id";?>&file_del=<?php echo"$gallery_picture";?>&type=del" onclick="return confirm ('ยืนยันลบข้อมูล')"><img src="images_admin/ico_delete.png" alt="" title="ลบ" width="16" height="16" /></a></td>
                    </tr>
<?php $no++; } ?>
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
