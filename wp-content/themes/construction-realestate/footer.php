<?php
/**
 * The template for displaying the footer.
 * @package Construction Realestate
 */
?>
    <div class="footer-wp">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-1');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>
            </div>
        </div>
    </div>      
	<div class="inner">
        <div class="copyright-wrapper">
            <p><?php echo esc_html(get_theme_mod('construction_realestate_footer_copy',__('Theme Design & Developed By','construction-realestate'))); ?> <?php construction_realestate_credit(); ?></p>
        </div>
        <div class="clear"></div>
    </div>
        
    <?php wp_footer(); ?>

</body>
</html>