<?php include "./connections/config.inc.php";
session_start();
$sess_userid = session_id();
$sess_username = $_SESSION["sess_username"];
if ($sess_userid <> session_id() or $sess_username == "") {
	echo ('<meta http-equiv="refresh" content="0;URL=index.php">');
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>ห้องปฏิบัติการอัญมณี คณะอัญมณี มหาวิทยาลัยบูรพา วิทยาเขตจันทบุรี </title>

	<meta name="keywords" content="">
	<meta name="description" content="">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
<script type="text/javascript" src="layout/plugins/html5.js"></script>
<![endif]-->

	<link rel="stylesheet" href="layout/style.css" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="layout/js/jquery.js"></script>

	<!-- PrettyPhoto start -->
	<link rel="stylesheet" href="layout/plugins/prettyphoto/css/prettyPhoto.css" type="text/css">
	<script type="text/javascript" src="layout/plugins/prettyphoto/jquery.prettyPhoto.js"></script>
	<!-- PrettyPhoto end -->

	<!-- jQuery tools start -->
	<script type="text/javascript" src="layout/plugins/tools/jquery.tools.min.js"></script>
	<!-- jQuery tools end -->

	<!-- ScrollTo start -->
	<script type="text/javascript" src="layout/plugins/scrollto/jquery.scroll.to.min.js"></script>
	<!-- ScrollTo end -->

	<!-- FlexSlider start -->
	<link rel="stylesheet" href="layout/plugins/flexslider/flexslider.css" type="text/css" />
	<script type="text/javascript" src="layout/plugins/flexslider/jquery.flexslider-min.js"></script>
	<!-- FlexSlider end -->

	<!-- jQuery Form Plugin start -->
	<script type="text/javascript" src="layout/plugins/ajaxform/jquery.form.js"></script>
	<!-- jQuery Form Plugin end -->

	<!-- Twitter Plugin start -->
	<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script type="text/javascript" src="layout/plugins/tweet/tweet.widget.js"></script>
	<!-- Twitter Plugin end -->

	<!-- jQuery Sort Plugin start -->
	<script type="text/javascript" src="layout/plugins/sort/jquery.sort.min.js"></script>
	<!-- jQuery Sort Plugin end -->

	<!-- Roundabout Plugin start -->
	<script type="text/javascript" src="layout/plugins/roundabout/jquery.roundabout.min.js"></script>
	<!-- Roundabout Plugin end -->

	<!-- Nivo Slider Plugin start -->
	<link rel="stylesheet" href="layout/plugins/nivo/nivo-slider.css" type="text/css">
	<script type="text/javascript" src="layout/plugins/nivo/jquery.nivo.slider.pack.js"></script>
	<!-- Nivo Slider Plugin end -->

	<!-- OneByOne start -->
	<link rel="stylesheet" href="layout/plugins/onebyone/css/jquery.onebyone.css" type="text/css" />
	<link rel="stylesheet" href="layout/plugins/onebyone/css/animate.css" type="text/css" />
	<script type="text/javascript" src="layout/plugins/onebyone/jquery.onebyone.min.js"></script>
	<!-- OneByOne end -->

	<script type="text/javascript" src="layout/js/main.js"></script>

</head>

<body class="theme_layout_boxed theme_light theme_footer_normal theme_layout_bg_type_10 theme_color_purple">
	<?php
	include "../connections/config.inc.php";
	include "../counter.php";

	$sql_certificate = "select * from certificate where file_number = '$sess_username' ";
	$result_certificate = mysqli_query($db, $sql_certificate);
	$row_certificate = mysqli_fetch_array($result_certificate);
	$certificate_id = $row_certificate['certificate_id'];
	$type_certificate = $row_certificate['type_certificate'];
	$file_number = $row_certificate['file_number'];
	$weight = $row_certificate['weight'];

	//แบบไม่มีรูป
	if ($type_certificate == 1) {
		$file_number_print = "<a href=" . BASE_URL . "/pdf.php?certificate_id=$certificate_id' target='_blank'>คลิกที่นี้เพื่อเรียกดู ใบรับรอง File Number : $file_number</a>" . "<br>";
	}
	//แบบมีรูป
	if ($type_certificate == 2) {
		$file_number_print = "<a href=" . BASE_URL . "/pdf_photo.php?certificate_id=$certificate_id' target='_blank'>คลิกที่นี้เพื่อเรียกดู ใบรับรอง File Number : $file_number</a>" . "<br>";
	}
	if ($type_certificate == 3) {
		$file_number_print = "<a href=" . BASE_URL . "/pdf_big.php?certificate_id=$certificate_id' target='_blank'>คลิกที่นี้เพื่อเรียกดู ใบรับรอง File Number : $file_number</a>" . "<br>";
	}
	?>
	<div class="wrapper sticky_footer">
		<!-- HEADER BEGIN -->
		<header>
			<div id="header">
				<section class="section_top">
					<div class="inner">
						<div id="logo"><a href="index.php"><img src="images/logo.png" alt="คณะอัญมษณี" title="Burapha Gemological Laboratory; BGL"></a></div>

						<nav class="main_menu">
							<ul>
								<li><a href="index.php">หน้าแรก<span class="subtext">start here</span></a></li>
								<li><a href="#">เกี่ยวกับเรา<span class="subtext">About us</span></a>
									<ul>
										<li><a href="about.php">ความเป็นมา</a></li>
										<li><a href="staff.php">บุคลากร</a></li>
										<li><a href="documents/quality-policy-statement.pdf" title="ถ้อยแถลงนโยบายคุณภาพ" target="_blank">ถ้อยแถลงนโยบายคุณภาพ</a></li>
									</ul>
								</li>

								<li class="current_page_item"><a href="certificate_ck.php" target="_blank" class="loginBtn">ตรวจสอบใบรับรอง<span class="subtext">Verify A Report</span></a></li>
								<li><a href="#">การให้บริการ<span class="subtext">Service</span></a>
									<ul>
										<li><a href="#" target="_blank">เครื่องมือวิเคราะห์</a>
											<ul>
												<li><a href="tool_standart.php">เครื่องมือวิเคราะห์ขั้นพื้นฐาน</a></li>
												<li><a href="tool_advanced.php">เครื่องมือวิเคราะห์ขั้นสูง</a></li>
											</ul>
										</li>
										<li><a href="report.php">การรายงานผล</a></li>
										<li><a href="comment.php">ข้อเสนอแนะในใบรับรอง</a></li>
										<li><a href="article.php">ความรู้ทั่วไป</a></li>
										<li><a href="news.php">ข่าวจากห้องปฏิบัติการ</a></li>
										<li><a href="download.php">เอกสารดาวน์โหลด</a></li>
										<li><a href="#">หลักสูตรอบรม</a>
											<ul>
												<li><a href="http://www.chanthaburi.buu.ac.th/~newsbuu/?select=news&m=detail&id=661" target="_blank">หลักสูตรอบรม แบบไม่มีค่าลงทะเบียน</a></li>
												<li><a href="http://www.chanthaburi.buu.ac.th/~newsbuu/?select=news&m=detail&id=664" target="_blank">หลักสูตรอบรม แบบมีค่าลงทะเบียน</a></li>
											</ul>
										</li>
										<li><a href="post.php">บริการรับ-ส่งตัวอย่างทางไปรษณีย์</a></li>
									</ul>
								</li>

								<li><a href="gallery.php">ข้อมูลอัญมณี<span class="subtext">Gemstone Information</span></a></li>
								<li><a href="contact.php">ติดต่อเรา<span class="subtext">contact us</span></a></li>
							</ul>
						</nav>

						<div class="clearboth"></div>
					</div>
				</section>

				<section class="section_title">
					<div class="inner">
						<div class="block_title">
							<h1>ตรวจสอบใบรับรอง :</h1>
						</div>

						<div class="clearboth"></div>
					</div>
				</section>
				<div class="line_3"></div>
			</div>
		</header>
		<!-- HEADER END -->

		<!-- CONTENT BEGIN -->
		<div id="content">
			<div class="inner">
				<div class="general_content">
					<div class="main_content">
						<div class="separator" style="height:35px;"></div>

						<div class="block_about">
							<div class="main">
								<h4 style="text-align:center;">Burapha Gemological Laboratory; BGL</h4>
								<h2 style="text-align:center;"><?php echo "$file_number_print"; ?></h2><br />
								<h5>Terms and Conditions (Short Report)</h5>
								<p>Gem testing and identifications are provided under the following conditions.</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. BGL and its staff shall not be liable for any damage, destruction, or loss of the
									Sample(s) neither during examination nor for special or consequential damage as a result
									of any error in, or omission from, any brief report, or for issuance or use of any or such brief reports, even if advised of the possibility of such damages, unless through proven fraud or willful misconduct.
								</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. All or these conditions apply to the service users for whom the brief report are prepared, and to all others to whom the brief reports may be shown, distributed, or transferred.</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Any person to whom this memo is shown, distributed or transferred should
									realize that there is a possibility that the gemstone may be different from this certificate. The certificate can be verified by the QR code on its or at <?= BASE_URL ?>
								</p>
								<h5>Terms and Conditions (Full report)</h5>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faculty of Gems, Burapha University is primarily responsible for producing graduates for a Bachelor of Science degree in Gems and Jewelry. Regard to academic services, Burapha Gemological Laboratory (BGL) provides gem testing and identification services for individuals, the gem and jewelry trade and industry. Gem testing and identification are conducted by well-qualified gemologists/mineralogists using standard instruments and techniques to ensure thorough scientific examinations. The services are provided under the following conditions:</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. The samples for examination must be insured by the clients (for any damage during testing process)</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. BGL will examine the samples carefully using professional scientists and will issue a report of certification. This report is NOT a pricing/value appraisal, not is it a guarantee.</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. BGL and staff shall not be responsible for any damage, loss of the sample(s) during examination or in any case possibly resulted from report error/statement emission in the report/ (as well as) any aftermath from issuing or using the report from BGL, despite of prior
									notification on any damages of such report. Whereas, in case of any claims for BGL’s responsibility, the clients must prove/testify that BGL staff is unethically conducting.</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. All of these conditions apply to the client’s users for whose the reports are prepared, and to all others to whose the reports may be shown, distributed, or transferred.</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is strongly recommended that when any transaction is made on any stone, although it obtain accompanying certification or identification reports issued by BGL, the stone in question must be re-examined or re-identified in order to avoid misrepresentation and misuse/abuse of the authentic reports.</p>
								<h5>คำชี้แจง</h5>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คณะอัญมณี มหาวิทยาลัยบูรพา มีภารกิจหลักในการผลิตบัณฑิตระดับปริญญาตรีด้านอัญมณีและเครื่องประดับ การบริการวิชาการแก่ชุมชนจัดเป็นภาระหน้าที่หลักของมหาวิทยาลัย ห้องปฏิบัติการอัญมณี มหาวิทยาลัยบูรพา ดำเนินการให้บริการตรวจสอบอัญมณีแก่บุคคลทั่วไปและผู้ประกอบการธุรกิจอุตสาหกรรมอัญมณี โดยนักอัญมณีวิทยา/แร่วิทยา ผู้ทรงคุณวุฒิ ด้วยเครื่องมือและเทคนิคที่เหมาะสมเพื่อผลการตรวจสอบที่ถูกต้อง ตามหลักการทางวิทยาศาสตร์ การให้บริการดังกล่าวอยู่ภายใต้เงื่อนไขต่อไปนี้ </p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. อัญมณีที่นำมาตรวจสอบต้องได้รับการประกันความเสียหายต่างๆ ที่อาจเกิดขึ้นระหว่างการตรวจโดยเจ้าของอัญมณี/ผู้ใช้บริการ</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. ห้องปฏิบัติการอัญมณี มหาวิทยาลัยบูรพาดำเนินการตรวจสอบตัวอย่างโดยนักอัญมณีวิทยา และนักวิทยาศาสตร์เฉพาะทาง และจะออกรายงาน (หนังสือรับรอง) ตามผลการตรวจสอบดังกล่าว ซึ่งไม่สามารถใช้เอกสารนี้ในการประเมินคุณภาพ ราคา หรือการรับประกันใดๆ เกี่ยวกับอัญมณีที่ผ่านการตรวจนั้นๆ</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. เจ้าหน้าที่/ผู้ปฏิบัติงานของห้องปฏิบัติการไม่ต้องรับผิดชอบต่อความเสียหาย ทำลาย หรือสูญหาย ของตัวอย่างอัญมณีระหว่างการตรวจสอบ หรือความเสียหายไม่ว่ากรณีใดๆ ที่อาจเกิดขึ้นจากผลของข้อผิดพลาดในรายงาน หรือการละเว้นการระบุถึงผลการตรวจสอบใดๆ ในรายงาน หรือผลกระทบใดๆ ที่เกิดขึ้นจากการใช้รายงานผลการตรวจสอบที่ห้องปฏิบัติการอัญมณี มหาวิทยาลัยบูรพา เป็นผู้ออกให้ แม้ว่าจะได้รับแจ้งให้ทราบล่วงหน้าถึงผลเสียหายที่อาจเกิดขึ้นจากการออกรายงานนั้นๆ นอกจากจะสามารถพิสูจน์ได้โดยปราศจากข้อสงสัยว่ามีเจตนาฉ้อฉล หลอกลวง หรือมีพฤติกรรมทุจริตคิดมิชอบของห้องปฏิบัติการอัญมณี มหาวิทยาลัยบูรพา</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. เงื่อนไขต่างๆ เหล่านี้ใช้กับผู้ใช้บริการจากห้องปฏิบัติการที่ได้รับรายงานการตรวจสอบทุกคน และใช้กับบุคคลใดๆ ก็ตามที่ได้เห็นหรือรับโอนรายงานดังกล่าว</p>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ในการทำธุรกรรมใดๆ เกี่ยวกับอัญมณี/รัตนชาติ แม้ว่าจะมีรายงานการตรวจสอบหรือหนังสือรับรองใดๆ ประกอบ ไม่ว่าจะออกให้โดยห้องปฏิบัติการอัญมณี มหาวิทยาลัยบูรพา หรือห้องปฏิบัติการตรวจสอบใดๆ ก็ตาม ผู้ซื้อควร/จำเป็นต้องนำอัญมณี/รัตนชาตินั้นๆ มาทำการตรวจสอบใหม่ เพื่อป้องกันการสวมรอยกับรายงานฉบับจริงกับอัญมณี/รัตนชาติอื่นที่คล้ายคลึงกัน หรือมีลักษณะเหมือนกัน</p>
								<br />
							</div>

							<div class="clearboth"></div>
						</div>
					</div>
					<div class="clearboth"></div>
				</div>
			</div>
		</div>
		<!-- CONTENT END -->

		<!-- FOOTER BEGIN -->
		<footer class="alternative">
			<div id="footer">
				<section class="section_top">
					<div class="inner">
						<div class="clearboth"></div>
					</div>
				</section>

				<section class="section_bottom">
					<div class="inner">
						<div class="block_copyrights">
							<p>Copyright &copy; 2018 Burapha Gemological Laboratory, Burapha University,Chanthaburi Campus. All rights reserved.</p>
						</div>
					</div>
					<div class="clearboth"></div>
				</section>
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>

</body>

</html>