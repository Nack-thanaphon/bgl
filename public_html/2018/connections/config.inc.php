<?php
	$link = mysqli_connect("localhost", "aree", "aree32")or die("Could not connect: " . mysqli_connect_error());
	mysqli_query("set NAMES UTF8");
	
	
	$sql_campus = "select * from campus where campus_id = '1'";
	$result_campus = mysqli_query($sql_campus)or die("Invalid query: " . mysqli_connect_error());
	$row_campus = mysqli_fetch_array($result_campus);
	
		$campus_id = $row_campus['campus_id'];
		$campus_name = $row_campus['campus_name'];
		$campus_address = $row_campus['campus_address'];
		$campus_banner_path = $row_campus['campus_banner_path'];
		$campus_copyright = $row_campus['campus_copyright'];
		
	$sql_admin = "select * from user where campus_id = '$campus_id' and username = '$sess_user'";
	$result_admin = mysqli_query($sql_admin)or die("Invalid query: " . mysqli_connect_error());
	$row_admin = mysqli_fetch_array($result_admin);
			
	$user_id_admin = $row_admin['user_id'];
	$name_admin = $row_admin['name'];
	$photo_part_admin = $row_admin['photo_part'];
	
	if($photo_part_admin != ""){
		
		$photo_admin = ('<img src="thumbnail_user/'.$photo_part_admin.'" title="'.$name.'" />');
		
	}

?>