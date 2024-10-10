<?php

	include "../../isep/connections/config.inc.new.php";
	include "../../isep/class.php";

?>

<!DOCTYPE html>
<html>

<head>
<title>International Student Exchange Project : ISEP </title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
<script type="text/javascript" src="layout/plugins/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="../../isep/layout/style.css" type="text/css">
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../../isep/layout/js/jquery.js"></script>

<!-- PrettyPhoto start -->
<link rel="stylesheet" href="../../isep/layout/plugins/prettyphoto/css/prettyPhoto.css" type="text/css">
<script type="text/javascript" src="../../isep/layout/plugins/prettyphoto/jquery.prettyPhoto.js"></script>
<!-- PrettyPhoto end -->

<!-- jQuery tools start -->
<script type="text/javascript" src="../../isep/layout/plugins/tools/jquery.tools.min.js"></script>
<!-- jQuery tools end -->

<!-- ScrollTo start -->
<script type="text/javascript" src="../../isep/layout/plugins/scrollto/jquery.scroll.to.min.js"></script>
<!-- ScrollTo end -->

<!-- FlexSlider start -->
<link rel="stylesheet" href="../../isep/layout/plugins/flexslider/flexslider.css" type="text/css"/>
<script type="text/javascript" src="../../isep/layout/plugins/flexslider/jquery.flexslider-min.js"></script>
<!-- FlexSlider end -->

<!-- jQuery Form Plugin start -->
<script type="text/javascript" src="../../isep/layout/plugins/ajaxform/jquery.form.js"></script>
<!-- jQuery Form Plugin end -->

<!-- Twitter Plugin start -->
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script type="text/javascript" src="../../isep/layout/plugins/tweet/tweet.widget.js"></script>
<!-- Twitter Plugin end -->

<!-- jQuery Sort Plugin start -->
<script type="text/javascript" src="../../isep/layout/plugins/sort/jquery.sort.min.js"></script>
<!-- jQuery Sort Plugin end -->

<!-- Roundabout Plugin start -->
<script type="text/javascript" src="../../isep/layout/plugins/roundabout/jquery.roundabout.min.js"></script>
<!-- Roundabout Plugin end -->

<!-- Nivo Slider Plugin start -->
<link rel="stylesheet" href="../../isep/layout/plugins/nivo/nivo-slider.css" type="text/css">
<script type="text/javascript" src="../../isep/layout/plugins/nivo/jquery.nivo.slider.pack.js"></script>
<!-- Nivo Slider Plugin end -->

<!-- OneByOne start -->
<link rel="stylesheet" href="../../isep/layout/plugins/onebyone/css/jquery.onebyone.css" type="text/css"/>
<link rel="stylesheet" href="../../isep/layout/plugins/onebyone/css/animate.css" type="text/css"/>
<script type="text/javascript" src="../../isep/layout/plugins/onebyone/jquery.onebyone.min.js"></script>
<!-- OneByOne end -->

<script type="text/javascript" src="../../isep/layout/js/main.js"></script>

</head>

