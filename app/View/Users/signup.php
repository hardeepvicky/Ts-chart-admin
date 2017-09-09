<div class="content" style="width : 500px;">
    <?php 
    echo $this->Form->create('User', array(
        'inputDefaults' => array("label" => false, "div" => false, 'escape' => false)
    )); 
    ?>
    
        <?php echo $this->Session->flash(); ?>
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label visible-ie8 visible-ie9"><?= __("First Name") ?> </label>
                    <div class="input-icon">
                        <span>
                            <i class="fa fa-male"></i>
                        </span>
                        <?php 
                        echo $this->Form->input('firstname', array(
                            'class' => 'form-control form-control-solid placeholder-no-fix', 
                            'type' => "text", 
                            "placeholder" =>  __("First Name"),
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="control-label visible-ie8 visible-ie9"><?= __("Last Name") ?></label>
                    <div class="input-icon">
                        <span>
                            <i class="fa fa-male"></i>
                        </span>
                        
                        <?php 
                        echo $this->Form->input('lastname', array(
                            'class' => 'form-control form-control-solid placeholder-no-fix', 
                            'type' => "text", 
                            "placeholder" => __("Last Name")
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9"><?= __("Email") ?></label>
            <div class="input-icon">
                <span>
                    <i class="fa fa-envelope"></i>
                </span>
                <?php 
                echo $this->Form->input('email', array(
                    'class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "text",
                    "placeholder" => __("Email")
                )); 
                ?>
            </div>
        </div>
    
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9"><?= __("Username") ?></label>
            <div class="input-icon">
                <span>
                    <i class="fa fa-user"></i>
                </span>
                <?php 
                echo $this->Form->input('username', array(
                    'class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "text",
                    "placeholder" => __("Username")
                )); 
                ?>
            </div>
        </div>
    
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9"><?= __("Password") ?></label>
            <div class="input-icon">
                <span>
                    <i class="fa fa-key"></i> 
                </span>
                <?php 
                echo $this->Form->input('password', array(
                    'class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "password", 
                    "autocomplete" => "off", 
                    "placeholder" => __("Password")
                )); 
                ?> 
            </div>
        </div>
    
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9"><?= __("Confirm Password") ?></label>
            <div class="input-icon" style="position: relative">
                <span>
                    <i class="fa fa-key"></i>
                </span>
                <?php 
                echo $this->Form->input('confirm_password', array(
                    'class' => 'form-control form-control-solid placeholder-no-fix', 
                    'type' => "password", 
                    "autocomplete" => "off",
                    "placeholder" => __("Confirm Password")
                )); 
                ?> 
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">
                <?= __("Signup") ?>
            </button>
        </div>
    <?php echo $this->Form->end(); ?>
    
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <a href="/users/login"><?= __("Login") ?></a>
            </div>
            <div class="col-md-6 text-right">
                <a href="/"><?= __("Home") ?></a>
            </div>
        </div>
    </div>
</div>
<div class="copyright hide"> 2014 © Metronic. Admin Dashboard Template. </div>