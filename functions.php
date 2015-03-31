<?php
	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function mayorsfund_setup() {
		load_theme_textdomain( 'mayorsfund', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'mayorsfund' ) );
        register_nav_menu( 'secondary', __( 'Footer Menu', 'mayorsfund' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'mayorsfund_setup' );
	
	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function mayorsfund_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'mayorsfund_scripts_styles' );
	
	function filter_wp_title( $title ) {
    	global $page, $paged;
    
    	if ( is_feed() )
    		return $title;
    
    	$site_description = get_bloginfo( 'description' );
    
    	$filtered_title = $title . get_bloginfo( 'name' );
    	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
    	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';
    
    	return $filtered_title;
    }
    add_filter( 'wp_title', 'filter_wp_title' );

	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				//wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ), false);
				//wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'mayorsfund' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function mayorsfund_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'mayorsfund_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

    
	add_action( 'init', 'register_cpt_initiative' );
	function register_cpt_initiative() {
	    $labels = array( 
	        'name' => _x( 'Initiatives', 'initiative' ),
	        'singular_name' => _x( 'Initiative', 'initiative' ),
	        'add_new' => _x( 'Add New', 'initiative' ),
	        'add_new_item' => _x( 'Add New Initiative', 'initiative' ),
	        'edit_item' => _x( 'Edit Initiative', 'initiative' ),
	        'new_item' => _x( 'New Initiative', 'initiative' ),
	        'view_item' => _x( 'View Initiative', 'initiative' ),
	        'search_items' => _x( 'Search Initiatives', 'initiative' ),
	        'not_found' => _x( 'No initiatives found', 'initiative' ),
	        'not_found_in_trash' => _x( 'No initiatives found in Trash', 'initiative' ),
	        'parent_item_colon' => _x( 'Parent initiative:', 'initiative' ),
	        'menu_name' => _x( 'Initiatives', 'initiative' ),
	    );
	    $args = array( 
	        'labels' => $labels,
	        'hierarchical' => false,
	        'description' => 'All initiatives and programs for The Mayors Fund',
	        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	        'taxonomies' => array( 'priorities' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 5,
	        
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => true,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => array( 'slug' => 'initiatives', 'with_front' => false ),
	        'capability_type' => 'page'
	    );
	    register_post_type( 'initiative', $args );
	}


    add_action( 'init', 'register_taxonomy_priorities' );
    function register_taxonomy_priorities() {
    	$labels = array(
    		'name'              => _x( 'Priorities', 'taxonomy general name' ),
    		'singular_name'     => _x( 'Priority', 'taxonomy singular name' ),
    		'search_items'      => __( 'Search Priorities' ),
    		'all_items'         => __( 'All Priorities' ),
    		'parent_item'       => __( 'Parent Priority' ),
    		'parent_item_colon' => __( 'Parent Priority:' ),
    		'edit_item'         => __( 'Edit Priority' ),
    		'update_item'       => __( 'Update Priority' ),
    		'add_new_item'      => __( 'Add New Priority' ),
    		'new_item_name'     => __( 'New Priority Name' ),
    		'menu_name'         => __( 'Priorities' )
    	);
    	$args = array(
    		'hierarchical'      => true,
    		'labels'            => $labels,
    		'show_ui'           => true,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => 'priorities' )
    	);
    	register_taxonomy( 'priorities', array( 'initiative' ), $args );
    }

    // Replaces the excerpt "more" text by a link
    function new_excerpt_more($more) {
        global $post;
    	return '<a class="more-tag" href="'. get_permalink($post->ID) . '">Continue Reading &#187;</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');
    
    class wp_bootstrap_navwalker extends Walker_Nav_Menu {
    	/**
    	 * @see Walker::start_lvl()
    	 * @since 3.0.0
    	 *
    	 * @param string $output Passed by reference. Used to append additional content.
    	 * @param int $depth Depth of page. Used for padding.
    	 */
    	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    		$indent = str_repeat( "\t", $depth );
    		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    	}
    	/**
    	 * @see Walker::start_el()
    	 * @since 3.0.0
    	 *
    	 * @param string $output Passed by reference. Used to append additional content.
    	 * @param object $item Menu item data object.
    	 * @param int $depth Depth of menu item. Used for padding.
    	 * @param int $current_page Menu item ID.
    	 * @param object $args
    	 */
    	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    		/**
    		 * Dividers, Headers or Disabled
    		 * =============================
    		 * Determine whether the item is a Divider, Header, Disabled or regular
    		 * menu item. To prevent errors we use the strcasecmp() function to so a
    		 * comparison that is not case sensitive. The strcasecmp() function returns
    		 * a 0 if the strings are equal.
    		 */
    		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
    			$output .= $indent . '<li role="presentation" class="divider">';
    		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
    			$output .= $indent . '<li role="presentation" class="divider">';
    		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
    			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
    		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
    			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
    		} else {
    			$class_names = $value = '';
    			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
    			$classes[] = 'menu-item-' . $item->ID;
    			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    			if ( $args->has_children )
    				$class_names .= ' dropdown';
    			if ( in_array( 'current-menu-item', $classes ) )
    				$class_names .= ' active';
    			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    			$output .= $indent . '<li' . $id . $value . $class_names .'>';
    			$atts = array();
    			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
    			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
    			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
    			// If item has_children add atts to a.
    			if ( $args->has_children && $depth === 0 ) {
    				$atts['href']   		= '#';
    				$atts['data-toggle']	= 'dropdown';
    				$atts['class']			= 'dropdown-toggle';
    				$atts['aria-haspopup']	= 'true';
    			} else {
    				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
    			}
    			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
    			$attributes = '';
    			foreach ( $atts as $attr => $value ) {
    				if ( ! empty( $value ) ) {
    					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
    					$attributes .= ' ' . $attr . '="' . $value . '"';
    				}
    			}
    			$item_output = $args->before;
    			/*
    			 * Glyphicons
    			 * ===========
    			 * Since the the menu item is NOT a Divider or Header we check the see
    			 * if there is a value in the attr_title property. If the attr_title
    			 * property is NOT null we apply it as the class name for the glyphicon.
    			 */
    			if ( ! empty( $item->attr_title ) )
    				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
    			else
    				$item_output .= '<a'. $attributes .'>';
    			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
    			$item_output .= $args->after;
    			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    		}
    	}
    	/**
    	 * Traverse elements to create list from elements.
    	 *
    	 * Display one element if the element doesn't have any children otherwise,
    	 * display the element and its children. Will only traverse up to the max
    	 * depth and no ignore elements under that depth.
    	 *
    	 * This method shouldn't be called directly, use the walk() method instead.
    	 *
    	 * @see Walker::start_el()
    	 * @since 2.5.0
    	 *
    	 * @param object $element Data object
    	 * @param array $children_elements List of elements to continue traversing.
    	 * @param int $max_depth Max depth to traverse.
    	 * @param int $depth Depth of current element.
    	 * @param array $args
    	 * @param string $output Passed by reference. Used to append additional content.
    	 * @return null Null on failure with no changes to parameters.
    	 */
    	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
            if ( ! $element )
                return;
            $id_field = $this->db_fields['id'];
            // Display this element.
            if ( is_object( $args[0] ) )
               $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
    	/**
    	 * Menu Fallback
    	 * =============
    	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
    	 * and a manu has not been assigned to the theme location in the WordPress
    	 * menu manager the function with display nothing to a non-logged in user,
    	 * and will add a link to the WordPress menu manager if logged in as an admin.
    	 *
    	 * @param array $args passed from the wp_nav_menu function.
    	 *
    	 */
    	public static function fallback( $args ) {
    		if ( current_user_can( 'manage_options' ) ) {
    			extract( $args );
    			$fb_output = null;
    			if ( $container ) {
    				$fb_output = '<' . $container;
    				if ( $container_id )
    					$fb_output .= ' id="' . $container_id . '"';
    				if ( $container_class )
    					$fb_output .= ' class="' . $container_class . '"';
    				$fb_output .= '>';
    			}
    			$fb_output .= '<ul';
    			if ( $menu_id )
    				$fb_output .= ' id="' . $menu_id . '"';
    			if ( $menu_class )
    				$fb_output .= ' class="' . $menu_class . '"';
    			$fb_output .= '>';
    			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
    			$fb_output .= '</ul>';
    			if ( $container )
    				$fb_output .= '</' . $container . '>';
    			echo $fb_output;
    		}
    	}
    }

    function the_post_thumbnail_caption() {
        global $post;
        
        $thumb_id = get_post_thumbnail_id($post->id);
        $args = array(
            'post_type' => 'attachment',
            'post_status' => null,
            'post_parent' => $post->ID,
            'include'  => $thumb_id
        ); 
        
        $thumbnail_image = get_posts($args);
        
        if ($thumbnail_image && isset($thumbnail_image[0])) {
            echo $thumbnail_image[0]->post_excerpt; 
        }
    }
?>




