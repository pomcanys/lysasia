<div class="col-md-3 col-md-pull-9">


	<!-- Tisch reservieren -->
	<?php $reservation_query = new WP_Query('page_id=82'); 
	while($reservation_query->have_posts()) : $reservation_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>">
			<div class="teaser pink hover center-height smaller-height">
				<div class="inner">
					<h3><?php echo get_field( "teasertitel" );?></h3>
				</div>
			</div>
		</a>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>


	<div class="row row-sm">

		<!-- Öffnungszeiten -->
		<div class="col-sm-6 col-md-12">
			<div class="teaser oeffnung grey text-left larger-height">
				<h3>Öffnungszeiten</h3>
				<?php $post_object = get_field('oeffnungszeitenfeld');
				if( $post_object ): 
					// override $post
					$post = $post_object;
					setup_postdata( $post ); 
					?>
					<p><strong><?php the_field('standort'); ?></strong></p>
					<?php the_content() ?>
					<?php wp_reset_postdata();?>
				<?php endif; ?>
			</div>
		</div><!-- /.col-sm-6 .col-md-12 -->
									
		<!-- Restaurant Menu -->
		<div class="col-sm-6 col-md-12">
			<?php $menu_query = new WP_Query('page_id=77'); 
			while($menu_query->have_posts()) : $menu_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<div class="teaser pink larger-height">
						<div class="teaser-img">
							<?php if(has_post_thumbnail()) {
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
								<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="Menu">
							<?php } ?>
						</div>
						<h3 class="color-bottom pink hover"><?php the_title(); ?></h3>
					</div>
				</a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); // reset the query ?>
		</div><!-- /.col-sm-6 .col-md-12 -->

	</div><!-- /.row .row-sm-->


</div><!-- /.col-md-3 .col-md-pull-9 -->


