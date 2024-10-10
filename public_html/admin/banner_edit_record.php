<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$banner_id = $_REQUEST['banner_id'];
$banner_name = $_REQUEST['banner_name'];
$file_del = $_REQUEST['file_del'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($banner_name != "") {
	
	if ($fileupload != "") {
		$del_sql = "update banner set banner_picture = '' where banner_id = '$banner_id'";
		mysqli_query($db,$del_sql);
		if ($Photo_Del != "") {
			$Photo_Del="../file_banner/".$Photo_Del ;
			if (file_exists($Photo_Del)) {
				unlink($Photo_Del) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "gif") {
				$img_sql = "select banner_id from banner where banner_id = '$banner_id'";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$img_id = $img_row[0];
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
					$img_update_sql = "update banner set banner_picture = '$fileupload_name' where banner_id = '$banner_id'";			
					mysqli_query($db,$img_update_sql);
					unlink($fileupload);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}
	
	$sql = "update banner set banner_name = '$banner_name' where banner_id = '$banner_id'";	
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=banner_edit.php?Page_p='.$Page_p.'&banner_id='.$banner_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=banner_edit.php?Page_p='.$Page_p.'&banner_id='.$banner_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=banner_edit.php?Page_p='.$Page_p.'&banner_id='.$banner_id.'&message=info">');
}
?>