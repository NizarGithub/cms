<script>
</script>
<header class="page-header">
	<h2>Login</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("backend/dashboard"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Login</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>

<!-- start: page -->
<section class="body-sign" id="LoadingOverlayApi" data-loading-overlay>
	<div class="center-sign">
		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<!--<a href="javascript:void(0)" class="pull-left">
					<span style="font-size: 15px;"><?php echo $this->config->item('app_name'); ?></span>
				</a>-->
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

		<!--<p class="text-center text-muted mt-md mb-md"><?php echo $this->config->item('app_copyright'); ?> <a href="<?php echo $this->config->item('site_url'); ?>"><?php echo $this->config->item('site_name'); ?></a>. All rights reserved.</p>-->
	</div>
</section>
<!-- end: page -->

<script>
	require(['./assets/js/common'], function (common) {
		require(['app/login']);
	});
</script>