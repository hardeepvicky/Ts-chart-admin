<?php
/**
 * @created    06-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */
$title_for_layout = isset($title_for_layout) ? $title_for_layout : (ucfirst($model) . " Manager");
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

<div class="table__structure">
    <?= $this->element("pagination", array("with_info" => true)) ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered order-column" id="sample_1_2">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th> <?= $this->Paginator->sort('name', __('Name')); ?> </th>
                    <th> Subject </th>
                    <th style="width : 12%;"> Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; foreach ($records as $record):  $i++; ?>
                <tr class="odd gradeX center">
                    <td><?= $i; ?></td>
                    <td><?= $record[$model]['name']; ?></td>
                    <td><?= $record[$model]['subject']; ?></td>
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "admin_edit", $record[$model]['id'])); ?>" title="Edit" class="summary-link">
                            <i class="fa fa-edit icon blue-madison"></i>
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