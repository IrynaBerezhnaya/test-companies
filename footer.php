<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<footer id="colophon" class="site-footer ib-footer" role="contentinfo">

    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-3 col-lg-3">
				<?php echo '<a href="#" class="ib-footer-logo">' . __( 'Logo', 'twentytwentyone-child' ); ?>
				<?php echo '<p class="ib-footer-logo-text mb-0 pt-2">' . __( 'All Rights Reserved.', 'twentytwentyone-child' ) . '</p>'; ?>
				<?php $current_year = date( 'Y' ); ?>
				<?php echo '<p class="ib-footer-logo-text">&copy; ' . $current_year . '</p></a>'; ?>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                <div class="list-group">
					<?php echo '<h3 class="ib-title-footer">' . __( 'First column', 'twentytwentyone-child' ) . '</h3>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'First link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Second link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Third link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Fourth link', 'twentytwentyone-child' ) . '</a>'; ?>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                <div class="list-group">
					<?php echo '<h3 class="ib-title-footer">' . __( 'Second column', 'twentytwentyone-child' ) . '</h3>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'First link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Second link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Third link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Fourth link', 'twentytwentyone-child' ) . '</a>'; ?>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                <div class="list-group">
					<?php echo '<h3 class="ib-title-footer">' . __( 'Third column', 'twentytwentyone-child' ) . '</h3>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'First link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Second link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Third link', 'twentytwentyone-child' ) . '</a>'; ?>
					<?php echo '<a href="#" class="link-footer ib-link-footer">' . __( 'Fourth link', 'twentytwentyone-child' ) . '</a>'; ?>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-lg-3">
                <div class="list-group">

					<?php echo get_field( 'ib_form' ); ?>

					<?php echo '<p class="ib-subscribe">' . __( 'Depending on the company, a user experience designer may need to be a jack
                        of all trades', 'twentytwentyone-child' ) . '</p>'; ?>
                </div>
            </div>
        </div>
    </div>


	<?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
            </ul><!-- .footer-navigation-wrapper -->
        </nav><!-- .footer-navigation -->
	<?php endif; ?>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
