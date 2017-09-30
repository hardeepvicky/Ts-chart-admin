<?php
/**
 * @created    06-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */
$title_for_layout = "Menu & Links Manager";
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
                            <label class="control-label col-md-3 col-sm-4 col-xs-12">Parent <span>*</span> :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('parent_id', array(
                                    "type" => "select",
                                    "class" => "form-control select2",
                                    'options' => $parent_menu_list, 
                                    "empty" => DROPDOWN_EMPTY_VALUE,
                                    'value' => ${$model . "parent_id"}
                                    )); ?>
                            </div>
                        </div>
                    </div>
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
                    <th> Parent </th>
                    <th> <?= $this->Paginator->sort('name', __('Name')); ?> </th>
                    <th> Children / Report Count </th>
                    <th style="width : 8%;"> <?= $this->Paginator->sort('is_active', __('Status')); ?> </th>
                    <th style="width : 12%;"> Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr class="odd gradeX center">
                    <td><?= $record[$model]['id']; ?></td>
                    <td><?= $parent_menu_list[$record[$model]['parent_id']]; ?></td>
                    <td>
                        <?php
                        if ($record[$model]['children'] > 0)
                        {
                            echo $this->Html->link($record[$model]['name'], array(
                                "parent_id" => $record[$model]['id']
                            ));
                        }
                        else
                        {
                            echo $record[$model]['name']; 
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($record[$model]['children'])
                            {
                                echo "Menus : ".  $record[$model]['children'];
                            }
                            else if ($record['ChartReport'])
                            {
                                $temp = "Reports : " . count($record['ChartReport']);
                                
                                echo $this->Html->link($temp, array(
                                    "controller" => "ChartReports",
                                    "action" => "index", "admin" => true,
                                    "chart_menu_id" => $record[$model]['id']
                                ));
                            }   
                            else
                            {
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "admin_toggleStatus", $record[$model]['id'])); ?>">
                            <i class="fa <?= $record[$model]['is_active'] ? "fa-check-circle-o font-green-meadow icon" : "fa-times-circle-o font-red-sunglo icon" ?>"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?= $this->Html->url(array("action" => "admin_edit", $record[$model]['id'])); ?>" title="Edit" class="summary-link">
                            <i class="fa fa-edit icon blue-madison"></i>
                        </a>
                        
                        <?php if ( empty($record[$model]['children']) && empty($record['ChartReport']) ): ?>
                            <a href="<?= $this->Html->url(array("action" => "admin_delete", $record[$model]['id'])); ?>"  class="summary-link"
                            data-toggle="confirmation" data-singleton="true" data-popout="true" data-original-title="Are you sure to Delete ?">
                                <i class="fa fa-trash-o icon font-red-sunglo"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>