<?php
if(! defined('ABSPATH')) exit;

/*
* Use: [quizbook]
*/

function quizbook_shortcode(){
    echo "Hello from quizbook_shortcode in shortcode.php";
}
add_shortcode( 'quizbook', 'quizbook_shortcode' );