<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Fashion Designer
 */
?>

<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'fashion-designer' ); ?></h1>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'fashion-designer' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fashion-designer' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'fashion-designer' ); ?></p><br />
	<div class="more-btn">
		<a href="<?php echo esc_url(home_url() ); ?>"><?php esc_html_e( 'Go Back', 'fashion-designer' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go Back', 'fashion-designer' ); ?></span></a>
	</div>
<?php endif; ?>