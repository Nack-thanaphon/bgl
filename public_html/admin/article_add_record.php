<?php include "chksession.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../connections/config.inc.php";
$article_name = $_REQUEST['article_name'];
$fileupload = $_FILES['fileupload']['tmp_name'];
$fileupload_name = $_FILES['fileupload']['name'];
$fileupload_size = $_FILES['fileupload']['size'];
$fileupload_type = $_FILES['fileupload']['type'];

if ($article_name != "" and $fileupload != "") {
	$sql_max = "select max(article_id) from article";
	$result_max = mysqli_query($link,$sql_max);
	$row_max = mysql_fetch_row($result_max);
	$article_id = $row_max[0]+1;
	
	$sql = "insert into article (article_id, article_name, article_status) VALUES ('$article_id', '$article_name', 'y')";
	$result = mysqli_query($link,$sql);
		if ($fileupload != "") {
		$ext = strtolower(end(explode('.', $fileupload_name)));	
			if ($ext == "doc" or $ext == "xls" or $ext == "pdf") {
				$img_sql="select max(article_id) from article";
				$img_result = mysqli_query($link,$img_sql);
				$img_row = mysql_fetch_row($img_result) ;
				$article_id_new = $img_row[0];
				$fileupload_name = $img_row[0].".".$ext ;
				copy($fileupload,"../file_article/".$fileupload_name);
				
				$img_sql_update="update article set article_file = '$fileupload_name' where article_id = '$article_id_new'" ;
				mysqli_query($link,$img_sql_update);
				unlink($fileupload);
			}
		}
		
		if ($result) {
			echo ('<meta http-equiv="refresh" content="0;URL=article_add.php?message=success">');
		} else {
			echo ('<meta http-equiv="refresh" content="0;URL=article_add.php?message=error">');
		}

} else {
	echo ('<meta http-equiv="refresh" content="0;URL=article_add.php?message=info">');
}
?>