<script>
	var kabByProv = <?php echo json_encode($kabByProv); ?>;
	var dok = <?php echo json_encode($dok); ?>;
	var tahunNow = <?php echo date('Y'); ?>;
	var bulanNow = <?php echo date('m'); ?>;
	var wilUser = <?php echo json_encode($wilUser); ?>;
</script>
<header class="page-header">
	<h2>Survey Harga Produsen Perdesaan - HD</h2>

	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="<?php echo base_url("home"); ?>">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li><span>Entri Harga Produsen Perdesaan</span></li>
		</ol>

		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
</header>
<!-- start: page -->
<div class="row">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				</div>

				<h2 class="panel-title">Daftar Kecamatan</h2>
				<p class="panel-subtitle">Silahkan pilih Tahun, Bulan, Provinsi, dan Kabupaten terlebih dahulu.</p>
			</header>
			<div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
				<div class="row">
					<div class="col-md-12">
						<form id="frm-hd" class="form-horizontal" action="#">
							<div class="form-group">
								<label class="col-md-2 control-label">Tahun</label>
								<div class="col-md-3">
									<select id="tahun" name="tahun" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih...", "allowClear": true }' required>
										<option value=""></option>
										<?php foreach ($tahun as $t): ?>
										<option value="<?php echo $t->Tahun; ?>"><?php echo $t->Tahun; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Bulan</label>
								<div class="col-md-3">
									<select id="bulan" name="bulan" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih...", "allowClear": true }' required>
										<option value=""></option>
										<?php foreach ($bulan as $b): ?>
										<option value="<?php echo $b->IdBulan; ?>"><?php echo "[$b->IdBulan] $b->Deskripsi"; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Provinsi</label>
								<div class="col-md-4">
									<select id="prov" name="prov" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih...", "allowClear": true }' required>
										<option value=""></option>
										<?php foreach ($prov as $p): ?>
										<option value="<?php echo $p->KodeProv; ?>"><?php echo "[$p->KodeProv] $p->NamaProv"; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Kabupaten</label>
								<div class="col-md-4">
									<select id="kab" name="kab" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih...", "allowClear": true }' required>
										<option value=""></option>
									</select>
								</div>
								<div class="col-md-2">
									<button id="refresh" class="btn btn-default hidden-xs" type="submit"><i class="fa fa-refresh"></i> Refresh</button>
									<button id="refresh" class="btn btn-default btn-block visible-xs mt-lg mb-lg" type="submit"><i class="fa fa-refresh"></i> Refresh</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="tabel-list" class="table table-striped table-hover">
								<thead>
									<tr>
										<th rowspan="2">
											 No.
										</th>
										<th rowspan="2">
											 Kecamatan
										</th>
										<th colspan="<?php echo count($dok); ?>">
											 Status
										</th>
										<th rowspan="2">
											 Action
										</th>
									</tr>
									<tr>
									<?php foreach ($dok as $d): ?>
										<th>
											<?php echo $d->Tipe; ?>
										</th>
									<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>					
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				Keterangan: C (Clean); E (Error); B (Belum Entri); - (Tidak Memiliki Dokumen)
			</div>
		</section>
	</div>
