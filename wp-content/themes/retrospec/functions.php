<?php

if ( ! function_exists( 'retrospec_setup' ) ) :

	function retrospec_setup() {

		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on retrospec, use a find and replace
			* to change 'retrospec' to the name of your theme in all the template files
		*/

		load_theme_textdomain( 'retrospec' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		// menu doesn't come as default so need to add
		add_theme_support( 'menus' );

		// add featured image to theme - for all post types and pages
		add_theme_support( 'post-thumbnails' );

		// sets default featured image size for theme - this can be overriden in the template by
		// passing in a size to the the_post_thumbnail();
			// set_post_thumbnail_size( $width, $height, $crop );
			// set_post_thumbnail_size( 1200, 9999 );

		// add featured image to theme - for specified types
			// add_theme_support( 'post-thumbnails', array( 'post', 'test', 'portfolio' ) ); 

		// Custom post types - include in theme
		include('post-types/post-types.php');

		// Custom taxonomies - include in theme
		// include('taxonomies/taxonomies.php');

		// make wp aware of our menus
		// key - needs to be passed into wp_nav_menu for 'theme_location'
		// value - is what shows up in admin panel on front end under menu
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'retrospec' ),
			'social'  => __( 'Social Links Menu', 'retrospec' )
		) );

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
			* Enable support for Post Formats.
			*
			* See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat'
		) );

		/*
			* This theme styles the visual editor to resemble the theme style,
			* specifically font, colors, icons, and column width.
		*/
		// add_editor_style( array( 'css/editor-style.css', retrospec_fonts_url() ) );
	
	}


endif; // retrospec_setup

add_action( 'after_setup_theme', 'retrospec_setup' );


// Enable SVG upload
// function cc_mime_types($mimes) {
// 	$mimes['svg'] = 'image/svg+xml';
// 	$mimes['svgz'] = 'image/svg+xml';
// 	return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');


// function disable_real_mime_check( $data, $file, $filename, $mimes ) {
//     $wp_filetype = wp_check_filetype( $filename, $mimes );

//     $ext = $wp_filetype['ext'];
//     $type = $wp_filetype['type'];
//     $proper_filename = $data['proper_filename'];

//     return compact( 'ext', 'type', 'proper_filename' );
// }
// add_filter( 'wp_check_filetype_and_ext', 'disable_real_mime_check', 10, 4 );




function my_custom_admin_styles() {
  echo '<style>
    table.media .column-title .media-icon img {
      width: 100%;
    } 
  </style>';
}
add_action('admin_head', 'my_custom_admin_styles');


function retrospec_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'retrospec_excerpt_length', 999 );
// default length is 55 words
// the 999 above tells wp what position to run the function


function retrospec_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'retrospec_excerpt_more');

// function retrospec_excerpt_more( $more ) {
// 	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . 'Read More...' . '</a>';
// }
// add_filter('excerpt_more', 'retrospec_excerpt_more');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since retrospec 1.0
 */
// function retrospec_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'retrospec_content_width', 840 );
// }
// add_action( 'after_setup_theme', 'retrospec_content_width', 0 );


// Returns theme's url for use in templates
// if ( ! function_exists( 'retrospec_get_theme_uri' ) ):

// 	function retrospec_get_theme_uri() {
// 		$theme_url = get_stylesheet_uri();
// 		$theme_url = str_replace("/style.css", "", $theme_url);
		
// 		return $theme_url;
// 	}

// endif;
// add_shortcode( 'theme_uri', 'retrospec_get_theme_uri' );



// Registers a widget area

function retrospec_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'retrospec' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'retrospec' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'retrospec' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'retrospec' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'retrospec' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'retrospec' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'retrospec_widgets_init' );

