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