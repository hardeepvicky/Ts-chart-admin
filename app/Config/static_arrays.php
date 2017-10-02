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
    const COMPANY_BLOCK = 2;
    const COMPANY_UNBLOCK = 3;
    const FORGOT_PASSWORD = 4;
    
    public static $list = array(
        self::ACCOUNT_ACTIVATE => "Account Activate",
        self::COMPANY_BLOCK => "Company Blocked",
        self::COMPANY_UNBLOCK => "Company Un-Blocked",
        self::FORGOT_PASSWORD => "Forgot password",
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
    const EXTERNAL_URL = 2;
    
    public static $list = array(
        self::INTERNAL => "CSV",
        self::EXTERNAL_URL => "External URL"
    );
}

class ChartTypes
{
    const LINE = 1;
    const BAR = 2;
    const COLUMN = 3;
    const PIE = 4;
    const AREA = 5;
    
    public static $list = array(
        self::LINE => "Line",
        self::BAR => "Bar",
        self::COLUMN => "Column",
        self::PIE => "Pie",
        self::AREA => "Area",
    );
}