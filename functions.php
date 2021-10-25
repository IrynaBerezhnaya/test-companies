<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function add_scripts_and_styles() {
	$theme   = wp_get_theme( 'twentytwentyone' );
	$version = $theme->get( 'Version' );

	wp_dequeue_style( 'twenty-twenty-one-style' );

	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), false );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), true );

	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), $version );
	wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/assets/fonts/fonts.css', array(), $version );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), $version );


	//Push some data to main JS file:
	wp_localize_script( 'main', 'ib_localize', array(
			'admin_url' => admin_url( 'admin-ajax.php' ),
		)
	);

}

add_action( 'wp_enqueue_scripts', 'add_scripts_and_styles', 20 );

/**
 * Load textdomain
 */
function ib_load_theme_textdomain() {
	load_child_theme_textdomain( 'twentytwentyone-child', get_stylesheet_directory_uri() . '/languages' );
}

add_action( 'after_setup_theme', 'ib_load_theme_textdomain' );

if ( ! function_exists( 'write_log' ) ) {

	function write_log( $variable, $text_before = '' ) {

		if ( ini_get( 'log_errors' ) === 'On' ) {
			error_log( '------' . $text_before . '------' );
			error_log( gettype( $variable ) );
			if ( is_array( $variable ) || is_object( $variable ) ) {
				error_log( print_r( $variable, true ) );
			} else {
				error_log( $variable );
			}
		}
	}
}


function mb_var_dump( $variable, $text_before = '' ) {

	$text_before = ! empty ( $text_before ) ? $text_before . ': ' : '';

	echo '<pre class="' . $text_before . '">' . $text_before;
	var_dump( $variable );
	echo '</pre>';
}

/**
 * Ajax filter
 */
function ib_filter_companies_ajax_handler() {

	$filter_data = isset( $_POST['filter_data'] ) ? $_POST['filter_data'] : '';

	if ( ! empty( $filter_data ) ) {

		$result = array();
		parse_str( $filter_data, $result );

		$tax_query = array( 'relation' => 'OR' );
		if ( isset( $result['categories'] ) && ! empty( $result['categories'] ) ) {
			$tax_query[] = array(
				'taxonomy' => 'company_categories',
				'field'    => 'slug',
				'terms'    => $result['categories'],
			);
		}

		if ( isset( $result['types'] ) && ! empty( $result['types'] ) ) {
			$tax_query[] = array(
				'taxonomy' => 'company_types',
				'field'    => 'slug',
				'terms'    => $result['types'],
			);
		}

		$args = array(
			'orderby'        => 'date',
			'post_type'      => 'company',
			'posts_per_page' => - 1,
			'tax_query'      => $tax_query,
		);


		$query    = new WP_Query( $args );
		$response = '';

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) : $query->the_post();
				$response .= ib_display_companies();
			endwhile;
			wp_reset_postdata();
		} else {
			$response = 'empty';
		}

		echo $response;
		wp_die();
	}
}

add_action( 'wp_ajax_nopriv_ib_filter_companies', 'ib_filter_companies_ajax_handler' );
add_action( 'wp_ajax_ib_filter_companies', 'ib_filter_companies_ajax_handler' );

/**
 * Display Сompanies
 */
function ib_display_companies() {
	global $post;

	echo '<div class="ib-company">';

	$attachment_id = get_field( 'ib_logo' );
	$size          = array( 180, 180 );
	$image         = wp_get_attachment_image_src( $attachment_id, $size );

	$ratingstar = get_field( 'ib_star_rating' );

	echo '<img src="' . $image[0] . '" />';

	echo '<h2>';
	the_title();
	echo '</h2>';

	echo '<p class="ib-categories">' . __('Categories: ', 'twentytwentyone-child');
	$terms = get_the_terms( $post->ID, 'company_categories' );

	foreach ( $terms as $term ) {
		echo $term->name;
	}
	echo '</p>';

	echo '<p class="ib-types">' . __('Types: ', 'twentytwentyone-child');
	$terms = get_the_terms( $post->ID, 'company_types' );

	foreach ( $terms as $term ) {
		echo $term->name;
	}
	echo '</p>';

	echo '<p class="ib-price">' . __('Starting at ', 'twentytwentyone-child');
	the_field( 'ib_price' );
	echo '</p>';

	echo '<span class="far fa-star ';
	if ( $ratingstar >= 1 ) {
		echo 'checked';
	}
	echo '"></span>';

	echo '<span class="far fa-star ';
	if ( $ratingstar >= 2 ) {
		echo 'checked';
	}
	echo '"></span>';

	echo '<span class="far fa-star ';
	if ( $ratingstar >= 3 ) {
		echo 'checked';
	}
	echo '"></span>';

	echo '<span class="far fa-star ';
	if ( $ratingstar >= 4 ) {
		echo 'checked';
	}
	echo '"></span>';

	echo '<span class="far fa-star ';
	if ( $ratingstar == 5 ) {
		echo 'checked';
	}
	echo '"></span>';

	echo '</div>';

}