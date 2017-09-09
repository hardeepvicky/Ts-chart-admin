<?php
class Menu
{
    public static $links = array(
        array(
            "title" => "Member Manager",
            "icon_class" => "icon-layers",
            "links" => array(
                array(
                    "title" => "Sub Admins",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "users",
                        "action" => "sub_admin",
                        "admin" => true
                    ),
                    "is_home_page" => true,
                    "other_links" => array(),
                ),
                array(
                    "title" => "Members",
                    "icon_class" => "fa fa-reorder",
                    "link" => array(
                        "controller" => "users",
                        "action" => "members",
                        "admin" => true
                    ),
                    "is_home_page" => true,
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