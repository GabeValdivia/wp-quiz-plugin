<?php
if(! defined('ABSPATH')) exit;

/*
* Use: [quizbook]
*/

function quizbook_shortcode(){ 
    $args = array(
        'post_type' => 'quizes',
        'posts_per_page' => 20
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
                                <div id="<?php echo get_the_ID() . ":" . $number[2]; ?>">
                                    <?php echo $option[0]; ?>
                                </div>
                            <?php }
                        }

                    ?>
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>

    </form><!-- form -->

<?php
}
add_shortcode( 'quizbook', 'quizbook_shortcode' );