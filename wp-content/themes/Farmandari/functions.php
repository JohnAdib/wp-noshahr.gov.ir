<?php
/**
 * Simple Catch functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, simplecatch_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */

include ( 'metabox_class.php' );



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 642;


/**
 * Tell WordPress to run simplecatch_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'simplecatch_setup' );

if ( ! function_exists( 'simplecatch_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses load_theme_textdomain() For localization support.
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menu() To add support for navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Simple Catch 1.0
 */
function simplecatch_setup() {

	// Loading textdomain simplecatch
	load_theme_textdomain( 'simplecatch' );
	
	// Load up our theme options page and related code.
	require( get_template_directory() . '/functions/panel/theme_options.php' );
	
	// Grab Simple Catch's Custom Tags widgets.
	require( get_template_directory() . '/functions/widgets.php' );
	
	// Load up our Simple Catch's Functions
	require( get_template_directory() . '/functions/simplecatch_functions.php' );
	
	// Load up our Simple Catch's metabox
	require( get_template_directory() . '/functions/simplecatch_metabox.php' );
	
	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' );
	
	/* We'll be using post thumbnails for custom features images on posts under blog category.
	 * Larger images will be auto-cropped to fit.
	 */
	set_post_thumbnail_size( 210, 210 );
	
	// Add Simple Catch's custom image sizes
	add_image_size( 'featured', 210, 210, true); // uses on homepage featured image
	add_image_size( 'slider', 976, 313, true); // uses on Featured Slider on Homepage Header
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' ); 
		
	// remove wordpress version from header for security concern
	remove_action( 'wp_head', 'wp_generator' );
 
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'simplecatch' ) );
	
} // simplecatch_setup
endif;


/**
 * Register our sidebars and widgetized areas.
 *
 * uses register_sidebar
 * returns the id
 */
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array( 
		'name'          => __( 'sidebar', 'simplecatch' ),
		'id'            => 'sidebar',
		'description'   => __( 'sidebar', 'simplecatch' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><hr/>' 
	) ); 	
}

    add_filter('manage_posts_columns', 'posts_columns_id', 5);
    add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns_id', 5);
    add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}
// add editor the privilege to edit theme

// get the the role object
//$role_object = get_role( 'editor' );

// add $cap capability to this role object
//$role_object->add_cap( 'edit_theme_options' );


        $labels = array(
                'name' => 'جلسات',
                'singular_name' => 'meetings',
                'add_new' => 'افزودن جلسه ',
                'add_new_item' => 'افزودن جلسه جدید',
                'edit_item' => 'ویرایش جلسه',
                'new_item' => 'جلسه جدید',
                'view_item' => 'نمایش جلسه',
                'search_items' => 'جستجوی جلسه',
                'not_found' => 'چنین جلسه ای یافت نشد',
                'not_found_in_trash' => 'جلسه ای در زباله‌دان یافت نشد',
                'parent_item_colon' => 'جلسه',
                'menu_name' => 'جلسات',
        );

        $args = array(
                'labels' => $labels,
				'label' => 'جلسه',
                'hierarchical' => false,
                'description' => 'زمانبندی جلسات فرمانداری',
                'supports' => array( 'title'),
                'taxonomies' => array( 'page-category' ),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
				'menu_position' => 7,
                'menu_icon' => get_template_directory_uri() . "/images/ul-bg.png",
                'show_in_nav_menus' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'has_archive' => true,
                'query_var' => true,
                'can_export' => true,
                'rewrite' => array('slug' => 'meetings'),
				'_builtin' => false,
                'capability_type' => 'post'
        );
        register_post_type( 'meetings', $args );
		
	
		


	add_smart_meta_box('smart_meta_box_meetings', array(
	'title'     => 'ورود جزئیات برگزاری جلسات',
	'pages'		=> array('meetings'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(

	array(
	'name' => 'برگزار کننده',
	'id' => 'mreg',
	'default' => '',
	'desc' => 'نهاد برگزار کننده جلسه',
	'type' => 'text',
	),

	array(
	'name' => 'مکان',
	'id' => 'mplace',
	'default' => '',
	'desc' => 'مکان برگزاری جلسه',
	'type' => 'text',
	),

	array(
	'name' => 'توضیح',
	'id' => 'mdesc',
	'default' => '',
	'desc' => '<br />توضیحات اضافی مرتبط با این جلسه را اینجا بنویسید',
	'type' => 'textarea',
	),


	)
	));


	add_filter( 'manage_edit-meetings_columns', 'my_edit_movie_columns' ) ;

	function my_edit_movie_columns( $columns ) {

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'جلسه' ),
			'date' => __( 'زمان برگزاری' ),
			'mreg' => __( 'برگزار کننده' ),
			'mplace' => __( 'مکان' ),
			'mdesc' => __( 'توضیح' )
			
		);

		return $columns;
	}

	add_action( 'manage_meetings_posts_custom_column', 'my_manage_meeting_columns', 10, 2 );

	function my_manage_meeting_columns( $column, $post_id ) {
		global $post;

		switch( $column ) {
		
			case 'mreg' :
				$tmpreg = SmartMetaBox::get('mreg');
				if ( empty( $tmpreg ) )
					echo __( '---' );
				else
					echo $tmpreg ;
				break;

			case 'mplace' :
				$tmpplace = SmartMetaBox::get('mplace');
				if ( empty( $tmpplace ) )
					echo __( '---' );
				else
					echo ('<strong>'.$tmpplace.'</strong>') ;
				break;
				
			case 'mdesc' :
				$tmpdesc = SmartMetaBox::get('mdesc');
				if ( empty( $tmpdesc ) )
					echo __( '---' );
				else
					echo $tmpdesc ;
				break;
				
			/* Just break out of the switch statement for everything else. */
			default :
				break;
		}
	}
			
			
	add_filter( 'manage_edit-meetings_sortable_columns', 'my_meetings_sortable_columns' );

	function my_meetings_sortable_columns( $columns ) {

		$columns['mreg'] = 'mreg';
		$columns['mplace'] = 'mplace';

		return $columns;
	}
		

		
// Print Fiendly Template Page ***************************************

	//add my_print to query vars
	function add_print_query_vars($vars) {
		// add my_print to the valid list of variables
		$new_vars = array('print');
		$vars = $new_vars + $vars;
		return $vars;
	}

	add_filter('query_vars', 'add_print_query_vars');

	add_action("template_redirect", 'my_template_redirect_2322');

	// Template selection
	function my_template_redirect_2322()
	{
		global $wp;
		global $wp_query;
		if (isset($wp->query_vars["print"]))
		{
			include(TEMPLATEPATH . '/print.php');
			die();

		}
}
		
?>
