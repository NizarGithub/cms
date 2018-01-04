<script>

</script>
<style>
    .newsticker-sortable { list-style-type: none; margin: 0; padding: 0; }
    .newsticker-sortable li { margin: 5px 20px 5px 0; padding: 10px; text-align: left; cursor: move;}

     .ui-state-highlight { height: 1.2em; line-height: 1.2em; }

     blockquote { margin: 0; }
</style>
<header class="page-header">
    <h2>Newsticker</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="<?php echo base_url("backend/dashboard"); ?>">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Newsticker</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-horizontal">
            <div class="panel-body">
                <a class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block" href="<?php echo base_url() . "backend/newsticker/add"; ?>">
                    <i class="fa fa-plus"></i>
                    Add                                            
                </a>
                <?php if (count($newsticker) == 0): ?>
                    <div class="well info">
                        <strong>Information!</strong> No Data Newsticker Available.
                    </div>
                <?php else: ?>
                <table class="table table-bordered table-striped mb-none datatable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tag</th>
                          <th>Content</th>
                          <!-- <th>Language</th> -->
                          <th width="200px">Actions</th>
                      </tr>
                  </thead>   
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($newsticker as $c): 
                    ?>
                    <tr class="">
                        <td><?php echo $no;?>.</td>
                        <td><?php echo ($c->tag == null ? '' : $c->tag); ?></td>
                        <td><?php echo htmlspecialchars_decode($c->content);?></td>
                        <!-- <td class="center"><?php echo $c->lang_id;?></td> -->
                        <td class="center">
                            <a class="btn btn-info" href="<?php echo base_url() . "backend/newsticker/edit/" . $c->id; ?>">
                                <i class="fa fa-pencil-square-o"></i>  
                                Edit                                            
                            </a>
                            <a class="btn btn-danger delete" href="<?php echo base_url() . "backend/newsticker/delete/" . $c->id; ?>" about='newsticker' params='{"tag": "<?php echo $c->tag; ?>", "content" : "<?php echo trim(strip_tags(htmlspecialchars_decode(nl2br($c->content)))); ?>"}'>
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
                <ul class="newsticker-sortable" style="">
                <?php 
                    if (count($newsticker) > 0): $idx = 1; foreach ($newsticker as $row): 
                    $data = '{"id":"'. $row->id .'", "tag":"'. $row->tag .'", "sorter":"'. $row->sorter .'"}';
                ?>
                    <li class="ui-state-default" data='<?php echo $data;?>' id="<?php echo $row->id; ?>"><blockquote class="primary rounded b-thin"><?php echo ($row->tag == null ? '' : $row->tag . ": ") .htmlspecialchars_decode($row->content);?></blockquote></li>
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
        require(['app/newsticker']);
    });
</script>