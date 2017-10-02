<style>
    .page-header.navbar .page-logo .logo-default {
        margin-top: 8px;
        max-width: 166px;
        height : 20px;
        margin-top: 12px;
    }
</style>
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="<?= $this->Html->url($home_link) ?>">
                <img src="/img/company_name.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> <?php echo trim($auth_user["firstname"] . " " . $auth_user["lastname"]); ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <?php 
                                echo $this->Html->link("<i class='fa fa-lock'></i> Change Password", 
                                    array( "controller" => "users", "action" => "admin_change_password"),
                                    array( "escape" => false)
                                );
                            ?>
                        </li>
                        <li>
                            <a href="/users/logout"> <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>