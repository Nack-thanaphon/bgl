<?php 
	include "chksession.php";
	

	include "../connections/config.inc.php";
	$certificate_id = $_GET['certificate_id'];
	
	$sql = "select * from certificate_new where certificate_id = '$certificate_id'";
	$result = mysql_db_query ($db,$sql);
	$row = mysqli_fetch_array($result);
	$certificate_id = $row['certificate_id'];
	$certificate_order = $row['certificate_order'];
	$customer = $row['customer'];
	$type_certificate = $row['type_certificate'];
	$file_number = $row['file_number'];
	$date = $row['cer_date'];
	$dimension = $row['dimension'];
	$d1 = $row['d1'];
	$d2 = $row['d2'];
	$d3 = $row['d3'];
	$weight = $row['weight'];
	$shape = $row['shape'];
	$cut = $row['cut'];
	$color = $row['color'];
	$optic_character = $row['optic_character'];
	$optic_character_detail = $row['optic_character_detail'];
	$transparency = $row['transparency'];
	$sg = $row['sg'];
	$ri = $row['ri'];
	$fluorescent_lw = $row['fluorescent_lw'];
	$fluorescent_sw = $row['fluorescent_sw'];
	$ccf = $row['ccf'];
	$pleochroism = $row['pleochroism'];
	$pleochroism_v1 = $row['pleochroism_v1'];
	$pleochroism_v2 = $row['pleochroism_v2'];
	$spectrum = $row['spectrum'];
	$immersion = $row['immersion'];
	$microscopic = $row['microscopic'];
	$microscopic_other = $row['microscopic_other'];
	$shape_outline = $row['shape_outline'];
	$plotting = $row['plotting'];
	$cmt_g1 = $row['cmt_g1'];
	$cmt_g1_sub = $row['cmt_g1_sub'];
	$cmt_g1_sub_pb = $row['cmt_g1_sub_pb'];
	$cmt_g2 = $row['cmt_g2'];
	$cmt_g2_sub_glass = $row['cmt_g2_sub_glass'];
	$cmt_g2_sub_residual = $row['cmt_g2_sub_residual'];
	$cmt_g3 = $row['cmt_g3'];
	$cmt_g3_doublet_v1 = $row['cmt_g3_doublet_v1'];
	$cmt_g3_doublet_v2 = $row['cmt_g3_doublet_v2'];
	$cmt_g3_triplet_v1 = $row['cmt_g3_triplet_v1'];
	$cmt_g3_triplet_v2 = $row['cmt_g3_triplet_v2'];
	$cmt_g3_triplet_v3 = $row['cmt_g3_triplet_v3'];
	$identification = $row['identification'];
	$identification_nat = $row['identification_nat'];
	$identification_syn = $row['identification_syn'];
	$instrument = $row['instrument'];
	$adv_instrument = $row['adv_instrument'];
	$picture = $row['picture'];
	$comment = $row['comment'];
	$magnification = $row['magnification'];
	
	list($y, $m, $d ) = explode("-", $date);
	if($m=="01"){
		$month="Jan";
	}else if($m=="02") {
		$month="Feb";
	}else if($m=="03") {
		$month="Mar";
	}else if($m=="04") {
		$month="Apr";
	}else if($m=="05") {
		$month="May";
	}else if($m=="06") {
		$month="Jun";
	}else if($m=="07") {
		$month="Jul";
	}else if($m=="08") {
		$month="Aug";
	}else if($m=="09") {
		$month="Sep";
	}else if($m=="10") {
		$month="Oct";
	}else if($m=="11") {
		$month="Nov";
	}else if($m=="12") {
		$month="Dec";
	}
	
	$date_print = $d." ".$month." ".$y;
	
	if ($date == "0000-00-00"){
		$date_print = "";
	} else {
		$date_print = "$date_print";
	}
	
	if ($picture != "")
	{
		$picture_print = "<img src='/home/staff/bgl/public_html/thumbnail_certificate/$picture' width='150' height='150'/>";
	} else {
		$picture_print = "<img src='images_admin/no_picture.jpg' />";
	}
	ob_start();
	require_once ("/home/staff/bgl/public_html/MPDF57/mpdf.php");
?>
<style>
	table.print td
	{
		padding-left:10px;
	}

</style>
</html>
<body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="print">
    	<tr>
        	<td colspan="4"><img src="/home/staff/bgl/public_html/images/logo_bgl.jpg" width="100%"></td>
        </tr>
        <tr>
        	<td width="50%" colspan="2" align="center"><h2><strong>Gemstone Identification</strong> Report</h2></td>
            <td width="50%" colspan="2">&nbsp;</td>
        </tr>
        <tr>
        	<td colspan="2" >&nbsp;</td>
            <td colspan="2" align="center" ><strong>Comment(s):</strong> - No indications of heat treatment</td>
        </tr>
        <tr>
        	<td width="15%"><strong>Report number</strong></td>
        	<td width="35%"><?php echo $file_number ;?></td>
            <td width="25%">&nbsp;</td>
            <td width="25%">&nbsp;</td>
        </tr>
        <tr>
        	<td ><strong>Date</strong></td>
        	<td ><?php echo $date_print;?></td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
        </tr>
        <tr>
        	<td ><strong>Laboratory Report</strong></td>
        	<td ><?php echo $picture_print ;?></td>
            <td align="center" ><hr width="80%">Gemologist<br>
          B.Sc.(Gemology),CDG(HRD),FGA </td>
            <td align="center" ><hr width="80%">Gemologist<br>
          B.Sc.(Gemology),CDG(HRD),FGA </td>
        </tr>
        <tr>
        	<td ><strong>Identification</strong></td>
        	<td ><?php echo $identification." " ;  
			if($identification=="Natural")
			{
				echo $identification_nat ;
			}
			if($identification=="Synthetic")
			{
				echo $identification_syn ;
			}
			?></td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
        </tr>
        <tr>
        	<td ><strong>Shape and Cut	</strong></td>
        	<td ><?php echo "$shape/$cut" ;?></td>
            <td colspan="2" >The result of gem identification is done by the following lab test</td>
        </tr>
        <tr>
        	<td ><strong>Weight</strong></td>
        	<td ><?php echo $weight ;?> Cts.</td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Pefractive index</td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Specific gravity</td>
        </tr>
        <tr>
        	<td ><strong>Dimension</strong></td>
        	<td ><?php echo $d1." x ".$d2." x ".$d3 ;?> mm. </td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Optical character</td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Microscope</td>
        </tr>
        <tr>
        	<td ><strong>Color</strong></td>
        	<td ><?php echo $color ;?></td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Absorption spectrum</td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Pleoctroism</td>
        </tr>
        <tr>
        	<td ><strong>Transparency</strong></td>
        	<td ><?php echo $transparency ;?></td>
            <td ><img src="/home/staff/bgl/public_html/images/correct.png" width="16" height="16"> Fluorescence</td>
            <td >&nbsp;</td>
        </tr>
        <tr>
        	<td ><strong>Magnification</strong></td>
       	  <td ><?php echo $magnification ;?></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" ></td>
        </tr>
        <tr>
        	<td ></td>
        	<td ></td>
            <td colspan="2" align="center" >ดูคำชี้แจงด้านหลัง<br>
            See term and condition on reverse</td>
        </tr>
    </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean(); 

$mpdf = new mPDF('th_saraban','A4-L', 0, '', 0, 0, 0, 0, 0, 0);
$stylesheet = file_get_contents('/home/staff/bgl/public_html/MPDF57/css/style.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHtml($html);
$mpdf->Output("ใบรับรองแบบเต็ม");
//echo $html;
?>