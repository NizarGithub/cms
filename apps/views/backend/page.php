<!doctype html>
<html class="fixed <?php echo ($this->session->userdata('bpom_ppid_logged_in')) ? '' : 'sidebar-left-collapsed'; ?>">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title><?php echo $this->config->item('app_title_prefix') . ' | ' . $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/logo-bpom.png"); ?>"/>
		
		<meta name="keywords" content="PPID, BPOM" />
		<meta name="description" content="PPID Badan Pengawas Obat dan Makanan">
		<meta name="author" content="bpom">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<link rel="stylesheet" href="<?php echo base_url("assets/libs/colorbox"); ?>/colorbox.css">

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/owl-carousel/owl.carousel.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/owl-carousel/owl.theme.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<link href='<?php echo base_url() . "assets/libs/jquery.plupload.queue/css/jquery.plupload.queue.css"; ?>' rel='stylesheet'>
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/theme-custom.css">
		
		<script>
		var $baseUrl = "<?php echo base_url(); ?>";
		var $contentUrl = "<?php echo $this->session->userdata('bpom_ppid_content_url'); ?>";
		var $currUrl = "<?php echo (current_url() == base_url()) ? base_url("dashboard") : current_url(); ?>";
		</script>
		
		<!-- Head Libs -->
		<script src="<?php echo base_url("assets/libs/porto"); ?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo base_url("assets/libs/mixed"); ?>/json2.js"></script>
		<script src="<?php echo base_url("assets/libs/require/require.js"); ?>"></script>
	</head>
	<body class="loading-overlay-showing" data-loading-overlay data-loading-overlay-options='{ "css": { "opacity": 0.5 } }'>
		<span class="loading-overlay dark">
			<span class="loader white"></span>
		</span> 
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url(); ?>" class="logo">
						<span class="hidden-xs alternative-font" style="font-size: 25px;"><?php echo $this->config->item('app_name'); ?></span>
						<span class="visible-xs" style="font-size: 15px;"><?php echo $this->config->item('app_title_prefix'); ?></span>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<!-- <form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form> -->

					<span class="separator"></span>
					
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<?php if ($this->session->userdata('bpom_ppid_logged_in')): ?>
							<figure class="profile-picture">
								<img src="<?php echo base_url("assets/libs/porto/images/!logged-user.jpg"); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo base_url("assets/libs/porto/images/!logged-user.jpg"); ?>" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php echo $this->session->userdata('bpom_ppid_nama'); ?></span>
								<span class="role"><?php echo $this->session->userdata('bpom_ppid_level'); ?> </span>
							</div>
							<?php else: ?>
							<div class="profile-info">
								<span class="name">Member Area</span>
								<span class="role">Login untuk mengakses sistem</span>
							</div>
							<?php endif; ?>
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<?php if ($this->session->userdata('bpom_ppid_logged_in')): ?>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url() . "logout"; ?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>
								<?php else: ?>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url() . "login"; ?>"><i class="fa fa-user"></i> Sign In</a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
					
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<?php if ($this->session->userdata('bpom_ppid_logged_in')): ?>
									<li class="">
										<a href="<?php echo base_url("backend/dashboard"); ?>">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li class="">
										<a href="<?php echo base_url("backend/staticpages"); ?>">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<span>Static Pages</span>
										</a>
									</li>
									<li class="">
										<a href="<?php echo base_url("backend/menu"); ?>">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Menu</span>
										</a>
									</li>
									<li class="">
										<a href="<?php echo base_url("backend/gallery"); ?>">
											<i class="fa fa-file-image-o" aria-hidden="true"></i>
											<span>Gallery</span>
										</a>
									</li>
									<?php endif; ?>
									<!-- <li class="">
										<a href="index.html">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											<span>Help</span>
										</a>
									</li> -->
									
								</ul>
							</nav>
						</div>
				
					</div>
					
					<div class="sidebar-footer">
						<p class="text-muted mt-md mb-md"><?php echo $this->config->item('app_copyright'); ?> <a href="<?php echo $this->config->item('site_url'); ?>" style="white-space: normal;"><?php echo $this->config->item('site_name'); ?></a>. All rights reserved.</p>
					</div>
									
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<?php echo $this->load->view($page); ?>
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<!-- <h6>Upcoming Tasks</h6> -->
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<!-- <ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</aside>
		</section>
		
	</body>
</html>