function create_custom_post_type() {
    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('mag', 'Post Type General Name', 'textdomain'),
        'singular_name'       => _x('mag', 'Post Type Singular Name', 'textdomain'),
        'menu_name'           => __('mag', 'textdomain'),
        'parent_item_colon'   => __('Parent mag', 'textdomain'),
        'all_items'           => __('All mag', 'textdomain'),
        'view_item'           => __('View mag', 'textdomain'),
        'add_new_item'        => __('Add New mag', 'textdomain'),
        'add_new'             => __('Add New', 'textdomain'),
        'edit_item'           => __('Edit mag', 'textdomain'),
        'update_item'         => __('Update mag', 'textdomain'),
        'search_items'        => __('Search mag', 'textdomain'),
        'not_found'           => __('Not Found', 'textdomain'),
        'not_found_in_trash'  => __('Not found in Trash', 'textdomain'),
    );

    // Set other options for Custom Post Type
    $args = array(
        'label'               => __('mag', 'textdomain'),
        'description'         => __('mag news and reviews', 'textdomain'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies'          => array('category', 'post_tag'), // Add built-in taxonomies if needed
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-document', // Optional: Custom icon
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post', // Use 'page' if you want a hierarchical structure
        'rewrite'             => array('slug' => 'mag', 'with_front' => false),
    );

    // Register the Custom Post Type
    register_post_type('mag', $args);
}

// Hook into the 'init' action
add_action('init', 'create_custom_post_type');