<?php /* Template Name: 2-spaltig Slider*/ ?>

<?php get_header(); ?>

					<!-- Content
					================================================== -->
					<div class="row teaser-row">

					 <div class="col-md-9 col-md-push-3">
							<!-- Hauptinhalt -->
							<div class="row main-row lightgrey">
								<div class="col-md-6 main text-black">
								<?php while ( have_posts() ) : the_post(); ?>
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<?php the_content (); ?>

								</div><!-- /.col-md-6 test-black -->

								<div class="col-md-6 galerie">
							<div class="swiper-container">
									<div class="swiper-wrapper">
										<!-- Slides -->
										<?php 
										$images = get_field('sliderschmal');
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


								</div><!-- /.col-md-6 galerie -->
							</div><!-- /.row main-row -->
						</div><!-- /.col-md-9 -->


						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>

					
<?php get_footer(); ?>