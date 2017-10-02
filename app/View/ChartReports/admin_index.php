<?php
/**
 * @created    30-09-2017
 */
$title_for_layout = "Charts Manager";
?>

<div class="page-bar">
    <div class="row">
        <div class="col-md-6 pull-left">
            <?php echo $this->element("breadcum", array("model" => $title_for_layout, "action" => "Summary")); ?>
        </div>
        <div class="col-md-6 pull-right" style="text-align: right; margin-top: 4px;">
            <a href="<?= $this->Html->url(array("action" => "admin_add")); ?>" class="btn btn-circle green-meadow">
                <i class="fa fa-plus"></i> Add
            </a>
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
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Name :</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?= $this->Form->input('name', array('value' => ${$model . "name"}));?>
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
                    <th> Link </th>
                    <th> <?= $this->Paginator->sort('name', __('Name')); ?> </th>
                    <th> Type </th>
                    <th style="width : 8%;"> <?= $this->Paginator->sort('is_active', __('Status')); ?> </th>
                    <th style="width : 20%;"> Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr class="odd gradeX center">
                    <td><?= $record[$model]['id']; ?></td>
                    <td><?= $menu_link_list[$record[$model]['chart_menu_id']]; ?></td>
                    <td><?= $record[$model]['name']; ?></td>
                    <td>
                        <?= ReportTypes::$list[$record[$model]['type']]; ?>
                        <?php if (ReportTypes::INTERNAL): ?>
                            <a href="/<?= PATH_CHART_CSV_FILES . $record[$model]['csv_file'] ?>" class="summary-link">
                                <i class="fa fa-download"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "admin_toggleStatus", $record[$model]['id'])); ?>">
                            <i class="fa <?= $record[$model]['is_active'] ? "fa-check-circle-o font-green-meadow icon" : "fa-times-circle-o font-red-sunglo icon" ?>"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "draw_chart", "admin" => false, $record[$model]['id'])); ?>" class="summary-link" target="_black">
                            Preview
                        </a>
                        
                        <a href="<?= $this->Html->url(array("action" => "admin_edit", $record[$model]['id'])); ?>" title="Edit" class="summary-link">
                            <i class="fa fa-edit icon blue-madison"></i>
                        </a>
                        
                        <a href="<?= $this->Html->url(array("action" => "admin_edit", $record[$model]['id'], "1")); ?>" title="Copy" class="summary-link">
                            <i class="fa fa-copy icon font-green"></i>
                        </a>
                        
                        <a href="<?= $this->Html->url(array("action" => "admin_delete", $record[$model]['id'])); ?>"  class="summary-link"
                           data-toggle="confirmation" data-singleton="true" data-popout="true" data-original-title="Are you sure to Delete ?">
                            <i class="fa fa-trash-o icon font-red-sunglo"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>