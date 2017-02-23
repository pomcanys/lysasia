<?php get_header(); ?>

					<?php get_template_part( 'page-content');
					
					if (is_checkout()){}
					
					else {	get_sidebar(); }
					?>

	
		
<?php get_footer(); ?>