<?php
if(! defined('ABSPATH')) exit;

function quizbook_exams_add_metaboxes() {

    // Add Metabox to quizzes 
    add_meta_box( 'quizbook_exams_meta_box', 'Exam Questions', 'quizbook_exams_metaboxes', 'exams', 'normal', 'high', null );
}

add_action('add_meta_boxes', 'quizbook_exams_add_metaboxes');

function quizbook_exams_metaboxes() { ?>

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
                            <select data-placeholder="Choose a Question..." class="questions_select" multiple tabindex="4">
                                <option value=""></option>
                                <?php 
                                    foreach ($questions as $question): ?>
                                    <option value="<?php echo $question->ID; ?>"><?php echo $question->post_title; ?></option>
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