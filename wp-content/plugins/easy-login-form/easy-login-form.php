<?php
/**
 * The file responsible for starting the Easy Login Form plugin
 *
 * The Easy Login Form is a plugin that allows you to change the
 * styling of the login form. This particular file is responsible
 * for including the dependencies and starting the plugin.
 *
 * @package ELF
 *
 * Plugin Name: Easy Login Form
 * Plugin URI: http://wordpress.org/plugins/easy-login-style
 * Description: Make a nicer login screen.
 * Version: 1.1
 * Author: Joaquín Ruiz
 * Author URI: http://jokiruiz.com
 * License: GPLv2
 *
 */


// If this file is called directly, then abort execution.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Include the core class responsible for loading all necessary components of the plugin.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-login-form.php';

/**
 * Instantiates the Easy Login Form class and then
 * calls its run method officially starting up the plugin.
 */
function run_easy_login_form() {

    $elf = new Easy_Login_Form();
    $elf->run();

}

run_easy_login_form();


/** THE END **/
