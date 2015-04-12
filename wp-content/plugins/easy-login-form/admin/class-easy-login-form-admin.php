<?php

/**
 * The Easy Login Form is a plugin that allows you to change the
 * styling of the login form. This particular file is responsible
 * for including the dependencies and starting the plugin.
 *
 * @package ELF
 */


class Easy_Login_Form_Admin {

    /**
     * A reference to the version of the plugin that is passed to this class from the caller.
     *
     * @access private
     * @var    string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initializes this class and stores the current version of this plugin.
     *
     * @param    string    $version    The current version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of this
     * meta box.
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'easy-login-form-admin',
            plugin_dir_url( __FILE__ ) . 'css/easy-login-form-admin.css',
            array(),
            $this->version,
            FALSE
        );
    }

    /**
     * Registers the options page that will be used to set the timeout length.
     */
    public function create_theme_elf_page() {
        add_options_page('Easy Login Form', 'Easy Login Form', 'manage_options', 'options_elf_page',
            'Easy_Login_Form_Admin::build_elf_options_page','dashicons-art');
    }
    /**
     * Requires the file that is used to display the user interface of the post meta box.
     */
    public function build_elf_options_page() {
        require_once plugin_dir_path( __FILE__ ) . 'partials/easy-login-form.php';
    }

    /**
     * Registers the filter for adding the settings page link to the plugin list
     *
     * @param $links
     * @return mixed
     */
    public function elf_settings_link($links) {
        $settings_link = '<a href="options-general.php?page=options_elf_page">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    /**
     * Registers the settings of the options page previously defined.
     */
    public function register_elf_mysettings() {
        //register our settings
        register_setting( 'elf', 'elf');
    }

    /**
     * Registers the action filter for the login form styling.
     */
    function custom_elf_login_logo() {
        $opt = get_option('elf'); // #003A41  #005d67  #ffffff
        echo '<style type="text/css">
            .login h1 a {
                background-image: url('.get_template_directory_uri().'/'.$opt['logo'].') !important;
                background-size: contain;
                height: 150px !important;
                width: 150px !important;
                margin-bottom: 0px;
            }
            body {
                background: '.$opt['back'].';
            }
            #login {
                background: '.$opt['fback'].';
                padding-top:0px;
                top: 8%;
                position: relative;
                border-radius: 5px;
            }
            .login h1 {
            }
            .login #backtoblog a, .login #nav a {
                text-decoration: none;
                color: '.$opt['ffront'].' !important;
            }
            .login form {
                margin-top:0px
            }
            </style>';
    }


}
