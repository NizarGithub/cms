<!doctype html>
<html class="fixed">
	<head>
		<title><?php echo $this->config->item('app_title_prefix') . ' | ' . $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/bps.ico"); ?>"/>
		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="Survei Harga Pedesaan" />
		<meta name="description" content="SHPED - Survei Harga Pedesaan">
		<meta name="author" content="danukidd">
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/vendor/pnotify/pnotify.custom.css" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url("assets/libs/porto"); ?>/stylesheets/theme-custom.css">

		<script>
		var $baseUrl = "<?php echo base_url(); ?>";
		var $currUrl = "<?php echo (current_url() == base_url()) ? base_url("home") : current_url(); ?>";
		</script>
		
		<!-- Head Libs -->
		<script src="<?php echo base_url("assets/libs/porto"); ?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo base_url("assets/libs/require/require.js"); ?>"></script>
	</head>
	<body class="loading-overlay-showing" data-loading-overlay>
		<span class="loading-overlay light">
			<span class="loader black"></span>
		</span> 
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<a href="javascript:void(0)" class="pull-left">
							<span style="font-size: 15px;"><?php echo $this->config->item('app_name'); ?></span>
						</a>
						<h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay data-loading-overlay-options='{ "css": { "backgroundColor": "#0088cc", "opacity": 0.5 } }'>
						<form id="frm-login" data-action="<?php echo base_url(); ?>login" method="post" data-redirect="<?php echo isset($data_redirect) ? $data_redirect : ""; ?>">
							<div class="form-group mb-lg">
								<label class="control-label">Username</label>
								<div class="input-group input-group-icon">
									<input id="username" name="username" type="text" class="form-control input-lg" required autofocus/>
									<input id="seccode" name="seccode" type="hidden" value="<?php echo $seccode; ?>"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left control-label">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input id="password" name="password" type="password" class="form-control input-lg" required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md"><?php echo $this->config->item('app_copyright'); ?> <a href="<?php echo $this->config->item('site_url'); ?>"><?php echo $this->config->item('site_name'); ?></a>. All rights reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<script>
			require(['./assets/js/common'], function (common) {
				require(['app/login']);
			});
		</script>
		
	</body>
</html>