<?php /* Template Name: 1-spaltig Slider gross */ ?>

<?php get_header(); ?>

					<!-- Content
					================================================== -->
					<div class="row teaser-row">

					 	<div class="col-md-9 col-md-push-3">
						<?php while ( have_posts() ) : the_post(); ?>

						<!-- Galerie -->
							<div class="swiper-container galerie">
									<div class="swiper-wrapper">
										<!-- Slides -->
										<?php 
										$images = get_field('slider');
										if( $images ): ?>
											<?php foreach( $images as $image ): ?>
												<div class="swiper-slide" style="background-image:url('<?php echo $image['sizes']['large']; ?>')"></div>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<!-- Add Arrows -->
									<div class="swiper-button-next swiper-button-white"></div>
									<div class="swiper-button-prev swiper-button-white"></div>
							</div>

						<?php endwhile; ?>
						</div><!-- /.col-md-9 -->

						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>
					
<?php get_footer(); ?>