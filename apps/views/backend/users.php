<header class="page-header">
	<h2>Users</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("backend/dashboard"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Users</span></li>
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

				<h2 class="panel-title">Daftar User</h2>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row hide">
					<div class="col-md-12">
						<form id="frm-operator" class="form-horizontal" action="#">
							<div class="form-group">
								<div class="col-md-12">
									<button id="refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<hr class="hide">
				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<button id="add-operator" class="mb-lg btn btn-primary pull-right" type="button"><i class="fa fa-plus"></i> Tambah User</button>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="tabel-list" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No.</th><th>Username</th><th>Nama</th><th>Level</th><th>Status Aktif</th><th>Aksi</th>
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
				<label class="col-sm-3 control-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" id="realname" name="realname" class="form-control simpan" placeholder="" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Username</label>
				<div class="col-sm-9">
					<input type="text" id="username" name="username" class="form-control simpan" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" id="password" name="password" class="form-control simpan" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Level</label>
				<div class="col-sm-9">
					<select id="level" name="level" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
						<option value="">- Pilih Level-</option>
						<option value="administrator">Administrator</option>
						<option value="operator">Operator</option>
					</select>
				</div>
			</div>
			<div class="form-group mb-lg">
				<label class="col-sm-3 control-label">Status Aktif</label>
				<div class="col-sm-9">
					<select id="isaktif" name="isaktif" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
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
		require(['app/users']);
	});
</script>