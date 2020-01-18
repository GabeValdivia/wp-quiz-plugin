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

function quizbook_exams_check() {
    if(!function_exists('quizbook_post_type')) {

        add_action('admin_notices', 'quizbook_exam_error_activate');

        deactivate_plugins( plugin_basename(__FILE__));
    }
}
add_action('admin_init', 'quizbook_exams_check');

function quizbook_exam_error_activate() {
    $class =  'notice notice-error';
    $message = 'An error has occured, please install and activate Quizbook before installing Quizbook Exams';
    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message) );
}
