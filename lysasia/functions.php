<?php
/**
 * Theme's Functions and Definitions
 *
 *
 * @package       WordPress
 * @subpackage    Pomcanys
 * @author        Pascal Mueller
 * @version       1.0
 *
 *
 * 1) SECURITY
 * 2) FTP
 * 3) BACKEND
 * 4) EDITOR
 * 5) HEADER
 * 6) NAVIGATION
 * 7) LAYOUT
 * 8) SIDEBAR
 * 9) FOOTER
 * 10) CUSTOM
 */



/*	/////////////////////////////////////////////////////////////////////////////////
    S E C U R I T Y
	///////////////////////////////////////////////////////////////////////////////// */


	/*	remove log-in error messages
	--------------------------------------------------------------------------------- */
	add_filter('login_errors',create_function('$a', "return null;"));


	/*	Hide Usernames from Classes
	--------------------------------------------------------------------------------- */
	function pomcanys_remove_comment_author_class( $classes ) {
		foreach( $classes as $key => $class ) {
			if(strstr($class, "comment-author-")) {
				unset( $classes[$key] );
			}
		}
		return $classes;
	}
	add_filter( 'comment_class' , 'pomcanys_remove_comment_author_class' );




/*	/////////////////////////////////////////////////////////////////////////////////
	F T P
	///////////////////////////////////////////////////////////////////////////////// */


	/*	If Host doesn't support updating etc. from Backend (uncomment if necessary)
	--------------------------------------------------------------------------------- */
	// define('FTP_HOST', 'ftp.xyz.ch');
	// define('FTP_USER', 'usernamexyz');
	// define('FTP_PASS', 'passxyz');




/*	/////////////////////////////////////////////////////////////////////////////////
	B A C K E N D
	///////////////////////////////////////////////////////////////////////////////// */



	/*	Remove Links and Comments in Admin-Menu
	--------------------------------------------------------------------------------- */
	add_action( 'admin_menu', 'my_admin_menu' );
	function my_admin_menu() {
	remove_menu_page('link-manager.php'); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	}


	/*	Customized Footer in Admin Area
	--------------------------------------------------------------------------------- */
	add_filter( 'admin_footer_text', 'my_admin_footer_text' );
	function my_admin_footer_text( $default_text ) {
		 return '<span id="footer-thankyou">Website by <a href="https://pomcanys.ch">Pomcanys Marketing AG</a><span> | Powered by <a href="http://www.wordpress.org">WordPress</a>';
	}




/*	/////////////////////////////////////////////////////////////////////////////////
	E D I T O R
	///////////////////////////////////////////////////////////////////////////////// */


	/*	This theme styles the visual editor with editor-style.css to match the theme style.
	--------------------------------------------------------------------------------- */
	add_editor_style();


	
	/*	Add support for a variety of post formats
	--------------------------------------------------------------------------------- */
	// add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );


	/*	Add post-formats to post_type 'page'
	--------------------------------------------------------------------------------- */
	// add_post_type_support( 'page', 'post-formats' );


	


	/*	PDF Support
	--------------------------------------------------------------------------------- */
	function modify_post_mime_types( $post_mime_types ) {
	// select the mime type, here: 'application/pdf'
	// then we define an array with the label values
	$post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
	// then we return the $post_mime_types variable
	return $post_mime_types;
	}
	// Add Filter Hook
	add_filter( 'post_mime_types', 'modify_post_mime_types' );





/*	/////////////////////////////////////////////////////////////////////////////////
	H E A D E R
	///////////////////////////////////////////////////////////////////////////////// */




	/*	remove version-number
	--------------------------------------------------------------------------------- */
	remove_action('wp_head', 'wp_generator');


	/*	remove version-number from rss feed
	--------------------------------------------------------------------------------- */
	function wpt_remove_version() {
	   return '';
	}
	add_filter('the_generator', 'wpt_remove_version');


/*	Remove Emojis inline stuff.
	--------------------------------------------------------------------------------- */
	function disable_wp_emojicons() {

	  // all actions related to emojis
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
	add_action( 'init', 'disable_wp_emojicons' );


	/*	Add default posts and comments RSS feed links to <head>.
	--------------------------------------------------------------------------------- */
	add_theme_support( 'automatic-feed-links' );


	/*	jQuery-JS  and Bootstrap-JS
	--------------------------------------------------------------------------------- */


	function ds_print_jquery_in_footer( &$scripts) {
			$scripts->add_data( 'jquery', 'group', 1 );
	}
	add_action( 'wp_default_scripts', 'ds_print_jquery_in_footer' );

	    function theme_js() {
	 		// load scripts only in frontend; not in admin section
			// deregister Wordpress' jQuery
				//wp_deregister_script('jquery');
				// register another jQuery Version
				// wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', array(), null, true);
				// load the registered jQuery Version
				// wp_enqueue_script('jquery');
				// register bootstrap.js
				wp_register_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array('jquery'), '3.0.2', true);
				// load Bootstrap.js in Footer
				wp_enqueue_script('bootstrap');
	    	}
		add_action('wp_enqueue_scripts', 'theme_js');




