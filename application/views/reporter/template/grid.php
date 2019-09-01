<?php if(isset($table['links'])){ ?>
<div class="col-sm-12" >
    <br>
    <?php
        foreach($table['links'] as $link){
            echo "<a href='{$link['fileExtension']}' class='{$link['nameClass']}'>{$link['fileName']}</a>";
        }
    ?>
    <hr>
</div>
<?php } ?>
<div class="col-sm-12" >
<?php if(isset($report->details) && strlen($report->details) > 0 ) { ?>

 <!-- Collapsable Card -->
<div class="card shadow mb-4">
<!-- Card Header - Accordion -->
<a href="#show-report-datails" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-fw fa-eye"></i> <?php echo $this->lang->line('collapse_legent');?></h6>
</a>
<!-- Card Content - Collapse -->
<div class="collapse" id="show-report-datails">
  <div class="card-body">
     <?php echo $report->details; ?>
  </div>
</div>
</div>
<?php }

if(isset($report->resource) && $report->resource == 'embedded'){
    echo " <iframe src='{$report->url}' height='800px' width='100%'></iframe> ";
}else {?>
<!-- Collapsable Card -->
<div class="card shadow mb-4">
<!-- Card Header - Accordion -->
<a href="#show-report-filters" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-fw fa-filter"></i> Filters </h6>
</a>
<!-- Card Content - Collapse -->
<div class="collapse show" id="show-report-filters">
  <div class="card-body">
  
    <div class="form-group col-sm-16">
        <form>
        <?php
         if(isset($table['filters'])){ $this->load->view($this->config->item('rpt_template') . 'grid_filters');}
        ?>
            <input type="reset" class="invisible">
        </form>
    </div>
</div>
</div>
</div>

<div class="card shadow mb-4">
 <div class="card-header py-3">
 </div>
<div class="card-body">
		<?php 	if(isset($table['utilities'])){ $this->load->view($this->config->item('rpt_template') . 'grid_utilities');} ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr><?php
                           foreach ($table['columns'] as $value) {
                               if( (!isset($value['show']) ) OR
                                    (isset($value['show']) && $value['show'] == true)
                               ){
                                    echo "<th>{$value['dt']}</th>";
                               }
                           }
                           ?>
                        </tr>
                    </thead>
                </table>
    </div>
    </div>
</div>
<?php } ?>
    <script type="text/javascript">
        var data_url = "<?php echo $table['data_url']; ?>";
        var active_pagination = "<?php echo (isset($report->pagination)) ? $report->pagination : 1 ; ?>";
        var items_per_page = <?php echo isset($table['utilities']['items_per_page']) ? $table['utilities']['items_per_page'] : $this->config->item('grid_items_per_page'); ?>;
        var auto_reload= <?php echo isset($table['utilities']['auto_reload']) ? $table['utilities']['auto_reload'] : 0;?>;
        var columns_datables = [
            <?php
            $columns = '';
            foreach ($table['columns'] as $value) {
                if( (!isset($value['show']) ) OR
                    (isset($value['show']) && $value['show'] == true)
                ){
                    $columns .= '{"data" : "' . $value['dt'] . '"},';
                }
            }
            echo substr($columns, 0,-1);
            ?>
        ];
        var text_button_download_view = "<?php echo $this->lang->line('button_download_view'); ?>";
        var text_button_columns_view = "<?php echo $this->lang->line('button_columns_view'); ?>";
        $('.date').datetimepicker({ 'sideBySide': true, format : 'YYYY-MM-DD'});
        $('.datetime').datetimepicker({ 'sideBySide': true, format : 'YYYY-MM-DD HH:mm:ss'});
    </script>

</div>


