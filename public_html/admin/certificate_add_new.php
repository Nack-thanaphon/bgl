<?php include "chksession.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            Admin BGL
        </title>
        <style type="text/css" media="all">
            @import url("css_admin/style.css");

            @import url("css_admin/jquery.wysiwyg.css");

            @import url("css_admin/facebox.css");

            @import url("css_admin/visualize.css");

            @import url("css_admin/date_input.css");

            @import url("css_admin/style.hf.css");
        </style>
        <script type="text/javascript" src="js_admin/jquery.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.img.preload.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.filestyle.mini.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.wysiwyg.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.date_input.pack.js">
        </script>
        <script type="text/javascript" src="js_admin/facebox.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.select_skin.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.tablesorter.min.js">
        </script>
        <script type="text/javascript" src="js_admin/ajaxupload.js">
        </script>
        <script type="text/javascript" src="js_admin/jquery.pngfix.js">
        </script>
        <script type="text/javascript" src="js_admin/custom.js">
        </script>
        <script type="text/javascript" src="js_admin/jqueryslidemenu.js">
        </script>
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


				//return false;
				///////////////////////////////////
				/* 
                if(document.form_add.type_certificate.value == "0")
                {
                    alert("โปรดกรอกประเภทค่ะ");
                    document.form_add.type_certificate.focus();
                    return false ;
                }
                
                if(document.form_add.fileupload.value == "")
                {
                    alert("โปรดกรอกรูปภาพค่ะ");
                    document.form_add.fileupload.focus();
                    return false ;
                }else
                {
                    return true ;
                }
				*/ 
            }
        </script>

    </head>
    <body>
        <a name="top">
        </a>
        <?php include "header.php";?>
        <!-- menu -->
        <div id="myslidemenu" class="menu">
            <ul class="primary-menu">
                <li>
                    <a href="dashboard_new.php">
                        หน้าแรก
                    </a>
                </li>
                <li class="drop active">
                    <a href="">
                        ใบรับรอง »»
                    </a>
                    <ul>
                        <li>
                            <a href="certificate_display_new.php">
                                <span>
                                </span>ใบรับรอง
                            </a>
                        </li>
                        <li>
                            <a href="certificate_add_new.php">
                                <span>
                                </span>เพิ่มใบรับรองแบบใหม่
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="drop">
                    <a href="">
                        ข่าวสาร »
                    </a>
                    <ul>
                        <li>
                            <a href="news_display.php">
                                <span>
                                </span>ข่าวสาร
                            </a>
                        </li>
                        <li>
                            <a href="news_add.php">
                                <span>
                                </span>เพิ่มข่าวสาร
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="drop">
                    <a href="">
                        ความรู้ทั่วไป »
                    </a>
                    <ul>
                        <li>
                            <a href="article_display.php">
                                <span>
                                </span>ความรู้ทั่วไป
                            </a>
                        </li>
                        <li>
                            <a href="article_add.php">
                                <span>
                                </span>เพิ่มความรู้ทั่วไป
                            </a>
                        </li>
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
                <li class="drop">
                    <a href="">
                        ผู้ดูแลระบบ »
                    </a>
                    <ul>
                        <li>
                            <a href="user_display.php">
                                <span>
                                </span>ผู้ดูแลระบบ
                            </a>
                        </li>
                        <li>
                            <a href="user_add.php">
                                <span>
                                </span>เพิ่มผู้ดูแลระบบ
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="last drop">
                    <a href="">
                        ข้อมูลส่วนตัว »
                    </a>
                    <ul>
                        <li>
                            <a href="edit_profile.php">
                                <span>
                                </span>แก้ไขข้อมูลส่วนตัว
                            </a>
                        </li>
                        <li>
                            <a href="user_changepwd.php">
                                <span>
                                </span>เปลี่ยนรหัสผ่าน
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <span>
                                </span>ออกจากระบบ
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end menu -->

        <div id="hld">
            <div class="wrapper">

                <div class="block">
                    <div class="block_head">
                        <div class="bheadl">
                        </div>
                        <div class="bheadr">
                        </div>
                        <h2>
                            เพิ่มใบรับรอง
                        </h2>
                        <ul>
                            <li>
                                <a href="certificate_display_new.php">
                                    ใบรับรอง
                                </a>
                            </li>
                            <li>
                                <a href="certificate_add_new.php">
                                    เพิ่มใบรับรอง
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="block_content">
                        <?php
                        $message = $_REQUEST['message'];
                        if($message == "success")
                        {
                            echo('<div class="message success"><p>บันทึกข้อมูลเรียบร้อยแล้วค่ะ</p></div>');
                        }
                        else
                        if($message == "warning")
                        {
                            echo('<div class="message warning"><p>File Number ซ้ำ โปรดกรอก File Number ใหม่ค่ะ</p></div>');
                        }
                        else
                        if($message == "error")
                        {
                            echo('<div class="message errormsg"><p>ไม่สามารถบันทึกข้อมูลได้ค่ะ</p></div>');
                        }
                        else
                        if($message == "info" or $message == "")
                        {
                            echo('<div class="message info"><p>โปรดกรอกข้อมูลในช่องที่มีเครื่องหมาย * ให้ครบ</p></div>');
                        }
                        ?>
                        <form id="form_add" name="form_add" method="post" action="certificate_add_record_new.php" enctype="multipart/form-data" onsubmit="return ChkFrom();">
                            <p>
                            <table  border="0" cellpadding="0" cellspacing="0" style="padding: 0">
                                <tr>
                                    <td style="width:100px;">
                                        CUSTOMER <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td style="width:250px;">
                                        <input name="customer" type="text" class="text big" maxlength="20" />
                                    </td>
                                    <td style="width:120px;">
                                        FILE NUMBER <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td style="width:290px;">
                                        <input name="file_number" type="text" class="text big" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width:100px;">
                                        DATE <span class="note error">*</span>
                                    </td>
                                    <td valign="top" style="width:2px;">
                                    </td>
                                    <td valign="top" >
                                        <input name="cer_date" type="text" class="text date_picker" id="cer_date"  readonly="readonly" />
                                    </td>
                                    <td valign="top" style="width:100px;">
                                        DEMENSION <span class="note error">*</span>
                                    </td>
                                    <td valign="top" style="width:2px;">
                                    </td>
                                    <td valign="top" >
                                        <input type="radio" name="dimension" value="1"  checked />
                                        <input type="text" name="d1" class="text" style="width:45px;" maxlength="5"/> x 
                                        <input type="text" name="d2" class="text" style="width:45px;" maxlength="5" /> x 
                                        <input type="text" name="d3" class="text" style="width:45px;" maxlength="5"/> mm.<br /><br />
                                        <input type="radio" name="dimension" value="2" />
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
                                        <input name="weight" type="text" class="text big" style="width:70px;" maxlength="7"/> Cts.
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
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
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
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM cuts ORDER BY name";
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
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
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
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
                                        <input type="radio" name="optic_character" value="SR" checked /> SR&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="ADR" /> ADR&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="DR" /> DR
                                        <select name="optic_character_detail">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM drs ORDER BY name";
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
												}
											?>
                                        </select>&nbsp;&nbsp;
                                        <input type="radio" name="optic_character" value="AGG" /> AGG
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        TRANSPARENCY
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="transparency" value="TP" checked /> TP&nbsp;
                                        <input type="radio" name="transparency" value="STP" /> STP&nbsp;
                                        <input type="radio" name="transparency" value="TL" /> TL&nbsp;
                                        <input type="radio" name="transparency" value="STL" /> STL&nbsp;
                                        <input type="radio" name="transparency" value="OP" /> OP
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        SG
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="text" name="sg" class="text big" style="width:150px;" maxlength="5"/>
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
                                        <input type="text" name="ri" class="text big" style="width:150px;" maxlength="5"/>
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
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
												}
											?>
                                        </select>
                                        SW :
                                        <select name="fluorescent_sw">
                                            <option value="">เลือก</option>
											<?php
												$sql = "SELECT * FROM sws ORDER BY name";
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
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
                                        <input type="radio" name="ccf" value="Red" checked/> RED&nbsp;&nbsp;
                                        <input type="radio" name="ccf" value="Green" /> GREEN
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        PLEOCHROISM
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="pleochroism" value="St." checked /> St.&nbsp;
                                        <input type="radio" name="pleochroism" value="Mod." /> Mod.&nbsp;
                                        <input type="radio" name="pleochroism" value="Wk." /> Wk.&nbsp;
                                        <input type="radio" name="pleochroism" value="None" /> None
                                        <input type="text" name="pleochroism_v1" class="text" style="width:50px;" maxlength="20" />
                                        /
                                        <input type="text" name="pleochroism_v2" class="text" style="width:50px;" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        SPECTRUM
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="file" name="spectrum" id="spectrum" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        IMMERSION
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="text"  name="immersion" class="text big" maxlength="50" style="width:250px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        MICROSCOPIC DESCRIPTION
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="microscopic" value="X'tal" checked /> X'tal&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ndls" /> Ndls&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Silk" /> Silk&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ftp" /> Ftp&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Gth line" /> Gth line&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="C Band" /> C Band&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Cld" /> Cld&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Ftr" /> Ftr&nbsp;&nbsp;
                                        <br/>
                                        <input type="radio" name="microscopic" value="Minute" /> Minute&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Liquid Incl" /> Liquid Incl&nbsp;&nbsp;
                                        <input type="radio" name="microscopic" value="Other" /> Other&nbsp;
                                        <input type="text" name="microscopic_other" class="text" style="width:100px;" maxlength="50"/>
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
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
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
											<option value="Symbol">Symbol</option>
											<option value="Text">Text</option>
											<option value="Symbol and Text">Symbol and Text</option>
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
                                        <input type="radio" name="cmt_g1" value="UNHEATED" checked /> UNHEATED<br />
                                        <input type="radio" name="cmt_g1" value="HEATED" /> HEATED<br />
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub" value="Pb - glass filled" /> Pb - glass filled<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        <input type="radio" name="cmt_g1_sub_pb" value="Minor" checked /> Minor&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub_pb" value="Mod." /> Mod.&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub_pb" value="Sign." /> Sign.<br />
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g1_sub" value="Be - treated" /> Be - treated
                                    </td>
                                    <td colspan="3" valign="top" style="width:100px;">
                                        <input type="radio" name="cmt_g2" value="Glass filled" checked /> Glass filled<br />
                                        &nbsp;&nbsp; &nbsp;
                                        <span >
                                            <input type="radio" name="cmt_g2_sub_glass" value="Minor" checked /> Minor&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_glass" value="Mod." /> Mod.&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_glass" value="Sign." /> Sign.
                                        </span><br />
                                        <input type="radio" name="cmt_g2" value="Residual the fissure" /> Residual the fissure<br />
                                        &nbsp;&nbsp; &nbsp;
                                        <span >
                                            <input type="radio" name="cmt_g2_sub_residual" value="Insignificant" checked /> Insignificant&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Minor" /> Minor&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Mod." /> Mod.&nbsp;&nbsp;
                                            <input type="radio" name="cmt_g2_sub_residual" value="Sign." /> Sign.
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">&nbsp;
                                        
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td colspan="4" >
                                        <input type="radio" name="cmt_g3" value="DYED" checked/> DYED&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="COATING" /> COATING&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="Diffused" /> Diffused
                                        <br/>
                                        <input type="radio" name="cmt_g3" value="DOUBLET" /> DOUBLET
                                        <input type="text" name="cmt_g3_doublet_v1" class="text" style="width:50px;" maxlength="20" /> /
                                        <input type="text" name="cmt_g3_doublet_v2" class="text" style="width:50px;" maxlength="20" />&nbsp;&nbsp;
                                        <input type="radio" name="cmt_g3" value="TRIPLET" /> TRIPLET
                                        <input type="text" name="cmt_g3_triplet_v1" class="text" style="width:50px;" maxlength="20" /> /
                                        <input type="text" name="cmt_g3_triplet_v2" class="text" style="width:50px;" maxlength="20" /> /
                                        <input type="text" name="cmt_g3_triplet_v3" class="text" style="width:50px;" maxlength="20" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" style="width:100px;">
                                        IDENTIFICATION
                                    </td>
                                    <td style="width:2px;">
                                  </td>
                                    <td colspan="4">
                                        <input type="radio" name="identification" value="Natural" checked /> 
                                        NATURAL&nbsp; &nbsp;
                                        <input type="text" name="identification_nat" class="text" style="width:150px;" maxlength="50" />&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="radio" name="identification" value="Star" /> Star<br />
                                        <input type="radio" name="identification" value="Synthetic" /> 
                                        SYNTHETIC
                                        <input type="text" name="identification_syn" class="text" style="width:150px;" maxlength="50" />&nbsp; &nbsp;&nbsp; &nbsp;
                                        <input type="radio" name="identification" value="Cat's eye" /> Cat's eye<br />
                                        <input type="radio" name="identification" value="Glass (Man-Made)" /> 
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
                                        <input type="radio" name="instrument" value="BASIC INSTRUMENT" /> BASIC INSTRUMENT
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
                                        <input type="radio" name="adv_instrument" value="FT-IR" checked /> FT-IR&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="RAMAN" /> RAMAN&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="UV-VIS" /> UV-VIS&nbsp;&nbsp; 
                                        <input type="radio" name="adv_instrument" value="EDXRF" /> EDXRF&nbsp;&nbsp;
                                        <input type="radio" name="adv_instrument" value="LIBS" /> LIBS
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:100px;">
                                        PICTURE
                                        <span class="note error">*</span>
                                    </td>
                                    <td style="width:2px;">
                                    </td>
                                    <td >
                                        <input type="file" name="picture" id="picture" />
                                    </td>
                                    <td colspan="3" style="width:100px;">
                                        
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
												$result = mysqli_query($link,$sql);
												while($row = mysqli_fetch_object($result)) {
													echo "<option value='$row->name'>$row->name</option>";
												}
											?>
                                        </select>
										<br/> 
                                        <textarea name="comment" cols="50" rows="5" id="comment"></textarea>
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
									</td>
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

                    <div class="bendl">
                    </div>
                    <div class="bendr">
                    </div>
                </div>

            </div>
        </div>
        <?php include "footer.php";?>
    </body>
</html>