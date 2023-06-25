<?php
/**
 * Template part for displaying slider section
 *
 * @package Golf Course
 * @subpackage golf_course
 */

?>

<?php if( get_theme_mod( 'golf_course_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $golf_course_slide_pages = array();
      for ( $golf_course_count = 1; $golf_course_count <= 4; $golf_course_count++ ) {
        $golf_course_mod = intval( get_theme_mod( 'golf_course_slider_page' . $golf_course_count ));
        if ( 'page-none-selected' != $golf_course_mod ) {
          $golf_course_slide_pages[] = $golf_course_mod;
        }
      }
      if( !empty($golf_course_slide_pages) ) :
        $golf_course_args = array(
          'post_type' => 'page',
          'post__in' => $golf_course_slide_pages,
          'orderby' => 'post__in'
        );
        $golf_course_query = new WP_Query( $golf_course_args );
        if ( $golf_course_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $golf_course_query->have_posts() ) : $golf_course_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $golf_course_excerpt = get_the_excerpt();echo esc_html( golf_course_string_limit_words( $golf_course_excerpt,15 ) ); ?></p>
              <?php if( get_theme_mod( 'golf_course_slider_button',true) != '') { ?>
                <div class="more-btn">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Join Our Club','golf-course'); ?></a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
