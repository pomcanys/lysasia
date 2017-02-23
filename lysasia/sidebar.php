
<?php if (is_tree(23)) { // Restaurant ?>
		<?php get_template_part('inc/tpl', 'restaurant'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'restaurant-below') ?>

<?php } elseif (is_tree(25)) { // Take Away ?>
		<?php get_template_part('inc/tpl', 'takeaway'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'takeaway-below') ?>

<?php } elseif (is_tree(27)) { // Take Out ?>
		<?php get_template_part('inc/tpl', 'takeout'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'takeout-below') ?>

<?php } elseif (is_tree(29)) { // Events ?>
		<?php get_template_part('inc/tpl', 'events'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'events-below') ?>

<?php } elseif (is_tree(31)) { // About ?>
		<?php get_template_part('inc/tpl', 'about'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'about-below') ?>

<?php } elseif (is_tree(33)) { // Contact ?>
		<?php get_template_part('inc/tpl', 'contact'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'contact-below') ?>

<?php } else { // Generic Pages ?>
		<?php get_template_part('inc/tpl', 'generic'); ?>
	</div><!-- /.row .teaser-row -->
	<?php get_template_part('inc/tpl', 'generic-below') ?>
<?php } ?>
