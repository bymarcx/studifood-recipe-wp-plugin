<?php
/*
   Plugin Name: StudiFood - CPT Recipe
   Plugin URI: studifood.com
   description: 21 :: Creates a Custom-Post-Type for Recipes
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
    'menu_icon'           => 'dashicons-food',
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
