<script>

</script>
<header class="page-header">
    <h2>Static Pages</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Static Pages</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <a class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block" href="<?php echo base_url() . "backend/staticpages/add"; ?>">
                    <i class="fa fa-plus"></i>
                    Add                                            
                </a>
                <?php if (count($staticpages) == 0): ?>
                    <div class="well info">
                        <strong>Information!</strong> No Data Static Pages Available.
                    </div>
                <?php else: ?>
                <table class="table table-bordered table-striped mb-none datatable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Title (Link)</th>
                          <th>Allowed To Shared?</th>
                          <!-- <th>Language</th> -->
                          <th>Actions</th>
                      </tr>
                  </thead>   
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($staticpages as $c): 
                    ?>
                    <tr class="">
                        <td><?php echo $no;?>.</td>
                        <td><?php echo $c->title . ($c->id == 1 ? ' <span class="highlight">Homepage</span>' : '') . '<br/>(' . $c->link . ')'; ?></td>
                        <td class="center"><?php echo $c->is_sharing ? '<span class="text-primary">Yes</span>' : '<span class="text-danger">No</span>';?></td>
                        <!-- <td class="center"><?php echo $c->lang_id;?></td> -->
                        <td class="center">
                            <a class="btn btn-info" href="<?php echo base_url() . "backend/staticpages/edit/" . $c->id; ?>">
                                <i class="fa fa-pencil-square-o"></i>  
                                Edit                                            
                            </a>
                            <a class="btn btn-danger delete" href="<?php echo base_url() . "backend/staticpages/delete/" . $c->id; ?>" about='staticpages' params='{"title": "<?php echo $c->title; ?>"}'>
                                <i class="fa fa-trash-o"></i> 
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
              </table>  
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/staticpages']);
    });
</script>