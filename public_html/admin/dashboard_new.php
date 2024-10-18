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
        <li class="active"><a href="dashboard_new.php">หน้าแรก</a></li>
        <li class="drop"><a href="">ใบรับรอง »»</a>
            <ul>
                <li><a href="certificate_display_new.php"><span></span>ใบรับรอง</a></li>    
                <li><a href="certificate_add_new.php"><span></span>เพิ่มใบรับรองแบบใหม่</a></li>    
                <li><a href=""><span></span>รายงาน 1.3</a></li>    
                <li><a href=""><span></span>รายงาน 1.4 ก</a></li>    
                <li><a href=""><span></span>รายงาน 1.4 ข</a></li>   
                <li><a href=""><span></span>รายงาน 1.4 ค</a></li> 
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
<h2>รายงานสถิติผู้เข้าชมเว็บไซต์</h2>
<form name="form_chk" id="form_chk" method="post" action="" onsubmit="return ChkFromDate();">
<ul>
<li>กรุณาเลือกเดือน/ปี :
<label>
<select name="month" id="month">
    <option value="0">เดือน</option>
    <option value="01">มกราคม</option>
    <option value="02">กุมภาพันธ์</option>
    <option value="03">มีนาคม</option>
    <option value="04">เมษายน</option>
    <option value="05">พฤษภาคม</option>
    <option value="06">มิถุนายน</option>
    <option value="07">กรกฎาคม</option>
    <option value="08">สิงหาคม</option>
    <option value="09">กันยายน</option>
    <option value="10">ตุลาคม</option>
    <option value="11">พฤศจิกายน</option>
    <option value="12">ธันวาคม</option>
</select>
<select name="years" id="years">
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
</select>
&nbsp;&nbsp;
<input type="submit" name="Submit" id="submit" class="submit tiny" value="GO" />
<? 
$month=$_REQUEST['month'];
$years=$_REQUEST['years'];

if($month!=""){
if($month=="01"){
	$str_m="มกราคม";
} if($month=="02") {
	$str_m="กุมภาพันธ์";
} if($month=="03") {
	$str_m="มีนาคม";
} if($month=="04") {
	$str_m="เมษายน";
} if($month=="05") {
	$str_m="พฤษภาคม";
} if($month=="06") {
	$str_m="มิถุนายน";
} if($month=="07") {
	$str_m="กรกฎาคม";
} if($month=="08") {
	$str_m="สิงหาคม";
} if($month=="09") {
	$str_m="กันยายน";
} if($month=="10") {
	$str_m="ตุลาคม";
} if($month=="11") {
	$str_m="พฤศจิกายน";
} if($month=="12") {
	$str_m="ธันวาคม";
} if($str_m=="") {
	$show2="";
} else {
	$years2=$years+543;
	$show2="<h3>เดือน$str_m $years2</h3>";
}
} else {

$date_today=date("Y-m-d");
list($years, $month, $d) = explode("-", $date_today);

$date=date("Y-m-d");
list($y, $m, $d) = explode("-", $date);
$y = $y+543;
if($m=="01"){ $str_m="มกราคม"; }else if($m=="02"){$str_m="กุมภาพันธ์"; } else if($m=="03"){$str_m="มีนาคม";}else if($m=="04"){$str_m="เมษายน";  }else if($m=="05"){$str_m="พฤษภาคม"; }else if($m=="06"){$str_m="มิถุนายน"; } else if($m=="07"){$str_m="กรกฎาคม"; } else if($m=="08"){$str_m="สิงหาคม"; } else if($m=="09"){$str_m="กันยายน"; } else if($m=="10"){$str_m="ตุลาคม"; } else if($m=="11"){$str_m="พฤศจิกายน"; } else {$str_m="ธันวาคม"; }
$show="เดือน$str_m ปี $y";
}
?>
</label>

</li>
</ul>
</form>
                   
</div>	
<div class="block_content">
<?php
if($show2 == ""){
$date_today=date("Y-m-d");
list($years, $month, $d) = explode("-", $date_today);
	if($month=="01"){
		$str_m="มกราคม";
	} if($month=="02") {
		$str_m="กุมภาพันธ์";
	} if($month=="03") {
		$str_m="มีนาคม";
	} if($month=="04") {
		$str_m="เมษายน";
	} if($month=="05") {
		$str_m="พฤษภาคม";
	} if($month=="06") {
		$str_m="มิถุนายน";
	} if($month=="07") {
		$str_m="กรกฎาคม";
	} if($month=="08") {
		$str_m="สิงหาคม";
	} if($month=="09") {
		$str_m="กันยายน";
	} if($month=="10") {
		$str_m="ตุลาคม";
	} if($month=="11") {
		$str_m="พฤศจิกายน";
	} if($month=="12") {
		$str_m="ธันวาคม";
	}
	$years2=$years+543;
	echo"<h3>เดือน$str_m $years2</h3>";
}else{
	echo"$show2";
}
?>
<p></p> 
<p></p>
<?php
     print("<table class='stats' rel='line' cellpadding='0' cellspacing='0' width='100%'> "); 
           printf("<thead>
				  	<tr height='25' class='setfonthead'>
						<th style='text-align:center;'>อาทิตย์</th>
						<th style='text-align:center;'>จันทร์</th>
						<th style='text-align:center;'>อังคาร</th>
						<th style='text-align:center;'>พุธ</th>
						<th style='text-align:center;'>พฤหัสบดี</th>
						<th style='text-align:center;'>ศุกร์</th>
						<th style='text-align:center;'>เสาร์</th>
					</tr>
				</thead>"); 
          $fdom=date("w",mktime(0,0,0,$month,1,$years)); 
          $ct=0;
		    if($month=="01"||$month=="10")
		  {
				$rs=7;
		  }
		  else
		  {
				$rs=6;  
			}
		  
          for($row=1;$row<$rs;$row++) 
          { 
               print("<tr class='setfontbody'>"); 
               for($week=1;$week<8;$week++) 
               { 
                    $ct++; 
                    $value=mktime(0,0,0,$month,$ct-$fdom,$years); 
                    if (date("m",$value)==$month) 
                    { 
						$d2=date("d",$value);
						$sql_visit="select  *  from counter where date='$d2' and   month='$month' and years='$years' group by ip_visit" ;
						$result_visit=mysqli_query($link,$sql_visit) ;
						$ip=mysql_num_rows($result_visit);
						$sum+=mysql_num_rows($result_visit);
                         printf ("<th height='35' style='text-align:center;'>%s</th>",$ip); 
                    } 
                    else
                    {
                         print("<td></td>"); 
                    }
               }
              
           }
          print("</tr>"); 
     print("</table>"); 
	 print("<p><div style='float:right;'><h1>รวมทั้งหมด $sum คน</h1></div></p>"
);
	  ?>
               
            </div>
        <div class="bendl"></div>
        <div class="bendr"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
function ChkFromDate(){
	if(document.form_chk.month.value == "0") {
		alert("โปรดระบุเดือนค่ะ");
		document.form_chk.month.focus();
		return false ;
	}else{
		return true ;
	}
}
</script>
<?php include "footer.php";?>
</body>
</html>
