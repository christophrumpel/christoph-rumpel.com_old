<?php
/*
Plugin Name: References
Plugin URI: http://wp.tutsplus.com/
Description: Declares a plugin that will create a custom post type
Version: 1.0
Author: Soumitra Chakraborty
Author URI: http://wp.tutsplus.com/
License: GPLv2
*/

// CREATE CUSTOM POST TYPES

add_action( 'init', 'create_reference' );


function create_reference() {
  register_post_type( 'references',
    array(
    'labels' => array(
    'name' => 'References',
    'singular_name' => 'Reference',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Reference',
    'edit' => 'Edit',
    'edit_item' => 'Edit Reference',
    'new_item' => 'New Reference',
    'view' => 'View',
    'view_item' => 'View Reference',
    'search_items' => 'Search References',
    'not_found' => 'No References found',
    'not_found_in_trash' =>
    'No References found in Trash',
    'parent' => 'Parent Reference',
    'show_in_nav_menus'   => TRUE
    ),
    'public' => true,
    'menu_position' => 15,
    'supports' =>
    array( 'title', 'editor', 'comments',
    'thumbnail',  ),
    'taxonomies' => array( '' ),
    'menu_icon' =>
    plugins_url( 'images/image.png', __FILE__ ),
    'has_archive' => true
    )
);


//CREATE CUSTOM TAXONOMIES

}

add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies(){
  register_taxonomy(
    'references_reference_type',
    'references', array(
      'labels' => array(
        'name' => 'Reference Type',
        'add_new_item' => 'Add New Reference Type',
        'new_item_name' => "New Reference Type Genre"
      ),
       'show_ui' => true,
       'show_tagcloud' => true,
       'hierarchical' => true
    )
  );
}




//CREATE CUSTOM META BOXES

add_action( 'admin_init', 'my_admin' );


function my_admin() {
  add_meta_box( 'reference_meta_box',
  'Reference Details',
  'display_reference_meta_box',
  'references', 'normal', 'high' );
}

function display_reference_meta_box( $reference ) {
  // Retrieve current Reference url and year
  $reference_url =
  esc_html( get_post_meta( $reference->ID,
  'reference_url', true ) );
  $reference_year =
  esc_html( get_post_meta( $reference->ID,
  'reference_year', true ) );

  ?>
  <table>
    <tr>
      <td style="width: 100%">Reference URL</td>
      <td><input type="text" size="80"
      name="reference_url_name"
      value="<?php echo $reference_url; ?>" /></td>
    </tr>
    <tr>
      <td style="width: 100%">Reference Year</td>
      <td><input type="text" size="80"
      name="reference_year_name"
      value="<?php echo $reference_year; ?>" /></td>
    </tr>
  </table>
<?php }


add_action( 'save_post',
'add_reference_fields', 10, 2 );


function add_reference_fields( $reference_id, $reference ) {
  // Check post type for References
  if ( $reference->post_type == 'references' ) {

    // Store data in post meta table if present in post data
    // Reference Url
    if ( isset( $_POST['reference_url_name'] ) && $_POST['reference_url_name'] != '' ) {
      update_post_meta( $reference_id, 'reference_url',
      $_POST['reference_url_name'] );
    }

    // Reference Year
    if ( isset( $_POST['reference_year_name'] ) && $_POST['reference_year_name'] != '' ) {
      update_post_meta( $reference_id, 'reference_year',
      $_POST['reference_year_name'] );
    }
  }
}

//INCLUDE  CUSTOM TEMPLATE FILE


add_filter( 'template_include',
'include_template_function', 1 );


function include_template_function( $template_path ) {
if ( get_post_type() == 'references' ) {
if ( is_single() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'single-references.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) . '/single-references.php';
     }
  } 
    elseif ( is_archive() ) {
                if ( $theme_file = locate_template( array ( 'archive-references.php' ) ) ) {
$template_path = $theme_file;
}    else { $template_path = plugin_dir_path( __FILE__ ) . '/archive-references.php';

           }
      }
}
return $template_path;
}

// CREATE COLUMNS IN CUSTOM POST TYPE LISTING

add_filter( 'manage_edit-references_columns', 'my_columns' );

function my_columns( $columns ) {
          $columns['references_url'] = 'url';
		 
unset( $columns['comments'] );
return $columns;
}
add_action( 'manage_posts_custom_column', 'populate_columns' );

function populate_columns( $column ) 
{
  if ( 'references_url' == $column ) {
    $reference_url = esc_html( get_post_meta( get_the_ID(),'reference_url', true ) );
    echo $reference_url;
  } 				
}

//SORT COLUMNS
add_filter( 'manage_edit-references_sortable_columns', 'sort_me' );


function sort_me($columns) {

  $columns['references_url'] = 'references_url';
			 
  return $columns;
}


add_filter( 'request', 'column_orderby' );

function column_orderby ($vars ) {
  if ( !is_admin() )
    return $vars;
  if ( isset( $vars['orderby'] ) && 'references_url' == $vars['orderby'] ) {
    $vars = array_merge( $vars, array( 'meta_key' => 'reference_url', 'orderby' => 'meta_value' ) );
  } 
  return $vars;
}


// CREATE FILTERS WITH CUSTOM TAXONOMIES


add_action( 'restrict_manage_posts','my_filter_list' );


function my_filter_list() {
               $screen = get_current_screen();
                global $wp_query;
                if ( $screen->post_type == 'references' ) {
                          wp_dropdown_categories(array(
						'show_option_all' => 'Show All Reference Types',
						'taxonomy' => 'references_reference_type',
						'name' => 'references_reference_type',
						'orderby' => 'name',
						'selected' =>( isset( $wp_query->query['references_reference_type'] ) ?
						$wp_query->query['references_reference_type'] : '' ),
					  'hierarchical' => false,
					  'depth' => 3,
					  'show_count' => false,
					 'hide_empty' => true,
																								)
					);
			}
}

add_filter( 'parse_query','perform_filtering' );

function perform_filtering( $query )
 {
              $qv = &$query->query_vars;
             if (( $qv['references_reference_type'] ) && is_numeric( $qv['references_reference_type'] ) ) {
                    $term = get_term_by( 'id', $qv['references_reference_type'], 'references_reference_type' ); 
					$qv['references_reference_type'] = $term->slug;
}
}