<?php 
/**
 * Snippet Name: Add bootstrap classes for WP tables
 * Snippet URL: http://www.wpcustoms.net/snippets/add-bootstrap-classes-wp-tables/
 */
 function wpc_add_custom_table_class( $content ) {
return str_replace( '<table>', '<table class="table table-condensed table-striped">', $content );
}
add_filter( 'the_content', 'wpc_add_custom_table_class' );

?>