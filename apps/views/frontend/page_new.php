 <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="5000">
	<meta name="viewport" content="width=device-width">
	<title><?php echo (isset($dataPage["site_title"]) ? $dataPage["site_title"] : '') . (isset($title) && $title != '' ? ' | ' . $title : ''); ?></title>
	<style type="text/css">
	img.wp-smiley, img.emoji { display: inline !important; border: none !important; box-shadow: none !important; height: 1em !important; width: 1em !important; margin: 0 .07em !important; vertical-align: -0.1em !important; background: none !important; padding: 0 !important; }
	</style>
	<link rel="Shortcut Icon" href="<?php echo base_url('assets/images/logo-2016-s.png'); ?>" type="image/x-icon" />
	<link rel='stylesheet' href="<?php echo base_url('assets/frontend/css/animate.css'); ?>" type='text/css' media='all' />
	<link rel='stylesheet' href="<?php echo base_url('assets/frontend/css/hover.css'); ?>" type='text/css' media='all' />
	<link rel='stylesheet' href="<?php echo base_url('assets/frontend/css/style.css'); ?>" type='text/css' media='all' />
	<!--[if lt IE 9]>
	<link rel='stylesheet' id='enliven_ie-css'  href="<?php echo base_url(); ?>css/ie.css" type='text/css' media='all' />
	<![endif]-->
	<script type='text/javascript' src="<?php echo base_url('assets/frontend/js/jquery.js'); ?>"></script>
	<script type='text/javascript' src="<?php echo base_url('assets/frontend/js/jquery-migrate.min.js'); ?>"></script>
	<meta name="generator" content="QZA" />
