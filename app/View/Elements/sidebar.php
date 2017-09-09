<?php 
    $action = str_replace("admin_", "", $action);
?>
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>

        <?php foreach($menus as $parent_menu): ?>
        <li class="nav-item start">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="<?= $parent_menu["icon_class"] ?>"></i>
                <span class="title"><?= $parent_menu["title"] ?></span>
                <span class="selected"></span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <?php 
                    foreach($parent_menu["links"] as $menu)
                    {
                        $active = ($menu["link"]["controller"] == $controller && $menu["link"]["action"] == $action);

                        foreach($menu["other_links"] as $other_link)
                        {
                            if (!$active)
                            {
                                $active = ($other_link["controller"] == $controller && $other_link["action"] == $action);
                            }
                        }
                ?>
                    <li class="nav-item <?= $active ? "active open" : "" ?>">
                        <a href="<?= $this->Html->url($menu["link"]) ?>" class="nav-link">
                            <?php 
                            if (!is_array($menu["icon_class"]))
                            {
                                $menu["icon_class"] = array($menu["icon_class"]);
                            }
                            ?>
                            <?php foreach($menu["icon_class"] as $fa_class): ?>
                                <i class="<?= $fa_class ?>"></i>
                            <?php endforeach; ?>
                            <span class="title"><?= $menu['title'] ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<script type="text/javascript">
    var parent = $("ul.sub-menu li.active").parents("li");
    parent.addClass("active open");
    parent.find(".arrow").addClass("open");
</script>