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

$action_title = $action == "admin_add" ? "Add Template" : "Edit Template";
?>

<link href="/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />

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

<?= $this->element("page_header", array("title" => $action_title)); ?>

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
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Name <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('name', array('placeholder' => 'Name')); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Code <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('code', array('placeholder' => 'Code')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Subject <span>*</span> :</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $this->Form->input('subject', array('placeholder' => 'Subject')); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-4 col-xs-12">Body <span>*</span> :</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <?= $this->Form->input('body', array(
                            "id" => "body",
                            'placeholder' => 'Body', 
                            "type" => "textarea",
                            "class" => "form-control"
                        ));
                    ?>
                    <div class="help-block">Press @ key for placeholder list</div>
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

<script src="/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
    var placeholder_list = JSON.parse('<?php echo json_encode(array_values($placeholder_list)) ?>');
    
    $(document).ready(function()
    {
        var words = [];
        
        for(var i in placeholder_list)
        {
            words.push("{" + placeholder_list[i] + "}");
        }
        
        console.log(words);
        
        $('#body').summernote({
            height: 250,
            hint: {
                mentions: words,
                match: /(^|\s)@(\w*)$/,
                search: function (keyword, callback) {
                  callback($.grep(this.mentions, function (item) {
                    return item.indexOf(keyword) == 0;
                  }));
                },
                content: function (item) {
                  return item;
                }    
            }
        });
        
//        $("#body").parent().contents().find('.note-editable').textcomplete([{
//            match: /(^|\s)@(\w*)$/,
//            search: function (term, callback) 
//            {
//                callback($.map(words, function (word) {
//                    return word.indexOf(term) === 0 ? word : null;
//                }));
//            },
//            replace: function (word) {
//                return word + ' ';
//            }
//        }]);
    });
</script>