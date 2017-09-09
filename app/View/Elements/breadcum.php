<?php
    $show_action_links = isset($show_action_links) ? $show_action_links : true;
    $action = str_replace("admin_", "", $action);
?>

<ul class="page-breadcrumb">
    <li>
        <a href="<?= $this->Html->url($home_link) ?>">  
            <i class="fa fa-home"></i>Home
        </a>
    </li>
    <li>
        <span> <?php echo $model; ?></span>
    </li>
    <li>
        <span> <?php echo $action; ?></span>
    </li>
</ul>