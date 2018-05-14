<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      // Get pages set in the customizer (if any)
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = absint( get_theme_mod( 'construction_realestate_slidersettings-page-' . $count ) );
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      
      if( !empty($pages) ) :
        $args = array(
          'posts_per_page' => 5,
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $count = 1;
          ?>
          <div id="slider" class="nivoSlider">
            <?php
              $construction_realestate_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $construction_realestate_n++;
                $construction_realestate_slideno[] = $construction_realestate_n;
                $construction_realestate_slidetitle[] = get_the_title();
                $construction_realestate_slideexcerpt[] = get_the_excerpt();
                $construction_realestate_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $construction_realestate_n ); ?>" />
                <?php
              $count++;
            endwhile;
            ?>
          </div>

          <?php
          $construction_realestate_k = 0;
            foreach( $construction_realestate_slideno as $construction_realestate_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $construction_realestate_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap">
                  <div class="container">
                    <div class="main-slide">
                      <h2><?php echo esc_html( $construction_realestate_slidetitle[$construction_realestate_k] ); ?></h2>
                      <p><?php echo esc_html( $construction_realestate_slideexcerpt[$construction_realestate_k] ); ?></p>
                      <div class="slide-button">
                        <a class="read-more" href="<?php echo esc_url( $construction_realestate_slidelink[$construction_realestate_k] ); ?>"><?php esc_html_e( 'Know More','construction-realestate' ); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $construction_realestate_k++;
          }
        else : ?>
            <div class="header-no-slider"></div>
          <?php
        endif;
      else : ?>
          <div class="header-no-slider"></div>
      <?php
      endif; 
    ?>
  </div>

<?php do_action( 'construction_realestate_below_slider' ); ?>

<?php /** About Us section **/ ?>
<section id="about">
  <div class="container">
    <?php if( get_theme_mod('construction_realestate_sec_title') != ''){ ?>     
      <h3><?php echo esc_html(get_theme_mod('construction_realestate_sec_title',__('About Us','construction-realestate'))); ?></h3>
    <?php }?>
    <?php
    $args = array( 'name' => esc_html(get_theme_mod('construction_realestate_about_post_setting','')));
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="mainbox">
          <p><?php the_content();?></p>
          <div class="clearfix"></div>
        </div>
      <?php endwhile; 
      wp_reset_postdata();?>
      <?php else : ?>
         <div class="no-postfound"></div>
       <?php
      endif; ?>
      <div class="clearfix"></div>
  </div> 
</section>

<?php do_action( 'construction_realestate_below_about' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>