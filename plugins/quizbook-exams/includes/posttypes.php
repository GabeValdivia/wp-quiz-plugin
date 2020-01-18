<?php
/*
* Registrar Post Types
*/
if(! defined('ABSPATH')) exit;

add_action( 'init', 'quizbook_exams_post_type' );

function quizbook_exams_post_type() {
	$labels = array(
		'name'               => _x( 'Exams', 'post type general name', '' ),
		'singular_name'      => _x( 'Exam', 'post type singular name', '' ),
		'menu_name'          => _x( 'Exams', 'admin menu', '' ),
		'name_admin_bar'     => _x( 'Exam', 'add new on admin bar', '' ),
		'add_new'            => _x( 'Add New', 'book', '' ),
		'add_new_item'       => __( 'Add New Exam', '' ),
		'new_item'           => __( 'New Exam', '' ),
		'edit_item'          => __( 'Edit Exam', '' ),
		'view_item'          => __( 'See Exam', '' ),
		'all_items'          => __( 'All Exams', '' ),
		'search_items'       => __( 'Search Exams', '' ),
		'parent_item_colon'  => __( 'Parent Exam:', '' ),
		'not_found'          => __( 'No exams found.', '' ),
		'not_found_in_trash' => __( 'There are no exams in the trash.', '' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Gives you the ability to create exams.', '' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'exams' ),
		'capability_type'    => array('exam', 'exams'),
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-welcome-write-blog',
		'has_archive'        => true,
		'hierarchical'       => false,
        'supports'           => array( 'title' ),
        'map_meta_cap'       => true,
	);

	register_post_type( 'exams', $args );
}

/**
 * Flush rewrite rules on activation.
 */
function quizbook_exams_rewrite_flush() {
	quizbook_exams_post_type();
	flush_rewrite_rules();
}
   
