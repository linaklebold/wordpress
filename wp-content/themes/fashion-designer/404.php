<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Fashion Designer
 */

get_header(); ?>

<div class="container">
	<main id="maincontent" role="main">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','fashion-designer' ), esc_html__( 'Not Found', 'fashion-designer' ) ) ?></h1>
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'fashion-designer' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'fashion-designer' ); ?></p>
		<div class="more-btn">
	        <a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Go Back', 'fashion-designer' ); ?></a>
	    </div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>