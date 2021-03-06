<?php
/*
 * Template Name: Custom Home Page
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/group-vectors_rigth.png"
         class="ib-group-vectors-right" alt="">
</div>

<div class="container">
    <div class="row d-flex flex-xl-nowrap ib-main-container">
        <div class="col-xl-6 ib-main-left-block">
            <div class="ib-group-vectors ib-circles-left">

				<?php
				global $post;

				$post_id = get_post_thumbnail_id( $post->ID );

				$url_main_image = wp_get_attachment_url( $post_id, 'thumbnail' );
				$alt            = get_post_meta( $post_id, '_wp_attachment_image_alt', true );
				?>

                <img src="<?php echo $url_main_image ?>" class="ib-main-image" alt="<?php echo $alt ?>"/>

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/group-vectors_left.png"
                     class="ib-group-vectors-left" alt="">
            </div>
        </div>
        <div class="col-xl-6 ib-main-text">

			<?php the_content(); ?>

			<?php get_search_form(); ?>

        </div>
    </div>
    <p class="ib-nav-company-types">
		<?php echo '<a href="#">' . __( 'Companies', 'twentytwentyone-child' ) . '</a>  /'; ?>
		<?php echo '<a href="#">' . __( 'Company Activities', 'twentytwentyone-child' ) . '</a>  /'; ?>
		<?php echo '<a href="#">' . __( 'Company Types', 'twentytwentyone-child' ) . '</a>'; ?>
    </p>
    <div class="ib-company-block d-flex">
        <div class="ib-loop-categories-types">
            <form id="filter">
				<?php
				$categories = get_terms( [
					'taxonomy' => 'company_categories',
					'exclude'  => Array( 1 ),
				] );
				$tags       = get_terms( [
					'taxonomy' => 'company_types'
				] );

				if ( ! empty( $categories ) ) {
					echo '<fieldset class="taxonomy__js" data-taxonomy="company_category">';
					echo '<h4>' . __( 'All Сompany Сategories:', 'twentytwentyone-child' ) . '</h4>';
					foreach ( $categories as $category ) : ?>
                        <div class="ib-company-list-categories">
                            <input type="checkbox" name="categories[]"
                                   id="company_categories_<?php echo $category->term_id; ?>"
                                   value="<?php echo $category->slug; ?>" data-slug="<?php echo $category->slug; ?>">
                            <label for="company_categories_<?php echo $category->term_id; ?>"> <?php echo $category->name; ?> </label>
                        </div>
					<?php endforeach;
					echo '</fieldset>';
				}


				if ( ! empty( $tags ) ) {
					echo '<fieldset class="taxonomy__js" data-taxonomy="company_type">';
					echo '<h4 class="ib-title-company-types">' . __( 'All Сompany Types:', 'twentytwentyone-child' ) . '</h4>';

					foreach ( $tags as $tag ) : ?>
                        <div class="ib-company-list-types">
                            <input type="checkbox" name="types[]" id="company_types_<?php echo $tag->term_id; ?>"
                                   value="<?php echo $tag->slug; ?>" data-slug="<?php echo $tag->slug; ?>">
                            <label for="company_types_<?php echo $tag->term_id; ?>"> <?php echo $tag->name; ?> </label>
                        </div>
					<?php endforeach;
					echo '</fieldset>';
				}
				echo '<button type="submit" class="btn btn-light ib-btn-filter">' . __( 'Filter', 'twentytwentyone-child' ) . '</button>';
				?>

                <input type="hidden" name="action" value="myfilter">
            </form>

        </div>

        <div class="d-flex flex-wrap ib-custom-posts" id="companies">
			<?php
			$posts_per_page = get_option( 'posts_per_page' );

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} else if ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$args = array( 'post_type' => 'company', 'posts_per_page' => $posts_per_page, 'paged' => $paged, );
			$loop = new WP_Query( $args );


			while ( $loop->have_posts() ) : $loop->the_post();

				ib_display_companies();

			endwhile;


			wp_reset_postdata(); ?>

        </div>

    </div>
	<?php echo '<div class="ib-pagination" id="pagination">';

	$post_qty = $loop->found_posts;
	$page     = 1;
	ib_show_pagination( $post_qty, $page );

	echo '</div>'; ?>

</div>

<div>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/group-vectors_bottom.png"
         class="ib-group-vectors-bottom" alt="">
</div>

<?php get_footer(); ?>
