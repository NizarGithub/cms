<script>
    var kabByProv = <?php echo json_encode($kabByProv); ?>;
    var tahunNow = 2015; //<?php echo date('Y'); ?>;
    var bulanNow = 01; //<?php echo date('m'); ?>;
</script>
<header class="page-header">
    <h2>Laporan</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("home"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Laporan</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-md-12">
        <section class="panel panel-featured panel-featured-success">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                </div>

                <h2 class="panel-title">Laporan</h2>
                <p class="panel-subtitle">Tabulasi laporan harga berdasarkan wilayah dan komoditas</p>
            </header>
            <div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs tabs-dark">
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#hd" data-toggle="tab" class="nav-progress" data-id="hd">Harga Perdesaan</a>
                                </li>
                                <li>
                                    <a href="#hkd" data-toggle="tab" class="nav-progress" data-id="hkd">Harga Konsumen Perdesaan</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="hd" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="frm-filter" class="" action="#" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Provinsi</label>
                                                            <select id="prov" name="prov" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                                <?php foreach ($prov as $p): ?>
                                                                    <option value="<?php echo $p->KodeProv; ?>"><?php echo "[$p->KodeProv] $p->NamaProv"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Tahun</label>
                                                            <select id="tahun" name="tahun" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($tahun as $t): ?>
                                                                    <option value="<?php echo $t->Tahun; ?>"><?php echo $t->Tahun; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Dokumen</label>
                                                            <select id="dok" name="dok" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($dokHD as $d): ?>
                                                                    <option value="<?php echo $d->IdDok; ?>"><?php echo "[$d->IdDok] $d->Deskripsi"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Kabupaten</label>
                                                            <select id="kab" name="kab" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Bulan</label>
                                                            <select id="bulan" name="bulan" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($bulan as $b): ?>
                                                                    <option value="<?php echo $b->IdBulan; ?>"><?php echo "[$b->IdBulan] $b->Deskripsi"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Komoditas</label>
                                                            <select id="kom" name="kom" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Kecamatan</label>
                                                            <select id="kec" name="kec" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div>
                                                </div>
                                                <button id="refresh-progress" class="btn btn-default btn-block mt-lg"><i class="fa fa-refresh"></i> Tampilkan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <header class="panel-heading">
                                                <h3 class="panel-title" style="text-align: center;color: #33353f" id="judul"></h3>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive" id="tabel">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hkd" class="tab-pane">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="frm-filter" class="" action="#" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Provinsi</label>
                                                            <select id="prov2" name="prov2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                                <?php foreach ($prov as $p): ?>
                                                                    <option value="<?php echo $p->KodeProv; ?>"><?php echo "[$p->KodeProv] $p->NamaProv"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Tahun</label>
                                                            <select id="tahun2" name="tahun2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($tahun as $t): ?>
                                                                    <option value="<?php echo $t->Tahun; ?>"><?php echo $t->Tahun; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Dokumen</label>
                                                            <select id="dok2" name="dok2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($dokHD as $d): ?>
                                                                    <option value="<?php echo $d->IdDok; ?>"><?php echo "[$d->IdDok] $d->Deskripsi"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Kabupaten</label>
                                                            <select id="kab2" name="kab2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Bulan</label>
                                                            <select id="bulan2" name="bulan2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }' required>
                                                                <?php foreach ($bulan as $b): ?>
                                                                    <option value="<?php echo $b->IdBulan; ?>"><?php echo "[$b->IdBulan] $b->Deskripsi"; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Komoditas</label>
                                                            <select id="kom2" name="kom2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Kecamatan</label>
                                                            <select id="kec2" name="kec2" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                                                                <option value="">- ALL -</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                    </div>
                                                </div>
                                                <button id="refresh-progress2" class="btn btn-default btn-block mt-lg"><i class="fa fa-refresh"></i> Tampilkan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <header class="panel-heading">
                                                <h3 class="panel-title" style="text-align: center;color: #33353f" id="judul2"></h3>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive" id="tabel2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['./assets/js/common'], function (common) {
        require(['app/laporan']);
    });
</script>