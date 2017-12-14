<script>
	var groupByDok = <?php echo json_encode($groupByDok); ?>;
	var komByGroup = <?php echo json_encode($komByGroup); ?>;
	var wilUser = <?php echo json_encode($wilUser); ?>;
	var userLevel = <?php echo json_encode($userLevel); ?>;
</script>
<header class="page-header">
	<h2>Master Kualitas</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Kelola Kualitas</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>

<!-- start: page -->
<div class="row page-kualitas">
	<div class="col-md-12">
		<section class="panel panel-featured">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				</div>

				<h2 class="panel-title">Daftar Kualitas</h2>
				<p class="panel-subtitle">Manage kualitas berdasarkan komoditas.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row">
					<div class="col-md-12">
						<form id="frm-kualitas" class="form-horizontal" action="#">
							<div class="form-group">
								<label class="col-md-2 control-label">Dokumen</label>
								<div class="col-md-6">
									<select id="dok" name="dok" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<option value="">- Pilih -</option>
										<?php foreach ($dok as $d): ?>
										<option value="<?php echo $d['IdDok']; ?>"><?php echo "[" . $d['Tipe'] . "] " . $d['Deskripsi']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kelompok</label>
								<div class="col-md-6">
									<select id="group" name="group" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<option value="">- Pilih -</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Komoditas</label>
								<div class="col-md-6">
									<select id="kom" name="kom" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<option value="">- ALL -</option>
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
				<div class="row">
					<div class="col-md-6">
					</div>
					<?php if(in_array($this->session->userdata('shped_level'), array(1,2,3,4,5,7,8))): ?>
					<div class="col-md-6">
						<button id="add-kualitas" class="mb-lg btn btn-primary pull-right" type="button"><i class="fa fa-plus"></i> Tambah Kualitas</button>
					</div>
					<?php endif; ?>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="tabel-list" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th><th>Kode</th><th>Nama</th><th>Satuan</th><th>Komoditas</th><th>Status Kualitas</th><th>Status Persetujuan</th><th>Dibuat Oleh</th><th>Disetujui Oleh</th>
										<?php if(in_array($this->session->userdata('shped_level'), array(1,2,3,4,5,7,8))): ?>
										<th>Aksi</th>
										<?php endif; ?>
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
<div id="tambah-kualitas" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="edit-kualitas" class="form-horizontal" action="#" data-action="add">
		<header class="panel-heading">
			<h2 class="panel-title">TAMBAH KUALITAS</h2>
		</header>
		<div class="panel-body" id="LoadingOverlayKualitas" data-loading-overlay>
			<div class="form-group mt-sm">
				<label class="col-sm-3 control-label">Dokumen</label>
				<div class="col-sm-9">
					<select id="KodeDok" name="KodeDok" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='' required>
						<option value="">- Pilih -</option>
						<?php foreach ($dok as $d): ?>
						<option value="<?php echo $d['IdDok']; ?>"><?php echo "[" . $d['Tipe'] . "] " . $d['Deskripsi']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kelompok</label>
				<div class="col-sm-9">
					<select id="KodeGroup" name="KodeGroup" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='' required>
						<option value="">- Pilih -</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Komoditas</label>
				<div class="col-sm-9">
					<select id="IdKom" name="IdKom" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
						<option value="">- Pilih -</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kode</label>
                                <div class="col-sm-3">
                                    <input type="text" id="IdKomoditas" name="IdKomoditas" class="form-control simpan"  maxlength="5" data-plugin-maxlength="" readonly="true"/>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="NmrKualitas" name="NmrKualitas" class="form-control simpan"  maxlength="3" data-plugin-maxlength="" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" id="NamaKualitas" name="NamaKualitas" class="form-control simpan" placeholder="" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Satuan</label>
				<div class="col-sm-9">
					<input type="text" id="Satuan" name="Satuan" class="form-control simpan" placeholder="" required/>
				</div>
			</div>
			<div class="form-group mb-lg">
				<label class="col-sm-3 control-label">Status Kualitas</label>
				<div class="col-sm-9">
					<select id="IsAktif" name="IsAktif" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
						<option value="1">Digunakan</option>
						<option value="0">Tidak Digunakan</option>
					</select>
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
		require(['app/master']);
	});
</script>