<?php

	include "connections/config.inc.new.php";
	include "class.php";

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
<link rel="stylesheet" href="layout/plugins/flexslider/flexslider.css" type="text/css"/>
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
<link rel="stylesheet" href="layout/plugins/onebyone/css/jquery.onebyone.css" type="text/css"/>
<link rel="stylesheet" href="layout/plugins/onebyone/css/animate.css" type="text/css"/>
<script type="text/javascript" src="layout/plugins/onebyone/jquery.onebyone.min.js"></script>
<!-- OneByOne end -->

<script type="text/javascript" src="layout/js/main.js"></script>
<style>
.news .one_third:nth-child(3n-0) {


	margin-right: 0px !important;
	clear: right;
}
</style>
	
</head>

<body class="theme_layout_boxed theme_light theme_footer_normal theme_layout_bg_type_10 theme_color_purple">
	<div class="wrapper sticky_footer">
		<!-- HEADER BEGIN -->
		<header>
			<div id="header">
				<section class="section_top">
					<div class="inner">
						<div id="logo"><a href="index.php"><img src="images/logo.png" alt="คณะอัญมณี" title="Burapha Gemological Laboratory; BGL"></a></div>
						
						<nav class="main_menu">
							<ul>
								<li class="current_page_item"><a href="index.php">หน้าแรก<span class="subtext">start here</span></a></li>
								<li><a href="#">เกี่ยวกับเรา<span class="subtext">About us</span></a>
<ul>
										<li><a href="about.php">ความเป็นมา</a></li>
										<li><a href="staff.php">บุคลากร</a></li>
								  </ul>
							  </li>
                                
		          <li><a href="certificate_ck.php" target="_blank" class="loginBtn">ตรวจสอบใบรับรอง<span class="subtext">Verify A Report</span></a></li>
								<li ><a href="#">การให้บริการ<span class="subtext">Service</span></a>
                                      <ul>
                                        <li><a href="#" target="_blank">เครื่องมือวิเคราะห์</a>
                                          <ul>
                                            <li><a href="tool_standart.php">เครื่องมือวิเคราะห์ขั้นพื้นฐาน</a></li>
                                            <li><a href="tool_advanced.php">เครื่องมือวิเคราะห์ขั้นสูง</a></li>
                                          </ul> 
                                      	</li>
                                        <li><a href="report.php">การรายงานผล</a></li>
                                        <li><a href="comment.php">ข้อเสนอแนะในใบรับรอง</a></li>
                                        <li><a href="#">ความรู้ทั่วไป</a></li>
                                        <li><a href="#">ข่าวจากห้องปฏิบัติการ</a></li>
                                  </ul>
                              </li>
                      		
                  <li><a href="gallery.php">แกลอรี่<span class="subtext">BGL Gallery</span></a></li>
								<li><a href="contact.php">ติดต่อเรา<span class="subtext">contact us</span></a></li>
							</ul>
						</nav>
						
						<div class="clearboth"></div>
					</div>
				</section>
				
				<section class="section_slider_2">
					<div class="slider_line_1"></div>
					<div class="inner">
                    <div id="slider" class="nivoSlider">
                            <img src="images/slider/010.jpg">
							<img src="images/slider/011.jpg">
							<img src="images/slider/012.jpg">
							<img src="images/slider/013.jpg">
                      </div>
				  </div>
		      <div class="slider_line_2"></div>
					    
					<div id="caption_2" class="nivo-html-caption">
		        <h6></h6>
						<p></p>
					</div>    
					
					<script type="text/javascript">
						$(function() {
							$('#slider').nivoSlider({
								afterLoad : function() {
									var width = 100 / $('.section_slider_2 .nivo-controlNav a').length;
									$('.section_slider_2 .nivo-controlNav a').css('width', width + '%');
									$('.section_slider_2 .nivo-directionNav a').attr('href', 'javascript:void(0)');
								}
							});
						});
					</script>
				</section>
			</div>
		</header>
		<!-- HEADER END -->
		
		<!-- CONTENT BEGIN -->
		<div id="content" class="">
			<div class="inner">
				<div class="general_content">
					<div class="main_content">
						<div class="line_2" style="margin:0px 0px 37px;"></div>
					
						<div class="separator" style="height:35px;"></div>
						
<div class="block_latest_from_blog_2">
							<h4>ข่าว-ประชาสัมพันธ์</h4>
                            <div class="news">
							  <?php
								
								$datetime_today = date('Y-m-d H:i:s');
								$sql = "select * from news_tbl where  `department_list` LIKE '%3%' and `news_title` LIKE '%IIJMAT%' and news_status = '1' and news_sticky = '0' and category_id != '1'and news_datetime_start <= '$datetime_today' and news_datetime_end >= '$datetime_today' order by `news_tbl`.`news_datetime_start` DESC LIMIT 0,8";
								$result = mysqli_query($sql)or die("Invalid query: " . mysqli_connect_error());
								
								while($row = mysqli_fetch_array($result)){
									
									$news_id = $row['news_id'];
									$news_title = $row['news_title'];
									$news_img_thumbnail_path = $row['news_img_thumbnail_path'];
									if($news_image_path != ""){

										$news_img_thumbnail_path = ('<a href="#" target="_blank"><img src="images/present1.jpg" width="430" height="266" alt=""></a>');

									}
									$news_overview = $row['news_overview'];
									$news_datetime_start = $row['news_datetime_start'];
									
									if ($news_datetime_start != ""){
									
										list($y, $m, $d ) = explode("-", $news_datetime_start);
										$date = $d."/".$m."/".$y;
										$time = $news_datetime_start;
										$d7 = $d+7;
										$date_week = $d7."/".$m."/".$y;

									}
									
									
									echo('
										<div class="post">
											<div class="f_image"><a href="http://www.chanthaburi.buu.ac.th/~newsbuu/?select=news&m=detail&id='.$news_id.'" target="_blank"><img src="http://www.chanthaburi.buu.ac.th/~newsbuu/media/news/thumbnail/'.$news_img_thumbnail_path.'" alt=""></div>
											<h6>'.$news_title.'</a></h6>
											<div class="line_2"></div>
										</div>
									');
									
								}
								
							?>
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
		<footer>
			<div id="footer">
				<section class="section_top">
					<div class="inner">
						<div class="block_to_top">
							<a href="#">BACK TO TOP</a>
                        </div>
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