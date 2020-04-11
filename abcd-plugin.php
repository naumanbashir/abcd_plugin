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

if ( ! class_exists('abcdPlugin') ) {

    class abcdPlugin
    {   
        public $plugin;

        public function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        function register()
        {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );  
        
            add_action( 'admin_menu', array( $this, 'add_admin_pages') );

            add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link') );
        }

        public function add_admin_pages()
        {
            add_menu_page('ABCD Plugin', 'ABCD', 'manage_options', 'adcd_plugin', array( $this, 'admin_menu_index' ), 'dashicons-store', 110);
        }

        public function admin_menu_index()
        {
            require_once plugin_dir_path(__FILE__).'templates/admin.php';
        }
        
        public function settings_link( $links )
        {
            $settings_link = '<a href="admin.php?page=adcd_plugin">Settings</a>';
            array_push( $links, $settings_link );
            return $links;
        }

        function enqueue()
        {
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
            wp_enqueue_style('mypluginscript', plugins_url('/assets/style.css', __FILE__));
        }
        
        // Activation
        function activate()
        {
            require_once plugin_dir_path(__FILE__).'inc/abcd-plugin-activate.php';
            AbcdPluginActivate::activate();
        }
        
        // Deactivation
        function deactivate()
        {
            require_once plugin_dir_path(__FILE__).'inc/abcd-plugin-deactivate.php';
            AbcdPluginDeactivate::deactivate();
        }
        
        function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type')); 
        }

        function custom_post_type() {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

    }

    $abcdplugin = new abcdPlugin();
    $abcdplugin->register();

    register_activation_hook( __FILE__ , array($abcdplugin, 'activate') );
    register_deactivation_hook( __FILE__ , array($abcdplugin, 'deactivate') );

}