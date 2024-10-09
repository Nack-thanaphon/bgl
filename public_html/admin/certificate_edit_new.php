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
                if(elem.match(alphaExp))
                {
                    return false;
                }else
					return true;
            }
			function isNumber(n) {
				return !isNaN(parseFloat(n)) && isFinite(n);
			}
			function radioValue(rdo){
				for(var i = 0; i < rdo.length; i++){
					if(rdo[i].checked){
						return rdo[i].value;
					}
				}
			}

            function ChkFrom(){
				// customer
				document.form_add.customer.value = document.form_add.customer.value.trim();
				if(document.form_add.customer.value == ""){
                    alert("โปรดกรอก CUSTOMER ค่ะ");
                    document.form_add.customer.focus();
                    return false ;
                }
				
				// file_number
				document.form_add.file_number.value = document.form_add.file_number.value.trim();
				if(document.form_add.file_number.value == ""){
                    alert("โปรดกรอก File Number ค่ะ");
                    document.form_add.file_number.focus();
                    return false ;
                }
				 if (isEng(document.form_add.file_number.value)){
                    alert("รูปแบบที่กรอก File Number ต้องเป็น A-Z, a-z, 0-9 เท่านั้น");
                    document.form_add.file_number.focus() ;
                    return false ;
                }
				if(document.form_add.file_number.value.length < 4){
                    alert("File Number ความยาวไม่น้อยกว่า 4 ตัวอักษร");
                    document.form_add.file_number.focus();
                    return false ;
                }

				//cer_date
				document.form_add.cer_date.value = document.form_add.cer_date.value.trim();
				if(document.form_add.cer_date.value == ""){
                    alert("โปรดกรอก DATE ค่ะ");
                    document.form_add.cer_date.focus();
                    return false ;
                }

				// dimension
				if(radioValue(document.form_add.dimension) == 1){
					document.form_add.d1.value = document.form_add.d1.value.trim();
					if ( ! isNumber(document.form_add.d1.value)){
						alert("โปรดกรอก DIMENSION เป็นตัวเลข ค่ะ");
						document.form_add.d1.focus();
						return false ;
					}
					document.form_add.d2.value = document.form_add.d2.value.trim();
					if ( ! isNumber(document.form_add.d2.value)){
						alert("โปรดกรอก DIMENSION เป็นตัวเลข ค่ะ");
						document.form_add.d2.focus();
						return false ;
					}
					document.form_add.d3.value = document.form_add.d3.value.trim();
					if ( ! isNumber(document.form_add.d3.value)){
						alert("โปรดกรอก DIMENSION เป็นตัวเลข ค่ะ");
						document.form_add.d3.focus();
						return false ;
					}
                }
				if(radioValue(document.form_add.dimension) == 2){
                    // do nothing
                }

				// weight
				document.form_add.weight.value = document.form_add.weight.value.trim();
				if(document.form_add.weight.value == ""){
                    alert("โปรดกรอก WEIGHT ค่ะ");
                    document.form_add.weight.focus();
                    return false ;
                }
				/*if ( ! isNumber(document.form_add.weight.value)){
					alert("โปรดกรอก WEIGHT เป็นตัวเลข ค่ะ");
					document.form_add.weight.focus();
					return false ;
				}*/
				
				// sg
				document.form_add.sg.value = document.form_add.sg.value.trim();
				if(document.form_add.sg.value != ""){
                    if ( ! isNumber(document.form_add.sg.value))
					{
						alert("โปรดกรอก SG เป็นตัวเลข ค่ะ");
						document.form_add.sg.focus();
						return false ;
					}
                }

				// ri
				document.form_add.ri.value = document.form_add.ri.value.trim();
				if(document.form_add.ri.value != ""){
                    if ( ! isNumber(document.form_add.ri.value))
					{
						alert("โปรดกรอก RI เป็นตัวเลข ค่ะ");
						document.form_add.ri.focus();
						return false ;
					}
                }


				// trim 
				document.form_add.pleochroism_v1.value = document.form_add.pleochroism_v1.value.trim();
				document.form_add.pleochroism_v2.value = document.form_add.pleochroism_v2.value.trim();
				document.form_add.immersion.value = document.form_add.immersion.value.trim();
				document.form_add.microscopic_other.value = document.form_add.microscopic_other.value.trim();
				document.form_add.cmt_g3_doublet_v1.value = document.form_add.cmt_g3_doublet_v1.value.trim();
				document.form_add.cmt_g3_doublet_v2.value = document.form_add.cmt_g3_doublet_v2.value.trim();
				document.form_add.cmt_g3_triplet_v1.value = document.form_add.cmt_g3_triplet_v1.value.trim();
				document.form_add.cmt_g3_triplet_v2.value = document.form_add.cmt_g3_triplet_v2.value.trim();
				document.form_add.cmt_g3_triplet_v3.value = document.form_add.cmt_g3_triplet_v3.value.trim();
				document.form_add.identification_nat.value = document.form_add.identification_nat.value.trim();	
				document.form_add.identification_syn.value = document.form_add.identification_syn.value.trim();	

				if(document.form_add.picture.value == ""){
                    alert("โปรดเลือก PICTURE ค่ะ");
                    document.form_add.picture.focus();
                    return false ;
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
        <li><a href="dashboard_new.php">หน้าแรก</a></li>
        <li class="drop active"><a href="">ใบรับรอง »</a>
            <ul>
                <li><a href="certificate_display_new.php"><span></span>ใบรับรอง</a></li>    
                <li><a href="certificate_add_new.php"><span></span>เพิ่มใบรับรอง</a></li>
            </ul>
        </li>
        <li class="drop"><a href="">ข่าวสาร »</a>
            <ul>
                <li><a href="news_display_new.php"><span></span>ข่าวสาร</a></li>    
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
                    <li><a href="certificate_display_new.php">ใบรับรอง</a></li>
                    <li><a href="certificate_add_new.php">เพิ่มใบรับรอง</a></li>
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
	$sql = "select * from certificate_new where certificate_id = '$certificate_id'";
	$result = mysqli_db_query ($db,$sql);
	$row = mysqli_fetch_array($result);
	$certificate_id = $row['certificate_id'];
	$certificate_order = $row['certificate_order'];
	$customer = $row['customer'];
	$type_certificate = $row['type_certificate'];
	$file_number = $row['file_number'];
	$date = $row['cer_date'];
	$dimension = $row['dimension'];
	$d1 = $row['d1'];
	$d2 = $row['d2'];
	$d3 = $row['d3'];
	$weight = $row['weight'];
	$shape = $row['shape'];
	$cut = $row['cut'];
	$color = $row['color'];
	$optic_character = $row['optic_character'];
	$optic_character_detail = $row['optic_character_detail'];
	$transparency = $row['transparency'];
	$sg = $row['sg'];
	$ri = $row['ri'];
	$fluorescent_lw = $row['fluorescent_lw'];
	$fluorescent_sw = $row['fluorescent_sw'];
	$ccf = $row['ccf'];
	$pleochroism = $row['pleochroism'];
	$pleochroism_v1 = $row['pleochroism_v1'];
	$pleochroism_v2 = $row['pleochroism_v2'];
	$spectrum = $row['spectrum'];
	$immersion = $row['immersion'];
	$microscopic = $row['microscopic'];
	$microscopic_other = $row['microscopic_other'];
	$shape_outline = $row['shape_outline'];
	$plotting = $row['plotting'];
	$cmt_g1 = $row['cmt_g1'];
	$cmt_g1_sub = $row['cmt_g1_sub'];
	$cmt_g1_sub_pb = $row['cmt_g1_sub_pb'];
	$cmt_g2 = $row['cmt_g2'];
	$cmt_g2_sub_glass = $row['cmt_g2_sub_glass'];
	$cmt_g2_sub_residual = $row['cmt_g2_sub_residual'];
	$cmt_g3 = $row['cmt_g3'];
	$cmt_g3_doublet_v1 = $row['cmt_g3_doublet_v1'];
	$cmt_g3_doublet_v2 = $row['cmt_g3_doublet_v2'];
	$cmt_g3_triplet_v1 = $row['cmt_g3_triplet_v1'];
	$cmt_g3_triplet_v2 = $row['cmt_g3_triplet_v2'];
	$cmt_g3_triplet_v3 = $row['cmt_g3_triplet_v3'];
	$identification = $row['identification'];
	$identification_nat = $row['identification_nat'];
	$identification_syn = $row['identification_syn'];
	$instrument = $row['instrument'];
	$adv_instrument = $row['adv_instrument'];
	$picture = $row['picture'];
	$comment = $row['comment'];
	$magnification = $row['magnification'];
	
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
        <form id="form_edit" name="form_edit" method="post" action="certificate_edit_record_new.php" enctype="multipart/form-data" onsubmit="return ChkFrom();">
                            <p>
                            <table  border="0" cellpadding="0" cellspacing="0" style="padding: 0">
                                <tr>
                                    <td style="width:100px;">
                                        CUSTOMER <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td style="width:250px;">
                                        <input name="customer" type="text" class="text big" maxlength="20" value="<?php echo $customer;?>" />
                                    </td>
                                    <td style="width:120px;">
                                        FILE NUMBER <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td style="width:290px;">
                                        <input name="file_number" type="text" class="text big" maxlength="20" value="<?php echo $file_number;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width:100px;">
                                        DATE <span class="note error">*</span>
                                    </td>
                                    <td valign="top" style="width:2px;">
                                    </td>
                                    <td valign="top" >
                                        <input name="cer_date" type="text" class="text date_picker" id="cer_date"  readonly="readonly" value="<?php echo $date_print;?>"/>
                                    </td>
                                    <td valign="top" style="width:100px;">
                                        DEMENSION <span class="note error">*</span>
                                    </td>
                                    <td valign="top" style="width:2px;">
                                    </td>
                                    <td valign="top" >
                                        <input type="radio" name="dimension" value="1"  <?php if($dimension==1){ echo "checked";}?>/>
                                        <input type="text" name="d1" class="text" style="width:45px;" maxlength="5" value="<?php echo $d1;?>"/> x 
                                        <input type="text" name="d2" class="text" style="width:45px;" maxlength="5" value="<?php echo $d2;?>"/> x 
                                        <input type="text" name="d3" class="text" style="width:45px;" maxlength="5" value="<?php echo $d3;?>"/> mm.<br /><br />
                                        <input type="radio" name="dimension" value="2" <?php if($dimension==2){ echo "checked";}?>/>
                                        <input type="text" name="ds" class="text" value="Setting" readonly="readonly" style="width:60px;" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        WEIGHT
                                        <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input name="weight" type="text" class="text big" style="width:70px;" maxlength="7" value="<?php echo $weight;?>"/> Cts.
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        SHAPE
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <select name="shape">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM shapes ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
												$chk_shape = ($row->name==$shape) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_shape>$row->name</option>";
												}
											?>
                                        </select>
                                    </td>
                                    <td style="width:100px;">
                                        CUT
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <select name="cut">
                                            <option value="" >เลือก</option>
											<?php
												$sql = "SELECT * FROM cuts ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													$chk_cut = ($row->name==$cut) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_cut>$row->name</option>";
												}
											?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        COLOR
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <select name="color">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM colors ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													$chk_color = ($row->name==$color) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_color>$row->name</option>";
												}
											?>
                                        </select>
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        OPTIC CHARACTER
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="optic_character" value="SR" <?php if($optic_character=="SR"){ echo "checked";}?>/> SR&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="ADR" <?php if($optic_character=="ADR"){ echo "checked";}?>/> ADR&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="DR" <?php if($optic_character=="DR"){ echo "checked";}?>/> DR
                                        <select name="optic_character_detail">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM drs ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) { 
													$chk_optic_character_detail = ($row->name==$optic_character_detail) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_optic_character_detail>$row->name</option>";
												}
											?>
                                        </select>&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="AGG" <?php if($optic_character=="AGG"){ echo "checked";}?>/> AGG
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        TRANSPARENCY
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="transparency" value="TP" <?php if($transparency=="TP"){ echo "checked";}?> /> TP&nbsp;
                                        <input type="radio" name="transparency" value="STP" <?php if($transparency=="STP"){ echo "checked";}?>/> STP&nbsp;
                                        <input type="radio" name="transparency" value="TL" <?php if($transparency=="TL"){ echo "checked";}?> /> TL&nbsp;
                                        <input type="radio" name="transparency" value="STL" <?php if($transparency=="STL"){ echo "checked";}?>/> STL&nbsp;
                                        <input type="radio" name="transparency" value="OP" <?php if($transparency=="OP"){ echo "checked";}?>/> OP
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        SG
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="text" name="sg" class="text big" style="width:150px;" maxlength="5" value="<?php echo $sg;?>"/>
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        RI
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="text" name="ri" class="text big" style="width:150px;" maxlength="5" value="<?php echo $ri;?>"/>
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        FLUORESCENT
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        LW :
                                        <select name="fluorescent_lw">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM lws ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													$chk_fluorescent_lw = ($row->name==$fluorescent_lw) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_fluorescent_lw>$row->name</option>";
												}
											?>
                                        </select>
                                        SW :
                                        <select name="fluorescent_sw">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM sws ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													$chk_fluorescent_sw = ($row->name==$fluorescent_sw) ? "selected='selected'" : "";
													echo "<option value='$row->name' $chk_fluorescent_sw>$row->name</option>";
												}
											?>
                                        </select>
                                    </td>
                                    <td style="width:100px;">
                                        CCF
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="radio" name="ccf" value="Red" <?php if($ccf=="Red"){ echo "checked";}?>/> RED&nbsp;&nbsp;
                                        <input type="radio" name="ccf" value="Green" <?php if($ccf=="Green"){ echo "checked";}?>/> GREEN
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        PLEOCHROISM
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="pleochroism" value="St." <?php if($pleochroism=="St."){ echo "checked";}?> /> St.&nbsp;
                                        <input type="radio" name="pleochroism" value="Mod." <?php if($pleochroism=="Mod."){ echo "checked";}?>/> Mod.&nbsp;
                                        <input type="radio" name="pleochroism" value="Wk." <?php if($pleochroism=="Wk."){ echo "checked";}?>/> Wk.&nbsp;
                                        <input type="radio" name="pleochroism" value="None" <?php if($pleochroism=="None"){ echo "checked";}?>/> None
                                        <input type="text" name="pleochroism_v1" class="text" style="width:50px;" maxlength="20" value="<?php echo $pleochroism_v1;?>" />
                                        /
                                        <input type="text" name="pleochroism_v2" class="text" style="width:50px;" maxlength="20" value="<?php echo $pleochroism_v2;?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        SPECTRUM
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="file" name="spectrum" id="spectrum" /><input name="spectrum_hidden" type="hidden" value="<?php echo $spectrum;?>"/><img src="/thumbnail_certificate/<?php echo $spectrum;?>" width="50" height="50" style="vertical-align:bottom;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        IMMERSION
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="text"  name="immersion" class="text big" maxlength="50" style="width:250px;" value="<?php echo $immersion;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        MICROSCOPIC DESCRIPTION
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="microscopic" value="X'tal" <?php if($microscopic=="X'tal"){ echo "checked";}?> /> X'tal&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ndls" <?php if($microscopic=="Ndls"){ echo "checked";}?>/> Ndls&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Silk" <?php if($microscopic=="Silk"){ echo "checked";}?>/> Silk&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ftp" <?php if($microscopic=="Ftp"){ echo "checked";}?>/> Ftp&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Gth line" <?php if($microscopic=="Gth line"){ echo "checked";}?>/> Gth line&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="C Band" <?php if($microscopic=="C Band"){ echo "checked";}?>/> C Band&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Cld" <?php if($microscopic=="Cld"){ echo "checked";}?>/> Cld&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ftr" <?php if($microscopic=="Ftr"){ echo "checked";}?>/> Ftr&nbsp;&nbsp;
                                        <br/>
                                        <input type="radio" name="microscopic" value="Minute" <?php if($microscopic=="Minute"){ echo "checked";}?>/> Minute&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Liquid Incl" <?php if($microscopic=="Liquid Incl"){ echo "checked";}?>/> Liquid Incl&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Other" <?php if($microscopic=="Other"){ echo "checked";}?>/> Other&nbsp;
                                        <input type="text" name="microscopic_other" class="text" style="width:100px;" maxlength="50" value="<?php echo $microscopic_other;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        Shape Outline
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <select name="shape_outline" >
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM shapes ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													$chk_shape_outline = ($row->name==$shape_outline) ? "selected='selected'" : "";	
													echo "<option value='$row->name' $chk_shape_outline>$row->name</option>";
												}
											?>
                                        </select>
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        Plotting
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <select name="plotting">
                                            <option value="">เลือก</option>
											<option value="Symbol" <?php if($plotting=="Symbol"){ echo "selected='selected'";}?>>Symbol</option>
											<option value="Text" <?php if($plotting=="Text"){ echo "selected='selected'";}?>>Text</option>
											<option value="Symbol and Text" <?php if($plotting=="Symbol and Text"){ echo "selected='selected'";}?>>Symbol and Text</option>
                                        </select>
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width:100px;">
                                        COMMENT
                                    </td>
                                    <td valign="top" style="width:2px;">
                                    </td>
                                    <td valign="top" >
                                        <input type="radio" name="cmt_g1" value="UNHEATED" <?php if($cmt_g1=="UNHEATED"){ echo "checked";}?> /> UNHEATED<br />
                                        <input type="radio" name="cmt_g1" value="HEATED" <?php if($cmt_g1=="HEATED"){ echo "checked";}?>/> HEATED<br />
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub" value="Pb - glass filled" <?php if($cmt_g1_sub=="Pb - glass filled"){ echo "checked";}?>/> Pb - glass filled<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        <input type="radio" name="cmt_g1_sub_pb" value="Minor" <?php if($cmt_g1_sub_pb=="Minor"){ echo "checked";}?> /> Minor&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub_pb" value="Mod." <?php if($cmt_g1_sub_pb=="Mod."){ echo "checked";}?>/> Mod.&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub_pb" value="Sign." <?php if($cmt_g1_sub_pb=="Sign."){ echo "checked";}?>/> Sign.<br />
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub" value="Be - treated" <?php if($cmt_g1_sub=="Be - treated"){ echo "checked";}?>/> Be - treated
                                    </td>
                                    <td colspan="3" valign="top" style="width:100px;">
                                        <input type="radio" name="cmt_g2" value="Glass filled" <?php if($cmt_g2=="Glass filled"){ echo "checked";}?> /> Glass filled<br />
                                        &nbsp;&nbsp; &nbsp;
                                        <span >
                                            <input type="radio" name="cmt_g2_sub_glass" value="Minor" <?php if($cmt_g2_sub_glass=="Minor"){ echo "checked";}?> /> Minor&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_glass" value="Mod." <?php if($cmt_g2_sub_glass=="Mod."){ echo "checked";}?>/> Mod.&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_glass" value="Sign." <?php if($cmt_g2_sub_glass=="Sign."){ echo "checked";}?>/> Sign.
                                        </span><br />
                                        <input type="radio" name="cmt_g2" value="Residual the fissure" <?php if($cmt_g2=="Residual the fissure"){ echo "checked";}?>/> Residual the fissure<br />
                                        &nbsp;&nbsp; &nbsp;
                                        <span >
                                            <input type="radio" name="cmt_g2_sub_residual" value="Insignificant" <?php if($cmt_g2_sub_residual=="Insignificant"){ echo "checked";}?> /> Insignificant&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Minor" <?php if($cmt_g2_sub_residual=="Minor"){ echo "checked";}?>/> Minor&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Mod." <?php if($cmt_g2_sub_residual=="Mod."){ echo "checked";}?>/> Mod.&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Sign." <?php if($cmt_g2_sub_residual=="Sign."){ echo "checked";}?>/> Sign.
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="cmt_g3" value="DYED" <?php if($cmt_g3=="DYED"){ echo "checked";}?>/> DYED&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="COATING" <?php if($cmt_g3=="COATING"){ echo "checked";}?>/> COATING&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="Diffused" <?php if($cmt_g3=="Diffused"){ echo "checked";}?>/> Diffused
                                        <br/>
                                        <input type="radio" name="cmt_g3" value="DOUBLET" <?php if($cmt_g3=="DOUBLET"){ echo "checked";}?>/> DOUBLET
                                        <input type="text" name="cmt_g3_doublet_v1" class="text" style="width:50px;" maxlength="20"value="<?php echo $cmt_g3_doublet_v1;?>" /> /
                                        <input type="text" name="cmt_g3_doublet_v2" class="text" style="width:50px;" maxlength="20" value="<?php echo $cmt_g3_doublet_v2;?>"/>&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="TRIPLET" /> TRIPLET
                                        <input type="text" name="cmt_g3_triplet_v1" class="text" style="width:50px;" maxlength="20" value="<?php echo $cmt_g3_triplet_v1;?>"/> /
                                        <input type="text" name="cmt_g3_triplet_v2" class="text" style="width:50px;" maxlength="20" value="<?php echo $cmt_g3_triplet_v2;?>"/> /
                                        <input type="text" name="cmt_g3_triplet_v3" class="text" style="width:50px;" maxlength="20" value="<?php echo $cmt_g3_triplet_v3;?>"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width:100px;">
                                        IDENTIFICATION
                                    </td>
                                    <td style="width:2px;">
                                  </td>
                                    <td colspan="4">
                                        <input type="radio" name="identification" value="Natural" <?php if($identification=="Natural"){ echo "checked";}?> /> 
                                        NATURAL&nbsp; &nbsp;
                                        <input type="text" name="identification_nat" class="text" style="width:200px;" maxlength="50" value="<?php echo $identification_nat;?>"/>&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="radio" name="identification" value="Star" <?php if($identification=="Star"){ echo "checked";}?>/> Star<br />
                                        <input type="radio" name="identification" value="Synthetic" <?php if($identification=="Synthetic"){ echo "checked";}?>/> 
                                        SYNTHETIC
                                        <input type="text" name="identification_syn" class="text" style="width:200px;" maxlength="50" value="<?php echo $identification_syn;?>"/>&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="radio" name="identification" value="Cat's eye" <?php if($identification=="Cat's eye"){ echo "checked";}?>/> Cat's eye<br />
                                        <input type="radio" name="identification" value="Glass (Man-Made)" <?php if($identification=="Glass (Man-Made)"){ echo "checked";}?>/> 
                                        Glass (Man-Made)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        INSTRUMENT
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="radio" name="instrument" value="BASIC INSTRUMENT" <?php if($instrument=="BASIC INSTRUMENT"){ echo "checked";}?>/> BASIC INSTRUMENT
                                    </td>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >&nbsp;
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        ADVANCE INSTRUMENT
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="adv_instrument" value="FT-IR" <?php if($adv_instrument=="FT-IR"){ echo "checked";}?> /> FT-IR&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="RAMAN" <?php if($adv_instrument=="RAMAN"){ echo "checked";}?>/> RAMAN&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="UV-VIS" <?php if($adv_instrument=="UV-VIS"){ echo "checked";}?>/> UV-VIS&nbsp;&nbsp; 
                                        <input type="radio" name="adv_instrument" value="EDXRF" <?php if($adv_instrument=="EDXRF"){ echo "checked";}?>/> EDXRF&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="LIBS" <?php if($adv_instrument=="LIBS"){ echo "checked";}?>/> LIBS
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        PICTURE
                                        <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="file" name="picture" id="picture" />
                                    <input name="picture_hidden" type="hidden" value="<?php echo $picture;?>"/><img src="/thumbnail_certificate/<?php echo $picture;?>" width="50" height="50" style="vertical-align:bottom;"/>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        COMMENT
                                    </td>
                                    <td style="width:2px;">
                                    </td>
									<script language="JavaScript">

										function addComment(){
											var x = document.getElementById("comment_list").value;
											var t = document.getElementById("comment").value;
											if(x != 0){
												document.getElementById("comment").value = t + '- ' + x;
												document.getElementById("comment").value += '\n';
											}
										}

									</script>
                                    <td colspan="4">
                                        <select name="comment_list" id="comment_list" onchange="addComment()" >
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM comment_list ORDER BY name";
												$result = mysqli_query($sql, $link);
												while($row = mysql_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
												}
											?>
                                        </select>
										<br/> 
                                        <textarea name="comment" cols="50" rows="5" id="comment"><?php echo $comment;?></textarea>
                                    </td>
                                </tr>
								<tr>
									<td style="width:100px;">
                                        GEMOLOGIST
                                    </td>
                                    <td style="width:2px;">
                                    </td>
									<td colspan="4">
										<input type="hidden" name="gemologist_create" value="<?php echo $_SESSION["sess_username"];?>" />
										<?php echo $_SESSION["sess_username"];?>
							        <input type="hidden" name="certificate_id" id="certificate_id" value="<?php echo $certificate_id;?>"/></td>
								</tr>
                            </table>

                            <p align="center">
                            <input type="submit" class="submit small" value="บันทึก" />
                                <a href="print_certificate_full.php">
                                    <input type="button" class="submit small" value="พิมพ์" />
                                </a>
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
