<script>
	var kabByProv = <?php echo json_encode($kabByProv); ?>;
</script>
<header class="page-header">
	<h2>Master Wilayah</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Kelola Wilayah</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>

<!-- start: page -->
<div class="row">
	<div class="col-md-12">
		<section class="panel panel-featured">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				</div>

				<h2 class="panel-title">Master Wilayah</h2>
				<p class="panel-subtitle">Daftar Provinsi, Kabupaten, dan Kecamatan.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row">
					<div class="col-md-4" id="prov-area">
						<h5 class="alternative-font">Provinsi</h5>
						<div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 290px;">
						<div class="scrollable-content">
						<?php if (count($prov) > 0): foreach($prov as $p):?>
						<div class="highlight list-item" data-id="<?php echo $p->KodeProv; ?>"><?php echo $p->NamaProv; ?></div>
						<?php endforeach; endif; ?>
						</div>
						</div>
					</div>
					<div class="col-md-4" id="kab-area">
						<h5 class="alternative-font">Kabupaten</h5>
					</div>
					<div class="col-md-4" id="kec-area">
						<h5 class="alternative-font">Kecamatan</h5>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- end: page -->

<script>
	require(['../assets/js/common'], function (common) {
		require(['app/master']);
	});
</script>