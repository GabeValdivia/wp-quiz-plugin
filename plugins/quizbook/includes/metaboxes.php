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

function quizbook_metaboxes($post) { 
    wp_nonce_field(basename(__FILE__),'quizbook_nonce');
    ?>
    <table>
        <tr>
            <th class="row-title">
                <h2>Add questions Here</h2>
            </th>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_a">a)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_question_a', true )); ?>" type="text" id="question_a" name="qb_question_a" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_b">b)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_question_b', true )); ?>" type="text" id="question_b" name="qb_question_b" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_c">c)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_question_c', true )); ?>" type="text" id="question_c" name="qb_question_c" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_d">d)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_question_d', true )); ?>" type="text" id="question_d" name="qb_question_d" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="question_e">e)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_question_e', true )); ?>" type="text" id="question_e" name="qb_question_e" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="correct_answer">Correct Answer</label>
            </th>
            <td>
                <?php $correct = esc_html(get_post_meta( $post->ID, 'correct_answer', true )); ?>
                <select id="correct_answer" name="correct_answer" class="postbox">
                    <option value="">Choose the correct answer</option>
                    <option <?php selected($correct, 'qb_correct:a'); ?> value="qb_correct:a">a</option>
                    <option <?php selected($correct, 'qb_correct:b'); ?> value="qb_correct:b">b</option>
                    <option <?php selected($correct, 'qb_correct:c'); ?> value="qb_correct:c">c</option>
                    <option <?php selected($correct, 'qb_correct:d'); ?> value="qb_correct:d">d</option>
                    <option <?php selected($correct, 'qb_correct:e'); ?> value="qb_correct:e">e</option>
                </select>
            </td>
        </tr>
    </table>

<?php
}

function quizbook_save_metaboxes($post_id, $post, $update) {

    // Security clauses
    if(!isset($_POST['quizbook_nonce']) || !wp_verify_nonce($_POST['quizbook_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    if(!current_user_can( 'edit_post', $post_id )) {
        return $post_id;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    $question_1 = $question_2 = $question_3 = $question_4 = $question_5 = $correct_answer = '';
    // question 1
    if(isset($_POST['qb_question_a'] )) {
        $question_1 = sanitize_text_field( $_POST['qb_question_a'] );
    }
    update_post_meta($post_id, 'qb_question_a', $question_1 );

    // question 2
    if(isset($_POST['qb_question_b'] )) {
        $question_2 = sanitize_text_field( $_POST['qb_question_b'] );
    }
    update_post_meta($post_id, 'qb_question_b', $question_2 );

    // question 3
    if(isset($_POST['qb_question_c'] )) {
        $question_3 = sanitize_text_field( $_POST['qb_question_c'] );
    }
    update_post_meta($post_id, 'qb_question_c', $question_3 );

    // question 4
    if(isset($_POST['qb_question_d'] )) {
        $question_4 = sanitize_text_field( $_POST['qb_question_d'] );
    }
    update_post_meta($post_id, 'qb_question_d', $question_4 );

    // question 1
    if(isset($_POST['qb_question_e'] )) {
        $question_5 = sanitize_text_field( $_POST['qb_question_e'] );
    }
    update_post_meta($post_id, 'qb_question_e', $question_5 );

    // correct answer
    if(isset($_POST['correct_answer'] )) {
        $correct = sanitize_text_field( $_POST['correct_answer'] );
    }
    update_post_meta($post_id, 'correct_answer', $correct );
}

add_action('save_post', 'quizbook_save_metaboxes', 10, 3);













