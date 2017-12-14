<script>
	var kabByProv = <?php echo json_encode($kabByProv); ?>;
</script>
<header class="page-header">
	<h2>Master Kecamatan - Kualitas</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Kelola Kecamatan - Kualitas</span></li>
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

				<h2 class="panel-title">Daftar Kecamatan - Kualitas</h2>
				<p class="panel-subtitle">Manage Kecamatan - Kualitas berdasarkan wilayah kerja.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row">
					<div class="col-md-12">
						<form id="frm-kecamatan-kualitas" class="form-horizontal" action="#">
							<div class="form-group">
								<label class="col-md-2 control-label">Provinsi</label>
								<div class="col-md-4">
									<select id="prov" name="prov" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<option value="">- Pilih -</option>
										<?php foreach ($prov as $p): ?>
										<option value="<?php echo $p->KodeProv; ?>"><?php echo "[$p->KodeProv] $p->NamaProv"; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kabupaten</label>
								<div class="col-md-4">
									<select id="kab" name="kab" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<option value="">- Pilih -</option>
									</select>
								</div>
								<div class="col-md-2">
									<button id="refresh" class="btn btn-default hidden-xs"><i class="fa fa-refresh"></i> Refresh</button>
									<button id="refresh" class="btn btn-default btn-block visible-xs mt-lg mb-lg"><i class="fa fa-refresh"></i> Refresh</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<hr>
				<!--<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<button id="add-kecamatan-kualitas" class="mb-lg btn btn-primary pull-right" type="button"><i class="fa fa-plus"></i> Tambah Kecamatan - Kualitas</button>
					</div>
				</div>-->	
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="tabel-list" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th><th>Kode</th><th>Deskripsi</th><th>Dokumen</th><th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>					
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div id="tambah-kecamatan-kualitas" class="modal-block modal-block-primary modal-block-full mfp-hide">
	<section class="panel">
		<form id="edit-kecamatan-kualitas" class="form-horizontal" action="#" data-action="add">
		<header class="panel-heading">
			<h2 class="panel-title">EDIT DOKUMEN - KUALITAS [#1]</h2>
		</header>
		<div class="panel-body" id="LoadingOverlayKecKualitas" data-loading-overlay>
			<div class="row">
				<div class="col-md-4" id="daftar-dok">
					<h4 class="">Jenis Dokumen <span id="jml-dok" class="label label-success va-middle pull-right"></span></h4>
					<div class="">
						<div class="">
						<?php if (count($dok) > 0): foreach($dok as $d): if($d->IdParent != null):?>
						<div class="highlight list-item" data-id="<?php echo $d->IdDok; ?>"><?php echo "[$d->Tipe] $d->Deskripsi"; ?></div>
						<?php endif; endforeach; endif; ?>
						</div>
					</div>
					<div>
						<button class="mb-xs mt-xs mr-xs btn btn-sm btn-danger" type="button" id="clear-dok">Clear</button>
						<button class="mb-xs mt-xs mr-xs btn btn-sm btn-default" type="button" id="selectall-dok">Select All</button>
					</div>
				</div>
				<div class="col-md-8">
					<h4 class="">Kualitas <span id="jml-kualitas" class="label label-success va-middle"></span></h4>
					<div class="form-group mt-sm">
						<label class="col-sm-2 control-label">Dokumen</label>
						<div class="col-sm-8">
							<select id="KodeDok" name="KodeDok" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='' required>
								<option value="">- Pilih -</option>
							</select>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-md-12">
							<table id="tabel-list-kualitas" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Komoditas</th><th>Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>					
						</div>
					</div>
					<div>
						<button class="mb-xs mt-xs mr-xs btn btn-sm btn-danger" type="button" id="clear-kualitas">Clear</button>
						<button class="mb-xs mt-xs mr-xs btn btn-sm btn-default" type="button" id="selectall-kualitas">Select All</button>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary mr-sm" type="submit">Simpan</button>
					<button class="btn btn-default closeconfirm_open">Keluar</button>
				</div>
			</div>
		</footer>
		</form>
	</section>
</div>
<div id="closeconfirm" class="well">
    <h5>Data yang Anda ubah tidak akan disimpan.<br/>Apakah Anda yakin akan keluar dari form ini?</h5>
	<hr/>
	<div class="text-right">
    <button id="closeok" class="btn btn-default mr-sm" style><i class="fa fa-check"></i> Ya</button>
    <button class="closeconfirm_close btn btn-default"><i class="fa fa-times"></i> Tidak</button>
	</div>
</div>
<!-- end: page -->

<script>
	require(['../assets/js/common'], function (common) {
		require(['app/masterkeckualitas']);
	});
</script>