<?php
Class StaticArray
{
    public static $status_types = array(
        1 => "Success",
        0 => "Failure"
    );
}

Class EmailTypes
{
    const ACCOUNT_ACTIVATE = 1;
    const FORGOT_PASSWORD = 2;
    const RESUME_PUBLISH = 3;
    
    public static $list = array(
        self::ACCOUNT_ACTIVATE => "Account Activate",
        self::FORGOT_PASSWORD => "Forgot password",
        self::RESUME_PUBLISH => "Resume Publish",
    );
}

Class MenuTypes
{
    const MENU = 1;
    const LINK = 2;
    
    public static $list = array(
        self::MENU => "Menu",
        self::LINK => "Link"
    );
}

class ReportTypes
{
    const INTERNAL = 1;
    const EXTERNAL = 2;
    
    public static $list = array(
        self::INTERNAL => "Internal (CSV)",
        self::EXTERNAL => "External (URL)"
    );
}