// if ( ! function_exists( 'retrospec_fonts_url' ) ) :
// /**
//  * Register Google fonts for retrospec.
//  *
//  * Create your own retrospec_fonts_url() function to override in a child theme.
//  *
//  * @since retrospec 1.0
//  *
//  * @return string Google fonts URL for the theme.
//  */
// function retrospec_fonts_url() {
// 	$fonts_url = '';
// 	$fonts     = array();
// 	$subsets   = 'latin,latin-ext';

// 	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
// 	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'retrospec' ) ) {
// 		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
// 	}

// 	 translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. 
// 	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'retrospec' ) ) {
// 		$fonts[] = 'Montserrat:400,700';
// 	}

// 	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
// 	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'retrospec' ) ) {
// 		$fonts[] = 'Inconsolata:400';
// 	}

// 	if ( $fonts ) {
// 		$fonts_url = add_query_arg( array(
// 			'family' => urlencode( implode( '|', $fonts ) ),
// 			'subset' => urlencode( $subsets ),
// 		), 'https://fonts.googleapis.com/css' );
// 	}

// 	return $fonts_url;
// }
// endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since retrospec 1.0
 */
// function retrospec_javascript_detection() {
// 	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
// }
// add_action( 'wp_head', 'retrospec_javascript_detection', 0 );


// Enqueues scripts and styles
// 3rd param - list of dependencies (optional)
// 4th param - set a specific version (optional)
// 5th param - boolean - whether we want this to appear in the footer of the page

function retrospec_scripts() {
	// Add custom fonts, used in the main stylesheet.
	// wp_enqueue_style( 'retrospec-fonts', retrospec_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'retrospec-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'retrospec-ie', get_template_directory_uri() . '/css/ie.css', array( 'retrospec-style' ), '20150930' );
	// wp_style_add_data( 'retrospec-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	// wp_enqueue_style( 'retrospec-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'retrospec-style' ), '20151230' );
	// wp_style_add_data( 'retrospec-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	// wp_enqueue_style( 'retrospec-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'retrospec-style' ), '20150930' );
	// wp_style_add_data( 'retrospec-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'retrospec-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'retrospec-html5', 'conditional', 'lt IE 9' );

	// wp_enqueue_script( 'retrospec-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	// if ( is_singular() && wp_attachment_is_image() ) {
	// 	wp_enqueue_script( 'retrospec-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	// }

	// wp_enqueue_script( 'retrospec-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	// wp_localize_script( 'retrospec-script', 'screenReaderText', array(
	// 	'expand'   => __( 'expand child menu', 'retrospec' ),
	// 	'collapse' => __( 'collapse child menu', 'retrospec' ),
	// ) );
}
add_action( 'wp_enqueue_scripts', 'retrospec_scripts' );


// Add classes / page name to body element
// if ( ! function_exists( 'retrospec_add_body_class' ) ):

// 	function retrospec_add_body_class($wp_classes) {
// 		global $post;
		
// 		// List of the only WP generated classes allowed
// 		$whitelist = array('logged-in', 'admin-bar', 'single');

// 		// Filter the body classes
// 		$wp_classes = array_intersect($wp_classes, $whitelist);

// 		$wp_classes[] = 'wordpress-site';
		
// 		if (!empty($post)) {
// 			$classes[] = $post->post_name;
// 			$classes[] = get_post_type($post);
			
// 			foreach((get_the_category($post->ID)) as $category)
// 				$classes[] = $category->category_nicename;

// 			// Add the new classes
// 			return array_merge($wp_classes, (array) $classes);	
// 		}
// 		return $wp_classes;
// 	}

// endif;
// add_filter( 'body_class', 'retrospec_add_body_class' );


// // Add template name to content element
// function wpjj_content_class() {
// 	global $post;
// 	$classes = '';
	
// 	if (!empty($post)) {
		
// 		$template = get_page_template_slug($post->ID);
		
// 		if ($template !== false && $template != 'page.php') { // False means not a page template
// 			$classes = str_replace('.php', '', $template); // Remove .php from template slug
// 		}

// 		return $classes;
// 	}
// }

