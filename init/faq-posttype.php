<?php

namespace nebula\faq;

if (!class_exists('faq_post_type')) {

  class faq_post_type {

    public function __construct()  {
      add_action( 'init', array($this, 'register_faq_post_type') );
    }

    function register_faq_post_type() {
      $labels = array(
        'name'               => _x( 'FAQs', 'post type general name', 'faq-nebula' ),
        'singular_name'      => _x( 'FAQ', 'post type singular name', 'faq-nebula' ),
        'menu_name'          => _x( 'FAQs', 'admin menu', 'faq-nebula' ),
        'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'faq-nebula' ),
        'add_new'            => _x( 'Add New', 'faq', 'faq-nebula' ),
        'add_new_item'       => __( 'Add New FAQ', 'faq-nebula' ),
        'new_item'           => __( 'New FAQ', 'faq-nebula' ),
        'edit_item'          => __( 'Edit FAQ', 'faq-nebula' ),
        'view_item'          => __( 'View FAQ', 'faq-nebula' ),
        'all_items'          => __( 'All FAQs', 'faq-nebula' ),
        'search_items'       => __( 'Search FAQs', 'faq-nebula' ),
        'parent_item_colon'  => __( 'Parent FAQs:', 'faq-nebula' ),
        'not_found'          => __( 'No FAQs found.', 'faq-nebula' ),
        'not_found_in_trash' => __( 'No FAQs found in Trash.', 'faq-nebula' ),
        'featured_image' => __( 'FAQ Image', 'faq-nebula' )
      );

      $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'faq-nebula' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
      );

      register_post_type( 'nebula-faq', $args );

    }

  }      

}
