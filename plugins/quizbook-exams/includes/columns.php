<?php
if(! defined('ABSPATH')) exit;

// Add a new column to admin dashboard
function quizbook_exam_new_column($defaults){
    $defaults['shortcode'] = 'Shortcode';
    return $defaults;
}
add_filter('manage_exams_posts_columns','quizbook_exam_new_column');

// Value to display
function quizbook_exams_show_shortcode_columns($column){
    if($column === 'shortcode'){
        $exam_id = get_the_ID();
        echo "[quizbook_exam questions='' order='' id='$exam_id']";
    }
}
add_action('manage_exams_posts_custom_column', 'quizbook_exams_show_shortcode_columns', 5, 1);