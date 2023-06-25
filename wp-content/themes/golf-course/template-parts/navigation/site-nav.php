<?php
/*
* Display Theme menus
*/
?>
<?php
$golf_course_sticky = get_theme_mod('golf_course_sticky');
    $golf_course_data_sticky = "false";
    if ($golf_course_sticky) {
    $golf_course_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="menubar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($golf_course_data_sticky); ?>">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-12 col-md-10 col-8 align-self-center">
	      		<div class="innermenubox">
	      			<?php if(has_nav_menu('primary-menu')){ ?>
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="golf_course_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','golf-course'); ?></span></button>
	          			</div>
          			<?php }?>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'golf-course' ); ?>">
			              	<?php if(has_nav_menu('primary-menu')){
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	} ?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="golf_course_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','golf-course'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	    </div>
  	</div>
</div>