</div>
<div id="dokHD" class="modal-block modal-block-full mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title title-dok">SURVEI HARGA PRODUSEN PERDESAAN</h2>
		</header>
		<div class="panel-body dokumen">
			<div class="scrollable visible-slider colored-slider" style="min-height: 435px;">
				<div class="scrollable-content">
					<form id="formHD" class="form-horizontal form-bordered" novalidate="novalidate">
						<div class="tabs tabs-primary">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#page1" data-toggle="tab">Blok I - II</a>
								</li>
								<li>
									<a id="nav-page2" href="#page2" data-toggle="tab">Blok III</a>
								</li>
								<li>
									<a href="#page3" data-toggle="tab" class="active-add">Blok IV</a>
								</li>
								<li>
									<a href="#page4" data-toggle="tab" class="active-add">Blok V</a>
								</li>
								<li>
									<a href="#page5" data-toggle="tab" class="active-add">Upah</a>
								</li>
								<li>
									<a href="#page6" data-toggle="tab">Blok VI - VII</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="page1" class="tab-pane active">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">I. PENGENALAN TEMPAT DAN PERIODE PENCACAHAN</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<tbody>
																<tr>
																	<td><label class="control-label">1. Bulan & Tahun</label></td>
																	<td><label id="NamaBulan" name="NamaBulan" class="control-label">[Bulan]</label></td>
																	<td>
																		<div class="col-md-4 pull-right">
																			<input id="Tahun" name="Tahun" class="form-control right" type="text" readonly="readonly">
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><label class="control-label">2. Provinsi</label></td>
																	<td><label id="NamaProv" name="NamaProv" class="control-label">[Nama Provinsi]</label></td>
																	<td>
																		<div class="col-md-3 pull-right">
																			<input id="KodeProv" name="KodeProv" class="form-control right" type="text" readonly="readonly">
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><label class="control-label">3. Kabupaten</label></td>
																	<td><label id="NamaKab" name="NamaKab" class="control-label">[Nama Kabupaten]</label></td>
																	<td>
																		<div class="col-md-3 pull-right">
																			<input id="KodeKab" name="KodeKab" class="form-control right" type="text" readonly="readonly">
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><label class="control-label">4. Kecamatan</label></td>
																	<td><label id="NamaKec" name="NamaKec" class="control-label">[Nama Kecamatan]</label></td>
																	<td>
																		<div class="col-md-3 pull-right">
																			<input id="KodeKec" name="KodeKec" class="form-control right" type="text" readonly="readonly">
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">II. KETERANGAN PETUGAS</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<th>RINCIAN</th>
																	<th>PENCACAH</th>
																	<th>PEMERIKSA</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><label class="control-label">1. Nama</label></td>
																	<td>
																		<div class="col-md-12">
																			<input id="NamaPencacah" name="NamaPencacah" class="form-control" type="text" readonly="readonly">
																		</div>
																	</td>
																	<td>
																		<div class="col-md-12">
																			<input id="NamaPemeriksa" name="NamaPemeriksa" class="form-control" type="text" readonly="readonly">
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><label class="control-label">2. NIP</label></td>
																	<td>
																		<div class="col-md-12">
																			<input id="KodePencacah" name="KodePencacah" class="form-control" type="text">
																			<!--<select id="KodePencacah" name="KodePencacah" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "allowClear": true }'>
																				<option value=""></option>
																			</select>-->
																		</div>
																	</td>
																	<td>
																		<div class="col-md-12">
																			<input id="KodePemeriksa" name="KodePemeriksa" class="form-control" type="text">
																			<!--<select id="KodePemeriksa" name="KodePemeriksa" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "allowClear": true }'>
																				<option value=""></option>
																			</select>-->
																		</div>
																	</td>
																</tr>
																<tr>
																	<td><label class="control-label">3. Tanggal</label></td>
																	<td>
																		<div class="col-md-6">
																			<div class="input-group">
																				<span class="input-group-addon">
																					<i class="fa fa-calendar"></i>
																				</span>
																				<input id="TglCacah" name="TglCacah" type="text" data-plugin-datepicker data-plugin-options='{ "format": "dd/mm/yyyy", "autoclose": true }' class="form-control">
																			</div>
																		</div>
																	</td>
																	<td>
																		<div class="col-md-6">
																			<div class="input-group">
																				<span class="input-group-addon">
																					<i class="fa fa-calendar"></i>
																				</span>
																				<input id="TglPeriksa" name="TglPeriksa" type="text" data-plugin-datepicker data-plugin-options='{ "format": "dd/mm/yyyy", "autoclose": true }' class="form-control">
																			</div>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
								<div id="page2" class="tab-pane">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">III. RINGKASAN KOMODITAS YANG MENGALAMI PERUBAHAN HARGA</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table id="ringkasan" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<th>Nama Barang/Jasa</th><th>Kualitas</th><th>Satuan</th><th>Kode Kualitas</th>
																	<th>Harga Bulan Pencacahan (Rp)</th><th>Harga Bulan Sebelumnya (Rp)</th>
																</tr>												
																<tr>
																	<th>(1)</th><th>(2)</th><th>(3)</th><th>(4)</th>
																	<th>(5)</th><th>(6)</th>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
														</table>
													</div>
												</div>
												<div class="panel-footer">
													Alamat e-mail : shped_surat@bps.go.id, hperdesaan@yahoo.com
												</div>
											</section>
										</div>
									</div>
								</div>
								<div id="page3" class="tab-pane">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">IV. HARGA YANG DITERIMA PETANI</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table id="blok4" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<th>Nama Barang/Jasa</th><th>Kualitas</th><th>Satuan</th><th>Kode Kualitas</th>
																	<th>Harga Bulan Pencacahan (Rp)</th><th>Harga Bulan Sebelumnya (Rp)</th>
																	<th>Perubahan (%)</th>
																	<th rowspan="2"></th>
																</tr>												
																<tr>
																	<th>(1)</th><th>(2)</th><th>(3)</th><th>(4)</th>
																	<th>(5)</th><th>(6)</th><th>(7)</th>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
								<div id="page4" class="tab-pane">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">V. HARGA YANG DIBAYAR PETANI</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table id="blok5" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<th>Nama Barang/Jasa</th><th>Kualitas</th><th>Satuan</th><th>Kode Kualitas</th>
																	<th>Harga Bulan Pencacahan (Rp)</th><th>Harga Bulan Sebelumnya (Rp)</th>
																	<th>Perubahan (%)</th>
																	<th rowspan="2"></th>
																</tr>												
																<tr>
																	<th>(1)</th><th>(2)</th><th>(3)</th><th>(4)</th>
																	<th>(5)</th><th>(6)</th><th>(7)</th>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
								<div id="page5" class="tab-pane">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">UPAH BULAN PENCACAHAN (Rp)</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table id="blokUpah" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<th rowspan="2" style="vertical-align: middle">Nama Barang/Jasa</th>
																	<th rowspan="2" style="vertical-align: middle">Kualitas</th>
																	<th rowspan="2" style="vertical-align: middle">Satuan</th>
																	<th rowspan="2" style="vertical-align: middle">Kode</th>
																	<th colspan="4">Upah Bulan Pencacahan (Rp)</th>
																	<th rowspan="2" style="vertical-align: middle">Upah Bulan Sebelumnya (Rp)</th>
																	<th rowspan="2" style="vertical-align: middle">Perubahan (%)</th>
																	<th rowspan="3"></th>
																</tr>		
																<tr>
																	<th style="vertical-align: middle">Berupa Uang (101)</th>
																	<th style="vertical-align: middle">Makan + Minum + Rokok (102)</th>
																	<th style="vertical-align: middle">Lainnya (103)</th>
																	<th style="vertical-align: middle">Jumlah (104)</th>
																</tr>												
																<tr>
																	<th>(1)</th><th>(2)</th>
																	<th>(3)</th><th>(4)</th>
																	<th>(5)</th><th>(6)</th>
																	<th>(7)</th><th>(8)</th>
																	<th>(9)</th><th>(10)</th>
																</tr>
															</thead>
															<tbody>
																
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
								<div id="page6" class="tab-pane">
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">VI. KETERANGAN RESPONDEN / PETANI</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<div class="table-responsive">
														<table id="blokResponden" class="table table-striped table-bordered table-hover" style="margin-bottom:0px;">
															<thead>
																<tr>
																	<!-- <th>AKSI</th> -->
																	<th>NAMA RESPONDEN</th>
																	<th>NAMA DESA</th>
																	<th>JENIS BARANG/KOMODITAS YANG DIHASILKAN</th>
																</tr>
																<tr>
																	<th>(1)</th>
																	<th>(2)</th>
																	<th>(3)</th>
																	<!-- <th>(4)</th> -->
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<textarea id="NamaResponden" name="NamaResponden" class="editor-text" rows="10"></textarea>
																	</td>
																	<td>
																		<textarea id="NamaDesa" name="NamaDesa" class="editor-text" rows="10"></textarea>
																	</td>
																	<td>
																		<textarea id="JenisKomoditas" name="JenisKomoditas" class="editor-text" rows="10"></textarea>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</section>
										</div>
										<!-- <div class="col-md-12">
											<button id="add-responden" class="mb-sm btn btn-warning btn-block frmresponden_open" type="button">Tambah Responden/Petani</button>
										</div> -->
									</div>
									<div class="row">
										<div class="col-md-12">
											<section class="panel panel-success">
												<header class="panel-heading">
													<h2 class="panel-title">VII. CATATAN</h2>
												</header>
												<div class="panel-body" style="padding:0px;">
													<textarea id="Catatan" name="Catatan" class="editor-text" rows="10"></textarea>
												</div>
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12">
					<button id="add-kualitas" class="btn btn-success frmkualitas_open"><i class="fa fa-plus"></i>&nbsp;Kualitas</button>
					<span id="StatusDok" class="" style="margin-left: 5px; font-weight: bold; font-size: 1.1em;"></span>
					<button class="ml-sm btn btn-default pull-right closeconfirm_open"><i class="fa fa-sign-out"></i>&nbsp;Keluar</button>
					<button id="btnSimpan" class="btn btn-primary modal-confirm pull-right"><i class="fa fa-save"></i>&nbsp;Simpan</button>
				</div>
			</div>
		</footer>
	</section>
