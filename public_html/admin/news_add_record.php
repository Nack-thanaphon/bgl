<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
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

if ($news_title != "" and $news_descriptions != "" and $fileupload != "") {
	$sql_max = "select max(news_id) from news";
	$result_max = mysqli_query($db,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$news_id = $row_max[0]+1;
	
	$sql = "insert into news (news_id, news_order, news_type, news_title, news_descriptions, news_date, news_url, news_detail_format, news_detail_descriptions, news_status, news_index) VALUES ('$news_id', '$news_id', '$news_type', '$news_title', '$news_descriptions', '$date', '$news_url', '$news_detail_format', '$news_detail_descriptions', 'y', 'n')";
	$result = mysqli_query($link,$sql);
		
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
				$img_sql="select max(news_id) from news";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$news_id_new = $img_row[0];
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
				$img_sql_update="update news set news_picture = '$fileupload_name' where news_id = '$news_id_new'" ;
				mysqli_query($db,$img_sql_update);
				unlink($fileupload);
			}
		}

		if ($fileupload2 != "") {
		$ext = strtolower(end(explode('.', $fileupload_name2)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
				$img_sql2="select max(news_id) from news";
				$img_result2 = mysqli_query($db,$img_sql2);
				$img_row2 = mysql_fetch_row($img_result2) ;
				$news_id_new2 = $img_row2[0];
				$fileupload_name2 = $img_row2[0].".".$ext ;
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
				$img_sql_update2="update news set news_detail_picture = '$fileupload_name' where news_id = '$news_id_new2'" ;
				mysqli_query($db,$img_sql_update2);
				unlink($fileupload2);
			}
		}

		if ($fileupload3 != "") {
		$ext = strtolower(end(explode('.', $fileupload_name3)));	
			if ($ext == "doc" or $ext == "xls" or $ext == "pdf") {
				$img_sql3="select max(news_id) from news";
				$img_result3 = mysqli_query($db,$img_sql3);
				$img_row3 = mysql_fetch_row($img_result3) ;
				$news_id_new3 = $img_row3[0];
				$fileupload_name3 = $img_row3[0].".".$ext ;
				copy($fileupload3,"../file_news/".$fileupload_name3);
				
				$img_sql_update3="update news set news_detail_file = '$fileupload_name3' where news_id = '$news_id_new3'" ;
				mysqli_query($db,$img_sql_update3);
				unlink($fileupload3);
			}
		}
		
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=news_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=news_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=news_add.php?message=info">');
}
?>