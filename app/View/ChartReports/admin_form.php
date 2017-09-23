<?php
/**
 * @created    06-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */

$title_for_layout = isset($title_for_layout) ? $title_for_layout : "Reports Manager";

$disabled = $action == "admin_edit" ? "disabled" : "";   

$action_title = $action == "admin_add" ? "Add Report" : "Edit Report";
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
    ?>
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Type <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('type', array(
                        "type" => "select",
                        "class" => "form-control select2",
                        'options' => ReportTypes::$list, 
                        "empty" => DROPDOWN_EMPTY_VALUE,
                        )); ?>
                </div>
            </div>
            
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
        </div>
    
        <div class="action-buttons">
            <div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8 col-xs-12">
                <button type="submit" href="javascript:;" class="btn blue">Submit</button>
                <a class="btn grey" href="<?= $this->Html->url(array("action" => "admin_index")) ?>">Cancel</a>
            </div> 
        </div>
    <?php echo $this->Form->end(); ?>
</div>