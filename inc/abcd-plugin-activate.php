<?php
/**
 * @package Abcd Plugin
 **/

class AbcdPluginActivate 
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}