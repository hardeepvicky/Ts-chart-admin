<?php
/**
 * @created    08-03-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 * @author     Gagandeep Gambhir
 */
$title_for_layout = "Web Service Log";
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?= $this->Html->url(array("controller" => "plants", "action" => "admin_index")) ?>">  
                <i class="fa fa-home"></i>Home
            </a>
        </li>
        <li>
            Logs
        </li>
        <li>
            Web Services
        </li>
    </ul>
</div>
<?php echo $this->element("page_header", array("title" => $title_for_layout)); ?>

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
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Service Name :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('type', array(
                                    'type' => 'select', 
                                    'options' => $web_service_types,
                                    'empty' => DROPDOWN_EMPTY_VALUE,
                                    'value' => ${$model . "type"},
                                )); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Response Status :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('status', array(
                                    'type' => 'select', 
                                    'options' => StaticArray::$status_types,
                                    'empty' => DROPDOWN_EMPTY_VALUE, 
                                    "value" => ${$model . "status"}
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">From Date :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('from_date', array(
                                    "id" => "from_date",
                                    'class' => "form-control date-picker",
                                    'value' => ${$model . "from_date"}, 
                                    "data-date-end" => "input#to_date"
                                )); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">To Date :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('to_date', array(
                                    "id" => "to_date",
                                    'class' => "form-control date-picker",
                                    'value' => ${$model . "to_date"},
                                    "data-date-start" => "input#from_date",
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons text-center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn blue">Search</button>
                        <a class="btn grey" href="<?= $this->Html->url(array("action" => "admin_web_service")) ?>">Clear</a>
                    </div> 
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="table__structure">
    <?= $this->element("pagination", array("with_info" => true)) ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered order-column" id="sample_1_2">
            <thead>
                <tr>
                    <th style="width : 8%;"> <?= $this->Paginator->sort('id', __('ID')); ?> </th>
                    <th style="width : 20%;"> Service Name </th>
                    <th style="width : 12%;"> <?php echo $this->Paginator->sort('execution_time',  'Time Taken (Seconds)'); ?></th>
                    <th style="width : 10%;"><?php echo $this->Paginator->sort('status',  'Response Status'); ?></th>
                    <th style="width : 12%;"><?php echo $this->Paginator->sort('created',  'Datetime'); ?></th>
                    <th style="width : 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr class="odd gradeX">
                    <td class="text-center"><?= $record[$model]['id']; ?></td>
                    <td class="text-center"><?= isset($web_service_types[$record[$model]['type']]) ? $web_service_types[$record[$model]['type']] : "-"; ?></td>
                    <td class="text-center"><?= $record[$model]['execution_time']; ?></td>
                    <td class="text-center">
                        <i class="fa <?= $record[$model]['status'] ? "fa-check-circle-o font-green-meadow icon" : "fa-times-circle-o font-red-sunglo icon" ?>"></i>
                    </td>
                    <td class="text-center"><?php echo DateUtility::getDate($record[$model]['created'], "d-M-Y h:i:s"); ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="css-toggler" data-toggler-class="hidden" data-toggler-target="tr#<?= $record[$model]['id']; ?>">Details</a>
                    </td>
                </tr>
                <tr id="<?= $record[$model]['id']; ?>" class="hidden">
                    <td></td>
                    <td colspan="5" style="background-color:#EEF2F5; text-align: left;">
                        <?php if ($record[$model]['info']) : ?>
                        <label><b>Highlights</b></label><br/>
                        <div class="portlet-body padding-5 has-margin-bottom-10">
                            <?php echo $record[$model]['info']; ?>
                        </div>
                        <?php endif; ?>

                        <label><b>Request</b></label><br/>
                        <div class="portlet-body padding-5 has-margin-bottom-10">
                            <?php echo $record[$model]['request']; ?>
                        </div>

                        <label><b>Response</b></label><br/>
                        <div class="portlet-body padding-5 more-text" data-more-text-char-len="300">
                            <?php echo $record[$model]['response']; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>