<?php
class Menu
{
    public static $links = array(
        array(
            "title" => "Members",
            "icon_class" => "icon-layers",
            "links" => array(
                array(
                    "title" => "Company Admins",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "users",
                        "action" => "index",
                        "admin" => true
                    ),
                    "other_links" => array(),
                    "is_home_page" => true,
                ),
                array(
                    "title" => "Sub Admins",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "users",
                        "action" => "company_sub_manager_summary",
                        "admin" => true
                    ),
                    "other_links" => array(),
                    "is_home_page" => true,
                ),
                array(
                    "title" => "Members",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "users",
                        "action" => "company_members_summary",
                        "admin" => true
                    ),
                    "other_links" => array(),
                    "is_home_page" => true,
                ),
            )
        ),
        array(
            "title" => "Menus & Links",
            "icon_class" => "icon-layers",
            "links" => array(
                array(
                    "title" => "Summary",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "ChartMenus",
                        "action" => "index",
                        "admin" => true
                    ),
                    "other_links" => array(),
                    "is_home_page" => true,
                ),
                array(
                    "title" => "Add",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "ChartMenus",
                        "action" => "add",
                        "admin" => true
                    ),
                    "other_links" => array(),
                ),
            )
        ),
        array(
            "title" => "Charts",
            "icon_class" => "icon-layers",
            "links" => array(
                array(
                    "title" => "Summary",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "ChartReports",
                        "action" => "index",
                        "admin" => true
                    ),
                    "other_links" => array(),
                    "is_home_page" => true,
                ),
                array(
                    "title" => "Add",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "ChartReports",
                        "action" => "add",
                        "admin" => true
                    ),
                    "other_links" => array(),
                ),
            )
        ),
        array(
            "title" => "Logs",
            "icon_class" => "icon-layers",
            "links" => array(
                array(
                    "title" => "Web Service Logs",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "Logs",
                        "action" => "web_service", "admin" => TRUE
                    ),
                    "other_links" => array(),
                ),
                array(
                    "title" => "Cron Job Logs",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "Logs",
                        "action" => "cron", "admin" => TRUE
                    ),
                    "other_links" => array(),
                ),
                array(
                    "title" => "Email Logs",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "Logs",
                        "action" => "email", "admin" => TRUE
                    ),
                    "other_links" => array(),
                ),
            )
        ),
    );
    
    
    public static function get($acl, $group_id)
    {
        if(!$group_id)
        {
            return array();
        }
        
        $menus = Cache::read("menu_" . $group_id, 'acl_config');
        
        if (!$menus)
        {
            $menus = array();
            
            foreach(self::$links as $menu)
            {
                foreach($menu["links"] as $k => $link)
                {
                    $action = $link['link']['action'];

                    if (isset($link['link']['admin']) && $link['link']['admin'] && strpos($action, "admin_") == FALSE)
                    {
                        $action = "admin_$action";
                    }

                    $url = $link['link']['controller'] . "/" . $action;

                    if (!$acl->check(array("model" => "Group", "foreign_key" => $group_id), $url))
                    {
                        unset($menu["links"][$k]);
                    }
                }

                if (!empty($menu["links"]))
                {
                    $menus[] = $menu;
                }
            }

            Cache::write("menu_" . $group_id, $menus, 'acl_config');
        }
     
        return $menus;
    }
    
    public static function getHomePageLink($menus)
    {
        foreach($menus as $menu)
        {
            foreach($menu["links"] as $submenu)
            {
                if (isset($submenu['is_home_page']))
                {
                    return $submenu["link"];
                }
            }
        }
    }
}