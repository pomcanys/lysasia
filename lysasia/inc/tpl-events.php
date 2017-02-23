<div class="col-md-3 col-md-pull-9">


	<!-- Tisch reservieren -->
	<?php $freunde_query = new WP_Query('page_id=292'); 
	while($freunde_query->have_posts()) : $freunde_query->the_post(); ?>
		<a href="<?php the_permalink(); ?>">
			<div class="teaser brown hover center-height smaller-height">
				<div class="inner">
					<h3><?php the_title();?><br><?php echo get_field( "teasertitel" );?></h3>
				</div>
			</div>
		</a>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); // reset the query ?>


	<!-- Öffnungszeiten -->
	<div class="teaser-2-height grey">
		<?php echo get_field( "graue_box_hoch" );?>
	</div>
									

</div><!-- /.col-md-3 .col-md-pull-9 -->


