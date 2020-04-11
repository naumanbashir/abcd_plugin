<?php
/**
 * Plugin Name
 *
 * @package           Abcd Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Abcd Plugin
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 **/

defined ('ABSPATH') or die('You don\'t have access to files');

class abcdPlugin
{
    // Activation
    protected function activate()
    {

    }

    // Deactivation
    protected function deactivate()
    {
        
    }

    // Uninstall
    protected function uninstall()
    {
        
    }

}

if ( class_exists('abcdPlugin') ) {
    $abcdplugin = new abcdPlugin();
}

register_activation_hook( __FILE__ , array($abcdplugin, 'activate') );

register_deactivation_hook( __FILE__ , array($abcdplugin, 'deactivate') );