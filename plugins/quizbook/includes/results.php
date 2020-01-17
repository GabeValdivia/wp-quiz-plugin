<?php 
if(! defined('ABSPATH')) exit;

// Receives parameters via quizbook.js and returns AJAX results

function quizbook_results() {

    if(isset($_POST['data'])) {
        $answers = $_POST['data'];
    }

    $result = 0;

    foreach ($answers as $resp) {
        //$question[0] = post_id (question number)
        //$question[1] = user's selected answer
        $question = explode(':', $resp);

        

        $correct = get_post_meta($question[0], 'correct_answer', true);  
        
        //$letter_correct[0] = qb_correct
        //$letter_correct[1] = letter answer
        $letter_correct = explode(':', $correct);

                if($letter_correct[1] === $question[1] ) {
            $result += 20;
        }

    }
    

    $exam_score = array(
        'score' => $result
    );

    header('Content-type: application/json');
    echo json_encode($exam_score);
    die();
}
add_action('wp_ajax_nopriv_quizbook_results', 'quizbook_results');
add_action('wp_ajax_quizbook_results', 'quizbook_results');