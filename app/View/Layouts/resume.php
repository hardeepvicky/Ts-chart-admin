<?php
/*
 * created 13-07-2017
 * @author Hardeep
 */
?>

<html prefix="og: http://ogp.me/ns#">
    <head>
        <link rel="stylesheet" type="text/css" class="__meteor-css__" href="/b5ea960da7e9fd9d64fed971d6543e305c9ecce5.css?meteor_css_resource=true">  
        <link rel="stylesheet" type="text/css" class="__meteor-css__" href="/cb4f7deec3f7c03feb4bfff0507f1b51c46ca1e5.css?meteor_css_resource=true">  
        <link rel="stylesheet" type="text/css" class="__meteor-css__" href="/9cf058f3cf8ad80bc4765d3c82c98a7126e1c9af.css?meteor_css_resource=true">
        <title>Resume Wizard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="ll-cc">
        
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:800,600,400,300,200,400italic,300italic" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Noto+Serif:300,300i,400,400i" rel="stylesheet" type="text/css">
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        
        <link href="/js/tf-tabs/tf-tabs.css?<?= CSS_VERSION ?>" rel="stylesheet" type="text/css"/>
        <link href="/js/tf-loader/tf-loader.css?<?= CSS_VERSION ?>" rel="stylesheet" type="text/css" />
        
        
        <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>        
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>        
        
        <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="/assets/global/scripts/bootbox.min.js" type="text/javascript"></script>
        
        <script src="/js/jquery-input-validate.js" type="text/javascript"></script>
        <script src="/js/tf-tabs/tf-tabs.js?<?= CSS_VERSION ?>" type="text/javascript"></script>
        <script src="/js/tf-loader/tf-loader.js?<?= CSS_VERSION ?>" type="text/javascript"></script>
        <script src="/js/jquery-extend.js?<?= CSS_VERSION ?>" type="text/javascript"></script>
        <script src="/js/bootstrap-extend.js?<?= CSS_VERSION ?>" type="text/javascript"></script>
        <script src="/js/resume/default.js?<?= CSS_VERSION; ?>" type="text/javascript"></script>
        
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
            .hidden
            {
                display: none;
            }
            
            .error-message
            {
                color :#FF0000;
            }
            
            li.dropdown
            {
                position: relative;
            }
            
            #user-dropdown
            {
                position: absolute;
                background-color: #fff;
                z-index: 10;
                right : 0;
                padding: 0;
                border : 1px solid #EFEFEF;
                color: #4a4a4a;
                font-weight: 300;                
                min-width: 320px;
            }
            
            #user-dropdown li a
            {
                color: #4a4a4a;
                display: block;
                padding: 8px 15px;
                text-indent: 15px;
            }
            
            #user-dropdown li a:hover
            {   
                background-color: #EFEFEF;
                text-decoration: none;
            }
            
            #user-dropdown li.divider 
            {
                height: 2px;
                background-color: #EFEFEF;
                width : 100%;
            }
            
            .profile-header .profile-header-name 
            {
                font-size: 20px;
                white-space: nowrap;
                display: block;
            }
            
            .profile-header .profile-header-email {
                font-size: 12px;
                color: #898989;
            }
            
            /**
            css for bootbox
            */
            .modal-dialog .modal-content
            {
                border-radius: 6px !important;
            }
            
            .modal-dialog 
            {
                margin: 30px auto;
                width: 600px;
            }
            
            .modal-dialog .modal-header 
            {
                padding: 4px 8px;
            }

            .modal-dialog .modal-header h4
            {
                padding: 10px 20px;
            }
            
            .modal-dialog .modal-body
            {
                padding: 19px 0 10px 10px !important;
                width : 95% !important;
            }
            
            .modal-dialog .bootbox-body
            {
                font-size: 15px;
            }
            
            .modal-dialog .modal-footer
            {
                width : 95%;
            }
        </style>
    </head>
    <body cz-shortcut-listen="true" class="" style="padding: 0px; background-color: #EEEEEE;">
        <?= $this->element("language") ?>
        
        <div style="background-color: #FFF">
            <div class="container">
                <div class="navbar-header">

                    <button class="navbar-main-hamburger hamburger" id="hamburger-5" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </button>

                    <a class="navbar-brand dashboardLink" href="/"><img src="/img/company_name_blue.png"></a>
                </div>
                <div class="navbar-collapse row collapse" aria-expanded="false" style="height: 1px;">
                    <ul class="nav navbar-nav navbar-right userNav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle nav-profile-name css-toggler" data-toggler-target="#user-dropdown" data-toggler-class="hidden">
                                <img class="img-nav-avatar img-circle" src="/img/avatar.png">
                                <?= $auth_user["firstname"] ?> 
                                <span class="css-toggler"> 
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                            <ul id="user-dropdown" class="hidden">
                                <li class="profile-header">
                                    <a href="<?= $this->Html->url($home_link); ?>" style="text-indent: 0;">
                                        <img class="img-nav-avatar img-circle pull-left" src="/img/avatar.png">

                                        <div class="profile-header-info">
                                            <span class="profile-header-name"><?= trim($auth_user["firstname"] . " " . $auth_user["lastname"]) ?></span>
                                            <span class="profile-header-email"><?= $auth_user["email"] ?></span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?= $this->Html->url($home_link); ?>"><?= __("Dashboard") ?></a></li>
                                <li><a href="#"><?= __("Settings") ?></a></li>
                                <?php if (!$auth_user['is_premium']) : ?>
                                    <li>
                                        <a href="<?= $this->Html->url(array("controller" => "UserPayments", "action" => "payment_for_premium_user", "admin" => true)); ?>">
                                            <?= __("Become a Premium User") ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li><a href="/users/password/change"><?= __("Change Password") ?></a></li>
                                <li class="divider" style="margin-bottom:0;"></li>
                                <li class="profile-footer"><a href="/users/logout" id="logout"><?= __("Sign out") ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <?php echo $this->Session->flash(); ?>
            </div>
        </div>
        
        <?php echo $this->fetch('content'); ?>
        
    </body>
</html>
