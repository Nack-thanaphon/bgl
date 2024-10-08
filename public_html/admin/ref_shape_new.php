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
                        <li><a href="ref_shape_new.php"><span></span>เพิ่ม Shape</a></li>
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
                            เพิ่ม Shape
                    </h2>
                        <ul>
                            <li>
                                <a href="ref_shape_new.php">
                                    Shape
                                </a>
                            </li>
                            <li>
                                <a href="ref_shape_add_new.php">
                                    เพิ่ม Shape
                                </a>
                            </li>
                        </ul>
                    </div>
<?php
	$type = $_REQUEST['type'];
	if ($type == "del"){
		$name = $_REQUEST['name'];
		$picture_del = $_REQUEST['picture_del'];
		$del_sql="delete from shapes where name = '$name'";
		$result_del =  mysql_db_query($db,$del_sql);
			if($picture_del <> ""){
				$picture_del = "../pic_shape/".$picture_del ;
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

	$sql = "select * from shapes";
	$result = mysql_db_query($db,$sql);
	$num_rows = mysql_num_rows($result);

?>
	<table cellpadding="0" cellspacing="0" width="100%" class="sortable">
		<thead>
			<tr>
            	<th width="10">ลำดับ</th>
				<th >ชื่อ Shape</th>
				<th >รูปตัวอย่าง</th>
				<th width="10">แก้ไข</th>
                <th width="10">ลบ</th>
		  </tr>
        </thead>
        <?php
			if($num_rows>0)
			{
				$i=1;
				while($row = mysqli_fetch_array($result))
				{
					$name = $row['name'];
					$pic = $row['pic'];
		?>
			<tr>
           		<td style="text-align:center;"><?php echo $i;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $pic;?></td>
                <td style="text-align:center;"><a href="ref_shape_edit_new.php?name=<?php echo"$name";?>"><img src="images_admin/ico_edit.png" alt="" title="แก้ไข" width="16" height="16" /></a></td>
                <td class="delete" style="text-align:center;">
                        <a href="ref_shape_new.php?name=<?php echo"$name";?>&picture_del=<?php echo"$pic";?>&type=del" onclick="return confirm ('ยืนยันลบข้อมูล')"><img src="images_admin/ico_delete.png" alt="" title="ลบ" width="16" height="16" /></a></td>
		</tr>
		<?php
					$i++;
				}

			} // end if($num_rows>0)
			else
			{
				echo '<tr>
							<td style="text-align:center;" colspan="5" class="note error">ไม่พบข้อมูล</td>
						</tr>';
			}
		?>
	</table>

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