<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$Photo_Del = $_REQUEST['Photo_Del'];
$Photo_Del2 = $_REQUEST['Photo_Del2'];
$Photo_Del3 = $_REQUEST['Photo_Del3'];
$news_id = $_REQUEST['news_id'];
$news_type = $_REQUEST['news_type'];
$news_title = $_REQUEST['news_title'];
$news_descriptions = $_REQUEST['news_descriptions'];
$news_date = $_REQUEST['news_date'];
list($d, $m, $y ) = explode(" ", $news_date);
	if($m=="Jan"){
		$month="01";
	}else if($m=="Feb") {
		$month="02";
	}else if($m=="Mar") {
		$month="03";
	}else if($m=="Apr") {
		$month="04";
	}else if($m=="May") {
		$month="05";
	}else if($m=="Jun") {
		$month="06";
	}else if($m=="Jul") {
		$month="07";
	}else if($m=="Aug") {
		$month="08";
	}else if($m=="Sep") {
		$month="09";
	}else if($m=="Oct") {
		$month="10";
	}else if($m=="Nov") {
		$month="11";
	}else if($m=="Dec") {
		$month="12";
	}
$date = $y."-".$month."-".$d;
$news_url = $_REQUEST['news_url'];
$news_detail_format = $_REQUEST['news_detail_format'];
$news_detail_descriptions = $_REQUEST['news_detail_descriptions'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];
$fileupload2 = $_FILES['fileupload2']['tmp_name'];
$fileupload_name2 = $_FILES['fileupload2']['name'];
$fileupload_size2 = $_FILES['fileupload2']['size'];
$fileupload_type2 = $_FILES['fileupload2']['type'];
$fileupload3 = $_FILES['fileupload3']['tmp_name'];
$fileupload_name3 = $_FILES['fileupload3']['name'];
$fileupload_size3 = $_FILES['fileupload3']['size'];
$fileupload_type3 = $_FILES['fileupload3']['type'];

if($news_title != "" and $news_descriptions != "") {
	
	if ($fileupload != "") {
		$del_sql = "update news set news_picture = '' where news_id = '$news_id'";
		mysqli_query($db,$del_sql);
		if ($Photo_Del != "") {
			$Photo_Del="../thumbnail_news/".$Photo_Del ;
			if (file_exists($Photo_Del)) {
				unlink($Photo_Del) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "gif") {
				$img_sql = "select news_id from news where news_id = '$news_id'";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$img_id = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../thumbnail_news/".$fileupload_name);
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
					if ($ori_w>250) {
						$new_w = 250;
						$new_h = round(($new_w/$ori_w) * $ori_h);
						$new_img = imagecreatetruecolor ($new_w, $new_h);
						imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
							if ($ext == "jpg" or $ext == "jpeg"){
								imagejpeg($new_img,"../thumbnail_news/".$fileupload_name);
							}else if ($ext == "png"){
								imagepng($new_img,"../thumbnail_news/".$fileupload_name);
							}else if ($ext == "gif"){
								imagegif($new_img,"../thumbnail_news/".$fileupload_name);
							}
					imagedestroy($ori_img);
					imagedestroy($new_img);
					}
					$img_update_sql = "update news set news_picture = '$fileupload_name' where news_id = '$news_id'";			
					mysqli_query($db,$img_update_sql);
					unlink($fileupload);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}

	if ($fileupload2 != "") {
		$del_sql2 = "update news set news_detail_picture = '' where news_id = '$news_id'";
		mysqli_query($db,$del_sql2);
		if ($Photo_Del2 != "") {
			$Photo_Del2="../thumbnail_news/".$Photo_Del2 ;
			if (file_exists($Photo_Del2)) {
				unlink($Photo_Del2) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name2)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "gif") {
				$img_sql = "select news_id from news where news_id = '$news_id'";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$img_id = $img_row[0];
				$fileupload_name2 = $img_row[0].".".$ext ;
				copy($fileupload2,"../picture_news/".$fileupload_name2);
					if ($ext == "jpg" or $ext == "jpeg") {
						$ori_img = imagecreatefromjpeg($fileupload2);
					}else if ($ext == "png") {
						$ori_img = imagecreatefrompng($fileupload2);
					}else if ($ext == "gif") {
						$ori_img = imagecreatefromgif($fileupload2);
					}
				$ori_size = getimagesize($fileupload2);
				$ori_w = $ori_size[0];
				$ori_h = $ori_size[1];
					if ($ori_w>400) {
						$new_w = 400;
						$new_h = round(($new_w/$ori_w) * $ori_h);
						$new_img = imagecreatetruecolor ($new_w, $new_h);
						imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
							if ($ext == "jpg" or $ext == "jpeg"){
								imagejpeg($new_img,"../picture_news/".$fileupload_name2);
							}else if ($ext == "png"){
								imagepng($new_img,"../picture_news/".$fileupload_name2);
							}else if ($ext == "gif"){
								imagegif($new_img,"../picture_news/".$fileupload_name2);
							}
					imagedestroy($ori_img);
					imagedestroy($new_img);
					}
					$img_update_sql2 = "update news set news_detail_picture = '$fileupload_name2' where news_id = '$news_id'";			
					mysqli_query($db,$img_update_sql2);
					unlink($fileupload2);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}

	if ($fileupload3 != "") {
		$del_sql3 = "update news set news_detail_file = '' where news_id = '$news_id'";
		mysqli_query($db,$del_sql3);
		if ($Photo_Del3 != "") {
			$Photo_Del3="../file_news/".$Photo_Del3 ;
			if (file_exists($Photo_Del3)) {
				unlink($Photo_Del3) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name3)));	
			if ($ext == "doc" or $ext == "xls" or $ext == "pdf") {
				$img_sql = "select news_id from news where news_id = '$news_id'";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$img_id = $img_row[0];
				$fileupload_name3 = $img_row[0].".".$ext ;
				copy($fileupload3,"../file_news/".$fileupload_name3);
					$img_update_sql3 = "update news set news_detail_file = '$fileupload_name3' where news_id = '$news_id'";			
					mysqli_query($db,$img_update_sql3);
					unlink($fileupload3);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}

	$sql = "update news set news_type='$news_type', news_title='$news_title', news_descriptions='$news_descriptions', news_date='$date', news_url='$news_url', news_detail_format='$news_detail_format', news_detail_descriptions='$news_detail_descriptions' where news_id = '$news_id'";
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=news_edit.php?Page_p='.$Page_p.'&news_id='.$news_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=news_edit.php?Page_p='.$Page_p.'&news_id='.$news_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=news_edit.php?Page_p='.$Page_p.'&news_id='.$news_id.'&message=info">');
}
?>