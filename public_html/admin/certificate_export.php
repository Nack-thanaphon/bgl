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
<script type="text/javascript" language="javascript">
	
	function goExport() {
		var cer = window.document.getElementsByName('hidCerId[]');
		
		var txt = '-1,';
		for (var i = 0;i < cer.length;i++) {
			txt += cer[i].value+',';
		}
		
		txt = txt.trim(',');
				
		window.open('export.php?cerTxt='+txt , 'P','menuber=no,toorlbar=no,location=no,scrollbars=yes, status=no,resizable=no,width=800,height=600,center=yes');
	}
	
	function searchFile() {
		var name = window.document.getElementById('txtSearch').value;
		
		$.get('./get-name.php?name='+encodeURIComponent(name), function(data) {
			window.document.getElementById('div-file').innerHTML = data;
		});
	}
	function sl(obj) {
		var ele = obj.getAttribute('rel');
		var eles = ele.split('<||>');
		
		var fileExport = window.document.getElementsByTagName('span');
		for (var i = 0;i < fileExport.length;i++) {
			if (fileExport[i].getAttribute('class') == 'sp-file-export') {
				var n = fileExport[i].innerHTML.trim();
				if (n == eles[0].trim()) {
					alert('เลือกข้อมูลไปแล้ว');
					return;
				}
			}
		}		
		
		
		var tb = window.document.getElementById('tb-export');
		var rowCount = tb.rows.length;		
		 var row = tb.insertRow(rowCount);
 
		var cell = row.insertCell(0);
		var eleSp = document.createElement('span');
		eleSp.setAttribute('class', 'sp-file-export');
		cell.appendChild(eleSp);
		
		var eleText = document.createTextNode(eles[0]);
		eleSp.appendChild(eleText);
		
		cell = row.insertCell(1);
		eleText = document.createTextNode(eles[1]);
		cell.appendChild(eleText);
		
		cell = row.insertCell(2);
		eleText = document.createTextNode(eles[2]);
		cell.appendChild(eleText);
		
		cell = row.insertCell(3);
		eleText = document.createTextNode(eles[3]);
		cell.appendChild(eleText);
		var eleHiddent = document.createElement('input');
		eleHiddent.type = 'hidden';
		eleHiddent.name = 'hidCerId[]';
		eleHiddent.value = eles[4];
		cell.appendChild(eleHiddent);
		
		cell = row.insertCell(4);		
		var eleA = document.createElement('a');
		eleA.setAttribute('href', 'javascript:;');
		eleA.setAttribute('onclick', 'deleteRow(this);');
		eleA.setAttribute('rel', rowCount);
		eleA.setAttribute('class', 'adel');
		cell.appendChild(eleA);
		
		eleText = document.createElement('img');
		eleText.setAttribute('src', 'images_admin/ico_delete.png');
		eleText.setAttribute('width', '16');
		eleText.setAttribute('height', '16');				
		eleA.appendChild(eleText);

	}

	function deleteRow(obj) {
		
		if (!confirm('ต้องการลบใช่หรือไม่'))
			return;
		
		try {
								
			var table = document.getElementById('tb-export');
			var rowCount = table.rows.length;
			
			var rowDel = obj.getAttribute('rel');
	
			for (var i = 0; i < rowCount; i++) {
				if (i == rowDel) {
					table.deleteRow(i);
					break;
				}	
			}
			

			var eleA = window.document.getElementsByTagName('a');
			var x = 1
			for (var i = 0; i < eleA.length; i++) {
				if (eleA[i].getAttribute('class') == 'adel') {
					eleA[i].setAttribute('rel', x++)
				}
			}
			
		}catch(e) {
			alert(e);
		}
	}
	
	function keyBlockEnter(obj,e) {
		var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
		var keyCtrl  = e.ctrlKey;
		
		if (key == 13) {				
			searchFile();
			return false;
		} else {
			return true;
		}
			
	}
</script>
</head>
<style>
	.panel-f {
		border-style: solid;
		border-width: 1px;
		border-color: #FC3; 
		width: 800px;
	}
	.head-panel {
		position:relative;
		z-index:5;
		font-family:Georgia, "Times New Roman", Times, serif;
		font-size: 18px;
		font-weight: 700;
		top: -13px;
		background-color:#FFF;
		padding: 0px 10px 0px 10px;
	}
</style>
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
                    <li><a href="javascript:;" onclick="goExport();">ส่งออกเป็น Excel</a></li>
                </ul>
			</div>
            
        <div  class="block_content">
<?php

	include "../connections/config.inc.php";
	
?>
	<div class="panel-f">
    	<span class="head-panel">&nbsp;ค้นหา&nbsp;</span>
    	<form id="f1" name="f1" action="" method="post">
        	<table border="0">
            	<tr>
                	<td>
               	    File Number</td>
                    <td>
                    	<input type="text" onkeypress="return keyBlockEnter(this,event);" name="txtSearch" id="txtSearch" value="" size="25" />
                    </td>
                    <td>
                    	<input type="button" id="btnSearch" onclick="searchFile();" value="ค้นหา" />
                    </td>
                </tr>
            </table>
        </form>
		<div id="div-file"></div>
    </div>
            <table id="tb-export" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td>File Number</td>
                        <td>Weight</td>
                        <td>Date</td>
                        <td>Type</td>
                        <td class="center" width="60">ลบ</td>
                    </tr>
            </table>
        <div class="tableactions">        	
            
        </div>
		<div class="pagination right">
		</div>
        </div>

        <div class="bendl"></div>
        <div class="bendr"></div>
        </div>
        
    </div>
</div>
<?php include "footer.php";?>
</body>
</html>
