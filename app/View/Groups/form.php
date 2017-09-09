<div class="row">
    <div class="col-lg-12">
        <section class="panel">
           <header class="panel-heading"><?php echo $title; ?></header>
            <div class="panel-body">
                <div class="form">
                    <?php echo $this->Form->create($model, array('type' => 'file', 'class' => 'cmxform form-horizontal',
                        'inputDefaults' => array( 'label' => false, 'div' => false ))); ?>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Group Name</label>
                            <div class="col-lg-6">
                                <?php echo $this->Form->input('name', array('class' => 'form-control', 'type' => 'text')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-default cancel-btn">Cancel</button>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </section>
    </div>
</div>