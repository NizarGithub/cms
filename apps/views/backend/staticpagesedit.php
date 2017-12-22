<script>

</script>
<header class="page-header">
    <h2>Static Pages - Edit</h2>

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
            <li><span>Edit</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <form id="frm-post" name="frm-post" class="form-horizontal" data-page="staticpages" data-id="title" data-action="backend/staticpages/editsave/<?php echo $staticpages->id; ?>" method="post" data-redirect="backend/staticpages">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title"><i class="fa fa-pencil-square-o"></i> Edit Static Pages #<?php echo $id; ?></h2>
                </header>
                <div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title">Title <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input id="title" name="title"  type="text" class="form-control" value="<?php echo $staticpages->title; ?>" required autofocus/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="link">Link/Slug <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <input id="link" name="link" type="text" value="<?php echo $staticpages->link; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="content-desc">Content <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <div id="content-desc-old" style="display:none"><?php echo str_replace("{{contenturl}}", $this->session->userdata('bpom_ppid_content_url'), htmlspecialchars_decode($staticpages->content)); ?></div>
                            <textarea cols="80" class="ckeditor-textarea form-control" id="content-desc" name="content-desc" rows="10">
                                <?php echo str_replace("{{contenturl}}", $this->session->userdata('bpom_ppid_content_url'), htmlspecialchars_decode($staticpages->content)); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label class="col-sm-3 control-label" for="lang_id">Language <span class="required">*</span></label>
                        <div class="col-sm-3">
                            <select id="lang_id" name="lang_id" class="form-control mb-md" required>
                                <option value="">- Choose Language -</option>
                                <?php foreach ($lang as $l): ?>
                                <option value="<?php echo $l->lang_id; ?>" <?php echo ($staticpages->lang_id == $l->lang_id) ? 'Selected="Selected"' : ''; ?>><?php echo $l->deskripsi; ?></option>
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
<!-- end: page -->
<script>
    require(['../../../assets/js/common'], function (common) {
        require(['app/staticpages']);
    });
</script>