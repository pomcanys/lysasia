<div class="row">


	<div class="col-sm-6 col-md-3">
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
	</div><!-- /.col-sm-6 .col-md-3 -->


	<div class="col-sm-6 col-md-3 col-md-push-6">
		<!-- Events -->
		<?php $events_query = new WP_Query('page_id=459'); 
		while($events_query->have_posts()) : $events_query->the_post(); ?>
			<a href="<?php the_permalink(); ?>">
				<div class="teaser green">
					<div class="teaser-img">
					<?php if(has_post_thumbnail()) {
						$image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id,'full', true);?>
						<img class="img-responsive" src="<?php echo $image_url[0]; ?>" alt="LY'S Haustee">
					<?php } ?>
					</div>
					<h3 class="color-bottom green hover"><?php the_title();?></h3>
				</div>
			</a>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
	</div><!-- /.col-sm-6 .col-md-3 .col-md-push-6 -->


	<div class="col-sm-12 col-md-6 col-md-pull-3">
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
	</div><!-- /.ccol-sm-12 .col-md-6 .col-md-pull-3 -->


</div><!-- /.row -->






