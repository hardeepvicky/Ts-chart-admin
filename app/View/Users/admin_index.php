<?php
/**
 * @created    06-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */
$title_for_layout = "Company Admins"
?>

<div class="page-bar">
    <div class="row">
        <div class="col-md-6 pull-left">
            <?php echo $this->element("breadcum", array("model" => $title_for_layout, "action" => "Summary")); ?>
        </div>
        <div class="col-md-6 pull-right" style="text-align: right; margin-top: 4px;">
        </div>
    </div>
</div>

<?= $this->element("page_header", array("title" => $title_for_layout)); ?>

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
                                <?= $this->Form->input('username', array('value' => ${$model . "username"})); ?>
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
                    <th style="width : 10%;"> <?= $this->Paginator->sort('id', __('Id')); ?> </th>
                    <th> <?= $this->Paginator->sort('firstname', __('First Name')); ?> </th>
                    <th> <?= $this->Paginator->sort('lastname', __('Last Name')); ?> </th>
                    <th> Company (Code) </th>
                    <th> <?= $this->Paginator->sort('username', __('Username')); ?> </th>
                    <th> <?= $this->Paginator->sort('email', __('Email')); ?> </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr class="odd gradeX center">
                        <td><?= $record[$model]['id']; ?></td>
                        <td><?= $record[$model]['firstname']; ?></td>
                        <td><?= $record[$model]['lastname']; ?></td>
                        <td>
                            <?= $record['Company']['name']; ?> (<?= $record['Company']['code']; ?>)
                            <?php if (!$record['Company']['is_active']): ?>
                                <i class="fa fa-ban font-red"></i>
                            <?php endif; ?>
                        </td>
                        <td><?= $record[$model]['username']; ?></td>
                        <td><?= $record[$model]['email']; ?></td>
                        <td>
                            <a href="#" data-company-id="<?= $record['Company']['id']; ?>" 
                               title="Edit" class="summary-link block-company" data-toggle="modal" data-target="#<?= $record['Company']['is_active'] ? 'company-block-model' : 'company-unblock-model' ?>">
                                <?php if ($record['Company']['is_active']): ?>
                                    <span class="font-red">Block Company</span>
                                <?php else: ?>
                                    <span class="font-blue"> Un-Block Company</span>
                                <?php endif; ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>

<div class="modal fade" id="company-block-model" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <?php
            echo $this->Form->create($model, array(
                'url' => array(
                    'controller' => 'Companies', 'action' => 'admin_block'
                ),
            ));
            ?>
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Tell Reason to block company
                </h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="company_id">
                <textarea name="msg" class="form-control" style="width: 100%;"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Block</button>
            </div>
            
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="company-unblock-model" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <?php
            echo $this->Form->create($model, array(
                'url' => array(
                    'controller' => 'Companies', 'action' => 'admin_unblock'
                ),
            ));
            ?>
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                   Say Something
                </h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="company_id">
                <textarea name="msg" class="form-control" style="width: 100%;"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Unblock</button>
            </div>
            
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        
        $("a.block-company").click(function()
        {
            var company_id = $(this).data("company-id");
            $("input[name='company_id']").val(company_id);
        });
    })
</script>