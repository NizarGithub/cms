<script>

</script>
<header class="page-header">
    <h2>Slideshow - Add</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url("backend/slideshow"); ?>">
                    Slideshow
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
        <form id="frm-post" name="frm-post" class="form-horizontal" data-page="slideshow" data-id="caption" data-action="backend/slideshow/addsave" method="post" data-redirect="backend/slideshow">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title"><i class="fa fa-plus"></i> Add Slideshow</h2>
                </header>
                <div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="caption">Caption <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <!-- <textarea cols="80" class="ckeditor-textarea form-control" id="caption" name="caption" rows="10">
                            </textarea> -->
                            <input id="caption" name="caption" type="text" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="picture">Picture <span class="required">*</span><br/><em>File extension allowed only <strong>JPG</strong></em></label>
                        <div class="col-sm-9">
                           <div id="upload_picture" data-width="1140" rel="slides" style="width: 80%; height: 330px;">You browser doesn't support upload.</div>
                            <button id="clear_queue_picture" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i> Clear Queue
                            </button>
                            <span class="label label-primary">Best Picture Size : 1140 px * 400 px</span>
                            <ul class="thumbnails gallery slideshow" id="picture" style="margin-top: 10px">
                            </ul>
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
                            <button id="reset-slideshow" type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>
</div>
<!-- end: page -->
<script>
    require(['../../assets/js/common'], function (common) {
        require(['app/slideshow']);
    });
</script>