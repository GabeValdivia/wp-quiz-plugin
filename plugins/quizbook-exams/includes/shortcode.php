<?php
if(! defined('ABSPATH')) exit;

/*
* Use: [quizbook_exam questions="" order="" id=""]
*/

function quizbook_examp_shortcode( $atts ){ 

    //Read shortcode ID for the exam
    $exam_id = (int) $atts['id'];

    $questions = maybe_unserialize( get_post_meta( $exam_id, 'quizbook_exam', true ) );


    $args = array(
        'post_type' => 'quizes',
        'posts_per_page' => $atts['questions'],
        'orderby' => $atts['order'],
        'post__in' => $questions
    );
    $quizbook = new WP_Query($args);
    ?>
    <form name="quizbook_send" id="quizbook_send"  >    
    <div id="quizbook" class="quizbook">
        <ul>
            <?php while($quizbook->have_posts() ): $quizbook->the_post(); ?>
                <li>
                    <?php the_title('<h2>', '</h2>');
                          the_content(); ?>
                    <?php

                        $options = get_post_meta( get_the_ID() );
                        foreach ($options as $key => $option ) {
                            $result = quizbook_filter_questions($key);                            

                            if($result === 0){ 
                                $number = explode('_', $key);
                                ?>
                                <div id="<?php echo get_the_ID() . ":" . $number[2]; ?>" class="answer">
                                    <?php echo $option[0]; ?>
                                </div>
                            <?php }
                        }

                    ?>
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <input type="submit" value="Submit" id="quizbook_btn_submit">

    <div id="quizbook-result"></div>
    </form><!-- form -->

<?php
}
add_shortcode( 'quizbook_exam', 'quizbook_examp_shortcode' );