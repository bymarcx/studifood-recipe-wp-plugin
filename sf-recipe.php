<?php
   /*
   Plugin Name: Studifood - CPT Recipe
   Plugin URI: bymarc.media
   description: StudiFood :: Creates a Custom Post Type - Recipe :: 20
   Version: 1.0.0
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
            'taxonomies'          => array( '' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
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
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'recipes', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );

