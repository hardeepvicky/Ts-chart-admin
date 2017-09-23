<?php
class WebServiceTypes
{
    const LOGIN = 1;
    const GET_COMPANY_DETAILS = 2;
    const GET_MENU_REPORTS = 3;
    
    public static function getList()
    {
        $oClass = new ReflectionClass(__CLASS__);
        $constants = $oClass->getConstants();
        
        $list = array();
        
        foreach ($constants as $k => $v)
        {
            $list[$k] = $v;
        }
        return $list;
    }   
}