</div>
<div id="frmkualitas" class="well" style="width: 90%;">
    <h3 id="title">Tambah Kualitas</h3>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div id="msg-error" class="alert alert-danger" style="display:none;">
			</div>
			<div id="msg-success" class="alert alert-success" style="display:none;">
			</div>
			<div class="table-responsive">
				<table id="table-blok" class="table" style="margin-bottom:0px; display: none;">
					<thead>
						<tr>
							<th>Kualitas, Nama Barang/Jasa</th><th>Satuan</th>
							<th>Harga Bulan Pencacahan (Rp)</th><th>Harga Bulan Sebelumnya (Rp)</th>
						</tr>												
						<tr>
							<th>(1)</th><th>(2)</th><th>(3)</th><th>(4)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="col-md-12">
								<select id="t-kualitas" data-plugin-selectTwo class="form-control populate placeholder select-kualitas" data-plugin-options='{ "placeholder": "Pilih Kode/Nama Kualitas, Nama Barang/Jasa ...", "allowClear": true }'>
									<option value=""></option>
								</select>
								</div>
							</td>
							<td id="t-satuan"></td>
							<td><div class="col-md-12"><input id="Harga-Add" name="Harga-Add" class="form-control right rupiah" type="text" value=""></div></td>
							<td><div class="col-md-12"><input id="HargaPrev-Add" name="HargaPrev-Add" class="form-control right rupiah" type="text" value=""></div></td>
						</tr>
					</tbody>
				</table>
				<table id="table-upah" class="table" style="margin-bottom:0px; display: none;">
					<thead>
						<tr>
							<th rowspan="2" style="vertical-align: middle">Kualitas, Nama Barang/Jasa</th>
							<th rowspan="2" style="vertical-align: middle">Satuan</th>
							<th colspan="4">Upah Bulan Pencacahan (Rp)</th>
							<th rowspan="2" style="vertical-align: middle">Upah Bulan Sebelumnya (Rp)</th>
						</tr>		
						<tr>
							<th style="vertical-align: middle">Berupa Uang (101)</th>
							<th style="vertical-align: middle">Makan + Minum + Rokok (102)</th>
							<th style="vertical-align: middle">Lainnya (103)</th>
							<th style="vertical-align: middle">Jumlah (104)</th>
						</tr>												
						<tr>
							<th>(1)</th><th>(2)</th>
							<th>(3)</th><th>(4)</th>
							<th>(5)</th><th>(6)</th>
							<th>(7)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="col-md-12">
								<select id="t-kualitas-upah" data-plugin-selectTwo class="form-control populate placeholder select-kualitas" data-plugin-options='{ "placeholder": "Pilih Kode/Nama Kualitas ...", "allowClear": true }'>
									<option value=""></option>
								</select>
								</div>
							</td>
							<td id="t-satuan-upah"></td>
							<td><div class="col-md-12"><input id="Harga101-Add" name="Harga101-Add" class="form-control right rupiah" type="text" value=""></div></td>
							<td><div class="col-md-12"><input id="Harga102-Add" name="Harga102-Add" class="form-control right rupiah" type="text" value=""></div></td>
							<td><div class="col-md-12"><input id="Harga103-Add" name="Harga103-Add" class="form-control right rupiah" type="text" value=""></div></td>
							<td><div class="col-md-12"><input id="Harga104-Add" name="Harga104-Add" class="form-control right rupiah" type="text" value=""></div></td>
							<td><div class="col-md-12"><input id="HargaPrev104-Add" name="HargaPrev104-Add" class="form-control right rupiah" type="text" value=""></div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row mt-lg">
		<div class="col-md-12 text-center">
			<button id="tambah-kualitas" class="btn btn-success mr-sm"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
			<button class="frmkualitas_close btn btn-danger"><i class="fa fa-close"></i>&nbsp;Keluar</button>
		</div>
	</div>
