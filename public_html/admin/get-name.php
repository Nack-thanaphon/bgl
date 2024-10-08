<?php

	include "../connections/config.inc.php";
	
	$name = trim($_REQUEST['name']);
	
	if (!empty($name)) {
	
		$sql = "select * from certificate where file_number like '%$name%' order by certificate_id desc";
		$rs = mysql_db_query($db, $sql);
		
		if (mysql_num_rows($rs) > 0) {
			echo(' 
				<div style="overflow:scroll;height:200px;"><table cellspacing="0" border="1">
				<tr>
					<td>File Number</td>
					<td>Weight</td>
					<td>Date</td>
					<td>Type</td>
					<td>เลือก</td>
				</tr>
			');
			while ($row = mysqli_fetch_array($rs)) {
				$type_certificate = $row["type_certificate"];
				if($type_certificate == "1"){
					$type_certificate_print = "Verbal";
				}else if($type_certificate == "2"){
					$type_certificate_print = "Short report";
				}else if($type_certificate == "3"){
					$type_certificate_print = "Full report";
				}
				
				$str = $row["file_number"].'<||>'.$row["shape_and_cut"].'<||>'.$row["date"].'<||>'.$type_certificate_print.'<||>'.$row["certificate_id"];
				
				echo(' 	<tr>
							<td>'.$row["file_number"].'</td>
							<td>'.$row["shape_and_cut"].'</td>
							<td>'.$row["date"].'</td>
							<td>'.$type_certificate_print.'</td>
							<td style="text-align:center"><a href="javascript:;" onclick="sl(this);" rel="'.$str.'"><img border="0" src="./images_admin/ico_success.png"></a></td>
						</tr>
				');
			}
			echo(' </table></div> ');
		}
	} else {
		echo(' No data. ');
	}
?>