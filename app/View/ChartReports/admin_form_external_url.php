<?php
/**
 * @created    30-09-2017
 */

$title_for_layout = isset($title_for_layout) ? $title_for_layout : "Charts Manager";

$disabled = $action == "admin_edit" ? "disabled" : "";   

$action_title = $action == "admin_add" ? "Add Chart " : "Edit Chart";

$action_title .= " - " . ReportTypes::$list[$type];
?>

<div class="page-bar">
    <div class="row">
        <div class="col-md-6 pull-left">
            <?php echo $this->element("breadcum", array("model" => $title_for_layout, "action" => $action_title)); ?>
        </div>
        <div class="col-md-6 pull-right" style="text-align: right; margin-top: 4px;">
            <a href="<?= $this->Html->url(array("action" => "admin_index")); ?>" class="btn btn-circle blue-madison">
                <i class="fa fa-angle-left"></i> Back
            </a>
        </div>
    </div>
</div>

<?= $this->element("page_header", array("title" => $title_for_layout)); ?>

<?php echo $this->Session->flash(); ?>

<div class="form__structure">
    <?php 
        echo $this->Form->create($model, array(
            'type' => 'file', 
            "class" => "form-horizontal form-row-seperated",
            'inputDefaults' => array(
                'label' => false, 'div' => false, 'div' => false, "escape" => false, 
                "class" => "form-control", "type" => "text"
            )
        ));
        
        echo $this->Form->hidden('id');
        echo $this->Form->hidden('type', array('value' => $type));
    ?>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Menu Link <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('chart_menu_id', array(
                        "type" => "select",
                        "class" => "form-control select2",
                        'options' => $menu_link_list, 
                        )); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Name <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('name', array('placeholder' => 'Name')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">URL <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('url', array('placeholder' => 'URL')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Status :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="mt-checkbox-inline">
                        <label class="mt-checkbox mt-checkbox-outline">
                            <?= $this->Form->input('is_active', array('type' => 'checkbox')); ?> Active
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="action-buttons">
            <div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8 col-xs-12">
                <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                <a class="btn grey" href="<?= $this->Html->url(array("action" => "admin_index")) ?>">Cancel</a>
            </div> 
        </div>
    <?php echo $this->Form->end(); ?>
</div>