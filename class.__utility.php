<?php

require_once( 'class.__core.php' );

class Utility extends Core
{
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function mb_trim($str)
    {
        return preg_replace("/(^\s+)|(\s+$)/us", "", $str);
    }
}