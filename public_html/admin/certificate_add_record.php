<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$file_number = $_REQUEST['file_number'];
$type_certificate = $_REQUEST['type_certificate'];
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
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if($file_number != "" and $weight != "" and $date != ""){
	$sql_file_number = "select * from certificate where file_number = '$file_number'";
	$result_file_number = mysqli_query($db,$sql_file_number);
	$num = mysql_num_rows($result_file_number) ;
		if ($num > 0) {
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_add.php?message=warning">');
			exit();
		} 
		
	$sql_max = "select max(certificate_id) from certificate";
	$result_max = mysqli_query($db,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$certificate_id = $row_max[0]+1;
	
	$sql = "insert into certificate (certificate_id, certificate_order, type_certificate, file_number, date, shape_and_cut, weight, dimensions, color, identification, magnification, conment) VALUES ('$certificate_id', '$certificate_id', '$type_certificate', '$file_number', '$date', '$shape_and_cut', '$weight', '$dimensions' , '$color', '$identification', '$magnification', '$conment')";
	$result = mysqli_query($link,$sql);
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_add.php?message=error">');
		}
		
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif") {
				$img_sql="select max(certificate_id) from certificate";
				$img_result = mysqli_query($db,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$certificate_id_new = $img_row[0];
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
				$img_sql_update="update certificate set picture = '$fileupload_name' where certificate_id = '$certificate_id_new'" ;
				mysqli_query($db,$img_sql_update);
				unlink($fileupload);
			}
		}

}else{
	echo ('<meta http-equiv="refresh" content="0;URL=certificate_add.php?message=info">');
}
?>