<div class="col-md-3 col-md-pull-9">


	<!-- Tisch reservieren -->
		<a href="mailto:contact@lys-asia.ch">
			<div class="teaser brown hover center-height smaller-height">
				<div class="inner">
					<h3>Kontakt per <br>E-Mail</h3>
				</div>
			</div>
		</a>


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


