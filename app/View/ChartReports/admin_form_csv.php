<?php
/**
 * @created    30-09-2017
 */
$title_for_layout = isset($title_for_layout) ? $title_for_layout : "Charts Manager";

$disabled = $action == "admin_edit" ? "disabled" : "";

$action_title = $action == "admin_add" ? "Add Chart" : "Edit Chart";

$action_title .= " - " . ReportTypes::$list[$type];

$legend_options = array(
    "none" => "None",
    "top" => "Top", "left" => "Left",
    "right" => "Right", "bottom" => "Bottom",
);
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

<div class="form__structure">
    <section class="section-head">
        <h3>Basic Details</h3>
    </section>
    <div class="form-body">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-4 col-xs-12">Menu Link <span>*</span> :</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?=
                $this->Form->input('chart_menu_id', array(
                    "type" => "select",
                    "class" => "form-control select2",
                    'options' => $menu_link_list,
                    "empty" => DROPDOWN_EMPTY_VALUE,
                ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-4 col-xs-12">Name <span>*</span> :</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $this->Form->input('name', array('placeholder' => 'Name')); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-4 col-xs-12">Chart Type <span>*</span> :</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?=
                $this->Form->input('chart_type', array(
                    "type" => "select",
                    "class" => "form-control select2 chart-type",
                    'options' => ChartTypes::$list,
                    "empty" => DROPDOWN_EMPTY_VALUE,
                ));
                ?>
            </div>
            <div class="col-md-3">
                <a href="#" id="sample-file-download">Download Sample</a>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-4 col-xs-12">CSV <span>*</span> :</label>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <?= $this->Form->input('csv_file', array('type' => 'file', 'class' => '', 'required' => false)); ?>
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
    
    <div class="form-body">
        <section class="section-head">
            <h3>Options</h3>
        </section>
        
        <div class="form-group">
            <div class="col-md-4">
                <div class="row">
                    <label class="control-label col-sm-6 col-xs-12">Title</label>
                    <div class="col-sm-6 col-xs-12">
                        <?= $this->Form->input('options.common.title', array('type' => 'text')); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <label class="control-label col-sm-6 col-xs-12">Legend Position</label>
                    <div class="col-sm-6 col-xs-12">
                        <?= $this->Form->input('options.common.legend.position', array('type' => 'select', 'empty' => DROPDOWN_EMPTY_VALUE, 'options' => $legend_options)); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <label class="control-label col-sm-6 col-xs-12">Legend Max Lines</label>
                    <div class="col-sm-5 col-xs-12">
                        <?= $this->Form->input('options.common.legend.maxLines', array('class' => 'form-control validate-int')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-1">
            
        </div>
        
        <div class="col-md-10">
        
            <div class="form-body options-form" id="options-form-<?= ChartTypes::PIE ?>">
                <section class="section-head">
                    <h3>Pie Options</h3>
                </section>

                <div class="form-group">
                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-sm-4 col-xs-12">Pie Hole <span>*</span> :</label>
                            <div class="col-sm-5 col-xs-12">
                                <?= $this->Form->input('options.pie.pieHole', array('placeholder' => 'Pie Hole', 'class' => 'form-control validate-float')); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox mt-checkbox-outline">
                                <?= $this->Form->input('options.pie.is3D', array('type' => 'checkbox')); ?> 3D
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-body options-form" id="options-form-<?= ChartTypes::BAR ?>">
                <section class="section-head">
                    <h3>Bar Options</h3>
                </section>

                <div class="form-group">
                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-sm-6 col-xs-12">H-axis min value</label>
                            <div class="col-sm-5 col-xs-12">
                                <?= $this->Form->input('options.bar.hAxis.minValue', array('class' => 'form-control validate-float')); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox mt-checkbox-outline">
                                <?= $this->Form->input('options.bar.isStacked', array('type' => 'checkbox')); ?> Stacked
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-body options-form" id="options-form-<?= ChartTypes::COLUMN ?>">
                <section class="section-head">
                    <h3>Column Options</h3>
                </section>

                <div class="form-group">
                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-sm-6 col-xs-12">V-axis min value</label>
                            <div class="col-sm-5 col-xs-12">
                                <?= $this->Form->input('options.column.vAxis.minValue', array('class' => 'form-control validate-float')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox mt-checkbox-outline">
                                <?= $this->Form->input('options.column.isStacked', array('type' => 'checkbox')); ?> Stacked
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-body options-form" id="options-form-<?= ChartTypes::LINE ?>">
                <section class="section-head">
                    <h3>Line Options</h3>
                </section>

                <div class="form-group">
                    <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-sm-6 col-xs-12">Point Size</label>
                            <div class="col-sm-5 col-xs-12">
                                <?= $this->Form->input('options.line.pointSize', array('class' => 'form-control validate-float validate-more-than-equal', 
                                    'data-more-than-equal-from' => 0, 
                                    'data-more-than-equal-msg' => 'Should not be less than 0')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox mt-checkbox-outline">
                                <?= $this->Form->input('options.line.curveType', array('type' => 'checkbox', 'value' => 'function')); ?> Curve
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-body options-form" id="options-form-<?= ChartTypes::AREA ?>">
                <section class="section-head">
                    <h3>Area Options</h3>
                </section>

                <div class="form-group">
                     <div class="col-md-4">
                        <div class="row">
                            <label class="control-label col-sm-6 col-xs-12">V Axis min value</label>
                            <div class="col-sm-5 col-xs-12">
                                <?= $this->Form->input('options.area.vAxis.minValue', array('class' => 'form-control validate-float')); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mt-checkbox-inline">
                            <label class="mt-checkbox mt-checkbox-outline">
                                <?= $this->Form->input('options.area.isStacked', array('type' => 'checkbox')); ?> Stacked
                                <span></span>
                            </label>
                        </div>
                    </div>
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
</div>

<?php echo $this->Form->end(); ?>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".chart-type").change(function ()
        {
            $(".options-form").hide();
            $("a#sample-file-download").hide();
            
            var v = $(this).val();
            
            if (v)
            {
                $("#options-form-" + v).show();
                
                if (v == '<?= ChartTypes::PIE ?>')
                {
                    $("a#sample-file-download").attr("href", '/files/Samples/pie-sample-data.csv');
                }
                else
                {
                    $("a#sample-file-download").attr("href", '/files/Samples/bar-line-area-column-sample-data.csv');
                }
                
                $("a#sample-file-download").show();
            }
        });
        
        $(".chart-type").trigger("change");
    });
</script>