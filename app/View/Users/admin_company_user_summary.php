<?php
/**
 * @created    10-09-2017
 * @copyright  Copyright (C) 2017
 * @author     Hardeep Singh
 */
$title_for_layout = isset($title_for_layout) ? $title_for_layout : (ucfirst($model) . " Manager");
$edit_action = $action == "admin_company_sub_manager_summary" ? "admin_add_company_sub_manager" : "admin_add_company_member";
?>

<div class="page-bar">
    <div class="row">
        <div class="col-md-6 pull-left">
            <?php echo $this->element("breadcum", array("model" => $title_for_layout, "action" => "Summary")); ?>
        </div>
        <div class="col-md-6 pull-right" style="text-align: right; margin-top: 4px;">
            <a href="<?= $this->Html->url(array("action" => $edit_action)); ?>" class="btn btn-circle green-meadow">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
    </div>
</div>

<?= $this->element("page_header", array("title" => $title_for_layout . " Summary")); ?>

<?php echo $this->Session->flash(); ?>

<div class="data__filter">
    <div class="form__structure shadow">
        <?php 
            echo $this->Form->create($model, array(
                'type' => 'GET', 
                'class' => 'form-horizontal form-row-seperated',
                'inputDefaults' => array(
                    'label' => false, 'div' => false, 'div' => false, "escape" => false, 
                    "class" => "form-control", "type" => "text", "required" => false
                )
            ));
        ?>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Username / Name / Email :</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?= $this->Form->input('username', array('value' => ${$model . "username"}));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="action-buttons text-center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn blue">Search</button>
                        <a class="btn grey" href="<?= $this->Html->url(array("action" => "admin_index")) ?>">Clear</a>
                    </div> 
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="table__structure">
    <?= $this->element("pagination", array("with_info" => true)) ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered order-column" id="sample_1_2">
            <thead>
                <tr>
                    <th style="width : 10%;"> Sr. </th>
                    <th> <?= $this->Paginator->sort('firstname', __('First Name')); ?> </th>
                    <th> <?= $this->Paginator->sort('lastname', __('Last Name')); ?> </th>
                    <th> <?= $this->Paginator->sort('username', __('Username')); ?> </th>
                    <th> <?= $this->Paginator->sort('email', __('Email')); ?> </th>
                    <th style="width : 8%;"> <?= $this->Paginator->sort('is_active', __('Status')); ?> </th>
                    <th style="width : 12%;"> Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; foreach ($records as $record): $i++; ?>
                <tr class="odd gradeX center">
                    <td><?= $i; ?></td>
                    <td><?= $record[$model]['firstname']; ?></td>
                    <td><?= $record[$model]['lastname']; ?></td>
                    <td><?= $record[$model]['username']; ?></td>
                    <td><?= $record[$model]['email']; ?></td>
                    
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "admin_toggleStatus", $record[$model]['id'])); ?>">
                            <i class="fa <?= $record[$model]['is_active'] ? "fa-check-circle-o font-green-meadow icon" : "fa-times-circle-o font-red-sunglo icon" ?>"></i>
                        </a>
                    </td>
                    <td>
                        <?php
                            $edit_action = "";
                            
                            if ($record[$model]['group_id'] == GROUP_COMPANY_SUB_ADMIN)
                            {
                                $edit_action = 'admin_edit_company_sub_manager';
                            }
                            else
                            {
                                $edit_action = 'admin_edit_company_member';
                            }
                        ?>
                        <a href="<?= $this->AclLink->url(array("action" => $edit_action, $record[$model]['id'])); ?>" title="Edit" class="summary-link">
                            <i class="fa fa-edit icon blue-madison"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>