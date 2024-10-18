<?php session_start();
$file_number=$_REQUEST['file_number'];
$weight=$_REQUEST['weight'];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 	include "../connections/config.inc.php";
	$sql_chk = "select file_number,weight from certificate where file_number = '$file_number'";
	$result_chk = mysqli_query($link,$sql_chk);
	$rs_chk = mysqli_fetch_array($result_chk);
		if($rs_chk){
			if($weight == $rs_chk['weight']){
				$_SESSION["sess_userid"] = session_id();
				$_SESSION["sess_username"] = $file_number;
				echo ('<meta http-equiv="refresh" content="0;URL=certificate.php">');
			}else{
?>
			<script language="javascript">
				alert(" Weight ไม่ถูกต้อง");
				history.back();
			</script>
<?php 			}
		}else{
?>
		<script language="javascript">
            alert("File Number ไม่ถูกต้อง");
            history.back();
        </script>
<?php 		}
?>
