<script>

</script>
<header class="page-header">
    <h2>Site Info</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <span>Site Info</span>
            </li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <form id="frm-post" name="frm-post" class="form-horizontal" data-page="siteinfo" data-action="backend/siteinfo/save" method="post" data-redirect="backend/siteinfo">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>

                    <h2 class="panel-title"><i class="fa fa-pencil-square-o"></i> Site Info</h2>
                </header>
                <div class="panel-body" id="LoadingOverlayApi" data-loading-overlay>
                    <?php if (count($siteinfo) > 0): ?>
                    <?php foreach($siteinfo as $s): ?>
                    <?php if ($s->type == "text"): ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="<?php echo $s->key; ?>"><?php echo $s->caption; ?></label>
                        <div class="col-sm-9">
                            <div id="<?php echo $s->key; ?>-old" style="display:none"><?php echo $s->value; ?></div>
                            <input id="<?php echo $s->key; ?>" name="<?php echo $s->key; ?>" type="text" value="<?php echo $s->value; ?>" class="form-control">
                        </div>
                    </div>
                    <?php elseif ($s->type == "html"): ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="<?php echo $s->key; ?>"><?php echo $s->caption; ?></label>
                        <div class="col-sm-9">
                            <div id="<?php echo $s->key; ?>-old" style="display:none"><?php echo htmlspecialchars_decode($s->value); ?></div>
                            <textarea cols="80" class="ckeditor-textarea form-control" id="<?php echo $s->key; ?>" name="<?php echo $s->key; ?>" rows="10">
                            <?php echo htmlspecialchars_decode($s->value); ?>
                            </textarea>
                        </div>
                    </div>
                    <?php elseif ($s->type == "image"): ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="<?php echo $s->key; ?>"><?php echo $s->caption; ?></label>
                        <div class="col-sm-9">
                           <div class="uploader" id="<?php echo $s->key; ?>" style="width: 80%; height: 330px;">You browser doesn't support upload.</div>
                            <button data-id="<?php echo $s->key; ?>" id="clear_queue_<?php echo $s->key; ?>" class="btn btn-sm btn-danger clear_queue">
                                <i class="fa fa-times"></i> Clear Queue
                            </button>
                            <span class="label label-primary">Best Picture Size : 1140 px * 100 px</span>
                            <ul class="thumbnails gallery siteinfo" data-id="<?php echo $s->key; ?>" id="thumb_<?php echo $s->key; ?>" style="margin-top: 10px">
                                <?php if (isset($s->value) && $s->value != "" && file_exists(APPCONTENT . "banner/" . $s->value)): ?>
                                <li id="img_<?php echo $s->key; ?>" class="thumbnail old">
                                    <a style="background:url(<?php echo base_url() . APPCONTENT . "banner/" . $s->value;?>)" title="<?php echo $s->value; ?>" href="<?php echo base_url() . APPCONTENT . "banner/" . $s->value;?>"><img class="grayscale_" src="<?php echo base_url() . APPCONTENT . "banner/" . $s->value;?>" alt="<?php echo $s->value; ?>"></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button id="reset-siteinfo" type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>
</div>
<!-- end: page -->
<script>
    require(['../assets/js/common'], function (common) {
        require(['app/siteinfo']);
    });
</script>