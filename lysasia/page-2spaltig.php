<?php /* Template Name: 2-spaltig ohne Slider*/ ?>

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
								<?php $image = get_field('bild_rechts');
								$size = '2sp';
								$thumb = $image['sizes'][ $size ];
								if( !empty($image) ): ?>
									<img class="img-responsive" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" height="575" />
								<?php endif; ?>
								<?php endwhile; ?>

								</div><!-- /.col-md-6 galerie -->
							</div><!-- /.row main-row -->
						</div><!-- /.col-md-9 -->

						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>
					
		
<?php get_footer(); ?>