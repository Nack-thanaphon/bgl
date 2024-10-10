<html>
<head>
<title>Auto AU PDF</title>
<body>
<?php
define('FPDF_FONTPATH','font/');
 
require('fpdf.php');
 
$pdf=new FPDF();

//ข้อมูลที่แสดง
include "connections/config.inc.php";
$certificate_id2=$_REQUEST['certificate_id'];
$sql="select * from  certificate where certificate_id='$certificate_id2'";
$result=mysqli_db_query($db,$sql);
$rs=mysqli_fetch_array($result);
$certificate_id=$rs[certificate_id];
$file_number=$rs[file_number];
$date=$rs['date'];
$shape_and_cut=$rs['shape_and_cut'];
$weight=$rs['weight'];
$dimensions=$rs['dimensions'];
$color=$rs['color'];
$identification=$rs['identification'];
$conment=$rs['conment'];

//รูปภาพ
$photo='thumbnail_certificate/'.$rs['picture'];
//เกี่ยวกับวันเดือนปี

list($y, $m, $d) = explode("-", $date);
if($m=="01"){
$str_m="January";
}
if($m=="02")
{
$str_m="February";
}
if($m=="03")
{
$str_m="March";
}
if($m=="04")
{
$str_m="April";
}
if($m=="05")
{
$str_m="May";
}
if($m=="06")
{
$str_m="June";
}
if($m=="07")
{
$str_m="July";
}
if($m=="08")
{
$str_m="August";
}
if($m=="09")
{
$str_m="September";
}
if($m=="10")
{
$str_m="October";
}
if($m=="11")
{
$str_m="November";
}
if($m=="12")
{
$str_m="December";
}

if($d=="01" || $d=="21" || $d=="31")
{
	$list_day="st";
}
if($d!="01" && $d!="21"&& $d!="31" && $d!="03" && $d!="23")
{
	$list_day="th";
}
if($d=="02" || $d=="22")
{
	$list_day="nd";
}
if($d=="03" || $d=="23")
{
	$list_day="rd";
}
 
// เพิ่มฟ้อนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น tahoma
$pdf->AddFont('tahoma','','tahoma.php');

//กำหนดระยะห่างของตัวอกษรจากขอบ ขวา(20) บน(0) ซ้าย(0)

$pdf->SetMargins(20,0,0);

//สร้างหน้าเอกสาร
$pdf->AddPage();
 
// กำหนดฟ้อนต์ที่จะใช้  อังสนา ตัวธรรมดา ขนาด 14
$pdf->SetFont('tahoma','',20);
// พิมพ์ข้อความลงเอกสาร  มีกรอบด้วย
$pdf->MultiCell( 50  , 15, iconv( 'UTF-8','cp874' , '' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',20);
$pdf->MultiCell( 180  , 5 , iconv( 'UTF-8','cp874' , 'File Number          '.$file_number.'') );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 3 , iconv( 'UTF-8','cp874' , '' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Date                             '.$d.''.$list_day.' '.$str_m.' '.$y.'') );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Weight                          '.$weight.' Cts.' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Shape and Cut               '.$shape_and_cut.'' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Dimensions                   '.$dimensions.'' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Identification                 '.$identification.'' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Color                            '.$color.'' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 10 , iconv( 'UTF-8','cp874' , '' ) );
$pdf->Ln();
$pdf->Image($photo,120,140,50);
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 15 , iconv( 'UTF-8','cp874' , '' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 7 , iconv( 'UTF-8','cp874' , 'Comments : '.$conment.'' ) );
$pdf->Ln();
$pdf->SetFont('tahoma','',15);
$pdf->MultiCell( 170  , 15 , iconv( 'UTF-8','cp874' , '' ) );
$pdf->Ln();

$pdf->Output("MyPDF/".$file_number.".pdf","F");

?>
<meta http-equiv="refresh" content="0;URL=MyPDF/<?=$file_number?>.pdf">

</body>
</html>