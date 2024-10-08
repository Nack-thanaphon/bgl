<?php
include "chksession.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";

$customer = addslashes($_POST['customer']);
$file_number = addslashes($_POST['file_number']);
	$date1 = $_POST['cer_date'];
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
$cer_date = $y."-".$month."-".$d;
$dimension = $_POST['dimension'];
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$ds = $_POST['ds'];
$weight = $_POST['weight'];
$shape = $_POST['shape'];
$cut = $_POST['cut'];
$color = $_POST['color'];
$optic_character = $_POST['optic_character'];
$optic_character_detail = $_POST['optic_character_detail'];
$transparency = $_POST['transparency'];
$sg = $_POST['sg'];
$ri = $_POST['ri'];
$fluorescent_lw = $_POST['fluorescent_lw'];
$fluorescent_sw = $_POST['fluorescent_sw'];
$ccf = $_POST['ccf'];
$pleochroism = $_POST['pleochroism'];
$pleochroism_v1 = addslashes($_POST['pleochroism_v1']);
$pleochroism_v2 = addslashes($_POST['pleochroism_v2']);
$immersion = $_POST['immersion'];
$microscopic = addslashes($_POST['microscopic']);
$microscopic_other = addslashes($_POST['microscopic_other']);
$shape_outline = $_POST['shape_outline'];
$plotting = $_POST['plotting'];
$cmt_g1 = $_POST['cmt_g1'];
$cmt_g1_sub_pb = $_POST['cmt_g1_sub_pb'];
$cmt_g1_sub = $_POST['cmt_g1_sub'];
$cmt_g2 = $_POST['cmt_g2'];
$cmt_g2_sub_glass = $_POST['cmt_g2_sub_glass'];
$cmt_g2_sub_residual = $_POST['cmt_g2_sub_residual'];
$cmt_g3_doublet_v1 = addslashes($_POST['cmt_g3_doublet_v1']);
$cmt_g3_doublet_v2 = addslashes($_POST['cmt_g3_doublet_v2']);
$cmt_g3 = $_POST['cmt_g3'];
$cmt_g3_triplet_v1 = addslashes($_POST['cmt_g3_triplet_v1']);
$cmt_g3_triplet_v2 = addslashes($_POST['cmt_g3_triplet_v2']);
$cmt_g3_triplet_v3 = addslashes($_POST['cmt_g3_triplet_v3']);
$identification_nat = addslashes($_POST['identification_nat']);
$identification_syn = addslashes($_POST['identification_syn']);
$identification = $_POST['identification'];
$instrument = $_POST['instrument'];
$adv_instrument = $_POST['adv_instrument'];
$comment = addslashes($_POST['comment']);
$gemologist_create = $_POST['gemologist_create'];
$gemologist_create_date = date('Y-m-d H:i:s');

/************* file upload ****************/
$spectrum = $_FILES['spectrum']['tmp_name'];
$spectrum_name = $_FILES['spectrum']['name'];
$spectrum_size = $_FILES['spectrum']['size'];
$spectrum_type = $_FILES['spectrum']['type'];
$file_type = strtolower(end(explode('.', $spectrum_name)));
$spectrum_file = "S$file_number.$file_type";

$picture = $_FILES['picture']['tmp_name'];
$picture_name = $_FILES['picture']['name'];
$picture_size = $_FILES['picture']['size'];
$picture_type = $_FILES['picture']['type'];
$file_type = strtolower(end(explode('.', $picture_name)));
$picture_file = "P$file_number.$file_type";
/***************************************/



