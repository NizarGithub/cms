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
	<title><?php echo $this->config->item('app_title_prefix') . (isset($title) && $title != '' ? ' | ' . $title : ''); ?></title>
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
			<ul id="e_side_menu" class="clearfix e_style_01">
				<li class="menu-item"><a href="<?php echo base_url(); ?>" itemprop="url">Beranda</a></li>
				<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Profil</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/background" itemprop="url">Latar Belakang</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/job" itemprop="url">Tugas</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/function" itemprop="url">Fungsi</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/role" itemprop="url">Kewenangan</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/culture" itemprop="url">Budaya Organisasi</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/pdsispom" itemprop="url">Prinsip Dasar SISPOM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/kksispom" itemprop="url">Kerangka Konsep SISPOM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/lwsispom" itemprop="url">Lingkup Wilayah SISPOM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/solid" itemprop="url">Organisasi yang Solid</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/structure" itemprop="url">Struktur Organisasi</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/head" itemprop="url">Profil Kepala Badan POM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/secretary" itemprop="url">Profil Sekretaris Utama Badan POM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy1" itemprop="url">Profil Deputi I</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy2" itemprop="url">Profil Deputi II</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy3" itemprop="url">Profil Deputi III</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/strategic" itemprop="url">Kebijakan Strategis</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/target" itemprop="url">Target Kinerja</a></li>
					</ul>
				</li>
				<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Berita</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/pers" itemprop="url">Siaran Pers / Peringatan Publik</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Berita Aktual</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/klarifikasi" itemprop="url">Klarifikasi BPOM</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/internal" itemprop="url">Berita Internal</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/kalender" itemprop="url">Kalender Kegiatan</a></li>
					</ul>
				</li>
				<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Daftar Produk</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="http://cekbpom.pom.go.id" itemprop="url">Cek Produk BPOM</a></li>
						<li class="menu-item"><a href="http://cekbpom.pom.go.id/tarik" itemprop="url">Produk Dibatalkan</a></li>
					</ul>
				</li>
				<li class="menu-item"><a href="http://www.pom.go.id/ppid" target="_blank" itemprop="url">PPID</a></li>
				<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Laporan</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/pers" itemprop="url">SAKIP 2015-2019</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Laporan Tahunan</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Laporan Keuangan</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Laporan Semester - BMN</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Laporan Triwulan - Report to the Nation</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/berita" itemprop="url">Laporan PNBP</a></li>
					</ul>
				</li>
				<li class="menu-item"><a href="http://jdih.pom.go.id" itemprop="url">Peraturan/JDIH</a></li>
				<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/balai" itemprop="url">Balai Besar/Balai POM</a></li>
				<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Pengaduan</a>
					<ul class="sub-menu">
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/cc" itemprop="url">Contact Center</a></li>
						<li class="menu-item"><a href="http://ulpk.pom.go.id/ulpk/home.php?page=kontak&kontak=pengaduan" itemprop="url">Formulir Pengaduan</a></li>
						<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/balai" itemprop="url">Alamat Pusat dan Balai POM</a></li>
					</ul>
				</li>
			</ul>
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
						<ul id="e_primary_menu" class="sf-menu e_mega clearfix">
							<li class="menu-item"><a href="<?php echo base_url(); ?>"><i class="e_icon fa fa-home" style="font-size: 16pt"></i></a></li>
							<li class="menu-item menu-item-type-custom menu-item-has-children e_mega_item"><a href="javascript:void(0);" itemprop="url">Profil</a><div class="sf-mega">
								<section class="e_section  e_relative">
									<div class="e_container clearfix container ">
										<div class="row e_grid_01">
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu e_mega_widget " ><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/background" itemprop="url">Latar Belakang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/job" itemprop="url">Tugas</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/function" itemprop="url">Fungsi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/role" itemprop="url">Kewenangan</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/culture" itemprop="url">Budaya Organisasi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/pdsispom" itemprop="url">Prinsip Dasar SISPOM</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/kksispom" itemprop="url">Kerangka Konsep SISPOM</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/lwsispom" itemprop="url">Lingkup Wilayah SISPOM</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/solid" itemprop="url">Organisasi yang Solid</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu e_mega_widget " ><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/structure" itemprop="url">Struktur Organisasi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/head" itemprop="url">Profil Kepala Badan POM</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/secretary" itemprop="url">Profil Sekretaris Utama Badan POM</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy1" itemprop="url">Profil Deputi I</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy2" itemprop="url">Profil Deputi II</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/deputy3" itemprop="url">Profil Deputi III</a></li>
														<li class="menu-item"><a href="#" itemprop="url">Profil Eselon II</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/strategic" itemprop="url">Kebijakan Strategis</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/target" itemprop="url">Target Kinerja</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="e_col">
													<div class="widget aegis_widget widget_text  e_mega_widget " ><header class="e_widget_title e_style_09 "><h5 class="e_title blue_me">Visi dan Misi</h5></header><div class="widget-content clearfix "><div class="textwidget"><p><b>Visi</b></p><p>Obat dan Makanan Aman Meningkatkan Kesehatan Masyarakat dan Daya Saing Bangsa<br>&nbsp;</p><p><b>Misi</b></p><p><ol id="decimal"><li>Meningkatkan sistem pengawasan Obat dan Makanan berbasis risiko untuk melindungi masyarakat</li><li>Mendorong kemandirian pelaku usaha dalam memberikan jaminan keamanan Obat dan Makanan serta memperkuat kemitraan dengan pemangku kepentingan.</li><li>Meningkatkan kapasitas kelembagaan BPOM.</li></ol></p></div></div></div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div></li>
							<li class="menu-item menu-item-has-children e_mega_item"><a href="javascript:void(0)">Berita</a>
								<div class="sf-mega">
								<section class="e_section  e_relative">
									<div class="clearfix container-fluid ">
										<div class="e_col_fullwidth">
											<div class="e_col">
												<div class="widget aegis_widget e_widget_posts_by_taxonomy e_mega_widget ">
													<div class="widget-content clearfix ">
														<div class="e_vertical_tabs">
															<div class="row">
																<div class="col-md-3 col-sm-12 e_equal e_left">
																	<ul class="e_nav e_nav_tabs e_tabs_left">
																		<li class="clearfix e_first active"><a class="e_link clearfix" href="#persmenu" data-toggle="tab">Siaran Pers / Peringatan Publik</a></li>
																		<li class="clearfix e_other"><a class="e_link clearfix" href="#beritamenu" data-toggle="tab">Berita Aktual</a></li>
																		<li class="clearfix e_other"><a class="e_link clearfix" href="#klarifikasimenu" data-toggle="tab">Klarifikasi BPOM</a></li>
																		<li class="clearfix e_other"><a class="e_link clearfix" href="#edaranmenu" data-toggle="tab">Surat Edaran</a></li>
																		<li class="clearfix e_other"><a class="e_link clearfix" href="#internalmenu" data-toggle="tab">Berita Internal</a></li>
																		<li class="clearfix e_other e_last"><a class="e_link clearfix" href="#kalendermenu" data-toggle="tab">Kalender Kegiatan</a></li>
																	</ul>
																</div>
																<div class="col-md-9 col-sm-12 e_equal e_right">
																	<div class="e_tab_content">
																		<div id="persmenu" class="container-fluid e_tab_pane active" itemscope class="e_microdata">
																			<div class="row e_first"><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><a href="<?php echo base_url(); ?>browse/more/pers" class="e_button e_icon e_primary e_style_02 e_small">Selengkapnya &nbsp;&raquo;</a></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/391/SIARAN-PERS--AKSI-PEDULI-KOSMETIKA-AMAN--DAN-OBAT-TRADISIONAL-BEBAS-BAHAN-KIMIA-OBAT.html">Siaran Pers  Aksi Peduli Kosmetika&#8230;</a></h5><p class="e_meta"><time class="e_date">11 Des 2017 13:15 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/390/SIARAN-PERS---MOBIL-PENYIDIKAN-BADAN-POM-Pendukung-Penegakan-Hukum-di-Bidang-Obat-dan-Makanan.html">Siaran Pers   Mobil Penyidikan Badan&#8230;</a></h5><p class="e_meta"><time class="e_date">27 Nov 2017 13:00 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/389/SIARAN-PERS---GERAKAN-MASYARAKAT-HIDUP-SEHAT-SADAR-PANGAN-AMAN--GERMAS-SAPA--Kerja-Bersama-Menuju-Indonesia-Pangan-Aman.html">Siaran Pers   Gerakan Masyarakat Hidup&#8230;</a></h5><p class="e_meta"><time class="e_date">23 Nov 2017 10:00 WIB</time></p></article></div></div>
																		</div>
																		<div id="beritamenu" class="container-fluid e_tab_pane " class="e_microdata">
																			<div class="row e_first"><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><a href="<?php echo base_url(); ?>browse/more/berita/0" class="e_button e_icon e_primary e_style_02 e_small">Selengkapnya &nbsp;&raquo;</a></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>admin/dat/20171212/Denpasar_Germassapa_061217_01.jpg" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13873/GERMAS-SAPA-BPOM-On-Air-di-Kompas-TV.html">Germas Sapa BPOM On Air&#8230;</a></h5><p class="e_meta"><time class="e_date">12 Des 2017 15:06 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>admin/dat/20171211/PKP_GERMASAPA_1112201704.jpg" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13872/Mari--wujudkan-Budaya-Keamanan-pangan-di-Bangka-Belitung-dengan-Germas-Sapa.html">Mari  Wujudkan Budaya Keamanan Pangan&#8230;</a></h5><p class="e_meta"><time class="e_date">11 Des 2017 16:25 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>admin/dat/20171211/PKP_PEMUSNAHAN_1112201701.JPG" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13871/Balai-POM-di-Pangkalpinang-Musnahkan-Obat-dan-Makanan-Ilegal-.html">Balai POM di Pangkalpinang Musnahkan&#8230;</a></h5><p class="e_meta"><time class="e_date">11 Des 2017 16:12 WIB</time></p></article></div></div>
																		</div>
																		<div id="klarifikasimenu" class="container-fluid e_tab_pane " itemscope class="e_microdata">
																			<div class="row e_first"><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><a href="<?php echo base_url(); ?>browse/more/klarifikasi" class="e_button e_icon e_primary e_style_02 e_small">Selengkapnya &nbsp;&raquo;</a></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/klarifikasi/72/PENJELASAN-BADAN-POM-RI--TERKAIT-ISU-KEAMANAN-VAKSIN-DENGUE--DEMAM-BERDARAH-.html">Penjelasan Badan POM Ri  Terkait&#8230;</a></h5><p class="e_meta"><time class="e_date">12 Des 2017 09:00 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/klarifikasi/71/KLARIFIKASI-BADAN-POM-RI---TERKAIT-PENIPUAN-DALAM-RANGKA-HUT-BADAN-POM-RI-KE-17--YANG-MENGATASNAMAKAN-PEJABAT-BADAN-POM-RI.html">Klarifikasi Badan POM Ri   Terkait&#8230;</a></h5><p class="e_meta"><time class="e_date">7 Des 2017 19:00 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/klarifikasi/70/PENJELASAN-BADAN-POM-RI-TENTANG--PEREDARAN-PRODUK-KANGEN-WATER.html">Penjelasan Badan POM Ri Tentang&#8230;</a></h5><p class="e_meta"><time class="e_date">6 Des 2017 13:00 WIB</time></p></article></div></div>
																		</div>
																		<div id="edaranmenu" class="container-fluid e_tab_pane " itemscope class="e_microdata">
																			<div class="row e_first"><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><a href="<?php echo base_url(); ?>browse/more/berita/1" class="e_button e_icon e_primary e_style_02 e_small">Selengkapnya &nbsp;&raquo;</a></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/12407/Suplemen-Kesehatan-Yang-Mengandung-DHA.html">Suplemen Kesehatan Yang Mengandung Dha</a></h5><p class="e_meta"><time class="e_date">12 Jan 2017 14:18 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/12290/Penyampaian-Laporan-Pemasukan--Penggunaan-dan-Penyaluran-Bahan-Obat-dan-Obat-Obat-Tertentu.html">Penyampaian Laporan Pemasukan, Penggunaan dan&#8230;</a></h5><p class="e_meta"><time class="e_date">7 Des 2016 16:00 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image" style="height:110px"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/12223/Penjelasan-Bahan-Perwarna-Rambut.html">Penjelasan Bahan Perwarna Rambut</a></h5><p class="e_meta"><time class="e_date">28 Nov 2016 13:54 WIB</time></p></article></div></div>
																		</div>
																		<div id="internalmenu" class="container-fluid e_tab_pane " itemscope class="e_microdata">
																			<div class="row e_first" style="padding-left: 10px"><p style="margin-bottom:10px">Masukkan User ID dan Password yang Anda Miliki untuk Dapat Mengakses Halaman ini</p><p><form method="post" id="login-form" class="search-form clearfix" style="padding-bottom: 10px" name="login-form" action="<?php echo base_url(); ?>browse/more/internal"><input autocomplete="off" type="text" value="" name="uid" placeholder="User ID" class="text" style="width:200px" required> &nbsp;<input autocomplete="off" type="password" value="" name="pwd" placeholder="Password" class="text" style="width:200px" required> &nbsp;<input type="submit" style="padding: 5px" value=" MASUK " name="sublogin" id="sublogin"></form><br></p>																			</div>
																		</div>
																		<div id="kalendermenu" class="container-fluid e_tab_pane " itemscope class="e_microdata">
																			<div class="row e_first"><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><a href="<?php echo base_url(); ?>browse/more/kalender" class="e_button e_icon e_primary e_style_02 e_small">Selengkapnya &nbsp;&raquo;</a></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/kalender/26/Jadwal-Tentative-Kegiatan-Perencanaan--Penganggaran-dan-Evaluasi-Tahun-2017.html">Jadwal Tentative Kegiatan Perencanaan, Penganggaran&#8230;</a></h5><p class="e_meta"><time class="e_date">11 Jan 2017 16:00 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/kalender/24/Undangan-Sosialisasi-Program-BMDTP.html">Undangan Sosialisasi Program Bmdtp</a></h5><p class="e_meta"><time class="e_date">15 Sep 2016 16:52 WIB</time></p></article></div><div class="col-md-3 col-sm-6 col-xs-12"><article class="e_item clearfix"><img src="<?php echo base_url(); ?>data/380x235.gif" class="entry-thumb img-responsive clearfix wp-post-image"/><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/kalender/25/Training-on-The-ASEAN-Guidelines-on-Stability-and-Shelf-life-of-Traditional-Medicines-and-Health-Supplements.html">Training On The Asean Guidelines&#8230;</a></h5><p class="e_meta"><time class="e_date">7 Sep 2016 10:49 WIB</time></p></article></div></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
								</div>
							</li>
							<li class="menu-item menu-item-has-children"><a href="javascript:void(0)" itemprop="url">Daftar Produk</a>
								<ul class="sub-menu">
									<li class="menu-item"><a href="http://cekbpom.pom.go.id" target="_blank" itemprop="url">Cek Produk BPOM</a></li>
									<li class="menu-item"><a href="http://cekbpom.pom.go.id/tarik" target="_blank" itemprop="url">Produk Dibatalkan</a></li>
									<!--<li class="menu-item"><a href="http://cekbpom.pom.go.id/tarik/index.php/home/produk/czF0YTJiODk2NTUwMDg2MTQ1ZDBhMGZkMTdhZjYwYmU3YTV3M2I=/warning" target="_blank" itemprop="url">Produk Public Warning</a></li>-->
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children e_mega_item"><a href="#" itemprop="url">Layanan Online</a><div class="sf-mega">
								<section class="e_section  e_relative">
									<div class="e_container clearfix container ">
										<div class="row e_grid_01">
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Layanan Publik</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/pengadaan" itemprop="url">Pengadaan Barang dan Jasa</a></li>
														<li class="menu-item"><a href="http://e-bpom.pom.go.id" target="_blank" itemprop="url">e-BPOM</a></li>
														<li class="menu-item"><a href="http://notifkos.pom.go.id" target="_blank" itemprop="url">e-Notifikasi Kosmetika</a></li>
														<li class="menu-item"><a href="http://aero.pom.go.id" target="_blank" itemprop="url">e-Registration Obat</a></li>
														<li class="menu-item"><a href="http://asrot.pom.go.id" target="_blank" itemprop="url">e-Registration OTSM</a></li>
														<li class="menu-item"><a href="http://e-reg.pom.go.id" target="_blank" itemprop="url">e-Registration Pangan Olahan</a></li>
														<li class="menu-item"><a href="http://e-payment.pom.go.id" target="_blank" itemprop="url">e-Payment</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/antrian_obat" itemprop="url">Jadwal Antrian Konsultasi Obat</a></li>
														<li class="menu-item"><a href="http://siapik.pom.go.id" target="_blank" itemprop="url">e-SIAPIK</a></li>
														<li class="menu-item"><a href="http://sireka.pom.go.id" target="_blank" itemprop="url">SIREKA</a></li>
														<li class="menu-item"><a href="http://e-napza.pom.go.id" target="_blank" itemprop="url">e-NAPZA</a></li>
														<li class="menu-item"><a href="http://e-pengujian.pom.go.id" target="_blank" itemprop="url">e-Pengujian</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Layanan Informasi</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="http://ulpk.pom.go.id" target="_blank" itemprop="url">Unit Layanan Pengaduan Konsumen</a></li>
														<li class="menu-item"><a href="http://rb.pom.go.id" target="_blank" itemprop="url">Reformasi Birokrasi</a></li>
														<li class="menu-item"><a href="http://qms.pom.go.id" target="_blank" itemprop="url">Quality Management System</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/gnwomi" itemprop="url">GN-WOMI</a></li>
														<li class="menu-item"><a href="http://pkpdfi.pom.go.id" target="_blank" itemprop="url">e-Learning Keamanan Pangan PKP DFI</a></li>
														<li class="menu-item"><a href="http://clearinghouse.pom.go.id" target="_blank" itemprop="url">e-Learning Keamanan Pangan Clearing House</a></li>
														<li class="menu-item"><a href="http://e-meso.pom.go.id" target="_blank" itemprop="url">Laporan Efek Samping Obat</a></li>
														<li class="menu-item"><a href="http://mesotsmkos.pom.go.id" target="_blank" itemprop="url">Laporan Efek Samping OTSMKos</a></li>
														<li class="menu-item"><a href="http://www.inrasff.net" target="_blank" itemprop="url">INRASFF</a></li>
														<li class="menu-item"><a href="http://e-rekrutmen.pom.go.id" target="_blank" itemprop="url">e-Rekrutmen</a></li>
														<li class="menu-item"><a href="http://perpustakaan.pom.go.id" target="_blank" itemprop="url">Perpustakaan</a></li>
														<li class="menu-item"><a href="http://sipaman.pom.go.id" target="_blank" itemprop="url">Pasar Aman Berbahaya</a></li>
														<li class="menu-item"><a href="http://klubpompi.pom.go.id" target="_blank" itemprop="url">Klub POMPI</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5" ><header class="e_widget_title e_style_09 "><h5 class="e_title">Layanan Internal</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="http://pionas.pom.go.id" target="_blank" itemprop="url">Informasi Obat</a></li>
														<li class="menu-item"><a href="http://ik.pom.go.id" target="_blank" itemprop="url">Informasi Keracunan</a></li>
														<li class="menu-item"><a href="http://sioba.pom.go.id" target="_blank" itemprop="url">Sistem Informasi Obat Alam Indonesia</a></li>
														<li class="menu-item"><a href="http://skpt.pom.go.id" target="_blank" itemprop="url">Sistem Keamanan Pangan Terpadu</a></li>
														<li class="menu-item"><a href="http://registrasipangan.pom.go.id" target="_blank" itemprop="url">Direktorat Penilaian Keamanan Pangan</a></li>
														<li class="menu-item"><a href="http://standarpangan.pom.go.id" target="_blank" itemprop="url">Direktorat Standardisasi Produk Pangan</a></li>
														<li class="menu-item"><a href="http://www.pom.go.id/penyidikan" target="_blank" itemprop="url">Hasil Penyidikan Pusat Penyidikan</a></li>
														<li class="menu-item"><a href="http://inspektorat.pom.go.id" target="_blank" itemprop="url">Inspektorat</a></li>
														<li class="menu-item"><a href="http://sipt.pom.go.id" target="_blank" itemprop="url">Sistem Informasi Pelaporan Terpadu</a></li>
														<li class="menu-item"><a href="https://mail.pom.go.id" target="_blank" itemprop="url">Mail Corporate</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Pengumuman dan Publikasi</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/pengumuman" itemprop="url">Pengumuman</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/brosur" itemprop="url">Brosur</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/pedoman" itemprop="url">Pedoman</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/artikel" itemprop="url">Artikel</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/buku" itemprop="url">Buku</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/download" itemprop="url">Unduh</a></li>
													</ul></div></div></div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div></li>
							<li class="menu-item"><a href="http://www.pom.go.id/ppid" target="_blank" itemprop="url">PPID</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children e_mega_item"><a href="#" itemprop="url">Laporan</a><div class="sf-mega">
								<section class="e_section  e_relative">
									<div class="e_container clearfix container ">
										<div class="row e_grid_01">
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">SAKIP 2015-2019</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/rencana_strategi" itemprop="url">Rencana Strategi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/perjanjian_kinerja" itemprop="url">Perjanjian Kinerja</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/lakip" itemprop="url">LAKIP</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/lapkin" itemprop="url">Laporan Kinerja</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Laporan Tahunan</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/laporan_tahunan" itemprop="url">Laporan Tahunan</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/laporan_keuangan" itemprop="url">Laporan Keuangan</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/lap_pnbp" itemprop="url">Laporan PNBP</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Laporan Semester</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/lap_bmn" itemprop="url">Laporan Semester - BMN</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Laporan Triwulan</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/more/lap_to_nation" itemprop="url">Laporan Triwulan - Report to the Nation</a></li>
													</ul></div></div></div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div></li>
							<li class="menu-item"><a href="http://jdih.pom.go.id" target="_blank" itemprop="url">Peraturan/JDIH</a></li>
							<li class="menu-item menu-item-has-children e_mega_item"><a href="<?php echo base_url(); ?>view/direct/balai" itemprop="url">Balai</a><div class="sf-mega">
								<section class="e_section  e_relative">
									<div class="e_container clearfix container ">
										<div class="row e_grid_01">
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Balai Besar POM</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/01" itemprop="url">Balai Besar POM di Banda Aceh</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/02" itemprop="url">Balai Besar POM di Medan</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/03" itemprop="url">Balai Besar POM di Pekanbaru</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/05" itemprop="url">Balai Besar POM di Padang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/08" itemprop="url">Balai Besar POM di Palembang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/10" itemprop="url">Balai Besar POM di Bandar Lampung</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/12" itemprop="url">Balai Besar POM di Jakarta</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/13" itemprop="url">Balai Besar POM di Bandung</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/14" itemprop="url">Balai Besar POM di Semarang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/15" itemprop="url">Balai Besar POM di Yogyakarta</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">&nbsp;</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/16" itemprop="url">Balai Besar POM di Surabaya</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/17" itemprop="url">Balai Besar POM di Denpasar</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/18" itemprop="url">Balai Besar POM di Mataram</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/20" itemprop="url">Balai Besar POM di Pontianak</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/22" itemprop="url">Balai Besar POM di Samarinda</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/23" itemprop="url">Balai Besar POM di Banjarmasin</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/24" itemprop="url">Balai Besar POM di Manado</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/27" itemprop="url">Balai Besar POM di Makassar</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/30" itemprop="url">Balai Besar POM di Jayapura</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">Balai POM</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/04" itemprop="url">Balai POM di Batam</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/06" itemprop="url">Balai POM di Jambi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/07" itemprop="url">Balai POM di Bengkulu</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/09" itemprop="url">Balai POM di Pangkal Pinang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/11" itemprop="url">Balai POM di Serang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/19" itemprop="url">Balai POM di Kupang</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/21" itemprop="url">Balai POM di Palangka Raya</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/25" itemprop="url">Balai POM di Gorontalo</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/26" itemprop="url">Balai POM di Palu</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/28" itemprop="url">Balai POM di Kendari</a></li>
													</ul></div></div></div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="e_col">
													<div class="widget aegis_widget widget_nav_menu  e_mega_widget " style="border-right: 1px solid #e5e5e5"><header class="e_widget_title e_style_09 "><h5 class="e_title">&nbsp;</h5></header><div class="widget-content clearfix "><div class="menu-short-container"><ul id="menu-short" class="menu">
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/29" itemprop="url">Balai POM di Ambon</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/31" itemprop="url">Balai POM di Manokwari</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/32" itemprop="url">Balai POM di Sofifi</a></li>
														<li class="menu-item"><a href="<?php echo base_url(); ?>browse/balai/profile/33" itemprop="url">Balai POM di Mamuju</a></li>
													</ul></div></div></div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div></li>
							<li class="menu-item menu-item-has-children"><a href="javascript:void(0)">Pengaduan</a>
								<ul class="sub-menu">
									<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/cc">Contact Center</a></li>
									<li class="menu-item"><a href="http://ulpk.pom.go.id/ulpk/home.php?page=kontak&kontak=pengaduan">Formulir Pengaduan</a></li>
									<li class="menu-item"><a href="<?php echo base_url(); ?>view/direct/balai">Alamat Badan POM</a></li>
								</ul>
							</li>
						</ul>
						</nav>
						<nav class="e_socials_list e_style_01 clearfix">
						<ul>
							<li class="e_item e_first"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="javascript:alert('Untuk tampilan terbaik, gunakan resolusi layar minimal 1280x720 pixel')" title="Best View 1280x720"><i class="e_icon fa fa-desktop"></i></a></li>
							<li class="e_item e_other"><a class="e_link" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="http://cekbpom.pom.go.id" title="Cek BPOM"><i class="e_icon fa fa-database"></i></a></li>
							<li class="e_item e_other"><a class="e_link" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="https://play.google.com/store/apps/details?id=bpom.webreg&hl=en" title="Cek BPOM Android App"><i class="e_icon fa fa-android"></i></a></li>
							<li class="e_item e_other"><a class="e_link" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="http://jdih.pom.go.id" title="Peraturan/JDIH"><i class="e_icon fa fa-balance-scale"></i></a></li>
							<li class="e_item e_other"><a class="e_link" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="https://twitter.com/bpom_ri" title="Twitter"><i class="e_icon fa fa-twitter"></i></a></li>
							<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="bottom" href="javascript:void(0)" title="Halo BPOM 1500533"><i class="e_icon fa fa-phone"></i></a></li>
						</ul>
						</nav>
						<span class="e_search_handle e_style_01"><i class="e_icon ti-search"></i></span>
					</div>
				</div>
			</div>
			
			
			
			<div class="e_middle"><div class="e_container clearfix container"><div class="clearfix">
				<div class="e_left pull-left"><figure class="e_site_logo"><a href="<?php echo base_url(); ?>" title=""><img src="<?php echo base_url(); ?>data/logo-2016-s.png"></a></figure></div>
				<div class="e_right pull-right hide_mobile"><a class="e_top_banner e_style_01 pull-right" href="" target="_blank"><figure><img src="<?php echo base_url(); ?>data/cek-klik-2017.jpg" style="height: 110px"></figure></a></div>
			</div></div></div>
			<div class="e_bottom" style="">
				<div class="e_container clearfix container">
					<div class="e_inner clearfix">
						<aside class="e_ticker e_ticker_multi e_style_01">
														<div class="e_header"><h4>12 Desember 2017</h4></div>
							<ul><li class="e_item"><article class="entry-item"><time class="e_date">Siaran Pers/Peringatan Publik</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/391/SIARAN-PERS--AKSI-PEDULI-KOSMETIKA-AMAN--DAN-OBAT-TRADISIONAL-BEBAS-BAHAN-KIMIA-OBAT.html">SIARAN PERS  AKSI PEDULI KOSMETIKA AMAN  DAN OBAT TRADISIONAL BEBAS BAHAN KIMIA OBAT</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13860/PENGUMUMAN-PELAMAR-YANG-DINYATAKAN-LULUS-DAN-DITERIMA-SEBAGAI-CALON-PEGAWAI-NEGERI-SIPIL-BADAN-PENGAWAS-OBAT-DAN-MAKANAN-TAHUN-ANGGARAN-2017.html">PENGUMUMAN PELAMAR YANG DINYATAKAN LULUS DAN DITERIMA SEBAGAI CALON PEGAWAI NEGERI SIPIL BADAN PENGAWAS OBAT DAN MAKANAN TAHUN ANGGARAN 2017</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13853/KERJASAMA-BADAN-POM-RI-DAN-WHO--Pemanfaatan-Teknologi-Guna-Membangun-Budaya-Pelaporan--Untuk-Deteksi-dan-Respon-Cepat-Terhadap-Obat-yang-Substandar-dan-Palsu.html">KERJASAMA BADAN POM RI DAN WHO  Pemanfaatan Teknologi Guna Membangun Budaya Pelaporan  Untuk Deteksi dan Respon Cepat Terhadap Obat yang Substandar dan Palsu</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13850/Seleksi-Terbuka-Jabatan-Pimpinan-Tinggi-Pratama--Eselon-II--Badan-Pengawas-Obat-dan-Makanan.html">Seleksi Terbuka Jabatan Pimpinan Tinggi Pratama (Eselon II) Badan Pengawas Obat dan Makanan</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13845/KORPRI--Pilar-Utama-Pemersatu-Bangsa.html">KORPRI, Pilar Utama Pemersatu Bangsa</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Siaran Pers/Peringatan Publik</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/390/SIARAN-PERS---MOBIL-PENYIDIKAN-BADAN-POM-Pendukung-Penegakan-Hukum-di-Bidang-Obat-dan-Makanan.html">SIARAN PERS   MOBIL PENYIDIKAN BADAN POM Pendukung Penegakan Hukum di Bidang Obat dan Makanan</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13834/Gerakan-Bersama-Wujudkan-Masyarakat-Sadar-Pangan-Aman.html">Gerakan Bersama Wujudkan Masyarakat Sadar Pangan Aman</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Siaran Pers/Peringatan Publik</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/pers/389/SIARAN-PERS---GERAKAN-MASYARAKAT-HIDUP-SEHAT-SADAR-PANGAN-AMAN--GERMAS-SAPA--Kerja-Bersama-Menuju-Indonesia-Pangan-Aman.html">SIARAN PERS   GERAKAN MASYARAKAT HIDUP SEHAT SADAR PANGAN AMAN (GERMAS SAPA) Kerja Bersama Menuju Indonesia Pangan Aman</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13813/Sekjen-OKI-dukung-Peran-BPOM-dalam-Dorong-Kerja-Sama-di-Bidang-Obat-dan-Makanan-dengan-Negara--Negara-Organisasi-Kerja-Sama-Islam--OKI-.html">Sekjen OKI dukung Peran BPOM dalam Dorong Kerja Sama di Bidang Obat dan Makanan dengan Negara- Negara Organisasi Kerja Sama Islam (OKI)</a></h5></article></li><li class="e_item"><article class="entry-item"><time class="e_date">Berita Aktual</time><h5 class="entry-title"><a href="<?php echo base_url(); ?>view/more/berita/13810/Pemberitahuan-Jadwal-Wawancara-untuk-Lokasi-Tes-Jakarta-Badan-Pengawas-Obat-dan-Makanan-Tahun-2017.html">Pemberitahuan Jadwal Wawancara untuk Lokasi Tes Jakarta Badan Pengawas Obat dan Makanan Tahun 2017</a></h5></article></li></ul>
						</aside>
						<nav class="e_socials_list e_style_01 clearfix">
							<ul>
								<li class="e_item e_other"><a class="e_link e_social_link_twitter" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="https://twitter.com/bpom_ri" title="Twitter"><i class="e_icon fa fa-twitter"></i></a></li>
								<li class="e_item e_other"><a class="e_link e_social_link_facebook" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="https://www.facebook.com/BadanPengawasObatdanMakananRI" title="Facebook"><i class="e_icon fa fa-facebook"></i></a></li>
								<li class="e_item e_other"><a class="e_link e_social_link_instagram" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="https://www.instagram.com/bpom_ri/" title="Instagram"><i class="e_icon fa fa-instagram"></i></a></li>
								<li class="e_item e_other"><a class="e_link e_social_link_youtube" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="top" href="https://www.youtube.com/channel/UCO5Oi2m_M-uQhTaKDyGA0nA/" title="Youtube"><i class="e_icon fa fa-youtube"></i></a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="javascript:void(0)" title="Halo BPOM 1500533"><i class="e_icon fa fa-phone"></i></a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>view/direct/sitemap" title="Peta Situs"><i class="e_icon fa fa-sitemap"></i></a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>home/en" title="English">ENG</a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="http://www.pom.go.id/mobile" title="Versi Mobile"><i class="e_icon fa fa-mobile"></i></a></li>
								<li class="e_item e_other"><a class="e_link" rel="nofollow" data-toggle="tooltip" data-placement="top" href="<?php echo base_url(); ?>view/direct/faq" title="FAQ">FAQ</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		
				<div id="e_site_body" class="clearfix">
			<section class="e_section  e_relative">
				<div id="aegis_row_23bcuuk69up-parallax" class="e_parallax clearfix ">
					<div class="e_parallax_inner clearfix">
						<div class="e_overlay"></div>
						<div id="aegis_row_23bcuuk69up-inner" class="e_container clearfix container ">
							<div id="aegis_col_li30om8wgbn" class="e_col_fullwidth">
								<div class="e_col">
									<div id="aegis_widget_l1yx8pbj8u" class="widget aegis_widget e_widget_posts_slider  e_widget_first ">
										<div class="widget-content clearfix ">
											<div class="e_slider_pro slider-pro">
												<div class="sp-slides">
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/aksinasional.jpg?aksinasional">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Rangkaian Kegiatan Aksi Nasional Tolak Penyalahgunaan Obat, Jakarta (22/10)</h3>
		</div>
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/kerjabersama.jpg?kerjabersama">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Capaian 3 Tahun Pemerintahan Presiden Jokowi dan Wakil Presiden Jusuf Kalla</h3>
		</div>
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/aksinasional1.jpg?aksinasional1">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Presiden Jokowi bersama Kepala BPOM membuka Aksi Nasional Pemberantasan Obat Ilegal dan Penyalahgunaan Obat, Jakarta (3/10)</h3>
		</div>
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/aksi-nasional.jpg?aksi-nasional">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Aksi Nasional Pemberantasan Obat Ilegal dan Penyalahgunaan Obat</h3>
		</div>
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/hut17.jpeg?hut17">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Dirgahayu Republik Indonesia ke-72</h3>
		</div>
		<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/press-pcc.jpg?2017">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Konferensi Pers Perkembangan Kasus PCC dan Penyalahgunaan Obat</h3>
		</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/HUT2017.jpg?HUT2017">
			<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Dirgahayu Republik Indonesia ke-72, INDONESIA KERJA SAMA</h3>
		</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/pancasila.jpg?pancasila">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Hari Lahir Pancasila - 1 Juni 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/penyerahanWTP2017.jpg?penyerahanWTP2017">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Badan POM mendapat predikat Wajar Tanpa Pengecualian (WTP) atas Laporan Keuangan Kementerian/Lembaga tahun 2016, Jakarta - Selasa, 23 Mei 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/Indonesia-Japan-Joint-Symposium.jpg?Indonesia-Japan-Joint-Symposium">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Badan POM RI dan Japan Pharmaceutical and Medical Devices Agency (PMDA) bersinergi dalam “The 3rd Indonesia-Japan Joint Symposium, Selasa 16 Mei 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/kunkerambon2017.jpg?kunkerambon2017">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Kunjungan Kerja Badan POM ke Ambon, Ambon - Mei 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/pu_hut.jpg?pu_hut">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">HUT Badan POM ke-16 "Membangun Inovasi dan Kemitraan Mendukung Peningkatan Efektivitas Pengawasan Obat dan Makanan", Jakarta - Februari 2017</h3>
	</div> 
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/natunaweb2016.jpg?v002">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Kunjungan Kerja Kepala Badan POM terkait Rencana Pendirian Balai POM, Natuna - 22 Maret 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/moujaksa.jpg?v003">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Sosialisasi Perjanjian Kerjasama Badan POM - Kejaksaan Agung, Jakarta - Maret 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/munas.jpg?v004">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Musyawarah Nasional Pengawasan Obat dan Makanan Tahun 2017, Batu - Maret 2017</h3>
	</div>
	<div class="sp-slide" url="<?php echo base_url(); ?>data/slide/pelantikan.jpg?v007">
		<h3 class="sp-layer sp-black" data-horizontal="0" data-vertical="190" data-show-transition="left" data-hide-transition="down" data-show-delay="600" data-hide-delay="100" style="margin-top:13px; font-size: 16px; padding: 10px 20px;">Pelantikan Kepala Badan POM Tahun 2016, Jakarta - Juli 2016</h3>
	</div>