/*	/////////////////////////////////////////////////////////////////////////////////
	N A V I G A T I O N
	///////////////////////////////////////////////////////////////////////////////// */


	/*	This theme uses wp_nav_menu()
	--------------------------------------------------------------------------------- */
	add_theme_support( 'menus' );            // wp menus


	/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	--------------------------------------------------------------------------------- */
	function twentyeleven_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'twentyeleven_page_menu_args' );


	/*	Twitter Bootstrap Navigation Walker
	--------------------------------------------------------------------------------- */
	require_once( get_template_directory() . '/bootstrap/wp_bootstrap_navwalker.php' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lysasia' ),
	) );




/*	/////////////////////////////////////////////////////////////////////////////////
	L A Y O U T
	///////////////////////////////////////////////////////////////////////////////// */


	/* Breadcrumbs
	--------------------------------------------------------------------------------- */
	 //require ( get_template_directory() . '/bootstrap/wp_bootstrap_breadcrumbs.php' );


	/* Prints HTML with meta information for the current post-date/time
	--------------------------------------------------------------------------------- */
	if ( ! function_exists( 'pomcanys_posted_on' ) ) :

	function pomcanys_posted_on() {
		$post_date = the_date( 'Y-m-d','','', false );
		$month_ago = date( "Y-m-d", mktime(0,0,0,date("m")-1, date("d"), date("Y")) );
		if ( $post_date > $month_ago ) {
			$post_date = sprintf( __( 'vor %1$s', 'pomcanys' ), human_time_diff( get_the_time('U'), current_time('timestamp') ) );
		} else {
			$post_date = get_the_date();
		}
		printf( __( '<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>', 'pomcanys' ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( $post_date )
		);
	}
	endif;


	/* Sets the post excerpt length to 20 words.
	--------------------------------------------------------------------------------- */
	function pomcanys_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'pomcanys_excerpt_length' );



	/* Replaces "[...]"
	--------------------------------------------------------------------------------- */
	function new_excerpt_more( $more ) {
		return ' (...)';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	/* Prevent Page Scroll When Clicking the More Link
	--------------------------------------------------------------------------------- */
	function remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


	/*	Display navigation to next/previous pages when applicable
	--------------------------------------------------------------------------------- */
	function twentyeleven_content_nav( $nav_id ) {
		global $wp_query;

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $nav_id; ?>">
				<h3 class="assistive-text">Navigation></h3>
				<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> &Auml;ltere Eintr&auml;ge' ); ?></div>
				<div class="nav-next"><?php previous_posts_link( 'Neuere Eintr&auml;ge <span class="meta-nav">&rarr;</span>' ); ?></div>
			</nav><!-- #nav-above -->
		<?php endif;
	}


	/* Gallery-Layout for Bootstrap
	--------------------------------------------------------------------------------- */
	//require ( get_template_directory() . '/bootstrap/wp_bootstrap_gallerycode.php' );


	/*	This function removes inline styles set by WordPress gallery
	--------------------------------------------------------------------------------- */
	function responsive_remove_gallery_css($css) {
   	 return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
	}

	add_filter('gallery_style', 'responsive_remove_gallery_css');


	/*	Set default Gallery Colums
	--------------------------------------------------------------------------------- */
	function gallery_columns($content) {
		$columns = 4;
		$pattern = array(
			'#(\[gallery(.*?)columns="([0-9])"(.*?)\])#ie',
			'#(\[gallery\])#ie',
			'#(\[gallery(.*?)\])#ie'
		);
		$replace = 'stripslashes(strstr("\1", "columns=\"$columns\"") ? "\1" : "[gallery \2 \4 columns=\"$columns\"]")';
		return preg_replace($pattern, $replace, $content);
	}
	add_filter('the_content', 'gallery_columns');


	/*	If more than one page exists, return TRUE
	--------------------------------------------------------------------------------- */
	function show_posts_nav() {
		global $wp_query;
		return ($wp_query->max_num_pages > 1);
	}


	/*	JPG-Kompression (default: 90)
	--------------------------------------------------------------------------------- */
	//add_filter( 'jpeg_quality', create_function( '', 'return 60;' ) );


	/*	Add Post Thumbnails
	--------------------------------------------------------------------------------- */
	add_theme_support( 'post-thumbnails' );
	// size for Headerimage
	add_image_size( '2sp', 426, 575 );


	/*	Post-Thumbnail zu Artikel verlinken
	--------------------------------------------------------------------------------- */
	add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
	function my_post_image_html( $html, $post_id, $post_image_id ) {
		$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
		return $html;
	}




/*	/////////////////////////////////////////////////////////////////////////////////
	S I D E B A R
	///////////////////////////////////////////////////////////////////////////////// */


/*	/////////////////////////////////////////////////////////////////////////////////
	F O O T E R
	///////////////////////////////////////////////////////////////////////////////// */


/*	/////////////////////////////////////////////////////////////////////////////////
	C U S T O M
	///////////////////////////////////////////////////////////////////////////////// */
// Localina Shortcode


// Sidebar Subpage Integration
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
    return true;   // we're at the page or at a sub page
	else 
    return false;  // we're elsewhere
};


?>