</div>
<div id="frmresponden" class="well" style="width: 90%;">
    <h3 id="title">Tambah Responden</h3>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<div id="msg-error-responden" class="alert alert-danger" style="display:none;">
			</div>
			<div id="msg-success-responden" class="alert alert-success" style="display:none;">
			</div>
			<div class="table-responsive">
				<table id="table-responden" class="table" style="margin-bottom:0px;">
					<thead>
						<tr>
							<th>NAMA RESPONDEN</th>
							<th>NAMA DESA</th>
							<th>JENIS BARANG/KOMODITAS YANG DIHASILKAN</th>
						</tr>
						<tr>
							<th>(1)</th><th>(2)</th><th>(3)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="col-md-12">
								<input id="t-responden" name="t-responden" class="form-control" type="text">
								<!--<select id="t-responden" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih Nama Responden ...", "allowClear": true }'>
									<option value=""></option>
								</select>-->
								</div>
							</td>
							<td><div class="col-md-12"><input id="NamaDesa" name="NamaDesa" class="form-control" type="text" readonly="readonly"></div></td>
							<td>
								<div class="col-md-12">
								<select id="t-responden-kualitas" multiple data-plugin-selectTwo class="form-control populate">
									
								</select>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row mt-lg">
		<div class="col-md-12 text-center">
			<button id="tambah-responden" class="btn btn-success mr-sm"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
			<button class="frmresponden_close btn btn-danger"><i class="fa fa-close"></i>&nbsp;Keluar</button>
		</div>
	</div>
</div>
<div id="closeconfirm" class="well">
    <h5>Data yang Anda ubah tidak akan disimpan. Apakah Anda yakin akan keluar dari form entri?</h5>
	<hr/>
	<div class="text-right">
    <button id="closeok" class="btn btn-default mr-sm" style><i class="fa fa-check"></i> Ya</button>
    <button class="closeconfirm_close btn btn-default"><i class="fa fa-times"></i> Tidak</button>
	</div>
</div>
<div id="confirmDel" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Konfirmasi Hapus Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-icon">
					<i class="fa fa-question-circle"></i>
				</div>
				<div class="modal-text">
					<p>Apakah Anda yakin akan menghapus data ini?</p>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary modal-confirm-del">Ya</button>
					<button class="btn btn-default modal-dismiss-del">Tidak</button>
				</div>
			</div>
		</footer>
	</section>
</div>
<!-- end: page -->
<script>
	require(['../assets/js/common'], function (common) {
		require(['app/hd']);
	});
</script>