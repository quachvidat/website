<?php

/**
 * The Easy Login Form is a plugin that allows you to change the
 * styling of the login form. This particular file is responsible
 * for including the dependencies and starting the plugin.
 *
 * @package ELF
 */

class Easy_Login_Form {

    /**
     * A reference to the loader class that coordinates the hooks and callbacks
     * throughout the plugin.
     *
     * @access protected
     * @var    Easy_Login_Form_Loader   $loader    Manages hooks between the WordPress hooks and the callback functions.
     */
    protected $loader;

    /**
     * Represents the slug of hte plugin that can be used throughout the plugin
     * for internationalization and other purposes.
     *
     * @access protected
     * @var    string   $plugin_slug    The single, hyphenated string used to identify this plugin.
     */
    protected $plugin_slug;

    /**
     * Maintains the current version of the plugin so that we can use it throughout
     * the plugin.
     *
     * @access protected
     * @var    string   $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Instantiates the plugin by setting up the core properties and loading
     * all necessary dependencies and defining the hooks.
     *
     * The constructor will define both the plugin slug and the version
     * attributes, but will also use internal functions to import all the
     * plugin dependencies, and will leverage the Single_Post_Meta_Loader for
     * registering the hooks and the callback functions used throughout the
     * plugin.
     */
    public function __construct() {

        $this->plugin_slug = 'easy-login-form-slug';
        $this->version = '1.1';

        $this->load_dependencies();
        $this->define_admin_hooks();

    }

    /**
     * Imports the Easy Timeout Session administration classes, and the Easy Login Form Loader.
     *
     * The Easy Login Form administration class defines all unique functionality for
     * introducing custom functionality into the WordPress dashboard.
     *
     * The Easy Login Form Loader is the class that will coordinate the hooks and callbacks
     * from WordPress and the plugin. This function instantiates and sets the reference to the
     * $loader class property.
     *
     * @access    private
     */
    private function load_dependencies() {

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-easy-login-form-admin.php';

        require_once plugin_dir_path( __FILE__ ) . 'class-easy-login-form-loader.php';
        $this->loader = new Easy_Login_Form_Loader();

    }

    /**
     * Defines the hooks and callback functions that are used for setting up the plugin stylesheets
     * and the plugin's meta box.
     *
     * This function relies on the Single Post Meta Manager Admin class and the Single Post Meta Manager
     * Loader class property.
     *
     * @access    private
     */
    private function define_admin_hooks() {

        $admin = new Easy_Login_Form_Admin( $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );

        $this->loader->add_action( 'admin_menu', $admin, 'create_theme_elf_page' );
        $this->loader->add_action( 'admin_init', $admin, 'register_elf_mysettings' );

        $this->loader->add_action('login_head', $admin, 'custom_elf_login_logo');

        $plugin = "easy-login-form/easy-login-form.php";
        $this->loader->add_filter( "plugin_action_links_$plugin" , $admin, 'elf_settings_link');
    }

    /**
     * Sets this class into motion.
     *
     * Executes the plugin by calling the run method of the loader class which will
     * register all of the hooks and callback functions used throughout the plugin
     * with WordPress.
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * Returns the current version of the plugin to the caller.
     *
     * @return    string    $this->version    The current version of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}