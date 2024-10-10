<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$banner_name = $_REQUEST['banner_name'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($banner_name != "" and $fileupload != "") {
	$sql_max = "select max(banner_id) from banner";
	$result_max = mysqli_query($db,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$banner_id = $row_max[0]+1;
	
	$sql = "insert into banner (banner_id, banner_name, banner_status) VALUES ('$banner_id', '$banner_name', 'y')";
	$result = mysqli_query($link,$sql);
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
				$img_sql="select max(banner_id) from banner";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$banner_id_new = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../file_banner/".$fileupload_name);
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
						if ($ori_w>600) {
							$new_w = 600;
							$new_h = round(($new_w/$ori_w) * $ori_h);
							$new_img = imagecreatetruecolor ($new_w, $new_h);
							imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
								if ($ext == "jpg" or $ext == "jpeg"){
									imagejpeg($new_img,"../file_banner/".$fileupload_name);
								}else if ($ext == "png"){
									imagepng($new_img,"../file_banner/".$fileupload_name);
								}else if ($ext == "gif"){
									imagegif($new_img,"../file_banner/".$fileupload_name);
								}
						imagedestroy($ori_img);
						imagedestroy($new_img);
					}
				$img_sql_update="update banner set banner_picture = '$fileupload_name' where banner_id = '$banner_id_new'" ;
				mysqli_query($db,$img_sql_update);
				unlink($fileupload);
			}
		}
		
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=banner_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=banner_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=banner_add.php?message=info">');
}
?>