<body class="theme_layout_boxed theme_layout_bg_type_10 theme_light theme_color_yellow theme_footer_normal">
	<div class="wrapper sticky_footer">
		<!-- HEADER BEGIN -->
		<header>
			<div id="header">
				<section class="section_top">
					<div class="inner">
						<div id="logo"><a href="../../isep/index.php"><img src="../../isep/images/logo.png" width="378" title="คณะวิทยาศาสตร์และศิลปศาสตร์"></a></div>
						
						<nav class="main_menu">
							<ul>
								<li class="current_page_item"><a href="../../isep/index.php">หน้าแรก<span class="subtext">start here</span></a>	</li>
								<li><a href="#">เกี่ยวกับโครงการ<span class="subtext">about us</span></a>
							  <ul>
										<li><a href="../../isep/about.php">ISEP</a>
											<ul>
												<li><a href="../../isep/about_clep.php">CLEP</a>
                                                <ul>
                                               	  <li><a href="../../isep/about_out_clep.php">Outbound</a></li>
                                                  <li><a href="../../isep/about_in_clep.php">Inbound</a></li>
                                                </ul>
                                          </li>
												<li><a href="../../isep/about_aep.php">AEP</a>
                                                <ul>
                                               	  <li><a href="#">Outbound</a></li>
                                                  <li><a href="#">Inbound</a></li>
                                                </ul>
                                                </li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="../../isep/contact.php">ติดต่อเรา<span class="subtext">Contact us</span></a></li>
							</ul>
						</nav>
						
						<div class="clearboth"></div>
					</div>
				</section>
				
				<section class="section_slider_5">
			      <div class="slider_line_1"></div>
                    <div id="slider" class="nivoSlider">
                      <div class="inner">
                            <img src="../../isep/images/banner_logo.jpg">
                     </div>    
                    </div>       
                 
			   <script type="text/javascript">
						$(function() {
							$('#slider').nivoSlider({
								controlNavThumbs : true,
								afterLoad : function() {
									var width = 100 / $('.section_slider_5 .nivo-controlNav a').length;
									$('.section_slider_5 .nivo-controlNav a').css('width', width + '%');
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
						<div class="block_slogan_1">
							<p class="text_1">โครงการนิสิตแลกเปลี่ยนนานาชาติ( International Student Exchange Project : ISEP )</p>
						</div>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการนิสิตแลกเปลี่ยนนานาชาติ (International Student Exchange Project : ISEP) ของคณะวิทยาศาสตร์และศิลปศาสตร์เป็นการส่งนิสิตของคณะฯ ไปแลกเปลี่ยนที่มหาวิทยาลัยในต่างประเทศ รวมทั้งการรับนักศึกษาจากมหาวิทยาลัยในต่างประเทศมาแลกเปลี่ยนที่คณะฯ การดำเนินการโครงการนิสิตแลกเปลี่ยนนานาชาติมี 2 รูปแบบ คือการแลกเปลี่ยนภาษาและวัฒนธรรมและการแลกเปลี่ยนด้านวิชาการ</p>	
                            <div class="line_2" style="margin:0px 0px 37px;"></div>
						
                        <div class="block_portfolio_1 c_2">
							<div class="item">
								<div class="image">
									<img src="../../isep/images/clep_1.jpg" alt="">
							  </div>
								
							  <div class="description">
									<h6>1.โครงการแลกเปลี่ยนนิสิตด้านภาษาและวัฒนธรรม</h6>
									<p class="tags">Cultural and Language Exchange Program: CLEP</p>
								</div>
									<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการแลกเปลี่ยนนิสิตด้านภาษาและวัฒนธรรมเป็นโครงการภายใต้ ความร่วมมือระหว่างมหาวิทยาลัยบูรพาและมหาวิทยาลัยในต่างประเทศ <br>
									มีวัตถุประสงค์เพื่อพัฒนาทักษะด้านภาษาต่างประเทศ มีความรู้และความเข้าใจความหลากหลายของวัฒนธรรมประเทศต่างๆ ส่งเสริมความสัมพันธ์และเสริมสร้างเครือข่ายนานาชาติ ในระดับนิสิตและระดับมหาวิทยาลัย เป็นการเริ่มต้นของการนำไปสู่ความร่วมมือในด้านอื่น   โครงการแลกเปลี่ยนนิสิตด้านภาษาและวัฒนธรรม แบ่งออกเป็น 2 รูปแบบ</p>		
								  <a href="../../isep/about_clep.php" class="general_button fr">Read More</a>
                                    <div class="clearboth"></div><br>
                                    
									<div class="line_2"></div>
								
								<div class="clearboth"></div>
							</div>
							
							<div class="item">
								<div class="image">
									<img src="../../isep/images/aep_2.jpg" alt="">
						    </div>
								
								<div class="description">
									<h6>2.โครงการการแลกเปลี่ยนนิสิตด้านวิชาการ</h6>
									<p class="tags">Academic Exchange Program: AEP</p>
								</div>
									<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โครงการการแลกเปลี่ยนนิสิตด้านวิชาการ เป็นการส่งนิสิตไปเรียน <br>
                                    ในมหาวิทยาลัยต่างประเทศ รวมทั้งการรับนิสิตจากมหาวิทยาลัยต่างประเทศ <br>
                                    มาเรียนในรายวิชาที่เปิด ในแต่ละปีการศึกษา โดยมีการละทะเบียนเรียนและเก็บหน่วยกิต 
                                    ตามหลักสูตรการศึกษาของนิสิต  โดยมีระยะเวลาในการแลกเปลี่ยนอย่างน้อย
                                     1 ภาคการศึกษา  โครงการแลกเปลี่ยนนิสิตด้านวิชาการมี 2 รูปแบบ</p>
								  <a href="../../isep/about_aep.php" class="general_button fr">Read More</a>
                                    <div class="clearboth"></div><br>
								<div class="line_2"></div>
								
								<div class="clearboth"></div>
							</div>
						</div>
						<div class="clearboth"></div>
                             
                             <div class="block_latest_from_blog_2">
							<h4>กิจกรรม</h4>
							<div class="news">
							  <?php
								
								$datetime_today = date('Y-m-d H:i:s');
								$sql = "select * from news_tbl where  `news_title` LIKE '%ISEP%' and news_status = '1' and category_id = '1' and  news_datetime_start <= '$datetime_today' and news_datetime_end >= '$datetime_today' order by  `news_tbl`.`news_datetime_start` DESC LIMIT 0,4";
								$result = mysqli_query($link,$sql)or die("Invalid query: " . mysqli_connect_error());
								
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
							
                                 
							<div class="clearboth"></div><br>
                         <a href="../../isep/news.php" target="_blank" class="general_button fr">อ่านข่าวทั้งหมด</a>
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
						<div class="block_bottom_menu"> </div>
						
						<div class="block_copyrights">
					    <p>Copyright &copy; 2019 Faculty of Science and Arts, Burapha University,Chanthaburi Campus. All rights reserved.</p></div>
						
						<div class="clearboth"></div>
					</div>
				</section>
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>
</body>

</html>