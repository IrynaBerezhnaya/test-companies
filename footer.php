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
                    <a href="#" class="ib-footer-logo">Logo
                    <p class="ib-footer-logo-text mb-0 pt-2">All Rights Reserved.</p>
                        <span class="ib-circle">C </span><span class="ib-footer-logo-text"> 2021</span></a>
                </div>
                <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                    <div class="list-group">
                        <h3 class="ib-title-footer">First column</h3>
                        <a href="" class="link-footer ib-link-footer">First link</a>
                        <a href="" class="link-footer ib-link-footer">Second link</a>
                        <a href="" class="link-footer ib-link-footer">Third link</a>
                        <a href="" class="link-footer ib-link-footer">Fourth link</a>
                    </div>
                </div>
                <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                    <div class="list-group">
                        <h3 class="ib-title-footer">Second column</h3>
                        <a href="" class="link-footer ib-link-footer">First link</a>
                        <a href="" class="link-footer ib-link-footer">Second link</a>
                        <a href="" class="link-footer ib-link-footer">Third link</a>
                        <a href="" class="link-footer ib-link-footer">Fourth link</a>
                    </div>
                </div>
                <div class="col-6 col-sm-3 col-lg-2 pb-4 pb-sm-0">
                    <div class="list-group">
                        <h3 class="ib-title-footer">Third column</h3>
                        <a href="" class="link-footer ib-link-footer">First link</a>
                        <a href="" class="link-footer ib-link-footer">Second link</a>
                        <a href="" class="link-footer ib-link-footer">Third link</a>
                        <a href="" class="link-footer ib-link-footer">Fourth link</a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-3">
                    <div class="list-group">
                        <h3 class="ib-title-footer">Subscribe </h3>
                        <input class="form-control me-2 ib-search-input" type="search" placeholder="Enter"
                               aria-label="Search">
                        <p class="ib-subscribe">Depending on the company, a user experience designer may need to be a jack of all trades</p>
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
		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>