<?php get_header(); ?>

          <!-- Content
          ================================================== -->
          <div class="row teaser-row row-eq-height woo-twobars-container" >
			<div class="col-md-3 woo-left-side"> 
				<div class="woo-left-inner">
					<?php dynamic_sidebar( 'shop-left-cats' ); ?>
				</div>
				<div class="left-green vbottom">
					<?php dynamic_sidebar( 'shop-left-bottom' ); ?>
				</div>
			</div>
			<div class="col-md-6 woo-center">
              <div class="row main-row lightgrey shop-grey">
                <div class="col-md-12 main-full text-black">
                
				



		<?php	
		if (is_shop() ) {echo '<div class="main-shop">';}	
		else {echo '<div class="sub-shop">';} ?>


		<?php if ( have_posts() ) : ?>



			<?php woocommerce_product_loop_start(); ?>
			
			


				<?php woocommerce_product_subcategories(); ?>



			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
				
				
				
				
				
				
				
				 </div>
				
 
             </div >
			        
			<div class="col-md-3 woo-right-side"> 
				<div class="woo-right-inner">
					<?php dynamic_sidebar( 'shop-right-cart' ); ?>
				</div>
			</div>
		
		
          </div><!-- /.row .teaser-row -->


        
    
<?php get_footer(); ?>








