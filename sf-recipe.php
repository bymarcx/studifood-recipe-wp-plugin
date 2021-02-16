<?php
/*
   Plugin Name: StudiFood - CPT Recipe
   Plugin URI: studifood.com
   description: 20 :: Creates a Custom-Post-Type for Recipes
   Version: 1.0.1
   Author: Marc Eberhard
   Author URI: bymarc.media
   License: GPL2
   */


function custom_post_type()
{

  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Rezepte', 'Post Type General Name', '_customtheme'),
    'singular_name'       => _x('Recipe', 'Post Type Singular Name', '_customtheme'),
    'menu_name'           => __('Rezepte', '_customtheme'),
    'parent_item_colon'   => __('Parent Recipe', '_customtheme'),
    'all_items'           => __('Alle Rezepte', '_customtheme'),
    'view_item'           => __('Rezept anschauen', '_customtheme'),
    'add_new_item'        => __('neues Rezept erstellen', '_customtheme'),
    'add_new'             => __('Rezept hinzufügen', '_customtheme'),
    'edit_item'           => __('Rezept bearbeiten', '_customtheme'),
    'update_item'         => __('Rezept updaten', '_customtheme'),
    'search_items'        => __('Rezept suchen', '_customtheme'),
    'not_found'           => __('Nicht gefunden', '_customtheme'),
    'not_found_in_trash'  => __('Nicht gefunden im Müll', '_customtheme'),
  );

  // Set other options for Custom Post Type

  $args = array(
    'label'               => __('recipes', '_customtheme'),
    'description'         => __('Recipes for WP Recipe Maker', '_customtheme'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    // No need of custom taxonomies anymore.
    //'taxonomies'          => array('Mahlzeit', 'Zutat', 'Utensil', 'Aufwand'),
    /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest'        => true,
    'menu_icon'           => true,
    'rewrite' => array(
      'slug' => 'rezepte'
    )
  );

  // Registering your Custom Post Type
  register_post_type('recipes', $args);
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type', 0);


// TAXONOMY :: Mahlzeit
// add_action('init', 'create_mahlzeit_taxonomies', 0);
function create_mahlzeit_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x('Mahlzeit', 'taxonomy general name'),
    'singular_name' => _x('Mahlzeit', 'taxonomy singular name'),
    'search_items' =>  __('Search Mahlzeiten'),
    'popular_items' => __('Popular Mahlzeit'),
    'all_items' => __('All Mahlzeiten'),
    'parent_item' => __('Parent Mahlzeit'),
    'parent_item_colon' => __('Parent Recording:'),
    'edit_item' => __('Edit Mahlzeit'),
    'update_item' => __('Update Mahlzeit'),
    'add_new_item' => __('Add New Mahlzeit'),
    'new_item_name' => __('New Mahlzeit Name'),
  );
  register_taxonomy('mahlzeit', array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'mahlzeit'),
  ));
}


// TAXONOMY :: Zutat
//add_action('init', 'create_zutat_taxonomies', 0);
function create_zutat_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x('Zutat', 'taxonomy general name'),
    'singular_name' => _x('Zutat', 'taxonomy singular name'),
    'search_items' =>  __('Search Zutat'),
    'popular_items' => __('Popular Zutat'),
    'all_items' => __('Alle Zutaten'),
    'parent_item' => __('Parent Zutat'),
    'parent_item_colon' => __('Parent Zutat:'),
    'edit_item' => __('Edit Zutat'),
    'update_item' => __('Update Zutat'),
    'add_new_item' => __('Add New Zutat'),
    'new_item_name' => __('New Zutat Name'),
  );
  register_taxonomy('zutat', array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'zutat'),
  ));
}


// TAXONOMY :: Utensilien
// add_action('init', 'create_utensilien_taxonomies', 0);
function create_utensilien_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x('Utensilien', 'taxonomy general name'),
    'singular_name' => _x('Utensil', 'taxonomy singular name'),
    'search_items' =>  __('Search Utensilien'),
    'popular_items' => __('Popular Utensilien'),
    'all_items' => __('All Utensilien'),
    'parent_item' => __('Parent Utensilien'),
    'parent_item_colon' => __('Parent Utensilien:'),
    'edit_item' => __('Edit Utensilien'),
    'update_item' => __('Update Utensilien'),
    'add_new_item' => __('Add New Utensilien'),
    'new_item_name' => __('New Utensilien Name'),
  );
  register_taxonomy('utensil', array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'utensil'),
  ));
}

// TAXONOMY :: Aufwand
// add_action('init', 'create_aufwand_taxonomies', 0);
function create_aufwand_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x('Aufwand', 'taxonomy general name'),
    'singular_name' => _x('Aufwand', 'taxonomy singular name'),
    'search_items' =>  __('Search Aufwand'),
    'popular_items' => __('Popular Aufwand'),
    'all_items' => __('All Aufwaende'),
    'parent_item' => __('Parent Aufwand'),
    'parent_item_colon' => __('Parent Aufwand:'),
    'edit_item' => __('Edit Aufwand'),
    'update_item' => __('Update Aufwand'),
    'add_new_item' => __('Add New Aufwand'),
    'new_item_name' => __('New Aufwand Name'),
  );
  register_taxonomy('aufwand', array('recipes'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'aufwand'),
  ));
}


// DISABLE DEFAULT POST TYPE
// cause not needed!!!

add_action('admin_menu', 'remove_default_post_type');
function remove_default_post_type()
{
  remove_menu_page('edit.php');
}

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);
function remove_default_post_type_menu_bar($wp_admin_bar)
{
  $wp_admin_bar->remove_node('new-post');
}

add_action('wp_dashboard_setup', 'remove_draft_widget', 999);
function remove_draft_widget()
{
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}