/**
 * Adds custom classes to the array of body classes.
 *
 * @since retrospec 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
// function retrospec_body_classes( $classes ) {
// 	// Adds a class of custom-background-image to sites with a custom background image.
// 	if ( get_background_image() ) {
// 		$classes[] = 'custom-background-image';
// 	}

// 	// Adds a class of group-blog to sites with more than 1 published author.
// 	if ( is_multi_author() ) {
// 		$classes[] = 'group-blog';
// 	}

// 	// Adds a class of no-sidebar to sites without active sidebar.
// 	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 		$classes[] = 'no-sidebar';
// 	}

// 	// Adds a class of hfeed to non-singular pages.
// 	if ( ! is_singular() ) {
// 		$classes[] = 'hfeed';
// 	}

// 	return $classes;
// }
// add_filter( 'body_class', 'retrospec_body_classes' );

// Add specific CSS class by filter
// add_filter( 'body_class', 'my_class_names' );
// function my_class_names( $classes ) {
// 	// add 'class-name' to the $classes array
// 	$classes[] = 'class-name';
// 	// return the $classes array
// 	return $classes;
// }

function retrospec_add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'retrospec_add_slug_body_class' );


/**
 * Converts a HEX value to RGB.
 *
 * @since retrospec 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
// function retrospec_hex2rgb( $color ) {
// 	$color = trim( $color, '#' );

// 	if ( strlen( $color ) === 3 ) {
// 		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
// 		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
// 		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
// 	} else if ( strlen( $color ) === 6 ) {
// 		$r = hexdec( substr( $color, 0, 2 ) );
// 		$g = hexdec( substr( $color, 2, 2 ) );
// 		$b = hexdec( substr( $color, 4, 2 ) );
// 	} else {
// 		return array();
// 	}

// 	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
// }

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since retrospec 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
// function retrospec_content_image_sizes_attr( $sizes, $size ) {
// 	$width = $size[0];

// 	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

// 	if ( 'page' === get_post_type() ) {
// 		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
// 	} else {
// 		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
// 		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
// 	}

// 	return $sizes;
// }
// add_filter( 'wp_calculate_image_sizes', 'retrospec_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since retrospec 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function retrospec_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'retrospec_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since retrospec 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
// function retrospec_widget_tag_cloud_args( $args ) {
// 	$args['largest'] = 1;
// 	$args['smallest'] = 1;
// 	$args['unit'] = 'em';
// 	return $args;
// }
// add_filter( 'widget_tag_cloud_args', 'retrospec_widget_tag_cloud_args' );



// custom global comment section 
/*
function retrospec_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : 
        ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
           
	            <article <?php comment_class('row'); ?>>
	 
	            	<div class="medium-2 columns">
	            		<div class="author vcard">
	            			<?php echo get_avatar( $comment, 48 ); ?>
	            		</div><!-- .vcard -->
					</div>

					<div class="medium-3 columns comment_meta">
						<span>posted by</span>
						<h6 class="author-name"><?php comment_author(); ?></h6>
            			<span class="date">
            				<?php comment_date('M j, Y'); ?>
            			</span>
            			<span class="time">
            				<?php comment_time('g:i a'); ?>
            			</span>
					</div>

					<div class="medium-5 large-6 columns comment_text">
						<?php echo esc_html(comment_text()); ?>
					</div>
	 
	            	<div class="medium-2 large-1 columns">
            			<?php 
            				comment_reply_link( array_merge( $args, array(
            					'before' => '<span class="reply-link">',
            					'reply_text' => 'Reply',
            					'after' => '</span>' . edit_comment_link( 'Edit', '<span class="edit-link">', '</span> '), 
            					'depth' => $depth,
            					'max_depth' => $args['max_depth'] 
            				) ) ); 
            			?>
	            	</div><!-- .reply -->
	 
	            </article><!-- #comment-<?php comment_ID(); ?> -->
        	<?php // End the default styling of comment -  wordpress automatically closes li tag
        break;
    endswitch;
}
*/