</head>
<body class="home page page-id-701 page-parent page-template page-template-template-page-builder page-template-template-page-builder-php" url="<?php echo base_url(); ?>">
	<div class="ssm-overlay ssm-toggle-nav"></div>
	<aside class="e_side_nav e_left e_style_01">
		<figure class="e_side_logo e_style_01" style="background-color: #fff"><center><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-2016-s.png" class="img-responsive"></a></center></figure>
		<nav id="e_side_nav" class="e_style_01" itemscope="itemscope">
			<?php echo isset($dataPage['menuSide']) ? $dataPage['menuSide'] : ''; ?>
		</nav>
	</aside>
	
	<div class="e_popup e_style_01" role="alert" id="searchbox">
		<div class="e_popup_container e_style_01">
			<form action="<?php echo base_url(); ?>browse/search/key/all" method="get" class="e_search_form e_style_01 clearfix" onsubmit="location.href=('<?php echo base_url(); ?>browse/search/key/all/' + jQuery('#tsearch').val()); return false;"><label>Masukkan Kata Kunci &amp; Tekan ENTER &nbsp;</label><input value="" name="search" id="tsearch" type="text" class="e_search_text"></form>
			<span class="e_icon e_popup_close"><i class="ti-close"></i></span>
		</div>
	</div>
	
	<div class="e_site_container clearfix">
		<header id="e_site_header" class="e_style_03">
			<div class="e_top">
			<!--style="background:#1977a5; position: fixed; z-index:99999"-->
				<div class="e_container clearfix container">
					<div class="e_inner clearfix">
						<nav id="e_primary_nav" class="e_style_02">
						<a class="ssm-toggle-nav" href="#" title="Buka/Tutup Menu"><i class="e_icon ti-align-justify"></i></a>
						<?php echo isset($dataPage['menu']) ? $dataPage['menu'] : ''; ?>
						</nav>
						<nav class="e_socials_list e_style_01 clearfix">
							<ul>
								<li class="e_item e_first"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="javascript:alert('Untuk tampilan terbaik, gunakan resolusi layar minimal 1280x720 pixel')" title="Best View 1280x720"><i class="e_icon fa fa-desktop"></i></a></li>
								<?php if (isset($dataPage["twitter_top"]) && $dataPage["twitter_top"] != ""): ?>
								<li class="e_item e_other"><a class="e_link" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="<?php echo $dataPage["twitter_top"]; ?>" title="Twitter"><i class="e_icon fa fa-twitter"></i></a></li>
								<?php endif; ?>
								<?php if (isset($dataPage["phone_top"]) && $dataPage["phone_top"] != ""): ?>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="javascript:void(0)" title="<?php echo $dataPage["phone_top"]; ?>"><i class="e_icon fa fa-phone"></i></a></li>
								<?php endif; ?>
							</ul>
						</nav>
						<!-- <span class="e_search_handle e_style_01"><i class="e_icon ti-search"></i></span> -->
					</div>
				</div>
			</div>
			
			
			<?php if (isset($dataPage["banner"]) && $dataPage["banner"] != "" && file_exists(APPCONTENT . "banner/" . $dataPage["banner"])): ?>
			<div class="e_middle hide_mobile"><div class="e_container clearfix container"><div class="clearfix">
				<div class="e_right"><a class="e_top_banner e_style_01" href="<?php echo base_url();?>"><figure><center><img src="<?php echo base_url(APPCONTENT . 'banner/' . $dataPage["banner"]); ?>" style="height: 110px;"></center></figure></a></div>
			</div></div></div>
			<?php endif; ?>
			<div class="e_bottom" style="">
				<div class="e_container clearfix container">
					<div class="e_inner clearfix">
						<aside class="e_ticker e_ticker_multi e_style_01">
							<div class="e_header"><h4><?php echo intval(date("d")) . " " . NamaBulan(intval(date("m"))) . " " . date("Y"); ?></h4></div>
							<?php if (count($newsticker) > 0): ?>
							<ul>
								<?php foreach($newsticker as $n): ?>
								<li class="e_item">
									<article class="entry-item"><?php echo $n->tag != null && $n->tag != '' ? '<time class="e_date">'. $n->tag .'</time>' : ''; ?><h5 class="entry-title"><?php echo htmlspecialchars_decode($n->content); ?></h5></article>
								</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						</aside>
						<nav class="e_socials_list e_style_01 clearfix">
							<ul>
								<?php if (isset($dataPage["twitter_top"]) && $dataPage["twitter_top"] != ""): ?>
								<li class="e_item e_other"><a class="e_link e_social_link_twitter" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo $dataPage["twitter_top"]; ?>" title="Twitter"><i class="e_icon fa fa-twitter"></i></a></li>
								<?php endif; ?>
								<?php if (isset($dataPage["facebook_top"]) && $dataPage["facebook_top"] != ""): ?>
								<li class="e_item e_other"><a class="e_link e_social_link_facebook" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo $dataPage["facebook_top"]; ?>" title="Facebook"><i class="e_icon fa fa-facebook"></i></a></li>
								<?php endif; ?>
								<?php if (isset($dataPage["instagram_top"]) && $dataPage["instagram_top"] != ""): ?><li class="e_item e_other"><a class="e_link e_social_link_instagram" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo $dataPage["instagram_top"]; ?>" title="Instagram"><i class="e_icon fa fa-instagram"></i></a></li>
								<?php endif; ?>
								<?php if (isset($dataPage["youtube_top"]) && $dataPage["youtube_top"] != ""): ?><li class="e_item e_other"><a class="e_link e_social_link_youtube" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo $dataPage["youtube_top"]; ?>" title="Youtube"><i class="e_icon fa fa-youtube"></i></a></li>
								<?php endif; ?>
								<?php if (isset($dataPage["phone_top"]) && $dataPage["twitter_top"] != ""): ?><li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="javascript:void(0)" title="<?php echo $dataPage["phone_top"]; ?>"><i class="e_icon fa fa-phone"></i></a></li>
								<?php endif; ?>	
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>sitemap" title="Peta Situs"><i class="e_icon fa fa-sitemap"></i></a></li>
								<!-- <li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>home/en" title="English">ENG</a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="http://www.pom.go.id/mobile" title="Versi Mobile"><i class="e_icon fa fa-mobile"></i></a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>view/direct/faq" title="FAQ">FAQ</a></li> -->
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		
				<div id="e_site_body" class="clearfix">

			<?php if ($isHomepage): 
				if (count($slides) > 0):
			?>

			<section class="e_section  e_relative">
				<div id="aegis_row_23bcuuk69up-parallax" class="e_parallax clearfix " style="background-image: url('<?php echo base_url('content/slides/' . $slides[0]->main_pict); ?>');">
					<div class="e_parallax_inner clearfix">
						<div class="e_overlay"></div>
						<div id="aegis_row_23bcuuk69up-inner" class="e_container clearfix container ">
							<div id="aegis_col_li30om8wgbn" class="e_col_fullwidth">
								<div class="e_col">
									<div id="aegis_widget_l1yx8pbj8u" class="widget aegis_widget e_widget_posts_slider  e_widget_first ">
										<div class="widget-content clearfix ">
											<div class="e_slider_pro slider-pro">
												<div class="sp-slides">

												<?php foreach($slides as $s): ?>

													
												<div class="sp-slide" url="<?php echo base_url('content/slides/' . $s->main_pict); ?>">
													<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;"><?php echo htmlspecialchars_decode($s->caption); ?></h3>
												</div>

												<?php endforeach; ?>
		
												</div>											
											</div>
											<script>
												jQuery('.e_slider_pro').on('gotoSlide', function(event){
													obj = jQuery('.e_slider_pro .sp-slide:eq(' + event.index + ')')
													if(obj.attr('url')){
														jQuery('#aegis_row_23bcuuk69up-parallax').css('background-image', 'url(' + obj.attr('url') + ')');
													}
												})
											</script>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; endif;?>
					
			<section class="e_section ec_border_top_primary">
				<div class="e_container clearfix container">
					<div id="e_sub_page" class="row e_row e_style_01">
						<div class="col-xs-12 e_col_main col-lg-9 col-md-8 col-sm-12 col-xs-12">
							<section id="e_post_wrap">
								
								<?php echo $this->load->view($page); ?>
								
								<aside class="e_aside e_padding">
									<div class="widget e_widget_share_buttons e_style_01">
										<div class="widget-content clearfix">
											<a href="http://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" target="_blank" rel="nofollow" class="e_link e_icon e_facebook"><i class="e_icon fa fa-facebook"></i></a>
											<a href="https://twitter.com/share?url=<?php echo current_url(); ?>" target="_blank" rel="nofollow"  class="e_link e_icon e_twitter"><i class="e_icon fa fa-twitter"></i></a>
											<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" rel="nofollow"  class="e_link e_icon e_pinterest"><i class="e_icon fa fa-pinterest"></i></a>
											<a href="https://plus.google.com/share?url=<?php echo current_url(); ?>" target="_blank" rel="nofollow"  class="e_link e_icon e_google-plus"><i class="e_icon fa fa-google-plus"></i></a>
										</div>
									</div>
								</aside>
							</section>
						</div>
						<div class="e_col_sub col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<div id="e_sidebar_right" class="clearfix e_sidebar" role="complementary">
