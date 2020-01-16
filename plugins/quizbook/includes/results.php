<?php 

if(! defined('ABSPATH')) exit;

// Receives parameters via quizbook.js and returns AJAX results

function quizbook_results() {
    $answer = array(
        'answer' => $_POST
    );

    header('Content-type: application/json');
    echo json_encode($answer);
    die();
}

add_action('wp_ajax_nopriv_quizbook_results', 'quizbook_results');
add_action('wp_ajax_quizbook_results', 'quizbook_results');