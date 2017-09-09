<div class="content">
    <?php echo $this->Form->create('User', array("class" => "login-form",
        'inputDefaults' => array("label" => false, "div" => false, "required" => false))); ?>
    
        <div class="form-title">
            <span class="form-title"><?= __("Welcome") ?>.</span>
            <span class="form-subtitle"><?= __("Please login") ?>.</span>
        </div>
        
        <?php echo $this->Session->flash(); ?>
        
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9"><?= __("Username") ?></label>
            <div class="input-icon">
                <span>
                    <i class="fa fa-user"></i>
                </span>
                <?php echo $this->Form->input('username', array('class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "text", "autocomplete" => "off", "placeholder" => __("Username"))); ?>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9"><?= __("Password") ?></label>
            <div class="input-icon">
                <span>
                    <i class="fa fa-key"></i>
                </span>
                <?php echo $this->Form->input('password', array('class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "password", "autocomplete" => "off", "placeholder" =>__("Password"))); ?> 
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase"><?= __("Login") ?></button>
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
                <a href="/users/password/forgot"><?= __("Forgot Password") ?></a>
            </div>
        </div>
    </div>
    
</div>
<div class="copyright hide"> 2017 © Tech Formation India. </div>