<script>
	var wilUser = <?php echo json_encode($wilUser); ?>;
</script>
<header class="page-header">
	<h2>Master Komoditas</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Kelola Komoditas</span></li>
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

				<h2 class="panel-title">Daftar Komoditas</h2>
				<p class="panel-subtitle">Daftar komoditas yang digunakan dalam dokumen.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<table class="table table-bordered table-striped mb-none" id="daftar-komoditas">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Kelompok</th>
							<th>Bagian</th>
							<th>Dokumen</th>
							<th>Perubahan Minimal (%)</th>
							<th>Perubahan Maksimal (%)</th>
							<?php if ($wilUser['prov'] == false): ?>
                            <th>Action</th>
                            <?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (count($komoditas) > 0): 
								foreach ($komoditas as $k):
						?>
							<tr>
								<td><?php echo $k['IdKom']; ?></td>
								<td><?php echo $k['KodeKom']; ?></td>
								<td><?php echo $k['NamaKom']; ?></td>
								<td><?php echo $k['DeskGroup']; ?></td>
								<td><?php echo $k['DeskSec']; ?></td>
								<td><?php echo $k['DeskDok']; ?></td>
								<td style="text-align: right"><?php echo $k['Minimal']; ?></td>
								<td style="text-align: right"><?php echo $k['Maksimal']; ?></td>
								<?php if ($wilUser['prov'] == false): ?>
	                            <td class="text-center" data-group="<?php echo $k['IdGroup']; ?>" data-nama="<?php echo $k['NamaKom']; ?>" data-kode="<?php echo $k['KodeKom']; ?>" data-id="<?php echo $k['IdKom']; ?>"><a class="on-default edit-k mr-xs" href="javascript:void(0)"><i class="fa fa-pencil"></i></a><a class="on-default text-danger del" href="javascript:void(0)" class="delete-row"><i class="fa fa-trash-o"></i></a></td>
	                            <?php endif; ?>
								
							</tr>
						<?php 	endforeach; 
							endif; 
						?>
					</tbody>
				</table>
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