<!-- <div class="widget aegis_widget e_widget_posts_highlight_first_2nd  e_widget">
	<header class="e_widget_title e_style_04"><h3 class="e_title"><a href="../../../browse/more/klarifikasi" class="red_me">Klarifikasi BPOM</a></h3></header>
	<div class="widget-content clearfix">
		<div class="e_microdata">
			<div class="row">
			<div class="col-xs-12 e_right" id="urklarifikasi5depan">Loading..
				<script>
					jQuery(document).ready(function($){
						setTimeout(function(){
							$.get('http://www.pom.go.id/new/front/klarifikasi5depan', function(klarifikasi5depan){
								if(klarifikasi5depan!=''){
									$('#urklarifikasi5depan').html(klarifikasi5depan);
									setInterval("rollklar()", 5000);
								}
							});
						}, 1500);
					});
					function rollklar(){
						var klarshow = jQuery('article.klarshow:visible');
						klarshow = klarshow.first();
						var showfirst = parseInt(klarshow.attr('klar'));
						showfirst = showfirst + 5;
						var hidefirst = jQuery("article.klarshow[name^='x"+showfirst+"done']");
						klarshow.slideUp("slow");
						hidefirst.slideDown("slow");
					}
				</script>
			</div></div>
		</div>
	</div>
