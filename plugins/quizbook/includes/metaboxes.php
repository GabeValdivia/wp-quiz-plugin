<?php
if(! defined('ABSPATH')) exit;

function quizbook_agregar_metaboxes() {

    // Add Metabox to quizzes 
    add_meta_box( 'quizbook_meta_box', 'Questions', 'quizbook_metaboxes', 'quizes', 'normal', 'high', null );
}

add_action('add_meta_boxes', 'quizbook_agregar_metaboxes');

/*
* Add HTML content to metabox
*/

function quizbook_metaboxes() { ?>
    <table>
        <tr>
            <th class="row-title">
                <h2>Add questions Here</h2>
            </th>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_1">a)</label>
            </th>
            <td>
                <input type="text" id="question_1" name="qb_question_1" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_2">b)</label>
            </th>
            <td>
                <input type="text" id="question_2" name="qb_question_2" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_3">c)</label>
            </th>
            <td>
                <input type="text" id="question_3" name="qb_question_3" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_4">d)</label>
            </th>
            <td>
                <input type="text" id="question_4" name="qb_question_4" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_5">e)</label>
            </th>
            <td>
                <input type="text" id="question_5" name="qb_question_5" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="correct_answer">Correct Answer</label>
            </th>
            <td>
                <select id="correct_answer" name="correct_answer" class="postbox">
                    <option value="">Choose the correct answer</option>
                    <option value="qb_correct:a">a</option>
                    <option value="qb_correct:b">b</option>
                    <option value="qb_correct:c">c</option>
                    <option value="qb_correct:d">d</option>
                    <option value="qb_correct:e">e</option>
                </select>
            </td>
        </tr>
    </table>

<?php
}

function quizbook_save_metaboxes($post_id, $post, $update) {
    $question_1 = $question_2 = $question_3 = $question_4 = $question_5 = $correct_answer = '';

    if(isset($_POST['qb_question_1'] )) {
        $question_1 = sanitize_text_field( $_POST['$qb_question_1'] );
    }

    update_post_meta($post_id, 'qb_question_1', $question_1 );
}

add_action('save_post', 'quizbook_save_metaboxes', 10, 3);













