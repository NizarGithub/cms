<script>

</script>
<header class="page-header">
    <h2>Gallery</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Gallery</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <ul class="thumbnails gallery media">
                <?php if (count($gallery) > 0): ?>
                <?php $idx = 1; foreach ($gallery as $img): if ($img !=""): ?>
                    <li id="<?php echo $img; ?>" class="thumbnail">
                        <a style="background:url(<?php echo $this->session->userdata('bpom_ppid_content_url') . "images/thumbs/" . $img;?>)" title="<?php echo $img; ?>" href="<?php echo $this->session->userdata('bpom_ppid_content_url') . "images/" . $img;?>"><img class="grayscale_" src="<?php echo $this->session->userdata('bpom_ppid_content_url') . "images/thumbs/" . $img;?>" alt="<?php echo $img; ?>"></a>
                        <!-- <div class="gallery-controls">
                            <p><a href="#" class="gallery-edit btn btn-img"><i class="fa fa-pencil-square-o"></i></a> <a href="#" class="gallery-delete btn btn-img"><i class="fa fa-times"></i></a></p>
                        </div> -->
                    </li>
                <?php $idx++; endif; endforeach; ?>
                <!--<span class="label label-info">Best Picture Size : 1366 px * 550 px</span>-->
          <?php endif; ?>
                </ul>
                <div id="uploader" style="width: 90%; height: 350px; margin-left: 35px">You browser doesn't support upload.</div>
                <button id="clear-queue" class="btn btn-mini btn-danger" style="margin-left: 40px">
                    <i class="fa fa-times"></i> Clear Queue
                </button>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/gallery']);
    });
</script>