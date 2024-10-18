<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$gallery_name = $_REQUEST['gallery_name'];
$gallery_url = $_REQUEST['gallery_url'];
$gallery_date = date("Y-m-d");
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($gallery_name != "" and $fileupload != "") {
	$sql_max = "select max(gallery_id) from gallery";
	$result_max = mysqli_query($link,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$gallery_id = $row_max[0]+1;
	
	$sql = "insert into gallery (gallery_id, gallery_name, gallery_url, gallery_date, gallery_status) VALUES ('$gallery_id', '$gallery_name', '$gallery_url', '$gallery_date', 'y')";
	$result = mysqli_query($link,$sql);
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
				$img_sql="select max(gallery_id) from gallery";
				$img_result = mysqli_query($link,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$gallery_id_new = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../file_gallery/".$fileupload_name);
					if ($ext == "jpg" or $ext == "jpeg") {
						$ori_img = imagecreatefromjpeg($fileupload);
					}else if ($ext == "png") {
						$ori_img = imagecreatefrompng($fileupload);
					}else if ($ext == "gif") {
						$ori_img = imagecreatefromgif($fileupload);
					}
					$ori_size = getimagesize($fileupload);
					$ori_w = $ori_size[0];
					$ori_h = $ori_size[1];
						if ($ori_w>960) {
							$new_w = 960;
							$new_h = round(($new_w/$ori_w) * $ori_h);
							$new_img = imagecreatetruecolor ($new_w, $new_h);
							imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
								if ($ext == "jpg" or $ext == "jpeg"){
									imagejpeg($new_img,"../file_gallery/".$fileupload_name);
								}else if ($ext == "png"){
									imagepng($new_img,"../file_gallery/".$fileupload_name);
								}else if ($ext == "gif"){
									imagegif($new_img,"../file_gallery/".$fileupload_name);
								}
						imagedestroy($ori_img);
						imagedestroy($new_img);
					}
				$img_sql_update="update gallery set gallery_picture = '$fileupload_name' where gallery_id = '$gallery_id_new'" ;
				mysqli_query($link,$img_sql_update);
				unlink($fileupload);
			}
		}
		
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=gallery_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=gallery_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=gallery_add.php?message=info">');
}
?>