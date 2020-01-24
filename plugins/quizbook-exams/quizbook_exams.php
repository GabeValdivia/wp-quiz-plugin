<?php
/*
 Plugin Name: Quizbook Exams
 Plugin URI:
 Description: Extends Quizbook so that you can create custom exams in your project. (Add-on)
 Version: 1.0
 Author: Gabriel S Valdivia
 URL: https://portfolio.gabeswebcoding.com
 License: GPLv3
 License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 Text Domain: quizbook
*/
if(! defined('ABSPATH')) exit;

//Checks to see that the core plugin exists

function quizbook_exams_check() {
    if(!function_exists('quizbook_post_type')) {

        add_action('admin_notices', 'quizbook_exam_error_activate');

        deactivate_plugins( plugin_basename(__FILE__));
    }
}
add_action('admin_init', 'quizbook_exams_check');

// Error message in case core plugin is not found

function quizbook_exam_error_activate() {
    $class =  'notice notice-error';
    $message = 'An error has occured, please install and activate Quizbook before installing Quizbook Exams';
    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message) );
}

//Creates exams  post type

require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'quizbook_exams_rewrite_flush'); 

// Adds roles and permissions for Quizbook Exam
require_once plugin_dir_path( __FILE__ ) . 'includes/roles.php';
register_activation_hook( __FILE__, 'quizbook_exams_add_capabilities' );
register_deactivation_hook( __FILE__, 'quizbook_exams_remove_capabilities' );


// Adds Metaboxes to Quizbook Exams post types
require_once plugin_dir_path( __FILE__ ) . 'includes/metaboxes.php';

// Adds CSS y JS to Plugin
require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';

// Adds shortcode needed to print exams by ID
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';

// Adds new columns to the admin panel for exams post type
require_once plugin_dir_path( __FILE__ ) . 'includes/columns.php';