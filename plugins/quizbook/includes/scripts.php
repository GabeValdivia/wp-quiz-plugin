<?php 

function quizbook_frontend_styles(){
    wp_enqueue_style( 'quizbook_css', plugins_url('../assets/css/quizbook.css' ,  __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'quizbook_frontend_styles');