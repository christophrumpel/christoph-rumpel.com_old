<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
        // Add various supports
    add_theme_support( 'post-thumbnails' ); 
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.

    // Menus
        // // Register Menu
        // function register_my_menus() {
        //   register_nav_menus(
        //     array( 'main-nav' => __( 'Main Nav' ) )
        //   );
        // }
        // add_action( 'init', 'register_my_menus' );

        // custom menu example @ http://digwp.com/2011/11/html-formatting-custom-menus/
        function clean_custom_menus() {
            $menu_name = 'main-nav'; // specify custom menu slug

            if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {

                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $menu_items = wp_get_nav_menu_items($menu->term_id);

                $menu_list = '<nav>' ."\n";
                $menu_list .= "\t\t\t\t". '<ul class="nav main-nav">' ."\n";
                foreach ((array) $menu_items as $key => $menu_item) {
                    $title = $menu_item->title;
                    $url = $menu_item->url;
                    $menu_list .= "\t\t\t\t\t". '<li class="main-nav__item main-nav__'.$title.'"><div class="arrow"></div><a href="'. $url .'">'. $title .'</a></li>' ."\n";
                }
                $menu_list .= "\t\t\t\t". '</ul>' ."\n";
                $menu_list .= "\t\t\t". '</nav>' ."\n";

            } else {
                // $menu_list = '<!-- no list defined -->';
            }
            echo $menu_list;
        }

        add_filter( 'body_class', 'my_neat_body_class');
        function my_neat_body_class( $classes ) {
            if ( is_page(13) )
                $classes[] = 'page--portfolio';
            else if ( is_page(26))
                $classes[] = 'page--contact';
             return $classes;
        }
    // Cleaning Terms
    function term_clean($postid, $term) {
        $terms = get_the_terms($postid, $term); 
        foreach ($terms as $term) {  echo $term->name;   };
    }

?>