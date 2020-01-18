<?php
if(! defined('ABSPATH')) exit;

function quizbook_exams_add_metaboxes() {

    // Add Metabox to quizzes 
    add_meta_box( 'quizbook_exams_meta_box', 'Exam Questions', 'quizbook_exams_metaboxes', 'exams', 'normal', 'high', null );
}

add_action('add_meta_boxes', 'quizbook_exams_add_metaboxes');

function quizbook_exams_metaboxes() { ?>

    

<?php
}