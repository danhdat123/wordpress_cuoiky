<?php
/**
 * Template part for displaying about section
 *
 * @package Golf Course
 * @subpackage golf_course
 */

?>

<section id="about">
  <div class="container">
    <div class="row">
      <?php $golf_course_about_page = array();
        $golf_course_mod = absint( get_theme_mod( 'golf_course_about_page' ));
        if ( 'page-none-selected' != $golf_course_mod ) {
          $golf_course_about_page[] = $golf_course_mod;
        }
      if( !empty($golf_course_about_page) ) :
        $golf_course_args = array(
          'post_type' => 'page',
          'post__in' => $golf_course_about_page,
          'orderby' => 'post__in'
        );
        $golf_course_query = new WP_Query( $golf_course_args );
        if ( $golf_course_query->have_posts() ) :
          while ( $golf_course_query->have_posts() ) : $golf_course_query->the_post(); ?>
          <div class="col-lg-6 col-md-6 align-self-center">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <h4><?php the_title(); ?></h4>
            <p><?php the_excerpt(); ?></p>
            <div class="more-btn">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Play Now','golf-course'); ?></a>
            </div>
          </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