// gallery fn with pagination

/*FILTER: GALLERY:  --------------------------------------------------------------*/
// add_filter( 'post_gallery', 'filter_gallery', 10, 2 );
// function filter_gallery( $output, $attr ) {
//     global $post;

//  //    static $instance = 0;
// 	// $instance++;

// 	// GALLERY SETUP STARTS HERE----------------------------------------//
//     if ( isset($attr['orderby']) ) {
//         $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
//         if ( !$attr['orderby'] )
//             unset( $attr['orderby'] );
//     }
// 	// print_r($attr);
//     extract(shortcode_atts(array(
//         'order' => 'ASC',
//         'orderby' => 'menu_order ID',
//         'id' => $post->ID,
//         'itemtag' => 'dl',
//         'icontag' => 'dt',
//         'captiontag' => 'dd',
//         'columns' => 3,
//         'size' => 'thumbnail', // use thumbnail, medium, large
//         'include' => '',
//         'exclude' => ''
//     ), $attr));

//     $id = intval($id);
//     if ( 'RAND' == $order )
//     	$orderby = 'none';

//     if ( !empty($include) ) {
//         $include = preg_replace( '/[^0-9,]+/', '', $include );
//         $_attachments = get_posts( array(
//         	'include' => $include,
//         	'post_status' => 'inherit',
//         	'post_type' => 'attachment',
//         	'post_mime_type' => 'image',
//         	'order' => $order,
//         	'orderby' => $orderby)
//         );

//         $attachments = array();
//         foreach ( $_attachments as $key => $val ) {
//             $attachments[$val->ID] = $_attachments[$key];
//         }
//     // added code below
//     } elseif ( !empty($exclude) ) {
// 		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
// 		$attachments = get_children( array(
// 				'post_parent' => $id,
// 				'exclude' => $exclude,
// 				'post_status' => 'inherit',
// 				'post_type' => 'attachment',
// 				'post_mime_type' => 'image',
// 				'order' => $order,
// 				'orderby' => $orderby)
// 		);
// 	} else {
// 		$attachments = get_children( array(
// 				'post_parent' => $id,
// 				'post_status' => 'inherit',
// 				'post_type' => 'attachment',
// 				'post_mime_type' => 'image',
// 				'order' => $order,
// 				'orderby' => $orderby)
// 		);
// 	}
// 	// added code above

//     if ( empty($attachments) )
//     	return '';

//     // code added below
//     if ( is_feed() ) {
// 		$output = "\n";
// 		foreach ( $attachments as $att_id => $attachment )
// 			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
// 		return $output;
// 	}
//     // code added above

// 	// GALLERY SETUP END HERE------------------------------------------//


// 	// PAGINATION SETUP START HERE-------------------------------------//
	
// 	$current = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
// 	$per_page = 24;
// 	//$offset = ($page-1) * $per_page;
// 	$offset = ($current-1) * $per_page;
// 	$big = 999999999; // need an unlikely integer

// 	// $columns = intval($columns);

// 	$total = sizeof($attachments);
// 	$total_pages = round( $total/$per_page );
	
// 	if( $total_pages < ( $total/$per_page ) ) {
// 		$total_pages = $total_pages+1;
// 	}
// 	// PAGINATION SETUP END HERE-------------------------------------//


// 	// GALLERY OUTPUT START HERE---------------------------------------//
    
//     $output = "<div class='gallery-images'>";
// 		$counter = 0;
// 		$pos = 0;

// 		// PAGINATION OUTPUT START HERE-------------------------------------//
		
// 		$output .= "<div class='gallery-pagination-top'>";
// 		$output .= paginate_links( array(
// 			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
// 			'format' => '?paged=%#%',
// 			'current' => $current,
// 			'total' => $total_pages,
// 			'prev_text'    => __('«'),
// 			'next_text'    => __('»')
// 		) );
// 		$output .= "</div>";
		
