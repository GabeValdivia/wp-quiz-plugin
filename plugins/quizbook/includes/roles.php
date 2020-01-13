<?php 

function  quizbook_create_role(){
    add_role( 'quizbook', 'Quiz' );
}

function quizbook_remove_role() {
    remove_role('quizbook', 'Quiz');
}