if($customer != "" && $file_number != "" && $weight != "" && $cer_date != "" && $picture_size >0)
{
	$sql = "SELECT * FROM certificate_new WHERE file_number = '$file_number' ";
	$result = mysql_db_query($db,$sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows>0)
	{
		echo ('<meta http-equiv="refresh" content="0;URL=certificate_add_new.php?message=warning">');
		exit;
	}

	$sql = "INSERT INTO certificate_new
				(
					certificate_id, certificate_order, type_certificate, customer, file_number, cer_date,
					dimension, d1, d2, d3, ds,
					shape, cut, weight, color,
					magnification, optic_character, optic_character_detail, transparency,
					sg, ri,
					fluorescent_lw, fluorescent_sw, ccf, pleochroism, pleochroism_v1, pleochroism_v2,
					spectrum,
					immersion, microscopic, microscopic_other, shape_outline, plotting,
					cmt_g1, cmt_g1_sub, cmt_g1_sub_pb, 
					cmt_g2, cmt_g2_sub_glass, cmt_g2_sub_residual,
					cmt_g3, cmt_g3_doublet_v1, cmt_g3_doublet_v2, cmt_g3_triplet_v1, cmt_g3_triplet_v2,cmt_g3_triplet_v3,
					identification, identification_nat, identification_syn,
					instrument, adv_instrument, 
					picture,
					comment,
					gemologist_create, gemologist_create_date, gemologist_update, gemologist_update_date
					)
				VALUES
				(
					NULL, NULL, NULL, '$customer', '$file_number', '$cer_date', 
					'$dimension', '$d1', '$d2', '$d3', '$ds',
					'$shape', '$cut', '$weight', '$color',
					'$magnification', '$optic_character', '$optic_character_detail', '$transparency',
					'$sg', '$ri',
					'$fluorescent_lw', '$fluorescent_sw', '$ccf', '$pleochroism', '$pleochroism_v1', '$pleochroism_v2',
					'$spectrum_file',
					'$immersion', '$microscopic', '$microscopic_other', '$shape_outline', '$plotting',
					'$cmt_g1', '$cmt_g1_sub', '$cmt_g1_sub_pb', 
					'$cmt_g2', '$cmt_g2_sub_glass', '$cmt_g2_sub_residual',
					'$cmt_g3', '$cmt_g3_doublet_v1', '$cmt_g3_doublet_v2', '$cmt_g3_triplet_v1', '$cmt_g3_triplet_v2', '$cmt_g3_triplet_v3',
					'$identification', '$identification_nat', '$identification_syn',
					'$instrument', '$adv_instrument', 
					'$picture_file',
					'$comment',
					'$gemologist_create', '$gemologist_create_date', NULL, NULL
					)
				";
	//echo $sql;
	$qry = mysqli_query($sql, $link);
	if ($qry)
	{
		if ($spectrum != "") 
		{
			$ext = strtolower(end(explode('.', $spectrum_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif")
			{
				$spectrum_name = $spectrum_file ;
				copy($spectrum,"../thumbnail_certificate/".$spectrum_name);
				if ($ext == "jpg" or $ext == "jpeg") 
				{
					$ori_img = imagecreatefromjpeg($spectrum);
				}
				else if ($ext == "png") 
				{
					$ori_img = imagecreatefrompng($spectrum);
				}
				else if ($ext == "gif") 
				{
					$ori_img = imagecreatefromgif($spectrum);
				}
				$ori_size = getimagesize($spectrum);
				$ori_w = $ori_size[0];
				$ori_h = $ori_size[1];
				if ($ori_w>300)
				{
					$new_w = 300;
					$new_h = round(($new_w/$ori_w) * $ori_h);
					$new_img = imagecreatetruecolor ($new_w, $new_h);
					imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
					if ($ext == "jpg" or $ext == "jpeg")
					{
						imagejpeg($new_img,"../thumbnail_certificate/".$spectrum_name);
					}
					else if ($ext == "png")
					{
						imagepng($new_img,"../thumbnail_certificate/".$spectrum_name);
					}
					else if ($ext == "gif")
					{
						imagegif($new_img,"../thumbnail_certificate/".$spectrum_name);
					}
					imagedestroy($ori_img);
					imagedestroy($new_img);
				} // end if ($ori_w>300)
				unlink($spectrum);
			}
		} // end if ($spectrum != "") 
		
		if ($picture != "") 
		{
			$ext = strtolower(end(explode('.', $picture_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif")
			{
				$picture_name = $picture_file ;
				copy($picture,"../thumbnail_certificate/".$picture_name);
				if ($ext == "jpg" or $ext == "jpeg") 
				{
					$ori_img = imagecreatefromjpeg($picture);
				}
				else if ($ext == "png") 
				{
					$ori_img = imagecreatefrompng($picture);
				}
				else if ($ext == "gif") 
				{
					$ori_img = imagecreatefromgif($picture);
				}
				$ori_size = getimagesize($picture);
				$ori_w = $ori_size[0];
				$ori_h = $ori_size[1];
				if ($ori_w>300)
				{
					$new_w = 300;
					$new_h = round(($new_w/$ori_w) * $ori_h);
					$new_img = imagecreatetruecolor ($new_w, $new_h);
					imagecopyresized ($new_img, $ori_img,0,0,0,0, $new_w, $new_h, $ori_w, $ori_h);
					if ($ext == "jpg" or $ext == "jpeg")
					{
						imagejpeg($new_img,"../thumbnail_certificate/".$picture_name);
					}
					else if ($ext == "png")
					{
						imagepng($new_img,"../thumbnail_certificate/".$picture_name);
					}
					else if ($ext == "gif")
					{
						imagegif($new_img,"../thumbnail_certificate/".$picture_name);
					}
					imagedestroy($ori_img);
					imagedestroy($new_img);
				} // end if ($ori_w>300)
				unlink($picture);
			}
		} // end if ($picture != "") 
		echo ('<meta http-equiv="refresh" content="0;URL=certificate_add_new.php?message=success">');
	}
	else
	{
		echo ('<meta http-equiv="refresh" content="0;URL=certificate_add_new.php?message=error">');
	}	// end if ($qry)
}
else
{
	echo ('<meta http-equiv="refresh" content="0;URL=certificate_add_new.php?message=info">');
}