// 		// PAGINATION OUTPUT ENDS HERE-------------------------------------//

// 	    foreach ( $attachments as $id => $attachment ) {
// 	    	$pos++;
// 	        //$img = wp_get_attachment_image_src($id, 'medium');
// 			//$img = wp_get_attachment_image_src($id, 'thumbnail');
// 	        //$img = wp_get_attachment_image_src($id, 'full');	

// 			if( ( $counter < $per_page ) && ( $pos > $offset ) ) {
// 				$counter++;
// 				$largetitle = get_the_title($attachment->ID);
// 				$largeimg = wp_get_attachment_image_src($id, 'large');
// 				$img = wp_get_attachment_image_src($id, array(150,150));
// 				// print_r($largeimg);
// 				// exit;
// 				$link = get_permalink($id);
// 				$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
// 				$caption = $attachment->post_excerpt;
// 				$description = $attachment->post_content;
// 				// $src = $attachment->guid;
// 				// $title = $attachment->post_title;
// 				// echo '<pre>';
// 				// print_r($attachment);			
// 				// exit;
// 				$output .= '<a class="gallery-image" href='.$link.' title='.$largetitle.' data-lb-img='.$largeimg[0].' data-lb-width='.$largeimg[1].' data-lb-height='.$largeimg[2].'>
// 								<img src='.$img[0].' width='.$img[1].' height='.$img[2].' alt='.$alt.'/>
// 								<p class="caption">'.$caption.'</p>
// 								<p class="description">'.$description.'</p>
// 							</a>';
// 			}
// 	    }

// 	    // PAGINATION OUTPUT START HERE-------------------------------------//
// 		$output .= "<div class='gallery-pagination-bottom'>";
// 		$output .= paginate_links( array(
// 			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
// 			'format' => '?paged=%#%',
// 			'current' => $current,
// 			'total' => $total_pages,
// 			'prev_text'    => __('«'),
// 			'next_text'    => __('»')
// 		) );
// 		$output .= "</div>";
		
// 		// PAGINATION OUTPUT ENDS HERE-------------------------------------//
// 		$output .= "<div class='clear'></div>";

//     $output .= "</div>";
	
// 	// GALLERY OUTPUT ENDS HERE---------------------------------------//

//     return $output;
// }


// set archive pages to limit of 5 posts per page
// function limit_posts_per_archive_page() {
// 	if ( is_archive() ) {
// 		set_query_var('posts_per_archive_page', 5);
// 	}
// }
// add_filter('pre_get_posts', 'limit_posts_per_archive_page');


// custom_breadcrumb

