<?php

	set_time_limit(10);

	include "../connections/config.inc.php";
	require_once "./class/class.writeexcel_workbook.inc.php";
	require_once "./class/class.writeexcel_worksheet.inc.php";
	
	# ======================== Create Folder Data ==================================
	chdir('~');
	$pathSave = 'C:\\Export-BGL\\';
	if (!file_exists($pathSave)) {
		mkdir($pathSave,0777);
	}
	$pathSaveImg = $pathSave.'Img\\';
	if (!file_exists($pathSaveImg)) {
		mkdir($pathSaveImg,0777);
	}
	$pathSaveQrcode = $pathSave.'Qr-Code\\';
	if (!file_exists($pathSaveQrcode)) {
		mkdir($pathSaveQrcode,0777);
	}
	
	
	# ========================== QR Code ==================================
	//echo $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
	$PNG_TEMP_DIR = $pathSaveQrcode;
	$PNG_WEB_DIR = 'temp/';
	include "./php_qrcode/qrlib.php"; 
	
	//ofcourse we need rights to create temp dir
    //if (!file_exists($PNG_TEMP_DIR))
        //mkdir($PNG_TEMP_DIR);
	
	$errorCorrectionLevel = 'H';
	$matrixPointSize = 4;
	
	//$filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    //QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
	
	
	# ========================== End QR Code ==================================
	
	
	$dateNow = date('d-m-Y');
	//$fname = tempnam("C:\\Export-BGL\\", $dateNow.".xls");
	$fname = "C:\\Export-BGL\\".$dateNow.".xls";
	$workbook = &new writeexcel_workbook($fname);
	$worksheet = &$workbook->addworksheet();
	
	
	# Set Width Column
	$worksheet->set_column(0,0,2);
	$worksheet->set_column(1,1,6);
	$worksheet->set_column(2,2,15);
	$worksheet->set_column(3,3,30);
	$worksheet->set_column(4,4,30);
	$worksheet->set_column(5,5,30);
	$worksheet->set_column(6,6,30);
	$worksheet->set_column(7,7,30);
	$worksheet->set_column(8,8,30);
	$worksheet->set_column(9,9,30);
	$worksheet->set_column(10,10,30);
	$worksheet->set_column(11,11,30);
	
	
	# Format header	
	$text_header =& $workbook->addformat();
	$text_header->set_font('TH SarabunPSK');
	$text_header->set_size(14);
	$text_header->set_bold();
	
	# Format data
	$text_data =& $workbook->addformat();
	$text_data->set_font('TH SarabunPSK');
	$text_data->set_size(14);
	
	# Header detail
	$worksheet->write(0, 0, 'No', $text_header);
	$worksheet->write(0, 1, 'Number', $text_header);
	$worksheet->write(0, 2, 'Date', $text_header);
	$worksheet->write(0, 3, 'Shape and Cut', $text_header);
	$worksheet->write(0, 4, 'Weight', $text_header);
	$worksheet->write(0, 5, 'Dimensions', $text_header);
	$worksheet->write(0, 6, 'Color', $text_header);
	$worksheet->write(0, 7, 'Identification', $text_header);
	$worksheet->write(0, 8, 'Commment', $text_header);
	$worksheet->write(0, 9, 'Commment2', $text_header);
	$worksheet->write(0, 10, 'Pic', $text_header);
	$worksheet->write(0, 11, 'QR code', $text_header);
		
	
	$cerTxt = $_REQUEST['cerTxt'];	
	$cerTxt = trim($cerTxt, ',');	
	$sql = "select * from certificate where certificate_id in($cerTxt) order by certificate_id desc";
	$rs = mysqli_db_query($db, $sql);	
	
	$rowExcel = 1;	
	while ($row = mysqli_fetch_array($rs)) {
		
		// copy image		
		copy('../thumbnail_certificate/'.$row["picture"], $pathSaveImg.$row["picture"]);
		
		// create qr code
		$filename = $PNG_TEMP_DIR.$row["file_number"].'.png';
		QRcode::png(BASE_URL.'/MyPDF/'.$row["file_number"].'.pdf', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
		
		$worksheet->write($rowExcel, 0, $rowExcel, $text_data);
		$worksheet->write($rowExcel, 1, cv($row["file_number"]), $text_data);
		$worksheet->write($rowExcel, 2, date('d F Y', strtotime($row["date"])), $text_data);
		$worksheet->write($rowExcel, 3, cv($row["shape_and_cut"]), $text_data);
		$worksheet->write($rowExcel, 4, cv($row["weight"].'Cts.'), $text_data);
		$worksheet->write($rowExcel, 5, cv($row["dimensions"]), $text_data);
		$worksheet->write($rowExcel, 6, cv($row["color"]), $text_data);
		$worksheet->write($rowExcel, 7, cv($row["identification"]), $text_data);
		$worksheet->write($rowExcel, 8, cv($row["magnification"]), $text_data);
		$worksheet->write($rowExcel, 9, cv($row["conment"]), $text_data); 	
		$worksheet->write($rowExcel, 10, $pathSaveImg.$row["picture"], $text_data);
		$worksheet->write($rowExcel, 11, $filename, $text_data);
		
		
		
		$rowExcel++;
	}
	
	$workbook->close();
	
	/*echo('<script>alert("Export Complete.");window.close();</script>');*/
	
	header("Content-Type: application/x-msexcel; name=\"example-simple.xls\"");
	header("Content-Disposition: inline; filename=\"$dateNow.xls\"");
	$fh=fopen($fname, "rb");
	fpassthru($fh);
	//unlink($fname);
	
	
	function cv($txt) {
		return iconv('UTF-8', 'TIS-620', $txt);
	}

?>