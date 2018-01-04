<script>

</script>
<style>
    .slideshow-sortable { list-style-type: none; margin: 0; padding: 0; }
    .slideshow-sortable li { margin: 5px 20px 5px 0; padding: 10px; float: left; text-align: left; cursor: move;}

     .ui-state-highlight { height: 1.2em; line-height: 1.2em; }
</style>
<header class="page-header">
    <h2>Slideshow</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Slideshow</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <a class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block" href="<?php echo base_url() . "backend/slideshow/add"; ?>">
                    <i class="fa fa-plus"></i>
                    Add                                            
                </a>
                <?php if (count($slideshow) == 0): ?>
                    <div class="well info">
                        <strong>Information!</strong> No Data Slideshow Available.
                    </div>
                <?php else: ?>
                <table class="table table-bordered table-striped mb-none datatable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Caption</th>
                          <th>Picture</th>
                          <!-- <th>Language</th> -->
                          <th>Actions</th>
                      </tr>
                  </thead>   
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($slideshow as $c): 
                    ?>
                    <tr class="">
                        <td><?php echo $no;?>.</td>
                        <td><?php echo htmlspecialchars_decode($c->caption);?></td>
                        <td class="center">
                            <?php if ($c->main_pict != ""): ?><img width="200" height="" alt="<?php echo $c->main_pict;?>" src="<?php echo base_url() . "content/slides/" . $c->main_pict;?>" /><?php endif;?>
                        </td>
                        <!-- <td class="center"><?php echo $c->language;?></td> -->
                        <td class="center" width="200px">
                            <a class="btn btn-info" href="<?php echo base_url() . "backend/slideshow/edit/" . $c->id; ?>">
                                <i class="fa fa-pencil-square-o"></i>  
                                Edit                                            
                            </a>
                            <a class="btn btn-danger delete" href="<?php echo base_url() . "backend/slideshow/delete/" . $c->id; ?>" about='slideshow' params='{"main_pict": "<?php echo $c->main_pict;?>", "caption": "<?php echo $c->caption;?>"}'>
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
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading panel-heading-transparent">
                <h2 class="panel-title">Edit Order List</h2>

            </header>
            <div class="panel-body">
                <ul class="slideshow-sortable" style="">
                <?php 
                    if (count($slideshow) > 0): $idx = 1; foreach ($slideshow as $row): 
                    $data = '{"id":"'. $row->id .'", "main_pict":"'. $row->main_pict .'", "sorter":"'. $row->sorter .'"}';
                ?>
                    <li class="ui-state-default" data='<?php echo $data;?>' id="<?php echo $row->id; ?>"><span><img height="50px" alt="<?php echo $row->main_pict;?>" src="<?php echo base_url() . "content/slides/" . $row->main_pict;?>" /><br/><?php echo $row->main_pict;?></span></li>
                <?php 
                    $idx++; endforeach; endif; 
                ?>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- end: page -->

<script>
    require(['../assets/js/common'], function (common) {
        require(['app/slideshow']);
    });
</script>