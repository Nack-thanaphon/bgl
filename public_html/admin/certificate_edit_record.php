<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$Page_p = $_REQUEST['Page_p'];
$certificate_id = $_REQUEST['certificate_id'];
$type_certificate = $_REQUEST['type_certificate'];
$file_number = $_REQUEST['file_number'];
$date1 = $_REQUEST['date'];
list($d, $m, $y ) = explode(" ", $date1);
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
$shape_and_cut = $_REQUEST['shape_and_cut'];
$weight = $_REQUEST['weight'];
$dimensions = $_REQUEST['dimensions'];
$color = $_REQUEST['color'];
$identification = $_REQUEST['identification'];
$magnification = $_REQUEST['magnification'];
$conment = $_REQUEST['conment'];
$Photo_Del = $_REQUEST['Photo_Del'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if($file_number != "" and $weight != "" and $date != ""){
	
	if ($fileupload != "") {
		$del_sql = "update certificate set picture = '' where certificate_id = '$certificate_id'";
		mysql_db_query($db,$del_sql);
		if ($Photo_Del != "") {
			$Photo_Del="../thumbnail_certificate/".$Photo_Del ;
			if (file_exists($Photo_Del)) {
				unlink($Photo_Del) ;
			}
		}
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "gif") {
				$img_sql = "select certificate_id from certificate where certificate_id = '$certificate_id'";
				$img_result = mysql_db_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$img_id = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../thumbnail_certificate/".$fileupload_name);
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
					if ($ori_w>300) {
						$new_w = 300;
						$new_h = round(($new_w/$ori_w) * $ori_h);
						$new_img = imagecreatetruecolor ($new_w, $new_h);
						imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
							if ($ext == "jpg" or $ext == "jpeg"){
								imagejpeg($new_img,"../thumbnail_certificate/".$fileupload_name);
							}else if ($ext == "png"){
								imagepng($new_img,"../thumbnail_certificate/".$fileupload_name);
							}else if ($ext == "gif"){
								imagegif($new_img,"../thumbnail_certificate/".$fileupload_name);
							}
					imagedestroy($ori_img);
					imagedestroy($new_img);
					}
					$img_update_sql = "update certificate set picture = '$fileupload_name' where certificate_id = '$certificate_id'";			
					mysql_db_query($db,$img_update_sql);
					unlink($fileupload);
				} else {
					echo ('<div class="message errormsg"><p>เกิดข้อผิดพลาด ไม่สามารถแก้ไขรูปภาพได้</p></div>');
			}
	}

	$sql = "update certificate set type_certificate='$type_certificate', file_number='$file_number', date='$date', shape_and_cut='$shape_and_cut', weight='$weight', dimensions='$dimensions', color='$color', identification='$identification', magnification='$magnification', conment='$conment' where certificate_id = '$certificate_id'";
	$result = mysql_db_query($db,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit.php?Page_p='.$Page_p.'&certificate_id='.$certificate_id.'&message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit.php?Page_p='.$Page_p.'&certificate_id='.$certificate_id.'&message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit.php?Page_p='.$Page_p.'&certificate_id='.$certificate_id.'&message=info">');
}
?>