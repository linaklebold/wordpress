<?php
/**
 * The template part for displaying image post
 *
 * @package Fashion Designer
 * @subpackage fashion-designer
 * @since fashion-designer 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="entry-content">
        <h1><?php the_title();?></h1>    
        <div class="entry-attachment">
            <div class="attachment">
                <?php fashion_designer_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( fashion_designer_string_limit_words( $excerpt, esc_attr(get_theme_mod('fashion_designer_excerpt_number','30')))); ?></p>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'fashion-designer' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'fashion-designer' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <div class="clearfix"></div>
</article>