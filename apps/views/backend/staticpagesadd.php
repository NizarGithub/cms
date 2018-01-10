<script>

</script>
<header class="page-header">
    <h2>Static Pages - Add</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url("backend/staticpages"); ?>">
                    Static Pages
                </a>
            </li>
            <li><span>Add</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <form id="frm-post" name="frm-post" class="form-horizontal" data-page="staticpages" data-id="title" data-action="backend/staticpages/addsave" method="post" data-redirect="backend/staticpages">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title"><i class="fa fa-plus"></i> Add Static Pages</h2>
                </header>
                <div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title">Title <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input id="title" name="title"  type="text" class="form-control" value="" required autofocus/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="link">Link/Slug <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <input id="link" name="link" type="text" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="content-desc">Content <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <textarea cols="80" class="ckeditor-textarea form-control" id="content-desc" name="content-desc" rows="10">
                            </textarea>
                            <a id="view-designer" class="mb-xs mt-xs mr-xs btn btn-success btn-block" href="">
                                <i class="fa fa-paint-brush"></i>
                                Edit in Designer                                            
                            </a>
                            <div id="cssjs" style="display:none"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="is_sharing">Allowed To Shared? <span class="required">*</span></label>
                        <div class="col-sm-2">
                            <select id="is_sharing" name="is_sharing" class="form-control mb-md" required>
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-sm-3 control-label" for="lang_id">Language <span class="required">*</span></label>
                        <div class="col-sm-3">
                            <select id="lang_id" name="lang_id" class="form-control mb-md" required>
                                <option value="">- Choose Language -</option>
                                <?php foreach ($lang as $l): ?>
                                <option value="<?php echo $l->lang_id; ?>" <?php echo ($l->lang_id == "ina") ? 'Selected="Selected"' : ''; ?>><?php echo $l->deskripsi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button id="reset-staticpages" type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>
</div>
<div id="modalDesigner" class="modal-block modal-block-full mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Page Designer</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <iframe id="iframe_designer" src="<?php echo base_url("backend/designer/view"); ?>" style="border: none;" width="100%"></iframe>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="btn-save" class="btn btn-primary modal-confirm">Save</button>
                    <button class="btn btn-default closeconfirm_open">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
<div id="closeconfirm" class="well">
    <h5>Data yang Anda ubah tidak akan disimpan.<br/>Apakah Anda yakin akan keluar dari designer ini?</h5>
    <hr/>
    <div class="text-right">
    <button id="closeok" class="btn btn-default mr-sm" style><i class="fa fa-check"></i> Ya</button>
    <button class="closeconfirm_close btn btn-default"><i class="fa fa-times"></i> Tidak</button>
    </div>
</div>
<!-- end: page -->
<script>
    require(['../../assets/js/common'], function (common) {
        require(['app/staticpages']);
    });
</script>