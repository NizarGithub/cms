<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/logo-bpom.png'); ?>"/>
		<title><?php echo $this->config->item('app_title_prefix') . (isset($title) && $title != '' ? ' | ' . $title : ''); ?></title>
		<link href="http://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/style.css'); ?>" />
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/jquery-1.7.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/jquery.dropotron-1.0.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/script.js'); ?>"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1><a href="#"><img src="<?php echo base_url('assets/frontend/images/ppid.png'); ?>" border="0" /></a></h1>
					
				</div>
			</div>
			<div id="menu">
				<?php echo isset($dataPage) ? $dataPage['menu'] : ''; ?>
			</div>
			<div id="page">
				<div id="content">
					<?php echo $this->load->view($page); ?>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<?php echo isset($dataPage) ? $dataPage['footer'] : ''; ?>
		</div>
	</body>
</html>