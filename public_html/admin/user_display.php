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
                <h2>ผู้ดูแลระบบ</h2>
                <ul>
                    <li><a href="user_display.php">ผู้ดูแลระบบ</a></li>
                    <li><a href="user_add.php">เพิ่ิมผู้ดูแลระบบ</a></li>
                </ul>
			</div>
            
        <div class="block_content">
<?php
include "../connections/config.inc.php";
$type = $_REQUEST['type'];
$dele = $_REQUEST['check'];
$user_id = $_REQUEST['user_id'];
$status = $_REQUEST['status'];

if($type == "status"){
	if( $status == "n" ){
		$status2="y";
	}else{
		$status2="n";
	}
	$update_status = "update user set status = '$status2' where user_id = '$user_id'";
	$status_result = mysqli_db_query($db,$update_status);
		if ($status_result) {
			echo('<div class="message success"><p>แก้ไขสถานะเรียบร้อยแล้ว</p></div>');
		} else {
			echo('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขสถานะได้</p></div>');
		}
}

if($type == "resetpass"){
	$user_sql = "select * from user where user_id = '$user_id' ";
	$user_result =  mysqli_db_query($db,$user_sql);
	$user_row = mysqli_fetch_array($user_result) ;
		$user_id = $user_row['user_id'];
		$username = $user_row['username'];
		$first_name = $user_row['first_name'];
		$last_name = $user_row['last_name'];
		$email = $user_row['email'];

	$gen=6;
	$char_pass = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$pass = ""; 
		while(strlen($pass)<$gen) {
			$pass .= $char_pass[rand()%strlen($char_pass)]; 
		}
	$pwd_new = md5($pass);
	
	$sql_pwd = "update user set password = '$pwd_new' where user_id = '$user_id' ";
	$result_pwd = mysqli_db_query($db,$sql_pwd);
		if($result_pwd){
			echo('<div class="message success"><p>ตั้งค่ารหัสผ่านใหม่เรียบร้อยแล้วค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถตั้งค่ารหัสผ่านใหม่ได้ค่ะ</p></div>');
		}

	$strTo = "$email";
	$strSubject = "แจ้งการเปลี่ยนรหัสผ่านใหม่";
	$strMessage = "เรียนคุณ $first_name $last_name <br>
	<b>แจ้งการเปลี่ยนรหัสผ่านใหม่</b><br><br>
	Username: $username <br>
	E-mail: $email <br>
	Password: $pass <br><br>
	<a href='#'>คลิกที่นี้ เพื่อไปยังหน้าล็อกอินเข้าระบบ</a> <br>";
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

if($type == "del"){
	$del_sql="delete from user where user_id = '$user_id'";
	$result_del =  mysqli_db_query($db,$del_sql);
		if($result_del){
			echo('<div class="message success"><p>ลบข้อมูลเรียบร้อยค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถลบข้อมูลได้ค่ะ</p></div>');
		}
}

if($type == "delall" and $dele != ""){
	for($i=0;$i<count($dele);$i++){
		$user_id = $dele[$i];
		$del_sql = "delete from user where user_id = '$user_id'";
		$result_del =  mysqli_db_query($db,$del_sql);
	}
		if($result_del){
			echo('<div class="message success"><p>ลบข้อมูลเรียบร้อยค่ะ</p></div>');
		} else {
			echo('<div class="message errormsg"><p>ไม่สามารถลบข้อมูลได้ค่ะ</p></div>');
		}

}else if($type == "delall" and $dele == ""){
	echo('<div class="message warning"><p>โปรดเลือกรายการที่ต้องการลบอย่างน้อย 1 รายการค่ะ</p></div>');
}
?>
        <form action="" method="post">
            <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                <thead>
                    <tr>
                        <th width="10"><input type="checkbox" class="check_all" /></th>
                        <th>Username</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทร</th>
                        <th>วันที่สร้าง</th>
                        <th class="center" width="35">สถานะ</th>
                        <th class="center" width="90">ตั้งค่ารหัสผ่าน</th>
                        <th class="center" width="60">แก้ไข/ลบ</th>
                    </tr>
                </thead>
                <tbody>
<?php
$Page_p = $_REQUEST['Page_p'];
$no = 1;
$sql="select * from user where user_id != '1' order by user_id desc" ;

$Per_Page =50;
if(!$Page_p)
$Page_p=1;
				
$Prev_Page = $Page_p-1;
$Next_Page = $Page_p+1;

$result=mysqli_db_query($db,$sql) ;
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
$sql = "select * from user where user_id != '1' order by user_id desc LIMIT $Page_start , $Per_Page" ;	
$result = mysqli_db_query($db,$sql);
	while($row = mysqli_fetch_array($result)){
	$user_id = $row['user_id'];
	$username = $row['username'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$phone = $row['phone'];
	$status = $row['status'];		
	$create_date = $row['create_date'];
	list($y, $m, $d ) = explode("-", $create_date);
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
	$create_date_print = $d." ".$month." ".$y;
	
		if ($status == "y"){
			$status_print = "<img src='images_admin/ico_success.png' title='คลิก ระงับการเข้าใช้งาน'/>";
		} else {
			$status_print = "<img src='images_admin/ico_error.png' title='คลิก เข้าใช้งาน' />";
		}
?>
                    <tr>
                        <td><input name="check[]" type="checkbox" id="check[]" value="<? echo"$user_id";?>"/></td>
                        <td><?php echo"$username";?></td>
                        <td><?php echo"$first_name $last_name";?></td>
                        <td><?php echo"$email";?></td>
                        <td><?php echo"$phone";?></td>
                        <td><?php echo"$create_date_print";?></td>
                        <td class="delete"><a href="user_display.php?Page_p=<?php echo"$Page_p";?>&user_id=<?php echo"$user_id";?>&status=<?php echo"$status";?>&type=status"><?php echo"$status_print";?></a></td>
                        <td class="delete"><a href="user_display.php?Page_p=<?php echo"$Page_p";?>&user_id=<?php echo"$user_id";?>&type=resetpass" onclick="return confirm ('ยืนยันการตั้งค่ารหัสผ่านใหม่ ระบบจะส่ง Password ทาง e-mail นี้')"><img src="images_admin/ico_settings.png" title="ตั้งค่ารหัสผ่านใหม่" width="16" height="16" /></a></td>
                        <td class="delete"><a href="user_edit.php?Page_p=<?php echo"$Page_p";?>&user_id=<?php echo"$user_id";?>"><img src="images_admin/ico_edit.png" alt="" title="แก้ไข" width="16" height="16" /></a> <a href="user_display.php?Page_p=<?php echo"$Page_p";?>&user_id=<?php echo"$user_id";?>&picture_del=<?php echo"$picture";?>&type=del" onclick="return confirm ('ยืนยันลบข้อมูล')"><img src="images_admin/ico_delete.png" alt="" title="ลบ" width="16" height="16" /></a></td>
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
