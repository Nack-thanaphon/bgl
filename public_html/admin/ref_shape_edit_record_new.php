<?php
include "chksession.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";

$name = addslashes($_POST['name']);
/************* file upload ****************/
$pic = $_FILES['pic']['tmp_name'];
$pic_name = $_FILES['pic']['name'];
$pic_size = $_FILES['pic']['size'];
$pic_type = $_FILES['pic']['type'];

if( ($pic_size ==0 )&& ($_POST['pic_hidden']!="") )
{
	$pic_name = $_POST['pic_hidden'];
}

if($name != "" && ($pic_size >0 || $_POST['pic_hidden']!="") )
{
	/*$sql = "SELECT * FROM shapes WHERE name = '$name' ";
	$result = mysqli_db_query($db,$sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows>0)
	{
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_edit_new.php?message=warning">');
		exit;
	}*/

	$sql = "UPDATE shapes SET  name = '$name', pic = '$pic_name' WHERE name = '$name'";
	
	$qry = mysqli_query($sql, $link);
	if ($qry)
	{
		if ($pic != "") 
		{
			$ext = strtolower(end(explode('.', $pic_name)));	
			if ($ext == "jpg" or $ext == "jpeg" or $ext == "png" or $ext == "gif")
			{
				copy($pic,"../pic_shape/".$pic_name);
				if ($ext == "jpg" or $ext == "jpeg") 
				{
					$ori_img = imagecreatefromjpeg($pic);
				}
				else if ($ext == "png") 
				{
					$ori_img = imagecreatefrompng($pic);
				}
				else if ($ext == "gif") 
				{
					$ori_img = imagecreatefromgif($pic);
				}
				$ori_size = getimagesize($pic);
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
						imagejpeg($new_img,"../pic_shape/".$pic);
					}
					else if ($ext == "png")
					{
						imagepng($new_img,"../pic_shape/".$pic);
					}
					else if ($ext == "gif")
					{
						imagegif($new_img,"../pic_shape/".$pic);
					}
					imagedestroy($ori_img);
					imagedestroy($new_img);
				} // end if ($ori_w>300)
				unlink($pic);
			}
		} // end if ($pic != "") 
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_edit_new.php?message=success">');
	}
	else
	{
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_edit_new.php?name='.$name.'&message=error">');
	}	// end if ($qry)
}
else
{
	echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_edit_new.php?message=info">');
}

