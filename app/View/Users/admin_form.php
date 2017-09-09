<?php
/**
 * @created    06-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */

$title_for_layout = isset($title_for_layout) ? $title_for_layout : (ucfirst($model) . " Manager");

$disabled = $action == "admin_edit" ? "disabled" : "";   

$action_title = $action == "admin_add" ? "Add User" : "Edit User";
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
            <section class="section-head">
                <h3>Login Details</h3>
            </section>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Group <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('group_id', array(
                        "type" => "select",
                        "class" => "form-control select2",
                        'options' => $group_list, 
                        "empty" => DROPDOWN_EMPTY_VALUE
                        )); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Username <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('username', array('placeholder' => 'Username')); ?>
                </div>
            </div>
            
            <?php if (empty($disabled)) : ?>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Password <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Password', $disabled)); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <section class="section-head">
                <h3>Basic Details</h3>
            </section>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">First Name <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('firstname', array('placeholder' => 'First Name')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Last Name :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('lastname', array('placeholder' => 'Last Name')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Email <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('email', array('placeholder' => 'Email', "type" => "email")); ?>
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