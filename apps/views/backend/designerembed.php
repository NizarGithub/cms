<script>

</script>
<header class="page-header">
    <h2>Designer</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Designer</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <iframe id="iframe_designer" src="<?php echo base_url("backend/designer/view"); ?>" style="border: none;" width="100%" height="700"></iframe>
                <a id="btn-save" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block" href="#">
                    <i class="fa fa-plus"></i>
                    Add                                            
                </a>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/designer']);
    });
</script>