<script>

</script>
<header class="page-header">
    <h2>Menu</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Menu</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <a id="add-top-menu" class="mb-sm ml-md mr-md btn btn-success pull-right" href="">
                    <i class="fa fa-plus"></i>
                    Add Menu                                           
                </a>
                <div class="col-md-12">
                    <div class="dd" id="nestable">
                        <?php echo $menuAll; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="add-menu" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <form id="frm-menu" class="form-horizontal" action="#" data-action="add">
        <header class="panel-heading">
            <h2 class="panel-title">ADD MENU</h2>
        </header>
        <div class="panel-body" id="LoadingOverlayMenu" data-loading-overlay>
            <div class="form-group hide">
                <label class="col-sm-3 control-label" for="parent_id">Parent ID</label>
                <div class="col-sm-9">
                    <input type="text" id="parent_id" name="parent_id" class="form-control simpan" data-plugin-maxlength="" readonly="readonly" />
                </div>
            </div>
            <div class="form-group" id="container-parent_menu">
                <label class="col-sm-3 control-label" for="parent_menu">Parent Menu</label>
                <div class="col-sm-9">
                    <input type="text" id="parent_menu" name="parent_menu" class="form-control simpan" data-plugin-maxlength="" readonly="readonly" />
                </div>
            </div>
            <div class="form-group mt-sm">
                <label class="col-sm-3 control-label" for="deskripsi">Deskripsi</label>
                <div class="col-sm-9">
                    <textarea id="deskripsi" name="deskripsi" class="form-control simpan" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="is_hyperlink">Is Hyperlink?</label>
                <div class="col-sm-9">
                    <select id="is_hyperlink" name="is_hyperlink" data-plugin-selectTwo class="form-control populate placeholder simpan" data-plugin-options='' required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="container-link">
                <label class="col-sm-3 control-label" for="link">Link</label>
                <div class="col-sm-9">
                    <input type="text" id="link" name="link" class="form-control simpan"/>
                </div>
            </div>
            <div class="form-group" id="container-id_pagestatic">
                <label class="col-sm-3 control-label" for="id_pagestatic">Static Page</label>
                <div class="col-sm-9">
                    <select id="id_pagestatic" name="id_pagestatic" data-plugin-selectTwo class="form-control populate placeholder" data-plugin-options='{ "placeholder": "Pilih..." }'>
                        <option value="">- Pilih -</option>
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
        require(['app/menu']);
    });
</script>