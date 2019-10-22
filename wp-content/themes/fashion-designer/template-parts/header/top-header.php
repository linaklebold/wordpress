<?php
/**
 * The template part for header
 *
 * @package Fashion Designer 
 * @subpackage fashion-designer
 * @since fashion-designer 1.0
 */
?>

<?php
  $fashion_designer_header_search = get_theme_mod( 'fashion_designer_header_search' );
  if ( 'Disable' == $fashion_designer_header_search ) {
   $colmd = 'offset-lg-2 col-lg-10 col-md-12';
  } else { 
   $colmd = 'offset-lg-2 col-lg-7 col-md-9';
  } 
?>

<div class="top-bar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 col-md-5 left-bg">
				<div class="row">
					<div class="offset-lg-1 col-lg-2 col-md-3 icon-ctr">
						<?php if(class_exists('woocommerce')){ ?>
				          	<span class="cart_no">
				            	<a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','fashion-designer' ); ?>" alt="<?php esc_attr_e( 'shopping cart','fashion-designer' );?>"><i class="fas fa-shopping-basket"></i><span class="screen-reader-text"><?php esc_attr_e( 'shopping cart','fashion-designer' );?></span></a>
				            	<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
				          	</span>
				        <?php } ?>
				    </div>
				    <div class="col-lg-9 col-md-9">
				    	<div class="row info-ctr">
				    		<?php if( get_theme_mod( 'fashion_designer_call_text') != '' || get_theme_mod( 'fashion_designer_call') != '') { ?>
		          			<div class="col-lg-2 col-md-3 col-3 icon-ctr">
				            	<i class="fas fa-phone"></i>
				          	</div>
				          	<div class="col-lg-10 col-md-9 col-9">
				            	<h6><?php echo esc_html(get_theme_mod('fashion_designer_call_text',''));?></h6>
				            	<p><?php echo esc_html(get_theme_mod('fashion_designer_call',''));?></p>
				          	</div>
				      		<?php }?>
				    	</div>
				    </div>
		      	</div>
		    </div>
		    <div class="col-lg-2 col-md-2">
		      	<div class="logo">
			        <?php if( has_custom_logo() ){ fashion_designer_the_custom_logo();
			          }else{ ?>
			            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			            <?php $description = get_bloginfo( 'description', 'display' );
			            if ( $description || is_customize_preview() ) : ?>
			            <p class="site-description"><?php echo esc_html($description); ?></p>
			        <?php endif; } ?>
		      	</div>
		    </div>
		    <div class="col-lg-5 col-md-5 right-bg">
		    	<div class="row">
		    		<div class="<?php echo esc_html( $colmd ); ?>">
		    			<div class="row info-ctr">
		    				<?php if( get_theme_mod( 'fashion_designer_email_text') != '' || get_theme_mod( 'fashion_designer_email') != '') { ?>
			          			<div class="col-lg-2 col-md-3 col-3 icon-ctr">
					            	<i class="fas fa-envelope"></i>
					          	</div>
					          	<div class="col-lg-10 col-md-9 col-9">
					            	<h6><?php echo esc_html(get_theme_mod('fashion_designer_email_text',''));?></h6>
					            	<p><?php echo esc_html(get_theme_mod('fashion_designer_email',''));?></p>
					          	</div>
					      	<?php }?>
		    			</div>
		    		</div>
		    		<?php if ( 'Disable' != $fashion_designer_header_search ) {?>
		    		<div class="col-lg-3 col-md-3">
		    			<div class="search-box">
		    				<span><i class="fas fa-search"></i></span>
		  				</div>
		  			</div>
		  			<?php } ?>
		    	</div>
		    </div>
		</div>
		<div class="serach_outer">
    		<div class="closepop"><i class="far fa-window-close"></i></div>
		    <div class="serach_inner">
		    	<?php get_search_form(); ?>
		    </div>
	  	</div>
	</div>
</div>