<script>
	var kabByProv = <?php echo json_encode($kabByProv); ?>;
	var userProv = <?php echo json_encode($userProv); ?>;
	var userKab = <?php echo json_encode($userKab); ?>;
	var userLevel = <?php echo json_encode($userLevel); ?>;
	var wilUser = <?php echo json_encode($wilUser); ?>;
</script>
<header class="page-header">
	<h2>Master Operator</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Kelola Operator</span></li>
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

				<h2 class="panel-title">Daftar Operator</h2>
				<p class="panel-subtitle">Kelola operator berdasarkan wilayah kerja.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row">
					<div class="col-md-12">
						<form id="frm-operator" class="form-horizontal" action="#">
							<div class="form-group">
								<label class="col-md-2 control-label">Provinsi</label>
								<div class="col-md-4">
									<select id="prov" name="prov" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
										<?php if ($wilUser['prov'] == false): ?>
                                        <option value="">- Semua Provinsi -</option>
                                        <?php endif; ?>
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
										<option value="">- Semua Kabupaten -</option>
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
                                        <?php if(in_array($userLevel, array(1,2,4,5,7,8))){ ?>
					<div class="col-md-6">
						<button id="add-operator" class="mb-lg btn btn-primary pull-right" type="button"><i class="fa fa-plus"></i> Tambah Operator</button>
					</div>
                                        <?php } ?>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="tabel-list" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th><th>Wilayah</th><th>Username</th><th>Nama</th><th>Level</th><th>Status Aktif</th><?php if(in_array($this->session->userdata('shped_level'), array(1,2,3,4,5,7,8))): ?>
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
<div id="tambah-operator" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form id="edit-operator" class="form-horizontal" action="#" data-action="add">
		<header class="panel-heading">
			<h2 class="panel-title">TAMBAH OPERATOR</h2>
		</header>
		<div class="panel-body" id="LoadingOverlayOperator" data-loading-overlay>
                        <div class="form-group">
                                <label class="col-sm-3 control-label">Cek NIP</label>
                                <div class="col-sm-9 pull-right">
                                    <input type="text" id="input-nip" class="form-control" placeholder="Masukkan NIP">
                                    <span class="form-group btn"><button type="button" id="btn-sync" class="mb-xs mt-xs mr-xs btn btn-info">Synchronize</button></span>
                                    <i id="sync-loader" style="display: none" id="loader-update" class="fa fa-spinner fa-spin fa-2x fa-fw margin-bottom pull-right"></i>
                                </div>
                        </div>
                        <div class="form-group">
				<label class="col-sm-3 control-label">Jenis Akun</label>
				<div class="col-sm-9">
					<select id="IsSync" name="IsSync" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
                                                <option value="">- Pilih Akun-</option>
                                                <option value="1">Akun BPS</option>
						<option value="0">Akun Non-BPS/Mitra</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" id="Nama" name="Nama" class="form-control simpan" placeholder="" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Username</label>
				<div class="col-sm-9">
					<input type="text" id="Username" name="Username" class="form-control simpan" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" id="Password" name="Password" class="form-control simpan" required/>
				</div>
			</div>
                        <div class="form-group">
				<label class="col-sm-3 control-label">NIP Baru</label>
				<div class="col-sm-9">
					<input type="text" id="Nipbaru" name="Nipbaru" class="form-control simpan" placeholder="" />
				</div>
			</div>
                        <div class="form-group">
				<label class="col-sm-3 control-label">NIP Lama</label>
				<div class="col-sm-9">
					<input type="text" id="Niplama" name="Niplama" class="form-control simpan" placeholder="" />
				</div>
			</div>
                        <div class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<div class="col-sm-9">
					<input type="text" id="Satker" name="Satker" class="form-control simpan" placeholder="" />
				</div>
			</div>
                        <div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-9">
					<input type="text" id="Email" name="Email" class="form-control simpan" placeholder="" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Level</label>
				<div class="col-sm-9">
					<select id="Level" name="Level" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
						<option value="">- Pilih Level-</option>
					</select>
				</div>
			</div>
                        <div class="form-group mt-sm">
				<label class="col-sm-3 control-label">Provinsi</label>
				<div class="col-sm-9">
					<select id="KodeProv" name="KodeProv" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options=''>
						<option value="">- Pilih Provinsi-</option>
						<?php foreach ($prov as $p): ?>
						<option value="<?php echo $p->KodeProv; ?>"><?php echo "[$p->KodeProv] $p->NamaProv"; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Kabupaten</label>
				<div class="col-sm-9">
					<select id="KodeKab" name="KodeKab" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options=''>
						<option value="">- Pilih Kabupaten-</option>
					</select>
				</div>
			</div>
			<div class="form-group mb-lg">
				<label class="col-sm-3 control-label">Status Aktif</label>
				<div class="col-sm-9">
					<select id="IsAktif" name="IsAktif" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
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
		require(['app/masteroperator']);
	});
</script>