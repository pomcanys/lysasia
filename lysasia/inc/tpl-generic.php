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

	<!-- Öffnungszeiten -->
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
									

</div><!-- /.col-md-3 .col-md-pull-9 -->


