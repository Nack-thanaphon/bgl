<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$lab_id = $_REQUEST['lab_id'];
$lab_name = $_REQUEST['lab_name'];
$file_del = $_REQUEST['file_del'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($lab_name != "") {
	
	if ($fileupload != "") {
		$del_sql = "update lab set lab_file = '' where lab_id = '$lab_id'";
		mysqli_query($link,$del_sql3);
		if ($file_del != "") {
			$file_del="../file_lab/".$file_del ;
			if (file_exists($file_del)) {
				unlink($file_del) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "doc" or $ext == "docx" or $ext == "xls" or $ext == "pdf") {
				$sql_id = "select lab_id from lab where lab_id = '$lab_id'";
				$result_id = mysqli_query($link,$sql_id);
				$row_id = mysql_fetch_row($result_id) ;
				$id = $row_id[0];
				$fileupload_name = $row_id[0].".".$ext ;
				copy($fileupload,"../file_lab/".$fileupload_name);
					$img_update_sql = "update lab set lab_file = '$fileupload_name' where lab_id = '$lab_id'";			
					mysqli_query($link,$img_update_sql);
					unlink($fileupload);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขไฟล์ได้</p></div>');
			}
	}
	
	$sql = "update lab set lab_name = '$lab_name' where lab_id = '$lab_id'";	
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=lab_edit.php?Page_p='.$Page_p.'&lab_id='.$lab_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=lab_edit.php?Page_p='.$Page_p.'&lab_id='.$lab_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=lab_edit.php?Page_p='.$Page_p.'&lab_id='.$lab_id.'&message=info">');
}
?>