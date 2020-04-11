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
    function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );  
    }

    // Activation
    function activate()
    {
        $this->custom_post_type();
        flush_rewrite_rules();

    }

    // Deactivation
    function deactivate()
    {
        flush_rewrite_rules();
    }

    // Uninstall
    function uninstall()
    {
        
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue()
    {
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
        wp_enqueue_style('mypluginscript', plugins_url('/assets/style.css', __FILE__));
    }

}

if ( class_exists('abcdPlugin') ) {
    $abcdplugin = new abcdPlugin();
    $abcdplugin->register();
}

register_activation_hook( __FILE__ , array($abcdplugin, 'activate') );

register_deactivation_hook( __FILE__ , array($abcdplugin, 'deactivate') );