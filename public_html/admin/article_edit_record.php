<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$article_id = $_REQUEST['article_id'];
$article_name = $_REQUEST['article_name'];
$file_del = $_REQUEST['file_del'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($article_name != "") {
	
	if ($fileupload != "") {
		$del_sql = "update article set article_file = '' where article_id = '$article_id'";
		mysql_db_query($db,$del_sql3);
		if ($file_del != "") {
			$file_del="../file_article/".$file_del ;
			if (file_exists($file_del)) {
				unlink($file_del) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "doc" or $ext == "xls" or $ext == "pdf") {
				$sql_id = "select article_id from article where article_id = '$article_id'";
				$result_id = mysql_db_query($db,$sql_id);
				$row_id = mysql_fetch_row($result_id) ;
				$id = $row_id[0];
				$fileupload_name = $row_id[0].".".$ext ;
				copy($fileupload,"../file_article/".$fileupload_name);
					$img_update_sql = "update article set article_file = '$fileupload_name' where article_id = '$article_id'";			
					mysql_db_query($db,$img_update_sql);
					unlink($fileupload);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}
	
	$sql = "update article set article_name = '$article_name' where article_id = '$article_id'";	
	$result = mysql_db_query($db,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=article_edit.php?Page_p='.$Page_p.'&article_id='.$article_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=article_edit.php?Page_p='.$Page_p.'&article_id='.$article_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=article_edit.php?Page_p='.$Page_p.'&article_id='.$article_id.'&message=info">');
}
?>