</div> -->
<div class="widget aegis_widget widget_categories  e_widget" >
	<header class="e_widget_title e_style_04"><h3 class="e_title">Aplikasi Publik</h3></header>
	<div class="widget-content clearfix">
	<ul>
		<li class="cat-item"><a href="http://www.pom.go.id/" target="_blank">Website POM <small>- <i class="blue_me">www.pom.go.id</i></small></a></li>
		<li class="cat-item"><a href="http://www.pom.go.id/webreg/" target="_blank">Web Registrasi <small>- <i class="blue_me">www.pom.go.id/webreg</i></small></a></li>
		<li class="cat-item"><a href="http://e-bpom.pom.go.id/" target="_blank">e-BPOM <small>- <i class="blue_me">e-bpom.pom.go.id</i></small></a></li>
		<li class="cat-item"><a href="http://e-reg.pom.go.id/" target="_blank">e-Reg Pangan Olahan <small>- <i class="blue_me">e-reg.pom.go.id</i></small></a></li>
		<li class="cat-item"><a href="http://asrot.pom.go.id/" target="_blank">e-Reg OTSM <small>- <i class="blue_me">asrot.pom.go.id</i></small></a></li>
		<li class="cat-item"><a href="http://aero.pom.go.id/" target="_blank">e-Reg Obat <small>- <i class="blue_me">aero.pom.go.id</i></small></a></li>
		<li class="cat-item"><a href="http://notifkos.pom.go.id/" target="_blank">Notifikasi Kosmetika <small>- <i class="blue_me">notifkos.pom.go.id</i></small></a></li>
	</ul>
	</div>
