<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$lab_name = $_REQUEST['lab_name'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($lab_name != "" and $fileupload != "") {
	$sql_max = "select max(lab_id) from lab";
	$result_max = mysqli_query($db,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$lab_id = $row_max[0]+1;
	
	$sql = "insert into lab (lab_id, lab_name, lab_status) VALUES ('$lab_id', '$lab_name', 'y')";
	$result = mysqli_query($link,$sql);
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "doc" or $ext == "docx" or $ext == "xls" or $ext == "pdf") {
				$img_sql="select max(lab_id) from lab";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$lab_id_new = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../file_lab/".$fileupload_name);
				
				$img_sql_update="update lab set lab_file = '$fileupload_name' where lab_id = '$lab_id_new'" ;
				mysqli_query($db,$img_sql_update);
				unlink($fileupload);
			}
		}
		
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=lab_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=lab_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=lab_add.php?message=info">');
}
?>