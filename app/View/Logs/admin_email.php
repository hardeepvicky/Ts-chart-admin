<?php
/**
 * @created    15-05-2017
 * @package    Dairy
 * @copyright  Copyright (C) 2017
 * @license    Proprietary
 */
$title_for_layout = __("Email Log");
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?= $this->Html->url($home_link) ?>">  
                <i class="fa fa-home"></i><?= __("Home") ?>
            </a>
        </li>
        <li>
            <?= __("Logs") ?>
        </li>
        <li>
            <?php echo $title_for_layout; ?>
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
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"><?= __("Email Type") ?> :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('code', array(
                                    "type" => "select",
                                    "options" => EmailTypes::$list,
                                    "empty" => DROPDOWN_EMPTY_VALUE,
                                    'value' => ${$model . "code"},
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"><?= __("From Date") ?> :</label>
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
                            <label class="control-label col-md-4 col-sm-4 col-xs-12"><?= __("To Date") ?> :</label>
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
                        <button type="submit" class="btn blue"><?= __("Search") ?></button>
                        <a class="btn grey" href="<?= $this->Html->url(array("action" => $action, "admin" => true)) ?>"><?= __("Clear") ?></a>
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
                    <th style="width : 20%;"> <?= __("Email Type") ?> </th>
                    <th> <?= __("From") ?> </th>
                    <th> <?= __("To") ?> </th>
                    <th style="width : 12%;"><?php echo $this->Paginator->sort('created',  __('Datetime')); ?></th>
                    <th style="width : 5%;"><?= __("Actions") ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr class="odd gradeX">
                    <td class="text-center"><?= $record[$model]['id']; ?></td>
                    <td class="text-center"><?= isset(EmailTypes::$list[$record[$model]['code']]) ? EmailTypes::$list[$record[$model]['code']] : $record[$model]['code']; ?></td>
                    <td><?= $record[$model]['from_email']; ?></td>
                    <td><?= $record[$model]['to_email']; ?></td>
                    <td class="text-center"><?php echo DateUtility::getDate($record[$model]['created'], "d-M-Y h:i:s"); ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="css-toggler" data-toggler-class="hidden" data-toggler-target="tr#<?= $record[$model]['id']; ?>">
                            <?= __("Details") ?>
                        </a>
                    </td>
                </tr>
                <tr id="<?= $record[$model]['id']; ?>" class="hidden">
                    <td></td>
                    <td colspan="5">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-dark bold">
                                        <?= $record[$model]['subject'] ?>
                                    </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <p><?= $record[$model]['body'] ?></p>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element("pagination") ?>
</div>