</div></div>
						</div>
					</div>
				</div>
			</section>
		</div>		
		<div id="e_site_footer" class="e_style_01">
			<div class="e_top" style="padding: 20px 20px 0 20px;">
				<div class="e_container clearfix container">
					<div class="row">
						<div id="e_sidebar_footer_01" role="complementary" class="e_sidebar clearfix col-xs-12 col-lg-6 col-md-6 col-sm-12">
							<div class="widget e_custom_widget_01 e_widget_contact_information enliven-widget-order-0 enliven-widget-first enliven-widget-last" style="margin-bottom: 0">
								<a href="<?php echo base_url(); ?>view/direct/balai"><header class="e_widget_title e_style_05"><h3 class="e_title">Kontak Kami</h3></header></a>
								<div class="widget-content clearfix">
									<ul class="e_list e_style_01" style="margin: -10px 0;">
										<?php if (isset($dataPage["address"]) && $dataPage["address"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-map-marker"></i><?php echo (isset($dataPage["address"]) ? $dataPage["address"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["phone"]) && $dataPage["phone"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-phone"></i><?php echo (isset($dataPage["phone"]) ? $dataPage["phone"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["fax"]) && $dataPage["fax"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-fax"></i><?php echo (isset($dataPage["fax"]) ? $dataPage["fax"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["mobile"]) && $dataPage["mobile"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-mobile"></i><?php echo (isset($dataPage["mobile"]) ? $dataPage["mobile"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["email"]) && $dataPage["email"] != ""): ?>
										<li style="margin-bottom: 0px"><i class="e_icon fa fa-envelope"></i><?php echo (isset($dataPage["email"]) ? $dataPage["email"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["twitter"]) && $dataPage["twitter"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-twitter"></i><?php echo (isset($dataPage["twitter"]) ? $dataPage["twitter"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["facebook"]) && $dataPage["facebook"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-facebook"></i><?php echo (isset($dataPage["facebook"]) ? $dataPage["facebook"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["instagram"]) && $dataPage["instagram"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-instagram"></i><?php echo (isset($dataPage["instagram"]) ? $dataPage["instagram"] : ''); ?></li>
										<?php endif; ?>
										<?php if (isset($dataPage["youtube"]) && $dataPage["youtube"] != ""): ?>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-youtube"></i><?php echo (isset($dataPage["youtube"]) ? $dataPage["youtube"] : ''); ?></li>
										<?php endif; ?><br/>
									</ul>
								</div>
							</div>
						</div>
						<div id="e_sidebar_footer_02" role="complementary" class="e_sidebar clearfix col-xs-12 col-lg-6 col-md-6 col-sm-12">
							<div class="widget e_custom_widget_01 e_widget_tweets_list enliven-widget-order-0 enliven-widget-first enliven-widget-last">
								<header class="e_widget_title e_style_05"><h3 class="e_title">Statistik Pengunjung</h3></header>
								<div class="widget-content clearfix">
									<div class="e_block e_first" style="margin-top: -10px;"><i class="e_icon fa fa-user"></i><p class="e_content"><?php echo $dataPage["visitorOnline"]; ?> User</p><p class="e_meta"><a href="javascript:void(0)">Sedang Online Saat Ini</a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content"><?php echo $dataPage["visitorToday"]; ?> User</p><p class="e_meta"><a href="javascript:void(0)">Pengunjung Hari Ini</a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content"> <?php echo $dataPage["visitorYear"]; ?> User</p><p class="e_meta"><a href="javascript:void(0)">Total Pengunjung Tahun <?php echo date("Y");?></a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content"><?php echo $dataPage["visitorTotal"]; ?> User</p><p class="e_meta"><a href="javascript:void(0)">Total Pengunjung</a></p></div>
									<!-- <a href="javascript:void(0)"><img src="http://s01.flagcounter.com/count/x49Q/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_15/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" border="0"></a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="e_bottom" style="padding: 7px; background: #1977a5">
				<div class="e_container clearfix container">
					<div class="row">
						<div class="col-md-6 e_left" style="color: white"><?php echo $dataPage["footer"]; ?></div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<a href="#e_site_container" class="e_back_to_top"><i class="ti-angle-up"></i></a>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/hoverIntent.min.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/comment-reply.min.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.touchswipe.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.slideandswipe.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/slider.pro.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/modernizr.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/fotorama.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/fitvids.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/navgoco.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/superfish.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/wow.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.matchheight.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/linkify.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.pin-box.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.caroufredsel.js"></script>
	<script type='text/javascript'>
	var enliven_config = {"bg_single":[],"bg_slideshow":[],"ajax":{"url":"","post_id":0,"security":{"reviews":"3e8db12e6e"}},"is_use_sticky_right_sidebar":"1","translate":{"are_you_sure":"Are you sure?"}};
	</script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/enliven.init.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/html5shiv.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/respond.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/css3-mediaqueries.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.form.min.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/jquery.amaran.js"></script>
	<script type='text/javascript'>
	var enliven_plus_config = {"data":{"post_id":701},"translate":{"form":{"checking":"Checking","send":"Send message","sending":"Sending..."},"name":{"required":"Please enter your name","min_length":"At least {0} characters required"},"email":{"required":"Please enter your email","email":"Please enter a valid email"},"url":{"required":"Please enter your url","url":"Please enter a valid url"},"message":{"required":"Please enter your message","min_length":"At least {0} characters required"}}};
	</script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/script.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>assets/frontend/js/wp-embed.min.js"></script>
</body>
</html>