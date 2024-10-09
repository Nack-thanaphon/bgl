<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
	$certificate_id = $_POST["certificate_id"];
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
	$gemologist_update = $_POST['gemologist_create'];
	$gemologist_update_date = date('Y-m-d H:i:s');
	
	/************* file upload ****************/
	$spectrum = $_FILES['spectrum']['tmp_name'];
	$spectrum_name = $_FILES['spectrum']['name'];
	$spectrum_size = $_FILES['spectrum']['size'];
	$spectrum_type = $_FILES['spectrum']['type'];
	$file_type = strtolower(end(explode('.', $spectrum_name)));
	$spectrum_file = "S$file_number.$file_type";
	$spectrum_hidden = $_POST['spectrum_hidden']; // ไฟล์เดิม
	
	$picture = $_FILES['picture']['tmp_name'];
	$picture_name = $_FILES['picture']['name'];
	$picture_size = $_FILES['picture']['size'];
	$picture_type = $_FILES['picture']['type'];
	$file_type = strtolower(end(explode('.', $picture_name)));
	$picture_file = "P$file_number.$file_type";
	$picture_hidden = $_POST['picture_hidden']; // ไฟล์เดิม
	/***************************************/
	
	// เช็คชื่อรูป
	if($spectrum_size == 0)
	{
		$spectrum_file = $spectrum_hidden;
	}
	
	if($picture_size == 0)
	{
		$picture_file =$picture_hidden;
	}

	if($customer != "" && $file_number != "" && $weight != "" && $cer_date != "" && ($picture_size >0 || $picture_hidden!=""))
	{
		$sql = "SELECT * FROM certificate_new WHERE file_number = '$file_number' AND certificate_id != '$certificate_id' ";
		$result = mysqli_db_query($db,$sql);
		$num_rows = mysql_num_rows($result);
		
		if($num_rows>0)
		{
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit_new.php?certificate_id='.$certificate_id.'&message=warning">');
			exit;
		}
		
		$sql = "update certificate_new 
					set certificate_order 		= '',
						type_certificate 		= '',
						customer 				= '$customer',
						file_number 			= '$file_number',
						cer_date 				= '$cer_date',
						shape 					= '$shape',
						cut 						= '$cut',
						weight 					= '$weight',
						dimension 				= '$dimension',
						d1 						= '$d1',
						d2 						= '$d2',
						d3 						= '$d3',
						ds 						= '$ds',
						color 						= '$color',
						magnification 			= '$magnification',
						optic_character 		= '$optic_character',
						optic_character_detail = '$optic_character_detail',
						transparency 			= '$transparency',
						sg 						= '$sg',
						ri 							= '$ri',
						fluorescent_lw 		= '$fluorescent_lw',
						fluorescent_sw 		= '$fluorescent_sw',
						ccf 						= '$ccf',
						pleochroism 			= '$pleochroism',
						pleochroism_v1 		= '$pleochroism_v1',
						pleochroism_v2 		= '$pleochroism_v2',
						spectrum 				= '$spectrum_file',
						immersion 				= '$immersion',
						microscopic 			= '$microscopic',
						microscopic_other 	= '$microscopic_other',
						shape_outline 			= '$shape_outline',
						plotting 					= '$plotting',
						cmt_g1 					= '$cmt_g1',
						cmt_g1_sub 			= '$cmt_g1_sub',
						cmt_g1_sub_pb 		= '$cmt_g1_sub_pb',
						cmt_g2 					= '$cmt_g2',
						cmt_g2_sub_glass 	= '$cmt_g2_sub_glass',
						cmt_g2_sub_residual = '$cmt_g2_sub_residual',
						cmt_g3 					= '$cmt_g3',
						cmt_g3_doublet_v1 	= '$cmt_g3_doublet_v1',
						cmt_g3_doublet_v2 	= '$cmt_g3_doublet_v2',
						cmt_g3_triplet_v1 	= '$cmt_g3_triplet_v1',
						cmt_g3_triplet_v2 	= '$cmt_g3_triplet_v2',
						cmt_g3_triplet_v3 	= '$cmt_g3_triplet_v3',
						identification	 		= '$identification',
						identification_nat 	= '$identification_nat',
						identification_syn 	= '$identification_syn',
						instrument 				= '$instrument',
						adv_instrument 		= '$adv_instrument',
						picture 					= '$picture_file',
						comment 				= '$comment',
						gemologist_update 	= '$gemologist_update',
						gemologist_update_date = '$gemologist_update_date'
					where certificate_id 		= '$certificate_id' ";
		$qry = mysqli_query($sql, $link);
		if ($qry)
		{
			// อัพรูป
			if ($spectrum != "") 
			{
				$ext = strtolower(end(explode('.', $spectrum_name)));	
				if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif")
				{
					$spectrum_name = $spectrum_file ;
					unlink("../thumbnail_certificate/".$spectrum_hidden); // ลบไฟล์เก่า
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
					unlink("../thumbnail_certificate/".$picture_hidden); // ลบไฟล์เก่า
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
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit_new.php?certificate_id='.$certificate_id.'&message=success">');
		}
		else
		{
			echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit_new.php?certificate_id='.$certificate_id.'&message=error">');
		} // end if ($qry)
	}
	else
	{
		echo ('<meta http-equiv="refresh" content="0;URL=certificate_edit_new.php?certificate_id='.$certificate_id.'&message=info">');
	} // end if($customer != "" && $file_number != "" && $weight != "" && $cer_date != "" && ($picture_size >0 || $picture_hidden!=""))
?>