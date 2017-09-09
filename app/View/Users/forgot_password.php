<div class="content">
    <?php
    echo $this->Form->create('User', array(
        'inputDefaults' => array(
            "type" => "text", 'label' => false, 'div' => false, 'div' => false, "escape" => false,
            'class' => 'form-control form-control-solid placeholder-no-fix',
            "autocomplete" => "off",
            "required"
        )
    ));
    ?>

    <div class="form-title">
        <span class="form-title"><?= __("Forgot Password") ?></span>
        <span class="form-subtitle"><?= __("Enter username to get new password in your Mail") ?></span>
    </div>
    
    <?php echo $this->Session->flash(); ?>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9"><?= __("Username") ?></label>
        <div class="input-icon">
            <span>
                <i class="fa fa-user"></i>
            </span>

            <?= $this->Form->input('username', array('placeholder' => __('Username') )); ?>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn red btn-block uppercase"><?= __("Forgot Password") ?></button>
    </div>

    <?php echo $this->Form->end(); ?>

    
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <a href="/users/signup"><?= __("Create Account") ?></a>
                <br/><br/>
                <a href="/"><?= __("Home") ?></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="/users/login"><?= __("Login") ?></a>
            </div>
        </div>
    </div>

</div>