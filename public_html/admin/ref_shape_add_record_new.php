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

if($name != "" && $pic_size >0)
{
	$sql = "SELECT * FROM shapes WHERE name = '$name' ";
	$result = mysqli_query($link,$sql);
	$num_rows = mysql_num_rows($result);
	
	if($num_rows>0)
	{
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_add_new.php?message=warning">');
		exit;
	}

	$sql = "INSERT INTO shapes (name, pic) VALUES('$name', '$pic_name')";
	
	$qry = mysqli_query($link,$sql);
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
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_add_new.php?message=success">');
	}
	else
	{
		echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_add_new.php?message=error">');
	}	// end if ($qry)
}
else
{
	echo ('<meta http-equiv="refresh" content="0;URL=ref_shape_add_new.php?message=info">');
}

