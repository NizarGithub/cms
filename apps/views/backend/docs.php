<script>

</script>
<header class="page-header">
    <h2>File Manager</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>File Manager</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
               <iframe src="<?php echo base_url() . APPCONTENT; ?>docs/elfinder.html" style="width: 100%; height: 420px; border:0px;margin: 0px;"></iframe>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/docs']);
    });
</script>