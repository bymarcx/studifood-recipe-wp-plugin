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


function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Recipes', 'Post Type General Name', '_customtheme' ),
            'singular_name'       => _x( 'Recipe', 'Post Type Singular Name', '_customtheme' ),
            'menu_name'           => __( 'Recipes', '_customtheme' ),
            'parent_item_colon'   => __( 'Parent Recipe', '_customtheme' ),
            'all_items'           => __( 'All Recipe', '_customtheme' ),
            'view_item'           => __( 'View Recipe', '_customtheme' ),
            'add_new_item'        => __( 'Add New Recipe', '_customtheme' ),
            'add_new'             => __( 'Add Recipe', '_customtheme' ),
            'edit_item'           => __( 'Edit Recipe', '_customtheme' ),
            'update_item'         => __( 'Update Recipe', '_customtheme' ),
            'search_items'        => __( 'Search Recipe', '_customtheme' ),
            'not_found'           => __( 'Not Found', '_customtheme' ),
            'not_found_in_trash'  => __( 'Not found in Trash', '_customtheme' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'recipes', '_customtheme' ),
            'description'         => __( 'Recipes for WP Recipe Maker', '_customtheme' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'Mahlzeit', 'Zutat' ),
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
            'menu_icon'           => '',
        );
         
        // Registering your Custom Post Type
        register_post_type( 'recipes', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );


    // TAXONOMY :: Mahlzeit
    add_action( 'init', 'create_mahlzeit_taxonomies', 0 );
    function create_mahlzeit_taxonomies()
    {
      // Add new taxonomy, make it hierarchical (like categories)
      $labels = array(
        'name' => _x( 'Mahlzeit', 'taxonomy general name' ),
        'singular_name' => _x( 'Mahlzeit', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Mahlzeiten' ),
        'popular_items' => __( 'Popular Mahlzeit' ),
        'all_items' => __( 'All Mahlzeiten' ),
        'parent_item' => __( 'Parent Mahlzeit' ),
        'parent_item_colon' => __( 'Parent Recording:' ),
        'edit_item' => __( 'Edit Mahlzeit' ),
        'update_item' => __( 'Update Mahlzeit' ),
        'add_new_item' => __( 'Add New Mahlzeit' ),
        'new_item_name' => __( 'New Mahlzeit Name' ),
      );
      register_taxonomy('mahlzeit',array('recipes'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'mahlzeit' ),
      ));
    }


    // TAXONOMY :: Mahlzeit
    add_action( 'init', 'create_zutat_taxonomies', 0 );
    function create_zutat_taxonomies()
    {
      // Add new taxonomy, make it hierarchical (like categories)
      $labels = array(
        'name' => _x( 'Zutat', 'taxonomy general name' ),
        'singular_name' => _x( 'Zutat', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Zutat' ),
        'popular_items' => __( 'Popular Zutat' ),
        'all_items' => __( 'All Zutaten' ),
        'parent_item' => __( 'Parent Zutat' ),
        'parent_item_colon' => __( 'Parent Zutat:' ),
        'edit_item' => __( 'Edit Zutat' ),
        'update_item' => __( 'Update Zutat' ),
        'add_new_item' => __( 'Add New Zutat' ),
        'new_item_name' => __( 'New Zutat Name' ),
      );
      register_taxonomy('zutat',array('recipes'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'zutat' ),
      ));
    }





    