</div>											</div>
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
			
			
			
			<section class="e_section  ec_bg_color_body ec_border_top_primary e_relative">
				<div class="e_container clearfix container" style="margin-top: 10px">
					<div class="e_col_sub">
						<div class="widget aegis_widget e_widget_posts_highlight_first_2nd  e_widget ">
							<header class="e_widget_title e_style_04 "><h3 class="e_title">Hot Issue<span id="addhot" class="red_me" style="float: right; font-size: 31px; cursor: pointer">&raquo;</span><span id="remhot" class="red_me" style="float: right; font-size: 31px; cursor: pointer">&laquo; &nbsp;</span></h3></header>
							<div id="boxhot" class="row widget-content clearfix" style="margin-top: 5px; height:147px; overflow:hidden;">
								<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/pcc.jpg" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>view/direct/hotissue-pcc">Penyalahgunaan Obat Jenis PCC</a></p></div></article></div>
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_stranas.png" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>view/direct/hotissue-stranas">Strategi Nasional Perlindungan Konsumen</a></p></div></article></div>
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_obatbaru.jpg" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>browse/more/issue/16">Update Obat Baru</a></p></div></article></div>
<!--<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/whistle2.jpg" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="http://rb.pom.go.id/content/delapan-area-perubahan/penguatan-pengawasan/kirim-pengaduan">Sapu Bersih Pungutan Liar !</a></p></div></article></div>-->
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_pke.jpg" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>view/direct/pke">Paket Kebijakan Ekonomi</a></p></div></article></div>
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_bpombicara2.png" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>browse/more/issue/13">BPOM Bicara</a></p></div></article></div>
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_obatpalsu.png" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>browse/more/issue/12">LAPORKAN !!!</a></p></div></article></div>
<div class="col-sm-2 col-xs-12"><article class="e_item e_active"><div class="entry-thumb"><img src="<?php echo base_url(); ?>web/images/demo/pke/logo_rekrutmen.png" class="img-responsive wp-post-image" /></div><div class="e_wrap"style="padding: 5px; height: 42px; overflow: hidden"><p class="entry-title" style="line-height: 1.1em; font-size: 14px"><a href="<?php echo base_url(); ?>browse/more/issue/6">Sel. Terbuka Eselon II</a></p></div></article></div>							</div>
							<script>
								var showhot = 6;
								jQuery('#addhot').click(function(){
									var jml = jQuery('#boxhot').children().length;
									if(jml>showhot && jml>=showhot){
										jQuery('#boxhot').children(':visible').first().hide();
										showhot++;
									}
								});
								jQuery('#remhot').click(function(){
									var jml = jQuery('#boxhot').children(':hidden').length;
									if(jml>0){
										jQuery('#boxhot').children(':hidden').last().show();
										showhot--;
									}
								});
							</script>
						</div>
					</div>
				</div>
			</section>
			
			
			
			<section class="e_section">
				<div class="e_container clearfix container hide_mobile"><div class="e_col_fullwidth"><div class="e_col">
					<div class="widget aegis_widget e_adv  e_widget_first "><div class="widget-content clearfix " id="urwebreg" style="height:280px">Loading..</div>
					<script src="<?php echo base_url(); ?>js/amcharts.js?ver=1.3"></script>
					<script src="<?php echo base_url(); ?>js/amanimate.js?ver=1.1"></script>
					<script src="<?php echo base_url(); ?>js/serial.js?ver=1.1"></script>
					<script src="<?php echo base_url(); ?>js/pie.js?ver=1.1"></script>
					<script src="<?php echo base_url(); ?>js/light.js"></script>
					<script>
						jQuery(document).ready(function($){
							setTimeout(function(){
								$.get('<?php echo base_url(); ?>front/webreg', function(webreg){
									if(webreg!='') $('#urwebreg').html(webreg);
								});
							}, 1000);
						});
					</script>
					</div>
					
				</div></div></div>
				
			</section>
			
			
			
			<section class="e_section  ec_bg_color_body ec_border_top_primary e_relative">
				<div class="e_container clearfix container">
					<div class="row e_grid_02">
						<div class="col-lg-8 e_col_main">
							<div class="e_col">
								<section class="e_section e_relative">
									<div class="e_nested clearfix" style="margin-top: 0">
										<div class="row e_grid_01">
											<div class="col-lg-6">
												<div class="e_col">
													<div class="widget aegis_widget e_widget_posts_highlight_first e_layout_2  e_widget_first ">
														<header class="e_widget_title e_style_02  ec_title_bg_color_body"><h3 class="e_title" style="">Siaran Pers / Peringatan Publik</h3></header>
														<div class="widget-content clearfix ">
															<div class="e_microdata" id="urpers5depan" style="min-height:351px">Loading..</div>
															<script>
																jQuery(document).ready(function($){
																	setTimeout(function(){
																		$.get('<?php echo base_url(); ?>front/pers5depan', function(pers5depan){
																			if(pers5depan!='') $('#urpers5depan').html(pers5depan);
																		});
																	}, 1500);
																});
															</script>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="e_col">
													<div class="widget aegis_widget e_widget_posts_highlight_first e_layout_2  e_widget_first ">
														<header class="e_widget_title e_style_02  ec_title_bg_color_body"><h3 class="e_title">Berita Aktual</h3></header>
														<div class="widget-content clearfix ">
															<div class="e_microdata" id="urberita5depan" style="min-height:351px">Loading..</div>
															<script>
																jQuery(document).ready(function($){
																	setTimeout(function(){
																		$.get('<?php echo base_url(); ?>front/berita5depan', function(berita5depan){
																			if(berita5depan!='') $('#urberita5depan').html(berita5depan);
																		});
																	}, 3000);
																});
															</script>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<img src="<?php echo base_url(); ?>data/images/maklumat-pelayanan-tdd.jpg" style="width:100%">
									<div class="e_nested clearfix" style="margin-top:20px">
										<div class="row e_grid_01">
											<div class="col-lg-12">
												<div class="e_col">
													<div class="widget aegis_widget e_widget_posts_highlight_first e_layout_2  e_widget_first ">
														<header class="e_widget_title e_style_02  ec_title_bg_color_body"><h3 class="e_title" style="color: #1977a5">Pengumuman</h3></header>
														<div class="widget-content clearfix ">
															<div class="e_microdata" id="urpengumuman" style="min-height:237px">Loading..</div>
															<script>
																jQuery(document).ready(function($){
																	setTimeout(function(){
																		$.get('<?php echo base_url(); ?>front/pengumuman5depan', function(pengumuman){
																			if(pengumuman!='') $('#urpengumuman').html(pengumuman);
																		});
																	}, 2000);
																});
															</script>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="e_nested clearfix">
										<div class="row e_grid_01">
											<div class="col-lg-6">
												<div class="e_col">
													<div class="widget aegis_widget e_widget_posts_highlight_first e_layout_2  e_widget_first ">
														<header class="e_widget_title e_style_02  ec_title_bg_color_body"><h3 class="e_title">Pengadaan Barang &amp; Jasa</h3></header>
														<div class="widget-content clearfix ">
															<div class="e_microdata" id="urpengadaan5depan" style="min-height:530px">Loading..</div>
															<script>
																jQuery(document).ready(function($){
																	setTimeout(function(){
																		$.get('<?php echo base_url(); ?>front/pengadaan5depan', function(pengadaan5depan){
																			if(pengadaan5depan!='') $('#urpengadaan5depan').html(pengadaan5depan);
																		});
																	}, 4500);
																});
															</script>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6 hidden-md hidden-sm hidden-xs">
												<div class="e_col">
													<div class="widget aegis_widget e_widget_posts_highlight_first e_layout_2  e_widget_first ">
														<header class="e_widget_title e_style_02  ec_title_bg_color_body"><h3 class="e_title">Aplikasi Publik</h3></header>
														<div style="position:absolute; margin: 85px 0 0 -180px; width: 200px; display: none" id="ereg-group">
															<a href="http://aero.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/ereg-obat.jpg" style="margin: 0 4px 8px 0; border: 1px solid #512db8;" height="75" width="172"></a>
															<a href="http://asrot.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/asrot.jpg" style="margin: 0 4px 8px 0; border: 1px solid #508e33;" height="75" width="172"></a>
															<a href="http://e-reg.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/ereg-pangan.jpg" style="margin: 0 4px 8px 0; border: 1px solid #1977a5;" height="75" width="172"></a>
														</div>
														<div class="widget-content clearfix " style="position:absolute">
															<a href="http://lpse.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/lpse.jpg" style="margin: 0 4px 8px 0; border: 1px solid #d7d5cb;" height="64" width="172"/></a>
															<a href="http://e-bpom.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/ebpom.jpg" style="margin: 0 4px 8px 0; border: 1px solid #1977a5;" height="64" width="172"></a>
															<a href="javascript:void(0)" onclick="jQuery('#ereg-group').toggle();"><img height="64" width="172" src="<?php echo base_url(); ?>data/banner/ereg.jpg" style="margin: 0 4px 8px 0; border: 1px solid #508e33;"></a>
															<a href="http://notifkos.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/notifikasi.jpg" style="margin: 0 4px 8px 0; border: 1px solid #9b3322;" height="64" width="172"></a>
															<a href="http://e-pengujian.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/epengujian.jpg" style="margin: 0 4px 8px 0; border: 1px solid #1977a5;" height="64" width="172"></a>
															<a href="http://www.pom.go.id/ppid"><img src="<?php echo base_url(); ?>data/banner/ppid.jpg" style="margin: 0 4px 8px 0; border: 1px solid #7ebff1;" height="64" width="172"></a>
															<a href="http://rb.pom.go.id/"><img src="<?php echo base_url(); ?>data/banner/rb.jpg" style="margin: 0 4px 8px 0; border: 1px solid #b9d240;" height="64" width="172"></a>
															<a href="<?php echo base_url(); ?>view/direct/antrian_obat"><img src="<?php echo base_url(); ?>data/banner/antrian-obat.jpg" style="margin: 0 4px 8px 0; border: 1px solid #8c5105;" height="64" width="172"></a>
															<a href="http://www.pom.go.id/penyidikan"><img src="<?php echo base_url(); ?>data/banner/penyidikan.jpg" style="margin: 0 4px 8px 0; border: 1px solid #1977a5;width:172px; height:64px;"></a>
															<a href="http://qms.pom.go.id"><img src="<?php echo base_url(); ?>data/banner/qms.jpg" style="margin: 0 4px 8px 0; border: 1px solid #d76be0;" height="64" width="172"></a>
															<a href="http://rb.pom.go.id/content/delapan-area-perubahan/penguatan-pengawasan/kirim-pengaduan"><img src="<?php echo base_url(); ?>data/banner/wbs.jpg" style="margin: 0 4px 8px 0; border: 1px solid #8c5105;width:172px; height:64px;"></a>
															<a href="http://klubpompi.pom.go.id/id/"><img src="<?php echo base_url(); ?>data/banner/klubpompi2014.gif" style="margin: 0 4px 8px 0; width:172px; height:64px;"></a>
															<a href="http://www.lapor.go.id/"><img src="<?php echo base_url(); ?>data/banner/lapor-logo.png" style="margin: 0 4px 8px 0; border: 1px solid #FFF;width:172px; height:64px;"></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div class="col-lg-4 e_col_sub">
							<div class="e_col">
								<div id="aegis_widget_fltgq0fdzx" class="widget aegis_widget e_widget_socials_counter  e_widget_first " style="height:200px; overflow: hidden">
									<header class="e_widget_title e_style_04 " id="esl">
										<h3 class="e_title jdlfoto selfoto"><a href="<?php echo base_url(); ?>view/direct/head">Kepala Badan POM</a></h3>
										<h3 class="e_title jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/secretary">Sekretaris Utama</a></h3>
										<h3 class="e_title jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy1">Deputi I</a></h3>
										<h3 class="e_title jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy2">Deputi II</a></h3>
										<h3 class="e_title jdlfoto"  style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy3">Deputi III</a></h3>
									</header>
									<div id="esl_isi">
										<div class="jdlfoto selfoto"><a href="<?php echo base_url(); ?>view/direct/head"><img height="150px" align="left" style="padding:0 20px 5px 0" src="<?php echo base_url(); ?>web/images/esl1/kabpom2016.jpg"></a><p><b><a href="<?php echo base_url(); ?>view/direct/head">Kepala Badan POM</a></b><small><br>&nbspDr. Ir. Penny K. Lukito, MCP</small></p><br/><br/></div>
										<div class="jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/secretary"><img height="150px" align="left" style="padding:0 20px 5px 0" src="<?php echo base_url(); ?>web/images/esl1/sestama2017.jpg"></a><p><b><a href="<?php echo base_url(); ?>view/direct/secretary">Sekretaris Utama Badan POM</a></b><small><br>&nbsp;Dra. Reri Indriani, Apt., M.Si. <br>&nbsp;<br>&nbsp;</small></p><br/></div>
										<div class="jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy1"><img height="150px" align="left" style="padding:0 20px 5px 0" src="<?php echo base_url(); ?>web/images/esl1/dep1_2017.jpg"></a><p><b><a href="<?php echo base_url(); ?>view/direct/deputy1">Deputi Bidang Pengawasan Produk Terapetik dan Narkotika, Psikotropika & Zat Adiktif</a></b><small><br>&nbsp; Dra. Nurma Hidayati, Apt., M.Epid.<br>&nbsp;<br>&nbsp;</small></p><br/></div>
										<div class="jdlfoto" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy2"><img height="150px" align="left" style="padding:0 20px 5px 0" src="<?php echo base_url(); ?>web/images/esl1/dep2_2015pakondri.jpg"></a><p><b><a href="<?php echo base_url(); ?>view/direct/deputy2">Deputi Bidang Pengawasan Obat Tradisional, Kosmetik dan Produk Komplemen</a></b><small><br>&nbsp;Drs. Ondri Dwi Sampurno, M.Si., Apt.</small></p><br/></div>
										<div class="jdlfoto" last="" style="display:none;"><a href="<?php echo base_url(); ?>view/direct/deputy3"><img height="150px" align="left" style="padding:0 20px 5px 0" src="<?php echo base_url(); ?>web/images/esl1/dep32014_2.JPG"></a><p><b><a href="<?php echo base_url(); ?>view/direct/deputy3">Deputi Bidang Pengawasan Keamanan Pangan dan Bahan Berbahaya</a></b><small><br>&nbsp;Drs. Suratmono, MP</small></p><br/></div>
									</div>
									<script>
										jQuery(document).ready(function($){
											$('.selfoto').show();
											setInterval(function(){
												var active = $('h3.selfoto');
												var actives = $('div.selfoto');
												var next = active.next();
												if(actives.attr('last')=='') 
													var nexts = $('div.jdlfoto').first();
												else
													var nexts = actives.next();
												if(next.html()==null) next = $('h3.jdlfoto').first();
												next.addClass('selfoto');
												nexts.addClass('selfoto');
												active.removeClass('selfoto');
												actives.removeClass('selfoto');
												active.hide();
												actives.hide();
												next.show();
												nexts.fadeIn(1200);
											}, 5000);
										});
									</script>
								</div>
								<div class="widget aegis_widget e_widget_posts_highlight_first_2nd  e_widget ">
									<header class="e_widget_title e_style_04 "><h3 class="e_title"><a href="<?php echo base_url(); ?>browse/more/klarifikasi" class="red_me">Klarifikasi Badan POM</a>&nbsp;&nbsp;<img src="<?php echo base_url(); ?>data/new1.gif" /></h3></header>
									<div class="widget-content clearfix">
										<div class="e_microdata">
											<div class="row">
											<div class="col-xs-12 e_right" id="urklarifikasi5depan" style="min-height:522px">Loading..
												<script>
													jQuery(document).ready(function($){
														setTimeout(function(){
															$.get('<?php echo base_url(); ?>front/klarifikasi5depan', function(klarifikasi5depan){
																if(klarifikasi5depan!=''){
																	$('#urklarifikasi5depan').html(klarifikasi5depan);
																	setInterval("rollklar()", 6000);
																}
															});
														}, 1500);
													});
													function rollklar(){
														var klarshow = jQuery('article.klarshow:visible');
														klarshow = klarshow.first();
														var showfirst = parseInt(klarshow.attr('klar'));
														showfirst = showfirst + 7;
														var hidefirst = jQuery("article.klarshow[name^='x"+showfirst+"done']");
														klarshow.slideUp("slow");
														hidefirst.slideDown("slow");
													}
												</script>
											</div></div>
										</div>
									</div>
								</div>
								<div class="widget aegis_widget widget_categories  e_widget " style="margin-top: 55px" >
									<header class="e_widget_title e_style_04 "><h3 class="e_title">Link Terkait</h3></header>
									<div class="widget-content clearfix ">
									<ul>
										<li class="cat-item"><a href="http://www.depkes.go.id/" target="_blank">Kementerian Kesehatan &nbsp;<small>- <i class="blue_me">www.kemkes.go.id</i></small></a></li>
										<li class="cat-item"><a href="http://www.bnn.go.id/" target="_blank">Badan Narkotika Nasional &nbsp;<small>- <i class="blue_me">www.bnn.go.id</i></small></a></li>
										<li class="cat-item"><a href="http://www.kpk.go.id/" target="_blank">Komisi Pemberantasan Korupsi &nbsp;<small>- <i class="blue_me">www.kpk.go.id</i></small></a></li>
										<li class="cat-item"><a href="http://www.insw.go.id/" target="_blank">Portal INSW &nbsp;<small>- <i class="blue_me">www.insw.go.id</i></small></a></li>
										<li class="cat-item"><a href="http://www.bkpm.go.id/" target="_blank">BKPM &nbsp;<small>- <i class="blue_me">www.bkpm.go.id</i></small></a></li>
										<li class="cat-item"><a href="http://www.who.int/" target="_blank">World Health Organization &nbsp;<small>- <i class="blue_me">www.who.int</i></small></a></li>
										<li class="cat-item"><a href="http://www.who.int/" target="_blank">Food and Drug Administration &nbsp;<small>- <i class="blue_me">www.fda.gov</i></small></a></li>
									</ul>
									</div>
								</div>
								<div class="widget aegis_widget e_widget_posts_highlight_first_2nd  e_widget " style="margin-top: 42px">
									<header class="e_widget_title e_style_04 "><h3 class="e_title">Laporan</h3></header>
									<div class="widget-content clearfix ">
										<div class="textwidget">
											<div class="e_toggles e_style_01 e_accordions">
												
												<div class="e_toggle e_active">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-line-chart"></i>Laporan Kinerja<span class="e_action pull-right">-</span></div>
													<div style="display: block;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>browse/more/lapkin" class="e_button e_icon e_solid e_style_01">2014</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lapkin" class="e_button e_icon e_solid e_style_01">2015</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lapkin" class="e_button e_icon e_solid e_style_01">2016</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-line-chart"></i>LAKIP<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>browse/more/lakip" class="e_button e_icon e_solid e_style_01">2011</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lakip" class="e_button e_icon e_solid e_style_01">2012</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lakip" class="e_button e_icon e_solid e_style_01">2013</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-area-chart"></i>Laporan Tahunan<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>browse/more/laporan_tahunan" class="e_button e_icon e_solid e_style_01">2012</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_tahunan" class="e_button e_icon e_solid e_style_01">2013</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_tahunan" class="e_button e_icon e_solid e_style_01">2014</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_tahunan" class="e_button e_icon e_solid e_style_01">2015</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-area-chart"></i>Laporan Keuangan<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>browse/more/laporan_keuangan" class="e_button e_icon e_solid e_style_01">2012</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_keuangan" class="e_button e_icon e_solid e_style_01">2013</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_keuangan" class="e_button e_icon e_solid e_style_01">2014</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/laporan_keuangan" class="e_button e_icon e_solid e_style_01">2015</a>
														&nbsp;<a href="http://www.pom.go.id/ppid/2016/kelengkapan/keuangan2016.pdf" class="e_button e_icon e_solid e_style_01">2016</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-bar-chart"></i>Laporan Barang Milik Negara<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>view/direct/lap_bmn-2014" class="e_button e_icon e_solid e_style_01">2014</a>
														<a href="<?php echo base_url(); ?>view/direct/lap_bmn-2015" class="e_button e_icon e_solid e_style_01">2015</a>
														<a href="http://www.pom.go.id/ppid/rar/lap_bmn_2016.pdf" class="e_button e_icon e_solid e_style_01">2016</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-bar-chart"></i>Report To The Nation<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>browse/more/lap_to_nation/01-01-2013/01-12-2013" class="e_button e_icon e_solid e_style_01">2013</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lap_to_nation/01-01-2014/01-12-2014" class="e_button e_icon e_solid e_style_01">2014</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lap_to_nation/01-01-2015/01-12-2015" class="e_button e_icon e_solid e_style_01">2015</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lap_to_nation/01-01-2016/01-12-2016" class="e_button e_icon e_solid e_style_01">2016</a>
														&nbsp;<a href="<?php echo base_url(); ?>browse/more/lap_to_nation/01-01-2017/01-12-2017" class="e_button e_icon e_solid e_style_01">2017</a>
													</div>
												</div>
												<div class="e_toggle">
													<div class="e_toggle_title clearfix"><i class="e_icon fa fa-area-chart"></i>Laporan PNBP<span class="e_action pull-right">+</span></div>
													<div style="display: none;" class="e_toggle_content">
														<a href="<?php echo base_url(); ?>view/direct/lap_pnbp" class="e_button e_icon e_solid e_style_01">2014</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
			
			<section id="aegis_row_jakom4p4f2" class="e_section  e_relative">
				<div class="e_owl_icon e_left"><i class="e_icon fa fa-angle-left"></i></div>
				<div class="e_owl_icon e_right"><i class="e_icon fa fa-angle-right"></i></div>
				<div id="aegis_row_jakom4p4f2-parallax" class="e_parallax clearfix ">
					<div class="e_parallax_inner clearfix">
						<div class="e_overlay"></div>
						<div id="aegis_row_jakom4p4f2-inner" class="e_container clearfix container " style="margin-top: 15px; margin-bottom: 25px;">
							<div id="aegis_col_pwoo0s3tyl9" class="e_col_fullwidth">
								<div class="e_col">
									<div id="aegis_widget_9mjj4p2p5zf" class="widget aegis_widget e_widget_posts_carousel_large_thumb  e_widget_first ">
										<header class="e_widget_title e_style_03  ec_title_color_white ec_bg_color_none ec_title_middle_line_color_primary"><h3 class="e_title">Foto dan Video Kegiatan</h3></header>
										<div class="widget-content clearfix ">
											<div class="e_container clearfix">
												<div class="row">
													<div itemscope itemtype="http://schema.org/LiveBlogPosting" class="owl-carousel owl-theme e_owl_pagination_1">
														<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/inovasiPTSP.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Badan POM Terima Penghargaan atas Inovasi Pelayanan Terpadu Satu Pintu Ekpor- Impor Obat dan Makanan
			</font></b>
			<br/><br/>
			<p align=justify>
				Sekretaris Utama Badan POM, Reri Indriani menerima penghargaan atas Inovasi Pelayanan Publik Badan POM dalam bentuk Pelayanan Terpadu Satu Pintu (PTSP) Ekspor-Impor Obat dan Makanan pada Pameran Inovasi Lembaga Administrasi Negara, 3 - 4 Agustus 2017.			
			</p>
		">
	Badan POM Terima Penghargaan atas Inovasi Pelayanan Terpadu Satu Pintu Ekpor- Impor Obat dan Makanan</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Agu 2017
			</span>
		</a>
	</p>
