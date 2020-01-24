<?php
if(! defined('ABSPATH')) exit;

function quizbook_exams_add_metaboxes() {

    // Add Metabox to quizzes 
    add_meta_box( 'quizbook_exams_meta_box', 'Exam Questions', 'quizbook_exams_metaboxes', 'exams', 'normal', 'high', null );
}

add_action('add_meta_boxes', 'quizbook_exams_add_metaboxes');

function quizbook_exams_metaboxes($post) { 
    wp_nonce_field(basename(__FILE__), 'quizbook_exams_nonce');    
?>

    <table class="form-table">
        <tr>
            <th class="row-title" colspan="2">
                <h2>Select the questions you'd like to include in this exam</h2>
            </th>

        </tr>
        <tr>
            <th class="row-title">
                <label for="">Select from the list</label>
                <td>
                    <?php 
                        $args = array(
                            'post_type' => 'quizes',
                            'posts_per_page' => -1,
                        );
                        $questions = get_posts($args);
                        
                        if($questions):
                        ?>

                        <?php $selected = maybe_unserialize( get_post_meta( $post->ID, 'quizbook_exam', true ) ); ?>
                            <select data-placeholder="Choose a Question..." class="questions_select" multiple tabindex="4" name="quizbook_exam[]">
                                <option value=""></option>
                                <?php 
                                    foreach ($questions as $question): ?>
                                    <option <?php echo in_array($question->ID, $selected) ? 'selected' : '';  ?> value="<?php echo $question->ID; ?>"><?php echo $question->post_title; ?></option>
                                <?php endforeach; ?>                                    
                            </select>
                        <?php
                        else:
                            echo "<p>You need to add questions via Quize menu option on the left menu.</p>";
                        endif;
                    
                    ?>

                </td>
            </th>

        </tr>
    </table>

<?php
}

function quizbook_exams_save_metaboxes($post_id, $post, $update) {

    // Security clauses
    if(!isset($_POST['quizbook_exams_nonce']) || !wp_verify_nonce($_POST['quizbook_exams_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    if(!current_user_can( 'edit_post', $post_id )) {
        return $post_id;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    $answers = '';
    $answer_array = array();

    if(isset($_POST['quizbook_exam'])){
        $answers = $_POST['quizbook_exam'];

        foreach ($answers as $answer):
            $answer_array[] = sanitize_text_field( $answer );
        endforeach;
    }
    update_post_meta( $post_id, 'quizbook_exam', maybe_serialize($answer_array) );

}

add_action('save_post', 'quizbook_exams_save_metaboxes', 10, 3);