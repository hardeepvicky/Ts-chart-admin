<?php
/*
 * created 21-07-2017
 * @author Hardeep Singh
 */

?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?= $this->Html->url($home_link) ?>">  
                <i class="fa fa-home"></i><?= __("Home") ?>
            </a>
        </li>
        <li>
            <?= __("Settings") ?>
        </li>
    </ul>
</div>
<?php echo $this->element("page_header", array("title" => __("Settings"))); ?>

<?php echo $this->Session->flash(); ?>

<div class="form__structure">
    <?php
    echo $this->Form->create($model, array(
        "class" => "form-horizontal form-row-seperated",
        'inputDefaults' => array(
            'label' => false, 'div' => false, 'div' => false, "escape" => false,
            "class" => "form-control", "type" => "text"
        )
    ));
    ?>
    <div class="form-body">
        <?php foreach ($config as $config_arr) : ?>

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>  <?= $config_arr['name'] ?>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" style="color:#FFF"> 
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body"> 
                    <?php foreach ($config_arr['sub'] as $sub_config) : ?>

                        <section class="section-head">
                            <h3><?= $sub_config['name'] ?></h3>
                        </section>

                        <?php foreach ($sub_config['body'] as $obj) : ?>

                                <div class="form-group">
                                    <?php
                                    if (isset($obj['label']))
                                    {
                                        $element = $obj['label'];

                                        if (!isset($element['attr']['class']))
                                        {
                                            $element['attr']['class'] = 'control-label col-md-3 col-sm-4 col-xs-12';
                                        }

                                        $attr_list = array();
                                        foreach ($element['attr'] as $k => $v)
                                        {
                                            $attr_list[] = $k . '="' . $v . '"';
                                        }

                                        echo '<label ' . implode(" ", $attr_list) . ' >' . __($element['text'])  . '</label>';
                                    }
                                    ?>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                        if (isset($obj['input']))
                                        {
                                            $element = $obj['input'];

                                            $element['type'] = isset($element['type']) ? $element['type'] : 'text';

                                            $element['attr']['name'] = $element['key'];

                                            if (isset($setting_list[$element['key']]))
                                            {
                                                $element['attr']['value'] = $setting_list[$element['key']];
                                            }

                                            $attr_list = array();
                                            foreach ($element['attr'] as $k => $v)
                                            {
                                                $attr_list[] = $k . '="' . $v . '"';
                                            }

                                            if ($element['type'] == "text")
                                            {
                                                echo '<input ' . implode(" ", $attr_list) . ' />';
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                            <?php endforeach; ?>

                    <?php endforeach; ?>
                    <!-- end all loop here -->
                </div>
            </div>

        <?php endforeach; ?>
    </div>

    <div class="action-buttons">
        <div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8 col-xs-12">
            <button type="submit" href="javascript:;" class="btn blue"><?= __("Submit") ?></button>
            <a class="btn grey" href="<?= $this->Html->url(array("action" => "admin_index")) ?>"><?= __("Cancel") ?></a>
        </div> 
    </div>
    <?php echo $this->Form->end(); ?>
</div>
