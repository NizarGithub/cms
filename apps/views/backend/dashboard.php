<script>

</script>
<header class="page-header">
    <h2>Dashboard</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Dashboard</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <h4 class="text-weight-semibold mt-sm">Information</h4>
                <p>Selamat datang di area manajemen konten, <strong><?php echo $this->session->userdata('bpom_ppid_nama'); ?></strong></p>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <div class="panel-body bg-primary">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Total Pages</h4>
                            <div class="info">
                                <strong class="amount"><?php echo $jmlPages; ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url("backend/staticpages"); ?>" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="panel">
            <div class="panel-body bg-info">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-image"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Total Slideshow</h4>
                            <div class="info">
                                <strong class="amount"><?php echo $jmlSlide; ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url("backend/slideshow"); ?>" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <div class="panel-body bg-quartenary">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Total Newsticker</h4>
                            <div class="info">
                                <strong class="amount"><?php echo $jmlNews; ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url("backend/newsticker"); ?>" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php if ($this->session->userdata('bpom_ppid_level') == 'administrator'): ?>
    <div class="col-lg-6">
        <section class="panel">
            <div class="panel-body bg-secondary">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Total Pengguna</h4>
                            <div class="info">
                                <strong class="amount"><?php echo $jmlUser; ?></strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a href="<?php echo base_url("backend/users"); ?>" class="text-uppercase">(view all)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/dashboard']);
    });
</script>