</article>

<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_merauke.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Tanamkan Kesadaran Pangan Sehat dan Bergizi siswa SD YPPK St. Theresia Buti
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala Badan POM, Penny K. Lukito hadir langsung di tengah-tengah para siswa SD YPPK St. Theresia Buti yang merupakan salah satu sekolah katolik di Merauke dan SD Yapis II yang merupakan salah satu sekolah Islam di Merauke, untuk berdialog langsung sekaligus meningkatkan edukasi para siswa tentang makanan sehat.			
			</p>
		">
	Tanamkan Kesadaran Pangan Sehat dan Bergizi siswa SD YPPK St. Theresia Buti</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Jul 2016
			</span>
		</a>
	</p>
</article>



<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/RI_1_TJ_(4)1.JPG" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" caption="<b><font size=5px>Indonesia Kirim Bantuan Kemanusiaan untuk Muslim Rohingya</font></b><br/><br/><p align=justify>Sekretaris Utama Badan POM, Reri Indriani menghadiri pengiriman bantuan kemanusiaan untuk Rakhine State, Komunitas Muslim Rohingya di Myanmar. Kegiatan dipimpin langsung oleh Presiden RI, Joko Widodo yang secara simbolis melepas bantuan kemanusiaan tersebut. Bantuan kemanusiaan ini dikirim melalui Dermaga III Pelabuhan Tanjung Priok Jakarta Utara.</p>">Bantuan Kemanusiaan Rohingya</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Jakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Des 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_100hk.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Refleksi 100 Hari Kerja Kepala Badan POM
			</font></b>
			<br/><br/>
			<p align=justify>
				100 hari kerja, Penny K. Lukito menjalankan tugas sebagai Kepala Badan POM, sejak dilantik secara langsung oleh Presiden Joko Widodo pada 20 Juli 2016 lalu. Berbagai strategi penguatan telah  diprioritaskan Penny untuk membawa Badan POM menjadi lembaga pengawas Obat dan Makanan yang mandiri. Walaupun demikian banyak tantangan selama menjalankan tugas tersebut.			
			</p>
		">
	Refleksi 100 Hari Kerja Kepala Badan POM</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Des 2016
			</span>
		</a>
	</p>
