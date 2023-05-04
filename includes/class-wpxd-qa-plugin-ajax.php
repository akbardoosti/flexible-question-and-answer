<?php

class WPXD_QA_Ajax {
    private static $instance;

    public function __construct() {
        $this->load_dependencies();
        
        
        
        
        $setting = new WPXD_QA_Settings();
        add_action( 'wp_ajax_wpxd_save_form_fields', array( $setting, 'save_form_fields' ) );
        add_action( 'wp_ajax_wpxd_save_form_fields', array( $setting, 'save_form_tmeplate' ) );
        add_action( 'wp_ajax_wpxd_save_form_fields', array( $setting, 'save_form_style' ) );
        add_action( 'wp_ajax_wpxd_save_form_fields', array( $setting, 'save_fonts' ) );
        add_action( 'wp_ajax_wpxd_save_setting', array( $setting, 'save_setting' ) );
        
    }

    public static function get_instance() {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function load_dependencies() {
        require_once plugin_dir_path(__FILE__) . '/classes/class-wpxd-qa-settings.php';
    }
}