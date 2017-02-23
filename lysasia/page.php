<?php get_header(); ?>

					<!-- Content
					================================================== -->
					<div class="row teaser-row">
					 <div class="col-md-9 col-md-push-3 ">
							<div class="row main-row lightgrey">
								<div class="col-md-12 main-full text-black">
								<?php while ( have_posts() ) : the_post(); ?>
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<?php the_content (); ?>
								<?php endwhile; ?>
								</div>
						 </div>
						</div><!-- /.col-md-9 -->

						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>
		
<?php get_footer(); ?>