function custom_breadcrumbs( array $options = array() ) {
	
	// default values assigned to options
	$options = array_merge( array(
        'crumbId' => 'nav_crumb', // id for the breadcrumb Div
		'crumbClass' => 'nav_crumb', // class for the breadcrumb Div
		'beginningText' => '', // text showing before breadcrumb starts
		'showOnHome' => 0,// 1 - show breadcrumbs on the homepage, 0 - don't show
		'delimiter' => ' &#47; ', // delimiter between crumbs
		'homePageText' => 'Home', // text for the 'Home' link
		'showCurrent' => 1, // 1 - show current post/page title in breadcrumbs, 0 - don't show
		'beforeTag' => '<span class="current">', // tag before the current breadcrumb
		'afterTag' => '</span>', // tag after the current crumb
		'showTitle'=> 1 // showing post/page title or slug if title to show then 1
	), $options );
   
   	$crumbId = $options['crumbId'];
	$crumbClass = $options['crumbClass'];
	$beginningText = $options['beginningText'];
	$showOnHome = $options['showOnHome'];
	$delimiter = $options['delimiter']; 
	$homePageText = $options['homePageText']; 
	$showCurrent = $options['showCurrent']; 
	$beforeTag = $options['beforeTag']; 
	$afterTag = $options['afterTag']; 
	$showTitle =  $options['showTitle']; 
	
	global $post;

	$wp_query = $GLOBALS['wp_query'];

	$homeLink = get_bloginfo('url');
	
	echo '<div id="'.$crumbId.'" class="'.$crumbClass.'" >'.$beginningText;
	
	if (is_home() || is_front_page()) {
	
		if ($showOnHome == 1)

			echo $beforeTag . $homePageText . $afterTag;

	} else { 
	
		echo '<a href="' . $homeLink . '">' . $homePageText . '</a> ' . $delimiter . ' ';
	
		if ( is_category() ) {
			
			$thisCat = get_category(get_query_var('cat'), false);
			
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
				
				echo $beforeTag . 'Archive by category "' . single_cat_title('', false) . '"' . $afterTag;
	
		} elseif ( is_tax() ) {
				
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$parents = array();
			$parent = $term->parent;
			
			while ( $parent ) {
				$parents[] = $parent;
				$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ) );
				$parent = $new_parent->parent;
			}
	  
			if ( ! empty( $parents ) ) {
				
				$parents = array_reverse( $parents );
		  
				foreach ( $parents as $parent ) {
					$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
					echo   '<a href="' . get_term_link( $item->slug, get_query_var( 'taxonomy' ) ) . '">' . $item->name . '</a>'  . $delimiter;
				}
			}

			$queried_object = $wp_query->get_queried_object();
			echo $beforeTag . $queried_object->name . $afterTag;	  
	  
		} elseif ( is_search() ) {
		
			echo $beforeTag . 'Search results for "' . get_search_query() . '"' . $afterTag;
	
		} elseif ( is_day() ) {
		
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $beforeTag . get_the_time('d') . $afterTag;
	
		} elseif ( is_month() ) {

			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $beforeTag . get_the_time('F') . $afterTag;
	
		} elseif ( is_year() ) {

			echo $beforeTag . get_the_time('Y') . $afterTag;
	
		} elseif ( is_single() && !is_attachment() ) {
		  
			if($showTitle)
			   
			   $title = get_the_title();
			  
			else
			  
				$title =  $post->post_name;
		  
			if ( get_post_type() == 'product' ) { // it is for custom post type with custome taxonomies like
				
				// Breadcrumb would be : Home Furnishings > Bed Covers > Cotton Quilt King Kantha Bedspread 
				// product = Cotton Quilt King Kantha Bedspread, custom taxonomy product_cat (Home Furnishings -> Bed Covers)
				// show  product with category on single page
					  
				if ( $terms = wp_get_object_terms( $post->ID, 'product_cat' ) ) {
		
					$term = current( $terms );

					$parents = array();

					$parent = $term->parent;
						  
					while ( $parent ) {
		
						$parents[] = $parent;

						$new_parent = get_term_by( 'id', $parent, 'product_cat' );

						$parent = $new_parent->parent;
		
					}
						  
					if ( ! empty( $parents ) ) {
		
						$parents = array_reverse($parents);
		
						foreach ( $parents as $parent ) {
		
							$item = get_term_by( 'id', $parent, 'product_cat');
		
							echo  '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . $item->name . '</a>'  . $delimiter;
		
						}
		
					}
						  
					echo  '<a href="' . get_term_link( $term->slug, 'product_cat' ) . '">' . $term->name . '</a>'  . $delimiter;
					  
				}
						
				echo $beforeTag . $title . $afterTag;
				  
			}  elseif ( get_post_type() != 'post' ) {
				  
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . $title . $afterTag;
			
			} else {
				
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					
					echo $cats;
				
				if ($showCurrent == 1) echo $beforeTag . $title . $afterTag;

			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
  
			$post_type = get_post_type_object(get_post_type());

			echo $beforeTag . $post_type->labels->singular_name . $afterTag;
	 
		} elseif ( is_attachment() ) {
	 
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . get_the_title() . $afterTag;	
  
		} elseif ( is_page() && !$post->post_parent ) {
			
			$title =($showTitle)? get_the_title():$post->post_name;
	  
			if ($showCurrent == 1) echo $beforeTag .  $title . $afterTag;

		} elseif ( is_page() && $post->post_parent ) {

			$parent_id  = $post->post_parent;
			$breadcrumbs = array();

			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}

			$breadcrumbs = array_reverse($breadcrumbs);
			
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
			}
			
			$title =($showTitle)? get_the_title():$post->post_name;
   
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $beforeTag . $title . $afterTag;

		} elseif ( is_tag() ) {

			echo $beforeTag . 'Posts tagged "' . single_tag_title('', false) . '"' . $afterTag;

		} elseif ( is_author() ) {
			
			global $author;
			$userdata = get_userdata($author);

			echo $beforeTag . 'Articles posted by ' . $userdata->display_name . $afterTag;

		} elseif ( is_404() ) {
  
			echo $beforeTag . 'Error 404' . $afterTag;

		}

		if ( get_query_var('paged') ) {
			
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_tax() ) echo ' (';
				
				echo __('Page') . ' ' . get_query_var('paged');
			
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_tax() ) echo ')';
		}
	}
	
	echo '</div>';

}
// end custom_breadcrumb


