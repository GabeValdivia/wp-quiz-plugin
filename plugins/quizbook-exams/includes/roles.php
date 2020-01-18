<?php

//Adds capabilities on activation
function quizbook_exams_add_capabilities() {

    $roles = array( 'administrator', 'editor', 'quizbook' );

    foreach( $roles as $the_role ) {
        $role = get_role( $the_role );
        $role->add_cap( 'read' );
        $role->add_cap( 'edit_exams' );
        $role->add_cap( 'publish_exams' );
        $role->add_cap( 'edit_published_exams' );
                $role->add_cap( 'edit_others_exams' );
    }

    $manager_roles = array( 'administrator', 'editor' );

    foreach( $manager_roles as $the_role ) {
        $role = get_role( $the_role );
        $role->add_cap( 'read_private_exams' );
        $role->add_cap( 'edit_others_exams' );
        $role->add_cap( 'edit_private_exams' );
        $role->add_cap( 'delete_exams' );
        $role->add_cap( 'delete_published_exams' );
        $role->add_cap( 'delete_private_exams' );
        $role->add_cap( 'delete_others_exams' );
    }

}

//Removes Task-level capabilities of Administrator, Editor, and Task Logger on deactivation
  
function quizbook_exams_remove_capabilities() {

    $manager_roles = array( 'administrator', 'editor' );

    foreach( $manager_roles as $the_role ) {
        $role = get_role( $the_role );
        $role->remove_cap( 'read' );
        $role->remove_cap( 'edit_exams' );
        $role->remove_cap( 'publish_exams' );
        $role->remove_cap( 'edit_published_exams' );
        $role->remove_cap( 'read_private_exams' );
        $role->remove_cap( 'edit_others_exams' );
        $role->remove_cap( 'edit_private_exams' );
        $role->remove_cap( 'delete_exams' );
        $role->remove_cap( 'delete_published_exams' );
        $role->remove_cap( 'delete_private_exams' );
        $role->remove_cap( 'delete_others_exams' );
    }

}