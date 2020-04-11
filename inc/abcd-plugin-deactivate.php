<?php
/**
 * @package Abcd Plugin
 **/

class AbcdPluginDeactivate 
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}