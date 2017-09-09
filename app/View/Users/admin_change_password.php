<div class="content">
    <?php
    echo $this->Form->create($model, array(
        'inputDefaults' => array(
            "type" => "password",
            'label' => false, 'div' => false, 'div' => false, "escape" => false,
            'class' => 'form-control form-control-solid placeholder-no-fix',
            "autocomplete" => "off",
            "required"
        )
    ));
    ?>

    <div class="form-title">
        <span class="form-title">Change Password</span>
    </div>
    
    <?php echo $this->Session->flash(); ?>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Current Password</label>
        <div class="input-icon">
            <span>
                <i class="fa fa-key"></i>
            </span>

            <?= $this->Form->input('password', array('placeholder' => 'Current Password')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">New Password</label>
        <div class="input-icon">
            <span>
                <i class="fa fa-key"></i>
            </span>

            <?= $this->Form->input('new_password', array('placeholder' => 'New Password')); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
        <div class="input-icon">
            <span>
                <i class="fa fa-key"></i>
            </span>

            <?= $this->Form->input('confirm_password', array('placeholder' => 'Confirm Password')); ?>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn red btn-block uppercase">Update</button>
    </div>
    
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6 text-right">
                <a href="/">Home</a>
            </div>
        </div>
    </div>

    <?php echo $this->Form->end(); ?>

</div>