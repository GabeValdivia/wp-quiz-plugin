<?php
/*
 Plugin Name: Quizbook
 Plugin URI:
 Description: Plugin for adding quizzes in WordPress.
 Version: 1.0
 Author: Gabriel S Valdivia
 URL: https://portfolio.gabeswebcoding.com
 License: GPLv3
 License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 Text Domain: quizbook
*/
if(! defined('ABSPATH')) exit;

/*
* Add Quizzes post-types
*/

 require_once plugin_dir_path( __FILE__ ) . 'includes/posttypes.php';


/*
* Regenerate URL tables upon activation
*/

register_activation_hook( __FILE__, 'quizbook_rewrite_flush' );

/*
* Add Metaboxes to quizzes post-types
*/

 require_once plugin_dir_path( __FILE__ ) . 'includes/metaboxes.php';


 /*
* Add Roles to quizzes
*/

 require_once plugin_dir_path( __FILE__ ) . 'includes/roles.php';
 register_activation_hook( __FILE__, 'quizbook_create_role' );
 register_deactivation_hook( __FILE__, 'quizbook_remove_role' );

/*
* Add Capabilities to quizzes
*/

 register_activation_hook( __FILE__, 'quizbook_add_capabilities' );
 register_deactivation_hook( __FILE__, 'quizbook_remove_capabilities' );

/*
* Add Shortcode
*/

require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';

/*
* Add Functions file
*/

require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';

/*
* Add Scripts & Stylesheets
*/

require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';

/*
* Get exam results
*/

require_once plugin_dir_path( __FILE__ ) . 'includes/results.php';