/**
 * If more than one page exists, return TRUE.
 */
function show_page_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

if ( ! function_exists( 'retrospec_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own retrospec_entry_meta() function to override in a child theme.
 *
 * @since retrospec 1.0
 */
function retrospec_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'retrospec_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'retrospec' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		retrospec_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'retrospec' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		retrospec_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'retrospec' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'retrospec_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own retrospec_entry_date() function to override in a child theme.
 *
 * @since retrospec 1.0
 */
function retrospec_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'retrospec' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'retrospec_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own retrospec_entry_taxonomies() function to override in a child theme.
 *
 * @since retrospec 1.0
 */
function retrospec_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'retrospec' ) );
	if ( $categories_list && retrospec_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'retrospec' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'retrospec' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'retrospec' ),
			$tags_list
		);
	}
}
endif;


/* remove <p> tags around WYSIWYG content */
remove_filter( 'the_content', 'wpautop' );


/* Social Share
if ( ! function_exists( 'retrospec_social_sharing_buttons' ) ) :

function retrospec_social_sharing_buttons($content) {
	
	global $post;

	// if single post
	if( is_singular() ) {
	
		// Get current page URL 
		$retrospecURL = urlencode( get_permalink() );
 
		// Get current page title
		$retrospecTitle = str_replace( ' ', '%20', get_the_title() );
		
		// Get Post Thumbnail for pinterest
		// $retrospecThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$retrospecTitle.'&amp;url='.$retrospecURL.'&amp;via=retrospec';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$retrospecURL;
		// $googleURL = 'https://plus.google.com/share?url='.$retrospecURL;
		// $bufferURL = 'https://bufferapp.com/add?url='.$retrospecURL.'&amp;text='.$retrospecTitle;
		// $whatsappURL = 'whatsapp://send?text='.$retrospecTitle . ' ' . $retrospecURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$retrospecURL.'&amp;title='.$retrospecTitle;
 
		// Based on popular demand added Pinterest too
		// $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$retrospecURL.'&amp;media='.$retrospecThumbnail[0].'&amp;description='.$retrospecTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<div class="retrospec-social">';
		$content .= '<h5>SHARE ON</h5> <a class="retrospec-link retrospec-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="retrospec-link retrospec-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		// $content .= '<a class="retrospec-link retrospec-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		// $content .= '<a class="retrospec-link retrospec-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		// $content .= '<a class="retrospec-link retrospec-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '<a class="retrospec-link retrospec-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		// $content .= '<a class="retrospec-link retrospec-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$content .= '</div>';
		
		return $content;
	
	} else {

		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'retrospec_social_sharing_buttons');
endif;
*/
