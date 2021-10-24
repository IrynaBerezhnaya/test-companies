<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>
    <nav class="navbar navbar-expand-lg navbar-dark ib-bg-dark ib-navbar pb-0 pt-0 d-flex justify-content-between">
        <div class="container">
            <a class="navbar-brand ib-navbar-brand" href="<?php echo get_home_url(); ?>" rel="home">COMPANIES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="d-flex ib-form-search">
                    <input class="form-control me-2 ib-search-input" type="search" placeholder="Search"
                           aria-label="Search">
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-2">
                    <li class="nav-item">
                        <a class="nav-link ib-nav-link active" aria-current="page" href="#">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ib-nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ib-nav-link" href="#">About Us</a>
                    </li>
                </ul>

            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-person ib-bi-person"
                 viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>

            <button type="button" class="btn btn-outline-light ib-btn-sign_in">Entry</button>
            <button type="button" class="btn btn-outline-success ib-btn-register">Register now</button>

        </div>
    </nav>

    <div id="content" class="site-content">
        <div id="primary" class="content-area container ib-content-area">
            <main id="main" class="site-main" role="main">