<?php

class WPXD_QA_Post_Types {
    public function __construct() {
        
        add_action( 'init', array( $this, 'create_wpxd_qa_post_type' ) );

    }

    public function create_wpxd_qa_post_type() {
        $labels = array(
            'name' => __( 'Questions', 'wpxd-qa-plugin' ),
            'singular_name' => __( 'Question', 'wpxd-qa-plugin' ),
            'add_new' => __( 'Add New', 'wpxd-qa-plugin' ),
            'add_new_item' => __( 'Add New Question', 'wpxd-qa-plugin' ),
            'edit_item' => __( 'Edit Question', 'wpxd-qa-plugin' ),
            'new_item' => __( 'New Question', 'wpxd-qa-plugin' ),
            'all_items' => __( 'All Questions', 'wpxd-qa-plugin' ),
            'view_item' => __( 'View Question', 'wpxd-qa-plugin' ),
            'search_items' => __( 'Search Questions', 'wpxd-qa-plugin' ),
            'not_found' => __( 'No Questions Found', 'wpxd-qa-plugin' ),
            'not_found_in_trash' => __( 'No Questions found in Trash', 'wpxd-qa-plugin' ), 
            'parent_item_colon' => '',
            'menu_name' => __( 'Questions', 'wpxd-qa-plugin' )
        );
     
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'questions' ),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );
     
        register_post_type( 'wpxd_qa', $args );
    }
}