</article>


<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_bpomombudsman.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" caption="<b><font size=5px>Badan POM Memperoleh Penghargaan Predikat Pelayanan Publik dengan Kepatuhan Tinggi </font></b><br/><br/><p align=justify>Badan POM memperoleh penghargaan predikat pelayanan publik dengan kepatuhan tinggi dari OMBUDSMAN RI yang diserahkan oleh Prof. Amzulian Rifai, S.H., LLM., PH.D (Ketua OMBUDSMAN RI) Kepada Dra. Rita Endang, Apt., M.Kes (Kepala Pusat Informasi Obat dan Makanan - BPOM).</p>">Predikat dengan Kepatuhan Tinggi</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Jakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Nov 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_rakernas_IAI.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Badan POM Dukung Praktik Kefarmasian yang Bertanggung Jawab
			</font></b>
			<br/><br/>
			<p align=justify>
				Rapat Kerja Nasional (Rakernas) dan Pertemuan Ilmiah Tahunan (PIT) 2016 diselenggarakan oleh Ikatan Apoteker Indonesia (IAI) pada 27-30 September 2016 di Yogyakarta dengan mengusung tema Rakernas Developing Pharmacist Role for Better Quality of Life in Asean Economic Comunity Era. Berbagai ide baru yang dihasilkan dalam rakernas harus diimplementasikan secara nyata oleh berbagai pihak dan lintas sektor terkait sebagai upaya meningkatkan peran dan eksistensi Apoteker Indonesia dalam Sistem Jaminan Kesehatan Nasional ke depan.			
			</p>
		">
	Rakernas dan Pertemuan Ilmiah Tahunan</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Yogyakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Sep 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_19092016.JPG" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" caption="<b><font size=5px>Rapat Koordinasi Pengawasan Peredaran Obat Ilegal </font></b><br/><br/><p align=justify>Rapat Koordinasi Bersama Menko. PMK, Kepala Badan POM, Menteri Kesehatan,Kabareskrim, Sekjen IAI terkait Peredaran Obat Ilegal Termasuk Palsu yang Meresahkan Masyarakat</p>">Rapat Koordinasi Pengawasan Peredaran Obat Ilegal</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Jakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Sep 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_bebiluck.JPG" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Penarikan Makanan Bayi Pendamping ASI Ilegal
			</font></b>
			<br/><br/>
			<p align=justify>
				Badan POM kembali hadir melindungi masyarakat dari Obat dan Makanan yang membahayakan kesehatan. Kamis (15/09) Badan POM bersama lintas sektor terkait berhasil menyegel pabrik Makanan Pendamping ASI (MP-ASI) ilegal BEBILUCK milik PT. Hassana Boga Sejahtera di Kawasan Pergudangan Multiguna Taman Tekno 2 Blok L2 no.35 BSD Tangerang Selatan. Dari lokasi berhasil diamankan produk jadi sejumlah 16.884 pcs dan kemasan sejumlah 217.280 pcs dengan total nilai barang bukti mencapai Rp733.000.000 (tujuh ratus tiga puluh tiga juta rupiah).			
			</p>
		">
	Penarikan Makanan Bayi Pendamping ASI Ilegal</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Tangerang</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Sep 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_bpkbpom2016.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Audiensi dengan Anggota VI dan Tim Auditor
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala Badan POM, Penny K Lukito beserta jajarannya melakukan audiensi dengan Anggota VI dan Tim Auditor di kantor BPK Jakarta 
			</p>
		">
	Audiensi dengan Anggota VI dan Tim Auditor</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Jakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Sep 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_bio.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Kunjungan Kerja Ke Pabrik Bio Farma
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala BPOM, Penny K. Lukito yang didampingi Deputi Bidang Pengawasan Produk Terapetik dan NAPZA, T. Bahdar J. Hamid beserta jajaran melakukan kunjungan kerja ke pabrik Bio Farma. Kunjungan tersebut bertujuan untuk mengetahui dan memastikan bahwa vaksin yang diproduksi oleh pabrik Bio Farma aman, berkhasiat, dan bermutu sesuai dengan standar dan persyaratan yang berlaku nasional dan internasional.				
			</p>
		">
	Kunjungan Kerja Ke Pabrik Bio Farma</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Bandung</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Agu 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_ppomn2.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Peninjauan Proses Uji Vaksin
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala Badan POM, Penny Kusumastuti Lukito mengunjungi gedung Pusat Pengujian Obat dan Makanan Nasional (PPOMN) dalam rangka meninjau proses uji vaksin. Dimana BPOM merupakan NRA (National Regulatory Authority) yang mengawasi industri farmasi penyedia vaksin, dan tergabung dalam satgas penaggulangan vaksin palsu.			
			</p>
		">
	Peninjauan Proses Uji Vaksin</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Agu 2016
			</span>
		</a>
	</p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_rs.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Kunjungan Kerja Ke RS Harapan Bunda
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala Badan POM, Penny K Lukito yang didampingi Deputi Bidang Pengawasan Produk Terapetik dan NAPZA, T. Bahdar J. Hamid beserta jajaran melakukan kunjungan kerja ke RS Harapan Bunda bersama Panitia Kerja (Panja) Pengawasan Peredaran Vaksin dan Obat Komisi IX DPR-RI, yang langsung dipimpin oleh Dede Yusuf selaku Ketua Panita Kerja			
			</p>
		">
	Kunjungan Kerja Ke RS Harapan Bunda</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;"><a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i><span class="e_text">Jakarta</span></a><a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right"><i class="e_icon fa fa-calendar"></i><span class="e_text">Jul 2016</span></a></p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/fk_yanlik.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="javascript:void(0)" 
		caption="
			<b><font size=5px>
				Kepala Badan POM Penny K. Lukito meninjau kesiapan pelayanan publik
			</font></b>
			<br/><br/>
			<p align=justify>
				Kepala Badan POM Penny K. Lukito meninjau kesiapan pelayanan publik dalam melayani registrasi obat dan makanan di Badan POM			
			</p>
		">
	Kepala Badan POM Penny K. Lukito meninjau kesiapan pelayanan publik</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Jul 2016
			</span>
		</a>
	</p>
