<?php
/**
 * The template part for header
 *
 * @package Fashion Designer 
 * @subpackage fashion-designer
 * @since fashion-designer 1.0
 */
?>

<button class="toggleMenu toggle" role="tab"><?php esc_html_e('Menu','fashion-designer'); ?></button>
<div id="header">
	<div class="container">
		<nav class="menubar" role="navigation">
			<div class="nav" >
				<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
			</div>
		</nav>
	</div>
</div>