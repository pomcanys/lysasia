<?php get_header(); ?>

          <!-- Content
          ================================================== -->
          <div class="row teaser-row row-eq-height woo-twobars-container" >
			<div class="col-md-3 woo-left-side">
                <!-- DELIVERY POPUP -->

                <div class="delivery-popup">
                    <h3 class="delivery-title">delivery</h3>
                    <select name="zip-code" id="zip-code">
                        <option selected="true" disabled="disabled" value="PLZ auswählen">PLZ auswählen</option>
                        <option value="8001">8001</option>
                        <option value="8002">8002</option>
                        <option value="8005">8005</option>
                        <option value="8004">8004</option>
                        <option value="8006">8006</option>
                        <option value="8008">8008</option>
                        <option value="8032">8032</option>
                        <option value="8037">8037</option>
                        <option value="8038">8038</option>
                        <option value="8044">8044</option>
                        <option value="8045">8045</option>
                        <option value="8037">8037</option>
                        <option value="8064">8064</option>
                    </select>
                    <h3 class="delivery-title">take out</h3>
                    <ul id="shops">
                        <li>> Maag-Areal</li>
                        <li>> Bahnhof Stadelhofen</li>
                    </ul>
                </div>
                <!-- END DELIVERY POPUP -->

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
				
				
				<div class="reset-button" style="display: none;">
                    <span>
                        <a href="/">Zurücksetzen</a>
                    </span>
                </div>
				
				 </div>
				
 
             </div >
			        
			<div class="col-md-3 woo-right-side">
				<div class="woo-right-inner">
					<?php dynamic_sidebar( 'shop-right-cart' ); ?>
				</div>
			</div>
		
		
          </div><!-- /.row .teaser-row -->


        
    
<?php get_footer(); ?>