</article>
<article class="e_item clearfix post type-post">
	<div class="entry-thumb">
		<img src="<?php echo base_url(); ?>data/foto_kegiatan/ulpk.jpg" class="img-responsive wp-post-image" itemprop="image" />
		<h4 itemprop="headline" class="entry-title"></h4>
	</div>
	<p class="e_meta" style="background-color: rgba(25, 153, 73, 0.8); height: 47px !important; overflow: hidden; line-height: 1.2em"><a class="fotoact" href="<?php echo base_url(); ?>view/direct/video" 
		caption="
			<b><font size=5px>
				Video
			</font></b>
			<br/><br/>
			<p align=justify>
				Redirect to video...
			</p>
		">
	Video</a></p>
	<p class="e_meta" style="padding-left: 0;padding-right: 0;">
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid"><i class="e_icon fa fa-map-marker"></i>
			<span class="e_text">
				Jakarta
			</span>
		</a>
		<a href="javascript:void(0)" class="e_link e_icon e_date e_solid" style="float:right">
			<i class="e_icon fa fa-calendar"></i>
			<span class="e_text">
				Jul 2016
			</span>
		</a>
	</p>
</article>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script>
					jQuery('.fotoact').click(function(){
						var obj = jQuery(this);
						var caption;
						var fotoimg;
						caption = obj.attr('caption');
						if(caption=='' || caption == null) caption = obj.html();
						fotoimg = obj.parent().parent().children().children().attr('src');
						jQuery('#fotoklikmore').addClass('e_is_visible');
						jQuery('#fotoklikcaption').html(caption);
						jQuery('#fotoklikimg').attr('src', fotoimg);
					});
					</script>
					<div class="e_popup e_style_01" role="alert" id="fotoklikmore">
						<div class="e_popup_container e_style_01">
							<img id="fotoklikimg" src="">
							<div id="fotoklikcaption" style="color: #fff; margin-top: 10px;"></div>
							<span class="e_icon e_popup_close"><i class="ti-close"></i></span>
						</div>
					</div>
				</div>
			</section>
			
			
			<section class="e_section  e_relative">
				<div class="e_container clearfix container hide_mobile"><div class="e_col_fullwidth"><div class="e_col">
					<div class="widget aegis_widget e_adv  e_widget_first "><div class="widget-content clearfix "><a href="javascript:void(0)"  class="jdlfotos selfotos"><img src="<?php echo base_url(); ?>data/banner_kos.jpg" alt="" class="img-responsive"></a><a href="javascript:void(0)" class="jdlfotos" last="" style="display:none;"><img src="<?php echo base_url(); ?>data/banner_ot.png" alt="" class="img-responsive"></a></div></div>
				</div></div></div>
			</section>
			<script>
				setInterval("rollfots()", 7500);
				function rollfots(){
					var actives = jQuery('a.selfotos');
					var next = actives.next();
					if(actives.attr('last')=='') 
						var next = jQuery('a.jdlfotos').first();
					else
						var next = actives.next();
					next.addClass('selfotos');
					actives.removeClass('selfotos');
					actives.hide();
					next.show();
				}
			</script>
		</div>		
		<div id="e_site_footer" class="e_style_01">
			<div class="e_top" style="padding: 20px 20px 0 20px;">
				<div class="e_container clearfix container">
					<div class="row">
						<div id="e_sidebar_footer_01" role="complementary" class="e_sidebar clearfix col-xs-12 col-lg-4 col-md-4 col-sm-12">
							<div class="widget e_custom_widget_01 e_widget_contact_information enliven-widget-order-0 enliven-widget-first enliven-widget-last" style="margin-bottom: 0">
								<a href="<?php echo base_url(); ?>view/direct/balai"><header class="e_widget_title e_style_05"><h3 class="e_title">Kontak Kami</h3></header></a>
								<div class="widget-content clearfix">
									<ul class="e_list e_style_01" style="margin: -10px 0;">
										<li style="margin-bottom: 0"><i class="e_icon fa fa-map-marker"></i>Jalan Percetakan Negara Nomor 23<br>Jakarta - 10560 - Indonesia <br/> <a href="<?php echo base_url(); ?>view/direct/balai" itemprop="url">Selengkapnya</a></li><br/>
										<li style="margin-bottom: 15px; padding-left: 0"><img src="<?php echo base_url(); ?>web/images/halobpom.png"></li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-phone"></i>+6221 4244691 / 42883309 / 42883462</li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-fax"></i>+6221 4263333</li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-mobile"></i>+6281 21 9999 533 (SMS)</li>
										<li style="margin-bottom: 0px"><i class="e_icon fa fa-envelope"></i><a href="mailto:ppid@pom.go.id">ppid@pom.go.id</a>;&nbsp;&nbsp;<a href="mailto:halobpom@pom.go.id">halobpom@pom.go.id</a><br><a href="mailto:pengaduanyanblik@pom.go.id">pengaduanyanblik@pom.go.id</a></li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-twitter"></i><a href="https://twitter.com/bpom_ri">@bpom_ri</a></li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-facebook"></i><a href="https://www.facebook.com/BadanPengawasObatdanMakananRI">Badan POM</a></li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-instagram"></i><a href="https://www.instagram.com/bpom_ri/">@bpom_ri</a></li>
										<li style="margin-bottom: 0"><i class="e_icon fa fa-youtube"></i><a href="https://www.youtube.com/channel/UCO5Oi2m_M-uQhTaKDyGA0nA">Badan POM RI</a></li><br/>
									</ul>
								</div>
							</div>
						</div>
						<div id="e_sidebar_footer_02" role="complementary" class="e_sidebar clearfix col-xs-12 col-lg-4 col-md-4 col-sm-12">
							<div class="widget e_custom_widget_01 e_widget_tweets_list enliven-widget-order-0 enliven-widget-first enliven-widget-last">
								<header class="e_widget_title e_style_05"><h3 class="e_title">Statistik Pengunjung</h3></header>
								<div class="widget-content clearfix">
									<div class="e_block e_first" style="margin-top: -10px;"><i class="e_icon fa fa-user"></i><p class="e_content">84 User</p><p class="e_meta"><a href="javascript:void(0)">Sedang Online Saat Ini</a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content">4208 User</p><p class="e_meta"><a href="javascript:void(0)">Pengunjung Hari Ini</a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content"> 1594839 User</p><p class="e_meta"><a href="javascript:void(0)">Total Pengunjung Tahun 2017</a></p></div>
									<div class="e_block" style="margin-top: -10px;"><i class="e_icon fa fa-users"></i><p class="e_content">7827308 User</p><p class="e_meta"><a href="javascript:void(0)">Total Pengunjung Sejak 2013</a></p></div>
									<!-- <a href="javascript:void(0)"><img src="http://s01.flagcounter.com/count/x49Q/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_15/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" border="0"></a>-->
								</div>
							</div>
						</div>
						<div id="e_sidebar_footer_03" role="complementary" class="e_sidebar clearfix col-xs-12 col-lg-4 col-md-4 col-sm-12">
							<div class="widget e_custom_widget_01 e_widget_posts_with_small_thumb enliven-widget-order-0 enliven-widget-first enliven-widget-last" style="margin-bottom: 0">
								<header class="e_widget_title e_style_05"><h3 class="e_title">Polling</h3></header>
								<div class="widget-content clearfix">
									<p id="ppolling" style="margin-top: -10px;">Bagaimana pendapat Anda tentang tampilan dan konten website Badan POM?<br>
										<a href="javascript:void(0)"><img src="<?php echo base_url(); ?>web/images/star_gray.png" class="a1" /><img src="<?php echo base_url(); ?>web/images/star_gray.png" class="a2" /><img src="<?php echo base_url(); ?>web/images/star_gray.png" class="a3" /><img src="<?php echo base_url(); ?>web/images/star_gray.png" class="a4" /><img src="<?php echo base_url(); ?>web/images/star_gray.png" class="a5" /></a>
									</p>
									<p>Hasil Polling<br>
									<span id="urpolling"><small class="blue_me">Loading..<br> <br> <br> <br></small></span>
									</p>
									<p>Masukan Anda terhadap website Badan POM</p>
									<p style="margin-top: -10px;"><form method="post" action="<?php echo base_url(); ?>front/freepolling" id="submit-form" class="search-form clearfix" style="padding-bottom: 10px"><input autocomplete="off" type="text" value="" name="masukkan" id="masukkan" class="text" style="width:75%"> &nbsp;<input type="submit" style="padding: 5px" value="KIRIM" name="kirim"></form><br>&nbsp;</p>
									<script>
										jQuery(document).ready(function($){
											setTimeout(function(){
												$.get('<?php echo base_url(); ?>front/polling/get/2', function(pollingdata){
													if(pollingdata!='') $('#urpolling').html(pollingdata);
												});
											}, 3000);
											$('#ppolling img').mouseover(function(){
												var clsimg = $(this).attr('class');
												var intclsimg = parseInt(clsimg.substr(1, 1));
												for(i=1;i<6;i++){
													if(i<=intclsimg){
														$('#ppolling img.a' + i).attr('src', '<?php echo base_url(); ?>web/images/star.png');
													}else{
														$('#ppolling img.a' + i).attr('src', '<?php echo base_url(); ?>web/images/star_gray.png');
													}
												}
											});
											$('#ppolling img').click(function(){
												var clsimg = $(this).attr('class');
												var intclsimg = parseInt(clsimg.substr(1, 1));
												$.get('<?php echo base_url(); ?>front/polling/set/2/' + intclsimg, function(hasilpolling){
													alert(hasilpolling);
												});
											});
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="e_bottom" style="padding: 7px; background: #1977a5">
				<div class="e_container clearfix container">
					<div class="row">
						<div class="col-md-6 e_left" style="color: white">&copy 2016 - BADAN PENGAWAS OBAT DAN MAKANAN REPUBLIK INDONESIA</div>
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