<?php
/*
Plugin Name: My Portfolio
Plugin URI: http://gdm.gent/
Description: My Portfolio is the best plugin to store your own portfolio items.
Version: 1.0.0
Author: Lisanne Debrabandere
*/

function custom_post_type_portfolio() {
    $labels = array(
      'name'               => _x( 'Portfolio', 'post type general name' ),
      'singular_name'      => _x( 'Portfolio item', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'book' ),
      'add_new_item'       => __( 'Add New Portfolio item' ),
      'edit_item'          => __( 'Edit Portfolio item' ),
      'new_item'           => __( 'New Portfolio item' ),
      'all_items'          => __( 'All Portfolio items' ),
      'view_item'          => __( 'View Portfolio item' ),
      'search_items'       => __( 'Search Portfolio items' ),
      'not_found'          => __( 'No portfolio item found' ),
      'not_found_in_trash' => __( 'No portfolio item found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Portfolio'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds our portfolio items specific data',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-portfolio',
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
      'has_archive'   => true
    );
    register_post_type( 'portfolio', $args );
  }

  add_action( 'init', 'custom_post_type_portfolio' );

// categorieën kunnen gebruiken binnen custom post type.
  function taxonomies_portfolio() {
    $labels = array(
      'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ), // bij andere plugins 'portfolio' overal veranderen
      'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Portfolio Categories' ),
      'all_items'         => __( 'All Portfolio Categories' ),
      'parent_item'       => __( 'Parent Portfolio Category' ),
      'parent_item_colon' => __( 'Parent Portfolio Category:' ),
      'edit_item'         => __( 'Edit Portfolio Category' ), 
      'update_item'       => __( 'Update Portfolio Category' ),
      'add_new_item'      => __( 'Add New Portfolio Category' ),
      'new_item_name'     => __( 'New Portfolio Category' ),
      'menu_name'         => __( 'Portfolio Categories' )
    );
  
      $capabilities = array(
      'edit_post'          => 'edit_portfolio',
      'read_post'          => 'read_portfolio',
      'delete_post'        => 'delete_portfolio'
      );
  
    $args = array(
      'labels' => $labels,
      'capabilities' => $capabilities,
      'hierarchical' => false,
    );
    register_taxonomy( 'portfolio_category', 'portfolio', $args );
  }
  add_action( 'init', 'taxonomies_portfolio', 0 );