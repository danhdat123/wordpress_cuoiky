<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-12 align-self-center text-lg-left">
        <?php $golf_course_logo_settings = get_theme_mod( 'golf_course_logo_settings','Different Line');
        if($golf_course_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) golf_course_the_custom_logo(); ?>
            <?php if( get_theme_mod('golf_course_site_title_text',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $golf_course_description = get_bloginfo( 'description', 'display' );
            if ( $golf_course_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('golf_course_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($golf_course_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($golf_course_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) golf_course_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if(get_theme_mod('golf_course_site_title_text',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $golf_course_description = get_bloginfo( 'description', 'display' );
                if ( $golf_course_description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('golf_course_site_tagline_text',false) != ''){ ?>
                    <p class="site-description"><?php echo esc_html($golf_course_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-4 col-6 align-self-center text-md-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-2 col-md-4 col-6 align-self-center text-lg-right text-md-right">
        <?php if( get_theme_mod( 'golf_course_header_button_link' ) != '' || get_theme_mod( 'golf_course_header_button' ) != '') { ?>
          <div class="more-btn">
            <a href="<?php echo esc_url( get_theme_mod( 'golf_course_header_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'golf_course_header_button','' ) ); ?></a>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
