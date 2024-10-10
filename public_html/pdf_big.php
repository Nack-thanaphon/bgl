<html>
<head>
<title>Auto AU PDF</title>
<body>
<?php
define('FPDF_FONTPATH','font/');
 
require('fpdf.php');
 
//$pdf=new FPDF();
$pdf = new FPDF('P', 'pt', array(595, 843)); 

//ข้อมูลที่แสดง
include "connections/config.inc.php";
$certificate_id2=$_REQUEST['certificate_id'];
//$sql="select * from  certificate where certificate_id='$certificate_id2'";
$sql="select certificate_id, certificate_order,type_certificate,file_number,DATE_FORMAT(date,'%D %M %Y') as date,
shape_and_cut,weight,dimensions,color,identification,magnification,picture,conment,user_id from  certificate where certificate_id='$certificate_id2'";

$result=mysqli_query($link,$sql);
$rs=mysqli_fetch_array($result);
$certificate_id=$rs[certificate_id];
$file_number=$rs[file_number];
$date=$rs['date'];
$shape_and_cut=$rs['shape_and_cut'];
$weight=$rs['weight'];
$dimensions=$rs['dimensions'];
$color=$rs['color'];
$magnification=$rs['magnification'];
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


// Load fon t cambria for cer.
//$pdf->AddFont('tahoma','','tahoma.php');
$pdf->AddFont('cambria','','cambria.php');

//กำหนดระยะห่างของตัวอกษรจากขอบ ขวา(20) บน(0) ซ้าย(0)

$pdf->SetMargins(20,0,0);

//สร้างหน้าเอกสาร
$pdf->AddPage();

// Edit new Template  Oct 21, 2018

// A4 size :: 595 x 842
//$pdf->Image('qrtemplate/'.'template01.png', 0, 0, 595, 842); 
//$pdf->Image('qrtemplate/'.'template.jpg', 0, 0, 590, 830); 
$pdf->Image('qrtemplate/'.'template2019.jpg', 0, 0, 590, 830); 

//$pdf->SetFont('Arial', 'B', 23);
$pdf->SetFont('cambria','',14);
//$pdf->Text(150, 350, $certificate_id_text); 
// ---  print Label of Data
$pdf->Text(150, 220, 'File number :');
$pdf->Text(150, 250, 'Date :');
$pdf->Text(150, 280, 'Weight :'); 
$pdf->Text(150, 310, 'Shape and cut :'); 
$pdf->Text(150, 340, 'Dimensions :');

$pdf->Text(150,370, 'Magnification :');

$pdf->Text(150, 400, 'Identification :');  
$pdf->Text(150, 430, 'Color :');
$pdf->Text(150, 460, 'Comments :');

$file_number_text=' '.$file_number;
$date_text=' '.$date;
$shape_and_cut_text=' '.$shape_and_cut;
$weight_text=' '.$weight.'  Cts.';
$dimensions_text=' '.$dimensions .'';
$color_text=' '.$color;
$magnification_text = ' '.$magnification;
$identification_text=' '.$identification;
$conment_text=' '.$conment;
// ---  print of Data
$pdf->Text(300, 220, $file_number_text);
$pdf->Text(300, 250, $date_text);
$pdf->Text(300, 280, $weight_text); 
$pdf->Text(300, 310, $shape_and_cut_text); 
$pdf->Text(300, 340, $dimensions_text);

$pdf->Text(300, 370, $magnification_text);

$pdf->Text(300, 400, $identification_text);  
$pdf->Text(300, 430, $color_text);
//$pdf->Text(300, 460, $conment_text);   
$pdf->SetFont('cambria','',12);
//$pdf->SetXY(300, 435);
$pdf->SetXY(250, 445);
$pdf->MultiCell( 350  , 20 , $conment_text, 0,'T' ); 


$pdf->Image($photo,339,515,145,135);
 
$pdf->Output("MyPDF/".$file_number.".pdf","F");


?>
<meta http-equiv="refresh" content="0;URL=MyPDF/<?=$file_number?>.pdf">

</body>
</html>