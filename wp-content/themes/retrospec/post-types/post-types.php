<?php // create custom post types here

	// change default "post" to ""

	// function change_post_label_to_() {
	//     global $menu;
	//     global $submenu;
	//     $menu[5][0] = '';
	//     $submenu['edit.php'][5][0] = '';
	//     $submenu['edit.php'][10][0] = '';
	//     $submenu['edit.php'][16][0] = '';
	//     echo '';
	// }

	// add_action( 'admin_menu', 'change_post_label_to_' );


	// function change_post_object_to_() {
	//     global $wp_post_types;
	//     $labels = &$wp_post_types['post']->labels;
	//     $labels->name = '';
	//     $labels->singular_name = '';
	//     $labels->add_new = '';
	//     $labels->add_new_item = '';
	//     $labels->edit_item = '';
	//     $labels->new_item = '';
	//     $labels->view_item = '';
	//     $labels->search_items = '';
	//     $labels->not_found = '';
	//     $labels->not_found_in_trash = '';
	//     $labels->all_items = '';
	//     $labels->menu_name = '';
	//     $labels->name_admin_bar = '';

	    // $wp_post_types['post']->rewrite = array('slug' => 'banana');

	    // echo '<pre>';
	    // print_r($wp_post_types);
	    // echo '</pre>';
	// }
	
	// add_action( 'init', 'change_post_object_to_' );


	// create eating ethnic custom post type

	function create_feature_friday_custom_post_type() {
		register_post_type('feature_friday', array(
		        'labels' => array(
		            'name' => 'Feature Friday',
		            'singular_name' => 'Feature Friday',
		            'add_new' => 'Add Feature Friday',
		            'edit_item' => 'Edit Feature Friday',
		            'new_item' => 'New Feature Friday',
		            'view_item' => 'View Feature Friday',
		            'search_items' => 'Search Feature Fridays',
		            'not_found' => 'No Feature Fridays found',
		            'not_found_in_trash' => 'No Feature Fridays found in Trash',
		            'all_items' => 'All Feature Fridays',
					'menu_name' => 'Feature Fridays',
					'name_admin_bar' => 'Feature Fridays'
		        ),
		        'taxonomies' => array('category', 'post_tag'),
		        'public' => true,
		        'menu_position' => 6,
				'rewrite' => array('slug' => 'feature-fridays'),
		        'show_in_rest' => true,
		        'supports' => array(
		            'title',
		            'editor',
		            'excerpt',
		            'custom-fields',
		            'revisions',
		            'thumbnail',
		            'comments'
		        ),
		        'has_archive' => true
		    )
		);
	}

	add_action('init', 'create_feature_friday_custom_post_type');

?>
