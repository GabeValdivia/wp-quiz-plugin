<?php
if(! defined('ABSPATH')) exit;

function quizbook_agregar_metaboxes() {

    // Add Metabox to quizzes 
    add_meta_box( 'quizbook_meta_box', 'Respuestas', 'quizbook_metaboxes', 'quizes', 'normal', 'high', null );
}

add_action('add_meta_boxes', 'quizbook_agregar_metaboxes');