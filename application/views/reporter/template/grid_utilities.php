<?php 

$items_per_page = isset($table['utilities']['items_per_page']) ? $table['utilities']['items_per_page'] : $this->config->item('grid_items_per_page');

?> 
<div class="row">
    
    <div class="col-lg-1 col-sm-2">
        <select class="form-control" id="showRows">
            <option value="<?php echo $items_per_page?>" selected="selected">
                <?php echo $items_per_page;?></option>
            <option value="50">25</option>
            <option value="100">50</option>
            <option value="150">100</option>
        </select>
    </div>
    <div class="col-sm-8 col-lg-6">
        <div id="action-buttons" class="dt-buttons btn-group">
            <div  class="col">
                <div class="onoffswitch" data-container="body" data-toggle="popover" data-placement="top" data-content="<b>ON:</b> Indica que el reporte se actualizará cada 5 minutos.<br><b>OFF:</b> Desactiva la funcionalidad.">
                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="auto_refresh"
                        <?php echo ($table['utilities']["auto_reload"]) ? 'checked="checked"' : ''; ?>
                    >
                    <label class="onoffswitch-label" for="auto_refresh">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
            <div class="">
            <?php if (isset($table['utilities']['download_all'])){
            echo '<a href="'.$table['utilities']['download_all'].'" class="btn btn-success component_link">
                    '.$this->lang->line('button_download_all') .'
                </a>';
            }?>
            </div>
        </div>
    </div>
</div>

