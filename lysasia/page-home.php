<?php get_header(); ?>

          <!-- first row
          ================================================== -->
					<div class="row">

					<!-- BOX | Reservation -->
						<div class="col-xs-6">
						<?php $reservation_query = new WP_Query('page_id=82'); 
						while($reservation_query->have_posts()) : $reservation_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>">
								<div class="quick-navi pink center-height">
									<div class="inner">
										<h2>Reservation</h2>
										<h3>Restaurant</h3>
									</div>
								</div>
							</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						</div>

						<!-- BOX | Delivery / Take out  -->
						<div class="col-xs-6">
							<?php $delivery_query = new WP_Query('page_id=31');
							while($delivery_query->have_posts()) : $delivery_query->the_post(); ?>
							 <a href="<?php the_permalink(); ?>">
								<div class="quick-navi brown center-height">
									<div class="inner">
										<h2>About</h2>
										<h3>LY’S ASIA</h3>
									</div>
								</div>
							</a>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						</div>

					</div><!-- /.row -->



          <!-- (Teaser xs- and xm-only)
          ================================================== -->
					<div class="row">
						<!-- Bao Burger xs- and xm-only -->
						<div class="col-sm-12 visible-xs-block visible-sm-block">
						<!-- Teaserbox -->
						<?php $post_object = get_field('teaserfeld');
						if( $post_object ): 
							// override $post
							$post = $post_object;
							setup_postdata( $post ); 
						?>
							<?php if(get_field('alternlink'))
								{ echo '<a href="' . get_field('alternlink') . '">'; }
									else { ?>
								<a href="<?php the_permalink(); ?>">
							<?php } ?>			
								<div class="image-img">
								<?php if(has_post_thumbnail()) {
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
									<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Teaser">
								<?php } ?>
									<div class="teaser image center-height">
										<div class="inner">
											<h2><?php the_title();?></h2>
											<h3><?php the_field('subtitel'); ?></h3>
										</div>
									</div>
								</div>
							</a>
				    	<?php wp_reset_postdata();?>
						<?php endif; ?>
						</div>
					</div><!-- /.row -->
		
          <!-- second row
          ================================================== -->
					<div class="row teaser-row">
						<div class="col-sm-6 col-sm-push-6 col-md-9 col-md-push-3">
							<div class="row">

								<!-- Restaurant -->
								<div class="col-md-4">
								<?php $restaurant_query = new WP_Query('page_id=23'); 
								while($restaurant_query->have_posts()) : $restaurant_query->the_post(); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="teaser pink">
											<div class="teaser-img">
											<?php if(has_post_thumbnail()) {
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
												<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Restaurant">
											<?php } ?>
											</div>
											<h3 class="color-bottom pink hover"><?php the_title();?></h3>
										</div>
									</a>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); // reset the query ?>
								</div>

								<!-- Take Away -->
								<div class="col-md-4">
								<?php $takeaway_query = new WP_Query('page_id=25'); 
								while($takeaway_query->have_posts()) : $takeaway_query->the_post(); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="teaser green">
											<div class="teaser-img">
											<?php if(has_post_thumbnail()) {
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
												<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Take Away">
											<?php } ?>
											</div>
											<h3 class="color-bottom green hover"><?php the_title();?></h3>
										</div>
									</a>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); // reset the query ?>
								</div>

								<!-- Events -->
								<div class="col-md-4">
								<?php $events_query = new WP_Query('page_id=29'); 
								while($events_query->have_posts()) : $events_query->the_post(); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="teaser brown">
											<div class="teaser-img">
											<?php if(has_post_thumbnail()) {
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
												<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Events">
											<?php } ?>
											</div>
											<h3 class="color-bottom brown hover"><?php the_title();?></h3>
										</div>
									</a>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); // reset the query ?>
								</div>

	          		<!-- Bao Burger -->
								<div class="col-md-8 hidden-xs hidden-sm">
									<!-- Teaserbox -->
					<?php $post_object = get_field('teaserfeld');
						if( $post_object ): 
							// override $post
							$post = $post_object;
							setup_postdata( $post ); 
						?>
							<?php if(get_field('alternlink'))
								{ echo '<a href="' . get_field('alternlink') . '">'; }
									else { ?>
								<a href="<?php the_permalink(); ?>">
							<?php } ?>			
								<div class="image-img">
								<?php if(has_post_thumbnail()) {
									$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
									<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Teaser">
								<?php } ?>
									<div class="teaser image center-height">
										<div class="inner">
											<h2><?php the_title();?></h2>
											<h3><?php the_field('subtitel'); ?></h3>
										</div>
									</div>
								</div>
							</a>
				    	<?php wp_reset_postdata();?>
						<?php endif; ?>
								</div>



								<!-- News -->
								<div class="col-md-4 hidden-xs hidden-sm">
								<?php $poinz_query = new WP_Query('page_id=470'); 
									while($poinz_query->have_posts()) : $poinz_query->the_post(); ?>
										<a href="<?php the_permalink(); ?>">
											<div class="teaser grey hover center-height">
											<div class="inner">
												<h3><?php echo get_field( "teasertitel" );?></h3>
											</div>
										</div>
										</a>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); // reset the query ?>
								</div>

							</div><!-- /.row -->
						</div><!-- /.col-sm-6 .col-md-9 -->



          <!-- Öffnungszeiten
          ================================================== -->
						<div class="col-sm-6 col-sm-pull-6 col-md-3 col-md-pull-9">
							
							<div class="teaser-2-height grey">
								<h3>Öffnungszeiten</h3>
								<?php $args = array( 'p' => 40, 'post_type' => 'any');
								$oeff1_query = new WP_Query($args); 
								while($oeff1_query->have_posts()) : $oeff1_query->the_post(); ?>
								<p><strong><?php the_field('standort'); ?></strong></p>
								<?php the_content() ?>
								<?php endwhile; ?>

								<?php $args = array( 'p' => 17, 'post_type' => 'any');
								$oeff2_query = new WP_Query($args); 
								while($oeff2_query->have_posts()) : $oeff2_query->the_post(); ?>
								<?php the_content() ?>
								<?php endwhile; ?>

								<?php $args = array( 'p' => 41, 'post_type' => 'any');
								$oeff3_query = new WP_Query($args); 
								while($oeff3_query->have_posts()) : $oeff3_query->the_post(); ?>
								<p class="margin-top"><strong><?php the_field('standort'); ?></strong></p>
								<?php the_content() ?>
								<?php endwhile; ?>
							</div>
						</div><!-- /.col-sm-6 .col-md-3 -->

					</div><!-- /.row teaser-row -->
					
<?php get_footer(); ?>


